<?php require_once("views/home/home_header.php");?>
<?php $event = execSQL("SELECT * FROM tbl_academic_events","WHERE academic_event_id = :id",[":id" => $_GET[sha1("event_id")]],"variable", 1); ?>
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
                        <a href="?pg=home&vw=events&dir=<?php echo sha1("events"); ?>" itemprop="url">
                            <span itemprop="title">School Events</span>
                        </a> <span class="arrow">&gt;</span>
                    </div>  
                    <span class="last-breadcrumbs">
                       <?php echo $event["data"]["title"]; ?>
                    </span>
                </div>
                <article class="static-page" itemscope itemtype="http://data-vocabulary.org/Event">
                    <h1 id="main-title" itemprop="summary"><?php echo $event["data"]["title"]; ?></h1>
                    <div id="event-info">
						<?php $image = $event["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["academic_events_dir"].$event["data"]["image"] : showSystemLogo();?>
						<center>
							<a href="<?php echo $image; ?>" data-rel="prettyPhoto"><img src="<?php echo $image; ?>" data-retina="<?php echo $image; ?>" alt="<?php echo $event["data"]["title"]; ?>" /></a>
						</center>
                    </div>
					<p class="description"><?php echo $event["data"]["description"]; ?></p>
                </article>
            </div>
			
            <?php require_once("views/home/home_sidebar_2.php");?>
		</div>
    </div>
<?php require_once("views/home/home_footer.php");?>   