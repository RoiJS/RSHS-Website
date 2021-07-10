	var http_manager = system.http;
var modal_manager = system.modal;
var image_manager = system.image;

var curriculumController = {
	
	manageCurriculum : {
		curriculumForm : {},
		curriculumMainLocation : "?pg=admin&vw=academics&dir=a7c2a2659cd42e065f404ee595142b45e8c2c6c9&main=curriculum",
		selectedSubjectList : [],
		
		addCurriculumForm : function(){
			http_manager.http_process({action : "addCurriculumForm"}).done(function(response){
				curriculumController.manageCurriculum.curriculumForm = modal_manager.modal_dialog("Add new curriculum",response);
			});
		},
		
		addSelectedSubject : function(){
			var id = $(".subject-list").val();
			var grade_level_id = $(".grade-level-list").val();
			if(id != ""){
				if(!curriculumController.verifySelectedSubject(id)){
					curriculumController.verifySelectedSubjectFromOriginalList(id, grade_level_id).done(function(verify){
						if(verify == 0){
							var subject_info = {};
							subject_info.id = id;
							subject_info.name = $.trim($(".subject-list" + " ." + subject_info.id).html());
							
							curriculumController.manageCurriculum.selectedSubjectList.push(subject_info);
							$(".subject-list").val("");
							
							curriculumController.manageCurriculum.displaySelectedSubject();		
						}else{
							bootbox.alert(modal_manager.custom_message("warning", "Selected subject has been already in the selected grade level. Please select another subject."));
							$(".subject-list").val("");
						}
					});
						
				}else{
					bootbox.alert(modal_manager.custom_message("warning", "Selected subject has been already in the list. Please select another subject."));
					$(".subject-list").val("");
				}
			}else{
				bootbox.alert(modal_manager.custom_message("warning", "Please select subject from the list."));
			}
			
		},
		
		saveNewCurriculum : function(){
			
			if(this.selectedSubjectList.length != 0){
				var grade_level = $(".grade-level-list").val();
				var subjectList = this.selectedSubjectList;
				
				bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save new curriculum?"), function(result){
					if(result){
						http_manager.http_process({action : "saveNewCurriculum", grade_level : grade_level, subject_list : subjectList}).done(function(response){
							
							if(response){
								bootbox.alert(modal_manager.custom_message("info","New curriculum has been successfully saved."), function(){
									window.location = curriculumController.manageCurriculum.curriculumMainLocation;	
								});
							}
						});
					}
				});
			}else{
				bootbox.alert(modal_manager.custom_message("warning", 	"No subject has been selected. Please select atleast 1 (one) subject before saving."));
			}
		},
		
		displaySelectedSubject : function(){
			http_manager.show_components("displaySelectedSubject",".selected-subjects", {data : this.selectedSubjectList});
		},
		
		removeSelectedSubject : function(index){
			bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove selected subject from the list?"), function(result){
				if(result){
					curriculumController.manageCurriculum.selectedSubjectList.splice(index, 1);
					curriculumController.manageCurriculum.displaySelectedSubject();		
				}
			});
			
		},
		
		removeSubjectFromGrade : function(id){
			bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove selected subject?"), function(result){
				if(result){
					http_manager.http_process({action : "removeSubjectFromGrade", id : id}).done(function(response){
						if(response){
							window.location = curriculumController.manageCurriculum.curriculumMainLocation;	
						}
					});
				}
			});
		},
		
		closeCurriculumForm : function(){	
			curriculumController.manageCurriculum.curriculumForm.modal("hide");
		}
		
	},
	
	verifySelectedSubject : function(id){
		var isExists = false;
		var object = $.makeArray(curriculumController.manageCurriculum.selectedSubjectList);
		
		$.map(object, function(value, key){
			if(value.id == id){
				isExists = true;
			}
		});
		
		return isExists;
	},
	
	verifySelectedSubjectFromOriginalList : function(id, grade_level_id){
		return http_manager.http_process({action : "verifySelectedSubjectFromOriginalList", id : id, grade_level_id : grade_level_id});
	}
}