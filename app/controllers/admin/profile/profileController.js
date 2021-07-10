var http_manager = system.http;
var modal_manager = system.modal;

var profileController = {
	
	profileForm : {},
	
	updateProfileForm : function(){
		http_manager.http_process({action : "updateProfileForm"}).done(function(response){
			profileController.profileForm = modal_manager.modal_dialog("Update Profile Information", response);
		});
	},
	
	saveUpdateProfileInformation : function(updateProfileForm){
		var formData = new FormData(updateProfileForm);
		formData.append("action" , "saveUpdateProfileInformation");
		
		var password = updateProfileForm.txt_account_password.value;
		var confirm_password = updateProfileForm.txt_account_confirm_password.value;
		
		if(password == confirm_password){
			bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save changes?"), function(result){
				if(result){
					http_manager.http_process(formData, true).done(function(response){
						if(response){
							console.log(response);
							bootbox.alert(modal_manager.custom_message("info", "Account information has been successfully updated."), function(){
								window.location.reload();
							});
						}
					});
				}
			});
		}else{
			bootbox.alert(modal_manager.custom_message("warning","Password does not match! Be sure you enter the valid password."), function(){
				updateProfileForm.txt_account_password.value = "";
				 updateProfileForm.txt_account_confirm_password.value = "";
			});
		}
	},
	
	closeProfileForm : function(){
		this.profileForm.modal("hide");
	}
}