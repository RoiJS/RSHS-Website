<?php require_once("views/home/home_header.php");?>
<div id="content-container">
	<div id="content" class="clearfix">
		<div id="full-width">
			<div id="breadcrumbs" class="clearfix">
				<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="/rshs" itemprop="url" class="icon-home">
						<span itemprop="title">Home</span>
					</a> <span class="arrow">&gt;</span>
				</div>  
				<span class="last-breadcrumbs">
					School Events
				</span>
			</div>
			
			<?php $events = execSQL("SELECT * FROM tbl_academic_events WHERE status = 1 ORDER BY date DESC LIMIT 5","","","variable");?>
				<?php if(!empty($events)){ ?>
					<article class="static-page">
						<h1 id="main-title">School Events</h1>
					</article>
					<div id="slider-event" class="flexslider">
						<ul class="slides">
							<?php foreach($events as $event){?>
								<li>
									<div class="panel-slider-event clearfix">
										<h2><a href="?pg=home&vw=event_details&dir=<?php echo sha1("events");?>&<?php echo sha1("event_id"); ?>=<?php echo $event["data"]["academic_event_id"];?>"><?php echo $event["data"]["title"]; ?></a></h2>
										<time datetime="2013-11-26"><strong><?php echo date("d", strtotime($event["data"]["date"]));?></strong><br /><span><?php echo date("M, Y", strtotime($event["data"]["date"]));?></span></time>
										<ul class="list-event-slider">
											<li><p class="description"><?php echo showModuleDescription($event["data"]["description"], 150);?></p></li>
										</ul>
									</div>
									<?php $image = $event["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["academic_events_dir"].$event["data"]["image"] : showSystemLogo();?>
									<img src="<?php echo $image; ?>" alt="<?php echo $event["data"]["title"];?>" />
								</li>		
							<?php }?>
						</ul>
					</div>
					<article class="static-page">
						<div class="accordion">
							<?php $dates = execSQL("SELECT DISTINCT date FROM tbl_academic_events WHERE status = 1 ORDER BY date DESC","","","variable");?>
							<?php if(!empty($dates)){?>
								<?php foreach($dates as $date){?>
									<?php $events = execSQL("SELECT * FROM tbl_academic_events","WHERE date = :date AND status = :status ORDER BY title ASC",[":date" => $date["data"]["date"], ":status" => 1], "variable");?>
									<h3 class="title-event"><?php echo date("M d, Y", strtotime($date["data"]["date"]));?> - <em><?php echo count($events); ?> Events</em></h3>
									<div class="content-event clearfix">
										
										<?php if(count($events) == 1){?>
											<?php foreach($events as $event){?>
												<?php $image = $event["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["academic_events_dir"].$event["data"]["image"] : showSystemLogo();?>
												<div class="event-container-one clearfix" itemscope itemtype="http://data-vocabulary.org/Event">
													<img src="<?php echo $image; ?>" style="max-height:140px;" data-retina="<?php echo $image; ?>" alt="<?php echo $event["data"]["title"]; ?>" itemprop="photo" />
													<div class="panel-event-info">
														<ul class="list-event-slider">
															<li class="time-slider"><time itemprop="startDate" datetime="2015-12-01"><?php echo date("M d, Y", strtotime($event["data"]["date"]));?></li>
															<li><p style="color:white;" class="description"><?php echo showModuleDescription($event["data"]["description"], 90);?></p></li>
														</ul>
													</div>
													<h2 class="title-event-one" itemprop="summary"><a href="?pg=home&vw=event_details&dir=<?php echo sha1("events");?>&<?php echo sha1("event_id"); ?>=<?php echo $event["data"]["academic_event_id"];?>" itemprop="url"><?php echo $event["data"]["title"];?></a></h2>
												</div>
											<?php }?>
											
										<?php }else{?>
											<?php foreach($events as $event){?>
												<?php $image = $event["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["academic_events_dir"].$event["data"]["image"] : showSystemLogo();?>
												<div class="event-container clearfix" itemscope itemtype="http://data-vocabulary.org/Event">
													<center><img src="<?php echo $image; ?>" style="height:270px;" data-retina="<?php echo $image; ?>" alt="<?php echo $event["data"]["title"]; ?>" itemprop="photo" /></center>
													<h4 itemprop="summary"><center><a href="?pg=home&vw=event_details&dir=<?php echo sha1("events");?>&<?php echo sha1("event_id"); ?>=<?php echo $event["data"]["academic_event_id"];?>" itemprop="url"><?php echo $event["data"]["title"]; ?></a></center></h4>
													<div class="panel-event-info">
														<ul class="list-event-slider">
															<li class="time-slider"><time itemprop="startDate" datetime="2015-12-01"><?php echo date("M d, Y", strtotime($event["data"]["date"])); ?></time></li>
															<li><p style="color:white;" class="description"><?php echo showModuleDescription($event["data"]["description"], 130); ?></p></li>
														</ul>
														<a href="?pg=home&vw=event_details&dir=<?php echo sha1("events");?>&<?php echo sha1("event_id"); ?>=<?php echo $event["data"]["academic_event_id"];?>" class="button-detail">View More Detail</a>
													</div>
												</div>
											<?php }?>
										<?php }?>
										
									</div>		
								<?php }?>
							<?php }?>
						</div>
					</article>
			
			<?php }else{?>
				<article class="static-page" >
					<h1 id="main-title">Empty Events List</h1>
					<p >No school events has been posted yet.</p>
				</article>	
			<?php }?>
		</div>
	</div>
</div>
<?php require_once("views/home/home_footer.php");?>
