var http_manager = system.http;
var modal_manager = system.modal;

var alumniController = {
	
	alumniForm : {},
	alumniMainLocation : "?pg=admin&vw=alumni_list&dir=a3f6c021d71756785621538a0e695e5192b27fdc",
	
	getAlumnList : function(){
		http_manager.http_process({action : "getModuleList", module : "alumni"}).done(function(response){
			alumniController.alumniList = JSON.parse(response);
			console.log(alumniController.alumniList);
		});
	},
	
	addAlumniForm : function(){
		http_manager.http_process({action : "addAlumniForm"}).done(function(response){
			alumniController.alumniForm = modal_manager.modal_dialog("Add new alumnus", response);
		});
	},
	
	saveNewAlumni : function(addNewAlumniForm){
		var formData = new FormData(addNewAlumniForm);
		formData.append("action", "saveNewAlumni");
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save new alumnus in the list?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info","New Alumnus has been successfully saved."), function(){
							window.location = alumniController.alumniMainLocation;
						});
					}
				});
			}
		});
	},
	
	updateAlumniForm : function(id){
		http_manager.http_process({action : "updateALumniForm", id : id}).done(function(response){
			alumniController.alumniForm = modal_manager.modal_dialog("Update Alumnus Information", response);
		});
	},
	
	saveUpdateAlumni : function(updateALumniForm, id){
		var formData = new FormData(updateALumniForm);
		formData.append("action", "saveUpdateAlumni");
		formData.append("id", id);
		
		bootbox.confirm(modal_manager.custom_message("question","Are you sure to save changes?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "Selected alumnus has been successfully updated."), function(){
							window.location = alumniController.alumniMainLocation;
						});
					}
				});
			}
		});
	},
	
	removeAlumni : function(id){
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove selected alumnus?"), function(result){
			if(result){
				http_manager.http_process({action : "removeAlumni", id : id}).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info","Selected alumnus has been removed from the list."), function(){
							window.location = alumniController.alumniMainLocation;
						});
					}
				});
			}
		});
	},
	
	closeAlumniForm : function(){
		alumniController.alumniForm.modal("hide");
	}
	
}