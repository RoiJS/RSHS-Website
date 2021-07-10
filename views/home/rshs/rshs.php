<?php require_once("views/home/home_header.php");?>

    <div id="content-container">
        <div id="content" class="clearfix">
            <nav id="nav-sub-container" class="clearfix">
                <ul id="nav-sub">
                    <li class="<?php if($_GET["sub"] == "history"){echo "current-menu-item";}?>">
						<a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=history">History</a>
					</li>
                    <li class="<?php if($_GET["sub"] == "mission_vision"){echo "current-menu-item";}?>">
						<a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=mission_vision">Vision &amp; Mission</a>
					</li>
                    <li class="<?php if($_GET["sub"] == "admission"){echo "current-menu-item";}?>">
						<a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=admission">Admission</a>
					</li>
                    <li class="<?php if($_GET["sub"] == "administration"){echo "current-menu-item";}?>">
						<a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=administration">Administration</a>
					</li>
                    <li class="<?php if($_GET["sub"] == "alumni"){echo "current-menu-item";}?>">
						<a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=alumni">Alumni</a>
					</li>
                    <li class="<?php if($_GET["sub"] == "bids_awards"){echo "current-menu-item";}?>">
						<a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=bids_awards">Bids &amp; Awards</a>
					</li>
                    <li class="<?php if($_GET["sub"] == "citizen_charter"){echo "current-menu-item";}?>">
						<a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=citizen_charter">Citizen Charter</a>
					</li>
                </ul>
            </nav>
			
            <div id="main-content">
                <div id="breadcrumbs" class="clearfix">
                    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="/rshs" itemprop="url" class="icon-home">
                            <span itemprop="title">Home</span>
                        </a> <span class="arrow">&gt;</span>
                    </div>  
                    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="#" itemprop="url">
                            <span itemprop="title">RSHS</span>
                        </a> <span class="arrow">&gt;</span>
                    </div>  
					
					<?php 
						$sub = $_GET["sub"];
						if($sub == "history"){
							$breadcrumb = "History";
						}elseif($sub == "mission_vision"){
							$breadcrumb = "Vision & Mission";
						}elseif($sub == "admission"){
							$breadcrumb = "Admission";
						}elseif($sub == "administration"){
							$breadcrumb = "Administration";
						}elseif($sub == "alumni"){
							$breadcrumb = "Alumni";
						}elseif($sub == "bids_awards"){
							$breadcrumb = "Bids & Awards";
						}elseif($sub == "citizen_charter"){
							$breadcrumb = "Citizen Charter";
						}
					?>
                    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="#" itemprop="url">
                            <span itemprop="title"><?php echo $breadcrumb; ?></span>
                        </a> 
                    </div>
                </div>
				
				
				<?php if($sub == "history"){?>
					<?php $history = execSQL("SELECT history FROM tbl_rshs_information","","","variable",1);?>
					<!-- History --->
					<article class="static-page">
						<h1 id="main-title"><?php echo $breadcrumb; ?></h1>
						<p ><?php echo $history["data"]["history"];?></p>
					</article>
					<!-- History --->
				<?php }elseif($sub == "mission_vision"){?>
					<!-- Mission Vision --->
					<?php $mission_vision = execSQL("SELECT mission, vision FROM tbl_rshs_information","","","variable",1);?>
					<article class="static-page">
						<h1 id="main-title">Vision</h1>
						<p ><?php echo $mission_vision["data"]["vision"];?></p>
					</article>
					<div class="separator"></div>
					<article class="static-page">
						<h1 id="main-title">Mission</h1>
						<p ><?php echo $mission_vision["data"]["mission"];?></p>
					</article>
					<!-- Mission Vision --->
				<?php }elseif($sub == "admission"){?>
					<!-- Admission --->
					<?php $admission = execSQL("SELECT admission FROM tbl_rshs_information","","","variable",1);?>
					<article class="static-page">
						<h1 id="main-title">Admission</h1>
						<p ><?php echo $admission["data"]["admission"];?></p>
					</article>
					<!-- Admission --->
				<?php }elseif($sub == "bids_awards"){?>
					<!-- Bids & Awards --->
					<?php $bids_awards = execSQL("SELECT * FROM tbl_bids_and_awards WHERE status = 1 ORDER BY bids_and_awards_id DESC","","","variable");?>
					<?php if(!empty($bids_awards)){?>
						<article class="static-page" >
							<h1 id="main-title">Bids &amp; Awards</h1>
							<div class="accordion">
								<?php foreach($bids_awards as $ba):?>
									<h3 class="title-faq"><a ><?php echo $ba["data"]["title"]; ?></a></h3>
									<div class="content-faq">
										<?php $image = $ba["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["bids_awards_dir"].$ba["data"]["image"] : showSystemLogo();?>
										<img src="<?php echo $image; ?>" style="max-height:120px;" alt="<?php echo $ba["data"]["title"];?>"  data-retina="<?php echo $image; ?>" class="alignleft imgframe" />
										<p class="description"><?php echo showModuleDescription($ba["data"]["description"], 200);?>  <a href="?pg=home&vw=bids_awards_details&dir=<?php echo sha1("bids_awards"); ?>&<?php echo sha1("bids_and_awards_id"); ?>=<?php echo $ba["data"]["bids_and_awards_id"]; ?>">Read more&hellip;</a></p>
									</div>	
								<?php endforeach; ?>
						   </div>
						</article>
					<?php }else{?>
						<article class="static-page" >
							<h1 id="main-title">Empty Bids &amp; Awards List</h1>
							<p >No bids and awards has been posted yet.</p>
						</article>
					<?php }?>
					
					<!-- Bids & Awards --->
				<?php }elseif($sub == "citizen_charter"){?>
					<!-- Citizen Charter --->
					<?php $citizen_charters = execSQL("SELECT * FROM tbl_citizen_charters WHERE status = 1 ORDER BY citizen_charter_id DESC","","","variable");?>
					<?php if(!empty($citizen_charters)){?>
						<article class="static-page" >
							<h1 id="main-title">Citizen Charter</h1>
							<div class="accordion">
								<?php foreach($citizen_charters as $citizen_charter):?>
									<h3 class="title-faq"><?php echo $citizen_charter["data"]["title"]; ?></h3>
									<div class="content-faq">
										 <?php $image = $citizen_charter["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["citizen_charters_dir"].$citizen_charter["data"]["image"] : showSystemLogo();?>
										<img src="<?php echo $image; ?>" style="max-height:120px;" alt="="<?php echo $citizen_charter["data"]["title"];?>""  data-retina="<?php echo $image; ?>" class="alignleft imgframe" />
										<p class="description"><?php echo showModuleDescription($citizen_charter["data"]["description"], 200);?> <a href="?pg=home&vw=citizen_charter_details&dir=<?php echo sha1("citizen_charters"); ?>&<?php echo sha1("citizen_charter_id"); ?>=<?php echo $citizen_charter["data"]["citizen_charter_id"]; ?>">Read more&hellip;</a></p>
									</div>	
								<?php endforeach; ?>
						   </div>
						</article>
					<?php }else{?>
						<article class="static-page" >
							<h1 id="main-title">Empty Citizen Charter List</h1>
							<p >No citizen charter has been posted yet.</p>
						</article>
					<?php }?>
					<!-- Citizen Charter --->
				<?php }elseif($sub == "administration"){?>
					<!-- Administration --->
					<?php $administrations = execSQL("SELECT * FROM tbl_administrations WHERE status = 1 ORDER BY administration_id DESC","","","variable");?>
					<?php if(!empty($administrations)){?>
						<article class="static-page" >
							<h1 id="main-title">Administration</h1>
						</article>
						<article class="static-page">
							<ul id="list-category-team">
								<?php $first = NULL; ?>
								<?php $departments = execSQL("SELECT * FROM tbl_departments ORDER BY position DESC","","","variable");?>
								<?php foreach($departments as $index => $department):?>
									<?php if($index == 0){$first = $department["data"]["department_id"];}?>
									<li class="<?php if((isset($_GET[sha1("department_id")]) && $_GET[sha1("department_id")] == $department["data"]["department_id"])){echo "current-menu-item";};?>"><a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs"); ?>&sub=administration&<?php echo sha1("department_id");?>=<?php echo $department["data"]["department_id"];?>"><?php echo $department["data"]["name"];?></a></li>
								<?php endforeach; ?>
							</ul>
							
							<?php $department_id = isset($_GET[sha1("department_id")]) ? $_GET[sha1("department_id")] : $first; ?>
							<?php $dept_info = execSQL("SELECT * FROM tbl_departments","WHERE department_id = :id",[":id" => $department_id],"variable", 1);?>
							
							<div id="team-container">
								<h1 id="main-title"><?php echo $dept_info["data"]["name"];?></h1>
								<?php $staffs = execSQL("SELECT * FROM tbl_administrations INNER JOIN tbl_positions ON tbl_administrations.position_id = tbl_positions.position_id","WHERE department_id = :department_id AND status = :status",[":department_id" => $department_id, ":status" => 1],"variable");?>
								
								<?php if(!empty($staffs)){?>
									<?php foreach($staffs as $staff){?>
										<ul id="list-team">
											<li <?php if(preg_match("/principal/i", $dept_info["data"]["name"])){echo "style='float:none; margin:auto;'";}?>>
												<?php $image = $staff["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["administrations_dir"].$staff["data"]["image"] : showSystemLogo(); ?>
												<img src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" alt="<?php echo $staff["data"]["firstname"]." ".$staff["data"]["middlename"]." ".$staff["data"]["lastname"]; ?>" style="height:150px;width:200px;" />
												<strong><?php echo $staff["data"]["firstname"]." ".$staff["data"]["middlename"]." ".$staff["data"]["lastname"]; ?></strong>
											</li>
										</ul>
									<?php }?>
								<?php }else{?>
									<center><p><b>No staff list.</b></p></center>
								<?php }?>
								
							</div>
						</article>
           
					<?php }else{?>
						<article class="static-page" >
							<h1 id="main-title">Empty Administration Staff List</h1>
						</article>
					<?php }?>
					<!-- Administration --->
				<?php }elseif($sub == "alumni"){?>
					<!-- Alumni --->
					<?php $alumni = execSQL("SELECT * FROM tbl_alumni ORDER BY alumni_id DESC","","","variable");?>
					<?php if(!empty($alumni)){?>
						<article class="static-page" >
							<h1 id="main-title">Alumni List</h1>
							
						</article>
						<hr>
						<article class="static-page" >
							<form method="POST" action="?pg=home&vw=rshs&dir=331f640cc2071e24c7df344f91c9d596e04bb2cd&sub=alumni" id="form-year">
								<div>
									<label for="select-year" required>Sort By Year:</label>
									<select name="sort_by_year" class="select" id="select-year" required>
										<?php $first = NULL; ?>
										<?php $year = date("Y");?>
										<?php $index = 0; ?>
										<option></option>
										<?php for($counter = $year; $counter  >= 1985; $counter--):?>
											<option value="<?php echo $counter; ?>"><?php echo $counter; ?></option>
										<?php endfor; ?>
									</select>
									<input type="submit" class="button" value="Go" />
								</div>
							</form>
						</article>
						<br><br>
						<article class="static-page">
								<?php $year = isset($_POST["sort_by_year"]) ? $_POST["sort_by_year"] : $first; ?>
								<?php if($year != NULL){?>
									<div class="accordion">
										<h3 class="title-faq">Batch <?php echo $year; ?></h3>
										<div class="content-faq">
											<?php $alumni = execSQL("SELECT * FROM tbl_alumni","WHERE yearGraduated = :yearGraduated ORDER BY lastname ASC",[":yearGraduated" => $year],"variable");?>
											<ul id="list-team">
												<?php if(!empty($alumni)){?>
													<table>
														<thead>
															<tr>	
																<th scope="col">Fullname</th>
																<th scope="col">Venue Graduated</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach($alumni as $index => $al){ ?>
															<tr class="<?php if($index % 2 == 0){echo "odd";}?>">
																<td > 
																	<b><?php echo $al["data"]["lastname"].", ".$al["data"]["middlename"]." ".$al["data"]["firstname"]; ?></b>
																</td>
																<td > 
																	<b><?php echo $al["data"]["venue"]; ?></b>
																</td>
															</tr>
															<?php }?>		
														</tbody>
													</table>
												<?php }else{?>
													<p>No alumni in this year.</p>
												<?php }?>
											</ul>	
										</div>
									</div>
									
									<div class="separator"></div>		
								<?php }else{?>
								 
									<?php $years = execSQL("SELECT DISTINCT(yearGraduated) AS year FROM tbl_alumni ORDER BY yearGraduated DESC","","","variable"); ?>
									
									<div class="accordion">
									<?php foreach($years as $year){?>
										<h3 class="title-faq">Batch <?php echo $year["data"]["year"]; ?></h3>
										<div class="content-faq">
											<?php $alumni = execSQL("SELECT * FROM tbl_alumni","WHERE yearGraduated = :yearGraduated ORDER BY lastname ASC",[":yearGraduated" => $year["data"]["year"]],"variable");?>
											<?php if(!empty($alumni)){?>
												<table>
													<thead>
														<tr>
															<th scope="col">Fullname</th>
															<th scope="col">Venue Graduated</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($alumni as $index => $al){ ?>
														<tr class="<?php if($index % 2 == 0){echo "odd";}?>">
															<td > 
																<b><?php echo $al["data"]["lastname"].", ".$al["data"]["middlename"]." ".$al["data"]["firstname"]; ?></b>
															</td>
															<td > 
																<b><?php echo $al["data"]["venue"]; ?></b>
															</td>
														</tr>
														<?php }?>		
													</tbody>
												</table>
											<?php }else{?>
												<p>No alumni in this year.</p>
											<?php }?>
										</div>
									<?php } ?>
								   </div>
							
								<?php }?>
						</article>
           
					<?php }else{?>
						<article class="static-page" >
							<h1 id="main-title">Empty Alumni List</h1>
						</article>
					<?php }?>
					<!-- Alumni --->
				<?php }?>
				
            </div>
				
            <?php require_once("views/home/home_sidebar_1.php");?>
		</div>
    </div>
<?php require_once("views/home/home_footer.php");?>