<header id="main-header" class="clearfix">
	<div id="header-full" class="clearfix">
		<div id="header" class="clearfix">
			<a href="#nav" class="open-menu">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<?php $rshs = execSQL("SELECT * FROM tbl_rshs_information","","","variable",1); ?>
			<?php $official_logo = $GLOBALS["main_dir"].$GLOBALS["logo_dir"].$rshs["data"]["image"];?>
			<?php $official_logo_text = $GLOBALS["main_dir"].$GLOBALS["logo_dir"]."rshs-text.png";?>
			<a href="/rshs" id="logo"><img src="<?php echo $official_logo; ?>" data-retina="<?php echo $official_logo;?>" style="height:100px;width:110px;"  alt="Regional Science High School Official Seal" /></a>
			<a><img src="<?php echo $official_logo_text ; ?>" style="margin-top:20px;" id="rshs-text-logo" /></a>
			<aside id="header-content">
				<form method="post" action="?pg=home&vw=search_result&dir=<?php echo sha1("search"); ?>" id="searchform" style="margin-top: 90px;">
					<div>
						<input type="text" name="txt_search" class="input" placeholder="Enter something to search&hellip;" required />
						<input type="submit" name="submitsearch" class="button" value="Search"/>
					</div>
				</form>
			</aside>
		</div>
	</div>
	<?php require_once("home_navbar.php");?>
</header>
