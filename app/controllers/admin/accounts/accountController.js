var http_manager = system.http;
var modal_manager = system.modal;

var accountController = {

	accountForm : {},
	accountList : {},
	
	getAccountList : function(){
		http_manager.http_process({action : "getModuleList", module : "accounts"}).done(function(response){
			accountController.accountList = JSON.parse(response);
			console.log(accountController.accountList);
		});
	},
	
	saveNewAccount : function(addAccountForm){
		var formData = new FormData(addAccountForm);
		formData.append("action","saveNewAccount");
		
		var password = addAccountForm.txt_password.value;
		var confirm_password = addAccountForm.txt_confirm_password.value;
		
		if($(".error-username-message").css("display") == "none" && $(".error-email-address-message").css("display") == "none"){
			if(password == confirm_password){
				bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save new account?"), function(result){
					if(result){
						http_manager.http_process(formData, true).done(function(response){
							if(response){
								bootbox.alert(modal_manager.custom_message("info","New account has been saved."), function(){
									window.location.reload();
								});
							}
						});
					}
				});	
			}else{
				bootbox.alert(modal_manager.custom_message("warning","Password does not match! Be sure you enter the valid password."), function(){
					addAccountForm.txt_password.value = "";
					 addAccountForm.txt_confirm_password.value = "";
				});
			}	
		}
	},
	
	updateAccountForm : function(id){
		http_manager.http_process({action : "updateAccountForm", id : id}).done(function(response){
			accountController.updateAccountForm = modal_manager.modal_dialog("Update account information", response);
		});
	},
	
	saveUpdateAccount: function(updateAccountForm, id){
		
		var formData = new FormData(updateAccountForm);
		formData.append("action","saveUpdateAccount");
		formData.append("id",id);
		
		var password = updateAccountForm.txt_update_password.value;
		var confirm_password = updateAccountForm.txt_update_confirm_password.value;
		
		if(password == confirm_password){
			bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save changes?"), function(result){
				if(result){
					http_manager.http_process(formData, true).done(function(response){
						if(response){
							bootbox.alert(modal_manager.custom_message("info","Selected account has been successfully updated."), function(){
								window.location.reload();
							});
						}
					});
				}
			});	
		}else{
			bootbox.alert(modal_manager.custom_message("warning","Password does not match! Be sure you enter the valid password."), function(){
				updateAccountForm.txt_update_password.value = "";
				 updateAccountForm.txt_update_password.value = "";
			});
		}
	},
	
	removeAccount : function(id){
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove selected account?"), function(result){
			if(result){
				http_manager.http_process({action : "removeAccount", id : id}).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info","Selected account has been removed from the list."), function(){
							window.location.reload();
						});
					}
				});
			}
		});	
	},
	
	activateDeactivateAccount : function(id, status){
		
		if(status == 0){
			$(".btn-deactivate" + id).css({display: "none"});
			$(".btn-activate"  + id).css({display: ""});
		}else if(status == 1){
			$(".btn-deactivate"  + id).css({display: ""});
			$(".btn-activate"  + id).css({display: "none"});
		}
		
		system.http.http_process({action : "activateDeactivateAccount", id : id, status : status}).done(function(response){
			if(response){
				console.log(response);
			}
		});
	},
	
	
	closeAccountForm : function(){
		accountController.updateAccountForm.modal("hide");
	},
	
	verifyAccountEmailAndUsername : function(currentContext, field, message){
		var verify = false;
		for(index in this.accountList){
			if(field == "username"){
				if(this.accountList[index].data.username == currentContext){
					verify = true;
				}	
			}else{
				if(this.accountList[index].data.emailAddress == currentContext){
					verify = true;
				}	
			}	
		}
		
		if(verify == true){
			$(".error-" + field + "-message").show().html(message);
		}else{
			$(".error-" + field + "-message").val("").hide();
		}
	}
}

accountController.getAccountList();