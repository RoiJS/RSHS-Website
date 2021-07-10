<div class="container body"> 
	<div class="main_container">
		<?php execSQL("UPDATE tbl_messages","SET readStatus = :readStatus WHERE message_id = :id",[":readStatus" => 1, ":id" => $_GET[sha1(getView())]]); ?>
		<?php $messages = execSQL("SELECT * FROM tbl_messages","WHERE message_id = :id",[":id" => $_GET[sha1(getView())]],"variable",1);?>
		<!-- Nav Bar -->
		<?php require_once('views/admin/admin_navbar.php');?>
		<!-- Nav Bar -->
		
		<!-- top navigation -->
		<?php require_once('views/admin/admin_header.php');?>
		<!-- /top navigation -->
		
		<!-- page content -->
		<div class="right_col" role="main">
			<div class="">
				<div class="page-title">
					<div class="title_left">
						<h3>Read Message</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i><a href="?pg=admin&vw=messages&dir=<?php echo sha1("messages");?>">Messages</a>  </li>
							<li class="active"><i class="fa fa-chevron-right"></i>Read Message</li>
						</ol>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="row">
								<div class="col-lg-2"></div>
								<div class="col-lg-8">
									<div class="x_panel">
										<div class="x_title">
											<h2><i class="fa fa-envelope"></i> Read Message</h2><br><br>
										</div>
										<div class="x_content">
											<div class="row">
												<div class="col-lg-6">
													<label><?php echo $messages["data"]["fullname"];?></label>
													<p><?php echo $messages["data"]["emailAddress"];?></p>
												</div>
												<div class="col-lg-6">
													<p class=" pull-right"><i class="fa fa-clock-o"></i> <?php echo date("M d, Y h:i:s a", strtotime($messages["data"]["dateReceived"]));?></p>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-lg-12">
													<p class="description"><?php echo $messages["data"]["message"];?></p>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-lg-12">
													<div class="pull-right">
														<button class="btn btn-success" type="button" onclick="messageController.replyMessageForm(<?php echo $messages["data"]["message_id"];?>)">Reply</button>
														<button class="btn btn-default" type="button" onclick="messageController.removeMessage(<?php echo $messages["data"]["message_id"];?>)">Delete</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-2"></div>
							</div>
						</div>
					</div>
				</div>
			
			</div>
			<!-- footer content -->
			<?php require_once('views/admin/admin_footer.php');?>
			<!-- /footer content -->

		</div>
		<!-- /page content -->
	</div>
</div>
<script src="app/controllers/admin/messages/messageController.js"></script>