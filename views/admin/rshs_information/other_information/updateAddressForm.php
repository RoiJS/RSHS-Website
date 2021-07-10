<form class="form-horizontal form-label-left" onsubmit="RshsInformationController.manageOtherInformation.addressInformation.saveNewAddress(this, '<?php echo $rshs_info["data"]["address"]; ?>'); return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label>Address:</label>
				<input type="text" name="txt_address" value="<?php echo $rshs_info["data"]["address"];?>" maxlength="100" class="form-control" placeholder="Enter address&hellip;">
			</div>
		</div>
	<div>
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group pull-right">
				<button type="submit" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-default" onclick="RshsInformationController.manageOtherInformation.addressInformation.closeForm();">Cancel</button>
			</div>
		</div>
	<div>
</div>
