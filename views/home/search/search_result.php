<?php require_once("views/home/home_header.php");?>

    <div id="content-container">
        <div id="content" class="clearfix">
			
            <div id="main-content " style="width:100%;">
				<div id="breadcrumbs" class="clearfix">
					<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
						<a href="/rshs" itemprop="url" class="icon-home">
							<span itemprop="title">Home</span>
						</a> <span class="arrow">&gt;</span>
					</div>  
					<span class="last-breadcrumbs">
						Search Result
					</span>
				</div>
				<?php if(!isset($_POST["txt_search"])){?>
					<article class="static-page" >
						<h1 id="main-title">No item to search&hellip;</h1>
					</div>
				<?php }else{?>
					<article class="static-page" >
						<?php $news = globalSearch("tbl_news",array("title", "description","date_submitted"), $_POST["txt_search"]); ?>
						<?php $events = globalSearch("tbl_academic_events",array("title", "date","description"), $_POST["txt_search"]); ?>
						<?php $photo_gallery = globalSearch("tbl_gallery_photos",array("imagename", "description"), $_POST["txt_search"]); ?>
						<?php $gallery = globalSearch("tbl_gallery",array("title", "dateCreated", "description"), $_POST["txt_search"]); ?>
						<?php $administration = globalSearch("tbl_administrations",array("firstname", "middlename","lastname"), $_POST["txt_search"]); ?>
						<?php $alumni = globalSearch("tbl_alumni",array("venue", "firstname","middlename", "lastname"), $_POST["txt_search"]); ?>
						<?php $bids_awards = globalSearch("tbl_bids_and_awards",array("title","description"), $_POST["txt_search"]); ?>
						<?php $citizen_charters = globalSearch("tbl_citizen_charters",array("title","description"), $_POST["txt_search"]); ?>
						<?php $announcements = globalSearch("tbl_announcements",array("title","description"), $_POST["txt_search"]); ?>
						<?php $transparency_seal = globalSearch("tbl_transparency_seal",array("title", "description","date"), $_POST["txt_search"]);?>
						<?php $downloads = globalSearch("tbl_downloads",array("filename","caption"), $_POST["txt_search"]); ?>
						<?php 
							$total_count = count($news) + count($events) + count($photo_gallery) + count($gallery) + count($administration) + count($alumni) + count($bids_awards) + count($citizen_charters) + count($transparency_seal)  + count($announcements) ;
						?>
						
						<h1 id="main-title">Search results for <i></b>"<?php echo $_POST["txt_search"]; ?>"&hellip;</b></i> <?php echo  $total_count; ?> result/s found</h1>
						<article class="static-page">
							<?php $results = ["news" => $news, "announcements" => $announcements, "events" => $events, "photo_gallery" => $photo_gallery, "gallery" => $gallery, "administration" => $administration, "alumni" => $alumni, "transparency_seal" => $transparency_seal, "bids_awards" => $bids_awards, "citizen_charters" => $citizen_charters]; ?>
							
							<?php //$results = ["news" => $news]; ?>
							
							<div class="accordion">
								<?php foreach($results as $index => $result){?>
									
									<?php 
										if($index == "news"){
											$title = "News";
										}elseif($index == "events"){
											$title = "Academic events";
										}elseif($index == "photo_gallery"){
											$title = "Photo Gallery";
										}elseif($index == "gallery"){
											$title = "Gallery";
										}elseif($index == "administration"){
											$title = "Administration";
										}elseif($index == "alumni"){
											$title = "Alumni";
										}elseif($index == "bids_awards"){
											$title = "Bids & Awards";
										}elseif($index == "citizen_charters"){
											$title = "Citizen Charters";
										}elseif($index == "announcements"){
											$title = "Announcements";
										}elseif($index == "transparency_seal"){
											$title = "Transparency Seal";
										}elseif($index == "downloads"){
											$title = "Downloads";
										}
										
									?>
									<h3 class="title-faq"><?php echo $title; ?> - <b>(<?php echo count($result);?>)</b></h3>
									
									<?php if($index == "news"){?>	
										<!--News Results-->
										<div class="content-faq">
											<?php if(!empty($result)){ ?>
												<?php foreach($result as $index => $news){?>
													<a href="?pg=home&vw=news_details&dir=<?php echo sha1("news"); ?>&<?php echo sha1("news"); ?>&<?php echo sha1("news_id"); ?>=<?php echo $news["data"]["news_id"];?>" style="font-size:30px;"><?php echo $news["data"]["title"]; ?></a>
													<p><?php echo date("M d, Y", strtotime($news["data"]["date_submitted"])); ?></p>
													<div style="width:100%; height:180px; margin-top:20px;"> 
														<?php $image = $news["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["news_dir"].$news["data"]["image"] : showSystemLogo();?>
														<a href="<?php echo $image; ?>" data-rel="prettyPhoto[pp-gw_gallery-5]">
															<img src="<?php echo $image; ?>" style="max-height:140px;" alt="<?php echo $news["data"]["title"];?>"  data-retina="<?php echo $image; ?>" class="alignleft imgframe" />
														</a>
														<p class="description"><?php echo showModuleDescription($news["data"]["description"], 500); ?></p>
													</div>
												<?php }?>
											<?php }else{ ?>
												<p><b>No result/s found&hellip;</b></p>
											<?php }?>
										</div>
										<!--News Results-->
									<?php }elseif($index == "announcements"){?>
										<!--Announcements Results-->
										<div class="content-faq">
											<?php if(!empty($result)){ ?>
												<?php foreach($result as $index => $announcement){?>	
													<a href="?pg=home&vw=announcement_details&dir=<?php echo sha1("announcements");?>&<?php echo sha1("announcement_id");?>=<?php echo $announcement["data"]["announcement_id"];?>" style="font-size:30px;"><?php echo $news["data"]["title"]; ?></a>
													<p><?php echo date("M d, Y", strtotime($announcement["data"]["date"])); ?></p>
													<div style="width:100%; height:180px; margin-top:20px;"> 
														<?php $image = $announcement["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["announcements_dir"].$announcement["data"]["image"] : showSystemLogo();?>
														<a href="<?php echo $image; ?>" data-rel="prettyPhoto[pp-gw_gallery-5]">
															<img src="<?php echo $image; ?>" style="max-height:140px;" alt="<?php echo $news["data"]["title"];?>"  data-retina="<?php echo $image; ?>" class="alignleft imgframe" />
														</a>
														<p class="description"><?php echo showModuleDescription($announcement["data"]["description"], 500); ?></p>
													</div>
												<?php }?>	
											<?php }else{?>
												<p><b>No result/s found&hellip;</b></p>
											<?php }?>
										</div>
										<!--Announcements Results-->
									<?php }elseif($index == "events"){?>
										<!--Events Results-->
										<div class="content-faq">
											<?php if(!empty($result)){ ?>
												<?php foreach($result as $index => $event){?>	
													<a href="?pg=home&vw=event_details&dir=<?php echo sha1("events");?>&<?php echo sha1("event_id"); ?>=<?php echo $event["data"]["academic_event_id"];?>" style="font-size:30px;"><?php echo $event["data"]["title"]; ?></a>
													<p><?php echo date("M d, Y", strtotime($event["data"]["date"])); ?></p>
													<div style="width:100%; height:180px; margin-top:20px;"> 
														<?php $image = $event["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["academic_events_dir"].$event["data"]["image"] : showSystemLogo();?>
														<a href="<?php echo $image; ?>" data-rel="prettyPhoto[pp-gw_gallery-5]">
															<img src="<?php echo $image; ?>" style="max-height:140px;" alt="<?php echo $news["data"]["title"];?>"  data-retina="<?php echo $image; ?>" class="alignleft imgframe" />
														</a>
														<p class="description"><?php echo showModuleDescription($event["data"]["description"], 500); ?></p>
													</div>
												<?php }?>	
											<?php }else{?>
												<p><b>No result/s found&hellip;</b></p>
											<?php }?>
										</div>
										<!--Events Results-->
									<?php }elseif($index == "photo_gallery"){?>
										<!--Photo Gallery Results-->
										<div class="content-faq">
											<?php if(!empty($result)){ ?>
												<div class="gallery-group clearfix">
													<ul class="list-gallery-category detail">
														<?php foreach($result as $index => $photo){?>
															<?php $image = $GLOBALS["main_dir"].$GLOBALS["gallery_photos_dir"].$photo["data"]["image"];?>
															<li><a href="?pg=home&vw=gallery_photos&dir=<?php echo sha1("gallery");?>&<?php echo sha1("gallery_id");?>=<?php echo $photo["data"]["gallery_id"];?>"><img src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" alt="<?php echo $photo["data"]["description"]; ?>" /><span><?php echo $photo["data"]["description"]; ?></span></a></li>	
														<?php }?>
													</ul>
												</div>
											<?php }else{?>
												<p><b>No result/s found&hellip;</b></p>
											<?php }?>
										</div>
										<!--Photo Gallery Results-->
									<?php }elseif($index == "gallery"){?>
										<!--Gallery Results-->
										<div class="content-faq">
											<?php if(!empty($result)){ ?>
												<?php foreach($result as $index => $gallery){?>
													<div class="gallery-group clearfix" >
														<a href="?pg=home&vw=gallery_photos&dir=<?php echo sha1("gallery");?>&<?php echo sha1("gallery_id");?>=<?php echo $gallery["data"]["gallery_id"];?>" class="link-category-gallery">
															<strong><?php echo $gallery["data"]["title"];?></strong><br />
															<span class="description"><?php echo $gallery["data"]["description"];?></span>
														</a>
														
														<ul class="list-gallery-category">
															<?php $photos = execSQL("SELECT * FROM tbl_gallery_photos ","WHERE gallery_id = :id ORDER BY dateUploaded DESC LIMIT 4",[":id" => $gallery["data"]["gallery_id"]],"variable");?>
															
															<?php if(!empty($photos)){?>
																<?php foreach($photos as $photo){?>
																	<?php $image = $GLOBALS["main_dir"].$GLOBALS["gallery_photos_dir"].$photo["data"]["image"];?>
																	<li><a href="<?php echo $image; ?>" data-rel="prettyPhoto[cat-1]"><img src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" alt="<?php echo $photo["data"]["description"];?>" /><span><?php echo $photo["data"]["description"];?></span></a></li>	
																<?php }?>
															<?php }else{?>
																<li>
																	<h2>Empty photo list.</h2>
																	<p>No photos have been uploaded yet.</p>
																</li>	
															<?php }?>
														</ul>
													</div>
												<?php }?>
											<?php }else{?>
												<p><b>No result/s found&hellip;</b></p>
											<?php }?>
										</div>
										<!--Gallery Results-->
									<?php }elseif($index == "administration"){?>
										<!--Administration Results-->
										<div class="content-faq">
											<?php if(!empty($result)){ ?>
												<table style="width:100%;">
													<thead>
														<tr>
															<th scope="col">Fullname</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($result as $index => $staff){ ?>
														<tr class="<?php if($index % 2 == 0){echo "odd";}?>">
															<td > 
																<b><a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs"); ?>&sub=administration&<?php echo sha1("department_id");?>=<?php echo $staff["data"]["department_id"];?>"><?php echo $staff["data"]["firstname"]." ".$staff["data"]["middlename"]." ".$staff["data"]["lastname"]; ?></a></b>
															</td>
														</tr>
														<?php }?>		
													</tbody>
												</table>
											<?php }else{?>
												<p><b>No result/s found&hellip;</b></p>
											<?php }?>
										</div>
										<!--Administration Results-->
									<?php }elseif($index == "alumni"){?>
										<!--Alumni Results-->
										<div class="content-faq">
											<?php if(!empty($result)){ ?>
												<table style="width:100%;">
													<thead>
														<tr>
															<th scope="col">Fullname</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($result as $index => $alumni){ ?>
														<tr class="<?php if($index % 2 == 0){echo "odd";}?>">
															<td > 
																<b><a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=alumni"><?php echo $alumni["data"]["firstname"]." ".$alumni["data"]["middlename"]." ".$alumni["data"]["lastname"]; ?></a></b>
															</td>
														</tr>
														<?php }?>		
													</tbody>
												</table>
											<?php }else{?>
												<p><b>No result/s found&hellip;</b></p>
											<?php }?>
										</div>
										<!--Alumni Results-->
									<?php }elseif($index == "bids_awards"){?>
										<!--Bids & Awards Results-->
										<div class="content-faq">
											<?php if(!empty($result)){ ?>
												<?php foreach($result as $index => $ba){?>	
													<a href="?pg=home&vw=bids_awards_details&dir=<?php echo sha1("bids_awards"); ?>&<?php echo sha1("bids_and_awards_id"); ?>=<?php echo $ba["data"]["bids_and_awards_id"]; ?>" style="font-size:30px;"><?php echo $ba["data"]["title"]; ?></a>
													<div style="width:100%; height:180px; margin-top:20px;"> 
														<?php $image = $ba["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["bids_awards_dir"].$ba["data"]["image"] : showSystemLogo();?>
														<a href="<?php echo $image; ?>" data-rel="prettyPhoto[pp-gw_gallery-5]">
															<img src="<?php echo $image; ?>" style="max-height:140px;" alt="<?php echo $ba["data"]["title"];?>"  data-retina="<?php echo $image; ?>" class="alignleft imgframe" />
														</a>
														<p class="description"><?php echo showModuleDescription($ba["data"]["description"], 500); ?></p>
													</div>
												<?php }?>	
											<?php }else{?>
												<p><b>No result/s found&hellip;</b></p>
											<?php }?>
										</div>
										<!--Bids & Awards Results-->
									<?php }elseif($index == "citizen_charters"){?>
										<!--Citizen Charters Results-->
										<div class="content-faq">
											<?php if(!empty($result)){ ?>
												<?php foreach($result as $index => $cc){?>	
													<a href="?pg=home&vw=citizen_charter_details&dir=<?php echo sha1("citizen_charters"); ?>&<?php echo sha1("citizen_charter_id"); ?>=<?php echo $cc["data"]["citizen_charter_id"]; ?>" style="font-size:30px;"><?php echo $cc["data"]["title"]; ?></a>
													<div style="width:100%; height:180px; margin-top:20px;"> 
														<?php $image = $cc["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["citizen_charters_dir"].$cc["data"]["image"] : showSystemLogo();?>
														<a href="<?php echo $image; ?>" data-rel="prettyPhoto[pp-gw_gallery-5]">
															<img src="<?php echo $image; ?>" style="max-height:140px;" alt="<?php echo $cc["data"]["title"];?>"  data-retina="<?php echo $image; ?>" class="alignleft imgframe" />
														</a>
														<p class="description"><?php echo showModuleDescription($cc["data"]["description"], 500); ?></p>
													</div>
												<?php }?>	
											<?php }else{?>
												<p><b>No result/s found&hellip;</b></p>
											<?php }?>
										</div>
										<!--Citizen Charters Results-->
									<?php }elseif($index == "downloads"){?>
										<!--Downloads Results-->
										<div class="content-faq">
											<?php if(!empty($result)){ ?>
												<?php foreach($result as $index => $cc){?>	
													<a href="?pg=home&vw=citizen_charter_details&dir=<?php echo sha1("citizen_charters"); ?>&<?php echo sha1("citizen_charter_id"); ?>=<?php echo $cc["data"]["citizen_charter_id"]; ?>" style="font-size:30px;"><?php echo $ba["data"]["title"]; ?></a>
													<div style="width:100%; height:180px; margin-top:20px;"> 
														<?php $image = $cc["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["citizen_charters_dir"].$cc["data"]["image"] : showSystemLogo();?>
														<a href="<?php echo $image; ?>" data-rel="prettyPhoto[pp-gw_gallery-5]">
															<img src="<?php echo $image; ?>" style="max-height:140px;" alt="<?php echo $cc["data"]["title"];?>"  data-retina="<?php echo $image; ?>" class="alignleft imgframe" />
														</a>
														<p class="description"><?php echo showModuleDescription($cc["data"]["description"], 500); ?></p>
													</div>
												<?php }?>	
											<?php }else{?>
												<p><b>No result/s found&hellip;</b></p>
											<?php }?>
										</div>
										<!--Downloads Results-->
									<?php }elseif($index == "transparency_seal"){?>
										<!--Transparency Seal Results-->
										<div class="content-faq">
											<?php if(!empty($result)){ ?>
												<?php foreach($result as $index => $ts){?>	
													<a href="?pg=home&vw=transparency_seal_details&dir=<?php echo sha1("transparency_seal"); ?>&<?php echo sha1("transparency_seal_id"); ?>=<?php echo $ts["data"]["transparency_seal_id"]; ?>" style="font-size:30px;"><?php echo $ts["data"]["title"]; ?></a>
													<div style="width:100%; height:180px; margin-top:20px;"> 
														<?php $image = $ts["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["transparency_seal_dir"].$ts["data"]["image"] : showSystemLogo();?>
														<a href="<?php echo $image; ?>" data-rel="prettyPhoto[pp-gw_gallery-5]">
															<img src="<?php echo $image; ?>" style="max-height:140px;" alt="<?php echo $ts["data"]["title"];?>"  data-retina="<?php echo $image; ?>" class="alignleft imgframe" />
														</a>
														<p class="description"><?php echo showModuleDescription($ts["data"]["description"], 500); ?></p>
													</div>
												<?php }?>	
											<?php }else{?>
												<p><b>No result/s found&hellip;</b></p>
											<?php }?>
										</div>
										<!--Transparency Seal Results-->
									<?php }?>
								<?php } ?>
						   </div>
						</article>
					</div>
				<?php }?>
		   </div>
		</div>
    </div>
<script src="app/controllers/home/contact_us/contactUsController.js"></script>
<?php require_once("views/home/home_footer.php");?>