var http_manager = system.http;
var modal_manager = system.modal;

var galleryController = {
	
	galleryForm : {},
	
	saveNewGallery : function(addNewGalleryForm){
		var formData = new FormData(addNewGalleryForm);
		formData.append("action", "addNewGalleryForm");
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save new gallery?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "New gallery has been successfully saved."), function(){
							window.location.reload();
						});
					}
				});
			}
		});
	
	},
	
	updateGalleryForm : function(id){
		http_manager.http_process({action : "updateGalleryForm", id : id}).done(function(response){
			galleryController.galleryForm = modal_manager.modal_dialog("Update gallery information", response);
		});
	},
	
	saveUpdateGallery : function(updateGalleryForm, id){
		var formData = new FormData(updateGalleryForm);
		formData.append("action", "saveUpdateGallery");
		formData.append("id", id);
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save changes?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "Selected gallery has been successfully updated."), function(){
							window.location.reload();
						});
					}
				});
			}
		});
	},
	
	removeGallery : function(id){
		
		bootbox.confirm(modal_manager.custom_message("question", "All photos uploaded to this gallery will also be removed. Do you still want to remove selected gallery?"), function(result){
			if(result){
				http_manager.http_process({action : "removeGallery", id : id}).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "Selected gallery has been successfully removed from the list."), function(){
							window.location.reload();
						});
					}
				});
			}
		});
	},
	
	postUnpostGallery : function(id, status){
		
		if(status == 0){
			$(".btn-unpost" + id).css({display: "none"});
			$(".btn-post"  + id).css({display: ""});
		}else if(status == 1){
			$(".btn-unpost"  + id).css({display: ""});
			$(".btn-post"  + id).css({display: "none"});
		}
		
		system.http.http_process({action : "postUnpostGallery", id : id, status : status}).done(function(response){
			if(response){
				console.log(response);
			}
		});
	},
	
	closeGalleryForm : function(){
		this.galleryForm.modal("hide");
	}
	
}