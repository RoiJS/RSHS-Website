<nav id="nav" class="clearfix">
	<a href="#" class="close-menu-big">Close</a>
	<div id="nav-container">
		<a href="#" class="close-menu">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<ul id="nav-main">
			<li class="<?php if(getView() == "home" || !isset($_GET["vw"])){echo "current-menu-item"; }?>"><a href="/rshs">Home</a></li>
			<li class="<?php if(getView() == "rshs"){echo "current-menu-item"; }?>"><a >RSHS</a>
				<ul>
					<li><a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=history">History</a></li>
					<li><a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=mission_vision">Mission &amp; Vision</a></li>
					<li><a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=admission">Admission</a></li>
					<li><a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=administration">Administration</a></li>
					<li><a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=alumni">Alumni</a></li>
					<li><a href="?pg=home&vw=academics&dir=<?php echo sha1("academics");?>">Academics</a></li>
					<li><a href="?pg=home&vw=gallery&dir=<?php echo sha1("gallery");?>">Gallery</a></li>
					<li><a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=bids_awards">Bids & Awards</a></li>
					<li><a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=citizen_charter">Citizen Charter</a></li>
				</ul>
			</li>
			<li class="<?php if(getView() == "news"){echo "current-menu-item"; }?>"
			><a href="?pg=home&vw=news&dir=<?php echo sha1("news");?>">News</a></li>
			<li class="<?php if(getView() == "announcements"){echo "current-menu-item"; }?>"><a href="?pg=home&vw=announcements&dir=<?php echo sha1("announcements");?>">Announcements</a></li>
			<li class="<?php if(getView() == "events"){echo "current-menu-item"; }?>"><a href="?pg=home&vw=events&dir=<?php echo sha1("events");?>">Events</a></li>
			
			<li class="<?php if(getView() == "transparency_seal"){echo "current-menu-item"; }?>"><a href="?pg=home&vw=transparency_seal&dir=<?php echo sha1("transparency_seal");?>">Transparency Seal</a></li>
			<li class="<?php if(getView() == "downloads"){echo "current-menu-item"; }?>"><a href="?pg=home&vw=downloads&dir=<?php echo sha1("downloads");?>">Downloads</a></li>
			<li class="<?php if(getView() == "contact_us"){echo "current-menu-item"; }?>"><a href="?pg=home&vw=contact_us&dir=<?php echo sha1("contact_us");?>">Contact</a></li>
		</ul>
		<?php if(isset($_SESSION["account"])){?>
			<a href="?pg=admin&main=information&sub=history" id="button-registration">Back Home</a>
		<?php }else{?>
			<a href="?pg=access" id="button-registration">Log in</a>
		<?php }?>
		
	</div>
</nav>
