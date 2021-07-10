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
					School News
				</span>
			</div>
			<?php $news_info = execSQL("SELECT * FROM tbl_news WHERE status = 1 ORDER BY date_submitted DESC LIMIT 5","","","variable");?>
			<?php if(!empty($news_info)){?>
			<article class="static-page">
				<h1 id="main-title">School News</h1>
			</article>
			<div id="slider-news" class="flexslider">
				<ul class="slides">
					<?php foreach($news_info as $news){?>
						<li>
							<div class="slider-news-content">
								<?php $image = $news["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["news_dir"].$news["data"]["image"] : showSystemLogo();?>
								<img src="<?php echo $image; ?>" alt="<?php echo $news["data"]["title"];?>" />
								<div class="panel-slider-news">
									<ul class="category-slider clearfix">
										<li><a href="#"><?php echo date("M d, Y", strtotime($news["data"]["date_submitted"]));?></a></li>
									</ul>
									<h2><a href="?pg=home&vw=news_details&dir=<?php echo sha1("news");?>&<?php echo sha1("news_id");?>=<?php echo $news["data"]["news_id"];?>"><?php echo showModuleDescription($news["data"]["description"], 135); ?></a></h2>
								</div>
							</div>
						</li>		
					<?php }?>
				</ul>
			</div>
			
			<?php $news_info = execSQL("SELECT * FROM tbl_news WHERE status = 1 ORDER BY date_submitted DESC","","","variable");?>
			<?php if(!empty($news_info)){?>
				<?php foreach($news_info as $news){?>
					<article class="news-container static-page">
						<figure>
							<?php $image = $news["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["news_dir"].$news["data"]["image"] : showSystemLogo();?>
							<center><img src="<?php echo $image; ?>" style="height:150px;" data-retina="<?php echo $image; ?>" alt="<?php echo $news["data"]["image"];?>" /></center>
						</figure>
						<header>
							<h2 class="title-news"><a href="?pg=home&vw=news_details&dir=<?php echo sha1("news");?>&<?php echo sha1("news_id");?>=<?php echo $news["data"]["news_id"];?>"><?php echo $news["data"]["title"];?></a></h2>
							<time datetime="2013-11-26"><?php echo date("M d, Y", strtotime($news["data"]["date_submitted"]));?></time>

						</header>
						<p><?php echo showModuleDescription($news["data"]["description"], 135); ?></p>
					</article>		
				<?php }?>
			<?php }?>
			<?php }else{?>
				<article class="static-page" >
					<h1 id="main-title">Empty News List</h1>
					<p >No school news has been posted yet.</p>
				</article>	
			<?php }?>
		</div>
		
		<?php require_once("views/home/home_sidebar_2.php");?>
	</div>
</div>
<?php require_once("views/home/home_footer.php");?>