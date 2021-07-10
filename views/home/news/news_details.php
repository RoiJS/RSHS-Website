<?php require_once("views/home/home_header.php");?>
<?php $news = execSQL("SELECT * FROM tbl_news","WHERE news_id = :id",[":id" => $_GET[sha1("news_id")]],"variable",1); ?>
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
					<a href="?pg=home&vw=news&dir=<?php echo sha1("news");?>" itemprop="url">
						<span itemprop="title">School News</span>
					</a> <span class="arrow">&gt;</span>
				</div>  
				<span class="last-breadcrumbs">
					<?php echo $news["data"]["title"];?>
				</span>
			</div>
			<article class="static-page news">
				<header class="clearfix">
					<figure>
						<?php $image = $news["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["news_dir"].$news["data"]["image"] : showSystemLogo();?>
						<a href="<?php echo $image; ?>" data-rel="prettyPhoto"><img src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" alt="<?php echo $news["data"]["title"]; ?>" /></a>
					</figure>
					<aside>
						<h1 id="news-title"><?php echo $news["data"]["title"]; ?></h1>
						<p id="blog-time" class="clearfix"><time datetime="2013-11-26"><i class="fa fa-calendar"></i> <?php echo date("M d, Y", strtotime($news["data"]["date_submitted"])); ?></p>
					</aside>
				</header>
				<p class="description"><?php echo $news["data"]["description"];?></p>
			</article>
		</div>
		
		<?php require_once("views/home/home_sidebar_2.php"); ?>
	</div>
</div>
 <?php require_once("views/home/home_footer.php");?>  