<div class="container body"> 
	<div class="main_container">
		
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
						<h3>Messages</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i>Messages</li>
						</ol>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="row">
								<div class="col-lg-3">
									<div class="row">
										<div class="animated flipInY col-lg-12">
											<div class="tile-stats">
												<div class="icon"><i class="fa fa-envelope fa-3x"></i></div>
												<div class="count messages-badge">0</div>
												<h3>Total Messages</h3>
												<p>Manage messages.</p>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<label>Click button below to send message</label>
										</div>
										<div class="col-lg-12">
											<button class="btn btn-success col-lg-12" onclick="messageController.sendMessageForm();"><i class="fa fa-envelope"></i> Send Message</button>
										</div>
									</div>
									<hr>
								</div>
								<div class="col-lg-9">
									<div class="x_panel">
										<div class="x_title">
											<h2><i class="fa fa-bars"></i> List of Messages</h2><br><br>
										</div>
										<div class="x_content">
											<table id="table1" class="table table-striped responsive-utilities jambo_table">
												<thead>
													<tr class="headings">
														<th>Sender </th>
														<th>Email Address </th>
														<th>Date Received </th>
														<th>Message</th>
														<th>Reply Status</th>
														<th></th>
													</tr>
												</thead>
												<?php $messages = execSQL("SELECT * FROM tbl_messages ORDER BY dateReceived DESC","","","variable");?>
												<tbody>
												<?php foreach($messages as $message):?>
													<tr class="<?php if($message["data"]["readStatus"] == 0){echo "danger";}?>" >
														<td><a href="?pg=admin&vw=readMessage&dir=<?php echo sha1("messages");?>&<?php echo sha1("readMessage");?>=<?php echo $message["data"]["message_id"];?>"><?php echo showModuleDescription($message["data"]["fullname"], 15);?></td>
														<td title="<?php echo $message["data"]["emailAddress"]; ?>"><?php echo showModuleDescription($message["data"]["emailAddress"],10);?></td>
														<td><?php echo date("m/d/y", strtotime($message["data"]["dateReceived"]));?></td>
														<td ><?php echo showModuleDescription($message["data"]["message"], 18);?></td>
														<td>
															<?php if($message["data"]["replyStatus"] == 1){?>
																<center><i class="fa fa-check fa-2x text-success"></i></center>
															<?php }else{?>
																<center><i class="fa fa-remove fa-2x text-danger"></i></center>
															<?php }?>
														</td>
														<td>
															<div class="pull-right">
																<button class="btn btn-default" onclick="messageController.replyMessageForm(<?php echo $message["data"]["message_id"];?>);"><i class="fa fa-reply"></i></button>
																
																<button class="btn btn-danger" onclick="messageController.removeMessage(<?php echo $message["data"]["message_id"];?>);"><i class="fa fa-trash"></i></button>
																
															</div>
														</td>
													</tr>
												<?php endforeach;?>
												</tbody>
										</table>
										</div>
									</div>
								</div>
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