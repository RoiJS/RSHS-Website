<form name="frm_update_administration" onsubmit="administrationController.saveUpdateAdministration(this, <?php echo $administration["data"]["administration_id"];?>); return false;">
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
										<?php $image = $administration["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["administrations_dir"].$administration["data"]["image"] : showSystemLogo(); ?>
										<center>
											<img class="preview-image img-thumbnail img-responsive preview-image" required="required" id="view_image" style="height: 200px;margin-bottom:10px;" src="<?php echo $image;?>" alt="School Seal"  />
										</center>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
				
				<div class="col-lg-7">
					<div class="form-group">
						<label>First name:</label>
						<p><?php echo $administration["data"]["firstname"];?></p>
					</div>
					<div class="form-group">
						<label>Middle name:</label>
						<p><?php echo $administration["data"]["middlename"];?></p>
					</div>
					<div class="form-group">
						<label>Last name:</label>
						<p><?php echo $administration["data"]["lastname"];?></p>
					</div>
					<div class="form-group">
						<label>Department:</label>
						<?php $department = execSQL("SELECT * FROM tbl_departments","WHERE department_id = :id",[":id" => $administration["data"]["department_id"]],"variable",1);?>
						<p><?php echo $department["data"]["name"];?></p>
					</div>
					<div class="form-group">
						<label>Position:</label>
						<?php $position = execSQL("SELECT * FROM tbl_positions","WHERE position_id = :id",[":id" => $administration["data"]["position_id"]],"variable",1);?>
						<p><?php echo $position["data"]["name"];?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="pull-right">
				<button class="btn btn-default" type="button"  onclick="administrationController.closeAdministrationForm();">Cancel</button>
			</div>
		</div>
	</div>
</form>
