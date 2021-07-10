<form name="frm_update_transparenct_seal" class="form-horizontal form-label-left" onsubmit="transparencySealController.saveUpdateTransparencySeal(this, <?php echo $transparency_seal["data"]["transparency_seal_id"];?>); return false;">
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
								<label>Image:</label>
								<?php $image = $transparency_seal["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["transparency_seal_dir"].$transparency_seal["data"]["image"] : showSystemLogo(); ?>
								<center>
									<img class="preview-image img-thumbnail img-responsive preview-image" required="required" id="view_image" style="height: 200px;margin-bottom:10px;" src="<?php echo $image;?>" alt="School Seal"  />
								</center>
								<input type="hidden" id="txt_update_image" name="txt_update_image" value="<?php echo $transparency_seal["data"]["image"];?>"/>
								
								<input type="file" id="image_file" name="image_file" class="form-control" onchange="transparencySealController.viewTransparencySealImage(this);" accept="image/*" /><br>	
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
						<input id="name" maxlength="100" value="<?php echo  $transparency_seal["data"]["title"];?>" class="form-control" name="txt_title" required="required" type="text" placeholder="Enter title&hellip;" />
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label>Date:*</label>
						<input id="name" class="form-control" value="<?php echo  $transparency_seal["data"]["date"];?>" name="txt_date" required="required" type="date" placeholder="Select date&hellip;">
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label>Description:*</label>
						<textarea name="txt_description" required="required" style="height:150px;" class="form-control"placeholder="Enter description&hellip;"><?php echo  $transparency_seal["data"]["description"];?></textarea>
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
				<button class="btn btn-default" type="button" onclick="transparencySealController.closeTransparencySealForm();">Cancel</button>
			</div>
		</div>
	</div>
</form>