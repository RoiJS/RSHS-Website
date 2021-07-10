<?php if($selectedGalleryPhotos != NULL){ ?>
	<div class="x_panel">
		<div class="x_content" style="height:250px;overflow-x:hidden;overflow-y:auto;">  
			<legend>List of selected images.</legend>
			<table class="table table-hover" >
				<?php foreach($selectedGalleryPhotos as $index => $photo):?>
					<tr>
						<td>
							<div class="row">
								<div class="col-lg-2">
									<?php if($photo["istypevalid"] == "false" || $photo["issizevalid"] == "false"){?>
										<i class="fa fa-warning fa-3x text-warning"></i>
									<?php }else{?>
										<i class="fa fa-photo fa-3x text-info"></i>
									<?php }?>
								</div>
								<div class="col-lg-9">
									<?php if($photo["istypevalid"] == "false" || $photo["issizevalid"] == "false"){?>
										<?php if($photo["istypevalid"] == "false"){?>
											Invalid file format. <b>Note:</b> Only jpg, jpeg, gif or png is allowed!
										<?php }?>
										
										<?php if($photo["issizevalid"] == "false"){?>
											Invalid file size. <b>Note:</b> Only 5 MB is allowed size!
										<?php }?>
									<?php }else{?>
										 <p><b>Filename: </b><?php echo showModuleDescription($photo["filename"], 30);?></p>
										 <p><b>size:</b> <?php echo number_format($photo["filesize"]/1000000,2,".",",")." MB";?></p>
									<?php }?>
									
								</div>
								<div class="col-lg-1" hidden>
									<div class="pull-right">
										<?php if($photo["istypevalid"] == "true" && $photo["issizevalid"] == "true"){?>
											<button class="btn btn-danger" type="button" onclick="galleryPhotosController.removeSelectedImage(<?php echo $index; ?>);"><i class="fa fa-remove"></i></button>
										<?php }?>
									</div>	
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach;?>
			</table>
		</div>
	</div>
			
<?php }?>