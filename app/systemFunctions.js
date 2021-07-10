var system = {};

system.http = {};
system.http.http_non_form_request_config = {url : "process/process.php", type : "POST"};
system.http.http_form_request_config = {url : "process/process.php", type : "POST", cache : false, contentType : false, processData : false};
system.http.http_process = function(data, is_form_request){
	
	var config = (typeof is_form_request !== "undefined" || is_form_request == true) ? this.http_form_request_config : this.http_non_form_request_config ;
	config.data = data;
	return $.ajax(config);
}
system.http.show_components = function(components, spot, request){
	var data = {action : "showComponents", components : components};
	
	if(typeof request !== "undefined"){
		data.send = request; 
	}
	
	this.http_process(data).done(function(response){
		$(spot).html(response);
	});	
}

system.image = {};
system.image.preview_selector = ".preview-image";
system.image.error_selector = ".error-preview";
system.image.allowed_image_size = 10000;
system.image.allowed_image_format = ["image/jpeg","image/png","image/jpg","image/gif"];
system.image.view_image = function(selected_image, actual_file, preview_selector, error_selector, id){

	var id = typeof id !== "undefined" ? id : "";
	var error_selector = typeof error_selector !== "undefined" ? error_selector : this.error_selector;
	var preview_selector = typeof preview_selector !== "undefined" ? preview_selector : this.preview_selector;
	
	error_selector = error_selector + id;
	preview_selector = preview_selector + id;
	
	if(selected_image != ""){
		var image_file = actual_file.type;
		var image_size = actual_file.size / 1000000;
	
		if(!((image_file==system.image.allowed_image_format[0]) || (image_file == system.image.allowed_image_format[1]) || (image_file==system.image.allowed_image_format[2])|| (image_file == system.image.allowed_image_format[3]))){
			
			$(error_selector).css("display", "block");
			$(error_selector + ' .display-error-text').html("Invalid file format! " + "<b>Note:</b>" + " Only jpeg, jpg, gif and png image types are allowed.");
			$('input[type="file"]').val('');
			
			system.image.reset_image();
			
			return false;
		}else{
			$(error_selector + ' .display-error-text').css("display", "none").html("");
			
			if(image_size < this.allowed_image_size){
				var reader = new FileReader();	
				reader.onload = function(e){
					
					$(preview_selector).attr('src', e.target.result);
				}
				reader.readAsDataURL(actual_file);
				
				$(error_selector).html("").css('display','none');
			}else{
				$(error_selector + ' .display-error-text').css("display", "block").html("File size exceeded. Upto " + this.allowed_image_size / 1000 + " MB only!");
				
				return false;
			}
		}
	}else{	
		$(error_selector).html("").css('display','none');
		system.image.reset_image();
	}
}
system.image.reset_image = function(){
	system.http.http_process({action : "getOfficialLogo"}).done(function(response){
		$(system.image.preview_selector).attr('src',response);	
	});
}

system.modal = {};
system.modal.modal_dialog = function(title, content, size){
	size = typeof size !== 'undefined' ? size : '';   
	
	return bootbox.dialog({
		size: size,
		title : title,
		message : content
	});
} 

system.modal.custom_message = function(message_type, message){
	var icon;
	
	if(message_type == "info"){
		icon = "fa fa-info-circle fa-3x text-info";
	}else if(message_type == "error"){
		icon = "fa fa-exclamation-circle fa-3x text-error";
	}else if(message_type == "warning"){
		icon = "fa fa-warning fa-3x text-warning";
	}else if(message_type == "question"){
		icon = "fa fa-question-circle fa-3x text-info";
	}
	
	container = "<div class='row'>" +
					"<div class='col-lg-1'>" + 
						"<p><span class='" + icon + "'></span></p>" +
					"</div>" +
					"<div class='col-lg-10' style='margin-left:10px;margin-top:10px;'>" + 
						"<p><b>" + message + "</b></p>" +
					"</div>" +
				"</div>";
			
	return container;
}

system.badge_status = function(module, spot){
	system.http.http_process({action : "badge_status", module : module}).done(function(response){
		$(spot).html(response);
	});
}

system.monitor_acccount_session = function(){
	system.http.http_process({action : "monitor_acccount_session"}).done(function(response){
		console.log(response);
	});
}

setInterval(function(){system.monitor_acccount_session(); },5000);
