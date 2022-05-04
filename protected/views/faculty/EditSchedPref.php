<?php
session_start();
include ("config.php");
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
		header("Location: index.php?r=faculty/");
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
<title>Schedule Preference</title>
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

<h2 class=underlined-header>Schedule Preference</h2>

<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		if($_GET['msgType']=="succ") {
			echo '
			<div class="box-info">
			  <div class="box-content">
				<p>' . $msg . '</p>
			  </div>
			</div>
			<hr style="margin-top:13px;"/>
			';
		} else {
			echo '
			<div class="box-error">
			  <div class="box-content">
				<p>' . $msg . '</p>
			  </div>
			</div>
			<hr style="margin-top:13px;"/>
			';
		}
	} 
?>
<?php
	function to12Hr($ctime) {
		$strTime = "";
							$dn = "";

							if (strlen($ctime) == 4) {
								$hour = substr($ctime, 0, 2);
								$min = substr($ctime, 2, 3);



								if ($hour > 12) {
									$dn = "PM";
									if ($hour == 13) {
										$hour = "01";
									} else if ($hour == 14) {
										$hour = "02";
									} else if ($hour == 15) {
										$hour = "03";
									} else if ($hour == 16) {
										$hour = "04";
									} else if ($hour == 17) {
										$hour = "05";
									} else if ($hour == 18) {
										$hour = "06";
									} else if ($hour == 19) {
										$hour = "07";
									} else if ($hour == 20) {
										$hour = "08";
									} else if ($hour == 21) {
										$hour = "09";
									} else if ($hour == 22) {
										$hour = "10";
									}
								} else {
									$dn = "AM";
								}

								$strTime = $hour.":".$min." ".$dn;
							 } else {
							 	$hour = substr($ctime, 0, 1);
								$min = substr($ctime, 1, 2);

								if ($hour > 12) {
									$dn = "PM";
									if ($hour == 13) {
										$hour = "01";
									} else if ($hour == 14) {
										$hour = "02";
									} else if ($hour == 15) {
										$hour = "03";
									} else if ($hour == 16) {
										$hour = "04";
									} else if ($hour == 17) {
										$hour = "05";
									} else if ($hour == 18) {
										$hour = "06";
									} else if ($hour == 19) {
										$hour = "07";
									} else if ($hour == 20) {
										$hour = "08";
									} else if ($hour == 21) {
										$hour = "09";
									} else if ($hour == 22) {
										$hour = "10";
									}
								} else {
									$dn = "AM";
								}

								$strTime = $hour.":".$min." ".$dn;
							 }
							return $strTime;
	}
	
	function to24Hr($ctime) {
		$strTime = "";
		if($ctime=="07:00 AM") {
			$strTime = 700;
		} else if($ctime=="07:30 AM") {
			$strTime = 730;
		} else if($ctime=="08:00 AM") {
			$strTime = 800;
		} else if($ctime=="08:30 AM") {
			$strTime = 830;
		} else if($ctime=="09:00 AM") {
			$strTime = 900;
		} else if($ctime=="09:30 AM") {
			$strTime = 930;
		} else if($ctime=="10:00 AM") {
			$strTime = 1000;
		} else if($ctime=="10:30 AM") {
			$strTime = 1030;
		} else if($ctime=="11:00 AM") {
			$strTime = 1100;
		} else if($ctime=="11:30 AM") {
			$strTime = 1130;
		} else if($ctime=="12:00 NN") {
			$strTime = 1200;
		} else if($ctime=="12:30 NN") {
			$strTime = 1230;
		} else if($ctime=="01:00 PM") {
			$strTime = 1300;
		} else if($ctime=="01:30 PM") {
			$strTime = 1330;
		} else if($ctime=="02:00 PM") {
			$strTime = 1400;
		} else if($ctime=="02:30 PM") {
			$strTime = 1430;
		} else if($ctime=="03:00 PM") {
			$strTime = 1500;
		} else if($ctime=="03:30 PM") {
			$strTime = 1530;
		} else if($ctime=="04:00 PM") {
			$strTime = 1600;
		} else if($ctime=="04:30 PM") {
			$strTime = 1630;
		} else if($ctime=="05:00 PM") {
			$strTime = 1700;
		} else if($ctime=="05:30 PM") {
			$strTime = 1730;
		} else if($ctime=="06:00 PM") {
			$strTime = 1800;
		} else if($ctime=="06:30 PM") {
			$strTime = 1830;
		} else if($ctime=="07:00 PM") {
			$strTime = 1900;
		} else if($ctime=="07:30 PM") {
			$strTime = 1930;
		} else if($ctime=="08:00 PM") {
			$strTime = 2000;
		} else if($ctime=="08:30 PM") {
			$strTime = 2030;
		} else if($ctime=="09:00 PM") {
			$strTime = 2100;
		} else if($ctime=="09:30 PM") {
			$strTime = 2130;
		} else if($ctime=="10:00 PM") {
			$strTime = 2200;
		} else if($ctime=="10:30 PM") {
			$strTime = 2230;
		}
		return $strTime;
	}
