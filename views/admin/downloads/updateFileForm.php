<form class="form-horizontal form-label-left" onsubmit="downloadController.saveUpdateFile(this, <?php echo $download["data"]["download_id"];?>); return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-12 ">
							<div class="alert alert-danger alert-dismissible fade in error-preview-update" role="alert" hidden>
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
						<div class="col-lg-12 ">
							<div class="alert alert-info alert-dismissible fade in file-preview-update" role="alert" <?php if($download["data"]["filename"] == ""){echo "hidden";}?>>
								<div class="row">
									<div class="col-lg-2">
										<center>
											<i class="file-ico fa fa-file-o fa-2x"></i>
										</center>
									</div>
									<div class="col-lg-10">
										<p><b>Name:</b> <span class="file-name"><?php echo $download["data"]["filename"];?></span></p>		
										<p><b>Size:</b> <span class="file-size"><?php echo number_format($download["data"]["filesize"] / 1000000 ,2, ".", ","). " MB";?></span></p>				
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>File: *</label>
						<div class="row">
							<div class="col-lg-9">
								<input type="hidden" name="txt_update_file" id="txt_update_file" value="<?php echo $download["data"]["filename"];?>" required />
								<input type="file" name="download_file" id="download_file" class="form-control " accept=".docx, .doc, .pdf" onchange="downloadController.viewFileStatus(this,'update');"  />
							</div>
							<div class="col-lg-3">
								<button class="btn btn-warning" type="button" onclick="document.getElementById('txt_update_file').value = '';document.getElementById('download_file').value = ''; downloadController.viewFileStatus(document.getElementById('download_file'),'update');">Clear file</button>
							</div>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<label>Date: *</label>
						<input type="date" name="txt_date" class="form-control" value="<?php echo $download["data"]["dateUploaded"];?>" required>
					</div>
					<div class="form-group">
						<label>File Caption: *</label>
						<textarea name="txt_caption" class="resizable_textarea form-control" placeholder="Enter file caption&hellip;" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" required><?php echo $download["data"]["caption"];?></textarea>
					</div>
			
				</div>
			</div>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="pull-right">
				<button class="btn btn-success">Save</button>
				<button class="btn btn-default" type="button" onclick="downloadController.closeFileForm();">Cancel</button>
			</div>
		</div>
	<div>
</form>
