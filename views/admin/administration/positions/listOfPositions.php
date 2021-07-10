<?php $positions = execSQL("SELECT * FROM tbl_positions ORDER BY position_id DESC","","","variable");?>
<?php if(!empty($positions)){?>
	<div style="overflow-y:auto; overflow-x:hidden; height:300px;">
		<?php foreach($positions as $index => $position){?>
			<div class="rshs-line view-position-list<?php echo $index; ?>">
				<div class=" row">
					<div class="col-lg-7">
						<?php echo $position["data"]["name"];?>
					</div>
					<div class="col-lg-5">
						<div class="pull-right">
							<button class="btn btn-success" onclick="positionController.updatePosition(<?php echo $index;?>)"><i class="fa fa-edit"></i></button>
							<button class="btn btn-danger" onclick="positionController.removePosition(<?php echo $index;?>)"><i class="fa fa-remove"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="rshs-line update-position-list<?php echo $index; ?>" hidden >
				<div class=" row">
					<form onsubmit="positionController.saveUpdatePosition(<?php echo $index;?>); return false;">
						<div class="col-lg-7">
							<input type="text" required value="<?php echo $position["data"]["name"];?>" class="form-control txt-position-name" placeholder="Enter new position name&hellip;" />
						</div>
						<div class="col-lg-5">
							<div class="pull-right">
								<button class="btn btn-info"><i class="fa fa-save"></i></button>
								<button class="btn btn-warning" type="button" onclick="positionController.cancelUpdatePosition(<?php echo $index;?>)"><i class="fa fa-remove"></i></button>
							</div>
						</div>
					</form>
					
				</div>
			</div>
			<br>
		<?php }?>
	</div>
<?php }else{?>
	<div class="alert alert-danger alert-dismissible fade in error-preview" role="alert">
		<div class="row">
			<div class="col-lg-2">
				<center>
					<i class="fa fa-info-circle fa-2x "></i>
				</center>
			</div>
			<div class="col-lg-10">
				<p class="display-error-text">Empty position list!</p>		
			</div>
		</div>
	</div>
<?php }?>