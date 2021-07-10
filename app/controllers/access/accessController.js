
var access_controller = {};

access_controller.forgot_password_form = {};

access_controller.login = function(login_form){

	$(".call-out-alert").hide();
	$(".call-out-text").html("");
	
	username = $.trim(login_form.txt_username.value);
	password = $.trim(login_form.txt_password.value);
	
	system.http.http_process({action : "login" , username : username, password : password}).done(function(response){

		if(response == 0){
			window.location = "?pg=admin&main=information&sub=history";
		}else if(response == 1){
			$(".call-out-alert").show();
			$(".call-out-text").html("You cannot login in any more at this moment because this account you are trying to login is currently logged in.");
		}else if(response == 2){
			$(".call-out-alert").show();
			$(".call-out-text").html("Your account has been temporarily deactivated. Please contact your administrator immediately.");
		}else if(response == 3){
			$(".call-out-alert").show();
			$(".call-out-text").html("Invalid account information. Please input a valid account.");
		}
		
		login_form.txt_username.value = "";
		login_form.txt_password.value = "";
	});
}

access_controller.logout = function(){
	bootbox.confirm(system.modal.custom_message("question","Are you sure to log out?"), function(result){
		if(result){
			system.http.http_process({action : "logout"}).done(function(response){
				window.location = "/rshs";
			});
		}
	});
}

access_controller.forgot_password = function(){
	system.http.http_process({action : "forgot_password_form"}).done(function(response){
		access_controller.forgot_password_form = system.modal.modal_dialog("Forgot password", response);
	});
}

access_controller.cancel_forgot_password_form = function(){
	access_controller.forgot_password_form.modal("hide");
}

access_controller.submitEmailAddress = function(forgotPasswordForm){
	var formData = new FormData(forgotPasswordForm);
	formData.append("action", "submitEmailAddress");
	
	bootbox.confirm(system.modal.custom_message("question", "Are you sure to send email address?"), function(result){
		if(result){
			system.http.http_process(formData, true).done(function(response){
				console.log(response);
				if(response){
					access_controller.cancel_forgot_password_form();
					bootbox.alert(system.modal.custom_message("info", "We've sent you a link where you can reset your password. Just login to your email account and follow given instruction to reset your password."), function(){
						window.location = "/rshs";
					});
				}
			});
		}
	});
}

access_controller.resetPassword = function(resetPasswordForm){
	var formData = new FormData(resetPasswordForm);
	formData.append("action", "resetPassword");
	
	var password = resetPasswordForm.txt_new_password.value;
	var retype_password = resetPasswordForm.txt_retype_new_password.value;
	
	if(password == retype_password){
		bootbox.confirm(system.modal.custom_message("question", "Are you sure to your new password?"), function(result){
			if(result){
				system.http.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(system.modal.custom_message("info", "Your new password has been successfully saved. "), function(){
						window.location = '?pg=access';
					});
					}
				});
			}
		});
	}else{
		bootbox.alert(system.modal.custom_message("warning","Password does not match! Be sure you enter the valid password."), function(){
			 resetPasswordForm.txt_new_password.value = "";
			 resetPasswordForm.txt_retype_new_password.value = "";
		});
	}	
}