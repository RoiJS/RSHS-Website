<form class="form-horizontal form-label-left" onsubmit="RshsInformationController.manageOtherInformation.emailAddressInformation.saveNewEmailAddress(this, '<?php echo $rshs_info["data"]["emailAddress"]; ?>'); return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label>Email Address:</label>
				<input type="email" name="txt_email_address" value="<?php echo $rshs_info["data"]["emailAddress"];?>" maxlength="100" class="form-control" placeholder="Enter email address&hellip;">
			</div>
		</div>
	<div>
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group pull-right">
				<button type="submit" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-default" onclick="RshsInformationController.manageOtherInformation.emailAddressInformation.closeForm();">Cancel</button>
			</div>
		</div>
	<div>
</div>
