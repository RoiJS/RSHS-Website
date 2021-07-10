<div class="container body"> 
	<div class="main_container">
		<?php $announcement = execSQL("SELECT * FROM tbl_announcements","WHERE announcement_id = :id",[":id" => $_GET[sha1("updateAnnouncementForm")]],"variable",1);?>
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
							<li><i class="fa fa-chevron-right"></i><a href="?pg=admin&vw=announcements&dir=<?php echo sha1("announcements");?>">Announcements</a>  </li>
							<li class="active"><i class="fa fa-chevron-right"></i>Update announcements </li>
						</ol>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="x_panel">
									<div class="x_title">
										<h2><i class="fa fa-file"></i> Edit school announcements</h2>
										<br><br>
									</div>
								</div>		
							</div>
						</div>
						
						<form name="frm-update-announcement" onsubmit="announcementsController.manageAnnouncements.saveUpdateAnnouncement(this, <?php echo $_GET[sha1("updateAnnouncementForm")];?>); return false;">
							<div class="row">
								<div class="col-lg-8">
									<div class="x_panel">
										<div class="x_content">
											<div class="form-group">
												<div class="row">
													<div class="col-lg-7">
														<label>Title: * </label>
														<input type="text" name="txt_announcement_title" required class="form-control" placeholder="Enter announcement title&hellip;" value="<?php echo $announcement["data"]["title"];?>"/>	
													</div>
													<div class="col-lg-5">
														<div class="control-group">
															<div class="controls">
																<div class="col-md-11 xdisplay_inputx form-group has-feedback">
																	<label>Date: *</label>
																	<input type="text" required class="form-control has-feedback-left" id="single_cal3" placeholder="Select date&hellip;" name="txt_announcement_date" aria-describedby="inputSuccess2Status3" value="<?php echo $announcement["data"]["date"];?>" />
																	<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
																	<span id="inputSuccess2Status3" class="sr-only">(success)</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>Description: * </label>
												<textarea class="textarea" required name="txt_announcement_description" readonly placeholder="Enter news description..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $announcement["data"]["description"];?></textarea>	
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="x_panel">
										<div class="x_content">
											<div class="row " >
												<div class="col-lg-12 ">
													<div class="alert alert-danger alert-dismissible fade in error-preview" role="alert" style="display:none;">
														<div class="row">
															<div class="col-lg-2">
																<center>
																	<i class="fa fa-warning fa-2x "></i>
																</center>
															</div>
															<div class="col-lg-10">
																<p class="display-error-text"></p>		
															</div>
														</div>
														
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<div class="rshs-line">
														<?php $image = $announcement["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["announcements_dir"].$announcement["data"]["image"] : showSystemLogo(); ?>
														<img class="img-thumbnail img-responsive center-block preview-image" id="view_image" style="height: 200px;margin-bottom:10px;" src="<?php echo $image;?>" alt="School Seal" accept="image/*"/>
													</div>			
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-lg-12">
													<label>Image: </label>
													<input type="hidden" id="txt_img_announcement" name="txt_img_announcement" value="<?php echo $announcement["data"]["image"];?>"/><br>
													<input type="file" id="img_announcement" name="img_announcement"  class="form-control" accept="image/*"  onchange="announcementsController.manageAnnouncements.viewAnnouncementImage(this);" /><br>
													<button class="btn btn-warning btn-sm" type="button" style="width:100%;" onclick="system.image.reset_image(); document.getElementById('txt_img_announcement').value = ''; document.getElementById('img_announcement').value = '';"> <i class="fa fa-refresh"></i> Clear Photo</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="x_panel">
										<div class="x_content">
											<button class="btn btn-success "><i class="fa fa-save"></i> Save</button>
										</div>
									</div>
								</div>
							</div>
						</form>
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
