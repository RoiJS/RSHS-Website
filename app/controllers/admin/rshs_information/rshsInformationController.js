var RshsInformationController = {};

// =================================== Manage History ====================================

RshsInformationController.manageHistory = function(newHistory, oldHistory){

	if(newHistory != ""){
		if(newHistory != oldHistory){
			bootbox.confirm(system.modal.custom_message("question", "Are you sure to update school history?"), function(result){
				if(result){
					RshsInformationController.manageRshsInformation("history", newHistory);
					bootbox.alert(system.modal.custom_message("info", "School history has been successfully updated."), function(){
						window.location = "?pg=admin&main=information&sub=history";
					});
				}
			});		
		}
	}else{
		bootbox.alert(system.modal.custom_message("warning", "Please enter school history."));
	}
	
}

// =================================== Manage Mission ====================================

RshsInformationController.manageMission = function(newMission, oldHistory){
	
	if(newMission != ""){
		if(newMission != oldHistory){
			bootbox.confirm(system.modal.custom_message("question", "Are you sure to update school mission?"), function(result){
				if(result){
					RshsInformationController.manageRshsInformation("mission", newMission);
					bootbox.alert(system.modal.custom_message("info", "School mission has been successfully updated."), function(){
						window.location = "?pg=admin&main=information&sub=mission";
					});
				}
			});		
		}
	}else{
		bootbox.alert(system.modal.custom_message("warning", "Please enter school mission."));
	}
}

// =================================== Manage Vision ====================================

RshsInformationController.manageVision = function(newVision, oldVision){
	if(newVision != ""){
		if(newVision != oldVision){
			bootbox.confirm(system.modal.custom_message("question", "Are you sure to update school vision?"), function(result){
				if(result){
					RshsInformationController.manageRshsInformation("vision", newVision);
					bootbox.alert(system.modal.custom_message("info", "School vision has been successfully updated."), function(){
						window.location = "?pg=admin&main=information&sub=vision";
					});
				}
			});		
		}
	}else{
		bootbox.alert(system.modal.custom_message("warning", "Please enter school vision."));
	}
}

// =================================== Manage Admission ====================================

RshsInformationController.manageAdmission = function(newAdmission, oldAdmission){
	
	if(newAdmission != ""){
		if(newAdmission != oldAdmission){
			bootbox.confirm(system.modal.custom_message("question", "Are you sure to update school admission?"), function(result){
				if(result){
					RshsInformationController.manageRshsInformation("admission", newAdmission);
					bootbox.alert(system.modal.custom_message("info", "School admission has been successfully updated."), function(){
						window.location = "?pg=admin&main=information&sub=admission";
					});
				}
			});		
		}
	}else{
		bootbox.alert(system.modal.custom_message("warning", "Please enter school admission."));
	}
}


// =================================== Manage Other Information ====================================

RshsInformationController.manageOtherInformation = {};
RshsInformationController.manageOtherInformation.addressInformation = {};

 // ---> Address information
RshsInformationController.manageOtherInformation.addressInformation.updateAddressModal = "";
RshsInformationController.manageOtherInformation.addressInformation.updateAddress = function(){
	system.http.http_process({action : "requestForm", infoField : "address"}).done(function(response){
		RshsInformationController.manageOtherInformation.addressInformation.updateAddressModal = system.modal.modal_dialog("Update School Address", response);
	});
};
RshsInformationController.manageOtherInformation.addressInformation.closeForm = function(){
	RshsInformationController.manageOtherInformation.addressInformation.updateAddressModal.modal('hide');
}

RshsInformationController.manageOtherInformation.addressInformation.saveNewAddress = function(form, oldAddress){
	newAddress = $.trim(form.txt_address.value);
	
	if(newAddress != ""){
		if(newAddress != oldAddress){
			bootbox.confirm(system.modal.custom_message("question", "Are you sure to update school address?"), function(result){
				if(result){
					RshsInformationController.manageRshsInformation("address", newAddress);
					bootbox.alert(system.modal.custom_message("info", "School address has been successfully updated."), function(){
						window.location = "?pg=admin&main=information&sub=other_information";
					});
				}
			});		
		}
	}else{
		bootbox.alert(system.modal.custom_message("warning", "Please enter school address."));
	}
}

 // ---> Contact information
