<form name="frm_add_honor" onsubmit="honorController.saveUpdateHonor(this, <?php echo $honor["data"]["honor_id"];?>);return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label>Grade Level:</label>
						<select class="grade-level-list form-control" name="txt_grade_level_id" required>
							<option></option>
							<?php $grades = execSQL("SELECT * FROM tbl_grade_level","","","variable");?>
							<?php foreach($grades as $grade):?>
								<option value="<?php echo $grade["data"]["grade_level_id"];?>" <?php if($grade["data"]["grade_level_id"] == $honor["data"]["grade_level_id"]){echo "selected";}?>> 
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
					<div class="form-group">
						<label>First name:</label>
						<input type="text" name="txt_firstname" required value="<?php echo $honor["data"]["firstname"];?>" class="form-control" placeholder="Enter first name name&hellip;" />
					</div>
					<div class="form-group">
						<label>Middle name:</label>
						<input type="text" name="txt_middlename" required value="<?php echo $honor["data"]["middlename"];?>" class="form-control" placeholder="Enter middle name name&hellip;" />
					</div>
					<div class="form-group">
						<label>Last name:</label>
						<input type="text" name="txt_lastname" required value="<?php echo $honor["data"]["lastname"];?>" class="form-control" placeholder="Enter last name name&hellip;" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 pull-right">
			<button class="btn btn-success">Save</button>
			<button class="btn btn-default" type="button" onclick="honorController.closeHonorForm();">Cancel</button>
		</div>
	</div>
</form>
</script>