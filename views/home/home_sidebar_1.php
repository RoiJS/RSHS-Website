<div id="sidebar">
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
						<h4><a href="#">Empty news list</a></h4>
						<span class="date-news">No school news have been posted yet</span>
					</li>
				<?php }?>
			</ul>
		</div>

	</aside>
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
					<a href="?pg=home&vw=events&dir=<?php echo sha1("events");?>" class="button-more">See More School Events</a>
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
