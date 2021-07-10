var http_manager = system.http;
var modal_manager = system.modal;
var image_manager = system.image;

var administrationController = {
	
	administrationForm : {},
	administrationMainLocation : "?pg=admin&vw=administration&dir=056cbe5952ef759a9c99a3abfb833d280ef2be47",
	
	addAdministrationForm : function(){
		http_manager.http_process({action : "addAdministrationForm"}).done(function(response){
			administrationController.administrationForm = modal_manager.modal_dialog("Add new administration member", response);
		});
	},
	
	saveNewAdministration : function(addNewAdministrationForm){
		var formData = new FormData(addNewAdministrationForm);
		formData.append("action", "saveNewAdministration");
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save new administration member?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "New administration member has been successfully saved."), function(){
							window.location = administrationController.administrationMainLocation;
						});
					}
				});
			}
		});
	},
	
	updateAdministrationForm : function(id){
		http_manager.http_process({action : "updateAdministrationForm", id : id}).done(function(response){
			administrationController.administrationForm = modal_manager.modal_dialog("Update administration Member", response);
		});
	},
	
	saveUpdateAdministration : function(updateAdministrationForm, id){
		var formData = new FormData(updateAdministrationForm);
		formData.append("action", "saveUpdateAdministration");
		formData.append("id", id);
		
		bootbox.confirm(modal_manager.custom_message("question","Are you sure to save changes?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "Selected administration member has been successfully updated."), function(){
							window.location = administrationController.administrationMainLocation;
						});
					}
				});	
			}
		});
	},
	
	removeAdministration : function(id){
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove selected administration member?"), function(result){
			if(result){
				http_manager.http_process({action : "removeAdministration", id : id}).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "Selected administration member has been successfully removed from the list."), function(){
							window.location = administrationController.administrationMainLocation;
						});
					}
				});
			}
		});
	},
	
	activateDeactivateAdministration : function(id, status){
		
		if(status == 0){
			$(".btn-deactivate" + id).css({display: "none"});
			$(".btn-activate"  + id).css({display: ""});
		}else if(status == 1){
			$(".btn-deactivate"  + id).css({display: ""});
			$(".btn-activate"  + id).css({display: "none"});
		}
		
		system.http.http_process({action : "activateDeactivateAdministration", id : id, status : status}).done(function(response){
			if(response){
				console.log(response);
			}
		});
	},
	
	viewAdministrationDetail : function(id){
		console.log(id);
		http_manager.http_process({action : "viewAdministrationDetail", id : id}).done(function(response){
			administrationController.administrationForm = modal_manager.modal_dialog("View Administration Detail", response);
		});
	},
	
	viewAdministrationImage : function(AdministrationImage){
		$("#txt_update_image").val(AdministrationImage.value);
		image_manager.view_image(AdministrationImage.value, AdministrationImage.files[0]);
	},

	closeAdministrationForm : function(){
		this.administrationForm.modal("hide");
	},
	
	verifyDepartmentAsPrincipal : function(id){
		return http_manager.http_process({action : "verifyDepartmentAsPrincipal", id : id});
	}
	
}