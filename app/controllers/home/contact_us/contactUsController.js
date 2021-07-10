var http_manager = system.http;

var contactUsController = {
	sendMessage : function(sendMessageForm){
		var formData = new FormData(sendMessageForm);
		formData.append("action", "sendMessage");
		
		if(confirm("Are you sure to send message?")){
			http_manager.http_process(formData, true).done(function(response){
				if(response){
					alert("Your message has been successfully sent. Thankyou for sending message to our school. The administrator will respond as soon as possible.");
					window.location = "/rshs";
				}
			});
		}
	}
}