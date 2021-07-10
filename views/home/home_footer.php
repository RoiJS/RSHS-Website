<?php $image = $rshs["data"]["footerBackground"] != "" ? $GLOBALS["main_dir"].$GLOBALS["home_backgrounds_dir"].$rshs["data"]["footerBackground"] : $GLOBALS["main_dir"].$GLOBALS["logo_dir"].$rshs["data"]["image"];?>
 <footer id="main-footer" style="background:url(<?php echo $image; ?>) no-repeat 50% 0; ">
	<div id="blur-top">
		<a href="#" id="link-back-top">Back to Top</a>
	</div>
	<div id="slogan-footer">
		<h4>Leading Together <span>for</span> Brighter Future</h4>
	</div>
	<div id="footer-copyright">
		<div id="footer-copyright-content" class="clearfix">
			<?php $image = $GLOBALS["main_dir"].$GLOBALS["logo_dir"].$rshs["data"]["image"];?>
			<a href="/rshs" id="logo-footer"><img src="<?php echo $image; ?>" style="max-height:60px;" data-retina="<?php echo $image; ?>" alt="Regional Science High School" /></a>
			<p id="text-address"><?php echo $rshs["data"]["address"];?></p>
			<p id="text-copyright">Copyright &copy; <?php echo date("Y");?>. All rights reserved</p>
		</div>
	</div>
</footer>