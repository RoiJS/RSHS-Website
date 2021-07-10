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
						Transparency Seal
					</span>
				</div>
				
				<?php $transparency_seal = execSQL("SELECT * FROM tbl_transparency_seal WHERE status = 1 ORDER BY date DESC","","","variable");?>
				<?php if(!empty($transparency_seal)){?>
					<article class="static-page" >
						<h1 id="main-title">Transparency Seal</h1>
						<div class="accordion">
							<?php foreach($transparency_seal as $ts):?>
								<h3 class="title-faq"><?php echo $ts["data"]["title"]; ?> - <b>(<?php echo date("M d, Y", strtotime($ts["data"]["date"])); ?>)</b></h3>
								<div class="content-faq">
									<?php $image = $ts["data"]["image"] != "" ? $GLOBALS["main_dir"].$GLOBALS["transparency_seal_dir"].$ts["data"]["image"] : showSystemLogo();?>
									<img src="<?php echo $image; ?>" style="max-height:120px;" alt="<?php echo $ts["data"]["title"];?>"  data-retina="<?php echo $image; ?>" class="alignleft imgframe" />
									<p class="description"><?php echo showModuleDescription($ts["data"]["description"], 200);?> <a href="?pg=home&vw=transparency_seal_details&dir=<?php echo sha1("transparency_seal"); ?>&<?php echo sha1("transparency_seal_id"); ?>=<?php echo $ts["data"]["transparency_seal_id"]; ?>">Read more&hellip;</a></p>
								</div>	
							<?php endforeach; ?>
					   </div>
					</article>
				<?php }else{?>
					<article class="static-page" >
						<h1 id="main-title">Empty Transparency Seal List</h1>
						<p >No transparency seal has been posted yet.</p>
					</article>
				<?php }?>
				<!-- Bids & Awards --->
            </div>
				
            <?php require_once("views/home/home_sidebar_1.php");?>
		</div>
    </div>
<?php require_once("views/home/home_footer.php");?>