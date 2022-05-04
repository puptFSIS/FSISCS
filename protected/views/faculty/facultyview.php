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
<title>Faculty | View Request </title>
<!-- Page icon -->
<link href='puplogo.ico' rel='shortcut icon'/>
<!-- Stylesheets -->
<style media=screen type='text/css'>@import "styles/base.css";
.cssLT #ut, .cssUT #ut{filter:progid:DXImageTransform.Microsoft.DropShadow(enabled=false);}
.cssWLGradientIMG{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMGSSL{BACKGROUND-IMAGE: none;top:0;height:103px;background-color:#ffffff;}
.cssWLGradientIMG
{BACKGROUND-IMAGE: url(images/hd.jpg);BACKGROUND-REPEAT:repeat-x;top:0;height:105px;}
aside.page-sidebar{
display:none;
}

.page-sidebar-right #page-content{
	width:100%;
}
body.page-media.page-sidebar-right{
	width:100%;
}

.page-sidebar-right #page-body-content {
background:url(../../../../FSISCS/images/page-body-bg-white.png);
background-repeat:repeat;
}
</style>

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

<h2 class="underlined-header">View Request</h2>


<section>

<h3 >Original Schedule</h3>
<table class=round-3 style="width:100%; ">

<thead>
<tr>
<th><h5>Subject Code</h5></th>
<th><h5>Subject Title</h5></th>
<th><h5>Course</h5></th>
<th><h5>Day</h5></th>
<th><h5>Time</h5></th>
<th><h5>Room</h5></th>
</tr>
</thead>

<tbody>
<?php 

$schedID = $_GET['schedID'];

$courseID = $_GET['courseID'];

$cyear = $_GET['cyear'];
$scode = $_GET['scode'];

$units = $_GET['units'];
$lec = $_GET['lec'];
$lab = $_GET['lab'];

$sem = $_GET['sem'];
$sql2="SELECT * FROM tbl_schedule where Sched_type = 'OFFICIAL' AND schedID = '$schedID'";

$result2 = mysqli_query($conn,$sql2);

while($row = mysqli_fetch_array($result2)) 
{
    
    $schedID = $row['schedID'];
    $currID = $row['currID'];
    $courseID = $row['courseID'];
    $csection = $row['csection'];
    $cyear = $row['cyear'];
    $scode = $row['scode'];
    $stitle = $row['stitle'];
    $units = $row['units'];
    $lec = $row['lec'];
    $lab = $row['lab'];
    $stimeS = $row['stimeS'];
    $stimeE = $row['stimeE'];
    $sroom = $row['sroom'];
    $sprof = $row['sprof'];
    $sprofname = getName($sprof);
    $course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
    $sem = $row['sem'];
    $schoolYear = $row['schoolYear'];
    $day = getDay($scode,$currID,$courseID,$schoolYear,$csection,$cyear,$sem);
    $time = getTime($scode,$currID,$courseID,$schoolYear,$csection,$cyear,$sem);
    $room = getRoom($scode,$currID,$courseID,$schoolYear,$csection,$cyear,$sem);
?>
    <tr>
	<td style="text-align: left;"><?php echo $scode; ?></td>
	<td style="text-align: left;"><?php echo $stitle; ?></td>
	<td style="text-align: left;"><?php echo $course; ?></td>
	<td style="text-align: left;"><?php echo $day; ?></td>
	<td style="text-align: left;"><?php echo $time;?></td>
	<td style="text-align: left;"><?php echo $room; ?></td>
    </tr>
<?php
}
?>
</tbody>
</table>

</section>

</section>

<br/>
<br/>
<section>
<section>

<form method="POST">
<h3 >Requested Schedule</h3>
<?php 

					$schedID = $_GET['schedID'];
				
					$courseID = $_GET['courseID'];
					
					$cyear = $_GET['cyear'];
					$scode = $_GET['scode'];
					$request_id = $_GET['request_id'];
					$units = $_GET['units'];
					$lec = $_GET['lec'];
					$lab = $_GET['lab'];
			
					$sem = $_GET['sem'];
		$sql2="SELECT * FROM tbl_requestschedule where schedID = '$schedID' and request_id='$request_id' and (status ='Pending' or status='Rejected' or status='Approved') ORDER BY request_id DESC";
		$result2 = mysqli_query($conn,$sql2);
		while($row = mysqli_fetch_array($result2)) 
				{
					$daterequested = $row['daterequested'];
					$datemodified = $row['datemodified'];
					$status = $row['status'];
	?>
<p> Date Requested: <?php echo date("F j, Y ,D ", strtotime($daterequested)); ?></p> 
<p><?php echo $status; ?>: <?php if($status == "Pending") echo "Wait for the response of the administrator"; else echo date("F j, Y ,D ", strtotime($datemodified)); ?></p>
				<?php 
				}
?>
<table class=round-3 style="width:100%; ">
<thead>
<tr>
<th><h5>Subject Code</h5></th>
<th><h5>Subject Title</h5></th>
<th><h5>Course</h5></th>
<th><h5>Day</h5></th>
<th><h5>Time</h5></th>
<th><h5>Room</h5></th>
<th><h5>Status</h5></th>
</tr>
</thead>


