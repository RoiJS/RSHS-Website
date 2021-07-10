<form name="frm_update_bids_and_awards" class="form-horizontal form-label-left" onsubmit="citizenCharterController.manageCitizenCharter.saveUpdateCitizenCharter(this); return false;">
	<div class="row " >
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
								<?php $image = $cc_info["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["citizen_charters_dir"].$cc_info["data"]["image"] : showSystemLogo(); ?>
								<label>Image:</label>
								<img class="preview-image img-thumbnail img-responsive preview-image" required="required" id="view_image" style="height: 200px;margin-bottom:10px;" src="<?php echo $image;?>" alt="School Seal"  />
								<input type="hidden" id="txt_update_image" name="txt_update_image" value="<?php echo $cc_info["data"]["image"];?>"/>
								
								<input type="file" id="image_file" name="image_file" class="form-control" onchange="bidsAndAwardsController.manageBidsAndAwards.viewBidsAndAwardsImage(this);"accept="image/*" /><br>	
								<button class="btn btn-warning btn-sm" type="button" style="width:100%;" onclick="system.image.reset_image(); document.getElementById('txt_update_image').value = ''; document.getElementById('image_file').value = '';"> <i class="fa fa-refresh"></i> Clear Photo</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>		
		</div>
		<div class="col-lg-7">
			<div class="row">
				<div class="col-lg-12">
					 <div class="form-group">
						<label for="name">Title: <span class="required">*</span>
						</label>
						<input id="name" value="<?php echo $cc_info["data"]["title"];?>" class="form-control" name="txt_title" required="required" type="text">
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label>Description:</label>
						<textarea name="txt_description" required="required" style="height:150px;" class="form-control"><?php echo $cc_info["data"]["description"];?></textarea>
					</div>
				</div>
			</div>
			<br>	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group pull-right">
				<button class="btn btn-success" type="submit">Save</button>
				<button class="btn btn-default" type="button" onclick="citizenCharterController.manageCitizenCharter.closeCitizenCharterForm();">Cancel</button>
			</div>
		</div>
	</div>
</form>