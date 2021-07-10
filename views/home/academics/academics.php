<?php require_once("views/home/home_header.php");?>
<div id="content-container">
        <div id="content" class="clearfix">
			
            <div id="main-content">
                <div id="breadcrumbs" class="clearfix">
                    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="/rshs" itemprop="url" class="icon-home">
                            <span itemprop="title">Home</span>
                        </a> <span class="arrow">&gt;</span>
                    </div>  
                    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="#" itemprop="url">
                            <span itemprop="title">Academics</span>
                        </a> <span class="arrow">&gt;</span>
                    </div>  
					
					<?php 
						$sub = isset($_GET["sub"]) ? $_GET["sub"] : "curriculum";
						if($sub == "curriculum" ){
							$breadcrumb = "Curriculum";
						}elseif($sub == "honors_list"){
							$breadcrumb = "Honors List";
						}
					?>
                    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="#" itemprop="url">
                            <span itemprop="title"><?php echo $breadcrumb; ?></span>
                        </a> 
                    </div>
                </div>
				
				<?php $history = execSQL("SELECT * FROM tbl_rshs_information","","","variable",1);?>
				<!-- Curriculum --->
				<article class="static-page">
					<nav id="nav-event" class="clearfix">
						<ul>
							<li class="<?php if($sub == "curriculum"){echo "current-menu-item";}?>"><a href="?pg=home&vw=academics&dir=<?php echo sha1("academics");?>&sub=curriculum">Curriculum</a></li>
							<li class="<?php if($sub == "honors_list"){echo "current-menu-item";}?>"><a href="?pg=home&vw=academics&dir=<?php echo sha1("academics");?>&sub=honors_list">Honors List</a></li>
						</ul>
					</nav>
				</article>
				<article class="static-page">
					<h1 id="main-title"><?php echo $breadcrumb; ?></h1>
				</article>
				<?php if($sub == "curriculum"){?>
					<article class="static-page">
						<ul id="list-category-team">
							<?php $first = NULL; ?>
							<?php $grade_levels = execSQL("SELECT * FROM tbl_grade_level ORDER BY grade_level_id DESC","","","variable");?>
							<?php foreach($grade_levels as $index => $grade_level):?>
								<?php if($index == 0){$first = $grade_level["data"]["grade_level_id"];}?>
								<li class="<?php if((isset($_GET[sha1("grade_level_id")]) && $_GET[sha1("grade_level_id")] == $grade_level["data"]["grade_level_id"])){echo "current-menu-item";};?>"><a href="?pg=home&vw=academics&dir=<?php echo sha1("academics"); ?>&sub=curriculum&<?php echo sha1("grade_level_id");?>=<?php echo $grade_level["data"]["grade_level_id"];?>"><?php echo $grade_level["data"]["grade"];?></a></li>
							<?php endforeach; ?>
						</ul>
						<?php $grade_level_id = isset($_GET[sha1("grade_level_id")]) ? $_GET[sha1("grade_level_id")] : $first; ?>
						
						<div class="accordion">
							<?php $grade = execSQL("SELECT grade FROM tbl_grade_level","WHERE grade_level_id = :id",[":id" => $grade_level_id],"variable", 1);?>
							<h3 class="title-faq"><?php echo $grade["data"]["grade"];?></h3>
							<div class="content-faq">
								<?php $curriculum = execSQL("SELECT * FROM tbl_curriculum INNER JOIN tbl_subjects ON tbl_curriculum.subject_id = tbl_subjects.subject_id","WHERE tbl_curriculum.grade_level_id = :id ORDER BY name ASC",[":id" => $grade_level_id],"variable");?>
								<?php if(!empty($curriculum)){?>
									<table>
										<thead>
											<tr>
												<th scope="col">Subject name</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($curriculum as $index => $cu){ ?>
											<tr class="<?php if($index % 2 == 0){echo "odd";}?>">
												<td > 
													<b><?php echo $cu["data"]["name"]; ?></b>
												</td>
											</tr>
											<?php }?>		
										</tbody>
									</table>
								<?php }else{?>
									<p>No subjects in this grade level.</p>
								<?php }?>
							</div>
					   </div>
					
					</article>
					
				<?php }else{?>
					<article class="static-page">
						<ul id="list-category-team">
							<?php $first = NULL; ?>
							<?php $grade_levels = execSQL("SELECT * FROM tbl_grade_level ORDER BY grade_level_id DESC","","","variable");?>
							<?php foreach($grade_levels as $index => $grade_level):?>
								<?php if($index == 0){$first = $grade_level["data"]["grade_level_id"];}?>
								<li class="<?php if((isset($_GET[sha1("grade_level_id")]) && $_GET[sha1("grade_level_id")] == $grade_level["data"]["grade_level_id"])){echo "current-menu-item";};?>"><a href="?pg=home&vw=academics&dir=<?php echo sha1("academics"); ?>&sub=honors_list&<?php echo sha1("grade_level_id");?>=<?php echo $grade_level["data"]["grade_level_id"];?>"><?php echo $grade_level["data"]["grade"];?></a></li>
							<?php endforeach; ?>
						</ul>
						<?php $grade_level_id = isset($_GET[sha1("grade_level_id")]) ? $_GET[sha1("grade_level_id")] : $first; ?>
						
						<div class="accordion">
							<?php $grade = execSQL("SELECT grade FROM tbl_grade_level","WHERE grade_level_id = :id",[":id" => $grade_level_id],"variable", 1);?>
							<h3 class="title-faq"><?php echo $grade["data"]["grade"];?></h3>
							<div class="content-faq">
								<?php $honors = execSQL("SELECT * FROM tbl_honors","WHERE grade_level_id = :id ORDER BY lastname ASC",[":id" => $grade_level_id],"variable");?>
								<?php if(!empty($honors)){?>
									<table>
										<thead>
											<tr>
												<th scope="col">List of honors for <?php echo $grade["data"]["grade"];?></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($honors as $index => $honor){ ?>
											<tr class="<?php if($index % 2 == 0){echo "odd";}?>">
												<td > 
													<b><?php echo $honor["data"]["firstname"]." ".$honor["data"]["middlename"]." ".$honor["data"]["lastname"]." "; ?></b>
												</td>
											</tr>
											<?php }?>		
										</tbody>
									</table>
								<?php }else{?>
									<p>No list of honors for <?php echo $grade["data"]["grade"];?>.</p>
								<?php }?>
							</div>
					   </div>
					</article>
				<?php }?>
			</div>
			
			<?php require_once("views/home/home_sidebar_2.php");?>
		</div>
	</div>
	<?php require_once("views/home/home_footer.php");?>