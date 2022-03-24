<?php
session_start();
include("config.php");
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {
				header("location:index.php?r=faculty/");

	}
} else {
	header("location:index.php?r=site/");
}

// // Define the stupid root
// define('ROOT', __DIR__.'/');

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
<title>Schedule | Teaching Load </title>
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
<header class=container-aligner id=page-title>
<!-- Title and summary -->

<!-- End - Title and summary -->
<!-- Title right side -->
<section class='title-right portfolio-filter'>
<a data-category=design href='http://www.puptaguig.net'>Home</a>
<a data-category=design href="index.php?r=faculty/">Profile</a>
<a data-category=design href="index.php?r=faculty/ServiceCredit">Service Credit</a>
<a class=current-cat data-category=all href="index.php?r=faculty/TeachingLoad">Schedule</a>
<a data-category=design href="index.php?r=faculty/logout">Log out</a>
</section>
<!-- End - Title right side -->
</header>
<section id='page-body-content'>
<div id='page-body-content-inner'>
<!-- Page content -->

<div id='page-content'>
<!-- Video - HTML5 -->
<section>
</section>
<?php
	if(isset($_POST['sday2']))
	{
		$day2 = $_POST['sday2'];
	}else
	{
		$day2 = "";
	}
	if(isset($_POST['timeS2']))
	{
		$timeS2 = $_POST['timeS2'];
	}else
	{
		$timeS2 = "";
	}
	if(isset($_POST['timeE2']))
	{
		$timeE2 = $_POST['timeE2'];
	}else
	{
		$timeE2 = "";
	}
	if(isset($_POST['roomName2']))
	{
		$roomName2 = $_POST['roomName2'];
	}else
	{
		$roomName2 = "";
	}
	$day = $_POST['sday'];
	$timeS = $_POST['timeS'];
	$timeE = $_POST['timeE'];
	$roomName = $_POST['roomName'];
	$profName = $_POST['profName'];
	$courseID = $_GET['courseID'];
	$currID = $_GET['currID'];
	$cyear = $_GET['cyear'];
	$sprof = $_GET['sprof'];
	$scode = $_GET['scode'];
	$sem = $_GET['sem'];
	$schedID = $_GET['schedID'];
	$sy = $_GET['sy'];
	$sec = $_GET['sec'];
	$title = $_GET['title'];
	$units = $_GET['units'];
	$lec = $_GET['lec'];
	$lab = $_GET['lab'];
	$sql = "SELECT schedID FROM tbl_schedule WHERE currID= '$currID' and courseID = '$courseID' and cyear = '$cyear' and scode = '$scode' and schoolYear = '$sy' and csection = '$sec'";
		$result = mysql_query($sql);
		while($row=mysql_fetch_array($result))
		{
			$schedID = $row['schedID'];
		}

	$valid = checkPrefSched($day, $timeS, $timeE, $profName, $schedID);
	if($valid)
	{
		$sql = "SELECT * FROM tbl_schedule WHERE currID= '$currID' and courseID = '$courseID' and cyear = '$cyear' and scode = '$scode' and schoolYear = '$sy' and csection = '$sec'";
		$result = mysql_query($sql);
		#echo $sql;
		if($result)
		{

            // The code of Christian
            $path = $_SERVER['DOCUMENT_ROOT'].'/home/FSISCS/uploads/';
            $path = $path . basename( $_FILES['file_upload']['name']);

            $uploaded_name = basename($_FILES['file_upload']['name']);
            if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $path)) {
                echo "The file ".  basename( $_FILES['file_upload']['name']).
                    " has been uploaded";
                echo "<br>";
            } else{
                echo "There was an error uploading the file, please try again!";
            }


            // Insertion of request into tbl_requestschedule
            $sql = "INSERT INTO tbl_requestschedule".
                 "(request_id, schedID, currID, courseID, csection, cyear, scode, stitle, units, lec, lab, sday, stimeS, stimeE, sroom, sprof,".
                 "sem, schoolYear, status, datemodified, daterequested, reason, sday2, stimeS2, stimeE2, sroom2, uploaded_file, load_type)".
                 "VALUES ('', '$schedID', '$currID', '$courseID', '$sec', '$cyear', '$scode', '$title', '$units', '$lec', '$lab', '$day', '$timeS', ".
                 "'$timeE', '$roomName', '$profName', '$sem', '$sy', 'Pending', NOW(), NOW(), '', '$day2', '$timeS2', '$timeE2', '$roomName2', '$uploaded_name', '')";


            $count=mysql_num_rows($result);
                    if($count>0){


                        // $sql = "INSERT INTO tbl_requestschedule VALUES ('','$schedID','$currID','$courseID','$sec','$cyear','$scode','$title','$units','$lec','$lab','$day','$timeS','$timeE','$roomName','$profName','$sem','$sy','Pending','',NOW(),'','','','','','$uploaded_name','')";


                        $result = mysql_query($sql);


                        if($result)
                        {
                            if($_SESSION['isAdmin'] == 0)
                            {
                                header("Location: index.php?r=faculty/TeachingLoad");
                                mysql_close();
                            }
                            else
                            {
                                header("Location: index.php?r=administrator/SchedulingSystem");
                                mysql_close();
                            }
                        }
                    }
                    else
                    {

                        $result = mysql_query($sql);

                        if($result)
                        {
                            if($_SESSION['isAdmin'] == 0)
                            {
                                header("Location: index.php?r=faculty/TeachingLoad");
                                mysql_close();
                            }
                            else
                            {
                                header("Location: index.php?r=administrator/SchedulingSystem");
                                mysql_close();
                            }
                        }
                    }
		}
	}
	else
	{
			echo"
			<script>

			alert('Conflict with another schedule!');
			</script>";

			echo'

						<table class="table table-bordered table-hover responsive-utilities" style="margin-left:-65px">
						  <tbody>
						  <tr>
							<td class="table-narrow" colspan = "4">
							<h4><strong>Conflict:</strong></h4>
							</td>
						</tr>
							<tr>
								<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">Course:</td>
								<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Year&Section</td>
								<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Subject</td>
								<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Room</td>
								<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Day</td>
								<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Start</td>
								<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">End</td>
								<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Sem</td>
								<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">Professor</td>
							</tr>
						';
		$sql = "SELECT * FROM tbl_internaschedule WHERE stimeS >= '$timeS' AND stimeS < '$timeE' and ((sday = '$day' && sroom = '$roomName'&& schoolYear = '$sy' && sem = '$sem') or (sday = '$day' && sroom = '$roomName'&& schoolYear = '$sy' && sem = '$sem')) or (stimeE > '$timeS' AND stimeE < '$timeE' and (sday = '$day' && sroom = '$roomName'&& schoolYear = '$sy' && sem = '$sem')) or (sday = '$day' && stimeS < '$timeS' && stimeE > '$timeE' && sroom = '$roomName'&& schoolYear = '$sy' && sem = '$sem') or stimeS >= '$timeS' AND stimeS < '$timeE' and ((sday = '$day' && sprof = '$sprof'&& schoolYear = '$sy' && sem = '$sem') or (sday = '$day' && sprof = '$sprof'&& schoolYear = '$sy' && sem = '$sem')) or (stimeE > '$timeS' AND stimeE < '$timeE' and (sday = '$day' && sprof = '$sprof'&& schoolYear = '$sy' && sem = '$sem')) or (sday = '$day' && stimeS < '$timeS' && stimeE > '$timeE' && sprof = '$sprof'&& schoolYear = '$sy' && sem = '$sem')";
		$result = mysql_query($sql);

		while ($row = mysql_fetch_array($result)) {
				echo'
										<tr>
											<td style="text-align: left;">'. getCourse($row['courseID']) .'</td>
											<td style="text-align: left;">'. $row['cyear']. '-'.$row['csection'].'</td>
											<td style="text-align: left;">'. getSubj($row['scode']) .'</td>
											<td style="text-align: left;">'. $row['sroom'].'</td>
											<td style="text-align: left;">'. $row['sday'].'</td>
											<td style="text-align: center;">'. to12Hr($row['stimeS']) .' </td>
											<td style="text-align: center;">'. to12Hr($row['stimeE']) .' </td>
											<td style="text-align: center;">'.$row['sem'] .' </td>
											<td style="text-align: left;">'. getName($row['sprof']) .'</td>
										</tr>';

			}
								echo'

								</tbody>
								</table>
								<a href="index.php?r=faculty/SubjectLoad" class="btn btn-mini btn-primary btn-block" text-decoration:none; color:white; margin-left:-65px;">BACK</a>';

	}

	function checkPrefSched($day, $timein, $timeout, $fcode, $schedID)
	{
		$courseID = $_GET['courseID'];
		$cyear = $_GET['cyear'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$day = $_POST['sday'];
		$timeS = $_POST['timeS'];
		$timeE = $_POST['timeE'];
		$roomName = $_POST['roomName'];
		$profName = $_POST['profName'];
		$sql = "SELECT * FROM tbl_internaschedule WHERE sday='$day' and sroom='$roomName' and sem='$sem' and schoolYear='$sy' and schedID != '$schedID'";
		$result = mysql_query($sql);
		$valid = true;
		while($row=mysql_fetch_array($result))
		{
			if($day == $row['sday'] and $timeS == $row['stimeS'] and $timeE == $row['stimeE'] and $profName == $row['sprof'] and $roomName <> $row['sroom'])
			{
				$valid = true;
			}
			else if($roomName <> "")
			{
				if($row['sday']==$day)
				{
					if($timein > $timeout){
						$valid=false;
						$message= "Time start is greater than time end";
					}else if($timein == $timeout){
						$valid=false;
						$message = "Time start is equal to time end";
					}else if(($timein == $row['stimeS'] and $cyear == $row['cyear'] and $courseID == $row['courseID'] and $profName == $row['sprof']) or ($timein == $row['stimeS'] and $roomName == $row['sroom']) or ($timein == $row['stimeS'] and $profName == $row['sprof'])){
						$valid=false;
					}else if(($timein < $row['stimeS'] and $timeout > $row['stimeS'] and $cyear == $row['cyear'] and $courseID == $row['courseID'] and $profName == $row['sprof']) or ($timein < $row['stimeS'] and $timeout > $row['stimeS'] and $roomName == $row['sroom'] and $profName == $row['sprof']) or ($timein < $row['stimeS'] and $timeout > $row['stimeS'] and $profName == $row['sprof'])){
						$valid=false;
					}else if(($timein > $row['stimeS'] and $timein < $row['stimeE'] and $cyear == $row['cyear'] and $courseID == $row['courseID'] and $profName == $row['sprof']) or ($timein > $row['stimeS'] and $timein < $row['stimeE'] and $roomName == $row['sroom'] and $profName == $row['sprof']) or ($timein > $row['stimeS'] and $timein < $row['stimeE'] and $profName == $row['sprof'])){
						$valid=false;
					}else if(($timein > $row['stimeS'] and $timeout < $row['stimeE'] and $cyear == $row['cyear'] and $courseID == $row['courseID'] and $profName == $row['sprof']) or ($timein > $row['stimeS'] and $timeout < $row['stimeE'] and $roomName == $row['sroom'] and $profName == $row['sprof']) or ($timein > $row['stimeS'] and $timeout < $row['stimeE'] and $profName == $row['sprof'])){
					$valid=false;
					}
				}
			}
			else
			{
				if($row['sday']==$day)
				{
					if($timein > $timeout){
						$valid=false;
						$message= "Time start is greater than time end";
					}else if($timein == $timeout){
						$valid=false;
						$message = "Time start is equal to time end";
					}else if(($timein == $row['stimeS'] and $cyear == $row['cyear'] and $courseID == $row['courseID'] and $profName == $row['sprof']) or ($timein == $row['stimeS'] and $profName == $row['sprof'])){
						$valid=false;
					}else if(($timein < $row['stimeS'] and $timeout > $row['stimeS'] and $cyear == $row['cyear'] and $courseID == $row['courseID'] and $profName == $row['sprof']) or ($timein < $row['stimeS'] and $timeout > $row['stimeS'] and $profName == $row['sprof'])){
						$valid=false;
					}else if(($timein > $row['stimeS'] and $timein < $row['stimeE'] and $cyear == $row['cyear'] and $courseID == $row['courseID'] and $profName == $row['sprof']) or $timein > $row['stimeS'] and $timein < $row['stimeE'] and $profName == $row['sprof']){
						$valid=false;
					}else if(($timein > $row['stimeS'] and $timeout < $row['stimeE'] and $cyear == $row['cyear'] and $courseID == $row['courseID'] and $profName == $row['sprof']) or ($timein > $row['stimeS'] and $timeout < $row['stimeE'] and $profName == $row['sprof'])){
					$valid=false;
					}
				}
			}
		}
		return $valid;
	}


	function getName($fcode)
	{
		$Name = "";
		$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			$Name = $row['LName'] .', '. $row['FName'];
		}
		return $Name;
	}
	function getCourse($courseID)
	{
		$course_code = "";
		$sql = "SELECT * FROM tbl_course WHERE course = '$courseID'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			$course_code = $row['course_code'];
		}
		return $course_code;
	}
	function getSubj($scode)
	{
		$Subject = "";
		$sql = "SELECT * FROM tbl_subjects WHERE SubjCode = '$scode'";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			$Subject = $row['SubjDescription'];
		}
		return $Subject;
	}

	function to12Hr($stime) {
		$strTime = "";
		if($stime==700) {
			$strTime = "07:00 AM";
		} else if($stime==730) {
			$strTime = "07:30 AM";
		} else if($stime==800) {
			$strTime = "08:00 AM";
		} else if($stime==830) {
			$strTime = "08:30 AM";
		} else if($stime==900) {
			$strTime = "09:00 AM";
		} else if($stime==930) {
			$strTime = "09:30 AM";
		} else if($stime==1000) {
			$strTime = "10:00 AM";
		} else if($stime==1030) {
			$strTime = "10:30 AM";
		} else if($stime==1100) {
			$strTime = "11:00 AM";
		} else if($stime==1130) {
			$strTime = "11:30 AM";
		} else if($stime==1200) {
			$strTime = "12:00 NN";
		} else if($stime==1230) {
			$strTime = "12:30 NN";
		} else if($stime==1300) {
			$strTime = "01:00 PM";
		} else if($stime==1330) {
			$strTime = "01:30 PM";
		} else if($stime==1400) {
			$strTime = "02:00 PM";
		} else if($stime==1430) {
			$strTime = "02:30 PM";
		} else if($stime==1500) {
			$strTime = "03:00 PM";
		} else if($stime==1530) {
			$strTime = "03:30 PM";
		} else if($stime==1600) {
			$strTime = "04:00 PM";
		} else if($stime==1630) {
			$strTime = "04:30 PM";
		} else if($stime==1700) {
			$strTime = "05:00 PM";
		} else if($stime==1730) {
			$strTime = "05:30 PM";
		} else if($stime==1800) {
			$strTime = "06:00 PM";
		} else if($stime==1830) {
			$strTime = "06:30 PM";
		} else if($stime==1900) {
			$strTime = "07:00 PM";
		} else if($stime==1930) {
			$strTime = "07:30 PM";
		} else if($stime==2000) {
			$strTime = "08:00 PM";
		} else if($stime==2030) {
			$strTime = "08:30 PM";
		} else if($stime==2100) {
			$strTime = "09:00 PM";
		} else if($stime==2130) {
			$strTime = "09:30 PM";
		} else if($stime==2200) {
			$strTime = "10:00 PM";
		} else if($stime==2230) {
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
</section>
<!-- End - Page body content -->
</div>
<!-- End - Page content -->
<!-- Page sidebar-->
<aside class=page-sidebar>
<section class='widget-container widget-categories'>
<h2 class=widget-heading>Schedule Management</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>

<li>
<a>Teaching Load</a>
<span class=widget-hint><a href='index.php?r=faculty/SubjectLoad'>View</a></span>
</li>
<li>
<a>Subject Preference</a>
<span class=widget-hint><a href='FORMS/Birthday Form.docx'>Manage</a></span>
</li>


</ul>

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
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>

