<?php 
	
	require_once("../functions/sql.query.function.php");
	require_once("../functions/system.function.php");
	require_once("../library/directory.path.php");
	
	$PATH_ADMIN = '../views/admin/';
	$PATH_ACCESS = '../views/access/';
	
	if($_POST["action"] == "try"){
		$files = json_decode($_POST["files"]);
		print_r($files[0]);
		exit;
	}
	
	if($_POST["action"] == "showComponents"){
		if($_POST["components"] == "displaySelectedSubject"){
			$selectedSubjectList = isset($_POST["send"]["data"]) ? $_POST["send"]["data"] : NULL;
			require_once($PATH_ADMIN."academics/curriculum/listOfSelectedSubjects.php");
		}elseif($_POST["components"] == "displaySubjectList"){
			$subjects = execSQL("SELECT * FROM tbl_subjects ORDER BY subject_id DESC","","","variable");
			require_once($PATH_ADMIN."academics/curriculum/listOfSubjects.php");
		}elseif($_POST["components"] == "displayDepartmentList"){
			require_once($PATH_ADMIN."administration/departments/listOfDepartments.php");
		}elseif($_POST["components"] == "displayPositionList"){
			require_once($PATH_ADMIN."administration/positions/listOfPositions.php");
		}elseif($_POST["components"] == "displaySelectedPhotos"){
			$selectedGalleryPhotos = isset($_POST["send"]["data"]) ? $_POST["send"]["data"] : NULL;
			require_once($PATH_ADMIN."gallery/listOfSelectedGalleryPhotos.php");
		}
		
		exit;
	}
	// ========================== System Access functions ===============================
	session_start();
	
	if($_POST["action"] == "login"){
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$verifyUsername = execSQL("SELECT * FROM tbl_accounts","WHERE username = :username OR emailAddress = :emailAddress",[":username" => $username, ":emailAddress" => $username],"variable",1);
		
		if(!empty($verifyUsername)){
			$accountInfo = execSQL("SELECT * FROM tbl_accounts","WHERE (username = :username OR emailAddress = :emailAddress) AND hashPassword = :password",[":username" => $username, ":emailAddress" => $username, ":password" => sha1($password)],"variable",1);
			if(!empty($accountInfo)){
				if($accountInfo["data"]["status"] == 1){
					if($accountInfo["data"]["flag"] != 1){
						execSQL("UPDATE tbl_accounts","SET flag = :flag WHERE account_id = :id",[":flag" => 1, ":id" => $accountInfo["data"]["account_id"]]);
						$_SESSION["account"] = $accountInfo;	
						echo 0;
					}else{
						$timeSpan = strtotime($accountInfo['data']['time_span']);
						$currentTimeSpan = strtotime(date('Y-m-d h:i:s'));
						$timeSpanDiff = $currentTimeSpan - $timeSpan;
						
						if($timeSpanDiff >= 50){
							execSQL("UPDATE tbl_accounts","SET flag = :flag WHERE account_id = :id",[":flag" => 1, ":id" => $accountInfo["data"]["account_id"]]);
							$_SESSION["account"] = $accountInfo;	
							echo 0;
						}else{
							echo 1;
						}
					}
				}else{
					echo 2;
				}	
			}else{
				echo 3;
			}
 		}else{
			echo 3;
		}
		exit;
		
	}
	
	if($_POST["action"] == "logout"){
		execSQL("UPDATE tbl_accounts","SET flag = :flag WHERE account_id = :id",[":flag" => 0, ":id" => $_SESSION["account"]["data"]["account_id"]]);
		unset($_SESSION["account"]);
		exit;
	}
	
	if($_POST["action"] == "submitEmailAddress"){
		$emailAddress = $_POST["txt_email_address"];
		$account_info = execSQL("SELECT * FROM tbl_accounts","WHERE emailAddress = :emailAddress",[":emailAddress" => $emailAddress],"variable",1);
		
		$link = "";
		if(!empty($account_info)){
			$link = "rshschool.esy.es/rshs?pg=access&vw=resetPassword&dir=".sha1('reset_password')."&".sha1("account_id")."=".sha1($account_info["data"]["account_id"]);
			$name = $account_info['data']['username'];
			$message = "Hello $name, \n\n As you requested, we have sent you a link to reset your account's password. \n Go to this link ".$link.". \n\n .You can also modify your account information, after signing in, go to profile. Thankyou.";
		
			$from = 'rshschool.esy.es'; 
			$to = $emailAddress; 
			
			$subject = 'Password Reset.';
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html\r\n";
			$headers .= 'From: seschool.edu.ph \r\n' .
			'Reply-To: '.$emailAddress.'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message);
			
		}
		echo $link;
	}
	
	if($_POST["action"] == "resetPassword"){
		$id = $_POST["txt_account_id"];
		$new_password = $_POST["txt_new_password"];
		
		echo execSQL("UPDATE tbl_accounts","SET password = :password, hashPassword = :hashPassword WHERE hash_account_id = :id",[":id" => $id, ":password" => $new_password, ":hashPassword" => sha1($new_password)]);
		exit;
	}
	
	if($_POST["action"] == "forgot_password_form"){
		require_once($PATH_ACCESS."login/forgotPasswordForm.php");
		exit;
	}
	
	if($_POST["action"] == "monitor_acccount_session"){
		if(isset($_SESSION['account'])){
			$account_id = $_SESSION['account']["data"]["account_id"];
			execSQL('UPDATE tbl_accounts','SET time_span = :time_span WHERE account_id = :id',[':time_span' => date('Y-m-d h:i:s'), ':id' => $account_id]);
			echo "set";
		}else{
			echo "unset";
		}
		exit;
	}
	
	// =====================================================================================================================================================
	
	if($_POST["action"] == "badge_status"){
		$module = $_POST["module"];
		
		$sub_sql = "";
		$val = [];
		
		if($module == "accounts"){
			$sub_sql = "WHERE account_id != :id";
			$val = [":id" => 1];
		}
		
		$count = execSQL("SELECT * FROM tbl_".$module, $sub_sql, $val, "rows");
		echo $count;
		exit;
	}
	
	if($_POST["action"] == "getModuleList"){
		$module = $_POST["module"];
		
		if($module == "academic_eventss"){
			$colname = "academic_event_id";
		}elseif($module == "accounts"){
			$colname = "account_id";
		}elseif($module == "administrations"){
			$colname = "administration_id";
		}elseif($module == "alumni"){
			$colname = "alumni_id";
		}elseif($module == "announcements"){
			$colname = "announcement_id";
		}elseif($module == "bids_and_awards"){
			$colname = "bids_and_awards_id";
		}elseif($module == "citizen_charters"){
			$colname = "citizen_charter_id";
		}elseif($module == "curriculum"){
			$colname = "curriculum_id";
		}elseif($module == "departments"){
			$colname = "position";
		}elseif($module == "downloads"){
			$colname = "download_id";
		}elseif($module == "gallery"){
			$colname = "gallery_id";
		}elseif($module == "gallery_photos"){
			$colname = "gallery_photo_id";
		}elseif($module == "grade_level"){
			$colname = "grade_level_id";
		}elseif($module == "honors"){
			$colname = "honor_id";
		}elseif($module == "messages"){
			$colname = "message_id";
		}elseif($module == "news"){
			$colname = "news_id";
		}elseif($module == "positions"){
			$colname = "position_id";
		}elseif($module == "rshs_information"){
			$colname = "rshs_information_id";
		}elseif($module == "subjects"){
			$colname = "subject_id";
		}
		
		echo json_encode(execSQL("SELECT * FROM tbl_".$module." ORDER BY ".$colname." DESC","","","variable"));
		exit;
	}
	
	if($_POST["action"] == "setSessionArray"){
		$_SESSION[$_POST["session_name"]] = $_POST["data"];
		exit;
	}
	// ========================================= RSHS Information Functions ======================================
	
	if($_POST["action"] == "manageRshsInformation"){
		$newContent = sanitizeText($_POST["newContent"]);
		$informationField = $_POST["informationField"];
		
		echo execSQL("UPDATE tbl_rshs_information","SET $informationField = :informationField", [":informationField" => $newContent]);
		
		exit;
	}
	
	if($_POST["action"] == "requestForm"){
		
		$infoField = $_POST["infoField"];
		$rshs_info = execSQL("SELECT * FROM tbl_rshs_information","","","variable",1);
		
		if($infoField == "address"){
			 require_once($PATH_ADMIN."rshs_information/other_information/updateAddressForm.php");
		}elseif($infoField == "contact"){
			 require_once($PATH_ADMIN."rshs_information/other_information/updateContactForm.php");
		}elseif($infoField == "emailAddress"){
			 require_once($PATH_ADMIN."rshs_information/other_information/updateEmailAddressForm.php");
		}
		exit;
	}
	
	if($_POST["action"] == "saveNewSchoolSeal"){
		
		$selectedFile = $_FILES["school_seal"];
		$returnResult = validateFile($selectedFile);
		
		if($returnResult == 1){
			$fileName = $_FILES['school_seal']['name'];
			$fileSize = round(($selectedFile['size'] / 1024), 2);
			$sourcePath = $selectedFile['tmp_name'];
			$targetPath = $secondary_main_dir.$logo_dir;
			
			unlinkImage('tbl_rshs_information','rshs_information_id',1,$targetPath);
			move_uploaded_file($sourcePath,$targetPath.$fileName);
			execSQL('UPDATE tbl_rshs_information','SET image = :image',[':image' => $fileName]);
			
			echo $returnResult;
		}else{
			echo $returnResult;
		}
		exit;
	}
	
	if($_POST["action"] == "getOfficialLogo"){
		echo showSystemLogo();
		exit;
	}
	
	
	// ======================================= Bids & Awards Functions ===========================================
	
	if($_POST["action"] == "getBidsAndAwardsList"){
		echo json_encode(execSQL("SELECT * FROM tbl_bids_and_awards ORDER BY bids_and_awards_id DESC;","","","variable"));
		exit;
	}
	
	if($_POST["action"] == "addBidsAndAwardsForm"){
		require_once($PATH_ADMIN."rshs_information/bids_and_awards/addBidsAndAwardsForm.php");
	}
	
	if($_POST["action"] == "saveNewBidsAndAwards"){
		$title = $_POST["txt_title"];
		$description = $_POST["txt_description"];
		$image = $_FILES["image_file"]["name"];
		$imageName = "";
		
		if($image != ""){
			$file = $_FILES['image_file'];
			$imageName = generateFileName($file, 'tbl_bids_and_awards', 'image');
			$sourcePath = $_FILES['image_file']['tmp_name'];
			$targetPath = $secondary_main_dir.$bids_awards_dir;
			
			move_uploaded_file($sourcePath,$targetPath.$imageName);	
		}
		
		echo execSQL("
			INSERT INTO tbl_bids_and_awards(
				title,
				image,
				description
			)
			VALUES(
				:title,
				:image,
				:description
			);","",
			[
				":title" => $title,
				":image" => $imageName,
				":description" => $description
			]
		);
		
		exit;
	}
	
	if($_POST["action"] == "updateBidsAndAwardsForm"){
		$id = (int)$_POST["id"];
		$rshs_info = execSQL("SELECT * FROM tbl_bids_and_awards","WHERE bids_and_awards_id = :id",[":id" => $id],"variable",1);
		require_once($PATH_ADMIN."rshs_information/bids_and_awards/updateBidsAndAwardsForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveUpdateBidsAndAwards"){
		$id = $_POST["id"];
		$title = $_POST["txt_title"];
		$description = $_POST["txt_description"];
		$filename = $_POST["txt_update_image"];
		$file = $_FILES['image_file'];
		
		if($filename && $file["name"]){
			$targetPath = $secondary_main_dir.$bids_awards_dir;
			unlinkImage('tbl_bids_and_awards','bids_and_awards_id',$id,$targetPath);
			$imageName = generateFileName($file,'tbl_bids_and_awards', 'image');
			$sourcePath = $_FILES['image_file']['tmp_name'];
			
			move_uploaded_file($sourcePath, $targetPath.$imageName);
			execSQL("UPDATE tbl_bids_and_awards","SET image = :image WHERE bids_and_awards_id = :id",[":image" => $imageName, ":id" => $id]);
			
		}elseif(!$filename && !$file["name"]){
			$imageName = "";
			$targetPath = $secondary_main_dir.$bids_awards_dir;
			unlinkImage('tbl_bids_and_awards','bids_and_awards_id',$id,$targetPath);
			execSQL("UPDATE tbl_bids_and_awards","SET image = :image WHERE bids_and_awards_id = :id",[":image" => $imageName, ":id" => $id]);
		}
		
		echo execSQL(
			"UPDATE
				tbl_bids_and_awards",
			"SET 
				title = :title,
				description = :description
			WHERE 
				bids_and_awards_id = :id
			",
			[
				":title" => $title,
				":description" => $description,
				":id" => $id
			]
		);
		exit;
	}
	
	if($_POST["action"] == "removeBidsAndAwards"){
		$id= $_POST["id"];
		unlinkImage('tbl_bids_and_awards', 'bids_and_awards_id', $id, $secondary_main_dir.$bids_awards_dir);
		echo execSQL("DELETE FROM tbl_bids_and_awards","WHERE bids_and_awards_id = :id",[":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "postUnpostBidsAndAwards"){
		$id = $_POST["id"];
		$status = $_POST["status"];
		echo execSQL("UPDATE tbl_bids_and_awards","SET status = :status WHERE bids_and_awards_id = :id",[":status" => $status, ":id" => $id]);
		exit;
	}
	
	// ====================================== Citizen Charter Functions =========================================
	
	if($_POST["action"] == "getCitizenCharter"){
		echo json_encode(execSQL("SELECT * FROM tbl_citizen_charters ORDER BY citizen_charter_id DESC","","","variable"));
		exit;
	}
	
	if($_POST["action"] == "addCitizenCharterForm"){
		require_once($PATH_ADMIN."rshs_information/citizen_charters/addCitizenCharterForm.php");
	}
	
	if($_POST["action"] == "saveNewCitizenCharter"){
		$title = $_POST["txt_title"];
		$description = $_POST["txt_description"];
		$image = $_FILES["image_file"]["name"];
		$imageName = "";
		
		if($image != ""){
			$file = $_FILES['image_file'];
			$imageName = generateFileName($file, 'tbl_citizen_charters', 'image');
			$sourcePath = $_FILES['image_file']['tmp_name'];
			$targetPath = $secondary_main_dir.$citizen_charters_dir;
			
			move_uploaded_file($sourcePath,$targetPath.$imageName);	
		}
		
		echo execSQL("
			INSERT INTO tbl_citizen_charters(
				title,
				image,
				description
			)
			VALUES(
				:title,
				:image,
				:description
			);","",
			[
				":title" => $title,
				":image" => $imageName,
				":description" => $description
			]
		);
		
		exit;
	}
	
	if($_POST["action"] == "updateCitizenCharterForm"){
		$id = (int)$_POST["id"];
		$cc_info = execSQL("SELECT * FROM tbl_citizen_charters","WHERE citizen_charter_id = :id",[":id" => $id],"variable",1);
		require_once($PATH_ADMIN."rshs_information/citizen_charters/updateCitizenCharterForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveUpdateCitizenCharter"){
		
		$id = $_POST["id"];
		$title = $_POST["txt_title"];
		$description = $_POST["txt_description"];
		$filename = $_POST["txt_update_image"];
		$file = $_FILES['image_file'];
		
		if($filename && $file["name"]){
			
			$targetPath = $secondary_main_dir.$citizen_charters_dir;
			$imageName = generateFileName($file,'tbl_citizen_charters', 'image');
			$sourcePath = $_FILES['image_file']['tmp_name'];
			unlinkImage('tbl_citizen_charters','citizen_charter_id',$id,$targetPath);
			move_uploaded_file($sourcePath, $targetPath.$imageName);
			
			execSQL("UPDATE tbl_citizen_charters","SET image = :image WHERE citizen_charter_id = :id",[":id" => $id, ":image" => $imageName]);
			
		}elseif(!$filename && !$file["name"]){
			$imageName = "";
			$targetPath = $secondary_main_dir.$citizen_charters_dir;
			unlinkImage('tbl_citizen_charters','citizen_charter_id',$id,$targetPath);
			execSQL("UPDATE tbl_citizen_charters","SET image = :image WHERE citizen_charter_id = :id",[":id" => $id, ":image" => $imageName]);
		}
		
		echo execSQL(
			"UPDATE
				tbl_citizen_charters",
			"SET 
				title = :title,
				description = :description
			WHERE 
				citizen_charter_id = :id
			",
			[
				":title" => $title,
				":description" => $description,
				":id" => $id
			]
		);
		exit;
	}
	
	if($_POST["action"] == "removeCitizenCharter"){
		$id= $_POST["id"];
		unlinkImage('tbl_citizen_charters', 'citizen_charter_id', $id, $secondary_main_dir.$citizen_charters_dir);
		echo execSQL("DELETE FROM tbl_citizen_charters","WHERE citizen_charter_id = :id",[":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "postUnpostCitizenCharter"){
		$id = $_POST["id"];
		$status = $_POST["status"];
		echo execSQL("UPDATE tbl_citizen_charters","SET status = :status WHERE citizen_charter_id = :id",[":status" => $status, ":id" => $id]);
		exit;
	}
	
	
	// ============================================= Manage School News ===========================================
	
	if($_POST["action"] == "getNewsList"){
		echo json_encode(execSQL("SELECT * FROM tbl_news ORDER BY news_id DESC","","","variable"));
		exit;
	}
	
	if($_POST["action"] == "addNewNews"){
		$title = $_POST["txt_news_title"];
		$description = $_POST["txt_news_description"];
		$image = $_FILES["img_news"]["name"];
		$date = $_POST["txt_news_date"];
		$imageName = "";
		
		if($image != ""){
			$file = $_FILES['img_news'];
			$imageName = generateFileName($file, 'tbl_news', 'image');
			$sourcePath = $_FILES['img_news']['tmp_name'];
			$targetPath = $secondary_main_dir.$news_dir;
			
			move_uploaded_file($sourcePath,$targetPath.$imageName);	
		}
		
		echo execSQL("INSERT INTO tbl_news(title, description, image, date_submitted) VALUE(:title, :description, :image, :date_submitted)","",
		[
			":title" => $title,
			":description" => $description,
			":image" => $imageName,
			":date_submitted" => $date
 		]);
		exit;
	}
	
	if($_POST["action"] == "saveUpdateNews"){
		
		$id = $_POST["id"];
		$title = $_POST["txt_news_title"];
		$description = $_POST["txt_news_description"];
		$date = $_POST["txt_news_date"];
		$filename = $_POST["txt_img_news"];
		$file = $_FILES['img_news'];
		
		if($filename && $file["name"]){
			$targetPath = $secondary_main_dir.$news_dir;
			$imageName = generateFileName($file,'tbl_news', 'image');
			$sourcePath = $_FILES['img_news']['tmp_name'];
			unlinkImage('tbl_news','news_id',$id, $targetPath);
			move_uploaded_file($sourcePath, $targetPath.$imageName);
			
			execSQL("UPDATE tbl_news","SET image = :image WHERE news_id = :id",[":image" => $imageName, ":id" => $id]);
		}elseif(!$filename && !$file["name"]){
			$imageName = "";
			$targetPath = $secondary_main_dir.$news_dir;
			unlinkImage('tbl_news','news_id',$id,$targetPath);
			execSQL("UPDATE tbl_news","SET image = :image WHERE news_id = :id",[":image" => $imageName, ":id" => $id]);
		}
		
		echo execSQL(
			"UPDATE tbl_news",
			"SET 
				title = :title,
				description = :description,
				date_submitted = :date_submitted
			WHERE 
				news_id = :id",
			[
				":title" => $title, 
				":description" => $description,
				":date_submitted" => $date,
				":id" => $id
			]
		);
		exit;
	}
	
	if($_POST["action"] == "removeNews"){
		$id = $_POST["id"];
		unlinkImage('tbl_news', 'news_id', $id, $secondary_main_dir.$news_dir);
		echo execSQL("DELETE FROM tbl_news","WHERE news_id = :id",[":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "postUnpostNews"){
		$id = $_POST["id"];
		$status = $_POST["status"];
		echo execSQL("UPDATE tbl_news","SET status = :status WHERE news_id = :id",[":status" => $status, ":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "viewNewsDetails"){
		$id = $_POST["id"];
		$news = execSQL("SELECT * FROM tbl_news", "WHERE news_id = :id",[":id" => $id],"variable", 1);
		require_once($PATH_ADMIN."news/viewNewsForm.php");
		exit;
	}
	
	
	
	// ========================================= Manage Announcements ==================================
	if($_POST["action"] == "getAnnouncementsList"){
		echo json_encode(execSQL("SELECT * FROM tbl_announcements ORDER BY announcement_id DESC","","","variable"));
		exit;
	}
	
	if($_POST["action"] == "addNewAnnouncement"){
		$title = $_POST["txt_announcement_title"];
		$description = $_POST["txt_announcement_description"];
		$image = $_FILES["img_announcement"]["name"];
		$date = $_POST["txt_announcement_date"];
		$imageName = "";
		
		if($image != ""){
			$file = $_FILES['img_announcement'];
			$imageName = generateFileName($file, 'tbl_announcements', 'image');
			$sourcePath = $_FILES['img_announcement']['tmp_name'];
			$targetPath = $secondary_main_dir.$announcements_dir;
			
			move_uploaded_file($sourcePath,$targetPath.$imageName);	
		}
		
		echo execSQL("INSERT INTO tbl_announcements(title, description, image, date) VALUE(:title, :description, :image, :date)","",
		[
			":title" => $title,
			":description" => $description,
			":image" => $imageName,
			":date" => $date
 		]);
		exit;
	}
	
	if($_POST["action"] == "saveUpdateAnnouncement"){
		
		$id = $_POST["id"];
		$title = $_POST["txt_announcement_title"];
		$description = $_POST["txt_announcement_description"];
		$date = $_POST["txt_announcement_date"];
		$filename = $_POST["txt_img_announcement"];
		$file = $_FILES['img_announcement'];
		
		if($filename && $file["name"]){
			$targetPath = $secondary_main_dir.$announcements_dir;
			$imageName = generateFileName($file,'tbl_announcements', 'image');
			$sourcePath = $_FILES['img_announcement']['tmp_name'];
			unlinkImage('tbl_announcements','announcement_id',$id, $targetPath);
			move_uploaded_file($sourcePath, $targetPath.$imageName);
			execSQL("UPDATE tbl_announcements","SET image = :image WHERE announcement_id = :id",[":image" => $imageName, ":id" => $id]);
		}elseif(!$filename && !$file["name"]){
			$imageName = "";
			$targetPath = $secondary_main_dir.$announcements_dir;
			unlinkImage('tbl_announcements','announcement_id',$id,$targetPath);
			execSQL("UPDATE tbl_announcements","SET image = :image WHERE announcement_id = :id",[":image" => $imageName, ":id" => $id]);
		}
		
		echo execSQL(
			"UPDATE tbl_announcements",
			"SET 
				title = :title,
				description = :description,
				date = :date
			WHERE 
				announcement_id = :id",
			[
				":title" => $title, 
				":description" => $description,
				":date" => $date,
				":id" => $id
			]
		);
		exit;
	}
	
	if($_POST["action"] == "removeAnnouncement"){
		$id = $_POST["id"];
		unlinkImage('tbl_announcements', 'announcement_id', $id,$secondary_main_dir.$announcements_dir);
		echo execSQL("DELETE FROM tbl_announcements","WHERE announcement_id = :id",[":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "postUnpostAnnouncement"){
		$id = $_POST["id"];
		$status = $_POST["status"];
		echo execSQL("UPDATE tbl_announcements","SET status = :status WHERE announcement_id = :id",[":status" => $status, ":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "viewAnnouncementDetails"){
		$id = $_POST["id"];
		$announcement = execSQL("SELECT * FROM tbl_announcements", "WHERE announcement_id = :id",[":id" => $id],"variable", 1);
		require_once($PATH_ADMIN."announcements/viewAnnouncementForm.php");
		exit;
	}
	
	
	// =============================================== Manage Academic Events ==================================
	
	if($_POST["action"] == "getAcademicEventsList"){
		
		$academic_events = execSQL("SELECT * FROM tbl_academic_events","","","variable");
		$get_academic_events = null;
		foreach($academic_events as $academic){
			$bg_color = $academic["data"]["status"] == 1 ? "#26B99A" : "#f0ad4e";
			$get_academic_events[] = array("academic_event_id" => $academic["data"]["academic_event_id"], "title" => $academic["data"]["title"], "start" => date("m/d/Y", strtotime($academic["data"]["date"])), "description" => $academic["data"]["description"], "backgroundColor" => $bg_color);
		}	
		
		echo json_encode($get_academic_events);
		exit;
	}
	
	if($_POST["action"] == "addAcademicEventForm"){
		require_once($PATH_ADMIN."academics/academic_events/addAcademicEventForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveNewAcademicEvent"){
		$title = $_POST["txt_academic_event_title"];
		$date = date("Y-m-d", strtotime($_POST["txt_academic_event_date"]));
		$description = $_POST["txt_academic_event_description"];
		$image = $_FILES["image_file"];
		
		if($image["name"]){
			$imageName = generateFileName($image, 'tbl_academic_events', 'image');
			$sourcePath = $image['tmp_name'];
			$targetPath = $secondary_main_dir.$academic_events_dir;
			
			move_uploaded_file($sourcePath, $targetPath.$imageName);	
		}
		
		echo execSQL("INSERT INTO tbl_academic_events(title, date, description, image) VALUES(:title, :date, :description, :image)","",
		[":title" => $title, ":date" => $date, ":description" => $description, ":image" => $imageName]);
		
		exit;
	}
	
	if($_POST["action"] == "viewAcademicEventForm"){
		$id = $_POST["id"];
		$academic_event_info = execSQL("SELECT * FROM tbl_academic_events", "WHERE academic_event_id = :id", [":id" => $id],"variable",1);
		require_once($PATH_ADMIN."academics/academic_events/viewAcademicEventForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveUpdateAcademicEvent"){
		$id = $_POST["id"];
		$title = $_POST["txt_academic_event_title"];
		$date = $_POST["txt_academic_event_date"];
		$description = $_POST["txt_academic_event_description"];
		$filename = $_POST["txt_update_image"];
		$file = $_FILES['image_file'];
		
		if($filename && $file["name"]){
			$targetPath = $secondary_main_dir.$academic_events_dir;
			$imageName = generateFileName($file,'tbl_academic_events', 'image');
			$sourcePath = $file['tmp_name'];
			unlinkImage('tbl_academic_events','academic_event_id',$id, $targetPath);
			move_uploaded_file($sourcePath, $targetPath.$imageName);
			execSQL("UPDATE tbl_academic_events","SET image = :image WHERE academic_event_id = :id",[":image" => $imageName, ":id" => $id]);
		}elseif(!$filename && !$file["name"]){
			$imageName = "";
			$targetPath = $secondary_main_dir.$academic_events_dir;
			unlinkImage('tbl_academic_events','academic_event_id',$id,$targetPath);
			execSQL("UPDATE tbl_academic_events","SET image = :image WHERE academic_event_id = :id",[":image" => $imageName, ":id" => $id]);
		}
		
		echo execSQL("UPDATE tbl_academic_events 
		","SET title = :title, date = :date, description = :description WHERE academic_event_id = :id", 
		[":title" => $title, ":date" => $date, ":description" => $description, ":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "removeAcademicEvent"){
		$id = $_POST["id"];
		echo execSQL("DELETE FROM tbl_academic_events","WHERE academic_event_id = :id",[":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "postUnpostAcademicEvent"){
		$id = $_POST["id"];
		$status = $_POST["status"];
		
		echo execSQL("UPDATE tbl_academic_events","SET status = :status WHERE academic_event_id = :id",[":status" => $status, ":id" => $id]);
		exit;
	}
	
	// ====================================== Manage Curriculum =============================================
	
	if($_POST["action"] == "addCurriculumForm"){
		require_once($PATH_ADMIN."academics/curriculum/addCurriculumForm.php");
	}
	
	if($_POST["action"] == "saveNewCurriculum"){
		$grade_level = $_POST["grade_level"];
		$subject_list = $_POST["subject_list"];
		
		foreach($subject_list as $subject){
			execSQL("INSERT INTO tbl_curriculum(grade_level_id, subject_id) VALUES(:grade_level_id, :subject_id)","",[":grade_level_id" => $grade_level, ":subject_id" => $subject["id"]]);
		}
		exit;
	}
	
	if($_POST["action"] == "removeSubjectFromGrade"){
		$id = $_POST["id"];
		echo execSQL("DELETE FROM tbl_curriculum","WHERE curriculum_id = :id",[":id" => $id]);
		exit;
	}
	
	// ===================================== Manage Subjects ====================================================
	
		if($_POST["action"] == "verifyRemoveSubject"){
		$id = $_POST["id"];
		$verify = execSQL("SELECT * FROM tbl_curriculum","WHERE subject_id = :id",[":id" => $id],"variable");
		echo !empty($verify) ? 1 : 0;
		exit;
	}
	
	if($_POST["action"] == "verifySelectedSubjectFromOriginalList"){
		$id = $_POST["id"];
		$grade_level_id = $_POST["grade_level_id"];
		$verify = execSQL("SELECT * FROM tbl_curriculum","WHERE subject_id = :id AND grade_level_id = :grade_level_id ",[":id" => $id, ":grade_level_id" => $grade_level_id],"variable");
		echo !empty($verify) ? 1 : 0;
		exit;
		
	}
	
	if($_POST["action"] == "verifyNewSubject"){
		$name = $_POST["name"];
		$verify = execSQL("SELECT * FROM tbl_subjects","WHERE name = :name",[":name" => $name],"variable");
		echo !empty($verify) ? 1 : 0;
		exit;
	}
	
	if($_POST["action"] == "addSubjectForm"){
		require_once($PATH_ADMIN."academics/curriculum/addSubjectForm.php");
	}
	
	if($_POST["action"] == "saveNewSubject"){
		$name = $_POST["txt_subject_name"];
		echo execSQL("INSERT INTO tbl_subjects(name) VALUES(:name)","",[":name" => $name]);
		exit;
	}
	
	if($_POST["action"] == "saveUpdateSubject"){
		$id = $_POST["id"];
		$name = $_POST["name"];
		echo execSQL("UPDATE tbl_subjects","SET name = :name WHERE subject_id = :id",[":name" => $name, ":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "removeSubject"){
		$id = $_POST["id"];
		echo execSQL("DELETE FROM tbl_subjects","WHERE subject_id = :id",[":id" => $id]);
		exit;
	}
	
	// ==================================== Manage Honor Functions ================================
	if($_POST["action"] == "addHonorForm"){
		require_once($PATH_ADMIN."academics/honors/addHonorForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveNewHonor"){
		$grade_level_id = $_POST["txt_grade_level_id"];
		$firstname = $_POST["txt_firstname"];
		$lastname = $_POST["txt_lastname"];
		$middlename = $_POST["txt_middlename"];
		
		echo execSQL("INSERT INTO
			tbl_honors(
				grade_level_id, 
				firstname, 
				middlename, 
				lastname
			) VALUES(
				:grade_level_id, 
				:firstname, 
				:middlename, 
				:lastname
			)","",
			[
				":grade_level_id" => $grade_level_id, 
				":firstname" => $firstname, 
				":middlename" => $middlename, 
				":lastname" => $lastname]
			);
		exit;
		
	}
	
	if($_POST["action"] == "updateHonorForm"){
		$id = $_POST["id"];
		$honor = execSQL("SELECT * FROM tbl_honors","WHERE honor_id = :id",[":id" => $id],"variable",1);
		require_once($PATH_ADMIN."academics/honors/updateHonorForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveUpdateHonor"){
		$id = $_POST["id"];
		$grade_level_id = $_POST["txt_grade_level_id"];
		$firstname = $_POST["txt_firstname"];
		$middlename = $_POST["txt_middlename"];
		$lastname = $_POST["txt_lastname"];
		
		echo execSQL(
			"UPDATE 
				tbl_honors",
			"SET 
				grade_level_id = :grade_level_id,
				firstname = :firstname,
				middlename = :middlename, 
				lastname = :lastname 
			WHERE 
				honor_id = :id",
			[
				":grade_level_id" => $grade_level_id,
				":firstname" => $firstname,
				":middlename" => $middlename,
				":lastname" => $lastname,
				":id" => $id
			]
		);
		
		exit;
	}
	
	if($_POST["action"] == "removeHonor"){
		$id = $_POST["id"];
		echo execSQL("DELETE FROM tbl_honors","WHERE honor_id = :id",[":id" => $id]);
		exit;
	}
	
	
	// ============================================ Manage Department ======================================
	
	if($_POST["action"] == "saveNewDepartment"){
		$name = $_POST["name"];
		
		execSQL("INSERT INTO tbl_departments(name) VALUES(:name)","",[":name" => $name]);
		$dept = execSQL("SELECT * FROM tbl_departments ORDER BY department_id DESC LIMIT 1","","","variable", 1);
		execSQL("UPDATE tbl_departments","SET position = :position WHERE department_id = :id", [":position" => $dept["data"]["department_id"], ":id" => $dept["data"]["department_id"]]);
		
		$departments = execSQL("SELECT * FROM tbl_departments ORDER BY position DESC","","","variable");
		
		$first_dept = NULL;
		$principal_dept = NULL;
		
		foreach($departments as $index => $department){
			if($index == 0){
				$first_dept = $department["data"];
			}
			
			if(preg_match("/principal/i", $department["data"]["name"])){
				$principal_dept = $department["data"];
			}
		}
		
		print_r($first_dept);
		print_r($principal_dept);
		
		execSQL("UPDATE tbl_departments","SET position = :position WHERE department_id = :id",[":position" => $principal_dept["position"], ":id" => $first_dept["department_id"]]);
		
		execSQL("UPDATE tbl_departments","SET position = :position WHERE department_id = :id",[":position" => $first_dept["position"], ":id" => $principal_dept["department_id"]]);
		
		
		exit;
	}
	
	if($_POST["action"] == "saveUpdateDepartment"){
		$id = $_POST["id"];
		$name = $_POST["name"];
		
		echo execSQL(
			"UPDATE 
				tbl_departments",
			"SET 
				name = :name 
			WHERE 
				department_id = :id;",
			[
				":name" => $name,
				":id" => $id
			]
		);
		
		exit;
	}
	
	if($_POST["action"] == "removeDepartment"){
		$id = $_POST["id"];
		echo execSQL("DELETE FROM tbl_departments","WHERE department_id = :id",[":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "verifyDepartmentIfExistsInAdministration"){
		$id = $_POST["id"];
		$verify = execSQL("SELECT * FROM tbl_administrations","WHERE department_id = :id",[":id" => $id],"rows");
		echo $verify > 0 ? 1 : 0;
		exit;
	}
	
	// ============================================== Manage Positions Functions ================================
	
	if($_POST["action"] == "saveNewPosition"){
		$name = $_POST["name"];
		echo execSQL("INSERT INTO tbl_positions(name) VALUES(:name)","",[":name" => $name]);
		exit;
	}
	
	if($_POST["action"] == "saveUpdatePosition"){
		$id = $_POST["id"];
		$name = $_POST["name"];
		
		
		echo execSQL(
			"UPDATE 
				tbl_positions",
			"SET 
				name = :name 
			WHERE 
				position_id = :id;",
			[
				":name" => $name,
				":id" => $id
			]
		);
		exit;
	}
	
	if($_POST["action"] == "removePosition"){
		$id = $_POST["id"];
		echo execSQL("DELETE FROM tbl_positions","WHERE position_id = :id",[":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "verifyIfPositionExistsInAdministration"){
		$id = $_POST["id"];
		$verify = execSQL("SELECT * FROM tbl_administrations","WHERE position_id = :id",[":id" => $id],"rows");
		echo $verify > 0 ? 1 : 0;
		exit;
	}
	
	// ===================================== Manage Administration Functions ================================
	
	if($_POST["action"] == "addAdministrationForm"){
		require_once($PATH_ADMIN."administration/addAdministrationForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveNewAdministration"){
		
		$firstname = $_POST["txt_firstname"];
		$middlename = $_POST["txt_middlename"];
		$lastname = $_POST["txt_lastname"];
		$department_id = $_POST["txt_department"];
		$position_id = $_POST["txt_position"];
		$image = $_FILES["image_file"]["name"];
		
		if($image != ""){
			$file = $_FILES['image_file'];
			$imageName = generateFileName($file, 'tbl_administrations', 'image');
			
			$sourcePath = $_FILES['image_file']['tmp_name'];
			$targetPath = $secondary_main_dir.$administrations_dir;
			move_uploaded_file($sourcePath, $targetPath.$imageName);	
		}else{
			$imageName = "";
		}
		
		echo execSQL(
			"INSERT INTO 
				tbl_administrations(
					department_id,
					position_id,
					firstname,
					middlename,
					lastname,
					image
				)
			VALUES(
				:department_id,
				:position_id,
				:firstname,
				:middlename,
				:lastname,
				:image
			)","",
			[
				":department_id" => $department_id,
				":position_id" => $position_id,
				":firstname" => $firstname,
				":middlename" => $middlename,
				":lastname" => $lastname,
				":image" => $imageName
			]
		);
		
		exit;
	}
	
	if($_POST["action"] == "updateAdministrationForm"){
		$id = $_POST["id"];
		$administration = execSQL("SELECT * FROM tbl_administrations","WHERE administration_id = :id",[":id" => $id],"variable",1);
		require_once($PATH_ADMIN."administration/updateAdministrationForm.php");
	}
	
	if($_POST["action"] == "saveUpdateAdministration"){
		$id = $_POST["id"];
		$firstname = $_POST["txt_firstname"];
		$middlename = $_POST["txt_middlename"];
		$lastname = $_POST["txt_lastname"];
		$department_id = $_POST["txt_department"];
		$position_id = $_POST["txt_position"];
		$filename = $_POST["txt_update_image"];
		$file = $_FILES['image_file'];
		
		if($filename && $file["name"]){
			$targetPath = $secondary_main_dir.$administrations_dir;
			$imageName = generateFileName($file,'tbl_administrations', 'image');
			$sourcePath = $file['tmp_name'];
			unlinkImage('tbl_administrations','administration_id',$id, $targetPath);
			move_uploaded_file($sourcePath, $targetPath.$imageName);
			
			execSQL("UPDATE tbl_administrations","SET image = :image WHERE administration_id = :id",[":image" => $imageName, ":id" => $id]);
			
		}elseif(!$filename && !$file["name"]){
			$imageName = "";
			$targetPath = $secondary_main_dir.$administrations_dir;
			unlinkImage('tbl_administrations', 'administration_id', $id, $targetPath);
			execSQL("UPDATE tbl_administrations","SET image = :image WHERE administration_id = :id",[":image" => $imageName, ":id" => $id]);
		}
		
		echo execSQL(
			"UPDATE 
				tbl_administrations",
			"SET
				department_id = :department_id,
				position_id = :position_id,
				firstname = :firstname,
				middlename = :middlename,
				lastname = :lastname
			WHERE 
				administration_id = :id",
			[
				":department_id" => $department_id,
				":position_id" => $position_id,
				":firstname" => $firstname,
				":middlename" => $middlename,
				":lastname" => $lastname,
				":id" => $id
			]
		);
		
		exit;
	}
	
	if($_POST["action"] == "removeAdministration"){
		$id = $_POST["id"];
		echo execSQL("DELETE FROM tbl_administrations","WHERE administration_id = :id",[":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "activateDeactivateAdministration"){
		$id = $_POST["id"];
		$status = $_POST["status"];
		
		echo execSQL("UPDATE tbl_administrations","SET status = :status WHERE administration_id = :id",[":status" => $status, ":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "viewAdministrationDetail"){
		$id = $_POST["id"];
		$administration = execSQL("SELECT * FROM tbl_administrations","WHERE administration_id = :id",[":id" => $id],"variable",1);
		require_once($PATH_ADMIN."administration/viewAdministrationDetail.php");
		exit;
	}
	
	// ========================================== Manage Alumni List Functions ==========================================
	
	if($_POST["action"] == "addAlumniForm"){
		require_once($PATH_ADMIN."alumni_list/addAlumniForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveNewAlumni"){
		
		$firstname = $_POST["txt_firstname"];
		$middlename = $_POST["txt_middlename"];
		$lastname = $_POST["txt_lastname"];
		$venue = $_POST["txt_venue_graduated"];
		$year_graduated = $_POST["txt_year_graduated"];
		
		echo execSQL(
			"INSERT INTO tbl_alumni(
				venue,
				yearGraduated,
				firstname,
				middlename,
				lastname
			)VALUES(
				:venue,
				:yearGraduated,
				:firstname,
				:middlename,
				:lastname
			)","",
			[
				":venue" => $venue,
				":yearGraduated" => $year_graduated,
				":firstname" => $firstname,
				":middlename" => $middlename,
				":lastname" => $lastname
			]
		);
		
		exit;
	}
	
	if($_POST["action"] == "updateALumniForm"){
		$id = $_POST["id"];
		$alumni = execSQL("SELECT * FROM tbl_alumni","WHERE alumni_id = :id",[":id" => $id],"variable",1);
		require_once($PATH_ADMIN."alumni_list/updateAlumniForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveUpdateAlumni"){
		
		$id = $_POST["id"];
		$firstname = $_POST["txt_firstname"];
		$middlename = $_POST["txt_middlename"];
		$lastname = $_POST["txt_lastname"];
		$venue = $_POST["txt_venue_graduated"];
		$year_graduated = $_POST["txt_year_graduated"];
		
		echo execSQL(
			"UPDATE 
				tbl_alumni",
			"SET
				venue = :venue,
				yearGraduated = :yearGraduated,
				firstname = :firstname,
				middlename = :middlename,
				lastname = :lastname
			WHERE 
				alumni_id = :id",
			[
				":venue" => $venue,
				":yearGraduated" => $year_graduated,
				":firstname" => $firstname,
				":middlename" => $middlename,
				":lastname" => $lastname,
				":id" => $id
			]
		);
		
		exit;
	}
	
	if($_POST["action"] == "removeAlumni"){
		$id = $_POST["id"];
		echo execSQL("DELETE FROM tbl_alumni","WHERE alumni_id = :id",[":id" => $id]);
		exit;
	}
	
	// ============================================ Manage Transparency Seal Functions ===================================
	
	if($_POST["action"] == "addTransparencySealForm"){
		require_once($PATH_ADMIN."transparency_seal/addTransparencySealForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveNewTransparencySeal"){
		$title = $_POST["txt_title"];
		$date = $_POST["txt_date"];
		$description = $_POST["txt_description"];
		$image = $_FILES["image_file"]["name"];
		
		if($image != ""){
			$file = $_FILES['image_file'];
			$imageName = generateFileName($file, 'tbl_transparency_seal', 'image');
			
			$sourcePath = $_FILES['image_file']['tmp_name'];
			$targetPath = $secondary_main_dir.$transparency_seal_dir;
			move_uploaded_file($sourcePath, $targetPath.$imageName);	
		}else{
			$imageName = "";
		}
		
		echo execSQL(
			"INSERT INTO tbl_transparency_seal(
				title,
				description,
				image, 
				date
			) VALUES(
				:title,
				:description,
				:image,
				:date
			)","",
			[
				":title" => $title,
				":description" => $description,
				":image" => $imageName,
				":date" => $date
			]
		);
		exit;
	}
	
	if($_POST["action"] == "updateTransparencySealForm"){
		$id = $_POST["id"];
		$transparency_seal = execSQL("SELECT * FROM tbl_transparency_seal","WHERE transparency_seal_id = :id",[":id" => $id],"variable",1);
		require_once($PATH_ADMIN."transparency_seal/updateTransparencySealForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveUpdateTransparencySeal"){
		
		$id = $_POST["id"];
		$title = $_POST["txt_title"];
		$date = $_POST["txt_date"];
		$description = $_POST["txt_description"];
		$filename = $_POST["txt_update_image"];
		$file = $_FILES['image_file'];
		
		if($filename && $file["name"]){
			$targetPath = $secondary_main_dir.$transparency_seal_dir;
			$imageName = generateFileName($file,'tbl_transparency_seal', 'image');
			$sourcePath = $file['tmp_name'];
			unlinkImage('tbl_transparency_seal','transparency_seal_id',$id, $targetPath);
			move_uploaded_file($sourcePath, $targetPath.$imageName);
			
			execSQL("UPDATE tbl_transparency_seal","SET image = :image WHERE transparency_seal_id = :id",[":image" => $imageName, ":id" => $id]);
			
		}elseif(!$filename && !$file["name"]){
			$imageName = "";
			$targetPath = $secondary_main_dir.$transparency_seal_dir;
			unlinkImage('tbl_transparency_seal', 'transparency_seal_id', $id, $targetPath);
			execSQL("UPDATE tbl_transparency_seal","SET image = :image WHERE transparency_seal_id = :id",[":image" => $imageName, ":id" => $id]);
		}
		
		echo execSQL(
			"UPDATE tbl_transparency_seal",
			"SET 
				title = :title,
				description = :description,
				date = :date
			WHERE
				transparency_seal_id = :id",
			[
				":title" => $title,
				":description" => $description,
				":date" => $date,
				":id" => $id
			]
		);
		exit;
	}
	
	if($_POST["action"] == "removeTransparencySeal"){
		$id = $_POST["id"];
		$targetPath = $secondary_main_dir.$transparency_seal_dir;
		unlinkImage('tbl_transparency_seal', 'transparency_seal_id', $id, $targetPath);
		echo execSQL("DELETE FROM tbl_transparency_seal","WHERE transparency_seal_id = :id",[":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "postUnpostTransparencySeal"){
		$id = $_POST["id"];
		$status = $_POST["status"];

		echo execSQL("UPDATE tbl_transparency_seal","SET status = :status WHERE transparency_seal_id = :id",[":id" => $id, ":status" => $status]);
		exit;
	}
	
	
	
	// ======================================== Manage Download Functions ========================================
	
	if($_POST["action"] == "saveNewFile"){
		$file = $_FILES["download_file"];
		$date = $_POST["txt_date"];
		$caption = $_POST["txt_caption"];
		
		if($file["name"] != ""){
			$file_alias_name = generateFileName($file, 'tbl_downloads', 'file');
			$filename = $file["name"] ;
			$filesize = $file["size"];
			
			$sourcePath = $file['tmp_name'];
			$targetPath = $secondary_main_dir.$downloads_dir;
			move_uploaded_file($sourcePath, $targetPath.$file_alias_name);
		}else{
			$file_alias_name = "";
			$filename = "";
			$filesize = 0;
		}
		
		echo execSQL("INSERT INTO tbl_downloads(caption, file, dateUploaded, filename, filesize) VALUES(:caption, :file, :dateUploaded, :filename, :filesize)","",
		[":caption" => $caption, ":file" => $file_alias_name, ":dateUploaded" => $date, ":filename" => $filename, ":filesize" => $filesize]);
		exit;
	}
	
	if($_POST["action"] == "updateFileForm"){
		$id = $_POST["id"];
		$download = execSQL("SELECT * FROM tbl_downloads","WHERE download_id = :id",[":id" => $id], "variable",1);
		require_once($PATH_ADMIN."downloads/updateFileForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveUpdateFile"){
		
		$id = $_POST["id"];
		$caption = $_POST["txt_caption"];
		$date = $_POST["txt_date"];
		$file_content = $_POST["txt_update_file"];
		$file = $_FILES["download_file"];
		
		if($file_content && $file["name"]){
			
			$file_alias_name = generateFileName($file, 'tbl_downloads', 'file');
			$filename = $file["name"] ;
			$filesize = $file["size"];
			$sourcePath = $file['tmp_name'];
			$targetPath = $secondary_main_dir.$downloads_dir;
			unlinkImage('tbl_downloads','download_id',$id, $targetPath, "file");
			move_uploaded_file($sourcePath, $targetPath.$file_alias_name);
			execSQL("UPDATE tbl_downloads","SET file = :file, filename = :filename, filesize = :filesize WHERE download_id = :id",[":file" => $file_alias_name, ":filename" => $filename, ":filesize" => $filesize, ":id" => $id]);
			
		}elseif(!$file_content && !$file["name"]){
			$file_alias_name = "";
			$filename = "";
			$filesize = 0;
			$targetPath = $secondary_main_dir.$downloads_dir;
			unlinkImage('tbl_downloads','download_id',$id, $targetPath, "file");
			
			execSQL("UPDATE tbl_downloads","SET file = :file, filename = :filename, filesize = :filesize WHERE download_id = :id",[":file" => $file_alias_name, ":filename" => $filename, ":filesize" => $filesize, ":id" => $id]);
			
		}
		
		echo execSQL(
			"UPDATE tbl_downloads",
			"SET 
				caption = :caption,
				dateUploaded = :dateUploaded
			WHERE
				download_id = :id",
			[
				":caption" => $caption,
				":dateUploaded" => $date,
				":id" => $id			
			]
		);
		
		exit;
	}
	
	if($_POST["action"] == "removeFile"){
		$id = $_POST["id"];
		unlinkImage('tbl_downloads','download_id',$id, $secondary_main_dir.$downloads_dir, "file");
		echo execSQL("DELETE FROM tbl_downloads","WHERE download_id = :id",[":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "removePhotosByDate"){
		$date = $_POST["selected_date"];
	
		$photos = execSQL("SELECT * FROM tbl_gallery_photos","WHERE dateUploaded = :dateUploaded",[":dateUploaded" => $date],"variable");
		
		foreach($photos as $photo){
			unlinkImage('tbl_gallery_photos','gallery_photo_id', $photo["data"]["gallery_photo_id"], $secondary_main_dir.$gallery_photos_dir, "image");
		}
		
		echo execSQL("DELETE FROM tbl_gallery_photos","WHERE dateUploaded = :dateUploaded",[":dateUploaded" => $date]);
		exit;
	}
	
	if($_POST["action"] == "updatePhotoDescriptionForm"){
		$id = $_POST["id"];
		$photo = execSQL("SELECT * FROM tbl_gallery_photos","WHERE gallery_photo_id = :id",[":id" => $id],"variable",1);
		require_once($PATH_ADMIN."gallery/updatePhotoDescriptionForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveUpdatePhotoDescription"){
		$id = $_POST["id"];
		$description = $_POST["txt_photo_description"];
		
		echo execSQL("UPDATE tbl_gallery_photos","SET description = :description WHERE gallery_photo_id = :id",[":description" => $description, ":id" => $id]);
		exit;
	}
	// ===================================== Manage Account Information Functions =================================
	
	if($_POST["action"] == "saveNewAccount"){
		$username = $_POST["txt_username"];
		$password = $_POST["txt_password"];
		$emailAddress = $_POST["txt_email_address"];
		
		echo execSQL("INSERT INTO tbl_accounts(username, password, emailAddress, hashPassword) VALUES(:username, :password, :emailAddress, :hashPassword);","",
		[":username" => $username, ":emailAddress" => $emailAddress, ":password" => $password, ":hashPassword" => sha1($password)]);
		exit;
	}
	
	if($_POST["action"] == "updateAccountForm"){
		$id = $_POST["id"];
		$account = execSQL("SELECT * FROM tbl_accounts","WHERE account_id = :id",[":id" => $id],"variable",1);
		require_once($PATH_ADMIN."accounts/updateAccountForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveUpdateAccount"){
		$id = $_POST["id"];
		$username = $_POST["txt_update_username"];
		$password = $_POST["txt_update_password"];
		$emailAddress = $_POST["txt_update_email_address"];
		
		echo execSQL("UPDATE tbl_accounts","SET username = :username, emailAddress = :emailAddress, password = :password, hashPassword = :hashPassword WHERE account_id = :id",
		[":username" => $username, ":emailAddress" => $emailAddress, ":password" => $password, ":hashPassword" => sha1($password), ":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "removeAccount"){
		$id = $_POST["id"];
		echo execSQL("DELETE FROM tbl_accounts","WHERE account_id = :id",[":id" => $id]);
		exit;
	}
	
		
	if($_POST["action"] == "activateDeactivateAccount"){
		$id = $_POST["id"];
		$status = $_POST["status"];
		
		echo execSQL("UPDATE tbl_accounts","SET status = :status WHERE account_id = :id",[":status" => $status, ":id" => $id]);
		exit;
	}
	
	// ============================================ Manage Gallery Functions ======================================
	
	if($_POST["action"] == "addNewGalleryForm"){
		$title = $_POST["txt_gallery_name"];
		$description = $_POST["txt_gallery_description"];
		
		echo execSQL("INSERT INTO tbl_gallery(title, description, dateCreated) VALUES(:title, :description, :dateCreated);","",
		[":title" => $title, ":description" => $description, ":dateCreated" => date("Y-m-d")]);
		exit;
	}
	
	if($_POST["action"] == "updateGalleryForm"){
		$id = $_POST["id"];
		$gallery = execSQL("SELECT * FROM tbl_gallery","WHERE gallery_id = :id",[":id" => $id],"variable", 1);
		require_once($PATH_ADMIN."gallery/updateGalleryForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveUpdateGallery"){
		$id = $_POST["id"];
		$title = $_POST["txt_gallery_name"];
		$description = $_POST["txt_gallery_description"];
		
		echo execSQL("UPDATE tbl_gallery","SET title = :title, description = :description WHERE gallery_id = :id",
		[":title" => $title, ":description" => $description, ":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "removeGallery"){
		$id = $_POST["id"];
		echo execSQL("DELETE FROM tbl_gallery", "WHERE gallery_id = :id",[":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "postUnpostGallery"){
		$id = $_POST["id"];
		$status = $_POST["status"];
		echo execSQL("UPDATE tbl_gallery","SET status = :status WHERE gallery_id = :id",[":status" => $status, ":id" => $id]);
		exit;
	}
	
	
	// ================================================ Manage Messages Functions ===================================
	
	if($_POST["action"] == "sendMessage"){
		
		$name = $_POST["txt_name"];
		$email = $_POST["txt_email"];
		$message = $_POST["txt_message"];
		
		echo execSQL("INSERT INTO tbl_messages(fullname, emailAddress, message, dateReceived) VALUES(:fullname, :emailAddress, :message, :dateReceived)","",
		[":fullname" => $name, ":emailAddress" => $email, ":message" => $message, ":dateReceived" => date("Y-m-d h:i:s a")]);
		exit;
	}
	
	if($_POST["action"] == "sendMessageAdmin"){
	
		$message = $_POST['txt_message'];
		$from = 'seschool.edu.ph'; 
		$to = $_POST['txt_email_address'];
		
		$subject = 'RSHS Administrator';
		$body = "From: ".$from."\n E-Mail: ".$to."\n Message:\n ".$message."";

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html\r\n";
		$headers .= 'From: '.$from . "\r\n" .
		'Reply-To: '.$to.'' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		
		mail($to, $subject, $message, $headers);
		echo 1;
		exit;
	}
	
	if($_POST["action"] == "sendMessageForm"){
		require_once($PATH_ADMIN."messages/sendMessageForm.php");
		exit;
	}
	
	if($_POST["action"] == "replyMessageForm"){
		$id = $_POST["id"];
		$message = execSQL("SELECT * FROM tbl_messages","WHERE message_id = :id",[":id" => $id],"variable",1);
		require_once($PATH_ADMIN."messages/replyMessageForm.php");
		exit;
	}
	
	if($_POST["action"] == "replyMessage"){
		$id = $_POST["id"];

		$message = $_POST['txt_message'];
		$from = 'rshschool.edu.ph'; 
		$to = $_POST['txt_email_adress'];

		$subject = 'RSHS Administrator';
		$body = "From: ".$from."\n E-Mail: ".$to."\n Message:\n ".$message."";

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html\r\n";
		$headers .= 'From: '.$from . "\r\n" .
		'Reply-To: '.$to.'' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		
		mail($to, $subject, $message, $headers);
		
		echo execSQL("UPDATE tbl_messages","SET dateReplied = :dateReplied, replyStatus = :replyStatus WHERE message_id = :id",[":dateReplied" => date("Y-m-d"), ":replyStatus" => 1, ":id" => $id]);
		exit;
	}
	
	if($_POST["action"] == "removeMessage"){
		$id = $_POST["id"];
		echo execSQL("DELETE FROM tbl_messages","WHERE message_id = :id",[":id" => $id]);
		exit;
	}
	
	
	// ====================================== Manage Profile Information Functions ========================
	
	if($_POST["action"] == "updateProfileForm"){
		$account = execSQL("SELECT * FROM tbl_accounts","WHERE account_id = :id",[":id" => $_SESSION["account"]["data"]["account_id"]],"variable",1);
		require_once($PATH_ADMIN."profile/updateProfileForm.php");
		exit;
	}
	
	if($_POST["action"] == "saveUpdateProfileInformation"){
		$username = $_POST["txt_account_username"];
		$emailAddress = $_POST["txt_account_email_address"];
		$password = $_POST["txt_account_password"];
		
		echo execSQL("UPDATE tbl_accounts","SET username = :username, emailAddress = :emailAddress, password = :password, hashPassword = :hashPassword WHERE account_id = :id",[":username" => $username, ":emailAddress" => $emailAddress, ":password" => $password, ":hashPassword" => sha1($password),  ":id" => $_SESSION["account"]["data"]["account_id"]]);
		exit;
	}
	
	// ========================================== Manage Home Backgrounds Functions ===================================
	
	if($_POST["action"] == "saveUpdateBackgrounds"){
		$module = $_POST["module"];
		if($module == "admission"){
			$image_index = "admission_image_file";
			$colname = "admissionBackground";
		}elseif($module == "news_room"){
			$image_index = "news_room_image_file";
			$colname = "newsRoomBackground";
		}elseif($module == "announcement"){
			$image_index = "announcement_image_file";
			$colname = "announcementBackground";
		}elseif($module == "history"){
			$image_index = "history_image_file";
			$colname = "historyBackground";
		}elseif($module == "event"){
			$image_index = "event_image_file";
			$colname = "eventBackground";
		}elseif($module == "footer"){
			$image_index = "footer_image_file";
			$colname = "footerBackground";
		}
		
		$file = $_FILES[$image_index];
		if($file["name"] != ""){
			$filename = generateFileName($file, 'tbl_rshs_information', $colname);
			$sourcePath = $file['tmp_name'];
			$targetPath = $secondary_main_dir.$home_backgrounds_dir;
			unlinkImage('tbl_rshs_information','rshs_information_id',1, $targetPath, $colname);
			move_uploaded_file($sourcePath, $targetPath.$filename);
		}else{
			$filename = "";
		}
		
		echo execSQL("UPDATE tbl_rshs_information","SET $colname = :colname WHERE rshs_information_id = :id",
		[":colname" => $filename, ":id" => 1]);
		exit;
	}
	
	if($_POST["action"] == "removeGalleryPhoto"){
		$id = $_POST["id"];
		unlinkImage("tbl_gallery_photos","gallery_photo_id",$id, $secondary_main_dir.$gallery_photos_dir , "image");
		echo execSQL("DELETE FROM tbl_gallery_photos","WHERE gallery_photo_id = :id",[":id" => $id]);
		exit;
	}