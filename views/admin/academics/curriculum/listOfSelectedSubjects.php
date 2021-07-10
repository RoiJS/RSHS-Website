<?php if($selectedSubjectList != NULL){?>
<div style="height:200px;overflow-x:hidden;overflow-y:auto;">
	<hr>
	<?php foreach($selectedSubjectList as $index => $subject){?>
		<div class="rshs-line">
			<div class="row">
				<div class="col-lg-10">
					<?php echo $subject["name"];?>
				</div>
				<div class="col-lg-2 ">
					<div class="pull-right">
						<button class="btn btn-danger" type="button" onclick="curriculumController.manageCurriculum.removeSelectedSubject(<?php echo $index;?>);"><i class="fa fa-remove"></i></button>
					</div>
				</div>
			</div>
		</div>
		<br>
	<?php }?>
</div>
<?php }?>
