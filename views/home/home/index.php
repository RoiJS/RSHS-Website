<?php require_once("views/home/home_header.php");?>
<div id="slideshow-tabs">
	<div id="panel-tabs">
		<ul class="nav-tabs-slideshow">
			<li>
				<center>
					<a href="#panel-1"><strong>Be with us</strong><br />
						<span>Study Hard. Play Hard</span>
					</a>
				</center>
			</li>
			<li>
				<center>
					<a href="#panel-2"><strong>Newsroom</strong><br />
					<span>Latest campus news update</span>
					</a>
				</center>
			</li>
			<li>
				<center>
					<a href="#panel-3"><strong>Announcements</strong><br />
					<span>See School latest announcements</span>
					</a>
				</center>
			</li>
			<li>
				<center>
					<a href="#panel-4"><strong>Events</strong><br />
					<span>Schedule of our activity</span>
					</a>
				</center>
			</li>
		</ul>
	</div>
	<?php $rshs = execSQL("SELECT * FROM tbl_rshs_information","","","variable",1);?>
	<?php $admission_background = $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshs["data"]["admissionBackground"];?>
	<?php $news_room_background = $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshs["data"]["newsRoomBackground"];?>
	<?php $announcement_background = $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshs["data"]["announcementBackground"];?>
	<?php $event_background = $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshs["data"]["eventBackground"];?>
	<?php $history_background = $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshs["data"]["historyBackground"];?>

	<!--- Admission Slide -->
	<div class="ui-tabs-panel" id="panel-1" style="background:url(<?php echo $admission_background; ?>) no-repeat 50% 0">
		<div class="tabs-blur" style="background:url(<?php echo $admission_background; ?>) no-repeat 50% 0">
		</div>
		<div class="tabs-container">
			<article>
				<h2>Reach your Next Level Career</h2>
				<div style="color:white" class="">
					<?php echo showModuleDescription($rshs["data"]["admission"], 250);?>
				</div>
				<a	 href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs"); ?>&sub=admission" class="button-more-slide">Learn More</a>
			</article>
		</div>
	</div>
	<!--- Admission Slide -->
	
	<!--- Newsroom Slide -->
	<div class="ui-tabs-panel" id="panel-2" style="background:url(<?php echo $news_room_background; ?>) no-repeat 50% 0">
		<div class="tabs-blur" style="background:url(<?php echo $news_room_background?>) no-repeat 50% 0">
		</div>
		<div class="tabs-container">
			<div class="slider-tabs flexslider">
				<ul class="slides">
					<?php $news_info = execSQL("SELECT * FROM tbl_news","WHERE status = :status ORDER BY date_submitted DESC LIMIT 5",[":status" => 1],"variable");?>
					<?php if(!empty($news_info)){?>
						<?php foreach($news_info as $news):?>
							<li>
								<div class="slider-tabs-content">
									<h3><a href="?pg=home&vw=news_details&dir=<?php echo sha1("news");?>&<?php echo sha1("news_id");?>=<?php echo $news["data"]["news_id"];?>"><?php echo showModuleDescription($news["data"]["title"], 40);?></a></h3>
									<time datetime="2013-11-30"><?php echo date("M d, Y", strtotime($news["data"]["date_submitted"]));?></time>
									<p ><?php echo showModuleDescription($news["data"]["description"], 250);?></p>
								</div>
							</li>	
						<?php endforeach; ?>
					<?php }else{?>
						<li>
							<div class="slider-tabs-content">
								<h3><a>Empty news list</a></h3>
								<time datetime="2013-11-30">No school news has been posted yet.</time>
							</div>
						</li>
					<?php }?>
					
				</ul>
			</div>
		</div>
	</div>
	<!--- Newsroom Slide -->
	
	<!--- Announcements Slide -->
    <div class="ui-tabs-panel" id="panel-3" style="background:url(<?php echo $announcement_background; ?>) no-repeat 50% 0">
		<div class="tabs-blur" style="background:url(<?php echo $announcement_background; ?>) no-repeat 50% 0">
		</div>
		<div class="tabs-container">
			<div class="slider-tabs event flexslider">
				<ul class="slides">
					<?php $announcements = execSQL("SELECT * FROM tbl_announcements","WHERE status = :status ORDER BY date DESC LIMIT 5",[":status" => 1],"variable"); ?>
					
					<?php if(!empty($announcements)){?>
						<?php foreach($announcements as $announcement):?>
							<li>
								<div class="slider-tabs-content">
									<h3><a href="?pg=home&vw=announcement_details&dir=<?php echo sha1("announcements");?>&<?php echo sha1("announcement_id");?>=<?php echo $announcement["data"]["announcement_id"];?>"><?php echo showModuleDescription($announcement["data"]["title"], 40);?></a></h3>
									<time datetime="2013-11-30"><?php echo date("M d, Y", strtotime($announcement["data"]["date"]));?></time>
									<p ><?php echo showModuleDescription($announcement["data"]["description"], 250);?></p>
								</div>
							</li>	
						<?php endforeach; ?>
					<?php }else{?>
						<li>
							<div class="slider-tabs-content">
								<h3><a href="#">Empty announcements list</a></h3>
								<time datetime="2013-11-30">No school announcements has been posted yet.</time>
							</div>
						</li>
					<?php }?>
					
				</ul>
			</div>
		</div>
	</div>
	<!--- Announcements Slide -->

	<!--- Events Slide -->
    <div class="ui-tabs-panel" id="panel-4" style="background:url(<?php echo $event_background; ?>) no-repeat 50% 0">
		<div class="tabs-blur" style="background:url(<?php echo $event_background; ?>) no-repeat 50% 0">
		</div>
		<div class="tabs-container">
			<div class="slider-tabs event flexslider">
				<ul class="slides">
					<?php $events = execSQL("SELECT * FROM tbl_academic_events","WHERE status = :status ORDER BY date DESC LIMIT 5",[":status" => 1],"variable"); ?>
					<?php if(!empty($events)){?>
						<?php foreach($events as $event):?>
							<li>
								<div class="slider-tabs-content">
									<?php $image = $event["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["academic_events_dir"].$event["data"]["image"] : showSystemLogo();?>
									<img src="<?php echo $image; ?>" style="height:100px;" data-retina="<?php echo $image; ?>" alt="<?php $event["data"]["title"];?>" />
									<h3 title="<?php echo $event["data"]["title"];?>"><a href="?pg=home&vw=event_details&dir=<?php echo sha1("events");?>&<?php echo sha1("event_id"); ?>=<?php echo $event["data"]["academic_event_id"];?>"><?php echo showModuleDescription($event["data"]["title"], 50);?></a></h3>
									<ul class="list-event-slider">
										<li class="time-slider"><?php echo date("M d, Y", strtotime($event["data"]["date"]));?></li>
										<p><?php echo showModuleDescription($event["data"]["description"], 100);?></p>
									</ul>
								</div>
							</li>
						<?php endforeach; ?>
					<?php }else{?>
						<li>
							<div class="slider-tabs-content">
								<h3><a href="#">Empty events list</a></h3>
								<time datetime="2013-11-30">No school events has been posted yet.</time>
							</div>
						</li>
					<?php }?>
					
				</ul>
			</div>
		</div>
	</div>
	<!--- Events Slide -->

</div>

<div id="">
	<div id="content" class="clearfix">
		<div id="intro" style="height:300px;">
			<h1>Welcome to Regional Science High School </h1>
			<figure><img src="<?php echo $history_background; ?>" alt="Welcome to Regional Science High School" /></figure>
			<h2><b>School History and Establishment<b></h2><br>
			<p class="description"><?php echo showModuleDescription($rshs["data"]["history"], 500);?></p>
			<a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs"); ?>&sub=history" class="more-intro">- Read More</a>
		</div>
		<div id="main-content">
			<div id="sidebar-homepage-left" class="sidebar-homepage">
				<aside class="widget-container">
					<div class="widget-wrapper clearfix">
						<h3 class="widget-title">Latest Blog</h3>
						<ul class="menu news-sidebar">		
							<?php $news_list = execSQL("SELECT * FROM tbl_news","WHERE status = :status ORDER BY date_submitted DESC LIMIT 5",[":status" => 1],"variable");?>
							
							<?php if(!empty($news_list)){?>
								<?php foreach($news_list as $news):?>
									<li class="clearfix">
										<?php $image = $news["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["news_dir"].$news["data"]["image"] : showSystemLogo();?>
										<img src="<?php echo $image; ?>" style="height:90px;width:130px;" data-retina="<?php echo $image; ?>" alt="<?php echo $news["data"]["title"];?>" class="imgframe alignleft" />
										<h4 title="<?php echo $news["data"]["title"];?>"><a href="?pg=home&vw=news_details&dir=<?php echo sha1("news");?>&<?php echo sha1("news_id");?>=<?php echo $news["data"]["news_id"];?>"><?php echo showModuleDescription($news["data"]["title"], 50);?></a></h4>
										<span class="date-news"><?php echo date("M d, Y", strtotime($news["data"]["date_submitted"]));?></span>
									</li>
								<?php endforeach;?>
								<a href="?pg=home&vw=news&dir=<?php echo sha1("news"); ?>" class="button-more">Read More Blog Post</a>
							<?php }else{?>
								<li>
									<h4><a >Empty news list</a></h4>
									<span class="date-news">No school news have been posted yet</span>
								</li>
							<?php }?>
						</ul>
						
					</div>
				</aside>
			</div>
			
			<div id="sidebar-homepage-middle" class="sidebar-homepage">
				<aside class="widget-container">
					<div class="widget-wrapper clearfix">
						<h3 class="widget-title">Latest Event</h3>
						<ul class="menu event-sidebar">	
							<?php $dates = execSQL("SELECT DISTINCT(date) AS date FROM tbl_academic_events","WHERE status = :status ORDER BY date DESC",[":status" => 1],"variable");?>
							
							<?php if(!empty($dates)){?>
								<?php foreach($dates as $date):?>
									<li class="clearfix">
										<div class="event-date-widget">
											<strong><?php echo date("d", strtotime($date["data"]["date"]));?></strong>
											<span><?php echo date("M", strtotime($date["data"]["date"]));?></span>
										</div>
										<div class="event-content-widget">
											<?php $events = execSQL("SELECT * FROM tbl_academic_events","WHERE date = :date ORDER BY title ASC",[":date" => $date["data"]["date"]],"variable");?>
											<?php foreach($events as $event):?>
												<article>
													<h4 title="<?php echo $event["data"]["title"];?>"><a href="?pg=home&vw=event_details&dir=<?php echo sha1("events");?>&<?php echo sha1("event_id"); ?>=<?php echo $event["data"]["academic_event_id"];?>"><?php echo showModuleDescription($event["data"]["title"], 30);?></a></h4>
													<p><?php echo date("M d, Y", strtotime($date["data"]["date"]));?></p>
													<em><?php echo showModuleDescription($event["data"]["description"],85 );?></em>
												</article>
												<hr>
											<?php endforeach; ?>
										</div>
									</li>
								<?php endforeach; ?>
								<a href="?pg=home&vw=events&dir=<?php echo sha1("events"); ?>" class="button-more">See More School Events</a>
							<?php }else{?>
								<li>
									<a href="#"><b>Empty events list</b></a><br>
									<span class="date-news">No school events have been posted yet</span>
								</li>
							<?php }?>
						</ul>
				
					</div>
				</aside>
			</div>
		</div>
		<div id="sidebar-homepage-right" class="sidebar-homepage">
			
			<aside id="gw_gallery-5" class="widget-container widget_gw_gallery">
			<div class="widget-wrapper clearfix">
				<h3 class="widget-title">Photo Gallery</h3>  
				<script type="text/javascript">
					jQuery(document).ready(function($){
						$("#gw_gallery-5-slide").flexslider({
							animation: "slide",
							animationLoop: false,
							pauseOnAction: true
						});
					});
				</script>
				
				<div id="gw_gallery-5-slide" class="flexslider">
					<ul class="slides">
						<?php $photos = execSQL("SELECT * FROM tbl_gallery INNER JOIN tbl_gallery_photos ON tbl_gallery.gallery_id = tbl_gallery_photos.gallery_id","WHERE tbl_gallery.status = :status ORDER BY dateUploaded DESC LIMIT 10",[":status" => 1],"variable");?>
						<?php if(!empty($photos)){?>
							<?php foreach($photos as $photo):?>
								<li>
									<div class="slides-image">
										<?php $image = $GLOBALS["main_dir"].$GLOBALS["gallery_photos_dir"].$photo["data"]["image"];?>
										<a href="<?php echo $image; ?>" data-rel="prettyPhoto[pp-gw_gallery-5]">
										<img src="<?php echo $image; ?>" style="height:250px;" alt="<?php echo $photo["data"]["description"];?>"  data-retina="<?php echo $image; ?>" /></a>
									</div>
									<?php $description = $photo["data"]["description"] ? $photo["data"]["description"] : "-------------------";?>
									<h4><a href="<?php echo $image; ?>" data-rel="prettyPhoto[pp-gw_gallery-5-slide]"><?php echo $description; ?></a></h4>
								</li>	
							<?php endforeach; ?>
						<?php }else{?>
						
						<?php }?>
					</ul>
				</div>
			</div>
		</aside>
		
		<ul id="nav-sidebar" class="clearfix" >
			<li>
				<a href="#/" class="clearfix">
				<figure><img src="images/icon-sidebar-1.png" alt="Contact Us" /></figure>
				<strong class="title-nav-sidebar">Contact Us Now</strong>
				<strong>Tel:</strong> <?php echo $rshs["data"]["contactNo"]; ?><br>
				<strong>Email Address:</strong> <?php echo $rshs["data"]["emailAddress"]; ?>
				</a></li>
			<li><a href="#/" class="clearfix">
				<figure><img src="images/icon-sidebar-2.png" alt="Location" /></figure>
				<strong class="title-nav-sidebar">Location</strong>
				<strong>Address:</strong> <?php echo $rshs["data"]["address"];?>
				</a></li>
		</ul>
		</div>
	</div>
</div>
<?php require_once("views/home/home_footer.php");?>