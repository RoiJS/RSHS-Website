<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title;?></title>

	<?php if(getPage() == "admin" || getPage() == "access"){?>
		 <!-- Bootstrap core CSS -->
		<script src="script/jquery.min.js"></script>
		<link href="style/bootstrap.min.css" rel="stylesheet">
		<link href="fonts/css/font-awesome.min.css" rel="stylesheet">
		<link href="style/animate.min.css" rel="stylesheet">

		<!-- Custom styling plus plugins -->
		<link href="style/custom.css" rel="stylesheet">
		<link href="style/icheck/flat/green.css" rel="stylesheet" />
		<link href="style/floatexamples.css" rel="stylesheet" type="text/css" />
		<link href="script/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

		<link href="style/calendar/fullcalendar.css" rel="stylesheet">
		<link href="style/calendar/fullcalendar.print.css" rel="stylesheet" media="print">
	<?php }else{?>
		<link rel="stylesheet" type="text/css" media="all" href="style/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="style/prettyPhoto.css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,300,900' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" type="text/css" media="all" href="style/stylemobile.css" />
  
		<script src="script/modernizr.js" type="text/javascript"></script>
		<script src="script/jquery.js" type="text/javascript"></script>
		<script src="script/jquery-ui.js" type="text/javascript"></script>
		<script src="script/jquery.flexslider.js" type="text/javascript"></script>
		<script src="script/jquery.prettyPhoto.js" type="text/javascript"></script>
		<script src="script/jquery.retina.js" type="text/javascript"></script>
		
	<?php }?>
	
	<!-- System Scripts --->
	<script src="app/systemFunctions.js"></script>
    <!--[if lt IE 9]>
        <script src="../assets/script/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	<style>
		.rshs-line{border-bottom:3px solid #26B99A;border-bottom-right-radius:5px;border-bottom-left-radius:5px;}
		.fc-content{color:white; }
		.description{text-indent:50px;text-align: justify;}
	</style>
	
	<style type="text/css">
	  .holder {
		margin: 15px 0;
	  }

	  .holder a {
		font-size: 12px;
		cursor: pointer;
		margin: 0 5px;
		color: #333;
	  }

	  .holder a:hover {
		background-color: #222;
		color: #fff;
	  }

	  .holder a.jp-previous { margin-right: 15px; }
	  .holder a.jp-next { margin-left: 15px; }

	  .holder a.jp-current, a.jp-current:hover {
		color: #FF4242;
		font-weight: bold;
	  }

	  .holder a.jp-disabled, a.jp-disabled:hover {
		color: #bbb;
	  }

	  .holder a.jp-current, a.jp-current:hover,
	  .holder a.jp-disabled, a.jp-disabled:hover {
		cursor: default;
		background: none;
	  }

	  .holder span { margin: 0 5px; }
  </style>

</head>

<body class="nav-md" <?php if(getPage() == "access"){echo "style='background:#F7F7F7;'";}?>>