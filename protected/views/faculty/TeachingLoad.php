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
<title>Forms | Home</title>
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
}

.underlined
{
    background-color: lightgray;
    font-size: 18px;
    padding: 5px;
    text-align: center;
}
</style>

<style type="text/css">
    .page-content{

    }
    #st-box 
    {
        padding: 1px 2px;
        display: flex;
        justify-content: center;
        float:left;
        width:250px;
        height:70px;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        background: #fff;
        
    }

    #rd-box 
    {
        padding: 1px 2px;
        display: flex;
        justify-content: center;
        float:right;
        width:250px;
        height:70px;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        background: #fff;
        

    } 
</style>
<link href='styles/print.css' media=print rel=stylesheet />
<!-- Modernizr library -->
<script src='scripts/libs/modernizr/modernizr.min.js'></script>
<meta charset="UTF-8"></head>
<body class='page-media page-sidebar-right'>
<!-- JS notice - will be displayed if javascript is disabled -->
<!-- <p id=jsnotice>Javascript is currently disabled. This site requires Javascript to function correctly. Please <a href="http://enable-javascript.com/">enable Javascript in your browser</a>!</p>
 --><!-- End - JS notice -->
<!-- Page header -->
<div id="GradientDiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

<!-- End - Page header -->

<!-- Page subheader -->

<!-- End - Page subheader -->
<!-- Page body -->
<!-- <section class=container-block id=page-body>
<div class=container-inner> -->
<!-- Page title -->
<?php include("headerMenu.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page contactent -->
<div id=page-content>

<h2>Dashboard</h2>
<!-- School Year -->
<div id="st-box">
    <!-- small card -->
    <div class="small-box ">
      <div class="inner">
        <h3><?= $sy;?></h3>

        <center><p>School Year</p></center>
      </div>
      <a href="#" class="small-box-footer">
       
      </a>
</div>
</div>

<!-- Semester -->
<div id="rd-box">
    <!-- small card -->
    <div class="small-box ">
      <div class="inner">
        <?php if ($sem == 1): ?>
            <h3>1st Semester</h3>
        <?php endif ?>
        <?php if ($sem == 2): ?>
            <h3>2nd Semester</h3>
        <?php endif ?>
        <?php if ($sem == 3): ?>
            <h3>Summer</h3>
        <?php endif ?>
        

        <center><p>Semester</p></center>
      </div>
     
</div>
</div>

<br />
<br />
<br />
<br />
<br />

<!-- Video - HTML5 -->
<section>
<!-- SWEETALERT2 NOTIFICATION -->
<?php if (isset($_GET['mes'])) : ?>
	<?php if ($_GET['mes']==1): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>

	<?php if ($_GET['mes']==2): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
<?php endif;?>

<h2 class=underlined-header>List of Schedule Requests</h2>
<table class=round-5>
<tbody>
	<tr>
	<td>Subject Code</td>
	<td>Subject Description</td>
	<td>Course</td>
	<td>Day</td>
	<td>Time</td>
	<td>Room</td>
	<td>Status</td>
	<td>Actions</td>
	</tr>
	<?php include('Gpi.php'); ?>
<?php $sql = "SELECT * FROM tbl_requestschedule WHERE sprof = '$Fcode' and (status='Approved' or status ='Pending' or status='Rejected') ORDER BY request_id DESC";
		$result = mysqli_query($conn, $sql);

		if (!$result) { // add this check.
    die('Invalid query: ' . mysqli_error());
}
else
{
while($row = mysqli_fetch_array($result)) 
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
					$days = getDayreq($request_id, $scode,$currID,$courseID,$schoolYear,$csection,$schedID,$cyear,$sem);
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
						<td><a  href="index.php?r=faculty/facultyview&CurrID='. $currID .'&schedID='.$schedID.'&schoolyear='.$schoolYear.'&request_id='.$request_id.'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem.'&sec='. $csection .'&title='.$stitle.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'"   class="btn btn-mini btn-primary btn-block">VIEW</a>
					<div><a href="index.php?r=faculty/processrequestscheddelete&currID='. $currID .'&schedID='.$schedID.'&request_id='.$request_id.'" class="btn btn-s" >DELETE</a></div></td>
					
						</tr>
					';
				}
			}
