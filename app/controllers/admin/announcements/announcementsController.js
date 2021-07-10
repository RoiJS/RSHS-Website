var http_manager = system.http;
var modal_manager = system.modal;
var image_manager = system.image;

var announcementsController = {
	
	manageAnnouncements : {
		
		announcementsList : {},
		viewAnnouncementsDetailsForm : {},
		mainLocation : "?pg=admin&vw=announcements&dir=2a60e4229575eb0a15a8e9ab0ccf8c2f053cad70",
		
		getAnnouncementsList : function(){
			http_manager.http_process({action : "getAnnouncementsList"}).done(function(response){
				announcementsController.manageAnnouncements.announcementsList = JSON.parse(response);
				console.log(announcementsController.manageAnnouncements.announcementsList);
			});
		},
		
		addNewAnnouncement : function(addNewAnnouncementForm){
			var formData = new FormData(addNewAnnouncementForm);
			formData.append("action", "addNewAnnouncement");
			
			bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save new announcement?"), function(result){
				if(result){
					http_manager.http_process(formData, true).done(function(response){
						if(response){
							bootbox.confirm(modal_manager.custom_message("info", "New school announcement has been successfully saved. Would you like to save another school announcement?"), function(result){
								if(result)
									window.location.reload();
								else
									window.location = announcementsController.manageAnnouncements.mainLocation; 
							});
						}
					});
				}
			});
		}, 
		
		saveUpdateAnnouncement : function(updateAnnouncementForm, id){
			
			var formData = new FormData(updateAnnouncementForm);
			formData.append("action", "saveUpdateAnnouncement");
			formData.append("id", id);
			
			bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save changes?"), function(result){
				if(result){
					http_manager.http_process(formData, true).done(function(response){
						console.log(response);
						if(response){
							bootbox.alert(modal_manager.custom_message("info", "Selected announcement has been successfully updated."), function(){
								window.location = announcementsController.manageAnnouncements.mainLocation; 
							});
						}
					});
				}
			});
		},
		
		removeAnnouncement : function(index){
			var id = this.announcementsList[index].data.announcement_id;
			
			bootbox.confirm(modal_manager.custom_message("question","Are you sure to remove selected announcement?"), function(result){
				if(result){
					http_manager.http_process({action : "removeAnnouncement", id : id}).done(function(response){
						if(response){
							bootbox.alert(modal_manager.custom_message("info","Selected announcement has been successfully removed."), function(){
								window.location = announcementsController.manageAnnouncements.mainLocation; 
							});
						}
					});
				}
			});
		},
		
		postUnpostAnnouncement : function(index, status){
			var id = this.announcementsList[index].data.announcement_id;
			
			if(status == 0){
				$(".btn-unpost" + index).css({display: "none"});
				$(".btn-post"  + index).css({display: "block"});
			}else if(status == 1){
				$(".btn-unpost"  + index).css({display: "block"});
				$(".btn-post"  + index).css({display: "none"});
			}
			
			system.http.http_process({action : "postUnpostAnnouncement", id : id, status : status}).done(function(response){
				if(response){
					newsController.manageNews.announcementsList[index].data.status = status;
				}
			});
		},
		
		viewAnnouncementDetails : function(index){
			var id = this.announcementsList[index].data.announcement_id;
			var title = this.announcementsList[index].data.title;
			
			http_manager.http_process({action : "viewAnnouncementDetails" , id : id}).done(function(response){
				announcementsController.manageAnnouncements.viewAnnouncementsDetailsForm = modal_manager.modal_dialog(title,response,"large");	
			});
		},
		
		closeAnnouncementForm : function(){
			announcementsController.manageAnnouncements.viewAnnouncementsDetailsForm.modal('hide');
		},
		
		viewAnnouncementImage : function(announcementImage){
			$("#txt_img_announcement").val(announcementImage.value);
			image_manager.view_image(announcementImage.value, announcementImage.files[0]);
		},
	}
}

announcementsController.manageAnnouncements.getAnnouncementsList();