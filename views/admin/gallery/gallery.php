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
						<h3>Gallery</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i> Gallery</li>
						</ol>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="row">
								<div class="col-lg-4">
									<div class="row">
										<div class="animated flipInY col-lg-12">
											<div class="tile-stats">
												<div class="icon"><i class="fa fa-file-image-o fa-3x"></i></div><br>
												<div class="count gallery-badge">0</div>
												<h3>Total Galleries</h3>
												<p>Manage Galleries.</p>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<h2><i class="fa fa-bars"></i> New Gallery</h2>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal form-label-left" onsubmit="galleryController.saveNewGallery(this); return false;">
												<div class="form-group">
													<label>Gallery name: *</label>
													<input type="text" name="txt_gallery_name" maxlength="100" class="form-control" placeholder="Enter gallery name&hellip;" required />
												</div>
												<div class="form-group">
													<label>Description: *</label>
													<textarea name="txt_gallery_description" class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" required ></textarea>
												</div>
												<div class="form-group">
													<button class="btn btn-success col-lg-12"><i class="fa fa-save"></i> Save gallery</button>
												</div>
											</form>
										</div>
									</div>
									<hr>
								</div>
								<div class="col-lg-8">
									<div class="x_panel">
										<div class="x_title">
											<h2><i class="fa fa-bars"></i> List of files</h2><br><br>
										</div>
										<div class="x_content">
											<table id="table1" class="table table-striped responsive-utilities jambo_table">
												<thead>
													<tr class="headings">
														<th>Title </th>
														<th>Description </th>
														<th>Date Created </th>
														<th></th>
													</tr>
												</thead>

												<?php $galleries = execSQL("SELECT * FROM tbl_gallery ORDER BY dateCreated DESC","","","variable");?>
												<tbody>
												<?php foreach($galleries as $gallery):?>
													<tr >
														<td>
															<?php echo showModuleDescription($gallery["data"]["title"],10);?>
														</td>
														<td>
															<?php echo showModuleDescription($gallery["data"]["description"], 30);?>
														</td>
														<td>
															<?php echo date("M d, Y", strtotime($gallery["data"]["dateCreated"]));?>
														</td>
														<td>
															<div class="pull-right">
																<a class="btn btn-default" href="?pg=admin&vw=galleryPhotos&dir=<?php echo sha1("gallery");?>&<?php echo sha1("galleryPhotos");?>=<?php echo $gallery["data"]["gallery_id"];?>"><i class="fa fa-photo"></i></a>
																
																<button class="btn btn-warning" onclick="galleryController.updateGalleryForm(<?php echo $gallery["data"]["gallery_id"];?>);"><i class="fa fa-edit"></i></button>
																
																<button class="btn btn-danger" onclick="galleryController.removeGallery(<?php echo $gallery["data"]["gallery_id"];?>);"><i class="fa fa-remove"></i></button>
																
																<button class="btn btn-info btn-post<?php echo $gallery["data"]["gallery_id"];?>" style="display:<?php if($gallery["data"]["status"] == 1){echo "none";}?>" onclick="galleryController.postUnpostGallery(<?php echo $gallery["data"]["gallery_id"];?>, 1);"><i class="fa fa-plus-circle"></i></button>
																<button class="btn btn-default btn-unpost<?php echo $gallery["data"]["gallery_id"];?>"style="display:<?php if($gallery["data"]["status"] == 0){echo "none";}?>" onclick="galleryController.postUnpostGallery(<?php echo $gallery["data"]["gallery_id"];?>, 0);"><i class="fa fa-minus-circle"></i></button>
															</div>
														</td>
													</tr>
												<?php endforeach;?>
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
<script src="app/controllers/admin/gallery/galleryController.js"></script>
