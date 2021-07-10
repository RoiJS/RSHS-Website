<?php

$page  = getPage();
$view = getView();
$dirPath = getPath();

function redirect($page = NULL ,$dirPath = NULL,$view = NULL)
{
	if(file_exists(ROOT.DS.'views'.DS.$page))
	{
		if(file_exists(ROOT.DS.'views'.DS.$page.DS.$dirPath.DS.$view.'.php'))
		{
			$title = getTitle($page,$view);

			session_start();
			if($page == 'admin'){
				if(!isset($_SESSION['account'])){
					header('location: ?pg=home');
				}
			}
			
			viewHeader($title);
			require_once(ROOT.DS.'views'.DS.$page.DS.$dirPath.DS.$view.'.php');
			viewFooter();
			
		}else{
			get404Error();
		}
	}else{
		get404Error();
	}
}
function viewHeader($title)
{	
	require_once('views/rshs_mainheader.php');		
}

function viewFooter()
{
	require_once('views/rshs_mainfooter.php');
}

function getTitle($page,$view)
{
	if($page == 'access'){
		if($view == 'index'){
			$title = 'Regional Science High School | Log in';
		}elseif($view == 'logout'){
			$title = 'Logging out..';
		}elseif($view == 'resetPassword'){
			$title = 'Regional Science High School | Reset Password';
		}
	}elseif($page == 'admin'){
		if($view == "index"){
			$title = 'Administrator | RSHS Information';
		}elseif($view == "rshs_information"){
			$title = 'Administrator | RSHS Information';
		}elseif($view == "alumni_list"){
			$title = 'Administrator | Alumni List';
		}elseif($view == "administration"){
			$title = 'Administrator | Administration';
		}elseif($view == "news"){
			$title = 'Administrator | News';
		}elseif($view == "announcements"){
			$title = 'Administrator | Announcements';
		}elseif($view == "academics"){
			$title = 'Administrator | Academics';
		}elseif($view == "transparency_seal"){
			$title = 'Administrator | Transparency Seal';
		}elseif($view == "downloads"){
			$title = 'Administrator | Downloads';
		}elseif($view == "accounts"){
			$title = 'Administrator | Accounts';
		}elseif($view == "gallery"){
			$title = 'Administrator | Gallery';
		}elseif($view == "messages"){
			$title = 'Administrator | Messages';
		}elseif($view == "addNewsForm"){
			$title = 'Administrator | Add News';
		}elseif($view == "updateNewsForm"){
			$title = 'Administrator | Update News';
		}elseif($view == "addAnnouncementForm"){
			$title = 'Administrator | Add Announcement';
		}elseif($view == "updateAnnouncementForm"){
			$title = 'Administrator | Update Announcement';
		}elseif($view == "readMessage"){
			$title = 'Administrator | Read Message';
		}elseif($view == "galleryPhotos"){
			$title = 'Administrator | Gallery Photos';
		}
	}elseif($page == 'home'){
		if($view == 'index'){
			$title = 'Regional Science High School Official Website';
		}elseif($view == "rshs"){
			$title = 'Regional Science High School Official Website';
		}elseif($view == "academics"){
			$title = 'Regional Science High School Official Website | Academics';
		}elseif($view == "gallery"){
			$title = 'Regional Science High School Official Website | Gallery';
		}elseif($view == "gallery_photos"){
			$title = 'Regional Science High School Official Website | Gallery Photos';
		}elseif($view == "news"){
			$title = 'Regional Science High School Official Website | School News';
		}elseif($view == "news_details"){
			$title = 'Regional Science High School Official Website | School Details';
		}elseif($view == "announcements"){
			$title = 'Regional Science High School Official Website | School Announcements';
		}elseif($view == "announcement_details"){
			$title = 'Regional Science High School Official Website | School Announcements Details';
		}elseif($view == "events"){
			$title = 'Regional Science High School Official Website | School Events';
		}elseif($view == "event_details"){
			$title = 'Regional Science High School Official Website | Event Detail';
		}elseif($view == "transparency_seal"){
			$title = 'Regional Science High School Official Website | Transparency Seal';
		}elseif($view == "downloads"){
			$title = 'Regional Science High School Official Website | Downloads';
		}elseif($view == "contact_us"){
			$title = 'Regional Science High School Official Website | Contact Us';
		}elseif($view == "search_result"){
			$title = 'Regional Science High School Official Website | Search Result';
		}elseif($view == "bids_awards_details"){
			$title = 'Regional Science High School Official Website | Bids & Awards Detail';
		}elseif($view == "transparency_seal_details"){
			$title = 'Regional Science High School Official Website | Transparency Seal Detail';
		}elseif($view == "citizen_charter_details"){
			$title = 'Regional Science High School Official Website | Citizen Charter Detail';
		}
	}
	return $title;
}



