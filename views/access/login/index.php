
<div >
	<a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div class="row" >
			<div class="col-lg-12">
				 <div class="alert alert-danger alert-dismissible call-out-alert fade in" hidden role="alert" style="box-shadow: 2px 2px 2px #7D7373;">
					<center><span><h2><i class="fa fa-warning "></i> <span class="call-out-text">Invalid Account Information</span></h2></span></center>
				</div>
			</div>
		</div>
	<div id="wrapper">
		
		<div id="login" class="animate form">
			<section class="login_content">
				<div class="x_panel">
					<div class="x_content">
						<div class="row">
							<div class="col-lg-12">
								<center>
									<a href="/rshs"><img src="<?php echo showSystemLogo(); ?>" style="height:170px;" class="img-responsive"/></a>
								</center>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<form name="frm_login_form" class="form-group" onsubmit="access_controller.login(this); return false;">
									<h1>Sign In</h1>
									<div class="form-group">
										<input type="text" name="txt_username" maxlength="100" class="form-control" placeholder="Username" ng-model="loginInfo.username" required />
									</div>
									
									<div class="form-group">
										<input type="password" name="txt_password" maxlength="100" class="form-control" placeholder="Password" ng-model="loginInfo.password" required />
									</div>
									<div class="form-group">
										<button class="btn btn-success pull-left" type="submit" ><i class="fa fa-sign-in"></i> Log in</button>
										<a class="reset_pass" style="cursor:pointer;" onclick="access_controller.forgot_password();">Forgot your password?</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="separator">
							<div>
								<h1><i style="font-size: 26px;"></i> Regional Science High School</h1>
								<p>©<?php echo date("Y");?> All Rights Reserved. </p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- content -->
		</div>
	</div>
</div>
<script src="app/controllers/access/accessController.js"></script>