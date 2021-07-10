<form name="frm_add_administration" onsubmit="administrationController.saveNewAdministration(this); return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">	
				<div class="col-lg-5 ">
					<div class="row">
						<div class="col-lg-12">
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
						<div class="col-lg-12 center-margin">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<label>Image:</label>
										<center>
											<img class="preview-image img-thumbnail img-responsive preview-image" required="required" id="view_image" style="height: 200px;margin-bottom:10px;" src="<?php echo showSystemLogo();?>" alt="School Seal"  />
										</center>
										
										<input type="file" name="image_file" id="image_file" class="form-control" onchange="administrationController.viewAdministrationImage(this);" accept="image/*" /><br>
										<button class="btn btn-warning btn-sm" type="button" style="width:100%;" onclick="system.image.reset_image(); document.getElementById('image_file').value = '';"> <i class="fa fa-refresh"></i> Clear Photo</button>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
				<div class="col-lg-7">
					<div class="form-group">
						<label>First name: *</label>
						<input type="text" maxlength="100" class="form-control" name="txt_firstname" placeholder="Enter first name&hellip;" required />
					</div>
					<div class="form-group">
						<label>Middle name: *</label>
						<input type="text" maxlength="100" class="form-control" name="txt_middlename" placeholder="Enter middle name&hellip;" required />
					</div>
					<div class="form-group">
						<label>Last name: </label>
						<input type="text" maxlength="100" class="form-control" name="txt_lastname" placeholder="Enter last name&hellip;" required />
					</div>
					<div class="form-group">
						<label>Department: *</label>
						<select name="txt_department" class="form-control" required>
							<option></option>
							<?php $departments = execSQL("SELECT * FROM tbl_departments ORDER BY department_id DESC","","","variable");?>
							<?php foreach($departments as $department):?>
								<option value="<?php echo $department["data"]["department_id"];?>"><?php echo $department["data"]["name"];?></option>
							<?php endforeach;?>
						</select>
					</div>
					<div class="form-group">
						<label>Position: *</label>
						<select name="txt_position" class="form-control" required>
							<option></option>
							<?php $positions = execSQL("SELECT * FROM tbl_positions ORDER BY position_id DESC","","","variable");?>
							<?php foreach($positions as $position):?>
								<option value="<?php echo $position["data"]["position_id"];?>"><?php echo $position["data"]["name"];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="pull-right">
				<button class="btn btn-success">Save</button>
				<button class="btn btn-default" type="button"  onclick="administrationController.closeAdministrationForm();">Cancel</button>
			</div>
		</div>
	</div>
</form>
