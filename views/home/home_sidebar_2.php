<div id="sidebar">
   <aside class="widget-container">
		<div class="widget-wrapper clearfix">
			<div id="tabs-widget">
				<ul class="tabs-widget">
					<li class="first-tabs"><a>School's Administration</a></li>
				</ul>
				<div class="ui-tabs-panel" id="panel1">
					<ul class="menu team-sidebar"> 
						<?php $departments = execSQL("SELECT * FROM tbl_departments ORDER BY position DESC LIMIT 3","","","variable"); ?>
						
						<?php if(!empty($departments)){?>
							<?php foreach($departments as $department){?>
								<?php $administrations = execSQL("SELECT * FROM tbl_administrations INNER JOIN tbl_positions ON tbl_administrations.position_id = tbl_positions.position_id","WHERE status = :status AND department_id = :id ORDER BY administration_id ASC LIMIT 5",[":status" => 1, ":id" => $department["data"]["department_id"]],"variable");?>
								<?php foreach($administrations as $administration){?>
									<li class="clearfix">
										<div class="team-sidebar-content">
											<?php $image = $administration["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["administrations_dir"].$administration["data"]["image"] : showSystemLogo(); ?>
											<img src="<?php echo $image; ?>" style="height:80px;width:90px;" data-retina="<?php echo $image; ?>" alt="<?php echo $news["data"]["title"];?>" class="imgframe alignleft" />
											<h4><?php echo $administration["data"]["firstname"]." ".$administration["data"]["middlename"]." ".$administration["data"]["lastname"];?></h4>
											<h5><?php echo $administration["data"]["name"];?></h5>
										</div>
									</li>
								<?php }?>
							<?php }?>
							<a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs"); ?>&sub=administration"  class="button-more">See more school's administration</a>
						<?php }else{?>
							<li class="clearfix">
								<div class="team-sidebar-content">
									<h4><a href="#">Empty school's administration list</a></h4>
								</div>
							</li>
						<?php }?>
					</ul>		
				</div>
			</div>
		</div>
	</aside>

	<aside class="widget-container">
		<div class="widget-wrapper clearfix">
			<h3 class="widget-title">About School Fun</h3>
			<article class="text-widget ">
				<?php $rshs = execSQL("SELECT * FROM tbl_rshs_information","","","variable",1);?>
				<img src="<?php echo $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshs["data"]["historyBackground"];?>" alt="<?php echo $rshs["data"]["historyBackground"];?>" class="imgframe" />
				<p class="description"><?php echo showModuleDescription($rshs["data"]["history"], 270);?></p>
				<ul>
					<li><strong>Address:</strong> <?php echo $rshs["data"]["address"];?></li>
					<li><strong>Email:</strong> <?php echo $rshs["data"]["emailAddress"];?></li>
					<li><strong>Phone:</strong> <?php echo $rshs["data"]["contactNo"];?></li>
				</ul>	    
			</article>
			<a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=history" class="button-more">More About Us</a>
		</div>
	</aside>
   
  </div>
