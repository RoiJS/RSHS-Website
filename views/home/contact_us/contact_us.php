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
						Contact Us
					</span>
				</div>
				<article class="static-page" >
					<h1 id="main-title">Contact RSHS</h1>
					<p class="description">The Regional Science High School has a lot more. You may visit or contact us with the given contact no. and location below.</p>
					<ul id="nav-sidebar" class="clearfix" style="width:50%; float:left;">
						<li>
							<a class="clearfix">
							<figure><img src="images/icon-sidebar-1.png" alt="Contact Us" /></figure>
							<strong class="title-nav-sidebar">Contact Us Now</strong>
							<strong>Tel:</strong> <?php echo $rshs["data"]["contactNo"]; ?><br>
							<strong>Email Address:</strong> <?php echo $rshs["data"]["emailAddress"]; ?>
							</a></li>
					</ul>
					<ul id="nav-sidebar" class="clearfix" >
						<li><a  class="clearfix">
							<figure><img src="images/icon-sidebar-2.png" alt="Location" /></figure>
							<strong class="title-nav-sidebar">Location</strong>
							<strong>Address:</strong> <?php echo $rshs["data"]["address"];?>
							</a></li>
					</ul>
					
					<h2>Contact Form</h2>
                    <form  onsubmit="contactUsController.sendMessage(this); return false;" id="form-contact" class="clearfix">
                        <div>
                            <label for="text-name">Name <span>*</span></label>
                            <input type="text" name="txt_name" class="input" id="text-name" placeholder="Enter sender fullname&hellip;"  required /><br />
                            <label for="text-email">Email</label>
                            <input type="email" name="txt_email" class="input" id="text-email" placeholder="Enter sender valid email addres&hellip;" required /><br />
                            <label for="text-comment">Message <span>*</span></label>
                            <textarea cols="10" rows="20" class="input textarea" id="text-comment" placeholder="Enter message&hellip;" name="txt_message" required ></textarea><br />
                            <input type="submit" name="submitcontact" class="button" value="Sent Message" />
                        </div>
                    </form>
				</article>
		   </div>
            <?php require_once("views/home/home_sidebar_1.php");?>
		</div>
    </div>
<script src="app/controllers/home/contact_us/contactUsController.js"></script>
<?php require_once("views/home/home_footer.php");?>