<tbody>
<?php 

					$schedID = $_GET['schedID'];
				
					$courseID = $_GET['courseID'];
					
					$cyear = $_GET['cyear'];
					$scode = $_GET['scode'];
					$request_id = $_GET['request_id'];
					$units = $_GET['units'];
					$lec = $_GET['lec'];
					$lab = $_GET['lab'];
			
					$sem = $_GET['sem'];
		$sql2="SELECT * FROM tbl_requestschedule where schedID = '$schedID' and request_id='$request_id' and (status ='Pending' or status='Rejected' or status='Approved') ORDER BY request_id DESC";
		$result2 = mysqli_query($conn,$sql2);

		while($row = mysqli_fetch_array($result2)) 
				{
				
					$schedID = $row['schedID'];
					$currID = $row['currID'];
					$courseID = $row['courseID'];
					$csection = $row['csection'];
					$cyear = $row['cyear'];
					$scode = $row['scode'];
					$stitle = $row['stitle'];
					$units = $row['units'];
					$status = $row['status'];
					$request_id =$row['request_id'];
					$lec = $row['lec'];
					$lab = $row['lab'];
					$stimeS = $row['stimeS'];
					$stimeE = $row['stimeE'];
					$sroom = $row['sroom'];
					$sprof = $row['sprof'];
					$sprofname = getName($sprof);
					$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
					$sem = $row['sem'];
					$schoolYear = $row['schoolYear'];
					$days = getDayreq($request_id , $scode,$currID,$courseID,$schoolYear,$csection,$schedID,$cyear,$sem);
					$times = getTimereq($request_id,$scode,$currID,$courseID,$schoolYear,$csection,$cyear,$sem);
					$rooms = getRoomreq($request_id,$scode,$currID,$courseID,$schoolYear,$csection,$cyear,$sem);
					echo '
						<tr>
						<td style="text-align: left;">'. $scode .'</td>
						<td style="text-align: left;">'. $stitle .'</td>
						<td style="text-align: left;">'. $course .'</td>
						<td style="text-align: left;">'. $days .'</td>
						<td style="text-align: left;">'. $times .'</td>
						<td style="text-align: left;">'. $rooms .'</td>
						<td style="text-align: left;">'. $status .'</td>
					
					
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
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$title = $row['stitle'];
							return $title;
						}
						
						function getLec($code,$cID) 
						{
include("config.php");
							$sql = "SELECT * FROM tbl_subjectload WHERE scode ='$code' and courseID = '$cID'"; 
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$lec = $row['hrs_lec'];
							return $lec;
						}
						
						function getLab($code,$cID) 
						{
include("config.php");
							$sql = "SELECT * FROM tbl_subjectload WHERE scode ='$code' and courseID = '$cID'"; 
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$lab = $row['hrs_lab'];
							return $lab;
						}
						
						function getCourse($ccode) 
						{
include("config.php");
							$sql = "SELECT * FROM tbl_course WHERE course ='$ccode'"; 
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$code = $row['course_code'];
							return $code;
						}
						
						function getDay($scode,$currID,$cID,$sy,$sec)
						{
include("config.php");
							$sql ="SELECT * FROM tbl_schedule WHERE Sched_type='OFFICIAL' AND scode ='$scode' AND currID = '$currID' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn,$sql);
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
						

						function getDayreq($request_id,$scode,$currID,$cID,$sy,$sec,$schedID)
						{
include("config.php");
							$sql ="SELECT * FROM tbl_requestschedule WHERE request_id='$request_id' AND scode ='$scode' AND currID = '$currID' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec' and schedID= '$schedID' ";
							$result = mysqli_query($conn,$sql);
							
							$row = mysqli_fetch_array($result);
							if($row['sday2']<>'')
							{
								$days = $row['sday'] . '/' . $row['sday2'];
							}
							else
							{
								$days = $row['sday'];
							}
							return $days;
						}
						

						function getRoom($scode,$currID,$cID,$sy,$sec)
						{
include("config.php");
							$sql ="SELECT * FROM tbl_schedule where Sched_type='OFFICIAL' AND scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
							$result = mysqli_query($conn,$sql);
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

						function getRoomreq($request_id,$scode,$currID,$cID,$sy,$sec)
						{
include("config.php");
							$sql ="SELECT * FROM tbl_requestschedule where request_id='$request_id' AND scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							if($row['sroom2']<>'')
							{
								$rooms = $row['sroom'] . '/' . $row['sroom2'];
							}
							else
							{
								$rooms = $row['sroom'];
							}
							return $rooms;
						}
						
						function getProf($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
						{
include("config.php");
							$sql ="SELECT * FROM tbl_schedule WHERE Sched_type='OFFICIAL' AND scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$prof = getName($row['sprof']);
							return $prof;
						}
						
						function getTime($scode,$currID,$cID,$sy,$sec)
						{
include("config.php");
							$sql ="SELECT * FROM tbl_schedule where Sched_type='OFFICIAL' AND scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
							$result = mysqli_query($conn,$sql);
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
						
						function getTimereq($request_id,$scode,$currID,$cID,$sy,$sec)
						{
include("config.php");
							$sql ="SELECT * FROM tbl_requestschedule where request_id='$request_id' AND scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec' ";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							if($row['stimeS2']<>"")
							{
								if($row['stimeS']<>0){
									$times = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']) . '/' . to12Hr($row['stimeS2']) . '-' . to12Hr($row['stimeE2']);
								}else{
									$times = "";
								}
							}else
							{
								if($row['stimeS']<>'')
								{
									$times = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']);
								}
								else
								{
									$times = "";
								}
							}
							return $times;
						}

						
						function getName($fcode)
						{
include("config.php");
							$Name = "";
							$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
							$result = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($result)){
								$Name = $row['LName'] .', '. $row['FName'];
							}
							return $Name;
						}
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
					
<!-- End - Page content -->
<!-- Page sidebar-->
</section>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->

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
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>

