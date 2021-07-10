<?php

	require_once("../functions/sql.query.function.php");
	require_once("../functions/system.function.php");
	require_once("../library/directory.path.php");
	
	$PATH_ADMIN = '../views/admin/';
	$PATH_STAFF = '../views/staff/';
	$PATH_HOME = '../views/home/';
	
	// ============================================= Manage Gallery Photos Functions =============================
	
	if(isset($_POST["uploadSelectedImages"])){
		$allowedExtensions = array('jpeg','png','jpg','gif');
		$allowedFileType = array('image/gif','image/jpeg','image/jpg','image/png');
		$id = $_POST["id"];
		$date = date("Y-m-d", strtotime($_POST["txt_date_uploaded"]));
	
		foreach($_FILES["gallery_photos"]["name"] as $index => $file){
			$imagename = $_FILES["gallery_photos"]["name"][$index];
			$imagesize = $_FILES["gallery_photos"]["size"][$index];
			$imagetype = $_FILES["gallery_photos"]["type"][$index];
			
			$parsefile = explode('.',$imagename);
			$extension = $parsefile[1];
			$image = rand(1,1000000000).'_'.rand(1,1000000000).'_'.rand(1,1000000000).".".$extension;
			$sourcePath = $_FILES['gallery_photos']['tmp_name'][$index];
			$targetPath = $secondary_main_dir.$gallery_photos_dir;
			
			move_uploaded_file($sourcePath,$targetPath.$image);	
			
			execSQL("INSERT INTO tbl_gallery_photos(gallery_id, image, imagename, size, dateUploaded) VALUES(:gallery_id, :image, :imagename, :size, :dateUploaded)","",
			[":gallery_id" => $id, ":image" => $image, ":imagename" => $imagename, ":size" => $imagesize, ":dateUploaded" => $date]);
		}
		?>
			<script>
				window.location = "../?pg=admin&vw=galleryPhotos&dir=5b47b90353dce961408d7319555f7cb9ca62fd7f&c85129b14e741490478d8872fb4d36ddeb0a95a3=" + <?php echo $id; ?>;</script>
		
		<?php
		exit;
	}