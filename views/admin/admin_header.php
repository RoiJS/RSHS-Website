<!-- top navigation -->
<div class="top_nav">
	<div class="nav_menu">
		<nav class="" role="navigation">
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>
			
			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<div class="row">
							<div class="col-lg-5">
								<img src="<?php echo showSystemLogo(); ?>" style="height:30px;" class="img-responsive"/> 
							</div>
							<div class="col-lg-7">
								<?php echo ucwords($_SESSION["account"]["data"]["username"]);?>
								<span class=" fa fa-angle-down"></span>
							</div>
						</div>
					</a>
					<ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
						<li>
							<hr>
							<div class="row">
								<div class="col-lg-12">
									<center>
										<img src="<?php echo showSystemLogo(); ?>" style="height:100px;" class="img-responsive"/>
									</center>	
								</div>
							</div>
							<hr>
						</li>
						<li><a href="/rshs">  View Site</a>
						</li>
						<li><a href="javascript:;" onclick="profileController.updateProfileForm();">  Profile</a>
						</li>
						<li><a href="javascript:;" onclick="access_controller.logout();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
						</li>
					</ul>
				</li>
				<?php $new_messages = execSQL("SELECT * FROM tbl_messages WHERE readStatus = 0 ORDER BY dateReceived DESC","","","variable"); ?>
				
				<li role="presentation" class="dropdown" >
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false" >
						<i class="fa fa-envelope-o"></i>
						<?php if(count($new_messages) > 0){?>
							<span class="badge bg-green"><?php echo count($new_messages);?></span>
						<?php }?>
					</a>
					<ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
						<?php if(!empty($new_messages)){?>
							<?php foreach($new_messages as $message){?>
								<li>
									<a href="?pg=admin&vw=readMessage&dir=<?php echo sha1("messages");?>&<?php echo sha1("readMessage");?>=<?php echo $message["data"]["message_id"];?>">
										<span class="image">
											<img src="<?php echo $GLOBALS["main_dir"].$GLOBALS["logo_dir"]."user.png";?>" alt="<?php echo $message["data"]["fullname"]; ?>" />
										</span>
										<span>
											<span><?php echo showModuleDescription($message["data"]["fullname"], 17);?></span>
											<span class="time"><?php echo getTimeDescription($message["data"]["dateReceived"]);?></span>
										</span>
										<span class="message">
											<?php echo showModuleDescription($message["data"]["message"], 20);?>
										</span>
									</a>
								</li>	
							<?php }?>
							<li>
								<div class="text-center">
									<a href="?pg=admin&vw=messages&dir=<?php echo sha1("messages");?>">
										<strong>See All Messages</strong>
										<i class="fa fa-angle-right"></i>
									</a>
								</div>
							</li>
						<?php }else{?>
							<li>
								<div class="text-center">
									<a>
										<strong>No new messages</strong>
									</a>
								</div>
							</li>
						<?php }?>
						
					</ul>
				</li>

			</ul>
		</nav>
	</div>
</div>
<script src="app/controllers/access/accessController.js"></script>
<script src="app/controllers/admin/profile/profileController.js"></script>

<!-- /top navigation -->
