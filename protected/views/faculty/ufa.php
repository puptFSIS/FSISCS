<?php
session_start(); /*
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("location:index.php?r=faculty/");
	}
} else {
	header("location:index.php?r=site/");
} */
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
<title>Update | Faculty Account</title>
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
<?php include("nav.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>
<h2 class=underlined-header>Update Faculty Account</h2>
<ul class="list-info">
	<li><i>All fields are required except "Name Extension".</i></li>
</ul>
<?php 
if (!isset($_GET['msg'])) {

} else {
$msg = $_GET['msg'];
	if($_GET['msgType']=="suc") {
		echo '<div class="box-success">';
		echo '<div class="box-content">';
		echo '<p>' . $msg . '</p>';
		echo '</div>';
		echo '</div>';
		echo '<br />';
	}
	else if($_GET['msgType']=="err") {
		echo '<div class="box-error">';
		echo '<div class="box-content">';
		echo '<p>' . $msg . '</p>';
		echo '</div>';
		echo '</div>';
		echo '<br />';
	}
}
?>
<?php
	$empID = $_GET['empID'];
	include("config.php");
	$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$empID'";
	$result=mysqli_query($conn, $sql);
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
?>
<form id=ufa action="index.php?r=faculty/processUpdateFA&OldEmpID=<?php echo $empID;?>" method=POST>
<p style="margin-bottom: 9px;">NEW EMPLOYEE NO.: <input id=NEWEmpID name=NEWEmpID type=text style="width: 72%; margin-top: -28px; margin-left: 28%;" value='<?php echo $row['EmpID']; ?>'/></p>
<p style="margin-bottom: 9px;">NEW SURNAME: <input id=NEWsname name=NEWsname  type=text style="width: 72%; margin-top: -28px; margin-left: 28%;" value='<?php echo $row['surname']; ?>'/></p>
<p style="margin-bottom: 9px;">NEW FIRST NAME: <input id=NEWfname name=NEWfname  type=text style="width: 72%; margin-top: -28px; margin-left: 28%;" value='<?php echo $row['firstname']; ?>'/></p>
<p style="margin-bottom: 9px;">NEW MIDDLE NAME: <input id=NEWmname name=NEWmname  type=text style="width: 72%; margin-top: -28px; margin-left: 28%;" value='<?php echo $row['middlename']; ?>'/></p>
<p style="margin-bottom: 9px;">NEW NAME EXT.: <input id=NEWnext  name=NEWnext  type=text style="width: 72%; margin-top: -28px; margin-left: 28%;" value='<?php echo $row['nameExtension']; ?>'/></p>
<p style="margin-bottom: 9px;">NEW PASSWORD: <input id=NEWpass  name=NEWpass  type=password style="width: 72%; margin-top: -28px; margin-left: 28%;" value=''/></p>
<p style="margin-bottom: 9px;">NEW RE-TYPE: <input id=NEWrepass  name=NEWrepass  type=password style="width: 72%; margin-top: -28px; margin-left: 28%;" value=''/></p>
<br />
<center><p>
<input type=submit value=Save />
<input type=reset value=Cancel />
</p></center></form>
</section>
<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Profile</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("profileMenu.php");?>
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
<a href='http://www.puptaguig.org' title=Home>Home</a>
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
