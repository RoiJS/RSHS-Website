<form class="form-horizontal form-label-left" onsubmit="RshsInformationController.manageOtherInformation.contactInformation.saveNewContact(this, '<?php echo $rshs_info["data"]["contactNo"]; ?>'); return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label>Contact no:</label>
				<input type="text" name="txt_contact_info" data-inputmask="'mask' : '(999) 999-9999'" value="<?php echo $rshs_info["data"]["contactNo"];?>" maxlength="100" class="form-control txt-contact-no" placeholder="Enter contact no&hellip;">
			</div>
		</div>
	<div>
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group pull-right">
				<button type="submit" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-default" onclick="RshsInformationController.manageOtherInformation.contactInformation.closeForm();">Cancel</button>
			</div>
		</div>
	</div>
</form>
<!-- input mask -->
<script src="script/input_mask/jquery.inputmask.js"></script>
<script>
	$(document).ready(function () {
		$(".txt-contact-no").inputmask();
	});
</script>