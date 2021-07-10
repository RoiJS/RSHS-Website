var http_manager = system.http;
var modal_manager = system.modal;
var image_manager = system.image;


var honorController = {
	
	honorForm : {},
	mainLocation : "?pg=admin&vw=academics&dir=a7c2a2659cd42e065f404ee595142b45e8c2c6c9&main=honor_list",
	
	addHonorForm : function(){
		http_manager.http_process({action : "addHonorForm"}).done(function(response){
			honorController.honorForm = modal_manager.modal_dialog("Add new honor", response);
		});
	},
	
	saveNewHonor : function(honorForm){
		var formData = new FormData(honorForm);
		formData.append("action", "saveNewHonor");
		
		bootbox.confirm(modal_manager.custom_message("question","Are you sure to add new honor student?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info","New Honor student has been successfully saved."), function(){
							window.location = honorController.mainLocation;
						});
					}
				});
			}
		});
	},
	
	updateHonorForm : function(id){
		http_manager.http_process({action : "updateHonorForm", id : id}).done(function(response){
			honorController.honorForm = modal_manager.modal_dialog("Update Honor", response);
		});
	},
	
	saveUpdateHonor : function(updateHonorForm, id){
		var formData = new FormData(updateHonorForm);
		formData.append("action", "saveUpdateHonor");
		formData.append("id", id);
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save changes?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "Selected honor student has been successfully updated."), function(){
							window.location = honorController.mainLocation;
						});
					}
				});
			}
		});
	},
	
	removeHonor : function(id){
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove selected honor student?"), function(result){
			if(result){
				http_manager.http_process({action : "removeHonor", id : id}).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "Selected honor student has been successfully removed from the list."), function(){
							window.location = honorController.mainLocation;
						});
					}
				});
			}
		});
	},
	
	closeHonorForm : function(){
		honorController.honorForm.modal("hide");
	}
	
}

