<?php
session_start();
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("location:index.php?r=faculty/");
	}
} else {
	header("location:index.php?r=site/");
}
?>
<!DOCTYPE html>
<!--[if IE 7 ]> <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> <!--> <html class=no-js lang=en> <!-- <![endif]-->
<head>

<!--[if IE ]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <![endif]-->
<meta content='width=device-width, initial-scale=1.0' name=eviewport />
<meta content='FSIS' name=ekeywords />
<meta content='PUP Taguig FSIS' name=edescription />
<meta content='vCore Team' name=eauthor />
<!-- Page title -->
<title>Profile | Educational Background</title>
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
<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		if(isset($_GET['msgType'])) {
			$msgType = $_GET['msgType'];
			if($msgType=='succ') {
			echo '
				<div class="box-success">
				  <div class="box-content">
					<p>' . $msg . '!</p>
				  </div>
				</div>
				<br />
				';
			} else {
				echo'
				<div class="box-error">
				  <div class="box-content">
					<p>' . $msg . '!</p>
				  </div>
				</div>
				<br />
				';
			}
		}
	} else {
	
	}
?>
<?php 
	$sname = $_GET['sname'];
	include("Geb.php");
?>
<h2 class=underlined-header>Educational Background | Update <?php echo $_GET['level'];?> Level</h2>
<ul class=tags-floated-list>
<li>
<a href="index.php?r=administrator/creb&sname=<?php echo $_GET['sname'];?>&level=<?php echo $_GET['level'];?>" style="margin-top:-50px; margin-left:537px;">Remove</a>
</li>
</ul>

<form id=ebel action="index.php?r=administrator/processUpdateEB&level=<?php echo $_GET['level'];?>&sname=<?php echo $_GET['sname'];?>" method=POST>
<p style="margin-bottom: 9px;">NAME OF SCHOOL:<textarea name=el1 style="width: 320px; margin-top: -28px; margin-left: 35%;" placeholder='School Name' ><?php echo $_GET['sname'];?></textarea></p>
<p style="margin-bottom: 9px;">DEGREE COURSE:<input name=el2 type=text style="width: 320px; margin-top: -28px; margin-left: 35%;"  placeholder='Degree Course' value='<?php echo $d2;?>'/></p>
<p style="margin-bottom: 9px;">*YEAR GRADUATED:
<select name=el3 type=text style="width: 90px; margin-top: -28px; margin-left: 35%;"  />
<?php
	for($years=1955; $years<=date("Y"); $years++) {
		if($d3==$years) {
			echo '
			<option value=' . $years . ' selected=selected> '. $years . '</option>
			';
		} else {
			echo '
			<option value="' . $years . '">'. $years . '</option>
			';
		}
	}
		if($d3=='Not Yet') {
			echo '
			<option value="Not Yet" selected=selected>Not Yet</option>
			';
		} else {
			echo '
			<option value="Not Yet">Not Yet</option>
			';
		}
?>
</select></p>
<p style="margin-top: -37px; margin-left:53%;">**UNITS EARNED:<input name=el4 type=text style="width: 100px; margin-top: -28px; margin-left: 40%;" placeholder='Total Units' value='<?php echo $d4;?>'/></p>
<p style="margin-bottom: 9px;">INCLUSIVE DATE OF ATTENDANCE (FROM-TO):
<select name=el5 type=text style="width: 90px; margin-top: -28px; margin-left: 50%;" >
<?php
	for($years=1955; $years<=date("Y"); $years++) {
		if($d5==$years) {
			echo '
			<option value=' . $years . ' selected=selected> '. $years . '</option>
			';
		} else {
			echo '
			<option value="' . $years . '">'. $years . '</option>
			';
		}
	} 
?>
</select>
<select name=el6 type=text style="width: 90px; margin-top: -37px; margin-left: 67%;" >
<?php
	for($years=1955; $years<=date("Y"); $years++) {
		if($d6==$years) {
			echo '
			<option value=' . $years . ' selected=selected> '. $years . '</option>
			';
		} else {
			echo '
			<option value="' . $years . '">'. $years . '</option>
			';
		}
	}
	if($d6=='Present') {
		echo '
		<option value="Present" selected=selected>Present</option>
		';
	} else {
		echo '
		<option value="Present">Present</option>
		';
	}
?>
</select></p>
<p style="margin-bottom: 9px;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED:
<input name=el7 type=text style="width: 230px; margin-top: -28px; margin-left: 50%;" placeholder='e.g. Valedictorian, Salutatorian, 1st ..' value='<?php echo $d7;?>'/></p>
<br /><center><input type=submit value=Save>
<a href="index.php?r=administrator/eb"><input type="button" value="Cancel"></a></center>
<hr style="margin-bottom:5px;"/>
</form>
<center><ul class=list>
<li style="margin-top:-10px;">(*) If graduated, (**) If not graduated</li>
</ul></center>
<hr style="margin-top:-8px;"/>
</section>
<!-- End - Video -HTML5 -->
<br/>

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

<img alt='Asset 4' data-color='#D64333' src='assets/backgrounds/4.jpg.pagespeed.ce.AV4Gchw-qN.jpg' width=1500 height=1064 />

</div>
<!-- End - Theme backgrounds -->
<link href='scripts/libs/switcher/switcher.css' rel=stylesheet />

<!-- Scripts -->
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>
