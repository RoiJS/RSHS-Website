var http_manager = system.http;
var modal_manager = system.modal;
var image_manager = system.image;

var transparencySealController = {
	transparencySealForm : {},
	transparencySealMainLocation : "?pg=admin&vw=transparency_seal&dir=b4ba0491d54bcc3f49b8ea34955a3c26673ece3c",
	
	addTransparencySealForm : function(){
		http_manager.http_process({action : "addTransparencySealForm"}).done(function(response){
			transparencySealController.transparencySealForm = modal_manager.modal_dialog("Add new transparency seal", response);
		});
	},
	
	saveNewTransparencySeal : function(addTransparencySealForm){
		var formData = new FormData(addTransparencySealForm);
		formData.append("action", "saveNewTransparencySeal");
		
		bootbox.confirm(modal_manager.custom_message("question","Are you sure to save new transparency seal?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info","New transparency seal has been successfully saved."), function(){
							window.location = transparencySealController.transparencySealMainLocation;
						});
					}
				});
			}
		});
	},
	
	updateTransparencySealForm : function(id){
		http_manager.http_process({action : "updateTransparencySealForm", id : id }).done(function(response){
			transparencySealController.transparencySealForm = modal_manager.modal_dialog("Update transparency seal", response);
		});
	},
	
	saveUpdateTransparencySeal : function(updateTransparencySealForm, id){
		var formData = new FormData(updateTransparencySealForm);
		formData.append("action", "saveUpdateTransparencySeal");
		formData.append("id", id);
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save changes?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info","Selected transparency seal has been successfully updated."), function(){
							window.location.reload();
						});
					}
				});
			}
		});
	},
	
	removeTransparencySeal : function(id){
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove selected transparency seal?"), function(result){
			if(result){
				http_manager.http_process({action : "removeTransparencySeal", id : id}).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info","Selected transparency seal has been successfully removed from the list."), function(){
							window.location.reload();
						});
					}
				});
			}
		});
	},
	
	postUnpostTransparencySeal : function(id, status){
		
		if(status == 0){
			$(".btn-unpost" + id).css({display: "none"});
			$(".btn-post"  + id).css({display: "block"});
		}else if(status == 1){
			$(".btn-unpost"  + id).css({display: "block"});
			$(".btn-post"  + id).css({display: "none"});
		}
		
		system.http.http_process({action : "postUnpostTransparencySeal", id : id, status : status});
	},
		
	viewTransparencySealImage : function(transparencySealImage){
		$("#txt_update_image").val(transparencySealImage.value);
		image_manager.view_image(transparencySealImage.value, transparencySealImage.files[0]);
	},
	
	closeTransparencySealForm : function(){
		this.transparencySealForm.modal("hide");
	}
	
	
}