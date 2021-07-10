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
						<h3>Accounts</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 ">
						<ol class="breadcrumb pull-right">
							<li><i class="fa fa-chevron-right"></i> Accounts</li>
						</ol>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="row">
								<div class="col-lg-4">
									<div class="row">
										<div class="animated flipInY col-lg-12">
											<div class="tile-stats">
												<div class="icon"><center><i class="fa fa-users fa-4x"></i></center></div><br>
												<div class="count accounts-badge">0</div>
												<h3>Total Accounts</h3>
												<p>Manage Accounts.</p>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-lg-12">
											<h2><i class="fa fa-bars"></i> New Account</h2><br>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<form class="form-horizontal form-label-left" onsubmit="accountController.saveNewAccount(this); return false;">
												<div class="form-group">
													<label>Username: * </label>
													<b><p class="error-username-message text-danger" style="margin-top:10px;" hidden></p></b>
													<input type="text" name="txt_username" maxlength="100" class="form-control" placeholder="Enter username&hellip;" onkeyup="accountController.verifyAccountEmailAndUsername(this.value, 'username', '* Username already exists.');" onchange="accountController.verifyAccountEmailAndUsername(this.value, 'username', '* Username already exists.');" required />
												</div>	
												<div class="form-group">
													<label>Email address: * </label>
													<b><p class="error-email-address-message text-danger" style="margin-top:10px;" hidden></p></b>
													<input type="email" name="txt_email_address" maxlength="100" class="form-control" placeholder="Enter valid email address&hellip;" required onkeyup="accountController.verifyAccountEmailAndUsername(this.value, 'email-address', '* Email address already exists.');"  onchange="accountController.verifyAccountEmailAndUsername(this.value, 'email-address', '* Email address already exists.');" />
													
												</div>
												<hr>
												<div class="form-group">
													<label>Password: *</label>
													<input type="password" name="txt_password" minlength="6"  maxlength="50" class="form-control" placeholder="Enter password&hellip;" required />
												</div>
												<div class="form-group">
													<label>Confirm Password: *</label>
													<input type="password" name="txt_confirm_password" minlength="6" maxlength="50" class="form-control" placeholder="Retype password&hellip;" required />
												</div>
												<div class="form-group">
													<button class="btn btn-success col-lg-12"><i class="fa fa-save"></i> Save Account</button>
												</div>
											</form>
										</div>
									</div>
									<hr>
								</div>
								<div class="col-lg-8">
									<div class="x_panel">
										<div class="x_title">
											<h2><i class="fa fa-bars"></i> List of accounts</h2><br><br>
										</div>
										<div class="x_content">
											<table id="table1" class="table table-striped responsive-utilities jambo_table">
												<thead>
													<tr class="headings">
														<th>Username</th>
														<th>Password</th>
														<th>Email Address</th>
														<th></th>
													</tr>
												</thead>

												<?php $accounts = execSQL("SELECT * FROM tbl_accounts","WHERE account_id != :id ORDER BY account_id DESC",[":id" => 1],"variable");?>
												<tbody>
												<?php foreach($accounts as $account):?>
													<tr>
														<td>
															<?php echo showModuleDescription($account["data"]["username"], 20);?>
														</td>
														<td>	
															<?php for($i = 0; $i < 6; $i++):?>
																<i>*</i>
															<?php endfor; ?>
														</td>
														<td>
															<?php echo $account["data"]["emailAddress"];?>
														</td>
														<td>
															<div class="pull-right">
																<button class="btn btn-warning" onclick="accountController.updateAccountForm(<?php echo $account["data"]["account_id"]; ?>);"><i class="fa fa-edit"></i></button>
																<button class="btn btn-danger" onclick="accountController.removeAccount(<?php echo $account["data"]["account_id"]; ?>);"><i class="fa fa-remove"></i></button>
																
																<button class="btn btn-info btn-activate<?php echo $account["data"]["account_id"];?>" style="display:<?php if($account["data"]["status"] == 1){echo "none";}?>" onclick="accountController.activateDeactivateAccount(<?php echo $account["data"]["account_id"]; ?>, 1);"><i class="fa fa-plus-circle"></i></button>
																
																<button class="btn btn-default btn-deactivate<?php echo $account["data"]["account_id"];?>"style="display:<?php if($account["data"]["status"] == 0){echo "none";}?>" onclick="accountController.activateDeactivateAccount(<?php echo $account["data"]["account_id"]; ?>, 0);"><i class="fa fa-minus-circle"></i></button>
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
<script src="app/controllers/admin/accounts/accountController.js"></script>
