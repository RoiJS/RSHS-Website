<?php require_once("views/home/home_header.php");?>
<div id="content-container">
	<div id="content" class="clearfix">
		<div id="main-content">
			<div id="breadcrumbs" class="clearfix">
				<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="/rshs" itemprop="url" class="icon-home">
						<span itemprop="title">Home</span>
					</a> <span class="arrow">&gt;</span>
				</div>  
				<span class="last-breadcrumbs">
					Announcements
				</span>
			</div>
			
			<?php $announcements = execSQL("SELECT * FROM tbl_announcements WHERE status = 1 ORDER BY date DESC LIMIT 5","","","variable");?>
				<?php if(!empty($announcements)){?>
					<article class="static-page">
						<h1 id="main-title">School Announcements</h1>
					</article>
						
					<?php $announcements = execSQL("SELECT * FROM tbl_announcements WHERE status = 1 ORDER BY date DESC","","","variable");?>
					<?php if(!empty($announcements)){?>
						<?php foreach($announcements as $announcement){?>
							<article class="news-container static-page" style="height:350px; width:300px;">
								<figure>
									<?php $image = $announcement["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["announcements_dir"].$announcement["data"]["image"] : showSystemLogo();?>
									<center><img src="<?php echo $image; ?>"  style="height:200px;width:300px;" data-retina="<?php echo $image; ?>" alt="<?php echo $announcement["data"]["image"];?>" /></center>
								</figure>
								<header>
									<h2 class="title-news" title="<?php echo $announcement["data"]["title"];?>"><a href="?pg=home&vw=announcement_details&dir=<?php echo sha1("announcements");?>&<?php echo sha1("announcement_id");?>=<?php echo $announcement["data"]["announcement_id"];?>"><?php echo showModuleDescription($announcement["data"]["title"], 30);?></a></h2>
									<time datetime="2013-11-26"><?php echo date("M d, Y", strtotime($announcement["data"]["date"]));?></time>

								</header>
								<p><?php echo strip_tags(showModuleDescription($announcement["data"]["description"], 120), "<br>"); ?></a></p>
							</article>		
						<?php } ?>
					<?php }?>
			<?php }else{?>
				<article class="static-page" >
					<h1 id="main-title">Empty Announcements List</h1>
					<p >No school announcements has been posted yet.</p>
				</article>		
			<?php }?>
		</div>
		<?php require_once("views/home/home_sidebar_2.php");?>
	</div>
</div>
<?php require_once("views/home/home_footer.php");?>