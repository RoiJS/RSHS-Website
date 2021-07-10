<div class="container body"> 
	<div class="main_container">
		<?php $gallery = execSQL("SELECT * FROM tbl_gallery","WHERE gallery_id = :id",[":id" => $_GET[sha1(getView())]],"variable",1);?>
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
						<h3><?php echo $gallery["data"]["title"];?></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i><a href="?pg=admin&vw=gallery&dir=<?php echo sha1("gallery");?>">Gallery</a>  </li>
							<li class="active"><i class="fa fa-chevron-right"></i>Gallery Photos</li>
						</ol>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="row">
								<div class="col-lg-5">
									<div class="row">
										<div class="animated flipInY col-lg-12">
											<div class="tile-stats">
												<div class="icon"><i class="fa fa-file-image-o fa-3x"></i></div><br>
												<?php $count = execSQL("SELECT * FROM tbl_gallery_photos","WHERE gallery_id = :id",[":id" => $gallery["data"]["gallery_id"]],"rows");?>
												<div class="count"><?php echo $count; ?></div>
												<h3>Total Photos</h3>
												<p>Manage photos.</p>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<h2><i class="fa fa-bars"></i> Upload photos</h2>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<form onsubmit="return galleryPhotosController.uploadSelectedImages();" enctype="multipart/form-data" action="process/uploadPhotos.php" method="POST" >
												<input type="hidden" name="id" value="<?php echo $gallery["data"]["gallery_id"];?>" />
												<div class="row">
													<div class="col-lg-12 display-selected-photos">
														<!--- render selected photos--->
													</div>
												</div>					
												<div class="form-group">
													<label>Select photos: *</label>
													<input type="file" name="gallery_photos[]" id="gallery_photos" class="form-control" required multiple onchange="galleryPhotosController.viewSelectedImage(this);" accept="image/*"/>
												</div>	<br>				
												<div class="form-group">
													<label>Date uploaded: *</label>
													<input type="date" name="txt_date_uploaded" id="txt_date_uploaded" class="form-control" required placeholder="Select date&hellip;" />
												</div><br>
												<div class="form-group">
													<button class="btn btn-warning col-lg-12" type="button" onclick="galleryPhotosController.clearSelectedPhotos();"><i class="fa fa-trash"></i> Clear Photos</button><br>
													<button class="btn btn-success col-lg-12" name="uploadSelectedImages"><i class="fa fa-cloud-upload"></i> Upload Photos</button>
												</div>
											</form>
										</div>
									</div>
									<hr>
								</div>
								<div class="col-lg-7">
									<div class="x_panel">
										<div class="x_title">
											<h2><i class="fa fa-bars"></i> List of photos</h2><br><br>
										</div>
									</div>
									<div class="x_panel">
										<div class="x_content">
											<?php $dates = execSQL("SELECT DISTINCT(dateUploaded) AS date FROM tbl_gallery_photos","WHERE gallery_id = :id ORDER BY dateUploaded DESC",[":id" => $gallery["data"]["gallery_id"]],"variable"); ?>
											
											<?php if(!empty($dates)){?>
												<div class="row">
													<div class="col-lg-12">
														 <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
															<?php foreach($dates as $index => $date):?>
																<div class="panel">
																	<a class="panel-heading <?php if($index != 0){echo "collapsed";}?>" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#date<?php echo $index; ?>" aria-expanded="<?php if($index != 0){echo "false";}else{echo "true";}?>" aria-controls="date">
																		<h4 class="panel-title"><i class="fa fa-calendar"></i> <?php echo date("M d, Y", strtotime($date["data"]["date"]));?></h4>
																	</a>
																	
																	<div id="date<?php echo $index; ?>" class="panel-collapse collapse <?php if($index == 0){echo "in";}?>" role="tabpanel" aria-labelledby="<?php echo $index; ?>">
																		<div class="panel-body">
																			<div class="row">
																				<div class="col-lg-12">
																					<div class="pull-right">
																						<button class="btn btn-danger" onclick="galleryPhotosController.removePhotosByDate('<?php echo $date["data"]["date"];?>');"><i class="fa fa-trash"></i> Remove all</button>
																					</div>
																					
																				</div>
																			</div>
																			<div class="row" >
																				<div class="col-lg-12"  style="height:300px;overflow-y:auto;">
																					<?php $photos = execSQL("SELECT * FROM tbl_gallery_photos","WHERE dateUploaded = :dateUploaded AND gallery_id = :id",[":dateUploaded" => $date["data"]["date"], ":id" => $gallery["data"]["gallery_id"]],"variable");?>
																					<?php if(!empty($photos)){?>
																						<div class="row">
																							<?php foreach($photos as $photo){?>
																								<div class="col-lg-4">
																									<div class="thumbnail" style="height:190px;">
																										<?php $image = $photo["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["gallery_photos_dir"].$photo["data"]["image"] : showSystemLogo(); ?>
																										<div class="image view view-first">
																											<img style="width: 100%; display: block;" src="<?php echo $image; ?>" alt="<?php echo $photo["data"]["imagename"]; ?>" />
																											<div class="mask">
																												<p><?php echo showModuleDescription($photo["data"]["imagename"], 15);?></p>
																												
																												<div class="tools tools-bottom">
																													<a style="cursor:pointer;" onclick="galleryPhotosController.removeGalleryPhoto(<?php echo $photo["data"]["gallery_photo_id"];?>);"><i class="fa fa-times"></i></a>
																													<a style="cursor:pointer;" onclick="galleryPhotosController.updatePhotoDescriptionForm(<?php echo $photo["data"]["gallery_photo_id"];?>);"><i class="fa fa-pencil"></i></a>
																												</div>
																											</div>
																										</div>
																										<div class="caption">
																											<p title="<?php echo $photo["data"]["description"];?>">
																											<?php echo showModuleDescription($photo["data"]["description"], 32);?></p>
																										</div>
																									</div>	
																								</div>
																							<?php }?>	
																						</div>
																					<?php } ?>
																				</div>
																			</div>		
																		</div>
																	</div>
																</div>
															<?php  endforeach;?>
														</div>
													</div>
												</div>
											<?php }else{?>
												<div class="row">
													<div class="col-lg-12">
														<div class="alert alert-info alert-dismissible fade in" role="alert" >
															<div class="row">
																<div class="col-lg-2">
																	<center>
																		<i class="fa fa-info-circle fa-3x "></i>
																	</center>
																</div>
																<div class="col-lg-10">
																	<h2 class="display-error-text">No photo/s have been uploaded yet. </h2>
																	<p class="display-error-text"><p/>		
																</div>
															</div>
															
														</div>
													</div>
												</div>
											<?php }?>
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
<script src="app/controllers/admin/gallery/galleryPhotosController.js"></script>
