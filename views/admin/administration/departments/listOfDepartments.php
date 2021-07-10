<?php $departments = execSQL("SELECT * FROM tbl_departments ORDER BY position DESC","","","variable");?>
<?php if(!empty($departments)){?>
	<div style="overflow-y:auto; overflow-x:hidden; height:300px;">
		<?php foreach($departments as $index => $department){?>
			<div class="rshs-line view-department-list<?php echo $index; ?>">
				<div class=" row">
					<div class="col-lg-7">
						<?php echo $department["data"]["name"];?>
					</div>
					<div class="col-lg-5">
						<div class="pull-right">
							<button class="btn btn-success" onclick="departmentController.updateDepartment(<?php echo $index;?>)"><i class="fa fa-edit"></i></button>
							<button class="btn btn-danger" onclick="departmentController.removeDepartment(<?php echo $index;?>)"><i class="fa fa-remove"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="rshs-line update-department-list<?php echo $index; ?>" hidden >
				<div class=" row">
					<form onsubmit="departmentController.saveUpdateDepartment(<?php echo $index;?>); return false;">
						<div class="col-lg-7">
							<input type="text" required value="<?php echo $department["data"]["name"];?>" class="form-control txt-department-name" placeholder="Enter new department name&hellip;" />
						</div>
						<div class="col-lg-5">
							<div class="pull-right">
								<button class="btn btn-info"><i  class="fa fa-save"></i></button>
								<button class="btn btn-warning" type="button" onclick="departmentController.cancelUpdateDepartment(<?php echo $index;?>)"><i class="fa fa-remove"></i></button>
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
				<p class="display-error-text">Empty department list!</p>		
			</div>
		</div>
	</div>
<?php }?>