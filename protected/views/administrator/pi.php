<?php 
session_start(); /*
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {
		
	} else if($_SESSION['user']==0) {
		
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
<title>Profile | Personal Information</title>
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

<h2 class=underlined-header>Personal Information</h2>
<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		if(isset($_GET['msgType'])) {
			if($_GET['msgType']=="err") {
				echo '
				<div class="box-error">
				  <div class="box-content">
					<p>' . $msg . '!</p>
				  </div>
				</div>
				<br />
				<hr style="margin-top:-5px;"/>
				';
			} else {
				echo '
				<div class="box-info">
				  <div class="box-content">
					<p>' . $msg . '!</p>
				  </div>
				</div>
				<br />
				<hr style="margin-top:-5px;"/>
				';
			}
		}
	} else {
	
	}
?>

<?php include("Gpi.php");?>
<p style="margin-bottom: 9px;">EMPLOYEE NO.:<input id=dummy0 name=dummy0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $agencyempno;?>'/></p>
<p style="margin-bottom: 9px;">SURNAME: <input id=dummy0 name=dummy0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $surname;?>'/></p>
<p style="margin-bottom: 9px;">FIRST NAME: <input id=dummy0 name=dummy0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $firstname;?>'/></p>
<p style="margin-bottom: 9px;">MIDDLE NAME: <input id=dummy0 name=dummy0 type=text style="width: 22%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $middlename;?>'/><p style="margin-top: -34px; margin-left:280px;" >NAME EXTENSION: <input id=dummy0 name=dummy0 type=text placeholder="n/a" style="width: 30%; margin-top: -30px; margin-left: 36%;" disabled="disabled" value='<?php echo $nameextension;?>'/></p></p>
<div class="underlined-header"></div>
<!-- End - Post item -->
<p style="margin-bottom: 9px;">DATE OF BIRTH (mm/dd/yy): 
<select id=dummy5 name=dummy5 style="width:20%; margin-top:-30px; margin-left:175px;" disabled="disabled">
<option><?php echo $month;?></option>
</select>
<select id=dummy5 name=dummy5 style="width:10%; margin-top:-37px; margin-left:303px;" disabled="disabled">
<option><?php echo $day;?></option>
</select>
<select id=dummy5 name=dummy5 style="width:15%; margin-top:-37px; margin-left:370px;" disabled="disabled">
<option><?php echo $year;?></option>
</select>
</p>
<p style="margin-bottom: 9px;">BIRTH PLACE:<input id=dummy0 name=dummy0 type=text style="width: 370px; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $birthplace;?>'/></p>
<p style="margin-bottom: 9px;">GENDER:<input id=dummy0 name=dummy0 type=text style="width: 15%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $gender;?>' value="Female"/></p>
<p style="margin-bottom: 9px; margin-top:-36px; margin-left:240px;">CIVIL STATUS:<input id=dummy0 name=dummy0 type=text style="width: 156px; margin-top: -28px; margin-left: 26%;" disabled="disabled" value='<?php echo $civilstatus;?>'/></p>
<p style="margin-bottom: 9px;">CITIZENSHIP:<input id=dummy0 name=dummy0 type=text style="width: 370px; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $citizenship;?>'/></p>
<p style="margin-bottom: 9px;">HEIGHT:<input id=dummy0 name=dummy0 type=text placeholder="meters" style="width: 80px; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $height;?>'/></p>
<p style="margin-bottom: 9px; margin-top:-36px; margin-left:210px;">WEIGHT:<input id=dummy0 name=dummy0 type=text placeholder="kg" style="width: 80px;; margin-top: -28px; margin-left: 18%;" disabled="disabled" value='<?php echo $weight;?>'/></p>
<p style="margin-bottom: 9px; margin-top:-36px; margin-left:370px;">BLOOD TYPE:<input id=dummy0 name=dummy0 type=text style="width: 40px;; margin-top: -28px; margin-left: 35%;" disabled="disabled" value='<?php echo $bloodtype;?>'/></p>
<div class="underlined-header"></div>
<p style="margin-bottom: 9px;">GSIS ID NO.:<input id=dummy0 name=dummy0 type=text style="width: 140px; margin-top: -28px; margin-left: 20%;" disabled="disabled" placeholder="00-0000000-0" value='<?php echo $gsis;?>'/></p>
<p style="margin-bottom: 9px; margin-top:-36px;margin-left:270px;">PAG-IBIG NO.:<input id=dummy0 name=dummy0 type=text style="width: 140px; margin-top: -28px; margin-left: 25%;" disabled="disabled" placeholder="0000-0000-0000" value='<?php echo $pagibig;?>'/></p>
<p style="margin-bottom: 9px;">PHILHEALTH:<input id=dummy0 name=dummy0 type=text style="width: 140px; margin-top: -28px; margin-left: 20%;" disabled="disabled" placeholder="00-000000000-0" value='<?php echo $philhealth;?>'/></p>
<p style="margin-bottom: 9px; margin-top:-36px;margin-left:270px;">SSS NO.:<input id=dummy0 name=dummy0 type=text style="width: 140px; margin-top: -28px; margin-left: 25%;" disabled="disabled" placeholder="00-0000000-0" value='<?php echo $sss;?>'/></p>
<div class="underlined-header"></div>
<div class="underlined-header"><center><strong>Residential Address</strong></center></div>
<p style="margin-bottom: 9px;">ADDRESS:<textarea id=dummy0 name=dummy0 style="width: 370px; margin-top: -28px; margin-left: 20%;" disabled="disabled"><?php echo $residentialAdd;?></textarea></p>
<p style="margin-bottom: 9px;">ZIP CODE:<input id=dummy0 name=dummy0 style="width: 100px; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $residentialZip;?>'></input></p>
<p style="margin-bottom: 9px; margin-top:-36px; margin-left:230px;">TELEPHONE NO.:<input id=dummy0 name=dummy0 style="width: 159px; margin-top: -28px; margin-left: 27.5%;" disabled="disabled" value='<?php echo $residentialTel;?>'></input></p>

<div class="underlined-header"></div>
<div class="underlined-header"><center><strong>Permanent Address</strong></center></div>
<p style="margin-bottom: 9px;">ADDRESS:<textarea id=dummy0 name=dummy0 style="width: 370px; margin-top: -28px; margin-left: 20%;" disabled="disabled"><?php echo $permanentAdd;?></textarea></p>
<p style="margin-bottom: 9px;">ZIP CODE:<input id=dummy0 name=dummy0 style="width: 100px; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $permanentZip;?>'></input></p>
<p style="margin-bottom: 9px; margin-top:-36px; margin-left:230px;">TELEPHONE NO.:<input id=dummy0 name=dummy0 style="width: 159px; margin-top: -28px; margin-left: 27.5%;" disabled="disabled" value='<?php echo $permanentTel;?>'></input></p>

<div class="underlined-header"></div>
<div class="underlined-header"><center><strong>Contact Information</strong></center></div>
<p style="margin-bottom: 9px;">E-MAIL ADDRESS:<input id=dummy0 name=dummy0 type=text style="width: 303px; margin-top: -28px; margin-left: 31%;" disabled="disabled" value='<?php echo $email;?>'/></p>
<p style="margin-bottom: 9px;">MOBILE NO.:<input id=dummy0 name=dummy0 type=text style="width: 303px; margin-top: -28px; margin-left: 31%;" disabled="disabled" value='<?php echo $cel;?>'/></p>
<p style="margin-bottom: 9px;">TIN:<input id=dummy0 name=dummy0 type=text style="width: 303px; margin-top: -28px; margin-left: 31%;" disabled="disabled" value='<?php echo $tin;?>'/></p>


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
