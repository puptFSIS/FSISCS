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
<title>Faculty | Home</title>
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

<h2 class=underlined-header>New Community Service Extension</h2>
<ul class=tags-floated-list>
<li>
<a href="index.php?r=faculty/crcse&type=<?php echo $_GET['type'];?>&rating=<?php echo $_GET['rating'];?>&fm=<?php echo $_GET['fm'];?>&fd=<?php echo $_GET['fd'];?>&fy=<?php echo $_GET['fy'];?>&tm=<?php echo $_GET['tm'];?>&td=<?php echo $_GET['td'];?>&ty=<?php echo $_GET['ty'];?>" style="margin-top:-50px; margin-left:530px;">Remove</a>
</li>
</ul>
<?php
	if(isset($_GET['msg'])) {
		if($_GET['msgType']=="error") {
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
		$msg = $_GET['msg'];
			echo '
			<div class="box-info">
			  <div class="box-content">
				<p>' . $msg . '!</p>
			  </div>
			</div>
			<hr style="margin-top:13px;"/>
			';
		}
	} else {
		echo '
			<ul class=list-info>
			<li style="margin-top:-10px;">* Required Field</li>
			</ul>
			<hr style="margin-top:-8px;"/>
		';
	}
?>
<form id=ncse action="index.php?r=faculty/processUpdateCSE" method=POST>
<input type="hidden" name="type" value="<?php echo $_GET['type'];?>" />
<input type="hidden" name="rating" value="<?php echo $_GET['rating'];?>" />
<input type="hidden" name="fm" value="<?php echo $_GET['fm'];?>" />
<input type="hidden" name="fd" value="<?php echo $_GET['fd'];?>" />
<input type="hidden" name="fy" value="<?php echo $_GET['fy'];?>" />
<input type="hidden" name="tm" value="<?php echo $_GET['tm'];?>" />
<input type="hidden" name="td" value="<?php echo $_GET['td'];?>" />
<input type="hidden" name="ty" value="<?php echo $_GET['ty'];?>" />
<input type="hidden" name="pexam" value="<?php echo $_GET['pexam'];?>" />
<input type="hidden" name="lno" value="<?php echo $_GET['lno'];?>" />
<p style="margin-bottom: 9px;">* TYPE:
<select name="newtype" type=text style="width: 44%; margin-top: -28px; margin-left: 25%;">
<?php
	switch($_GET['type']) {
		case "Career Service": {
			echo '<option value="Career Service" selected="selected">Career Service</option>
			<option value="RA 1080">RA 1080</option>
			<option value="CES">CES</option>
			<option value="CSEE">CSEEE</option>
			';
			break;
		}
		case "RA 1080": {
			echo '<option value="Career Service">Career Service</option>
			<option value="RA 1080" selected="selected">RA 1080</option>
			<option value="CES">CES</option>
			<option value="CSEE">CSEEE</option>
			';
			break;
		}
		case "CES": {
			echo '<option value="Career Service">Career Service</option>
			<option value="RA 1080">RA 1080</option>
			<option value="CES" selected="selected">CES</option>
			<option value="CSEE">CSEEE</option>
			';
			break;
		}
		case "CSEE": {
			echo '<option value="Career Service">Career Service</option>
			<option value="RA 1080">RA 1080</option>
			<option value="CES">CES</option>
			<option value="CSEE" selected="selected">CSEEE</option>
			';
			break;
		}
		default: {
			echo '<option value="Career Service" selected="selected">Career Service</option>
			<option value="RA 1080">RA 1080</option>
			<option value="CES">CES</option>
			<option value="CSEE">CSEEE</option>
			';
			break;
		}
	}
?>
</select>
</p>

<p style="margin-bottom: 9px;">* RATING:
<input name="newrating" type="text" style="width: 15%; margin-top: -28px; margin-left: 25%;"  value='<?php echo $_GET['rating'];?>'/>
</p>

