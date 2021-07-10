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
						<h3>News</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i> News</li>
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
												<div class="icon"><i class="fa fa-file fa-3x"></i></div>
												<?php $newsCount = execSQL("SELECT * FROM tbl_news","","","rows");?>
												<div class="count"><?php echo $newsCount;?></div>
												<h3>Total News</h3>
												<p>Manage School News </p>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<label>Click button below to add news.</label>
										</div>
										<div class="col-lg-12">
											<a href="?pg=admin&vw=addNewsForm&dir=<?php echo sha1("news");?>" class="btn btn-success col-lg-12"><i class="fa fa-plus"></i> Add News</a>
										</div>
									</div>
									<hr>
								</div>
								<div class="col-lg-9">
									<div class="x_panel">
										<div class="x_title">
											<h2><i class="fa fa-bars"></i> List of School News</h2><br><br>
										</div>
										<div class="x_content">
											<table id="table1" class="table table-striped responsive-utilities jambo_table">
												<thead>
													<tr class="headings">
														<th>
															List of News
														</th>
													</tr>
												</thead>

												<tbody>
													<?php $news_info = execSQL("SELECT * FROM tbl_news ORDER BY news_id DESC","","","variable");?>
													<?php foreach($news_info as $index => $news){?>
														<tr>
															<td>
																<div class="col-lg-12">
																	<div class="row">
																		<div class="col-lg-2">
																			<div class="row">
																				<div class="col-lg-12"> 
																					<div class="row">
																						<div class="col-lg-12"> 
																							<?php $image = $news["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["news_dir"].$news["data"]["image"] : showSystemLogo();
																							?>
																							<img src="<?php echo $image ?>" class="image-thumbnail img-responsive" style="height:80px;" >		
																						</div>
																					</div><hr>
																					<div class="row">
																						<div class="col-lg-12">
																							<button class="btn btn-info btn-xs" style="width:100%" onclick="newsController.manageNews.viewNewsDetails(<?php echo $index; ?>)">View</button><br>
																							<a class="btn btn-warning btn-xs" style="width:100%" href="?pg=admin&vw=updateNewsForm&dir=<?php echo sha1("news");?>&<?php echo sha1("updateNewsForm"); ?>=<?php echo $news["data"]["news_id"];?>">Edit</a><br>
																							<button class="btn btn-danger btn-xs" style="width:100%" onclick="newsController.manageNews.removeNews(<?php echo $index; ?>)">Remove</button>
																							<br>
																							<button class="btn btn-info btn-xs btn-unpost<?php echo $index; ?>" style="width:100%;display:<?php if($news["data"]["status"] != 1){echo "none;";}?>" onclick="newsController.manageNews.postUnpostNews(<?php echo $index; ?>, 0)">Unpost</button>
																					
																							<button class="btn btn-success btn-xs btn-post<?php echo $index; ?>" style="width:100%;display: <?php if($news["data"]["status"] == 1){echo "none;";}?>" onclick="newsController.manageNews.postUnpostNews(<?php echo $index; ?>, 1)">Post</button>
																						</div>	
																					</div>
																				</div>
																			</div>
																		</div>
																		
																		<div class="col-lg-10">
																			<div class="row">
																				<div class="col-lg-12">
																					<strong><?php echo $news["data"]["title"];?></strong>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-lg-12">
																					<p><i class="fa fa-calendar"></i> <?php echo date("M d, Y", strtotime($news["data"]["date_submitted"]));?></p>
																				</div>
																			</div>
																			<hr>
																			<div class="row">
																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-12">
																							<p class="description"><?php echo showModuleDescription($news["data"]["description"], 400);?></p>
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
<script src="app/controllers/admin/news/newsController.js"></script>

