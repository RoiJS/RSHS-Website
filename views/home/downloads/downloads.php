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
						Downloads
					</span>
				</div>
			
				<!-- Bids & Awards --->
				<?php $dates = execSQL("SELECT DISTINCT dateUploaded FROM tbl_downloads ORDER BY dateUploaded DESC","","","variable");?>
				<?php if(!empty($dates)){?>
					<article class="static-page" >
						<h1 id="main-title">Downloads</h1>
						<div class="accordion">
							<?php foreach($dates as $date):?>
								<h3 class="title-faq"><b>(<?php echo date("M d, Y", strtotime($date["data"]["dateUploaded"])); ?>)</b></h3>
								<div class="content-faq">
									<?php $downloads = execSQL("SELECT * FROM tbl_downloads","WHERE dateUploaded = :dateUploaded ORDER BY filename ASC",[":dateUploaded" => $date["data"]["dateUploaded"]],"variable");?>
									<table style="width:100%;">
										<thead>
											<tr>
												<th scope="col">Filename</th>
												<th scope="col">Filesize</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($downloads as $index => $download){ ?>
											<tr class="<?php if($index % 2 == 0){echo "odd";}?>">
												<td > 	
													<?php $file = $GLOBALS["main_dir"].$GLOBALS["downloads_dir"].$download["data"]["file"]; ?>
													<b><a href="<?php echo $file;?>"><?php echo $download["data"]["filename"]; ?></a></b>
												</td>
												<td > 
													<b><?php echo number_format($download["data"]["filesize"]/ 1000000,2,".",",")." MB"; ?></b>
												</td>
											</tr>
											<?php }?>		
										</tbody>
									</table>
								</div>	
							<?php endforeach; ?>
					   </div>
					</article>
				<?php }else{?>
					<article class="static-page" >
						<h1 id="main-title">Empty Downloads List</h1>
						<p >No download has been posted yet.</p>
					</article>
				<?php }?>
				<!-- Bids & Awards --->
            </div>
				
            <?php require_once("views/home/home_sidebar_2.php");?>
		</div>
    </div>
<?php require_once("views/home/home_footer.php");?>