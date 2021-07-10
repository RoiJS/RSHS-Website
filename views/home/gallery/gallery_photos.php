<?php require_once("views/home/home_header.php");?>
<?php $gallery = execSQL("SELECT * FROM tbl_gallery","WHERE gallery_id = :id",[":id" => $_GET[sha1("gallery_id")]],"variable",1);?>

<div id="content-container">
	<div id="content" class="clearfix">
		<div id="full-width">
			<div id="breadcrumbs" class="clearfix">
				<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="index.html" itemprop="url" class="icon-home">
						<span itemprop="title">Home</span>
					</a> <span class="arrow">&gt;</span>
				</div>
				<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="?pg=home&vw=gallery&dir=<?php echo sha1("gallery");?>" itemprop="url">
						<span itemprop="title">Gallery</span>
					</a> <span class="arrow">&gt;</span>
				</div>
				<span class="last-breadcrumbs">
					<?php echo $gallery["data"]["title"];?>
				</span>
			</div>
			<article class="static-page">
				<h1 id="main-title"><?php echo $gallery["data"]["title"];?></h1>
				<p class="description"><?php echo $gallery["data"]["description"];?></p>
				
				<div style="float:left:30px%;">
					<ul id="list-category-team">
						<?php $first = NULL; ?>
						<?php $dates = execSQL("SELECT DISTINCT(dateUploaded) FROM tbl_gallery_photos","WHERE gallery_id = :id",[":id" => $_GET[sha1("gallery_id")]],"variable");?>
						<?php foreach($dates as $index => $date):?>
							<?php if($index == 0){$first = $date["data"]["dateUploaded"];}?>
							<li class="<?php if((isset($_GET[sha1("dateUploaded")]) && $_GET[sha1("dateUploaded")] == $date["data"]["dateUploaded"])){echo "current-menu-item";};?>"><a href="?pg=home&vw=gallery_photos&dir=<?php echo sha1("gallery"); ?>&<?php echo sha1("gallery_id"); ?>=<?php echo $_GET[sha1("gallery_id")]; ?>&<?php echo sha1("dateUploaded");?>=<?php echo $date["data"]["dateUploaded"];?>"><?php echo date("M d, Y", strtotime($date["data"]["dateUploaded"]));?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div style="float:left;width:81%;">
					<?php $date = isset($_GET[sha1("dateUploaded")]) ? $_GET[sha1("dateUploaded")] : $first; ?>
					
					<?php $photos = execSQL("SELECT * FROM tbl_gallery_photos","WHERE dateUploaded = :dateUploaded AND gallery_id = :id ORDER BY dateUploaded DESC",[":dateUploaded" => $date, ":id" => $_GET[sha1("gallery_id")]],"variable");?>
					
					<div class="gallery-group clearfix">
						<ul class="list-gallery-category detail">
							<?php foreach($photos as $photo){?>
								<?php $image = $GLOBALS["main_dir"].$GLOBALS["gallery_photos_dir"].$photo["data"]["image"];?>
								<li><a href="<?php echo $image; ?>" data-rel="prettyPhoto[cat-1]"><img src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" alt="<?php echo $photo["data"]["description"]; ?>" /><span><?php echo $photo["data"]["description"]; ?></span></a></li>	
							<?php }?>
						</ul>
					</div>
				</div>
			</article>
		</div>
	</div>
</div>
<?php require_once("views/home/home_footer.php");?>