var http_manager = system.http;
var modal_manager = system.modal;

var departmentController = {
	
	departmentList : {},
	
	getDepartmentList : function(){
		http_manager.http_process({action : "getModuleList", module : "departments"}).done(function(response){
			departmentController.departmentList = JSON.parse(response);
			console.log(departmentController.departmentList);
		});
	},
	
	saveNewDepartment : function(){
		
		var name = $.trim($(".txt-new-department-name").val());
		if(!this.verifyNewDepartment(name)){
			bootbox.confirm(modal_manager.custom_message("question", "Are you sure to add new department?"), function(result){
				if(result){
					http_manager.http_process({action : "saveNewDepartment", name : name}).done(function(response){
						if(response){
							departmentController.displayDepartmentList();
							departmentController.getDepartmentList();
							system.badge_status("departments",".departments-badge");	
							$(".txt-new-department-name").val("");
						}
					});
				}
			});	
		}else{
			bootbox.alert(modal_manager.custom_message("warning", "Department name already exists in the list. Please enter a unique department."), function(){
				$(".txt-new-department-name").val("");
			});
		}
	},
	
	updateDepartment : function(index){
		$(".update-department-list" + index).show();
		$(".view-department-list" + index).hide();
	},
	
	cancelUpdateDepartment : function(index){
		$(".update-department-list" + index).hide();
		$(".view-department-list" + index).show();
	},
	
	saveUpdateDepartment : function(index){
		var id = this.departmentList[index].data.department_id;
		var name = $.trim($(".update-department-list" + index + " input").val());
		
		if(!this.verifyUpdateDepartment(name, index)){
			if(this.departmentList[index].data.name != name){
				bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save changes?"), function(result){
					if(result){
						http_manager.http_process({action : "saveUpdateDepartment", id : id, name : name}).done(function(response){
							if(response){
								departmentController.displayDepartmentList();
								departmentController.getDepartmentList();
								system.badge_status("departments",".departments-badge");	
							}
						});
					}
				});	
			}else{
				departmentController.displayDepartmentList();
			}
		}else{
			bootbox.alert(modal_manager.custom_message("warning", "Department name already exists in the list. Please enter a unique department."), function(){
				$(".txt-new-department-name").val("");
			});
		}	
	},
	
	removeDepartment : function(index){
		
		var id = this.departmentList[index].data.department_id;
		
		this.verifyDepartmentIfExistsInAdministration(id).done(function(response){
			if(response == 0){
				bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove selected department?"), function(result){
					if(result){
						http_manager.http_process({action : "removeDepartment", id : id}).done(function(response){
							if(response){
								departmentController.displayDepartmentList();
								departmentController.getDepartmentList();
								system.badge_status("departments",".departments-badge");	
							}
						});
					}
				});		
			}else{
				bootbox.alert(modal_manager.custom_message("warning", "Selected department cannot be removed because there are staff belongs to that department."));
			}
		});
		
	},
	
	displayDepartmentList : function(){
		http_manager.show_components("displayDepartmentList",".display-department-list");
	},
	
	verifyDepartmentIfExistsInAdministration : function(id){
		return http_manager.http_process({action : "verifyDepartmentIfExistsInAdministration", id : id});
	},
	
	verifyNewDepartment : function(department){
		var verify = false;
		for(index in this.departmentList){
			if(this.departmentList[index].data.name == department){
				verify = true;
			}
		}
		return verify;
	},
	
	verifyUpdateDepartment : function(department, index){
		var verify = false;
		for(i in this.departmentList){
			if(this.departmentList[i].data.name != this.departmentList[index].data.name){
				if(this.departmentList[i].data.name == department){
					verify = true;
				}	
			}
		}
		return verify;
	}
}

departmentController.getDepartmentList();
departmentController.displayDepartmentList();