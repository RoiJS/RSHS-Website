<?php $rshsInformation = execSQL("SELECT * FROM tbl_rshs_information","","","variable",1);?>
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
						<h3>RSHS Information</h3>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li class="active"><i class="fa fa-chevron-right"></i> RSHS Information</li>
						</ol>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_content">
								<div class="col-xs-2 animated flipInY">
									<!-- required for floating -->
									<!-- Nav tabs -->
									<ul class="nav nav-tabs tabs-left">
									
										<li class="<?php if($_GET["main"] == "information" || !isset($_GET["main"])){echo "active";}?>"><a href="#information"  data-toggle="tab">Information</a>
										</li>
										<li class="<?php if($_GET["main"] == "home_backgrounds"){echo "active";}?>"><a href="#home_backgrounds"  data-toggle="tab">Home backgrounds</a>
										</li>
										<li class="<?php if($_GET["main"] == "bids_awards"){echo "active";}?>"><a href="#bids_and_awards"  data-toggle="tab">Bids &amp; Awards</a>
										</li>
										<li class="<?php if($_GET["main"] == "citizen_charter"){echo "active";}?>"><a href="#citizen_charter"  data-toggle="tab">Citizen Charter</a>
										</li>
									</ul>
								</div>

								<div class="col-xs-10 ">
									<!-- Tab panes -->
									<div class="tab-content">
										<!--- Information Tab -->
										<div class="tab-pane fade in <?php if($_GET["main"] == "information" || !isset($_GET["main"])){echo "active";}?>" id="information">
											<div class="x_panel" > 
												<div class="x_title">
													 <h2><i class="fa fa-info-circle"></i> Information</h2>
													 <br><br>
												</div>
												<div class="x_content">
													<div class="" role="tabpanel" data-example-id="togglable-tabs">
														<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
															<li role="presentation" class="<?php if($_GET["sub"] == "history" || !isset($_GET["sub"])){echo "active";}?>"><a href="#history_tab" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">History</a>
															</li>
															<li role="presentation" class="<?php if($_GET["sub"] == "mission"){echo "active";}?>"><a href="#mission_tab" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Mission</a>
															</li>
															<li role="presentation" class="<?php if($_GET["sub"] == "vision"){echo "active";}?>"><a href="#vision_tab" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Vision</a>
															</li>
															<li role="presentation" class="<?php if($_GET["sub"] == "admission"){echo "active";}?>"><a href="#admission_tab" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Admission</a>
															</li>
															<li role="presentation" class="<?php if($_GET["sub"] == "contact_information"){echo "active";}?>"><a href="#contact_information_tab" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Other Information</a>
															</li>
														</ul>
														<div id="myTabContent" class="tab-content">
															<!-- History Tab -->
															<div role="tabpanel" class="tab-pane <?php if($_GET["sub"] == "history" || !isset($_GET["sub"])){echo "active";}?> fade in" id="history_tab" aria-labelledby="home-tab">
																<p class="lead">Brief History Description</p>
																<hr>
																<div class="row">
																	<div class="col-lg-12">
																		<textarea class="textarea" id="txt_history" readonly placeholder="Enter history description..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $rshsInformation["data"]["history"];?></textarea>				
																	</div>
																</div>
																<br>
																<div class="row">
																	<div class="col-lg-12">
																		<button class="btn btn-success pull-right" onclick="RshsInformationController.manageHistory(document.getElementById('txt_history').value, '<?php echo $rshsInformation["data"]["history"]; ?>')">Save</button>			
																	</div>
																</div>
															</div>
															<!-- History Tab -->
															
															<!-- Mission Tab -->
															<div role="tabpanel" class="tab-pane <?php if($_GET["sub"] == "mission"){echo "active";}?> fade in" id="mission_tab" aria-labelledby="profile-tab">
																<p class="lead">Mission Description</p>
																<hr>
																<div class="row">
																	<div class="col-lg-12">
																		<textarea class="textarea" id="txt_mission" readonly placeholder="Enter mission description..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $rshsInformation["data"]["mission"];?></textarea>				
																	</div>
																</div>
																<br>
																<div class="row">
																	<div class="col-lg-12">
																		<button class="btn btn-success pull-right" onclick="RshsInformationController.manageMission(document.getElementById('txt_mission').value, '<?php echo $rshsInformation["data"]["mission"]; ?>');">Save</button>			
																	</div>
																</div>
															</div>
															<!-- Mission Tab -->
															
															<!-- Vision Tab -->
															<div role="tabpanel" class="tab-pane <?php if($_GET["sub"] == "vision"){echo "active";}?> fade in" id="vision_tab" aria-labelledby="profile-tab">
																<p class="lead">Vision Description</p>
																<hr>
																<div class="row">
																	<div class="col-lg-12">
																		<textarea class="textarea" id="txt_vision" readonly placeholder="Enter vision description..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $rshsInformation["data"]["vision"];?></textarea>				
																	</div>
																</div>
																<br>
																<div class="row">
																	<div class="col-lg-12">
																		<button class="btn btn-success pull-right" onclick="RshsInformationController.manageVision(document.getElementById('txt_vision').value, '<?php echo $rshsInformation["data"]["vision"]; ?>');">Save</button>			
																	</div>
																</div>
															</div>
															<!-- Vision Tab -->
															
															<!-- Admission Tab -->
															<div role="tabpanel" class="tab-pane <?php if($_GET["sub"] == "admission"){echo "active";}?> fade in" id="admission_tab" aria-labelledby="profile-tab">
																<p class="lead">Admission Description</p>
																<hr>
																<div class="row">
																	<div class="col-lg-12">
																		<textarea class="textarea" id="txt_admission" readonly placeholder="Enter mission description..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $rshsInformation["data"]["admission"];?></textarea>				
																	</div>
																</div>
																<br>
																<div class="row">
																	<div class="col-lg-12">
																		<button class="btn btn-success pull-right" onclick="RshsInformationController.manageAdmission(document.getElementById('txt_admission').value, '<?php echo $rshsInformation["data"]["admission"];?>');">Save</button>			
																	</div>
																</div>
															</div>
															<!-- Admission Tab -->
															
															<div role="tabpanel" class="tab-pane <?php if($_GET["sub"] == "other_information"){echo "active";}?> fade in" id="contact_information_tab" aria-labelledby="profile-tab">
																<div class="row">
																	<div class="col-lg-12">
																		<div class="row">
																			<!-- School Seal -->
																			<div class="col-lg-6">
																				<div class="x_panel">
																					<div class="x_title">
																						<p class="lead">School Seal</p>
																					</div>
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
																						<div class="row " >
																							<div class="col-lg-12 ">
																								<div class="rshs-line">
																									<img class="img-thumbnail img-responsive center-block preview-image" id="view_image" style="height: 200px;margin-bottom:10px;" src="<?php echo showSystemLogo();?>" alt="School Seal" accept="image/*"/>
																								</div>
																							</div>
																						</div>
																						<br>
																						<div class="row">
																							<form name="frm_update_school_seal" onsubmit="RshsInformationController.manageOtherInformation.schoolOfficialSeal.saveNewImage(this); return false;">
																								<div class="col-lg-10">
																									<input type="file" name="school_seal"  class="form-control" accept="image/*" onchange="RshsInformationController.manageOtherInformation.schoolOfficialSeal.viewImage(this);" />
																								</div>
																								<div class="col-lg-2">
																									<button class="btn btn-success" ><i class="fa fa-save"></i></button>
																								</div>
																							</form>
																						</div>
																					</div>
																				</div>
																			</div>
																			<!-- School Seal -->
																			
																			<!-- Other Information -->
																			<div class="col-lg-6">
																				<div class="x_panel">
																					<div class="x_title">
																						<p class="lead">Contact Information</p>
																					</div>
																					<div class="x_content">
																						<div class="row">
																							<div class="col-lg-12">
																								<div class="rshs-line">	
																								
																									<!-- Address Information -->
																									<div class="row">
																										<div class="col-lg-10">
																											<div class="row">
																												<div class="col-lg-12">
																													<label>Address: <label>
																												</div>
																												<div class="col-lg-12">
																													<p><?php echo $rshsInformation["data"]["address"];?><p>
																												</div>
																											</div>
																										</div>
																										<div class="col-lg-2">
																											<div class="row">
																												<div class="col-lg-12">
																													<button class="btn btn-success" onclick="RshsInformationController.manageOtherInformation.addressInformation.updateAddress();"><i class="fa fa-edit"></i></button>
																												</div>
																											</div>
																										</div>
																									</div>
																									<!-- Address Information -->
																								</div>	
																							</div>
																						</div>
																						<hr>
																						<div class="row">
																							<div class="col-lg-12">
																							
																								<!-- Contact Information -->
																								<div class="rshs-line">	
																									<div class="row">
																										<div class="col-lg-10">
																											<div class="row">
																												<div class="col-lg-12">
																													<label>Contact No: <label>
																												</div>
																												<div class="col-lg-12">
																													<p><?php echo $rshsInformation["data"]["contactNo"];?><p>
																												</div>
																											</div>
																										</div>
																										<div class="col-lg-2">
																											<div class="row">
																												<div class="col-lg-12">
																													<button class="btn btn-success" onclick="RshsInformationController.manageOtherInformation.contactInformation.updateContact();"><i class="fa fa-edit"></i></button>
																												</div>
																											</div>
																										</div>
																									</div>
																								</div>	
																								<!-- Contact Information -->
																								
																							</div>
																						</div>
																						<hr>
																						<div class="row">
																							<div class="col-lg-12">
																								<!-- Email Address -->
																								<div class="rshs-line">	
																									<div class="row">
																										<div class="col-lg-10">
																											<div class="row">
																												<div class="col-lg-12">
																													<label>Email Address: <label>
																												</div>
																												<div class="col-lg-12">
																													<p><?php echo $rshsInformation["data"]["emailAddress"];?><p>
																												</div>
																											</div>
																										</div>
																										<div class="col-lg-2">
																											<div class="row">
																												<div class="col-lg-12">
																													<button class="btn btn-success" onclick="RshsInformationController.manageOtherInformation.emailAddressInformation.updateEmailAddress();"><i class="fa fa-edit"></i></button>
																												</div>
																											</div>
																										</div>
																									</div>
																								</div>	
																								<!-- Email Address -->
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																			<!-- Other Information -->
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										
										</div>
										<!--- Information Tab -->
										
										<!--- Home Backgrounds Tab -->
										<div class="tab-pane fade in <?php if($_GET["main"] == "home_backgrounds"){echo "active";}?>" id="home_backgrounds">
											<div class="x_panel" > 
												<div class="x_title">
													 <h2><i class="fa fa-photo"></i> Home Backgrounds</h2>
													 <br><br>
												</div>
												<div class="x_content">
													<div class="" role="tabpanel" data-example-id="togglable-tabs">
														<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
															<li role="presentation" class="active"><a href="#admission_background" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Admission</a>
															</li>
															<li role="presentation" class="<?php if($_GET["sub"] == "newsroom_background"){echo "active";}?>"><a href="#newsroom_background" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">News Room </a>
															</li>
															<li role="presentation" class="<?php if($_GET["sub"] == "announcement_background"){echo "active";}?>"><a href="#announcement_background" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Announcement </a>
															</li>
															<li role="presentation" class="<?php if($_GET["sub"] == "announcement_background"){echo "active";}?>"><a href="#event_background" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Event </a>
															</li>
															<li role="presentation" class="<?php if($_GET["sub"] == "history_background"){echo "active";}?>"><a href="#history_background" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">History </a>
															</li>
															<li role="presentation" class="<?php if($_GET["sub"] == "footer_background"){echo "active";}?>"><a href="#footer_background" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Footer </a>
															</li>
														</ul>
														
														<div id="myTabContent" class="tab-content">
															<!-- Admission Background Tab -->
															<div role="tabpanel" class="tab-pane <?php if($_GET["sub"] == "admission_background" || !isset($_GET["sub"])){echo "active";}?> active fade in" id="admission_background" aria-labelledby="home-tab">
																<p class="lead">Admission Background</p>
																<hr>
																<div class="row">
																	<div class="col-lg-12">
																		<label>Image:</label>
																		<div class="row">
																			<div class="col-lg-12">
																				<div class="alert alert-danger alert-dismissible fade in error-admission-background-image" role="alert" style="display:none;">
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
																				<center>
																					<?php $image = $rshsInformation["data"]["admissionBackground"] != "" ? $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshsInformation["data"]["admissionBackground"] : showSystemLogo(); ?>
																					<img class="view-admission-background-image img-thumbnail img-responsive" required="required" id="view_image" style="height: 100%;margin-bottom:10px;" src="<?php echo $image;?>" />
																				</center>	
																			</div>
																		</div>
																		<div class="row">
																			<form name="frm_update_admission_image" onsubmit="homeBackgroundsController.saveUpdateBackgrounds(this, 'admission'); return false;">
																				<div class="col-lg-8">
																					<input type="file" name="admission_image_file" class="form-control" id="admission_image_file" onchange="homeBackgroundsController.viewSelectedImage(this, 'admission');" accept="image/*" required />		
																				</div>
																				<div class="col-lg-4">
																					<button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
																					<button class="btn btn-default" onclick="homeBackgroundsController.clearPhotos('admission')" type="button"><i class="fa fa-remove"></i> Clear</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>	
															</div>
															<!-- Admission Background Tab -->
															
															<!-- News Room Background Tab -->
															<div role="tabpanel" class="tab-pane fade in" id="newsroom_background" aria-labelledby="home-tab">
																<p class="lead">News Room Background</p>
																<hr>
																<div class="row">
																	<div class="col-lg-12">
																		<label>Image:</label>
																		<div class="row">
																			<div class="col-lg-12">
																				<div class="alert alert-danger alert-dismissible fade in error-news-room-background-image" role="alert" style="display:none;">
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
																				<center>
																					<?php $image = $rshsInformation["data"]["newsRoomBackground"] != "" ? $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshsInformation["data"]["newsRoomBackground"] : showSystemLogo(); ?>
																					<img class="view-news-room-background-image img-thumbnail img-responsive" required="required" id="view_image" style="height: 100%;margin-bottom:10px;" src="<?php echo $image;?>" />
																				</center>	
																			</div>
																		</div>
																		<div class="row">
																			<form name="frm_update_admission_image" onsubmit="homeBackgroundsController.saveUpdateBackgrounds(this, 'news_room'); return false;">
																				<div class="col-lg-8">
																					<input type="file" name="news_room_image_file" class="form-control" id="news_room_image_file" onchange="homeBackgroundsController.viewSelectedImage(this, 'news_room');" accept="image/*" required />		
																				</div>
																				<div class="col-lg-4">
																					<button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
																					<button class="btn btn-default" onclick="homeBackgroundsController.clearPhotos('news_room')" type="button"><i class="fa fa-remove"></i> Clear</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>	
															</div>
															<!-- News Room Background Tab -->
															
															<!--Announcement Background Tab -->
															<div role="tabpanel" class="tab-pane fade in" id="announcement_background" aria-labelledby="home-tab">
																<p class="lead">Announcement Background</p>
																<hr>
																<div class="row">
																	<div class="col-lg-12">
																		<label>Image:</label>
																		<div class="row">
																			<div class="col-lg-12">
																				<div class="alert alert-danger alert-dismissible fade in error-announcement-background-image" role="alert" style="display:none;">
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
																				<center>
																					<?php $image = $rshsInformation["data"]["announcementBackground"] != "" ? $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshsInformation["data"]["announcementBackground"] : showSystemLogo(); ?>
																					<img class="view-announcement-background-image img-thumbnail img-responsive" required="required" id="view_image" style="height: 100%;margin-bottom:10px;" src="<?php echo $image;?>" />
																				</center>	
																			</div>
																		</div>
																		<div class="row">
																			<form name="frm_update_announcement_image" onsubmit="homeBackgroundsController.saveUpdateBackgrounds(this, 'announcement'); return false;">
																				<div class="col-lg-8">
																					<input type="file" name="announcement_image_file" class="form-control" id="announcement_image_file" onchange="homeBackgroundsController.viewSelectedImage(this, 'announcement');" accept="image/*" required />		
																				</div>
																				<div class="col-lg-4">
																					<button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
																					<button class="btn btn-default" onclick="homeBackgroundsController.clearPhotos('announcement')" type="button"><i class="fa fa-remove"></i> Clear</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>	
															</div>
															<!--Announcement Background Tab -->
															
															<!--Event Background Tab -->
															<div role="tabpanel" class="tab-pane fade in" id="event_background" aria-labelledby="home-tab">
																<p class="lead">Event Background</p>
																<hr>
																<div class="row">
																	<div class="col-lg-12">
																		<label>Image:</label>
																		<div class="row">
																			<div class="col-lg-12">
																				<div class="alert alert-danger alert-dismissible fade in error-event-background-image" role="alert" style="display:none;">
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
																				<center>
																					<?php $image = $rshsInformation["data"]["eventBackground"] != "" ? $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshsInformation["data"]["eventBackground"] : showSystemLogo(); ?>
																					<img class="view-event-background-image img-thumbnail img-responsive" required="required" id="view_image" style="height: 100%;margin-bottom:10px;" src="<?php echo $image;?>" />
																				</center>	
																			</div>
																		</div>
																		<div class="row">
																			<form name="frm_update_event_image" onsubmit="homeBackgroundsController.saveUpdateBackgrounds(this, 'event'); return false;">
																				<div class="col-lg-8">
																					<input type="file" name="event_image_file" class="form-control" id="event_image_file" onchange="homeBackgroundsController.viewSelectedImage(this, 'event');" accept="image/*" required />		
																				</div>
																				<div class="col-lg-4">
																					<button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
																					<button class="btn btn-default" onclick="homeBackgroundsController.clearPhotos('event')" type="button"><i class="fa fa-remove"></i> Clear</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>	
															</div>
															<!--Announcement Background Tab -->
															
															<!--History Background Tab -->
															<div role="tabpanel" class="tab-pane fade in" id="history_background" aria-labelledby="home-tab">
																<p class="lead">History Background</p>
																<hr>
																<div class="row">
																	<div class="col-lg-12">
																		<label>Image:</label>
																		<div class="row">
																			<div class="col-lg-12">
																				<div class="alert alert-danger alert-dismissible fade in error-history-background-image" role="alert" style="display:none;">
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
																				<center>
																					<?php $image = $rshsInformation["data"]["historyBackground"] != "" ? $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshsInformation["data"]["historyBackground"] : showSystemLogo(); ?>
																					<img class="view-history-background-image img-thumbnail img-responsive" required="required" id="view_image" style="height: 100%;margin-bottom:10px;" src="<?php echo $image;?>" />
																				</center>	
																			</div>
																		</div>
																		<div class="row">
																			<form name="frm_update_history_image" onsubmit="homeBackgroundsController.saveUpdateBackgrounds(this, 'history'); return false;">
																				<div class="col-lg-8">
																					<input type="file" name="history_image_file" class="form-control" id="history_image_file" onchange="homeBackgroundsController.viewSelectedImage(this, 'history');" accept="image/*" required />		
																				</div>
																				<div class="col-lg-4">
																					<button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
																					<button class="btn btn-default" onclick="homeBackgroundsController.clearPhotos('history')" type="button"><i class="fa fa-remove"></i> Clear</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>	
															</div>
															<!--History Background Tab -->
														
															<!--Footer Background Tab -->
															<div role="tabpanel" class="tab-pane fade in" id="footer_background" aria-labelledby="home-tab">
																<p class="lead">Footer Background</p>
																<hr>
																<div class="row">
																	<div class="col-lg-12">
																		<label>Image:</label>
																		<div class="row">
																			<div class="col-lg-12">
																				<div class="alert alert-danger alert-dismissible fade in error-footer-background-image" role="alert" style="display:none;">
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
																				<center>
																					<?php $image = $rshsInformation["data"]["footerBackground"] != "" ? $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshsInformation["data"]["footerBackground"] : showSystemLogo(); ?>
																					<img class="view-footer-background-image img-thumbnail img-responsive" required="required" id="view_image" style="height: 100%;margin-bottom:10px;" src="<?php echo $image;?>" />
																				</center>	
																			</div>
																		</div>
																		<div class="row">
																			<form name="frm_update_footer_image" onsubmit="homeBackgroundsController.saveUpdateBackgrounds(this, 'footer'); return false;">
																				<div class="col-lg-8">
																					<input type="file" name="footer_image_file" class="form-control" id="footer_image_file" onchange="homeBackgroundsController.viewSelectedImage(this, 'footer');" accept="image/*" required />		
																				</div>
																				<div class="col-lg-4">
																					<button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
																					<button class="btn btn-default" onclick="homeBackgroundsController.clearPhotos('footer')" type="button"><i class="fa fa-remove"></i> Clear</button>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>	
															</div>
															<!--Footer Background Tab -->
														
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--- Home Backgrounds Tab -->
										
										
										<!--- Bids & Awards Tab -->
										<div class="tab-pane fade in <?php if($_GET["main"] == "bids_awards"){echo "active";}?>" id="bids_and_awards">
											<div class="x_panel" > 
												<div class="x_title">
													 <h2><i class="fa fa-trophy"></i> Bids & Awards</h2>
													 <br><br>
												</div>
												<div class="x_content">
													<div class="row">
														<div class="col-lg-12">
															<button class="btn btn-success" onclick="bidsAndAwardsController.manageBidsAndAwards.addBidsAndAwardsForm();"><i class="fa fa-plus"></i>  Add Bids & Awards</button>
														</div>
													</div>
													<hr>
													<div class="row">
														<div class="col-lg-12">
															<div >
																<table id="tbl-bids-awards" class="table table-striped responsive-utilities jambo_table">
																	<thead>
																		<tr class="headings">
																			<th>Bids and Awards</th>
																		</tr>
																	</thead>
																	<?php $bids_and_awards = execSQL("SELECT * FROM tbl_bids_and_awards ORDER BY bids_and_awards_id DESC","","","variable");?>
																	<tbody>
																	<?php foreach($bids_and_awards as $index => $cc){?>
																		<tr>
																			<td>
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="row">
																							<div class="col-lg-2">
																								<?php $image = $cc["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["bids_awards_dir"].$cc["data"]["image"] : showSystemLogo();
																								?>
																								<img src="<?php echo $image ?>" class="image-thumbnail img-responsive" style="height:80px;" >
																							</div>
																							<div class="col-lg-10">
																								<div class="row">
																									<div class="col-lg-12">
																										<strong><?php echo $cc["data"]["title"];?></strong>
																									</div>
																								</div>
																								<hr>
																								<div class="row">
																									<div class="col-lg-12">
																										<div class="row">
																											<div class="col-lg-10">
																												<p><?php echo $cc["data"]["description"];?></p>
																											</div>
																											<div class="col-lg-2">
																												<button class="btn btn-warning btn-xs" style="width:100%" onclick="bidsAndAwardsController.manageBidsAndAwards.updateBidsAndAwardsForm(<?php echo $index; ?>)">Edit</button><br>
																												<button class="btn btn-danger btn-xs" style="width:100%" onclick="bidsAndAwardsController.manageBidsAndAwards.removeBidsAndAwards(<?php echo $index; ?>)">Remove</button>
																												<br>
																												<button class="btn btn-info btn-xs btn-unpost<?php echo $index; ?>" style="width:100%;display:<?php if($cc["data"]["status"] != 1){echo "none;";}?>" onclick="bidsAndAwardsController.manageBidsAndAwards.postUnpostBidsAndAwards(<?php echo $index; ?>, 0)">Unpost</button>
																										
																												<button class="btn btn-success btn-xs btn-post<?php echo $index; ?>" style="width:100%;display: <?php if($cc["data"]["status"] == 1){echo "none;";}?>" onclick="bidsAndAwardsController.manageBidsAndAwards.postUnpostBidsAndAwards(<?php echo $index; ?>, 1)">Post</button>
																												
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
										<!--- Bids & Awards Tab -->
										
										<!--- Citizen Charter -->
										<div class="tab-pane fade in <?php if($_GET["main"] == "citizen_charter"){echo "active";}?>" id="citizen_charter">
											<div class="x_panel"> 
												<div class="x_title">
													 <h2><i class="fa fa-file"></i> Citizen Charter</h2>
													 <br><br>
												</div>
												<div class="x_content">
													<div class="row">
														<div class="col-lg-12">
															<button class="btn btn-success" onclick="citizenCharterController.manageCitizenCharter.addCitizenCharterForm();"><i class="fa fa-plus"></i>  Add Citizen Charter</button>
														</div>
													</div>
													<hr>
													<div class="row">
														<div class="col-lg-12">
															<div >
																<table id="tbl-citizen-charters" class="table table-striped responsive-utilities jambo_table">
																	<thead>
																		<tr class="headings">
																			<th>Citizen Charters</th>
																		</tr>
																	</thead>
																	<?php $citizen_charters = execSQL("SELECT * FROM tbl_citizen_charters ORDER BY citizen_charter_id DESC","","","variable");?>
																	<tbody>
																	<?php foreach($citizen_charters as $index => $cc){?>
																		<tr>
																			<td>
																				<div class="row">
																					<div class="col-lg-12">
																						<div class="row">
																							<div class="col-lg-2">
																								<?php $image = $cc["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["citizen_charters_dir"].$cc["data"]["image"] : showSystemLogo();
																								?>
																								<img src="<?php echo $image ?>" class="image-thumbnail img-responsive" style="height:80px;" >
																							</div>
																							<div class="col-lg-10">
																								<div class="row">
																									<div class="col-lg-12">
																										<strong><?php echo $cc["data"]["title"];?></strong>
																									</div>
																								</div>
																								<hr>
																								<div class="row">
																									<div class="col-lg-12">
																										<div class="row">
																											<div class="col-lg-10">
																												<p><?php echo $cc["data"]["description"];?></p>
																											</div>
																											<div class="col-lg-2">
																												<button class="btn btn-warning btn-xs" style="width:100%" onclick="citizenCharterController.manageCitizenCharter.updateCitizenCharterForm(<?php echo $index; ?>)">Edit</button><br>
																												<button class="btn btn-danger btn-xs" style="width:100%" onclick="citizenCharterController.manageCitizenCharter.removeCitizenCharter(<?php echo $index; ?>)">Remove</button>
																												<br>
																												<button class="btn btn-info btn-xs btn-unpost<?php echo $index; ?>" style="width:100%;display:<?php if($cc["data"]["status"] != 1){echo "none;";}?>" onclick="citizenCharterController.manageCitizenCharter.postUnpostCitizenCharter(<?php echo $index; ?>, 0)">Unpost</button>
																										
																												<button class="btn btn-success btn-xs btn-post<?php echo $index; ?>" style="width:100%;display: <?php if($cc["data"]["status"] == 1){echo "none;";}?>" onclick="citizenCharterController.manageCitizenCharter.postUnpostCitizenCharter(<?php echo $index; ?>, 1)">Post</button>
																												
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
										<!--- Citizen Charter -->
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
<script src="app/controllers/admin/rshs_information/rshsInformationController.js"></script>
<script src="app/controllers/admin/rshs_information/bidsAndAwardsController.js"></script>
<script src="app/controllers/admin/rshs_information/citizenCharterController.js"></script>
<script src="app/controllers/admin/rshs_information/homeBackgroundsController.js"></script>

