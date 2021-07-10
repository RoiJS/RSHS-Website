<form name="frm_add_alumnus" onsubmit="alumniController.saveUpdateAlumni(this, <?php echo $alumni["data"]["alumni_id"];?>); return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label>First name:*</label>
						<input type="text" value="<?php echo $alumni["data"]["firstname"];?>" maxlength="100" class="form-control" name="txt_firstname" placeholder="Enter first name&hellip;" required />
					</div>
					<div class="form-group">
						<label>Middle name:*</label>
						<input type="text" value="<?php echo $alumni["data"]["middlename"];?>" maxlength="100" class="form-control" name="txt_middlename" placeholder="Enter middle name&hellip;" required />
					</div>
					<div class="form-group">
						<label>Last name:*</label>
						<input type="text" value="<?php echo $alumni["data"]["lastname"];?>" maxlength="100" class="form-control" name="txt_lastname" placeholder="Enter last name&hellip;" required />
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>Venue Graduated:*</label>
						<input type="text" value="<?php echo $alumni["data"]["venue"];?>" maxlength="100" class="form-control" name="txt_venue_graduated" placeholder="Enter venue graduated&hellip;" required />
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Year Graduated:*</label>
						<select name="txt_year_graduated" class="form-control" required>
							<option></option>
							<?php for($year = date("Y"); $year >= 1985; $year--):?>
								<option value="<?php echo $year; ?>" <?php if($year == $alumni["data"]["yearGraduated"]){echo "selected";}?>><?php echo $year; ?></option>
							<?php endfor;?>
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
				<button class="btn btn-default" type="button"  onclick="alumniController.closeAlumniForm();">Cancel</button>
			</div>
		</div>
	</div>
</form>
