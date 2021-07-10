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
						<h3>Alumni List</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i> Alumni List</li>
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
												<div class="icon"><i class="fa fa-users fa-3x"></i></div>
												<div class="count alumni-badge">0</div>
												<h3>Total Alumni</h3>
												<p>Manage Alumni information.</p>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<label>Click button below to add alumnus.</label>
										</div>
										<div class="col-lg-12">
											<button class="btn btn-success col-lg-12" onclick="alumniController.addAlumniForm();"><i class="fa fa-plus"></i> Add Alumnus</button>
										</div>
									</div>
									<hr>
								</div>
								<div class="col-lg-9">
									<div class="x_panel">
										<div class="x_title">
											<h2><i class="fa fa-bars"></i> List of School Alumni</h2><br><br>
										</div>
										<div class="x_content">
											<table id="table-alumni" class="table table-striped responsive-utilities jambo_table">
												<thead>
													<tr class="headings">
														<th>Name</th>
														<th>Venue </th>
														<th>Year Graduated </th>
														<th></th>
													</tr>
												</thead>
												<?php $alumni = execSQL("SELECT * FROM tbl_alumni ORDER BY lastname DESC","","","variable");?>
												<tbody>
													<?php foreach($alumni as $al):?>
														<tr>
															<td title="<?php echo $al["data"]["lastname"].", ".$al["data"]["firstname"]." ".$al["data"]["middlename"]; ?>"><?php echo showModuleDescription($al["data"]["lastname"].", ".$al["data"]["firstname"]." ".$al["data"]["middlename"], 30);?></td>
															<td title="<?php echo $al["data"]["venue"]; ?>"><?php echo showModuleDescription($al["data"]["venue"], 20);?></td>
															<td><?php echo $al["data"]["yearGraduated"];?></td>
															<td>
																<div class="row">
																	<div class="col-lg-12">
																		<button class="btn btn-warning" onclick="alumniController.updateAlumniForm(<?php echo $al["data"]["alumni_id"];?>);"><i class="fa fa-edit"></i></button>
																		<button class="btn btn-danger" onclick="alumniController.removeAlumni(<?php echo $al["data"]["alumni_id"];?>);"><i class="fa fa-remove"></i></button>
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
<script src="app/controllers/admin/alumni/alumniController.js"></script>