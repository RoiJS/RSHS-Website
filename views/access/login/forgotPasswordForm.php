<form name="frm_forgot_password" onsubmit="access_controller.submitEmailAddress(this); return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label>Email address:</label>
				<input type="email" name="txt_email_address" class="form-control" placeholder="Enter your valid and active email address&hellip;" required />
			</div>
		</div>
	</div>
	</div class="row">
		<div class="col-lg-12">
			<div class="pull-right">
				<button class="btn btn-success">Send</button>
				<button class="btn btn-default" type="button" onclick="access_controller.cancel_forgot_password_form();">Cancel</button>
			</div>
		</div>
	</div>
</form>