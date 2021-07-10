var http_manager = system.http;
var modal_manager = system.modal;
var image_manager = system.image;

var homeBackgroundsController = {
	image_preview_class : "",
	error_preview_class : "",
	module_class : "",
	
	viewSelectedImage : function(image, module){
		if(module == "admission"){
			this.image_preview_class = ".view-admission-background-image";
			this.error_preview_class = ".error-admission-background-image";
		}else if(module == "news_room"){
			this.image_preview_class = ".view-news-room-background-image";
			this.error_preview_class = ".error-news-room-background-image";
		}else if(module == "announcement"){
			this.image_preview_class = ".view-announcement-background-image";
			this.error_preview_class = ".error-announcement-background-image";
		}else if(module == "history"){
			this.image_preview_class = ".view-history-background-image";
			this.error_preview_class = ".error-history-background-image";
		}else if(module == "event"){
			this.image_preview_class = ".view-event-background-image";
			this.error_preview_class = ".error-event-background-image";
		}else if(module == "footer"){
			this.image_preview_class = ".view-footer-background-image";
			this.error_preview_class = ".error-footer-background-image";
		}
		
		image_manager.preview_selector = this.image_preview_class;
		image_manager.error_selector = this.error_preview_class;
		image_manager.view_image(image.value, image.files[0]);
	},
	
	clearPhotos : function(module){
		
		if(module == "admission"){
			this.image_preview_class = ".view-admission-background-image";
			this.error_preview_class = ".error-admission-background-image";
			this.module_class = "admission_image_file";
		}else if(module == "news_room"){
			this.image_preview_class = ".view-news-room-background-image";
			this.error_preview_class = ".error-news-room-background-image";
			this.module_class = "news_room_image_file";
		}else if(module == "announcement"){
			this.image_preview_class = ".view-announcement-background-image";
			this.error_preview_class = ".error-announcement-background-image";
			this.module_class = "announcement_image_file";
		}else if(module == "history"){
			this.image_preview_class = ".view-history-background-image";
			this.error_preview_class = ".error-history-background-image";
			this.module_class = "history_image_file";
		}else if(module == "event"){
			this.image_preview_class = ".view-event-background-image";
			this.error_preview_class = ".error-event-background-image";
			this.module_class = "event_image_file";
		}else if(module == "footer"){
			this.image_preview_class = ".view-footer-background-image";
			this.error_preview_class = ".error-footer-background-image";
			this.module_class = "footer_image_file";
		}
		
		image_manager.preview_selector = this.image_preview_class;
		image_manager.error_selector = this.error_preview_class;
		
		system.image.reset_image(); 
		document.getElementById(this.module_class).value ='';
	},
	
	saveUpdateBackgrounds : function(updateBackgroundForm, module){
		var formData = new FormData(updateBackgroundForm);
		formData.append("action","saveUpdateBackgrounds");
		formData.append("module", module);
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to change background?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						console.log(response);
						bootbox.alert(modal_manager.custom_message("info", "Selected image has been successfully saved as new background."));
					}
				});
			}
		});
	}
}