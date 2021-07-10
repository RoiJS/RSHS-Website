var http_manager = system.http;
var modal_manager = system.modal;

var galleryPhotosController = {
	
	galleryPhotosForm : {},
	selectedPhotosList : [],
	preview_image : "",
	
	viewSelectedImage : function(images){
		
		this.selectedPhotosList = [];
		
		for(var index = 0; index < images.files.length; index++){
			
			var file = images.files[index];
			var istypevalid = false;
			var issizevalid = false;
			var filename = file.name;
			var filesize = file.size;
			var filetype = file.type;
			
			if($.inArray(filetype, ["image/jpeg","image/png","image/jpg","image/gif"]) != -1){
				istypevalid = true;
			}
			
			if(filesize <= 5000000){
				issizevalid = true;
			}
			
			this.selectedPhotosList.unshift({filename : filename, filesize : filesize, filetype : filetype, istypevalid : istypevalid, issizevalid : issizevalid});
			
		}
		
		this.displaySelectedPhotos();
	},
	
	displaySelectedPhotos : function(){
		http_manager.show_components("displaySelectedPhotos",".display-selected-photos", {data : this.selectedPhotosList});
	},
	
	clearSelectedPhotos : function(){
		
		if(this.selectedPhotosList.length > 0){
			bootbox.confirm(modal_manager.custom_message("question", "Are you sure to clear all selected photos?"), function(result){
				if(result){
					$("#gallery_photos").val("");
					this.selectedPhotosList = [];
					this.displaySelectedPhotos();		
				}
			});	
		}
		
	},
	
	removeSelectedImage : function(index){
		console.log(index);
		document.getElementById("gallery_photos").files[index] = null;
		console.log(document.getElementById("gallery_photos").files);
		bootbox.confirm(modal_manager.custom_message("question","Are you sure to remove selected image?"), function(result){
			if(result){
				galleryPhotosController.selectedPhotosList.splice(index, 1);
				galleryPhotosController.displaySelectedPhotos();
			}
		});
	},
	
	uploadSelectedImages : function(){
		
		if(confirm("Are you sure to upload selected photos?")){
			return true;
		}else{
			return false;
		}
	},
	
	removeGalleryPhoto : function(id){
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure remove selected photo?"), function(result){
			if(result){
				http_manager.http_process({action : "removeGalleryPhoto", id : id}).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info","Selected photo has been successfully removed."), function(){
							window.location.reload();
						});
					}
				});
			}
		});
	},
	
	removePhotosByDate : function(selected_date){
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove all photos?"), function(result){
			if(result){
				http_manager.http_process({action : "removePhotosByDate", selected_date : selected_date}).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "Selected photos have been successfully removed from the list."), function(){	
							window.location.reload();
						});
					}
				});
			}
		});
	},
	
	updatePhotoDescriptionForm : function(id){
		http_manager.http_process({action : "updatePhotoDescriptionForm", id : id}).done(function(response){
			if(response){
				galleryPhotosController.galleryPhotosForm = modal_manager.modal_dialog("Update description", response);
			}
		});
	},
	
	saveUpdatePhotoDescription : function(updatePhotoDescriptionForm, id){
		var formData = new FormData(updatePhotoDescriptionForm);
		formData.append("action", "saveUpdatePhotoDescription");
		formData.append("id",id);
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save changes?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "Selected photo has been updated."), function(){
							window.location.reload();
						});
					}
				});
			}
		});
	},
	
	closeGalleryPhotoForm : function(){
		this.galleryPhotosForm.modal("hide");
	}
}