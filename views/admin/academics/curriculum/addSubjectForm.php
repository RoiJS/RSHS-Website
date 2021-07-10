<form name="frm_add_subject" onsubmit="subjectController.saveNewSubject(this);return false;">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-10">
					<div class="form-group">
						<label>Enter subject name: *</label>
						<input type="text" name="txt_subject_name" class="form-control txt_subject_name" placeholder="Enter subject name&hellip;" required />
					</div>
				</div>
				<div class="col-lg-2">
					<div class="form-group">
						<label>.</label><br>
						<button class="btn btn-success"><i class="fa fa-save"></i></button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="subjects-list">
						<!--- Render Subject List -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 pull-right">
			<button class="btn btn-default" type="button" onclick="subjectController.closeSubjectForm();">Cancel</button>
		</div>
	</div>
</form>
</script>