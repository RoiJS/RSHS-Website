<div class="x_panel">
	<div class="x_content">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-12">
						<center>
							<?php $image = $announcement["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["announcements_dir"].$announcement["data"]["image"] : showSystemLogo();
							?>
							<img src="<?php echo $image ?>" class="image-thumbnail img-responsive" style="height:200px;" >
						</center>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<h4><strong><i class="fa fa-calendar"></i> Date:</strong> <?php echo date("M d, Y", strtotime($announcement["data"]["date"]));?></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<p style=""><?php echo $announcement["data"]["description"];?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="form-group pull-right">
			<button class="btn btn-default" type="button" onclick="announcementsController.manageAnnouncements.closeAnnouncementForm();">Close</button>
		</div>
	</div>
</div>
