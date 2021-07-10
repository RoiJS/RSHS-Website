
var citizenCharterController = {
	
	manageCitizenCharter : {
		
		citizenCharterForm : "",
		citizenCharterList : {},
		current_index : "",
		
		getCitizenCharter : function(){
			system.http.http_process({action : "getCitizenCharter"}).done(function(response){
				citizenCharterController.manageCitizenCharter.citizenCharterList = JSON.parse(response);
				console.log(citizenCharterController.manageCitizenCharter.citizenCharterList);
			});
		},
		
		addCitizenCharterForm :  function(){
			system.http.http_process({action : "addCitizenCharterForm"}).done(function(response){
				citizenCharterController.manageCitizenCharter.citizenCharterForm = system.modal.modal_dialog("Add citizen charter", response);	
			});
		},
		
		closeCitizenCharterForm : function(){
			citizenCharterController.manageCitizenCharter.citizenCharterForm.modal("hide");
		},
		
		saveNewCitizenCharter : function(AddCitizenCharterForm){
			var formData = new FormData(AddCitizenCharterForm);
			formData.append("action","saveNewCitizenCharter");
				
			bootbox.confirm(system.modal.custom_message("question","Are you sure to save new citizen charter?"), function(result){
				if(result){
					system.http.http_process(formData, true).done(function(response){
						if(response){
							bootbox.alert(system.modal.custom_message("info", "New citizen charter has been successfully saved,"), function(){
								window.location = "?pg=admin&main=citizen_charter";
							});
						}
					});		
				}
			});
			
		},
		
		updateCitizenCharterForm : function(index){
			this.current_index = index;
			var id = this.citizenCharterList[this.current_index].data.citizen_charter_id;
			var title = this.citizenCharterList[this.current_index].data.title;
			system.http.http_process({action : "updateCitizenCharterForm", id : id}).done(function(response){
				citizenCharterController.manageCitizenCharter.citizenCharterForm = system.modal.modal_dialog(title, response);
			});
		},
		
		saveUpdateCitizenCharter : function(UpdateCitizenCharterForm){
			var formData = new FormData(UpdateCitizenCharterForm);
			var id = this.citizenCharterList[this.current_index].data.citizen_charter_id;
			
			formData.append("action", "saveUpdateCitizenCharter");
			formData.append("id", id);
			
			bootbox.confirm(system.modal.custom_message("question","Are you sure to save changes"), function(result){
				if(result){
					system.http.http_process(formData, true).done(function(response){
						if(response){
							bootbox.alert(system.modal.custom_message("info", "Selected citizen charter has been successfully updated."), function(){
								window.location = "?pg=admin&main=citizen_charter";
							});
						}
					});
				}
			});
		},
		
		removeCitizenCharter : function(index){
			var id = this.citizenCharterList[index].data.citizen_charter_id;
			bootbox.confirm(system.modal.custom_message("question", "Are you sure to remove selected citizen charter?"), function(result){
				if(result){
					citizenCharterController.manageCitizenCharter.citizenCharterList.splice(index, 1);
					system.http.http_process({action : "removeCitizenCharter", id : id}).done(function(response){
						if(response){
							bootbox.alert(system.modal.custom_message("info", "Selected citizen charter has been successfully removed"), function(){
								window.location = "?pg=admin&main=citizen_charter";
							});
						}
					});
				}
			});
		},
		
		postUnpostCitizenCharter : function(index, status){
			var id = this.citizenCharterList[index].data.citizen_charter_id;
			
			if(status == 0){
				$(".btn-unpost" + index).css({display: "none"});
				$(".btn-post"  + index).css({display: "block"});
			}else if(status == 1){
				$(".btn-unpost"  + index).css({display: "block"});
				$(".btn-post"  + index).css({display: "none"});
			}
			
			system.http.http_process({action : "postUnpostCitizenCharter", id : id, status : status}).done(function(response){
				if(response){
					citizenCharterController.manageCitizenCharter.citizenCharterList[index].data.status = status;
				}
			});
		},
		
		viewCitizenCharterImage : function(file){
			$("#txt_update_image").val(file.value);
			system.image.view_image(file.value, file.files[0]);
		}
	}
}

citizenCharterController.manageCitizenCharter.getCitizenCharter();