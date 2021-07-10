<form name="frm_update_photo_description" onsubmit="galleryPhotosController.saveUpdatePhotoDescription(this, <?php echo $photo["data"]["gallery_photo_id"];?>);return false;">
	<div class="row">
		<div class="col-lg-12">
			<label>Description: </label>
			<textarea class="form-control" name="txt_photo_description" placeholder="Enter photo description&hellip;" required></textarea>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-l2">
			<div class="pull-right">
				<button class="btn btn-success">Save</button>
				<button class="btn btn-default" type="button" onclick="galleryPhotosController.closeGalleryPhotoForm();">Cancel</button>
			</div>
		</div>
	</div>
</form>
