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
<title>Internal Scheduling | Subject Daily Sched </title>
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

#internal_dly{
    background-color: #d8d8d8;
    color: black;
    padding: 5px;
    margin-bottom: 5px;
    float: right;
}

#internal_dly:hover{
    background-color:#e8e8e8;
}

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
<?php include("headerMenu.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->

<div id=page-content>
<!-- Video - HTML5 -->
<section>
<!--
<?php
	if(isset($_GET['mode'])) {
		if($_GET['mode']==1) {
			
		} else {
			include("Gwe.php");
		}
	} 
?>-->

<h2 class="underlined-header">Internal Daily Subject Schedule</h2>

<br />
<br />
	<form name="frmSched" method = "post" action = "index.php?r=administrator/InternalDailySched">
		<h4>Semester</h4>
		<select name = "sem" style="width: 30%;">
			<?php
				$row=1;
				$disp = 0;
				if(isset($_GET['sem']))
				{	
					echo'<option value="'.$_GET['sem'].'">'.$_GET['sem'].'</option>';
				}
				else if(isset($_POST['sem']))
				{	
					echo'<option value="'.$_POST['sem'].'">'.$_POST['sem'].'</option>';
				}
				while($row <= 3) {
					$disp = $row;
					if($row==3){
						$disp = "SUMMER";
					}
					echo '
						<option value = "'.$row.'"> '. $disp .'</option>
					';
					$row ++;
				}
			?>
		</select>
		<br />
		<h4>School Year</h4>
		<select name = "sy" style="width: 30%;">
			<?php
				if(isset($_GET['sy'])){
						$sh = $_GET['sy'];
						$sql1= "SELECT DISTINCT schoolYear FROM tbl_subjectload WHERE schoolYear= '$sh'";
						$result1 = mysqli_query($conn,$sql1);
						while($row1 = mysqli_fetch_array($result1)){
							echo'<option value="'.$sh.'">'.$row1['schoolYear'].'</option>';
						}
				}
				else if(isset($_POST['sy']))
				{
					$sh = $_POST['sy'];
					$sql1= "SELECT DISTINCT schoolYear FROM tbl_subjectload WHERE schoolYear= '$sh'";
					$result1 = mysqli_query($conn,$sql1);
					while($row1 = mysqli_fetch_array($result1)){
						echo'<option value="'.$sh.'">'.$row1['schoolYear'].'</option>';
					}
				}
				$sql = "SELECT DISTINCT schoolYear FROM tbl_subjectload";
				$result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($result)) {
					echo '
						<option value="'. $row['schoolYear'] .'">'. $row['schoolYear'] .'</option>
					';
				}
			?>
		</select>
		<br />
		<h4>Day</h4>
		<select name = "day" style="width: 30%;">
			<?php
				if(isset($_GET['day']))
				{
					$day = $_GET['day'];
					if($day == "M")
					{
						$d = "MONDAY";
					}elseif($day == "T")
					{
						$d = "TUESDAY";
					}elseif($day == "W")
					{
						$d = "WEDNESDAY";
					}elseif($day == "TH")
					{
						$d = "THURSDAY";
					}elseif($day == "F")
					{
						$d = "FRIDAY";
					}elseif($day == "S")
					{
						$d = "SATURDAY";
					}
					echo'<option value="'.$day.'">'.$d.'</option>';
				}
				else if(isset($_POST['sy']))
				{
					$day = $_POST['day'];
					if($day == "M")
					{
						$d = "MONDAY";
					}elseif($day == "T")
					{
						$d = "TUESDAY";
					}elseif($day == "W")
					{
						$d = "WEDNESDAY";
					}elseif($day == "TH")
					{
						$d = "THURSDAY";
					}elseif($day == "F")
					{
						$d = "FRIDAY";
					}elseif($day == "S")
					{
						$d = "SATURDAY";
					}
					echo'<option value="'.$day.'">'.$d.'</option>';	
				}
				$m = "M";
				$t = "T";
				$w = "W";
				$th = "TH";
				$f = "F";
				$s = "S";
				echo'<option value="'.$m.'">'."MONDAY".'</option>';
				echo'<option value="'.$t.'">'."TUESDAY".'</option>';
				echo'<option value="'.$w.'">'."WEDNSDAY".'</option>';
				echo'<option value="'.$th.'">'."THURSDAY".'</option>';
				echo'<option value="'.$f.'">'."FRIDAY".'</option>';
				echo'<option value="'.$s.'">'."SATURDAY".'</option>';
			?>
		</select>
        <br/>
        <br/>
		<input type="submit" name="btnSubmit" value="Generate" />
		</form>

