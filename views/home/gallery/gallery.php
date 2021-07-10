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
				<span class="last-breadcrumbs">
					Gallery
				</span>
			</div>
			
			<?php if(!isset($_GET[sha1("gallery_photos_id")])){?>
				<article class="static-page">
					<h1 id="main-title">School Gallery</h1>
				</article>
				
				<?php $galleries = execSQL("SELECT * FROM tbl_gallery WHERE status = 1 ORDER BY dateCreated DESC","","","variable");?>
				
				<?php if(!empty($galleries)){?>
					<?php foreach($galleries as $index => $gallery){?>
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
									<li >
										<div class="slider-tabs-content">
											<h3 style="font-size: 24px;font-weight: normal;"><a>Empty news list</a></h3>
											<time datetime="2013-11-30">No school news has been posted yet.</time>
										</div>
									</li>		
								<?php }?>
							</ul>
						</div>
					<?php }?>
				<?php }else{?>
				
				<?php }?>
				
			<?php }else{?>
				
			<?php }?>
		</div>
		
		   <?php require_once("views/home/home_sidebar_2.php");?>
	</div>
</div>
<?php require_once("views/home/home_footer.php");?>