?>
				
</tbody>
</table>
<!--
<div id="main">
<h1>Send email via Gmail SMTP server in PHP</h1>
<div id="login">
<h2>Gmail SMTP</h2>
<hr/>
<form action="index.php?r=faculty/TeachingLoad" method="post">
<input type="text" placeholder="Enter your email ID" name="email"/>
<input type="password" placeholder="Password" name="password"/>
<input type="text" placeholder="To : Email Id " name="toid"/>
<input type="text" placeholder="Subject : " name="subject"/>
<textarea rows="4" cols="50" placeholder="Enter Your Message..." name="message"></textarea>
<input type="submit" value="Send" name="send"/>
</form>
</div>
</div>
<?php
//require 'scripts/phpmailer/PHPMailerAutoload.php';
//if(isset($_POST['send']))
{
//$email = $_POST['email'];
//$password = $_POST['password'];
//$to_id = $_POST['toid'];
//$message = $_POST['message'];
//$subject = $_POST['subject'];
//$mail = new PHPMailer;
//$mail->isSMTP();
//$mail->Host = 'smtp.gmail.com';
//$mail->Port = 587;
//$mail->SMTPSecure = 'tls';
//$mail->SMTPAuth = true;
//$mail->Username = $email;
//$mail->Password = $password;
//$mail->addAddress($to_id);
//$mail->Subject = $subject;
//$mail->msgHTML($message);
//if (!$mail->send()) {
//$error = "Mailer Error: " . $mail->ErrorInfo;
//echo '<p id="para">'.$error.'</p>';
}
//else {
//echo '<p id="para">Message sent!</p>';
//}
//}
//else{
//echo '<p id="para">Please enter valid data</p>';
//} 
?>  -->
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
							$sql ="SELECT * FROM tbl_internaschedule WHERE scode ='$scode' AND currID = '$currID' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
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
						

						function getDayreq($request_id,$scode,$currID,$cID,$sy,$sec,$schedID)
						{
include("config.php");

							$sql ="SELECT * FROM tbl_requestschedule WHERE request_id='$request_id' AND scode ='$scode' AND currID = '$currID' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec' and schedID= '$schedID' ";
							$result =mysqli_query($conn, $sql);
							
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
							$sql ="SELECT * FROM tbl_internaschedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
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

						function getRoomreq($request_id,$scode,$currID,$cID,$sy,$sec)
						{
include("config.php");
							$sql ="SELECT * FROM tbl_requestschedule where request_id='$request_id' AND scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec' ";
							$result =mysqli_query($conn, $sql);
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
							$sql ="SELECT * FROM tbl_internaschedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result =mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$prof = getName($row['sprof']);
							return $prof;
						}
						
						function getTime($scode,$currID,$cID,$sy,$sec)
						{
include("config.php");
							$sql ="SELECT * FROM tbl_internaschedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
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
						
						function getTimereq($request_id,$scode,$currID,$cID,$sy,$sec)
						{
include("config.php");
							$sql ="SELECT * FROM tbl_requestschedule where request_id='$request_id' AND scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec'";
							$result = mysqli_query($conn, $sql);
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
							$result = mysqli_query($conn, $sql);
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
					

</section>
<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar >
<section class='widget-container widget-categories'  >
<h2 class=widget-heading>Schedule Management</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>

<li>
<a>Teaching Load</a>
<span class=widget-hint><a href='index.php?r=faculty/SubjectLoad'>View</a></span>
</li>
<li>
<a>Subject Preference</a>
<span class=widget-hint><a href='index.php?r=faculty/SubjectPreference'>Manage</a></span>
</li>

<li>
<a>Make Up Classes</a>
<span class=widget-hint><a href='index.php?r=faculty/MakeupClassRequest'>View</a></span>
</li>




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
	$('.btn-s').on('click', function(e) {
		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Are you sure?',
			text: 'Confirm Deleting this Requested Schedule?',
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
</script>
</body>
</html>
