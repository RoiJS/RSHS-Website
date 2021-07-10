<form name="frm_send_message" onsubmit="messageController.sendMessage(this);return false;"> 
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label>Email Address: *</label>
				<input type="email" name="txt_email_address" class="form-control" required  placeholder="Enter valid email address&hellip;"/>
			</div>
			<div class="form-group">
				<label>Message: *</label>
				<textarea name="txt_message" class="form-control"  placeholder="Enter message&hellip;" required ></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="pull-right">
				<button class="btn btn-success">Send message</button>
				<button class="btn btn-default" type="button" onclick="messageController.closeMessageForm();">Cancel</button>
			</div>
		</div>
	</div>
</form>