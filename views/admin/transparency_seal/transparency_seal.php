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
						<h3>Transparency Seal</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i> Transparency Seal</li>
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
												<div class="icon"><i class="fa fa-file fa-3x"></i></div><br>
												<div class="count transparency-seal-badge">0</div>
												<h3>Transparency Seal</h3>
												<p>Manage Transparency Seal.</p>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<label>Click button below to add transparency seal.</label>
										</div>
										<div class="col-lg-12">
											<button class="btn btn-success col-lg-12" onclick="transparencySealController.addTransparencySealForm();"><i class="fa fa-plus"></i> Add Transparency Seal</button>
										</div>
									</div>
									<hr>
								</div>
								<div class="col-lg-9">
									<div class="x_panel">
										<div class="x_title">
											<h2><i class="fa fa-bars"></i> List of Transparency Seal</h2><br><br>
										</div>
										<div class="x_content">
											<table id="table-transparency-seal" class="table table-striped responsive-utilities jambo_table">
												<thead>
													<tr class="headings" >
														<th>List of Transparency Seal</th>
													</tr>
												</thead>
												<?php $transparency_seal = execSQL("SELECT * FROM tbl_transparency_seal ORDER BY transparency_seal_id DESC","","","variable");?>
												<tbody>
												<?php foreach($transparency_seal as $index => $ts){?>
													<tr>
														<td>
															<div class="row">
																<div class="col-lg-12">
																	<div class="row">
																		<div class="col-lg-2">
																			<div class="row">
																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-12">
																							<?php $image = $ts["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["transparency_seal_dir"].$ts["data"]["image"] : showSystemLogo();
																							?>
																							<img src="<?php echo $image ?>" class="image-thumbnail img-responsive" style="height:80px;" >			
																						</div>
																					</div><hr>
																					<div class="row">
																						<div class="col-lg-12">
																							<button class="btn btn-warning btn-xs" style="width:100%" onclick="transparencySealController.updateTransparencySealForm(<?php echo $ts["data"]["transparency_seal_id"]; ?>)">Edit</button><br>
																							
																							<button class="btn btn-danger btn-xs" style="width:100%" onclick="transparencySealController.removeTransparencySeal(<?php echo $ts["data"]["transparency_seal_id"]; ?>)">Remove</button>
																							<br>
																							<button class="btn btn-info btn-xs btn-unpost<?php echo $ts["data"]["transparency_seal_id"]; ?>" style="width:100%;display:<?php if($ts["data"]["status"] != 1){echo "none;";}?>" onclick="transparencySealController.postUnpostTransparencySeal(<?php echo $ts["data"]["transparency_seal_id"]; ?>, 0)">Unpost</button>
																					
																							<button class="btn btn-success btn-xs btn-post<?php echo $ts["data"]["transparency_seal_id"]; ?>" style="width:100%;display: <?php if($ts["data"]["status"] == 1){echo "none;";}?>" onclick="transparencySealController.postUnpostTransparencySeal(<?php echo $ts["data"]["transparency_seal_id"]; ?>, 1)">Post</button>
																						</div>	
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-lg-10">
																			<div class="row">
																				<div class="col-lg-12">
																					<strong><?php echo $ts["data"]["title"];?></strong>
																				</div>
																			</div><br>
																			<div class="row">
																				<div class="col-lg-12">
																					<p><i class="fa fa-calendar"></i> <?php echo date("M d, Y", strtotime($ts["data"]["date"]));?></p>
																				</div>
																			</div>
																			<hr>
																			<div class="row">
																				<div class="col-lg-12">
																					<div class="row">
																						<div class="col-lg-12">
																							<p class="description"><?php echo $ts["data"]["description"];?></p>
																						</div>
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
<script src="app/controllers/admin/transparency_seal/transparencySealController.js"></script>