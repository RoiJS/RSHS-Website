var http_manager = system.http;
var modal_manager = system.modal;
var image_manager = system.image;


var subjectController = {
	
	subjectForm : {},
	subjectList : {},
	
	getSubjectList : function(){
		http_manager.http_process({action : "getModuleList", module : "subjects"}).done(function(response){
			subjectController.subjectList = JSON.parse(response);
		});
	},
	
	addSubjectForm : function(){
		http_manager.http_process({action : "addSubjectForm"}).done(function(response){
			subjectController.subjectForm = modal_manager.modal_dialog("Add new subject", response);
			subjectController.displaySubjectList();
		});
	},
	
	saveNewSubject : function(subjectForm){
		var formData = new FormData(subjectForm);
		formData.append("action", "saveNewSubject");
		console.log(subjectForm.txt_subject_name.value);
		this.verifyNewSubject(subjectForm.txt_subject_name.value).done(function(verify){
			console.log(verify);
			if(verify == 0){
				bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save new subject?"), function(result){
					if(result){
						http_manager.http_process(formData, true).done(function(response){
							subjectController.displaySubjectList();
							subjectController.getSubjectList();
							$(".txt_subject_name").val("");
						});
					}
				});		
			}else{
				bootbox.alert(modal_manager.custom_message("warning", "Subject name already exists. Please enter a unique subject name."), function(){
					subjectForm.txt_subject_name.value = "";
				});
			}
		})
	},
	
	updateSubject : function(index){
		$(".edit-subject" + index).show();
		$(".add-subject" + index).hide();
		
	},
	
	cancelUpdateSubject : function(index){
		$(".edit-subject" + index).hide();
		$(".add-subject" + index).show();
	},
	
	saveUpdateSubject : function(index){
		var id = this.subjectList[index].data.subject_id;
		var name = $.trim($(".edit-subject" + index + " input").val());
		
		if(name != ""){
			if(!this.verifyUpdateSubject(name, index)){
				if(this.subjectList[index].data.name != name){
					bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save changes?"), function(result){
						if(result){
							http_manager.http_process({action : "saveUpdateSubject", id : id, name : name}).done(function(response){
								subjectController.displaySubjectList();
							});
						}
					});		
				}else{
					subjectController.displaySubjectList();
				}
			}else{
				bootbox.alert(modal_manager.custom_message("warning", "Subject name already exists. Please enter a unique subject name."), function(){
					subjectForm.txt_subject_name.value = "";
				});
			}	
		}else{
			bootbox.alert(modal_manager.custom_message("warning", "Please enter subject name."));
		}
	},
	
	removeSubject : function(index){
		var id = this.subjectList[index].data.subject_id;
		
		this.verifyRemoveSubject(id).done(function(verify){
			if(verify == 0){
				bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove selected subject"), function(result){
					if(result){
						http_manager.http_process({action : "removeSubject", id : id}).done(function(response){
							subjectController.displaySubjectList();
						});
					}
				});		
			}else{
				bootbox.alert(modal_manager.custom_message("warning", "Selected subject could not be removed because it is being used in curriculum list."));
			}
		});
		
	},
	
	displaySubjectList : function(){
		http_manager.show_components("displaySubjectList", ".subjects-list");
	},
	
	closeSubjectForm : function(){
		subjectController.subjectForm.modal("hide");
	},
	
	verifyNewSubject : function(name){
		return http_manager.http_process({action : "verifyNewSubject", name : name});
	},
	
	verifyUpdateSubject : function(newSubjectName, index){
		var verify = false;
		for(i in this.subjectList){
			if(this.subjectList[i].data.name != this.subjectList[index].data.name){
				if(this.subjectList[i].data.name == newSubjectName){
					verify = true;
				}
			}
		}
		return verify;
	},
	
	verifyRemoveSubject : function(id){
		return http_manager.http_process({action : "verifyRemoveSubject" , id : id});
	}
}

subjectController.getSubjectList();