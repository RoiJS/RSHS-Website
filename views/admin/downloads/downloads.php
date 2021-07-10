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
						<h3>Downloads</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i> Downloads</li>
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
												<div class="icon"><i class="fa fa-files-o fa-3x"></i></div><br>
												<div class="count downloads-badge">0</div>
												<h3>Total Uploaded Files</h3>
												<p>Manage Files.</p>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<h2><i class="fa fa-bars"></i> New File</h2><br>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal form-label-left" onsubmit="downloadController.saveNewFile(this); return false;">
												<div class="row">
													<div class="col-lg-12 ">
														<div class="alert alert-danger alert-dismissible fade in error-preview" role="alert" hidden>
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
													<div class="col-lg-12 ">
														<div class="alert alert-info alert-dismissible fade in file-preview" role="alert" hidden>
															<div class="row">
																<div class="col-lg-2">
																	<center>
																		<i class="file-ico "></i>
																	</center>
																</div>
																<div class="col-lg-10">
																	<p><b>Name:</b> <span class="file-name"></span></p>		
																	<p><b>Size:</b> <span class="file-size"></span></p>				
																</div>
															</div>
															
														</div>
													</div>
												</div>
												<div class="form-group">
													<label>File: *</label>
													<input type="file" name="download_file" class="form-control download_file" accept=".docx, .doc, .pdf" onchange="downloadController.viewFileStatus(this);" required />
												</div>
												<hr>
												<div class="form-group">
													<label>Date: *</label>
													<input type="date" name="txt_date" class="form-control" required>
												</div>
												<div class="form-group">
													<label>File Caption: *</label>
													<textarea name="txt_caption" class="resizable_textarea form-control" placeholder="Enter file caption&hellip;" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" required></textarea>
												</div>
												<div class="form-group">
													<button class="btn btn-success col-lg-12"><i class="fa fa-cloud-upload"></i> Upload File</button>
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
											<table id="table-downloads" class="table table-striped responsive-utilities jambo_table">
												<thead>
													<tr class="headings">
														<th>Caption</th>
														<th>Date Uploaded</th>
														<th>File name</th>
														<th>File size</th>
														<th></th>
													</tr>
												</thead>
												<?php $downloads = execSQL("SELECT * FROM tbl_downloads ORDER BY dateUploaded DESC","","","variable");?>
												<tbody>
												<?php foreach($downloads as $download):?>
													<tr>
														<td title="<?php echo $download["data"]["caption"]; ?>"><?php echo showModuleDescription($download["data"]["caption"], 20);?></td>
														<td><?php echo date("M d, Y", strtotime($download["data"]["dateUploaded"]));?></td>
														<td title="<?php echo $download["data"]["filename"]; ?>"><?php echo showModuleDescription($download["data"]["filename"], 15);?></td>
														<td><?php echo number_format($download["data"]["filesize"] / 1000000,2,".",",")."  MB";?></td>
														<td>
															<button class="btn btn-warning" onclick="downloadController.updateFileForm(<?php echo $download["data"]["download_id"]; ?>)"><i class="fa fa-edit"></i></button>
															<button class="btn btn-danger" onclick="downloadController.removeFile(<?php echo $download["data"]["download_id"]; ?>)"><i class="fa fa-remove"></i></button>
														</td>
													</tr>
												<?php endforeach;?>
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
<script src="app/controllers/admin/downloads/downloadController.js"></script>
