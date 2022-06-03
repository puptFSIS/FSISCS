<?php
session_start();
include("config.php");
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {
	
	} else if($_SESSION['user']==0) {
		header("Location: index.php?r=faculty/");
	}
} else {
	header("location:index.php?r=administrator/");
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
<title>Add Prefered Schedule</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<?php include("stylesheet.php");?>

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
<?php include("headerMenu.php");?>

<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->
<div id=page-content>
<!-- Video - HTML5 -->
<section>

<h2 class=underlined-header>Day Schedule Availability</h2>
<?php if (isset($_GET['mes'])) : ?>
	<?php if ($_GET['mes']==0): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
	<?php if ($_GET['mes']==1): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
	<?php if ($_GET['mes']==2): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
	<?php if ($_GET['mes']==3): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
<?php endif;?>

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
	
	function getName($fcode)
	{
include('config.php');
		$Name = "";
		$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result)){
			$Name = $row['LName'] .', '. $row['FName'];
		}
		return $Name;
	}
?>
<p>* Required fields.</p>
<hr style="margin-top: -10px;" />
<form id="annc" name="annc" action="index.php?r=administrator/TimePreferProcessADD" method="post">
<p style="margin-bottom: 9px;">*Day:
<select name="sday" style="width: 470px; margin-top: -28px; margin-left: 15%;">
	<?php
		$blank = "";
		$d1 = "M";
		$d2 = "T";
		$d3 = "W";
		$d4 = "TH";
		$d5 = "F";
		$d6 = "S";
		$d = "";
		$araw = "";
		
		
		if($araw <> "")
		{
			echo '<option value = "'.$araw.'">'. $araw .'</option>';
		}
		else
		{
			echo'
				<option value="'. $blank .'"></option>
			';
		}
		
		for($day=1;$day<=6;$day++) 
		{
			if($day==1)
			{
				$d = $d1;
			}
			elseif($day==2)
			{
				$d = $d2;
			}
			elseif($day==3)
			{
				$d = $d3;
			}
			elseif($day==4)
			{
				$d = $d4;
			}
			elseif($day==5)
			{
				$d = $d5;
			}
			elseif($day==6)
			{
				$d = $d6;
			}
			echo '<option value = "'.$d.'">'. $d .'</option>';
		}
	?>
</select>
</p>

<p style="margin-bottom: 12px;">Whole Day:
<input id ="WD" type="checkbox" name="WholeDay" style="margin-left: 30px;" onclick="yesnoCheck(this)">
</p>

<div id="ifYes" style="display: block;">
	
	<p style="margin-bottom: 9px;">*Time Start:
		<input id="Stime" type="time" name="timeS" style="display: inline-block;margin-left: 24px;margin-bottom: 9px; width: 110px;" >
	</p>

	
	<p style="margin-bottom: 9px;">*Time End:

		<input id ="Etime" type="time" name="timeE"  style="display: inline-block;margin-left: 28px;margin-bottom: 9px; width: 110px;" >
	</p>
</div>

<p style="margin-bottom: 9px;">*Prof. Name:
<select name="profName" style="width: 470px; margin-top: -28px; margin-left: 15%;">
	<?php
		$prof = "";
		$blank = "";
		
		$prof=$_SESSION['FCode'];
		
		if($prof <> "")
		{
			echo'
				<option value="'. $prof .'"> '. getName($prof)  .'</option>
			';
		}
		else
		{
			echo'
				<option value="'. $blank .'"></option>
			';
		}
		
		
	?>
</select>
</p>

<p style="margin-bottom: 9px;">*Semester:
<select name="sem" style="width: 470px; margin-top: -28px; margin-left: 15%;">
	<?php
		$sql = "SELECT * FROM tbl_currentSYandSem";
		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_array($result)) {
			echo '
				<option value="'. $row['sem'] .'">'. $row['sem'] .'</option>
			';
		}
	?>
</select>
</p>

<p style="margin-bottom: 9px;">*School Year:
<select name = "sy" style="width: 470px; margin-top: -28px; margin-left: 15%;">
			<?php
					$sql = "SELECT DISTINCT schoolYear FROM tbl_subjectload ORDER BY schoolYear DESC LIMIT 2";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($result)) {
						echo '
							<option value="'. $row['schoolYear'] .'">'. $row['schoolYear'] .'</option>
						';
					}
			
			?>
		</select>
</p>


<center><p><input type="submit" value="Save" /> <a href="index.php?r=administrator/SubjPrefer" class="btn btn-primarycan">Cancel</a></p></center>
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
<h2 class=widget-heading>Subject & Time Preferences</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("SubjectMenu.php");?>
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
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/jquery-3.6.0.min.js'></script>
<script src='<?php echo Yii::app()->getBaseUrl() ?>assets/sweetalert2.all.min.js'></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>

<script>
	function yesnoCheck(that) {
		if ($('#WD').prop('checked')) {
			
			document.getElementById("ifYes").style.display = "none";
			// $('select:#Stime,#Etime').attr('disabled')
			document.getElementById("Stime").disabled = true;
			document.getElementById("Etime").disabled = true;
		} else {
			document.getElementById("ifYes").style.display = "block";
		}
	}

	// $('#WD').click(function() {
 //    	$('select:#Stime,#Etime').attr('disabled',(this.checked))
	// });
	

	flashdata = $('.flash-data').data('flashdata')
	if(flashdata==0){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Preferred Schedule Added',
			timer: '4000'
		})
	}

	if(flashdata==1){
		Swal.fire({
			icon:'error',
			title:'Ooops!',
			text:'Please fill out the given fields',
			timer: '4000'
		})
	}

	if(flashdata==2){
		Swal.fire({
			icon:'error',
			title:'Ooops!',
			text:'Preferred Schedule is Existing',
			timer: '4000'
		})
	}

	if(flashdata==3){
		Swal.fire({
			icon:'error',
			title:'Ooops!',
			text:'Classes are only from 7:30 AM to 10:30 PM',
			timer: '4000'
		})
	}
</script>
</body>
</html>

