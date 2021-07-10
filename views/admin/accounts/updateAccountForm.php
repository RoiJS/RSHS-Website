<form class="form-horizontal form-label-left" onsubmit="accountController.saveUpdateAccount(this, <?php echo $account["data"]["account_id"];?>); return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label>Username: * </label>
				<input type="text" value="<?php echo $account["data"]["username"];?>" name="txt_update_username" maxlength="100" class="form-control" placeholder="Enter username&hellip;" required />
			</div>
			<div class="form-group">
				<label>Email address: * </label>
				<input type="email" value="<?php echo $account["data"]["emailAddress"];?>" name="txt_update_email_address" maxlength="100" class="form-control" placeholder="Enter valid email address&hellip;" required />
			</div>
			<hr>
			<div class="form-group">
				<label>Password: *</label>
				<input type="password"  value="<?php echo $account["data"]["password"];?>" name="txt_update_password"  maxlength="100" class="form-control" placeholder="Enter password&hellip;" required />
			</div>
			<div class="form-group">
				<label>Confirm Password: *</label>
				<input type="password"  value="<?php echo $account["data"]["password"];?>" name="txt_update_confirm_password" maxlength="100" class="form-control" placeholder="Retype password&hellip;" required />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="pull-right">
				<button class="btn btn-success">Save</button>
				<button class="btn btn-default" type="button" onclick="accountController.closeAccountForm();">Cancel</button>
			</div>
		</div>
	</div>
</form>
