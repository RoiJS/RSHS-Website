var http_manager = system.http;
var modal_manager = system.modal;

var positionController = {
	
	positionList : {},
	
	getPositionList : function(){
		http_manager.http_process({action : "getModuleList", module : "positions"}).done(function(response){
			positionController.positionList = JSON.parse(response);
			console.log(positionController.positionList);
		});
	},
	
	saveNewPosition : function(){
		var name = $.trim($(".txt-new-position-name").val());
		
		if(!this.verifyNewPosition(name)){
			bootbox.confirm(modal_manager.custom_message("question", "Are you sure to add new position?"), function(result){
				if(result){
					http_manager.http_process({action : "saveNewPosition", name : name}).done(function(response){
						if(response){
							positionController.displayPositionList();
							positionController.getPositionList();
							system.badge_status("positions",".positions-badge");		
							$(".txt-new-position-name").val("");
						}
					});
				}
			});
		}else{
			bootbox.alert(modal_manager.custom_message("warning", "Position name already exists in the list. Please enter a unique position."), function(){
				$(".txt-new-position-name").val("");
			});
		}
	},
	
	updatePosition : function(index){
		$(".update-position-list" + index).show();
		$(".view-position-list" + index).hide();
	},
	
	cancelUpdatePosition : function(index){
		$(".update-position-list" + index).hide();
		$(".view-position-list" + index).show();
	},
	
	saveUpdatePosition : function(index){
		var id = this.positionList[index].data.position_id;
		var name = $.trim($(".update-position-list" + index + " input").val());
		
		if(!this.verifyUpdatePosition(name, index)){
			if(this.positionList[index].data.name != name){
				bootbox.confirm(modal_manager.custom_message("question", "Are you sure to save changes?"), function(result){
					if(result){
						http_manager.http_process({action : "saveUpdatePosition", id : id, name : name}).done(function(response){
							if(response){
								positionController.displayPositionList();
								positionController.getPositionList();
								system.badge_status("positions",".positions-badge");		
							}
						});
					}
				});		
			}else{
				positionController.displayPositionList();
			}
		}else{
			bootbox.alert(modal_manager.custom_message("warning", "Position name already exists in the list. Please enter a unique position."), function(){
				$(".txt-new-position-name").val("");
			});
		}
	},
	
	removePosition : function(index){
		
		var id = this.positionList[index].data.position_id;
		
		this.verifyIfPositionExistsInAdministration(id).done(function(response){
			if(response == 0){
				bootbox.confirm(modal_manager.custom_message("question", "Are you sure to remove selected position?"), function(result){
					if(result){
						http_manager.http_process({action : "removePosition", id : id}).done(function(response){
							if(response){
								positionController.displayPositionList();
								positionController.getPositionList();
								system.badge_status("positions",".positions-badge");		
							}
						});
					}
				});		
			}else{
				bootbox.alert(modal_manager.custom_message("warning", "Selected position cannot be removed because there are staff belongs to that position."));
			}
			
		});
	},
	
	displayPositionList : function(){
		http_manager.show_components("displayPositionList",".display-position-list");
	},
	
	verifyIfPositionExistsInAdministration : function(id){
		return http_manager.http_process({action : "verifyIfPositionExistsInAdministration", id : id});
	},
	
	verifyNewPosition : function(position){
		var verify = false;
		for(index in this.positionList){
			if(this.positionList[index].data.name == position){
				verify = true;
			}
		}
		return verify;
	},
	
	verifyUpdatePosition : function(position, index){
		var verify = false;
		for(i in this.positionList){
			if(this.positionList[i].data.name != this.positionList[index].data.name){
				if(this.positionList[i].data.name == position){
					verify = true;
				}	
			}
		}
		return verify;
	}
}

positionController.displayPositionList();
positionController.getPositionList();