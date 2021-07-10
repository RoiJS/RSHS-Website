<form name="frm_send_message" onsubmit="messageController.replyMessage(this, <?php echo $message["data"]["message_id"]; ?>); return false;"> 
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label>Email Address: *</label><br>
				<p><?php echo $message["data"]["emailAddress"];?></p>
				<input type="hidden" name="txt_email_adress" value="<?php echo $message["data"]["emailAddress"];?>" />
			</div>
			<hr	>
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