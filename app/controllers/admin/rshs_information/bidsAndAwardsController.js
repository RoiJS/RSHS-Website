
var bidsAndAwardsController = {
	
	manageBidsAndAwards : {
		
		bidsAndAwardsForm : "",
		bidsAndAwardsList : {},
		current_index : "",
		getBidsAndAwards : function(){
			system.http.http_process({action : "getBidsAndAwardsList"}).done(function(response){
				bidsAndAwardsController.manageBidsAndAwards.bidsAndAwardsList = JSON.parse(response);
			});
		},
		
		addBidsAndAwardsForm :  function(){
			system.http.http_process({action : "addBidsAndAwardsForm"}).done(function(response){
				bidsAndAwardsController.manageBidsAndAwards.bidsAndAwardsForm = system.modal.modal_dialog("Add new bids & awards", response);	
			});
		},
		
		closeBidsAndAwardsForm : function(){
			bidsAndAwardsController.manageBidsAndAwards.bidsAndAwardsForm.modal("hide");
		},
		
		saveNewBidsAndAwards : function(AddBidsAndAwardsForm){
			var formData = new FormData(AddBidsAndAwardsForm);
			formData.append("action","saveNewBidsAndAwards");
				
			bootbox.confirm(system.modal.custom_message("question","Are you sure to save new bids and awards?"), function(result){
				if(result){
					system.http.http_process(formData, true).done(function(response){
						console.log(response);
						if(response){
							bootbox.alert(system.modal.custom_message("info", "New Bids And Awards has been successfully saved,"), function(){
								window.location = "?pg=admin&main=bids_awards";
							});
						}
					});		
				}
			});
			
		},
		
		updateBidsAndAwardsForm : function(index){
			this.current_index = index;
			var id = this.bidsAndAwardsList[this.current_index].data.bids_and_awards_id;
			var title = this.bidsAndAwardsList[this.current_index].data.title;
			system.http.http_process({action : "updateBidsAndAwardsForm", id : id}).done(function(response){
				bidsAndAwardsController.manageBidsAndAwards.bidsAndAwardsForm = system.modal.modal_dialog(title, response);
			});
		},
		
		saveUpdateBidsAndAwards : function(UpdateBidsAndAwardsForm){
			var formData = new FormData(UpdateBidsAndAwardsForm);
			var id = this.bidsAndAwardsList[this.current_index].data.bids_and_awards_id;
			
			formData.append("action", "saveUpdateBidsAndAwards");
			formData.append("id", id);
			
			
			bootbox.confirm(system.modal.custom_message("question","Are you sure to save changes"), function(result){
				if(result){
					system.http.http_process(formData, true).done(function(response){
						if(response){
							console.log(response);
							bootbox.alert(system.modal.custom_message("info", "Selected bids and awards has been successfully updated."), function(){
								window.location = "?pg=admin&main=bids_awards";
							});
						}
					});
				}
			});
		},
		
		removeBidsAndAwards : function(index){
			var id = this.bidsAndAwardsList[index].data.bids_and_awards_id;
			bootbox.confirm(system.modal.custom_message("question", "Are you sure to remove selected bids and awards?"), function(result){
				if(result){
					bidsAndAwardsController.manageBidsAndAwards.bidsAndAwardsList.splice(index, 1);
					system.http.http_process({action : "removeBidsAndAwards", id : id}).done(function(response){
						if(response){
							bootbox.alert(system.modal.custom_message("info", "Selected bids and awards has been successfully removed"), function(){
								window.location = "?pg=admin&main=bids_awards";
							});
						}
					});
				}
			});
		},
		
		postUnpostBidsAndAwards : function(index, status){
			var id = this.bidsAndAwardsList[index].data.bids_and_awards_id;
			
			if(status == 0){
				$(".btn-unpost" + index).css({display: "none"});
				$(".btn-post"  + index).css({display: "block"});
			}else if(status == 1){
				$(".btn-unpost"  + index).css({display: "block"});
				$(".btn-post"  + index).css({display: "none"});
			}
			
			system.http.http_process({action : "postUnpostBidsAndAwards", id : id, status : status}).done(function(response){
				if(response){
					bidsAndAwardsController.manageBidsAndAwards.bidsAndAwardsList[index].data.status = status;
				}
			});
		},
		
		viewBidsAndAwardsImage : function(file){
			$("#txt_update_image").val(file.value);
			system.image.view_image(file.value, file.files[0]);
		}
	}
}

bidsAndAwardsController.manageBidsAndAwards.getBidsAndAwards();