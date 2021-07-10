<div class="container body"> 
	<div class="main_container">
		<?php $news = execSQL("SELECT * FROM tbl_news","WHERE news_id = :id",[":id" => $_GET[sha1("updateNewsForm")]],"variable",1);?>
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
						<h3>News</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i><a href="?pg=admin&vw=news&dir=<?php echo sha1("news");?>">News</a>  </li>
							<li class="active"><i class="fa fa-chevron-right"></i>Update news </li>
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
										<h2><i class="fa fa-file"></i> Update school news</h2>
										<br><br>
									</div>
								</div>		
							</div>
						</div>
						
						<form name="frm-update-news" onsubmit="newsController.manageNews.saveUpdateNews(this, <?php echo $_GET[sha1("updateNewsForm")];?>); return false;">
							<div class="row">
								<div class="col-lg-8">
									<div class="x_panel">
										<div class="x_content">
											<div class="form-group">
												<div class="row">
													<div class="col-lg-7">
														<label>Title: * </label>
														<input type="text" name="txt_news_title" value="<?php echo $news["data"]["title"];?>" required class="form-control" placeholder="Enter news title&hellip;"/>	
													</div>
													<div class="col-lg-5">
														<div class="control-group">
															<div class="controls">
																<div class="col-md-11 xdisplay_inputx form-group has-feedback">
																	<label>Date: *</label>
																	<input type="text" value="<?php echo $news["data"]["date_submitted"];?>" required class="form-control has-feedback-left" id="single_cal3" placeholder="Select date&hellip;" name="txt_news_date" aria-describedby="inputSuccess2Status3">
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
												<textarea class="textarea" required name="txt_news_description" readonly placeholder="Enter news description..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $news["data"]["description"];?></textarea>	
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
														<?php $image = $news["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["news_dir"].$news["data"]["image"] : showSystemLogo(); ?>
														<img class="img-thumbnail img-responsive center-block preview-image" id="view_image" style="height: 200px;margin-bottom:10px;" src="<?php echo $image;?>" alt="School Seal" accept="image/*"/>
													</div>			
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-lg-12">
													<label>Image: </label>
													<input type="file" name="img_news" id="img_news" class="form-control" accept="image/*"  onchange="newsController.manageNews.viewNewsImage(this);" />
													<input type="hidden" id="txt_img_news" name="txt_img_news" value="<?php echo $news["data"]["image"];?>"/><br>
													<button class="btn btn-warning btn-sm" type="button" style="width:100%;" onclick="system.image.reset_image(); document.getElementById('txt_img_news').value = ''; document.getElementById('img_news').value = '';"> <i class="fa fa-refresh"></i> Clear Photo</button>
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
<script src="app/controllers/admin/news/newsController.js"></script>
