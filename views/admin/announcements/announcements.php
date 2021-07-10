<div class="container body"> 
	<div class="main_container">
		
		<!-- Nav Bar -->
		<?php require_once('views/admin/admin_navbar.php');?>
		<!-- Nav Bar -->
		
		<!-- top navigation -->
		<?php require_once('views/admin/admin_header.php');?>
		<!-- /top navigation -->

		
		<!-- page content -->
		<div class="right_col" role="main">
			<div class="">
				<div class="page-title">
					<div class="title_left">
						<h3>Announcements</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i> Announcements</li>
						</ol>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="row">
								<div class="col-lg-3">
									<div class="row">
										<div class="animated flipInY col-lg-12">
											<div class="tile-stats">
												<div class="icon"><i class="fa fa-bullhorn fa-3x"></i></div>
												<div class="count announcements-badge">179</div>
												<h3>Total Announcements</h3>
												<p>Manage Announcements</p>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<label>Click button below to add announcements.</label>
										</div>
										<div class="col-lg-12">
											<a href="?pg=admin&vw=addAnnouncementForm&dir=<?php echo sha1("announcements"); ?>" class="btn btn-success col-lg-12"><i class="fa fa-plus"></i> Add Announcements</a>
										</div>
									</div>
									<hr>
								</div>
								<div class="col-lg-9">
									<div class="x_panel">
										<div class="x_title">
											<h2><i class="fa fa-bars"></i> List of School Announcements</h2><br><br>
										</div>
										<div class="x_content">
											<table id="table1" class="table table-striped responsive-utilities jambo_table">
												<thead>
													<tr class="headings">
														<th>
															List of Announcements
														</th>
													</tr>
												</thead>

												<tbody>
													<?php $announcements_info = execSQL("SELECT * FROM tbl_announcements ORDER BY announcement_id DESC","","","variable");?>
													<?php foreach($announcements_info as $index => $announcement){?>
														<tr>
															<td>
																<div class="col-lg-12">
																	<div class="row">
																		<div class="col-lg-2">
																			<div class="row">
																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-12">
																							<?php $image = $announcement["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["announcements_dir"].$announcement["data"]["image"] : showSystemLogo();
																							?>
																							<img src="<?php echo $image ?>" class="image-thumbnail img-responsive" style="height:80px;" >		
																						</div>
																					</div><hr>
																					<div class="row">
																						<div class="col-lg-12">
																							<button class="btn btn-info btn-xs" style="width:100%" onclick="announcementsController.manageAnnouncements.viewAnnouncementDetails(<?php echo $index; ?>)">View</button><br>
																							<a class="btn btn-warning btn-xs" style="width:100%" href="?pg=admin&vw=updateAnnouncementForm&dir=<?php echo sha1("announcements");?>&<?php echo sha1("updateAnnouncementForm"); ?>=<?php echo $announcement["data"]["announcement_id"];?>">Edit</a><br>
																							<button class="btn btn-danger btn-xs" style="width:100%" onclick="announcementsController.manageAnnouncements.removeAnnouncement(<?php echo $index; ?>)">Remove</button>
																							<br>
																							<button class="btn btn-info btn-xs btn-unpost<?php echo $index; ?>" style="width:100%;display:<?php if($announcement["data"]["status"] != 1){echo "none;";}?>" onclick="announcementsController.manageAnnouncements.postUnpostAnnouncement(<?php echo $index; ?>, 0)">Unpost</button>
																					
																							<button class="btn btn-success btn-xs btn-post<?php echo $index; ?>" style="width:100%;display: <?php if($announcement["data"]["status"] == 1){echo "none;";}?>" onclick="announcementsController.manageAnnouncements.postUnpostAnnouncement(<?php echo $index; ?>, 1)">Post</button>
																						</div>	
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-lg-10">
																			<div class="row">
																				<div class="col-lg-12">
																					<strong><?php echo $announcement["data"]["title"];?></strong>
																				</div>
																			</div><br>
																			<div class="row">
																				<div class="col-lg-12">
																					<p><i class="fa fa-calendar"></i> <?php echo date("M d, Y", strtotime($announcement["data"]["date"]));?></p>
																				</div>
																			</div>
																			<hr>
																			<div class="row">
																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-12">
																							<p class="description"><?php echo showModuleDescription($announcement["data"]["description"], 400);?></p>
																						</div>
																						
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																				
															</td>
														</tr>
													<?php }?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			</div>
			<!-- footer content -->
			<?php require_once('views/admin/admin_footer.php');?>
			<!-- /footer content -->

		</div>
		<!-- /page content -->
	</div>
</div>
<script src="app/controllers/admin/announcements/announcementsController.js"></script>
