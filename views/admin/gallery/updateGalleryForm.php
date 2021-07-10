<form class="form-horizontal form-label-left" onsubmit="galleryController.saveUpdateGallery(this, <?php echo $gallery["data"]["gallery_id"];?>); return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label>Gallery name: *</label>
				<input type="text" value="<?php echo $gallery["data"]["title"];?>" name="txt_gallery_name" maxlength="100" class="form-control" placeholder="Enter gallery name&hellip;" required />
			</div>
			<div class="form-group">
				<label>Description: *</label>
				<textarea name="txt_gallery_description" class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" required ><?php echo $gallery["data"]["description"];?></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="pull-right">
				<button class="btn btn-success">Save</button>
				<button class="btn btn-default" type="button" onclick="galleryController.closeGalleryForm();">Cancel</button>
			</div>
		</div>
	</div>
</form>