function get404Error()
{
	require_once('views/error_404.php');
}

function getPage()
{
	if(isset($_GET['pg']))
		$page = $_GET['pg'];
	else
		$page = 'home';
	
	return $page;
}

function getView()
{
	if(isset($_GET['vw']))
		$view = $_GET['vw'];
	else{
		$view = 'index';
	}
	return $view;
}

function getPath()
{
	if(getPage() == 'access'){
		if(isset($_GET['dir'])){
			$dir = $_GET['dir'];
			if($dir == sha1('login')){
				$path = 'login';		
			}else if($dir == sha1('logout')){
				$path = 'logout';		
			}else if($dir == sha1('reset_password')){
				$path = 'reset_password';		
			}
		}else{
			$path = 'login';
		}
	}elseif(getPage() == 'admin' || getPage() == 'staff'){
		if(isset($_GET['dir'])){
			$dir = $_GET['dir'];
			if($dir == sha1('rshs_information')){
				$path = 'rshs_information';
			}elseif($dir == sha1('alumni_list')){
				$path = 'alumni_list';
			}elseif($dir == sha1('news')){
				$path = 'news';
			}elseif($dir == sha1('administration')){
				$path = 'administration';
			}elseif($dir == sha1('announcements')){
				$path = 'announcements';
			}elseif($dir == sha1('academics')){
				$path = 'academics';
			}elseif($dir == sha1('transparency_seal')){
				$path = 'transparency_seal';
			}elseif($dir == sha1('downloads')){
				$path = 'downloads';
			}elseif($dir == sha1('accounts')){
				$path = 'accounts';
			}elseif($dir == sha1('gallery')){
				$path = 'gallery';
			}elseif($dir == sha1('messages')){
				$path = 'messages';
			}else{
				$path = 'rshs_information';
			}
		}else{
			$path = 'rshs_information';
		}
	}elseif(getPage() == "home"){
		if(isset($_GET["dir"])){
			$dir = $_GET["dir"];
			if($dir == sha1("home")){
				$path = "home";
			}elseif($dir == sha1("rshs")){
				$path = "rshs";
			}elseif($dir == sha1("administration")){
				$path = "administration";
			}elseif($dir == sha1("academics")){
				$path = "academics";
			}elseif($dir == sha1("gallery")){
				$path = "gallery";
			}elseif($dir == sha1("news")){
				$path = "news";
			}elseif($dir == sha1("announcements")){
				$path = "announcements";
			}elseif($dir == sha1("events")){
				$path = "events";
			}elseif($dir == sha1("transparency_seal")){
				$path = "transparency_seal";
			}elseif($dir == sha1("downloads")){
				$path = "downloads";
			}elseif($dir == sha1("contact_us")){
				$path = "contact_us";
			}elseif($dir == sha1("search")){
				$path = "search";
			}elseif($dir == sha1("bids_awards")){
				$path = "bids_awards";
			}elseif($dir == sha1("transparency_seal")){
				$path = "transparency_seal";
			}elseif($dir == sha1("citizen_charters")){
				$path = "citizen_charters";
			}else{
				$path = "home";
			}
		}else{
			$path = 'home';
		}
	}else{
		$path = 'login';
	}
	
	return $path;
}


?>
