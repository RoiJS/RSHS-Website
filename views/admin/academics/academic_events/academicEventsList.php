<?php 
	require_once("../../../../functions/sql.query.function.php");
	echo json_encode(execSQL("SELECT * FROM tbl_academic_events","","","variable"));