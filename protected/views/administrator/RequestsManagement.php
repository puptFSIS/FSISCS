<?php
session_start();
include("config.php");
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
<title>Scheduling | Request Management</title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd_tm1.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}
    
#page-title
{
    background-color: black;
    padding: 5px 5px 5px;
    height: 41px;
}
    
#menu_strip
{
    margin-top: 10px;
}
    
#menu_strip a
{
    color: white;
    padding: 10px 10px 10px;
    border-radius: 5px;
}
    
#menu_strip a:hover
{
    background-color: lightgray;
    color: white;
    padding: 10px 10px 10px;
    border-radius: 5px;
}
    
#menu_title
{
    margin-left: 30px;
    background-color: lightgray;
    color: black;
    text-align: center;
    font-family: "Helvetica";
    padding: 5px 5px 5px;
    font-size: 16px;
    width: 100%;
}
    
#options_menu_title
{
    margin-left: 30px;
    background-color: lightgray;
    color: black;
    text-align: center;
    font-family: "Helvetica";
    padding: 5px 5px 5px;
    width: 100%;
}</style>

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
<?php endif;?>

<h2 class="underlined-header">Request Management</h2>


<section>

<table class=round-3 style="width:100%; margin-right: 500px; ">
<thead>
<tr>
<th><h5>Faculty Name</h5></th>
<th><h5>Subject Title</h5></th>
<th><h5>Course</h5></th>
<th><h5>Sem</h5></th>
<th><h5>S.Y.</h5></th>
<th><h5>Action</h5></th>
</tr>
</thead>

<tfoot>
<tr>
</tr>
</tfoot>
<tbody>
<?php
				$sql = "SELECT * FROM tbl_requestschedule WHERE status = 'Pending' ";
				$query = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_array($query)) 
				{
					$request_id = $row['request_id'];
					$schedID = $row['schedID'];
					$currID = $row['currID'];
					$courseID = $row['courseID'];
					$csection = $row['csection'];
					$cyear = $row['cyear'];
					$scode = $row['scode'];
					$stitle = $row['stitle'];
					$units = $row['units'];
					$lec = $row['lec'];
					$datemodified = $row['datemodified'];
					$daterequested = $row['daterequested'];
					$lab = $row['lab'];
					$stimeS = $row['stimeS'];
					$stimeE = $row['stimeE'];
					$sroom = $row['sroom'];
					$sprof = $row['sprof'];
					$sprofname = getName($sprof);
					$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
					$sem = $row['sem'];
					$schoolYear = $row['schoolYear'];
					echo '
						<tr>
						<td style="text-align: left;">'. $sprofname .'</td>
						<td style="text-align: left;">'. $stitle .'</td>
						<td style="text-align: left;">'. $course .'</td>
						<td style="text-align: left;">'. $sem .'</td>
						<td style="text-align: left;">'. $schoolYear .'</td>
						<td><a href="index.php?r=administrator/viewrequests&CurrID='. $currID .'&schedID='.$schedID.'&sprof='.$sprof.'&daterequested='.$daterequested.'&request_id='.$request_id.'&schoolyear='.$schoolYear.'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem.'&sec='. $csection .'&title='.$stitle.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px"><center>VIEW</center></a>
					
						</tr>
					';
				}
?>
				
</tbody>
</table>
<?php 
function getTitle($code,$cID) 
						{
							include("config.php");
							$sql = "SELECT * FROM tbl_subjectload WHERE scode ='$code' and courseID = '$cID'"; 
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$title = $row['stitle'];
							return $title;

						}
						
						function getLec($code,$cID) 
						{
							include("config.php");
							$sql = "SELECT * FROM tbl_subjectload WHERE scode ='$code' and courseID = '$cID'"; 
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$lec = $row['hrs_lec'];
							return $lec;
						}
						
						function getLab($code,$cID) 
						{
							
							include("config.php");
							$sql = "SELECT * FROM tbl_subjectload WHERE scode ='$code' and courseID = '$cID'"; 
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$lab = $row['hrs_lab'];
							return $lab;
						}
						
						function getCourse($ccode) 
						{
							include("config.php");
							$sql = "SELECT * FROM tbl_course WHERE course ='$ccode'"; 
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$code = $row['course_code'];
							return $code;
						}
						
						function getDay($scode,$currID,$cID,$sy,$sec)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							if($row['sday2']<>'')
							{
								$day = $row['sday'] . '/' . $row['sday2'];
							}
							else
							{
								$day = $row['sday'];
							}
							return $day;
						}
						
						function getRoom($scode,$currID,$cID,$sy,$sec)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							if($row['sroom2']<>'')
							{
								$room = $row['sroom'] . '/' . $row['sroom2'];
							}
							else
							{
								$room = $row['sroom'];
							}
							return $room;
						}
						
						function getProf($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$prof = getName($row['sprof']);
							return $prof;
						}
						
						function getTime($scode,$currID,$cID,$sy,$sec)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							if($row['stimeS2']<>"")
							{
								if($row['stimeS']<>0){
									$time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']) . '/' . to12Hr($row['stimeS2']) . '-' . to12Hr($row['stimeE2']);
								}else{
									$time = "";
								}
							}else
							{
								if($row['stimeS']<>'')
								{
									$time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']);
								}
								else
								{
									$time = "";
								}
							}
							return $time;
						}
						
						function getName($fcode)
						{
			
							include("config.php");
							$Name = "";
							$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($result)){
								$Name = $row['LName'] .', '. $row['FName'];
							}
							return $Name;
						}
						?>
</section>

</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>

<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("SchedulingMenu.php");?>
</ul>
</div>
</section>
</aside>
<!-- End - Page sidebar -->
</div>
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
<script src='assets/jquery-3.6.0.min.js'></script>
<script src='assets/sweetalert2.all.min.js'></script>
<script id=js-dispatcher src='scripts/scripts.js'></script>

<script>
	$('.btn-primarydel').on('click', function(e) {
		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Are you sure?',
			text: 'Confirm Undo this Schedule?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Confirm',

		}).then((result) => {
			if(result.value){
				document.location.href = href;
			}
		})
	})

	flashdata = $('.flash-data').data('flashdata')
	if(flashdata==0){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Request Schedule has been Added to Internal Arrangement!',
			timer: '5000'
		})
	}

	if(flashdata==1){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Request Schedule Rejected!',
			timer: '5000'
		})
	}

	if(flashdata==2){
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Schedule has been Reset!',
			timer: '2000'
		})
	}
</script>	
</body>
</html>
