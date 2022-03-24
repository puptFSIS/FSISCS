<?php
session_start(); /*
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("location:index.php?r=profile/");
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
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

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
</head>
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

<form id='pi' action='index.php?r=faculty/processUpdatePI' method=POST>
<h2 class=underlined-header>Personal Information Update</h2>

<?php include("Gpi.php");?>
<p style="margin-bottom: 9px;">EMPLOYEE NO.:<input name=agencyempno type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" value='<?php echo $agencyempno;?>'/></p>
<p style="margin-bottom: 9px;">SURNAME: <input name=surname type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" value='<?php echo $surname;?>'/></p>
<p style="margin-bottom: 9px;">FIRST NAME: <input name=firstname type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" value='<?php echo $firstname;?>'/></p>
<p style="margin-bottom: 9px;">MIDDLE NAME: <input name=middlename type=text style="width: 22%; margin-top: -28px; margin-left: 20%;" value='<?php echo $middlename;?>'/><p style="margin-top: -34px; margin-left:280px;" >NAME EXTENSION: <input name=nameextension type=text style="width: 30%; margin-top: -30px; margin-left: 36%;" value='<?php echo $nameextension;?>'/></p></p>
<div class="underlined-header"></div>
<!-- End - Post item -->
<p style="margin-bottom: 9px;">DATE OF BIRTH (mm/dd/yy): 
<select name=bmonth style="width:20%; margin-top:-30px; margin-left:175px;">
<?php
	switch($month) {
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
<select name=bday style="width:10%; margin-top:-37px; margin-left:303px;">
<?php 
	for($days=1;$days<=32;$days++) {
		if($days==$day) {
			echo '
			<option value="' . $days . '" selected="selected">' . $days . '</option>
			';
		} else {
			echo '
			<option value="' . $days . '">' . $days . '</option>
			';
		}
	}
?>
</select>
<select name=byear style="width:15%; margin-top:-37px; margin-left:370px;">
<?php 
	for($years=1950;$years<=date("Y");$years++) {
		if($years==$year) {
			echo '
			<option value="' . $years . '" selected="selected">' . $years . '</option>
			';
		} else {
			echo '
			<option value="' . $years . '">' . $years . '</option>
			';
		}
	}
?>
</select>
</p>
<p style="margin-bottom: 9px;">BIRTH PLACE:<input name=birthplace type=text style="width: 370px; margin-top: -28px; margin-left: 20%;" value='<?php echo $birthplace;?>'/></p>
<p style="margin-bottom: 9px;">GENDER:
	<select name=gender type=text style="width: 15%; margin-top: -28px; margin-left: 20%;" value='<?php echo $gender;?>' value="Female">
		<option <?php if($gender == 'Male') echo 'selected="selected"'; ?> value='Male'>Male</option>
		<option <?php if($gender == 'Female') echo 'selected="selected"'; ?> value='Female'>Female</option>
	</select>
</p>
<p style="margin-bottom: 9px; margin-top:-36px; margin-left:240px;">CIVIL STATUS:
<select name=cs style="width: 156px; margin-top: -28px; margin-left: 26%;">
<?php
	switch($civilstatus) {
	case '':
		echo '
		<option value="Single" selected="selected">Single</option>
		<option value="Married">Married</option>
		<option value="Separated">Separated</option>
		<option value="Widowed">Widowed</option>
		<option value="Anulled">Anulled</option>
		';
		break;
	case 'Single':
		echo '
		<option value="Single" selected="selected">Single</option>
		<option value="Married">Married</option>
		<option value="Separated">Separated</option>
		<option value="Widowed">Widowed</option>
		<option value="Anulled">Anulled</option>
		';
		break;
	case 'Married':
		echo '
		<option value="Single">Single</option>
		<option value="Married" selected="selected"">Married</option>
		<option value="Separated">Separated</option>
		<option value="Widowed">Widowed</option>
		<option value="Anulled">Anulled</option>
		';
		break;
	case 'Separated':
		echo '
		<option value="Single">Single</option>
		<option value="Married">Married</option>
		<option value="Separated" selected="selected">Separated</option>
		<option value="Widowed">Widowed</option>
		<option value="Anulled">Anulled</option>
		';
		break;
	case 'Widowed':
		echo '
		<option value="Single">Single</option>
		<option value="Married">Married</option>
		<option value="Separated">Separated</option>
		<option value="Widowed" selected="selected">Widowed</option>
		<option value="Anulled">Anulled</option>
		';
		break;
	case 'Anulled':
		echo '
		<option value="Single">Single</option>
		<option value="Married">Married</option>
		<option value="Separated">Separated</option>
		<option value="Widowed">Widowed</option>
		<option value="Anulled" selected="selected">Anulled</option>
		';
		break;
	default:
		break;
	}
?>

</select>
</p>
<p style="margin-bottom: 9px;">CITIZENSHIP:
<select name=citizenship style="width: 370px; margin-top: -28px; margin-left: 20%;">
<?php
	switch($citizenship){
	case 'Filipino': 
		echo '
		<option value="Filipino" selected="selected">Filipino</option>
		<option value="Chinese">Chinese</option>
		<option value="Japanese">Japanese</option>
		<option value="American">American</option>
		<option value="Indian">Indian</option>
		<option value="German">German</option>
		<option value="French">French</option>
		';
		break;
	case 'Chinese': 
		echo '
		<option value="Filipino">Filipino</option>
		<option value="Chinese" selected="selected">Chinese</option>
		<option value="Japanese">Japanese</option>
		<option value="American">American</option>
		<option value="Indian">Indian</option>
		<option value="German">German</option>
		<option value="French">French</option>
		';
		break;
	case 'Japanese': 
		echo '
		<option value="Filipino">Filipino</option>
		<option value="Chinese">Chinese</option>
		<option value="Japanese" selected="selected">Japanese</option>
		<option value="American">American</option>
		<option value="Indian">Indian</option>
		<option value="German">German</option>
		<option value="French">French</option>
		';
		break;
	case 'American': 
		echo '
		<option value="Filipino">Filipino</option>
		<option value="Chinese">Chinese</option>
		<option value="Japanese">Japanese</option>
		<option value="American" selected="selected">American</option>
		<option value="Indian">Indian</option>
		<option value="German">German</option>
		<option value="French">French</option>
		';
		break;
	case 'Indian': 
		echo '
		<option value="Filipino">Filipino</option>
		<option value="Chinese">Chinese</option>
		<option value="Japanese">Japanese</option>
		<option value="American">American</option>
		<option value="Indian" selected="selected>Indian</option>
		<option value="German">German</option>
		<option value="French">French</option>
		';
		break;
	case 'German': 
		echo '
		<option value="Filipino">Filipino</option>
		<option value="Chinese">Chinese</option>
		<option value="Japanese">Japanese</option>
		<option value="American">American</option>
		<option value="Indian">Indian</option>
		<option value="German" selected="selected">German</option>
		<option value="French">French</option>
		';
		break;
	case 'French': 
		echo '
		<option value="Filipino">Filipino</option>
		<option value="Chinese">Chinese</option>
		<option value="Japanese">Japanese</option>
		<option value="American">American</option>
		<option value="Indian">Indian</option>
		<option value="German">German</option>
		<option value="French" selected="selected">French</option>
		';
		break;
	default:
		echo '
		<option value="Filipino">Filipino</option>
		<option value="Chinese">Chinese</option>
		<option value="Japanese">Japanese</option>
		<option value="American">American</option>
		<option value="Indian">Indian</option>
		<option value="German">German</option>
		<option value="French">French</option>
		<option value="Other" selected="selected">Other</option>
		';
		break;
	}
?>
</select></p>
<p style="margin-bottom: 9px;">HEIGHT:<input name=height type=text style="width: 80px; margin-top: -28px; margin-left: 20%;" placeholder="meters" value='<?php echo $height;?>'/></p>
<p style="margin-bottom: 9px; margin-top:-36px; margin-left:210px;">WEIGHT:<input name=weight type=text style="width: 80px;; margin-top: -28px; margin-left: 18%;" placeholder="kg" value='<?php echo $weight;?>'/></p>
<p style="margin-bottom: 9px; margin-top:-36px; margin-left:370px;">BLOOD TYPE:<input name=bloodtype type=text style="width: 40px;; margin-top: -28px; margin-left: 35%;" value='<?php echo $bloodtype;?>'/></p>
<div class="underlined-header"></div>
<p style="margin-bottom: 9px;">GSIS ID NO.:<input name=gsis type=text style="width: 140px; margin-top: -28px; margin-left: 20%;" placeholder="00-0000000-0" value='<?php echo $gsis;?>'/></p>
<p style="margin-bottom: 9px; margin-top:-36px;margin-left:270px;">PAG-IBIG NO.:<input name=pagibig type=text style="width: 140px; margin-top: -28px; margin-left: 25%;" placeholder="0000-0000-0000" value='<?php echo $pagibig;?>'/></p>
<p style="margin-bottom: 9px;">PHILHEALTH:<input name=philhealth type=text style="width: 140px; margin-top: -28px; margin-left: 20%;" placeholder="00-000000000-0" value='<?php echo $philhealth;?>'/></p>
<p style="margin-bottom: 9px; margin-top:-36px;margin-left:270px;">SSS NO.:<input name=sss type=text style="width: 140px; margin-top: -28px; margin-left: 25%;" placeholder="00-0000000-0" value='<?php echo $sss;?>'/></p>
<div class="underlined-header"></div>
<div class="underlined-header"><center><strong>Residential Address</strong></center></div>
<p style="margin-bottom: 9px;">ADDRESS:<textarea name=residentialAddress style="width: 370px; margin-top: -28px; margin-left: 20%;" ><?php echo $residentialAdd;?></textarea></p>
<p style="margin-bottom: 9px;">ZIP CODE:<input name=zipCode style="width: 100px; margin-top: -28px; margin-left: 20%;" value='<?php echo $residentialZip;?>'></input></p>
<p style="margin-bottom: 9px; margin-top:-36px; margin-left:230px;">TELEPHONE NO.:<input name=telNo style="width: 159px; margin-top: -28px; margin-left: 27.5%;" value='<?php echo $residentialTel;?>'></input></p>

<div class="underlined-header"></div>
<div class="underlined-header"><center><strong>Permanent Address</strong></center></div>
<p style="margin-bottom: 9px;">ADDRESS:<textarea name=permanentAddress style="width: 370px; margin-top: -28px; margin-left: 20%;" ><?php echo $permanentAdd;?></textarea></p>
<p style="margin-bottom: 9px;">ZIP CODE:<input name=pzipCode style="width: 100px; margin-top: -28px; margin-left: 20%;" value='<?php echo $permanentZip;?>'></input></p>
<p style="margin-bottom: 9px; margin-top:-36px; margin-left:230px;">TELEPHONE NO.:<input name=ptelNo style="width: 159px; margin-top: -28px; margin-left: 27.5%;" value='<?php echo $permanentTel;?>'></input></p>

<div class="underlined-header"></div>
<div class="underlined-header"><center><strong>Contact Information</strong></center></div>
<p style="margin-bottom: 9px;">E-MAIL ADDRESS (IF ANY):<input name=email type=text style="width: 303px; margin-top: -28px; margin-left: 31%;" value='<?php echo $email;?>'/></p>
<p style="margin-bottom: 9px;">MOBILE NO. (IF ANY:<input name=cellNo type=text style="width: 303px; margin-top: -28px; margin-left: 31%;" value='<?php echo $cel;?>'/></p>
<p style="margin-bottom: 9px;">TIN:<input name=TIN_NO type=text style="width: 303px; margin-top: -28px; margin-left: 31%;" value='<?php echo $tin;?>'/></p>
<hr />
<p><center>
<input type=submit value='Save Changes' /></center>
</p>
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
