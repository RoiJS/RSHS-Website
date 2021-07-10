<?php require_once("views/home/home_header.php");?>
<?php $announcement = execSQL("SELECT * FROM tbl_announcements","WHERE announcement_id = :id",[":id" => $_GET[sha1("announcement_id")]],"variable",1); ?>
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
					<a href="?pg=home&vw=announcements&dir=<?php echo sha1("announcements");?>" itemprop="url">
						<span itemprop="title">School Announcements</span>
					</a> <span class="arrow">&gt;</span>
				</div>  
				<span class="last-breadcrumbs">
					<?php echo $announcement["data"]["title"];?>
				</span>
			</div>
			<article class="static-page news">
				<header class="clearfix">
					<figure>
						<?php $image = $announcement["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["announcements_dir"].$announcement["data"]["image"] : showSystemLogo();?>
						
						<center><a href="<?php echo $image; ?>" data-rel="prettyPhoto"><img src="<?php echo $image; ?>" style="height:200px;"  alt="<?php echo $announcement["data"]["image"]; ?>" /></a></center>
					</figure>
					<aside>
						<h1 id="news-title"><?php echo $announcement["data"]["title"]; ?></h1>
						<p id="blog-time" class="clearfix"><time datetime="2013-11-26"><i class="fa fa-calendar"></i> <?php echo date("M d, Y", strtotime($announcement["data"]["date"])); ?></p>
					</aside>
				</header>
				<p class="description"><?php echo $announcement["data"]["description"];?></p>
			</article>
		</div>
		<?php require_once("views/home/home_sidebar_2.php");?>
	  </div>
</div>
 <?php require_once("views/home/home_footer.php");?>  