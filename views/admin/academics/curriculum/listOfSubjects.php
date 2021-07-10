<?php if(!empty($subjects)){?>
<div style="height:200px;overflow-x:hidden;overflow-y:auto;">
	<hr>
	<?php foreach($subjects as $index => $subject){?>
		<div class="rshs-line">
			<div class="row add-subject<?php echo $index;?>" >
				<div class="col-lg-8">
					<?php echo $subject["data"]["name"];?>
				</div>
				<div class="col-lg-4 ">
					<div class="pull-right">
						<button class="btn btn-primary" type="button" onclick="subjectController.updateSubject(<?php echo $index;?>);"><i class="fa fa-edit"></i></button>
						<button class="btn btn-danger" type="button" onclick="subjectController.removeSubject(<?php echo $index;?>);"><i class="fa fa-remove"></i></button>
					</div>
				</div>
			</div>
			<div class="row edit-subject<?php echo $index;?>" hidden>
				<div class="col-lg-8">
					<input type="text" value="<?php echo $subject["data"]["name"];?>" class="form-control" placeholder="Enter subject name&hellip;"/>
				</div>
				<div class="col-lg-4">
					<div class="pull-right">
						<button class="btn btn-info" type="button" onclick="subjectController.saveUpdateSubject(<?php echo $index;?>);"><i class="fa fa-save"></i></button>
						<button class="btn btn-warning" type="button" onclick="subjectController.cancelUpdateSubject(<?php echo $index;?>);"><i class="fa fa-remove"></i></button>
					</div>
				</div>
			</div>
		</div>
		<br>
	<?php }?>
</div>
<?php }?>