RshsInformationController.manageOtherInformation.contactInformation = {};
RshsInformationController.manageOtherInformation.contactInformation.updateContactModal = "";
RshsInformationController.manageOtherInformation.contactInformation.updateContact = function(){
	system.http.http_process({action : "requestForm", infoField : "contact"}).done(function(response){
		RshsInformationController.manageOtherInformation.contactInformation.updateContactModal = system.modal.modal_dialog("Update School Contact Information", response);
	});
};
RshsInformationController.manageOtherInformation.contactInformation.closeForm = function(){
	RshsInformationController.manageOtherInformation.contactInformation.updateContactModal.modal('hide');
}

RshsInformationController.manageOtherInformation.contactInformation.saveNewContact = function(form, oldContactNo){
	newContact = $.trim(form.txt_contact_info.value);
	
	if(newContact != ""){
		if(newContact != oldContactNo){
			bootbox.confirm(system.modal.custom_message("question", "Are you sure to update school contact no.?"), function(result){
				if(result){
					RshsInformationController.manageRshsInformation("contactNo", newContact);
					bootbox.alert(system.modal.custom_message("info", "School contact no has been successfully updated."), function(){
						window.location = "?pg=admin&main=information&sub=other_information";
					});
				}
			});		
		}
	}else{
		bootbox.alert(system.modal.custom_message("warning", "Please enter school contact no."));
	}
}

// ---> Email Address information

RshsInformationController.manageOtherInformation.emailAddressInformation = {};
RshsInformationController.manageOtherInformation.emailAddressInformation.updateEmailAddressModal = "";
RshsInformationController.manageOtherInformation.emailAddressInformation.updateEmailAddress = function(){
	system.http.http_process({action : "requestForm", infoField : "emailAddress"}).done(function(response){
		RshsInformationController.manageOtherInformation.emailAddressInformation.updateEmailAddressModal = system.modal.modal_dialog("Update School Email Address", response);
	});
};
RshsInformationController.manageOtherInformation.emailAddressInformation.closeForm = function(){
	RshsInformationController.manageOtherInformation.emailAddressInformation.updateEmailAddressModal.modal('hide');
}

RshsInformationController.manageOtherInformation.emailAddressInformation.saveNewEmailAddress = function(form, oldEmailAddress){
	newEmailAddress = $.trim(form.txt_email_address.value);
	
	if(newEmailAddress != ""){
		if(newEmailAddress != oldEmailAddress){
			bootbox.confirm(system.modal.custom_message("question", "Are you sure to update school email address?"), function(result){
				if(result){
					RshsInformationController.manageRshsInformation("emailAddress", newEmailAddress);
					bootbox.alert(system.modal.custom_message("info", "School email address has been successfully updated."), function(){
						window.location = "?pg=admin&main=information&sub=other_information";
					});
				}
			});		
		}
	}else{
		bootbox.alert(system.modal.custom_message("warning", "Please enter school email address."));
	}
	
}

// ---> School Official Logo
RshsInformationController.manageOtherInformation.schoolOfficialSeal = {};
RshsInformationController.manageOtherInformation.schoolOfficialSeal.viewImage = function(file){
	system.image.view_image(file.value, file.files[0]);
};
RshsInformationController.manageOtherInformation.schoolOfficialSeal.saveNewImage = function(file){
	var formData = new FormData(file);
	formData.append("action", "saveNewSchoolSeal");
	
	if(file.school_seal.value != ""){
		bootbox.confirm(system.modal.custom_message("question", "Are you sure to update new school seal?"), function(result){
			if(result){
				system.http.http_process(formData, true).done(function(response){
					bootbox.alert(system.modal.custom_message("info", "School seal has been successfully updated."), function(){
						window.location = "?pg=admin&main=information&sub=other_information";
					});	
				});
			}
		});	
	}else{
		bootbox.alert(system.modal.custom_message("warning", "No image selected. Please select image file."));
	}
	
};

RshsInformationController.manageRshsInformation = function(informationField, newContent){
	system.http.http_process({action : "manageRshsInformation" , informationField : informationField,  newContent : newContent}).done(function(response){
		console.log(response);
	});
}