<p style="margin-bottom: 9px;">* DATE OF EXAM:
<select name="newfm" type=text style="width: 120px; margin-top: -28px; margin-left: 25%;">
<?php
	$fm = $_GET['fm'];
	switch($fm) {
		case 'January': echo'
		<option value="January" selected="selected">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'February': echo'
		<option value="January">January</option>
		<option value="February" selected="selected">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'March': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March" selected="selected">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'April': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April" selected="selected">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'May': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May" selected="selected">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'June': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June" selected="selected">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'July': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July" selected="selected">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'August': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August" selected="selected">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'September': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September" selected="selected">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'October': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October" selected="selected">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'November': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November" selected="selected">November</option>
		<option value="December">December</option>';
		break;
		case 'December': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December" selected="selected">December</option>';
		break;
		
		default: echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;

	}
?>
</select>
<select name="newfd" type=text style="width: 60px; margin-top: -37px; margin-left: 46%;">
<?php 
	$fd = $_GET['fd'];
	for($day=1;$day<=32;$day++) {
		if($day==$fd) {
		echo '
			<option selected="selected" value="' . $day . '">' . $day . '</option>
		';
		} else {
		echo '
			<option value="' . $day . '">' . $day . '</option>
		';
		}
	}
?>
</select>
<select name="newfy" type=text style="width: 75px; margin-top: -37px; margin-left: 57%;">
<?php 
	$fy=$_GET['fy'];
	for($year=1950;$year<=date("Y");$year++) {
		if($year==$fy) {
		echo '
			<option selected="selected" value="' . $year . '">' . $year . '</option>
		';
		} else {
		echo '
			<option value="' . $year . '">' . $year . '</option>
		';
		}
	}
?>
</select>
</p>

<p style="margin-bottom: 9px;">* PLACE OF EXAM:
<input name="newpexam" type=text style="width: 44.5%; margin-top: -28px; margin-left: 25%;"  value='<?php echo $_GET['pexam'];?>'/>
</p>

<p style="margin-bottom: 9px;"> LICENSE NO.:
<input name="newlno" type=text style="width: 44.5%; margin-top: -28px; margin-left: 25%;"  value='<?php echo $_GET['lno'];?>'/>
</p>

<p style="margin-bottom: 9px;"> LIC. DATE RELEASE :
<select name="newtm" type=text style="width: 120px; margin-top: -28px; margin-left: 25%;">
<?php
	$tm = $_GET['tm'];
	switch($tm) {
		case 'January': echo'
		<option value="January" selected="selected">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'February': echo'
		<option value="January">January</option>
		<option value="February" selected="selected">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'March': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March" selected="selected">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'April': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April" selected="selected">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'May': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May" selected="selected">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'June': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June" selected="selected">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'July': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July" selected="selected">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'August': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August" selected="selected">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'September': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September" selected="selected">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'October': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October" selected="selected">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;
		case 'November': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November" selected="selected">November</option>
		<option value="December">December</option>';
		break;
		case 'December': echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December" selected="selected">December</option>';
		break;
		
		default: echo'
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>';
		break;

	}
?>
</select>
<select name="newtd" type=text style="width: 60px; margin-top: -37px; margin-left: 46%;">
<?php 
	$td = $_GET['td'];
	for($day=1;$day<=32;$day++) {
		if($day==$td) {
		echo '
			<option selected="selected" value="' . $day . '">' . $day . '</option>
		';
		} else {
		echo '
			<option value="' . $day . '">' . $day . '</option>
		';
		}
	}
?>
</select>
<select name="newty" type=text style="width: 75px; margin-top: -37px; margin-left: 57%;">
<?php 
	$ty=$_GET['ty'];
	for($year=1950;$year<=date("Y");$year++) {
		if($year==$ty) {
		echo '
			<option selected="selected" value="' . $year . '">' . $year . '</option>
		';
		} else {
		echo '
			<option value="' . $year . '">' . $year . '</option>
		';
		}
	}
?>
</select>
</p>

<p><center><input type=submit value='Save Changes'/><a href="index.php?r=faculty/communitySE"> <input type=button value='Cancel'/></a></center></p>

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
