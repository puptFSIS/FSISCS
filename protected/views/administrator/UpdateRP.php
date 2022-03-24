<?php
session_start();
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {

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
<meta content='width=device-width, initial-scale=1.0' name=viewport />
<meta content='FSIS' name=keywords />
<meta content='PUP Taguig FSIS' name=description />
<meta content='vCore Team' name=author />
<!-- Page title -->
<title>administrator | Home</title>
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
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_referred WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	$title = $row['Title'];
	$journal = $row['Journal'];
	$editors = $row['Editors'];
	$volume = $row['Volume'];
	$level = $row['Level'];
	$authors = $row['Authors'];
?>
<h2 class=underlined-header>Update Refereed Publication</h2>
<ul class=tags-floated-list>
<li>
<a href="index.php?r=administrator/crrp&Title=<?php echo $title;?>&Journal=<?php echo $journal;?>&Editors=<?php echo $editors;?>&Volume=<?php echo $volume;?>&Level=<?php echo $level;?>&Authors=<?php echo $authors;?>" style="margin-top:-50px; margin-left:530px;">Remove</a>
</li>
</ul>
<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		echo '
		<div class="box-error">
		  <div class="box-content">
			<p>' . $msg . '!</p>
		  </div>
		</div>
		<hr style="margin-top:13px;"/>
		';
	} else {
		echo '
			<ul class=list-info>
			<li style="margin-top:-10px;">* Required Field</li>
			</ul>
			<hr style="margin-top:-8px;"/>
		';
	}
?>

<form id=newproorg action="index.php?r=administrator/processUpdateRP&Title=<?php echo $title;?>&Journal=<?php echo $journal;?>&Editors=<?php echo $editors;?>&Volume=<?php echo $volume;?>&Level=<?php echo $level;?>&Authors=<?php echo $authors;?>" method=POST>
<p style="margin-bottom: 9px;">* TITLE:<input name=rp1 type=text style="width: 420px; margin-top: -28px; margin-left: 20%;" placeholder='Book Title' value="<?php echo $title;?>"/></p>
<p style="margin-bottom: 9px;">* JOURNAL:<input name=rp2 type=text style="width: 420px; margin-top: -28px; margin-left: 20%;" placeholder='Journal' value="<?php echo $journal;?>"/></p>
<p style="margin-bottom: 9px;">* EDITORS:<input name=rp3 type=text style="width: 420px; margin-top: -28px; margin-left: 20%;" placeholder='Editors' value="<?php echo $editors;?>"/></p>
<p style="margin-bottom: 9px;">* VOLUME:<input name=rp4 type=text style="width: 420px; margin-top: -28px; margin-left: 20%;" placeholder='Volume' value="<?php echo $volume;?>"/></p>
<p style="margin-bottom: 9px;">* LEVEL:<input name=rp5 type=text style="width: 420px; margin-top: -28px; margin-left: 20%;" placeholder='Level of Publication' value="<?php echo $level;?>"/></p>
<p style="margin-bottom: 9px;">* AUTHORS:<input name=rp6 type=text style="width: 420px; margin-top: -28px; margin-left: 20%;" placeholder='Authors' value="<?php echo $authors;?>"/></p>


<p><center><input type=submit value='Save Changes'/>
<a href="index.php?r=administrator/refereedPublications"><input type=button value='Cancel'/></a></center></p>
</form>
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

<img alt='Asset 4' data-color='#D64333' src='assets/backgrounds/4.jpg.pagespeed.ce.AV4Gchw-qN.jpg' width=1600 height=1064 />

</div>
<!-- End - Theme backgrounds -->
<link href='scripts/libs/switcher/switcher.css' rel=stylesheet />

<!-- Scripts -->
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>
