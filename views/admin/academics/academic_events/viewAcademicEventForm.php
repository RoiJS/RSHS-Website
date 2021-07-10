<form name="frm-update-academic-event" class="form-horizontal form-label-left" onsubmit="academicEventController.manageAcademicEvent.saveUpdateAcademicEvent(this, <?php echo $academic_event_info["data"]["academic_event_id"]; ?>); return false;">
	<div class="row ">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-5">
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-danger alert-dismissible fade in error-preview" role="alert" style="display:none;">
								<div class="row">
									<div class="col-lg-2">
										<center>
											<i class="fa fa-warning fa-2x "></i>
										</center>
									</div>
									<div class="col-lg-10">
										<p class="display-error-text"></p>		
									</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 center-margin">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<label>Image:</label>
										<?php $image = $academic_event_info["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["academic_events_dir"].$academic_event_info["data"]["image"] : showSystemLogo(); ?>
										<center>
											<img class="preview-image img-thumbnail img-responsive preview-image" required="required" id="view_image" style="height: 200px;margin-bottom:10px;" src="<?php echo $image;?>" alt="School Seal"  />
										</center>
										
										<input type="hidden" id="txt_update_image" name="txt_update_image" value="<?php echo $academic_event_info["data"]["image"]; ?>"/>
										
										<input type="file" name="image_file" id="image_file" class="form-control" onchange="academicEventController.manageAcademicEvent.viewAcademicEventImage(this);" accept="image/*" /><br>
										<button class="btn btn-warning btn-sm" type="button" style="width:100%;" onclick="system.image.reset_image(); document.getElementById('txt_update_image').value = ''; document.getElementById('image_file').value = '';"> <i class="fa fa-refresh"></i> Clear Photo</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
				<div class="col-lg-7">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="name">Title: <span class="required">*</span>
								</label>
								<input id="name" class="form-control" value="<?php echo $academic_event_info["data"]["title"];?>" placeholder="Enter event title&hellip;" name="txt_academic_event_title" required="required" type="text">
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="controls">
								<div class="col-lg-12 form-group has-feedback">
									<label>Date: *</label>
									<input type="date" value="<?php echo $academic_event_info["data"]["date"];?>" required placeholder="Enter event date&hellip;" class="form-control col-lg-12 has-feedback-left" placeholder="Select date&hellip;" name="txt_academic_event_date">
									<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
									<span id="inputSuccess2Status3" class="sr-only">(success)</span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Description:</label>
								<textarea name="txt_academic_event_description" placeholder="Enter event description&hellip;" required="required" style="height:150px;" class="form-control"><?php echo $academic_event_info["data"]["description"];?></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-7">
			<div class="form-group pull-left">
				<button class="btn btn-success" type="submit">Save Changes</button>
				<button class="btn btn-danger" type="button" onclick="academicEventController.manageAcademicEvent.removeAcademicEvent(<?php echo $academic_event_info["data"]["academic_event_id"];?>);">Remove</button>
				
				<?php if($academic_event_info["data"]["status"] == 1){?>
					<button class="btn btn-warning" type="button" onclick="academicEventController.manageAcademicEvent.postUnpostAcademicEvent(<?php echo $academic_event_info["data"]["academic_event_id"];?>, 0);">Unpost</button>
				<?php }else{?>
					<button class="btn btn-info" type="button" onclick="academicEventController.manageAcademicEvent.postUnpostAcademicEvent(<?php echo $academic_event_info["data"]["academic_event_id"];?>, 1);">Post</button>
				<?php }?>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="form-group pull-right">
				<button class="btn btn-default" type="button" onclick="academicEventController.manageAcademicEvent.closeAcademicEventForm();">Cancel</button>
			</div>
		</div>
	</div>
</form>