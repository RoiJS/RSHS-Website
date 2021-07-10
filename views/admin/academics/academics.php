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
						<h3>Academics</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i> Academics</li>
						</ol>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel" >
							<div class="col-xs-2 animated flipInY">
								<!-- required for floating -->
								<!-- Nav tabs -->
								<ul class="nav nav-tabs tabs-left">
									<li class="<?php if($_GET["main"] == "academic_event"){echo "active";}?>"> <a href="#academic_calendar" data-toggle="tab"> Academic Calendar</a>
									</li>
									<li class="<?php if($_GET["main"] == "curriculum"){echo "active";}?>"><a href="#curriculum_tab" data-toggle="tab">Curriculum</a>
									</li>
									<li class="<?php if($_GET["main"] == "honor_list"){echo "active";}?>"><a href="#honor_list" data-toggle="tab">Honors List</a>
									</li>
								</ul>
							</div>

							<div class="col-xs-10">
								<!-- Tab panes -->
								<div class="tab-content">
									<!-- Curriculum  tab --->
									<div class="tab-pane fade in <?php if($_GET["main"] == "curriculum"){echo "active";}?>" id="curriculum_tab">
										<div class="x_panel">
											<div class="x_title">
												<p class="lead"><i class="fa fa-bars"></i> Manage Curriculum </p>
											</div>
											<div class="x_content">
												<div class="row">
													<div class="col-lg-12">
														<button class="btn btn-success" onclick="curriculumController.manageCurriculum.addCurriculumForm();"><i class="fa fa-plus"></i> Add Curriculum
														<button class="btn btn-success" onclick="subjectController.addSubjectForm();"><i class="fa fa-plus"></i> Add Subjects</button>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-lg-2">	
														<?php $grade_levels = execSQL("SELECT * FROM tbl_grade_level","","","variable");?>
														<ul class="nav nav-tabs tabs-left">
															<?php foreach($grade_levels as $index => $grade):?>
															<li class="<?php if($index == 0){echo "active";}?>"> <a href="#<?php echo $grade["data"]["grade_level_id"];?>" data-toggle="tab"><?php echo $grade["data"]["grade"];?></a>
															</li>
															<?php endforeach;?>
														</ul>
													</div>
													<div class="col-lg-10">	
														<div class="tab-content">
															<?php foreach($grade_levels as $index => $grade):?>
																<div class="tab-pane <?php if($index == 0){echo "active";}?> fade in" id="<?php echo $grade["data"]["grade_level_id"];?>">
																	<div class="x_panel">
																		<div class="x_title">
																			<p class="lead"><i class="fa fa-bars"></i> <?php echo $grade["data"]["grade"];?></p>
																		</div>
																		<div class="x_content">
																			<div class="row">
																				<div class="col-lg-12">
																					<table id="table-curriculum" class="table table-striped responsive-utilities jambo_table">
																						<thead>
																							<tr class="headings">
																								<th>
																									<?php echo $grade["data"]["grade"];?> Subjects
																								</th>
																							</tr>
																						</thead>

																						<?php $subjects = execSQL("SELECT * FROM tbl_curriculum INNER JOIN tbl_subjects ON tbl_curriculum.subject_id = tbl_subjects.subject_id","WHERE tbl_curriculum.grade_level_id = :id",[":id" => $grade["data"]["grade_level_id"]],"variable");?>
																						<tbody>
																							<?php foreach($subjects as $index => $subject):?>
																								<tr>
																									<td>
																										<div class="row">
																											<div class="col-lg-6">
																												<?php echo $subject["data"]["name"];?>
																											</div>
																											<div class="col-lg-6 pull-right">
																												<div class="pull-right">
																													<button class="btn btn-danger" onclick="curriculumController.manageCurriculum.removeSubjectFromGrade(<?php echo $subject["data"]["curriculum_id"]; ?>);"><i class="fa fa-remove"></i></button>
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
										
									<!-- Honors List  tab --->
									<div class="tab-pane fade in <?php if($_GET["main"] == "honor_list"){echo "active";}?>" id="honor_list">
										<div class="x_panel">
											<div class="x_title">
												<p class="lead"><i class="fa fa-bars"></i> Manage List of Honors </p>
											</div>
											<div class="x_content">
												<div class="row">
													<div class="col-lg-12">
														<button class="btn btn-success" onclick="honorController.addHonorForm();"><i class="fa fa-plus"></i>  Add Honor</button>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-lg-2">	
														<?php $grade_levels = execSQL("SELECT * FROM tbl_grade_level","","","variable");?>
														<ul class="nav nav-tabs tabs-left">
															<?php foreach($grade_levels as $index => $grade):?>
															<li class="<?php if($index == 0){echo "active";}?>"> <a href="#<?php echo $grade["data"]["grade_level_id"]."-honor";?>" data-toggle="tab"><?php echo $grade["data"]["grade"];?></a>
															</li>
															<?php endforeach;?>
														</ul>
													</div>
													<div class="col-lg-10">	
														<div class="tab-content">
															<?php foreach($grade_levels as $index => $grade):?>
																<div class="tab-pane <?php if($index == 0){echo "active";}?> fade in" id="<?php echo $grade["data"]["grade_level_id"]."-honor";?>">
																	<div class="x_panel">
																		<div class="x_title">
																			<p class="lead"><i class="fa fa-bars"></i> <?php echo $grade["data"]["grade"];?></p>
																		</div>
																		<div class="x_content">
																			<div class="row">
																				<div class="col-lg-12">
																					<table id="table-honors" class="table table-striped responsive-utilities jambo_table">
																						<thead>
																							<tr class="headings">
																								<th>
																									<?php echo $grade["data"]["grade"];?> Honor Students
																								</th>
																							</tr>
																						</thead>

																						<?php $students = execSQL("SELECT * FROM tbl_honors","WHERE grade_level_id = :id",[":id" => $grade["data"]["grade_level_id"]],"variable");?>
																						<tbody>
																							<?php foreach($students as $index => $student):?>
																								<tr>
																									<td>
																										<div class="row">
																											<div class="col-lg-6">
																												<?php echo $student["data"]["lastname"].", ".$student["data"]["firstname"]." ".$student["data"]["middlename"];?>
																											</div>
																											<div class="col-lg-6 pull-right">
																												<div class="pull-right">
																													<button class="btn btn-success" onclick="honorController.updateHonorForm(<?php echo $student["data"]["honor_id"]; ?>);"><i class="fa fa-edit"></i></button>
																													
																													<button class="btn btn-danger" onclick="honorController.removeHonor(<?php echo $student["data"]["honor_id"]; ?>);"><i class="fa fa-remove"></i></button>
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
								
									<!-- Academic Event  tab --->
									<div class="tab-pane fade in <?php if($_GET["main"] == "academic_event"){echo "active";}?>" id="academic_calendar">
										<div class="row">
											<div class="col-lg-12">
												<div class="x_panel">
													<div class="x_title">
														<p class="lead"><i class="fa fa-calendar"></i> Academic Calendar</p>
														<div class="clearfix"></div>
													</div>
													<div class="x_content">
														<div class="row">
															<div class="col-lg-12">
																<button class="btn btn-success" onclick="academicEventController.manageAcademicEvent.addAcademicEventForm();"><i class="fa fa-plus"></i>  Add Academic Event</button>
															</div>
														</div>
														<hr>
														<div class="row">
															<div class="col-lg-12">
																<div id="calendar"></div>	
															</div>
														</div>
													</div>
												</div>
											</div>
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
<!-- Full Calendar -->
<script src="script/moment.min.js"></script>
<script src="script/calendar/fullcalendar.min.js"></script>
<script src="app/controllers/admin/academics/academicEventController.js"></script>
<script src="app/controllers/admin/academics/curriculumController.js"></script>
<script src="app/controllers/admin/academics/subjectController.js"></script>
<script src="app/controllers/admin/academics/honorController.js"></script>
