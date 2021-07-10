var http_manager = system.http;
var modal_manager = system.modal;
var image_manager = system.image;

var academicEventController = {
	
	manageAcademicEvent : {
		academicEventsList : {},
		academicEventForm : {},
		academicEventMainLocation : "?pg=admin&vw=academics&dir=a7c2a2659cd42e065f404ee595142b45e8c2c6c9&main=academic_event",
		
		viewAcademicEvents :  function(){
			http_manager.http_process({action : "getAcademicEventsList"}).done(function(response){
				academicEventController.manageAcademicEvent.academicEventsList = JSON.parse(response);
				
				var calendar = $('#calendar').fullCalendar({
					selectable: true,
					selectHelper: true,
					
					events: academicEventController.manageAcademicEvent.academicEventsList,
					
					eventClick: function (calEvent, jsEvent, view) {
						academicEventController.manageAcademicEvent.viewAcademicEventForm(calEvent.academic_event_id, calEvent.title);
					}
					
				});	
			});
		},
		
		addAcademicEventForm : function(){
			http_manager.http_process({action : "addAcademicEventForm"}).done(function(response){
				academicEventController.manageAcademicEvent.academicEventForm = modal_manager.modal_dialog("Add new academic event", response);
			});
		},
		
		saveNewAcademicEvent : function(academicEventForm){
			var formData = new FormData(academicEventForm);
			formData.append("action", "saveNewAcademicEvent");
			
			bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save new academic event?"), function(result){
				if(result){
					http_manager.http_process(formData, true).done(function(response){
						if(response){
							bootbox.alert(modal_manager.custom_message("info", "New academic event has been successfully saved."), function(){
								window.location.reload();
							});		
						}
					});
				}
			});
		},
		
		viewAcademicEventForm : function(id, title){
			
			http_manager.http_process({action : "viewAcademicEventForm", id : id}).done(function(response){
				if(response){
					academicEventController.manageAcademicEvent.academicEventForm = modal_manager.modal_dialog(title, response);
				}
			});
		},
		
		saveUpdateAcademicEvent : function(updateAcademicEventForm, id){
			var formData = new FormData(updateAcademicEventForm);
			formData.append("action","saveUpdateAcademicEvent");
			formData.append("id",id);
			
			bootbox.confirm(modal_manager.custom_message("question","Are you sure to save changes?"), function(result){
				if(result){
					http_manager.http_process(formData, true).done(function(response){
						if(response){
							bootbox.alert(modal_manager.custom_message("info","Selected academic event has been successfully updated."), function(){
								window.location = academicEventController.manageAcademicEvent.academicEventMainLocation;
							});
						}
					});
				}
			});
		},
		
		removeAcademicEvent : function(id){
			bootbox.confirm(modal_manager.custom_message("question","Are you sure to remove selected academic event from the list?"), function(result){
				if(result){
					http_manager.http_process({action : "removeAcademicEvent", id : id}).done(function(response){
						if(response){
							bootbox.alert(modal_manager.custom_message("info", "Selected academic event has been successfully removed from the list."), function(){
								window.location = academicEventController.manageAcademicEvent.academicEventMainLocation;
							});
						}
					})
				}
			});
		},
		
		viewAcademicEventImage : function(image){
			$("#txt_update_image").val(image.value);
			image_manager.view_image(image.value, image.files[0]);
		},
		
		closeAcademicEventForm : function(){
			this.academicEventForm.modal("hide");
		},
		
		postUnpostAcademicEvent : function(id, status){
			var action = status == 1 ? "post" : "unpost";
			bootbox.confirm(modal_manager.custom_message("question", "Are you sure to " + action + " selected academic event?"), function(result){
				if(result){
					http_manager.http_process({action : "postUnpostAcademicEvent", id : id, status : status}).done(function(response){
						if(response){
							bootbox.alert(modal_manager.custom_message("info", "Selected academic event has been "+ action + "."), function(){
								window.location.reload();
							});	
						}
					});
				}
			});
		}
		
	}
}

academicEventController.manageAcademicEvent.viewAcademicEvents();