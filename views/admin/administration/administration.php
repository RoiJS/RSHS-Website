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
						<h3>Administration</h3>
					</div>
				</div><div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i> Administration</li>
						</ol>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-lg-8">
						<div class="x_panel">
							<div class="row">
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-6">
											<div class="row">
												<div class="col-lg-12">
													<label>Click button below to add administration.</label>
												</div>
												<div class="col-lg-12">
													<button class="btn btn-success col-lg-8" onclick="administrationController.addAdministrationForm();"><i class="fa fa-plus"></i> Add Administration</button>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="row">
												<div class="animated flipInY col-lg-12">
													<div class="tile-stats">
														<div class="icon"><i class="fa fa-users fa-3x"></i></div>
														<div class="count administration-badge">0</div>
														<h3>Total Administration Staffs</h3>
														<p>Manage administration information.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="x_panel">
												<div class="x_title">
													<h2><i class="fa fa-bars"></i> List of School Administration</h2><br><br>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3">	
											<?php $departments = execSQL("SELECT * FROM tbl_departments ORDER BY position DESC","","","variable");?>
											<ul class="nav nav-tabs tabs-left">
												<?php foreach($departments as $index => $department):?>
												<li class="<?php if($index == 0){echo "active";}?>"> <a href="#<?php echo $index;?>" data-toggle="tab"><?php echo $department["data"]["name"];?></a>
												</li>
												<?php endforeach;?>
											</ul>
										</div>
										<div class="col-lg-9">	
											<div class="tab-content">
												<?php foreach($departments as $index => $department):?>
													<div class="tab-pane <?php if($index == 0){echo "active";}?> fade in" id="<?php echo $index;?>">
														<div class="x_panel">
															<div class="x_title">
																<p class="lead"><i class="fa fa-bars"></i> <?php echo $department["data"]["name"];?></p>
															</div>
															<div class="x_content">
																<div class="row">
																	<div class="col-lg-12">
																		<table id="table-curriculum" class="table table-striped responsive-utilities jambo_table">
																			<thead>
																				<tr class="headings">
																					<th>
																						<?php echo $department["data"]["name"];?> staffs
																					</th>
																					<th>Position </th>
																					<th> </th>
																				</tr>
																			</thead>

																			<?php $administrations = execSQL("SELECT * FROM tbl_administrations INNER JOIN tbl_positions ON tbl_positions.position_id = tbl_administrations.position_id","WHERE department_id = :id",[":id" => $department["data"]["department_id"]],"variable"); ?>
																			<tbody>
																				<?php foreach($administrations as $index => $administration):?>
																					<tr>
																						<td title="<?php echo $administration["data"]["firstname"]." ". $administration["data"]["middlename"]." ".$administration["data"]["lastname"]; ?>">
																							<?php echo showModuleDescription($administration["data"]["firstname"]." ". $administration["data"]["middlename"]." ".$administration["data"]["lastname"], 20);?>
																						</td>
																						<td><?php echo $administration["data"]["name"]; ?></td>
																						<td>
																							<div class="row">
																								<div class="col-lg-12">
																									<div class="pull-right">
																									
																										<button style="display:none;" class="btn btn-success" onclick="administrationController.viewAdministrationDetail(<?php echo $administration["data"]["administration_id"]; ?>);"><i class="fa fa-eye"></i></button>
																										
																										<button class="btn btn-warning" onclick="administrationController.updateAdministrationForm(<?php echo $administration["data"]["administration_id"]; ?>);"><i class="fa fa-edit"></i></button>
																										
																										<button class="btn btn-danger" onclick="administrationController.removeAdministration(<?php echo  $administration["data"]["administration_id"]; ?>);"><i class="fa fa-remove"></i></button>
																										
																										<button style="display:<?php if($administration["data"]["status"] == 1){echo "none";}?>" class="btn btn-info btn-activate<?php echo $administration["data"]["administration_id"];?>" onclick="administrationController.activateDeactivateAdministration(<?php echo $administration["data"]["administration_id"]; ?>, 1);"><i class="fa fa-plus-circle"></i></button>
																										
																										<button style="display:<?php if($administration["data"]["status"] == 0){echo "none";}?>" class="btn btn-default btn-deactivate<?php echo $administration["data"]["administration_id"];?>" onclick="administrationController.activateDeactivateAdministration(<?php echo $administration["data"]["administration_id"]; ?>, 0);"><i class="fa fa-minus-circle"></i></button>
																									</div>
																								</div>
																							</div>
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
												<?php endforeach;?>
											</div>
										</div>
									
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel">
                                            <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#department" aria-expanded="true" aria-controls="collapseOne">
                                                <h4 class="panel-title"><i class="fa fa-list"></i> Department List <span class="badge badge-primary label-success pull-right departments-badge">0</span></h4>
                                            </a>
                                            <div id="department" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
													<div class="row">
														<div class="col-lg-12 display-department-list" >
															<!--- Render Department List-->
														</div>
													</div>
													<hr>
													<div class="row">
														<form class="form-horizontal form-label-left" onsubmit="departmentController.saveNewDepartment(); return false;" >
															<div class="form-group">
																<input type="text" required class="form-control txt-new-department-name" placeholder="Enter new department name&hellip;">
															</div>
															<div class="form-group">
																<button class="btn btn-success col-lg-12"><i class="fa fa-save"></i> Save Department</button>
															</div>
														</form>
													</div>
												</div>
                                            
											</div>
                                        </div>
                                        <div class="panel">
                                            <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#position" aria-expanded="false" aria-controls="collapseTwo">
                                                <h4 class="panel-title"><i class="fa fa-list"></i> Position List<span class="badge badge-primary label-success pull-right positions-badge">0</span></h4>
                                            </a>
                                            <div id="position" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
													<div class="row">
														<div class="col-lg-12 display-position-list" >
															<!--- Render Positions List-->
														</div>
													</div>
													<hr>
													<div class="row">
														<form class="form-horizontal form-label-left" onsubmit="positionController.saveNewPosition(); return false;">
															<div class="form-group">
																<input type="text" class="form-control txt-new-position-name" placeholder="Enter new position name&hellip;">
															</div>
															<div class="form-group">
																<button class="btn btn-success col-lg-12"><i class="fa fa-save"></i> Save Position</button>
															</div>
														</form>
													</div>
												</div>
                                            </div>
                                        </div>
									</div>
								</div>
							</div>
						</div>
						<hr>
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
<script src="app/controllers/admin/administrations/administrationController.js"></script>
<script src="app/controllers/admin/administrations/departmentController.js"></script>
<script src="app/controllers/admin/administrations/positionController.js"></script>

