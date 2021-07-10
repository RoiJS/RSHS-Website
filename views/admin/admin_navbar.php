 <div class="col-md-3 left_col">
    <div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
            <a href="?pg=admin" class="site_title"> <center>RSHS Website</center></a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
				<img src="<?php echo showSystemLogo(); ?>" class="img-responsive img-circle  profile_img"/> 
            </div>
            <div class="profile_info">
                <span>Welcome, <?php echo ucwords($_SESSION["account"]["data"]["username"]);?></span>
                <h2></h2>
            </div>
         </div>
		 
        <!-- /menu prile quick info -->
        <br />

		<!-- sidebar menu -->
        <div  >
			<div class="menu_section">
                <h3>Navigation</h3>
                <ul class="nav side-menu" style="cursor:pointer;">
                    <li class="hidden"><a href="?pg=admin"><i class="fa fa-info-o"></i> Home</a></li>
                    <li class="<?php if(getView() == "index"){echo "active";}?>"><a href="?pg=admin&main=information&sub=history"><i class="fa fa-info-circle"></i> RSHS Information </a></li>
                    <li class="<?php if(getView() == "news"){echo "active";}?>"><a href="?pg=admin&vw=news&dir=<?php echo sha1("news"); ?>"><i class="fa fa-files-o"></i> News  <span class="badge badge-primary label-success pull-right news-badge">0</span></a></li>
					<li class="<?php if(getView() == "announcements"){echo "active";}?>"><a href="?pg=admin&vw=announcements&dir=<?php echo sha1("announcements");?>"><i class="fa fa-bullhorn"></i> Announcements <span class="badge badge-primary label-success pull-right announcements-badge">0</span></a></li>
                    <li class="<?php if(getView() == "academics"){echo "active";}?>"><a href="?pg=admin&vw=academics&dir=<?php echo sha1("academics");?>&main=academic_event"><i class="fa fa-book"></i> Academics </a></li><li class="<?php if(getView() == "administration"){echo "active";}?>"><a href="?pg=admin&vw=administration&dir=<?php echo sha1("administration");?>"><i class="fa fa-building"></i> Administration <span class="badge badge-primary label-success pull-right administration-badge">0</span></a></li></a></li>
					  <li class="<?php if(getView() == "alumni_list"){echo "active";}?>"><a href="?pg=admin&vw=alumni_list&dir=<?php echo sha1("alumni_list"); ?>"><i class="fa fa-mortar-board"></i> Alumni List  <span class="badge badge-primary label-success pull-right alumni-badge">0</span></a></li>
                    <li class="<?php if(getView() == "transparency_seal"){echo "active";}?>"><a href="?pg=admin&vw=transparency_seal&dir=<?php echo sha1("transparency_seal");?>"><i class="fa fa-certificate"></i> Transparency Seal <span class="badge badge-primary label-success pull-right transparency-seal-badge">0</span></span></a></li>
                    <li class="<?php if(getView() == "downloads"){echo "active";}?>"><a href="?pg=admin&vw=downloads&dir=<?php echo sha1("downloads");?>"><i class="fa fa-download"></i> Downloads <span class="badge badge-primary label-success pull-right downloads-badge">0</span></span></a></li>
					<?php if($_SESSION["account"]["data"]["type"] == "admin"){?>
						<li class="<?php if(getView() == "accounts"){echo "active";}?>"><a href="?pg=admin&vw=accounts&dir=<?php echo sha1("accounts");?>"><i class="fa fa-key"></i> Accounts <span class="badge badge-primary label-success pull-right accounts-badge">0</span></span></a></li>
					<?php }?>
                    <li class="<?php if(getView() == "gallery"){echo "active";}?>"><a href="?pg=admin&vw=gallery&dir=<?php echo sha1("gallery");?>"><i class="fa fa-file-image-o"></i> Gallery <span class="badge badge-primary label-success pull-right gallery-badge">0</span></span></a></li>
                    <li class="<?php if(getView() == "messages"){echo "active";}?>"><a href="?pg=admin&vw=messages&dir=<?php echo sha1("messages");?>"><i class="fa fa-envelope"></i> Messages <span class="badge badge-primary label-success pull-right messages-badge">0</span></span></a></li>
                </ul>
            </div>
        </div>
		<!-- /sidebar menu -->
	</div>
</div>
