<form name="frm_add_curriculum" onsubmit="curriculumController.manageCurriculum.saveNewCurriculum();return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label>Grade Level:</label>
						<select class="grade-level-list form-control" >
							<option></option>
							<?php $grades = execSQL("SELECT * FROM tbl_grade_level","","","variable");?>
							<?php foreach($grades as $grade):?>
								<option value="<?php echo $grade["data"]["grade_level_id"];?>"> 
									<?php echo $grade["data"]["grade"];?>
								</option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-12">	
					<div class="row">
						<div class="col-lg-10">
							<div class="form-group">
								<label>Subjects:</label>
								<select class="subject-list form-control">
									<option></option>
									<?php $subjects = execSQL("SELECT * FROM tbl_subjects","","","variable");?>
									<?php foreach($subjects as $subject):?>
										<option value="<?php echo $subject["data"]["subject_id"];?>" class="<?php echo $subject["data"]["subject_id"];?>"> 
											<?php echo $subject["data"]["name"];?>
										</option>
									<?php endforeach;?>
								</select>
							</div>	
						</div>
						<div class="col-lg-2">
							<div class="form-group">
								<label>.</label><br>
								<button class="btn btn-success col-lg-12" type="button" onclick="curriculumController.manageCurriculum.addSelectedSubject();"><i class="fa fa-arrow-down"></i></button>
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="selected-subjects">
								<!--- Render Selected Subjects-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 pull-right">
			<button class="btn btn-success">Save</button>
			<button class="btn btn-default" type="button" onclick="curriculumController.manageCurriculum.closeCurriculumForm();">Cancel</button>
		</div>
	</div>
</form>
</script>