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

<title>Update Voluntary Work</title>

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

<script>
function FileUploadValidation(event)
{
	// Checking file type
	var re_text = /\.jpg|\.gif|\.jpeg|\.png/i;
	var filename = document.getElementById("certificate").value;
	if (filename.search(re_text) == -1) {
		alert("Only JPG, JPEG, GIF and PNG pictures are allowed.");
		document.getElementById("certificate").value = "";
		return false;
	} else {
		document.getElementById("certificate_preview").src = URL.createObjectURL(event.target.files[0]);
		document.getElementById('picture_seminar').value = "";
	}
}

function TakePictureValidation(event)
{
	// Checking file type
	var re_text = /\.jpg|\.gif|\.jpeg|\.png/i;
	var filename = document.getElementById("picture_seminar").value;
	if (filename.search(re_text) == -1) {
		alert("Only JPG, JPEG, GIF and PNG pictures are allowed.");
		document.getElementById("picture_seminar").value = "";
		return false;
	} else {
		document.getElementById("certificate_preview").src = URL.createObjectURL(event.target.files[0]);
		document.getElementById('certificate').value = "";
	}
}
</script>

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

	if(isset($_GET['mode'])) {

		if($_GET['mode']==1) {

			

		} else {

			include("Gwe.php");

		}

	} 

?>

<h2 class=underlined-header>Training Program Details</h2>

<ul class=tags-floated-list>

<li>

<a href="index.php?r=faculty/crtp&tpID=<?php echo $_GET['tpID'];?>" style="margin-top:-50px; margin-left:538px;">Remove</a>

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

				<ul class=list-star>

				<li> Required Field</li>

				</ul>

			<hr style="margin-top:-8px;"/>

		';

	}

	include("tprogram.php");
?>

<form id="we" action="index.php?r=faculty/ProcessUpdateTP&tpID=<?php echo $_GET['tpID']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">

<p style="margin-bottom: 9px;">* TITLE / THEME / TOPIC:<input name=tp2 type=text style="width: 320px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $title; ?>'/></p>

<p style="margin-bottom: 9px;">* TYPE:

	<select name=tp3 style="width:320px; margin-top:-28px; margin-left:210px;">

		<option <?php if($type == 'Training') echo 'selected="selected"'; ?> value="Training">Training</option>
		
		<option <?php if($type == 'Seminar') echo 'selected="selected"'; ?> value="Seminar">Seminar/ Conference/ workshop/ convention etc.</option>
	
	</select>

</p>

<p style="margin-bottom: 9px;">* INCLUSIVE DATE FROM:

<select name=tp4 style="width:20%; margin-top:-28px; margin-left:210px;">

<?php

	$month = $fromm;

	$day = $fromd;

	$year = $fromy;

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

<select name=tp5 style="width:10%; margin-top:-37px; margin-left:338px;">

<?php 

	for($days=1;$days<=31;$days++) {

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

<select name=tp6 style="width:15%; margin-top:-37px; margin-left:405px;">

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

<p style="margin-bottom: 9px;">* INCLUSIVE DATE TO:

<select name=tp7 style="width:20%; margin-top:-28px; margin-left:210px;">

<?php

	$month = $tom;

	$day = $tod;

	$year = $toy;

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

<select name=tp8 style="width:10%; margin-top:-37px; margin-left:338px;">

<?php 

	for($days=1;$days<=31;$days++) {

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

<select name=tp9 style="width:15%; margin-top:-37px; margin-left:405px;">

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

</p><p style="margin-bottom: 9px; margin-top: 0px;">* NO. OF HOURS:<input name=tp10 type=number style="width: 100px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $hours; ?>'/></p>

<p style="margin-bottom: 9px;">* CONDUCTED/SPONSORED BY:<input name=tp11 type=text style="width: 320px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $conby; ?>'/></p>

<p style="margin-bottom: 9px;">* LEVEL:

	<select name=tp12 style="width:320px; margin-top:-28px; margin-left:210px;">
		
		<option <?php if($level == 'Local') echo 'selected="selected"'; ?> value="Local">Local</option>
		
		<option <?php if($level == 'Regional') echo 'selected="selected"'; ?> value="Regional">Regional</option>
		
		<option <?php if($level == 'National') echo 'selected="selected"'; ?> value="National">National</option>
		
		<option <?php if($level == 'International') echo 'selected="selected"'; ?> value="International">International</option>
	
	</select>

</p>

<p style="margin-bottom: 9px;">* VENUE:<input name=tp13 type=text style="width: 320px; margin-top: -28px; margin-left: 35%;"  value='<?php echo $venue; ?>'/></p>
<p style="margin-bottom: 9px;">
	<span>CERTIFICATE:</span><br />
	<img id="certificate_preview" alt="No Image Selected" src="<?php echo $path; ?>" width="250" height="180" />
</p>

<p style="margin-bottom: 9px;">
	<span>CHANGE CERTIFICATE:</span>
	<div id="take_picture">
		<label for="picture_seminar" class="btn">Take a Picture</label>
	</div>
	<input type="file" id="picture_seminar"  name="picture_seminar" accept="image/*" capture="camera" onchange="return TakePictureValidation(event);">
	<input style="width: 100%;" type="file" name="certificate" id="certificate" onchange="return FileUploadValidation(event);"/>
</p>

<p><center><input type=submit value='Save Changes'/>

<a href="index.php?r=faculty/TrainingPrograms"><input type="button" value='Cancel'/></a></center></p>

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