?> 
  
<p>* Required fields.</p>
<hr style="margin-top: -10px;" /> 

<form id="annc" name="annc" action="index.php?r=faculty/processEditSchedPref" method="post">
<p style="margin-bottom: 9px;">*Subject to Edit:
<select name="sub" style="width: 300px; margin-top: -28px; margin-left: 23.5%;">
 <?php
	$sem = $_GET['sem'];
	$sy = $_GET['sy'];
	$bracket = $_GET['bracket'];

	$sql = "SELECT DISTINCT scode FROM tbl_schedpref WHERE sem = '$sem' and sy = '$sy' and bracket = '$bracket'";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
	{	
		if(isset($_POST['sub'])){
			echo'
				<option value="'. $_POST .'"> '. $row['scode'].'</option>
				';
		}
		echo '
				<option value="'. $row['scode'] .'"> '. $row['scode'] .'</option>
			';
	}
 ?>

</select></p> 
<br />
<hr style="margin-top: -10px;" />
<p style="margin-bottom: 9px;">*Subject Preference:
<select name="scode" style="width: 300px; margin-top: -28px; margin-left: 23.5%;">
<?php

	$sql="SELECT * from tbl_subjectload order by scode ASC";
	$result=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)) 
	{
		echo '
			<option value="'. $row['scode'] .'"> '. $row['scode'] .' ('. $row['stitle'] .')</option>
		';
	}

?>
</select></p>

<input type = "hidden" name = "sem" value = "<?php echo $_GET['sem'];?>" />
<input type = "hidden" name = "sy" value = "<?php echo $_GET['sy'];?>" />
<input type = "hidden" name = "oldbracket" value = "<?php echo $_GET['bracket'];?>" />
<br />

<p style="margin-bottom: 9px;">*Monday:
<select name="MtimeIn" style="width: 100px; margin-top: -28px; margin-left: 23.5%;">
	<option value="">Time Start</option>
	<?php
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
<select name="MtimeOut" style="width: 100px; margin-top: -38px; margin-left: 42%;">
	<option value="">Time End</option>
	<?php
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
</p>
<p style="margin-bottom: 9px;">*Tuesday:
<select name="TtimeIn" style="width: 100px; margin-top: -28px; margin-left: 23.5%;">
	<option value="">Time Start</option>
	<?php
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
<select name="TtimeOut" style="width: 100px; margin-top: -38px; margin-left: 42%;">
	<option value="">Time End</option>
	<?php
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
</p><p style="margin-bottom: 9px;">*Wednesday:
<select name="WtimeIn" style="width: 100px; margin-top: -28px; margin-left: 23.5%;">
	<option value="">Time Start</option>
	<?php
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
<select name="WtimeOut" style="width: 100px; margin-top: -38px; margin-left: 42%;">
	<option value="">Time End</option>
	<?php
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
</p><p style="margin-bottom: 9px;">*Thursday:
<select name="THtimeIn" style="width: 100px; margin-top: -28px; margin-left: 23.5%;">
	<option value="">Time Start</option>
	<?php
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
<select name="THtimeOut" style="width: 100px; margin-top: -38px; margin-left: 42%;">
	<option value="">Time End</option>
	<?php
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
</p><p style="margin-bottom: 9px;">*Friday:
<select name="FtimeIn" style="width: 100px; margin-top: -28px; margin-left: 23.5%;">
	<option value="">Time Start</option>
	<?php
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
<select name="FtimeOut" style="width: 100px; margin-top: -38px; margin-left: 42%;">
	<option value="">Time End</option>
	<?php
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
</p><p style="margin-bottom: 9px;">*Saturday:
<select name="StimeIn" style="width: 100px; margin-top: -28px; margin-left: 23.5%;">
	<option value="">Time Start</option>
	<?php
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
<select name="StimeOut" style="width: 100px; margin-top: -38px; margin-left: 42%;">
	<option value="">Time End</option>
	<?php
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
</p>
</br>

<center><p style = "margin-left: 70%;"><input type="submit" value="Save" /> <input type="button" value="Cancel" /></p></center>
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

