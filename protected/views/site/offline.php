<?php
session_start();
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {

	}
} else {

}
?>
<!DOCTYPE html>
<!--[if IE 7 ]> <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <!--> <html class=no-js lang=en> <!-- <![endif]-->
<head>

<!--[if IE ]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <![endif]-->
<meta content='width=device-width, initial-scale=1.0' name=viewport />
<meta content='FSIS' name=keywords />
<meta content='PUP Taguig FSIS' name=description />
<meta content='vCore Team' name=author />
<!-- Page title -->
<title>FSIS | Offline</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}</style>

<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body class='page-media page-sidebar-right'>
<!-- JS notice - will be displayed if javascript is disabled -->
<p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
<!-- End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

<!-- End - Page header -->

<!-- Page subheader -->

<!-- End - Page subheader -->
<!-- Page body -->
<section class=container-block id=page-body>
<div class=container-inner>
<!-- Page title -->
<header class=container-aligner id=page-title>
<!-- Title and summary -->

<!-- End - Title and summary -->
<!-- Title right side -->
<hgroup id=title-summary>
<h2>Under Maintenance</h2>
<h4>System is currently Offline</h4>
</hgroup>
<section class='title-right portfolio-filter'>
<a data-category=design href='http://www.puptaguig.net'>Home</a>
<a data-category=design href="index.php?r=administrator/logout">Log out</a>
</section>
<!-- End - Title right side -->
</header>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		echo '
		<div class="box-info">
		  <div class="box-content">
			<p>' . $msg . '</p>
		  </div>
		</div>
		<br />
		';
	} else {
	
	}
?>
<section>
<section class=featured-news>
<a class='featured-news-image element-holder'>
<img alt='Image example' src='./assets/post-4.jpg.pagespeed.ce.Vzw2EN5YFQ.jpg' width=600 height=230 />
<div class=featured-news-text>
<h3>Faculty and Staff Information System is Offline</h3>
<p>Sorry for the inconvenience. The system is under maintenance, we will resume our services on June 16, 2012 - Saturday. Let us know what you would like to see in Faculty and Staff Information System by contacting us. Thank you.</p>
</div>
</a>
</section>
<!-- Toggle block -->
<div class=toggle-block>
<!-- Toggle trigger -->
<div class=toggle-trigger><a href="#">Message Us</a></div>
<!-- End - Toggle trigger -->
<!-- Toggle content -->
<div class=toggle-content>
<section>
<h2 class=underlined-header>Have a question?</h2>
<form action="index.php?r=site/sendmail" id=message method=post>
<p>
<label for=cf_name>Name *</label>
<input id=cf_name name=cf_name placeholder='Enter your name...' required=required title=Name type=text />
</p>
<p>
<label for=cf_email>Email *</label>
<input id=cf_email name=cf_email placeholder='Email address...' required=required title='Email address' type=email />
</p>
<p>
<label for=cf_subject>Subject *</label>
<input id=cf_subject name=cf_subject placeholder='Specify subject...' required=required title=Subject type=text />
</p>
<p>
<label for=cf_message>Message *</label>
<textarea id=cf_message name=cf_message placeholder='Message text...' required=required rows=10 title='Message text'></textarea>
</p>
<p>
<input type=submit value='Send message'/>
</p>
</form>
</section>
</div>
<!-- End - toggle content -->
</div>
<!-- End - Toggle block -->

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-contacts-info'>
<h2 class=widget-heading>Contact Us</h2>
<div class=widget-content>
<ul class='widget-list contacts-list'>
<li class=address>
18 C. Apple St. Lower Bicutan Taguig City
<span class=widget-hint>Address</span>
</li>
<br />
<li class=phone>
<span>Phone:</span>
+63 908 507 6761
<span class=widget-hint>Phone</span>
</li>
<br />
<li class=email>
<span>Email:</span>

raffy.cortez21@gmail.com

<span class=widget-hint>Email</span>
</li>
</ul>
</div>
</section>
</aside>
<!-- End - Page sidebar -->
</div>
</section>
<!-- End - Page body content -->
</div>
</section>
<!-- End - Page body -->

<!-- Page footer -->
<footer id=page-footer>
<div class=container-aligner>
<!-- Footer left -->
<section id=footer-left>
© Copyright 2011 <a href="#" title="Dbooom Themes">vCore Team | PUP Taguig</a> - All Rights Reserved.
</section>
<!-- End - Footer left -->
<!-- Footer right -->
<section id=footer-right>
<ul class=footer-navigation>
<li>
<a href='http://www.puptaguig.net' title=Home>Home</a>
</li>
<li>
<a href='index.php?r=site/about' title=About>About</a>
</li>
<li>
<a href='index.php?r=site/contact' title=Contacts>Contacts</a>
</li>
</ul>
</section>
<!-- End - Footer right -->
</div>
</footer>
<!-- End - Page footer -->
<!-- Theme backgrounds -->
<div id=theme-backgrounds>

<img alt='Asset 4' data-color='#D64333' src='assets/backgrounds/4.jpg.pagespeed.ce.AV4Gchw-qN.jpg' width=1600 height=1064 />

</div>
<!-- End - Theme backgrounds -->
<link href='scripts/libs/switcher/switcher.css' rel=stylesheet />

<!-- Scripts -->
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>