</section>
<section>

<table class=round-5 style="width:100%; ">
<tbody>
				
					<?php
						
						$csem = 0;
						/*
						if(isset($_POST['sem'])) {
							$csem = $_POST['sem'];
						}
						if(isset($_GET['sem'])) {
							$csem = $_GET['sem'];
						}*/
						$strSem = "";
						$stime = "";
						$course = "";
						$sday = "";
						$sprof = "";
						$sroom = "";
						$yr = ""; 
						$sec = "";
						$sy ="";
						$day = "";
						$cID = 0;
						
						/*
						if(isset($_POST['sy'])){
							$sy = $_POST['sy'];
						}
						if(isset($_GET['sy'])){
							$sy = $_GET['sy'];
						}
						if(isset($_POST['sec'])){
							$day = $_POST['day'];
						}
						if(isset($_GET['day'])){
							$day = $_GET['day'];
						}*/
						
						if($csem==1) {
							$strSem = "FIRST SEMESTER";
						} else if($csem==2) {
							$strSem = "SECOND SEMESTER";
						}
						
						if(isset($_POST['sem']) and isset($_POST['sy']) and isset ($_POST['day']))
						{
							$sy = $_POST['sy'];
							$day = $_POST['day'];
							$csem = $_POST['sem']; 
							if($day == "M")
							{
								$d = "MONDAY";
							}elseif($day == "T")
							{
								$d = "TUESDAY";
							}elseif($day == "W")
							{
								$d = "WEDNESDAY";
							}elseif($day == "TH")
							{
								$d = "THURSDAY";
							}elseif($day == "F")
							{
								$d = "FRIDAY";
							}elseif($day == "S")
							{
								$d = "SATURDAY";
							}
							echo '
								<h4>'.$d.'</h4>
								<table class="table table-bordered table-hover responsive-utilities">
								  <tbody>
								  <h4 class="underlined-header">'.getname($d).' <a href="index.php?r=administrator/printPerDay&sem='. $csem .'&sy='. $sy .'&sday='. $day .'" class="btn btn-s" target = "blank">Print Schedule</a></h4>
									<tr>
										<td class="table-narrow" colspan="11" style="text-align: left"></td>
									</tr>
									<tr>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"" >TITLE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LEC</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LAB</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">UNITS</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">COURSE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">DAY</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">TIME</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">ROOM</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">PROFESSOR</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">ACTION</td>
									</tr>
								';
							
							$sql = "SELECT * FROM tbl_internaschedule WHERE (sem='$csem' AND schoolYear = '$sy' and sday = '$day') or (sem='$csem' AND schoolYear = '$sy' and sday2 = '$day')";
							$query = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($query)) 
							{
								$scode = $row['scode'];
								$stitle = $row['stitle'];
								$lec = $row['lec'];
								$lab = $row['lab'];
								$sunit = $row['units'];
								$currID = $row['currID'];
								$yrlvl = $row['cyear'];
								$sec = $row['csection'];
								$cID = $row['courseID'];
								$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
								$time = getTime($row['scode'],$csem,$row['courseID'],$sy,$day);
								$room = getRoom($row['scode'],$csem,$row['courseID'],$sy,$day);
								$prof = getProf($row['scode'],$csem,$row['courseID'],$sy,$day);
								
								echo '
									<tr>
										<td style="text-align: left;">'. $scode .'</td>
										<td style="text-align: left;">'. $stitle .'</td>
										<td style="text-align: left;">'. $lec .'</td>
										<td style="text-align: left;">'. $lab .'</td>
										<td style="text-align: center;">'. $sunit .'</td>
										<td style="text-align: center;">'. $course.'</td>
										<td style="text-align: center;">'. $day.'</td>
										<td style="text-align: center;">'. $time.'</td>
										<td style="text-align: center;">'. $room.'</td>
										<td style="text-align: center;">'. $prof.'</td>
										';
								echo '
										
										<td><a href="index.php?r=administrator/SetDailySched&currID='. $currID .'&scode='. $scode .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&day=' .$day. '" class="btn btn-mini btn-primary btn-block" style="width:45px">UPDATE</a><a href="index.php?r=administrator/deleteDailySched&currID='. $currID .'&scode='. $scode .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&day=' .$day. '" class="btn btn-mini btn-primary btn-block"style="width:45px">RESET</a><a href="index.php?r=administrator/AddDailySched&currID='. $currID .'&scode='. $scode .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&day=' .$day. '" class="btn btn-mini btn-primary btn-block"style="width:45px">ADD SCHED</a></td>
										
									</tr>
								';
							}
							echo '
									</tbody>
								</table>
								';
						}
						else if (isset($_GET['sem']) and isset($_GET['sy']) and isset ($_GET['day']))
						{
							$sy = $_GET['sy'];
							$day = $_GET['day'];
							$csem = $_GET['sem']; 
							
							echo '
								<table class="table table-bordered table-hover responsive-utilities">
								  <tbody>
									<tr>
										<td class="table-narrow" colspan="11" style="text-align: left"><a class="btn btn-mini"></a><a class="btn btn-mini pull-right"></a></td>
									</tr>
									<tr>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"" >TITLE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LEC</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LAB</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">UNITS</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">COURSE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">DAY</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">TIME</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">ROOM</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">PROFESSOR</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">ACTION</td>
									</tr>
								';
							
							
							$sql = "SELECT * FROM tbl_internaschedule WHERE (sem='$csem' AND schoolYear = '$sy' and sday = '$day') or (sem='$csem' AND schoolYear = '$sy' and sday2 = '$day')";
							$query = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($query)) 
							{
								$scode = $row['scode'];
								$stitle = $row['stitle'];
								$lec = $row['lec'];
								$lab = $row['lab'];
								$sunit = $row['units'];
								$currID = $row['currID'];
								$yrlvl = $row['cyear'];
								$cID = $row['courseID'];
								$sec = $row['csection'];
								$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
								$time = getTime($row['scode'],$csem,$row['courseID'],$sy,$day);
								$room = getRoom($row['scode'],$csem,$row['courseID'],$sy,$day);
								$prof = getProf($row['scode'],$csem,$row['courseID'],$sy,$day);
								
								echo '
									<tr>
										<td style="text-align: left;">'. $scode .'</td>
										<td style="text-align: left;">'. $stitle .'</td>
										<td style="text-align: left;">'. $lec .'</td>
										<td style="text-align: left;">'. $lab .'</td>
										<td style="text-align: center;">'. $sunit .'</td>
										<td style="text-align: center;">'. $course.'</td>
										<td style="text-align: center;">'. $day.'</td>
										<td style="text-align: center;">'. $time.'</td>
										<td style="text-align: center;">'. $room.'</td>
										<td style="text-align: center;">'. $prof.'</td>
										';
								echo '
										
										<td><a href="index.php?r=administrator/SetDailySched&currID='. $currID .'&scode='. $scode .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&day=' .$day. '" class="btn btn-mini btn-primary btn-block" style="width:45px">UPDATE</a><a href="index.php?r=administrator/deleteDailySched&currID='. $currID .'&scode='. $scode .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&day=' .$day. '" class="btn btn-mini btn-primary btn-block"style="width:45px">RESET</a><a href="index.php?r=administrator/AddDailySched&currID='. $currID .'&scode='. $scode .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&day=' .$day. '" class="btn btn-mini btn-primary btn-block"style="width:45px">ADD SCHED</a></td>
										
									</tr>
								';
							}
							echo '
									</tbody>
								</table>
								';
							
						}
						
						function getRoom($scode,$sem,$cID,$sy,$day)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_internaschedule where (scode ='$scode' and sem = '$sem' and schoolYear = '$sy' and courseID = '$cID' and sday = '$day') or (scode ='$scode' and sem = '$sem' and schoolYear = '$sy' and courseID = '$cID' and sday2 = '$day')";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							if($row['sday2']== $day)
							{
								$room = $row['sroom2'];
							}
							else
							{
								$room = $row['sroom'];
							}
							return $room;
						}
						
						function getProf($scode,$sem,$cID,$sy,$day)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_internaschedule where (scode ='$scode' and sem = '$sem' and schoolYear = '$sy' and courseID = '$cID' and sday = '$day') or (scode ='$scode' and sem = '$sem' and schoolYear = '$sy' and courseID = '$cID' and sday2 = '$day')";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$prof = getName($row['sprof']);
							return $prof;
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
						
						function getTime($scode,$sem,$cID,$sy,$day)
						{	
							include("config.php");
							$sql ="SELECT * FROM tbl_internaschedule where (scode ='$scode' and sem = '$sem' and schoolYear = '$sy' and courseID = '$cID' and sday = '$day') or (scode ='$scode' and sem = '$sem' and schoolYear = '$sy' and courseID = '$cID' and sday2 = '$day')";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							if($row['sday2']==$day)
							{
								$time = to12Hr($row['stimeS2']) . '-' . to12Hr($row['stimeE2']);
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
						
						/*
						function getSchedule($currID, $scode, $arg) 
						{
							include("config.php");
							$csem = 1;
							$stimeS = "";
							$stimeE = "";
							$sday = "";
							$sprof = "";
							$sroom = "";
							
							$sql = "SELECT * FROM tbl_internaschedule WHERE currID='$currID' AND scode='$scode'";
							$query = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($query)) {
								$stimeS = $row['stimeS'];
								$stimeE = $row['stimeE'];
								$sday = $row['sday'];
								$sprof = $row['sprof'];
								$sroom = $row['sroom'];
							}

							if($arg=="PROF") {
								$sprof = getName($sprof);
								return '<td>'. $sprof .'</td>';
							} else if($arg=="TIME") {
								if($stimeS!="") {
									return $sday . ' ' . to12Hr($stimeS) . '-' . to12Hr($stimeE) .' ' .$sroom;
								} else {
									return "";
								}
							}
						}*/
						
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
							if($ctime==700) {
								$strTime = "07:00 AM";
							} else if($ctime==730) {
								$strTime = "07:30 AM";
							} else if($ctime==800) {
								$strTime = "08:00 AM";
							} else if($ctime==830) {
								$strTime = "08:30 AM";
							} else if($ctime==900) {
								$strTime = "09:00 AM";
							} else if($ctime==930) {
								$strTime = "09:30 AM";
							} else if($ctime==1000) {
								$strTime = "10:00 AM";
							} else if($ctime==1030) {
								$strTime = "10:30 AM";
							} else if($ctime==1100) {
								$strTime = "11:00 AM";
							} else if($ctime==1130) {
								$strTime = "11:30 AM";
							} else if($ctime==1200) {
								$strTime = "12:00 NN";
							} else if($ctime==1230) {
								$strTime = "12:30 NN";
							} else if($ctime==1300) {
								$strTime = "01:00 PM";
							} else if($ctime==1330) {
								$strTime = "01:30 PM";
							} else if($ctime==1400) {
								$strTime = "02:00 PM";
							} else if($ctime==1430) {
								$strTime = "02:30 PM";
							} else if($ctime==1500) {
								$strTime = "03:00 PM";
							} else if($ctime==1530) {
								$strTime = "03:30 PM";
							} else if($ctime==1600) {
								$strTime = "04:00 PM";
							} else if($ctime==1630) {
								$strTime = "04:30 PM";
							} else if($ctime==1700) {
								$strTime = "05:00 PM";
							} else if($ctime==1730) {
								$strTime = "05:30 PM";
							} else if($ctime==1800) {
								$strTime = "06:00 PM";
							} else if($ctime==1830) {
								$strTime = "06:30 PM";
							} else if($ctime==1900) {
								$strTime = "07:00 PM";
							} else if($ctime==1930) {
								$strTime = "07:30 PM";
							} else if($ctime==2000) {
								$strTime = "08:00 PM";
							} else if($ctime==2030) {
								$strTime = "08:30 PM";
							} else if($ctime==2100) {
								$strTime = "09:00 PM";
							} else if($ctime==2130) {
								$strTime = "09:30 PM";
							} else if($ctime==2200) {
								$strTime = "10:00 PM";
							} else if($ctime==2230) {
								$strTime = "10:30 PM";
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
</tbody>
</table>

</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar-->
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

