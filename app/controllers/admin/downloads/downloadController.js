var http_manager = system.http;
var modal_manager = system.modal;

var downloadController = {
	
	downloadForm : {},
	
	saveNewFile : function(file){
		var formData = new FormData(file);
		formData.append("action", "saveNewFile");
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to upload selected file?"), function(result){
			if(result){	
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "New file has been successfully uploaded."), function(){
							window.location.reload();
						});
					}
				});
			}
		});
	},
	
	updateFileForm : function(id){
		http_manager.http_process({action : "updateFileForm", id : id}).done(function(response){
			downloadController.downloadForm = modal_manager.modal_dialog("Update File Information", response);
		});
	},
	
	saveUpdateFile : function(updateFileForm, id){
		var formData = new FormData(updateFileForm);
		formData.append("action", "saveUpdateFile");
		formData.append("id", id);
		
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save changes?"), function(result){
			if(result){
				http_manager.http_process(formData, true).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info","Selected file information has been successfully updated."), function(){
							window.location.reload();
						});
					}
				});
			}
		});
		
	},
	
	removeFile : function(id){
		bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove selected file from the list?"), function(result){
			if(result){
				http_manager.http_process({action : "removeFile", id : id}).done(function(response){
					if(response){
						bootbox.alert(modal_manager.custom_message("info", "Selected file has been removed from the list."), function(){
							window.location.reload();
						});
					}
				});
			}
		});
	},
	
	closeFileForm : function(){
		downloadController.downloadForm.modal("hide");
	},
	
	viewFileStatus : function(file, status){
		
		var status = typeof status !== "undefined" ? status : "add";
		
		if(status == "add"){
			var error_class= ".error-preview";
			var preview_class= ".file-preview";
		}else{
			var error_class = ".error-preview-update";
			var preview_class = ".file-preview-update";
			$("#txt_update_file").val(file.value);
		}
		
		var file = file.files[0];
		var allowed_type = {doc : "application/vnd.openxmlformats-officedocument.wordprocessingml.document", pdf : "application/pdf"};
		var allowed_size = 5000000; // 5 MB
		
		if(typeof file !== "undefined"){
			if(file.type == allowed_type.doc || file.type == allowed_type.pdf){
				if(file.size <= allowed_size){
					
					var filename = file.name;
					var filesize = file.size/ 1000000 + " MB";
					
					$(error_class).hide();
					
					$(preview_class).show();
					$(".file-name").html(filename.substr(0, 20) + "&hellip;");
					$(".file-size").html(parseFloat(filesize).toFixed(2) + " MB");
				
					var filetype = file.type == allowed_type.doc ? "doc" : "pdf";
					
					if(filetype == "doc"){
						$(preview_class + " .file-ico").removeClass("fa fa-file-pdf-o fa-2x");
						$(preview_class + " .file-ico").addClass("fa fa-file-word-o fa-2x");
					}else{
						$(preview_class + " .file-ico").removeClass("fa fa-file-word-o fa-2x");
						$(preview_class + " .file-ico").addClass("fa fa-file-pdf-o fa-2x");
					}
					
				}else{
					$(".download_file").val("");
					$(preview_class).hide();
					$(error_class).show();
					$(error_class + " .display-error-text").html("Invalid file size! <b>Note:</b> Only 5 MB allowed.");
				}
			}else{
				$(".download_file").val("");
				$(preview_class).hide();
				$(error_class).show();
				$(error_class + " .display-error-text").html("Invalid file format! <b>Note:</b> Only docx, doc or pdf file format are allowed.");
			}
		}else{
			$(".download_file").val("");
			$(preview_class).hide();
			$(error_class).hide();
		}
	}
}