var http_manager = system.http;
var modal_manager = system.modal;
var image_manager = system.image;

var newsController = {
	manageNews : {
		newsList : {},
		viewNewsDetailsForm : "",
		mainLocation : "?pg=admin&vw=news&dir=3c6bdcddc94f64bf77deb306aae490a90a6fc300",
		
		getNewsList : function(){
			http_manager.http_process({action : "getNewsList"}).done(function(response){
				newsController.manageNews.newsList = JSON.parse(response);
			});
		},
		
		addNewNews : function(addNewNewsForm){
			var formData = new FormData(addNewNewsForm);
			formData.append("action", "addNewNews");
			
			bootbox.confirm(modal_manager.custom_message("question","Are you sure to save news information?"), function(result){
				if(result){
					http_manager.http_process(formData, true).done(function(response){
						console.log(response);
						if(response){
							bootbox.confirm(modal_manager.custom_message("info", "New school news has been successfully saved. Would you like to save another school news?"), function(result){
								if(result)
									window.location.reload();
								else
									window.location = newsController.manageNews.mainLocation; 
							});
						}
					});
				}
			});
		},
		
		saveUpdateNews : function(updateNewsForm, id){
			
			var formData = new FormData(updateNewsForm);
			formData.append("action", "saveUpdateNews");
			formData.append("id", id);
			
			bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save changes?"), function(result){
				if(result){
					http_manager.http_process(formData, true).done(function(response){
						console.log(response);
						if(response){
							bootbox.alert(modal_manager.custom_message("info", "Selected news has been successfully updated."), function(){
								window.location = newsController.manageNews.mainLocation; 
							});
						}
					});
				}
			});
		},
		
		removeNews : function(index){
			var id = this.newsList[index].data.news_id;
			
			bootbox.confirm(modal_manager.custom_message("question","Are you sure to remove selected news?"), function(result){
				if(result){
					http_manager.http_process({action : "removeNews", id : id}).done(function(response){
						if(response){
							bootbox.alert(modal_manager.custom_message("info","Selected news has been successfully removed."), function(){
								window.location = newsController.manageNews.mainLocation; 
							});
						}
					});
				}
			});
		},
		
		postUnpostNews : function(index, status){
			var id = this.newsList[index].data.news_id;
			
			if(status == 0){
				$(".btn-unpost" + index).css({display: "none"});
				$(".btn-post"  + index).css({display: "block"});
			}else if(status == 1){
				$(".btn-unpost"  + index).css({display: "block"});
				$(".btn-post"  + index).css({display: "none"});
			}
			
			system.http.http_process({action : "postUnpostNews", id : id, status : status}).done(function(response){
				if(response){
					newsController.manageNews.newsList[index].data.status = status;
				}
			});
		},
		
		viewNewsDetails : function(index){
			var id = this.newsList[index].data.news_id;
			var title = this.newsList[index].data.title;
			
			http_manager.http_process({action : "viewNewsDetails" , id : id}).done(function(response){
				newsController.manageNews.viewNewsDetailsForm = modal_manager.modal_dialog(title,response,"large");	
			});
		},
		
		closeNewsForm : function(){
			newsController.manageNews.viewNewsDetailsForm.modal('hide');
		},
		
		viewNewsImage : function(newsImage){
			$("#txt_img_news").val(newsImage.value);
			image_manager.view_image(newsImage.value, newsImage.files[0]);
		},
	}
}

newsController.manageNews.getNewsList();