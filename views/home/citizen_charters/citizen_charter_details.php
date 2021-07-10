<?php require_once("views/home/home_header.php");?>
<?php $cc = execSQL("SELECT * FROM tbl_citizen_charters","WHERE citizen_charter_id = :id",[":id" => $_GET[sha1("citizen_charter_id")]],"variable",1); ?>
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
					<a itemprop="url">
						<span itemprop="title">RSHS</span>
					</a> <span class="arrow">&gt;</span>
				</div>  
				<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="?pg=home&vw=rshs&dir=<?php echo sha1("rshs");?>&sub=citizen_charter" itemprop="url">
						<span itemprop="title">Citizen Charters</span>
					</a> <span class="arrow">&gt;</span>
				</div>  
				<span class="last-breadcrumbs">
					<?php echo $cc["data"]["title"];?>
				</span>
			</div>
			<article class="static-page" itemscope itemtype="http://data-vocabulary.org/Event">
				<h1 id="main-title" itemprop="summary"><?php echo $cc["data"]["title"]; ?></h1>
				<div id="event-info">
					<?php $image = $cc["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["citizen_charters_dir"].$cc["data"]["image"] : showSystemLogo();?>
					<center>
						<a href="<?php echo $image; ?>" data-rel="prettyPhoto">
							<img src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" alt="<?php echo $cc["data"]["title"]; ?>" />
						</a>
					</center>
				</div>
				<p class="description"><?php echo $cc["data"]["description"]; ?></p>
			</article>
		</div>
		
		<?php require_once("views/home/home_sidebar_1.php"); ?>
	  </div>
</div>
 <?php require_once("views/home/home_footer.php");?>  