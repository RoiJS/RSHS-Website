<form name="frm_update_account_information" onsubmit="profileController.saveUpdateProfileInformation(this);return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<label>Username: *</label>
					<div class="form-group update-account-username" >
						<input type="text" maxlength="100" value="<?php echo $account["data"]["username"];?>" name="txt_account_username" class="form-control" placeholder="Enter username&hellip;" required />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<label>Email Address: *</label>
					<div class="form-group update-account-email-address" >
						<input type="email" maxlength="100" value="<?php echo $account["data"]["emailAddress"];?>" name="txt_account_email_address" class="form-control" placeholder="Enter valid email address&hellip;" required />
					</div>
				</div>
			</div>
			<div class="row update-account-password">
				<div class="col-lg-12">
					<div class="form-group ">
						<label>Password: *</label>
						<input type="password" value="<?php echo $account["data"]["password"];?>"  maxlength="100" name="txt_account_password" class="form-control" placeholder="Enter new password&hellip;" required />
					</div>
					<div class="form-group">
						<label>Confirm Password: *</label>
						<input type="password" value="<?php echo $account["data"]["password"];?>"  maxlength="100" name="txt_account_confirm_password" class="form-control" placeholder="Retype password&hellip;" required />
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<div class="pull-right">
				<button class="btn btn-success" type="submit">Save</button>
				<button class="btn btn-default" type="button" onclick="profileController.closeProfileForm();">Cancel</button>
			</div>
		</div>
	</div>
</form>