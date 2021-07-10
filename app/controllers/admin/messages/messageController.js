var http_manager = system.http;
var modal_manager = system.modal;

var messageController = {
	
	messageForm : {},
	messageMainLocation : "?pg=admin&vw=messages&dir=17f3467db103e03ea7354dd6da9a32c1ed2a07e8",
	sendMessageForm : function(){
		http_manager.http_process({action : "sendMessageForm"}).done(function(response){
			if(response){
				messageController.messageForm= modal_manager.modal_dialog("Send Message", response);
			}
		});
	},
	
	sendMessage : function(sendMessageForm){
		var formData = new FormData(sendMessageForm);
		formData.append("action", "sendMessageAdmin");
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to send message?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "Message has been successfully sent."), function(){
							window.location.reload();
						});
					}
				});
			}
		});
		
	},
	
	replyMessageForm : function(id){
		http_manager.http_process({action : "replyMessageForm", id : id}).done(function(response){
			if(response){
				messageController.messageForm = modal_manager.modal_dialog("Reply Message", response);
			}
		});
	},
	
	replyMessage :function(replyMessageForm, id){
		var formData = new FormData(replyMessageForm);
		formData.append("action", "replyMessage");
		formData.append("id", id);
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to send message?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "Message has been successfully sent."), function(){
							window.location = messageController.messageMainLocation;
						});
					}
				});
			}
		});
	},
	
	removeMessage : function(id){
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove message from the list?"), function(result){
			if(result){
				http_manager.http_process({action : "removeMessage", id : id}).done(function(response){
					if(response){	
						bootbox.alert(modal_manager.custom_message("info", "Message has been successfully removed from the list."), function(){
							window.location = messageController.messageMainLocation;
						});
					}
				});
			}
		});
	},
	closeMessageForm : function(){
		this.messageForm.modal("hide");
	}
}