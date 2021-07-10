<?php

function sanitizeInput($input) {
	
	$search = array(
		'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
	  );
	
		$output = preg_replace($search, '', $input);
		return $output;
  }


 function sanitizeText($input) {

	  $search = array(
		'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
		'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
	  );
	
		$output = preg_replace($search, '', $input);
		return $output;
  } 
  
  function hashTag($tableName,$fieldName){
	$tableInfo = query('SELECT * FROM '.$tableName.' ORDER BY '.$fieldName.' DESC LIMIT 1','','','variable',1);
	query('UPDATE '.$tableName.' ','SET hashed_id = :hashed_id WHERE '.$fieldName.' = :fieldValue;',[':hashed_id' =>  sha1($tableInfo['row'][$fieldName]) , ':fieldValue' => $tableInfo['row'][$fieldName]]);
  }

function generateFileName($file, $tableName, $fieldName){
	
	$fileName = $file['name'];
	$parseFile = explode('.',$fileName);
	$extension = $parseFile[1];
	
	do{
		$random = rand(1,1000000000).'_'.rand(1,1000000000).'_'.rand(1,1000000000);
		$count = execSQL('SELECT * FROM '.$tableName.'','WHERE '.$fieldName.' LIKE :randomName',[':randomName' => '%'.$random.'%'],'rows');
	}while($count > 0);
	
	return $random.'.'.$extension;
}
 
function unlinkImage($tableName, $fieldName, $id, $sources, $file = 'image'){
	
	$getImage = execSQL('SELECT * FROM '.$tableName.'','WHERE '.$fieldName.' = :id;',[':id' => $id],'variable',1);
	
	if($getImage['data'][$file] != ''){
		unlink($sources.$getImage['data'][$file]);
	}
	
}

function validateFile($file, $fileTypeRequested = 'img'){
	
	$fileName = $file['name'];
	$fileType =  strtolower($file['type']);
	$fileSize = $file['size'] /1024;
	$extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
	
	if($fileTypeRequested == 'doc'){
		$allowedExtensions = array('pdf','doc','docx');
		$allowedFileType = array('application/doc','application/docx','application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		$allowedSize = 5000000;
	}elseif($fileTypeRequested == 'img'){
		$allowedExtensions = array('jpeg','png','jpg','gif');
		$allowedFileType = array('image/gif','image/jpeg','image/jpg','image/png');
		$allowedSize = 10000000;
	}
	
	if(in_array($extension,$allowedExtensions) && in_array($fileType,$allowedFileType)){
		if($fileSize < $allowedSize){
			return 1;
		}else{	
			return 'Invalid File Size. Maximum '.$allowedSize / 1000000 .' Mb allowed.';
		}
	}else{
		return 'Invalid File Type.';
	}
	
}

function getAccountTimeSpan(){
	$accountInfo = query('SELECT * FROM tbl_accounts','','','variable');
	
	foreach($accountInfo as $account){
		$array[] = $account['row']['timeSpan'];
	}
	
	return $array;
}

function showSystemLogo($bool = false){
	$rshs_info = execSQL("SELECT * FROM tbl_rshs_information","","","variable",1);
	if($bool){
		return $GLOBALS["secondary_main_dir"].$GLOBALS["logo_dir"].$rshs_info["data"]["image"];
	}else{
		return $GLOBALS["main_dir"].$GLOBALS["logo_dir"].$rshs_info["data"]["image"];
	}
	
} 

function showModuleDescription($description, $length){
	return strlen($description) > $length ? substr($description,0, $length)."&hellip;" : $description;  
}

function getTimeDescription($dateTime){
	$strtotime = strtotime($dateTime);
	$currentTime = strtotime(date('Y-m-d h:i:s a'));
	$compareTime = 	$currentTime - $strtotime;

	if($compareTime < 60){
		$unit = floor($compareTime) > 1 ? 'seconds' : 'second';
		$stringEquivalent = $compareTime." ".$unit." ago";
	}elseif($compareTime >= 60 && $compareTime < 3600){
		$seconds = floor($compareTime/60);
		$unit = $seconds > 1 ? 'minutes' : 'minute';
		$stringEquivalent = $seconds." ".$unit." ago";
	}elseif($compareTime >= 3600 && $compareTime < 86400){
		$seconds = floor($compareTime / 3600);
		$unit = $seconds > 1 ? 'hours' : 'hour';
		$stringEquivalent = $seconds." ".$unit." ago";
	}elseif($compareTime > 86400){
		$seconds = ceil($compareTime / 86400);
		$stringEquivalent = date('F d, Y',$strtotime);
	}
	return $stringEquivalent;
}

function globalSearch($table = NULL, $columns = NULL, $value = NULL){
	$query = "SELECT * FROM ".$table;
	$preparedQuery = " WHERE (";
	$actualValues = [":value" => "%".$value."%"];
	
	foreach($columns as $index => $column){
		$condition = $index != (count($columns) - 1) ? " OR " : NULL;
		$preparedQuery .= "CONVERT(`".$column."` USING utf8) LIKE :value".$condition;
	}
	
	$preparedQuery .= ") ";
	
	
	if($table == "tbl_news" || $table == "tbl_academic_events" ||  $table == "tbl_gallery" || $table == "tbl_bids_and_awards" || $table == "tbl_citizen_charter" || $table == "tbl_announcements" || $table == "tbl_transparency_seal"){
		$preparedQuery .= " AND status = :status";
		$actualValues = [":value" => "%".$value."%", ":status" => 1];
	}
	
	if($table == "tbl_administrations"){
		$query .= " INNER JOIN tbl_positions ON tbl_administrations.position_id = tbl_positions.position_id ";
	}
	
	//return $query.$preparedQuery;
	return execSQL($query, $preparedQuery, $actualValues, "variable");
}