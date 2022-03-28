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
<title>Schedule Management | Set</title>
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

<h2 class=underlined-header style="margin-left:-65px;">  <?php echo $_GET['scode'];?></h2>

<?php
	session_start();
	$base = Yii::app()->getBaseUrl();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");

	if(isset($_POST['sday2']))
	{
		$day2 = $_POST['sday2'];
	}else{
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
		$room2 = $_POST['roomName2'];
	}else
	{
		$room2 = "";
	}
	
	$schedID = $_GET['schedID'];
	$profold = $_GET['prof'];
	$day = $_POST['sday'];
	$timeS = $_POST['timeS'];
	$timeE = $_POST['timeE'];
	$roomName = $_POST['roomName'];
	$profName = $_POST['profName'];
	$courseID = $_GET['courseID'];
	$currID = $_GET['currID'];
	$cyear = $_GET['cyear'];
	$scode = $_GET['scode'];
	$sem = $_GET['sem'];
	$sy = $_GET['sy'];
	$sec = $_GET['sec'];
	$title = $_GET['title'];
	$units = $_GET['units'];
	$lec = $_GET['lec'];
	$lab = $_GET['lab'];

$check = checkFirstParameters($day, $timeS, $timeE, $roomName, $profName);
if($check == 'pass'){
	$prefSched = checkPrefProfSched($day, $timeS, $timeE, $sy, $profName, $sem);
	if($prefSched > 0){
	$valid1 = checkRoomSched($day, $timeS, $timeE, $sem, $sy, $roomName, $schedID);
		if($valid1 <= 0)
		{

			$valid2 = checkProfSched($day, $timeS, $timeE, $sem, $sy, $profName, $schedID);
			if($valid2 <= 0){

				$valid3 = checkCourseSched($day, $timeS, $timeE, $sem, $sy, $courseID, $schedID);
				if($valid3 <= 0){
					$sql = "SELECT * FROM tbl_schedule WHERE schedID=".$schedID."";
					$result = mysqli_query($conn,$sql);	
					if($result)
					{
						$count=mysqli_num_rows($result);

						if($count>0){
							if ($profold == $profName) {
								// echo $days2;
								if ($day2 == "" and $timeS2 == "" and $timeE2 == "" and $room2 == "") {
									$sql="UPDATE tbl_schedule SET sday='$day', stimeS='$timeS', stimeE='$timeE', sroom='$roomName', sprof='$profName' where schedID=".$schedID."";
									echo $sql;
									$result=mysqli_query($conn,$sql);
									header("Location: index.php?r=administrator/SchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=2");
									mysqli_close($conn);
								} else {
									$sql="UPDATE tbl_schedule SET sday='$day', stimeS='$timeS', stimeE='$timeE', sroom='$roomName', sprof='$profName', sday2 = '".$day2."', stimeS2 = '$timeS2', stimeE2 = '$timeE2', sroom2 = '$room2' WHERE schedID=".$schedID."";
									echo $sql;
									$result=mysqli_query($conn,$sql);
									header("Location: index.php?r=administrator/SchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=2");
									mysqli_close($conn);
								}
								
							} else {

								// DiminishFacultyLoadUnit($profold, $profName, $sy, $units, $sem, $day, $timeS, $timeE, $courseID, $currID, $scode);
								
								// $load_type = FacultyLoad($profName, $sy, $units, $sem);

								if ($day2 == "" and $timeS2 == "" and $timeE2 == "" and $room2 == "") {
									$sql="UPDATE tbl_schedule SET sday='$day', stimeS='$timeS', stimeE='$timeE', sroom='$roomName', sprof='$profName', load_type = NULL where schedID=".$schedID."";
									echo $sql;
									$result=mysqli_query($conn,$sql);
									header("Location: index.php?r=administrator/SchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=2");
									mysqli_close($conn);
								} else {
									$sql="UPDATE tbl_schedule SET sday='$day', stimeS='$timeS', stimeE='$timeE', sroom='$roomName', sprof='$profName', sday2 = '".$day2."', stimeS2 = '$timeS2', stimeE2 = '$timeE2', sroom2 = '$room2', load_type = NULL where schedID=".$schedID."";
									echo $sql;
									$result=mysqli_query($conn,$sql);
									header("Location: index.php?r=administrator/SchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=2");
									mysqli_close($conn);
								}
							}
							
							
						}
						else
						{
							$sql = "INSERT INTO tbl_schedule VALUES ('','$currID','$courseID','$sec','$cyear','$scode','$title','$units','$lec','$lab','$day','$timeS','$timeE','$roomName','$profName','$sem','$sy','','','','','0')";
							$result = mysqli_query($conn,$sql);	
							echo $sql;
							if($result)
							{
								header("Location: index.php?r=administrator/SchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=1");
							mysqli_close($conn);
							}
						}
					}
				} else {
					echo"
					<script src='".$base."assets/jquery-3.6.0.min.js'></script>
					<script src='".$base."assets/sweetalert2.all.min.js'></script>
					<script>

						Swal.fire({
							icon:'error',
							title:'Ooops!',
							text:'Conflict with the Student Course Schedule!'
							
						})
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
				$sql = "SELECT * FROM tbl_schedule WHERE sday = '$day' && (stimeS BETWEEN ".$timeS." and ".$timeE." or stimeE BETWEEN ".$timeS." and ".$timeE.") && courseID = '$courseID' && schoolYear = '$sy' && sem = '$sem' && Sched_type = 'OFFICIAL'";
				
				$result = mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_array($result)) {
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
										<a href="index.php?r=administrator/SetSchedule&schedID='.$schedID.'&prof='.$profold.'&day='.$day.'&timeS='.$timeS.'&timeE='.$timeE.'&roomName='.$roomName.'&profName='.$profName.'&CurrID='. $currID .'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem .' &sy='. $sy .'&sec='. $sec .'&title='.$title.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-65px;">BACK</a>';
				}
			} else {
				echo"
				<script src='".$base."assets/jquery-3.6.0.min.js'></script>
				<script src='".$base."assets/sweetalert2.all.min.js'></script>
				<script>

				Swal.fire({
					icon:'error',
					title:'Ooops!',
					text:'Conflict with the Faculty Schedule!'
					
				})
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
			$sql = "SELECT * FROM tbl_schedule WHERE sday = '$day' && (stimeS BETWEEN ".$timeS." and ".$timeE." or stimeE BETWEEN ".$timeS." and ".$timeE.") && sprof = '$profName' && schoolYear = '$sy' && sem = '$sem' && Sched_type = 'OFFICIAL'";
			
			$result = mysqli_query($conn,$sql);
			while ($row = mysqli_fetch_array($result)) {
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
									<a href="index.php?r=administrator/SetSchedule&schedID='.$schedID.'&prof='.$profold.'&day='.$day.'&timeS='.$timeS.'&timeE='.$timeE.'&roomName='.$roomName.'&profName='.$profName.'&CurrID='. $currID .'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem .' &sy='. $sy .'&sec='. $sec .'&title='.$title.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-65px;">BACK</a>';
			}
		}
	else
		{
				echo"
				<script src='".$base."FSIS/assets/jquery-3.6.0.min.js'></script>
				<script src='".$base."FSIS/assets/sweetalert2.all.min.js'></script>
				<script>

				Swal.fire({
					icon:'error',
					title:'Ooops!',
					text:'Conflict with the Room Schedule!'
					
				})
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
			$sql = "SELECT * FROM tbl_schedule WHERE sday = '$day' && (stimeS BETWEEN ".$timeS." and ".$timeE." or stimeE BETWEEN ".$timeS." and ".$timeE.") && sroom = '$roomName' && schoolYear = '$sy' && sem = '$sem' && Sched_type = 'OFFICIAL'";
			
			$result = mysqli_query($conn,$sql);
			while ($row = mysqli_fetch_array($result)) {
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
									<a href="index.php?r=administrator/SetSchedule&schedID='.$schedID.'&prof='.$profold.'&day='.$day.'&timeS='.$timeS.'&timeE='.$timeE.'&roomName='.$roomName.'&profName='.$profName.'&CurrID='. $currID .'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem .' &sy='. $sy .'&sec='. $sec .'&title='.$title.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-65px;">BACK</a>';				

		}
		} else {
		echo"
				<script src='".$base."assets/jquery-3.6.0.min.js'></script>
				<script src='".$base."assets/sweetalert2.all.min.js'></script>
				<script>
				
				Swal.fire({
					icon:'error',
					title:'Ooops!',
					text:'Conflict to the Professor\'s\ Preferred Schedule!',
					timer: '5000'
				})
				</script>";
		
				echo'
										
							<table class="table table-bordered table-hover responsive-utilities" style="margin-left:-65px">
							  <tbody>
							  <tr>
								<td class="table-narrow" colspan = "4">
								<h4><strong>Faculty Name: '.getName($profName).'</strong><br /></h4>
								</td>
							</tr>
								<tr>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">PREFERRED DAY</td>
									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">PREFERRED TIME</td>
								</tr>
							';
			

			$sql = "SELECT * FROM tbl_timepreferences WHERE schoolYear = '$sy' && sem = '$sem' && sprof = '$profName'";
			
			$result = mysqli_query($conn,$sql);
			while ($row = mysqli_fetch_array($result)) {
				if ($row['Whole_Day']==1) {
					echo'
						<tr>	
							<td style="text-align: center;">'. $row['sday'] .'</td>
							<td style="text-align: center;">WHOLE DAY</td>			
						</tr>';
				} else {
					echo'
						<tr>	
							<td style="text-align: center;">'. $row['sday'] .'</td>
							<td style="text-align: center;">'. to12Hr($row['stimeS']).'-'.to12Hr($row['stimeE']).'</td>			
						</tr>';	
				}
					
			}

				
									echo'
									
									</tbody>
									</table>
									<a href="index.php?r=administrator/SetSchedule&schedID='.$schedID.'&prof='.$profold.'&day='.$day.'&timeS='.$timeS.'&timeE='.$timeE.'&roomName='.$roomName.'&profName='.$profName.'&CurrID='. $currID .'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem .' &sy='. $sy .'&sec='. $sec .'&title='.$title.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-65px;">BACK</a>';
	}

	} else {
		header("location:index.php?r=administrator/SetSchedule&schedID=$schedID&prof=$profold&CurrID=$currID&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sy=$sy&sec=$sec&title=$title&units=$units&lec=$lec&lab=$lab&mes=1");
	}
	
	
	function checkFirstParameters($day, $timein, $timeout, $roomName, $profName){
		$valid = "";
		if($day == "" OR $timein == "" OR $timeout == "" OR $roomName == "" OR $profName == ""){
			$valid = "fail";
		} else if($timein > $timeout){
			$valid = "fail";
		} else if($timein == $timeout){
			$valid = "fail";
		} else {
			$valid = "pass";
		}
		return $valid;
	}
	
	function checkRoomSched($day, $timein, $timeout, $sem, $sy, $roomName, $schedID)
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_schedule WHERE (stimeS BETWEEN ".$timein." and ".$timeout." or stimeE BETWEEN ".$timein." and ".$timeout.") and sday='".$day."' and schedID != ".$schedID." and sem=".$sem." and schoolYear='".$sy."' and sroom = '".$roomName."'and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);

		return $count;
	}

	function checkProfSched($day, $timein, $timeout, $sem, $sy, $profName, $schedID)
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_schedule WHERE (stimeS BETWEEN ".$timein." and ".$timeout." or stimeE BETWEEN ".$timein." and ".$timeout.") and sday='".$day."' and schedID != ".$schedID." and sem=".$sem." and schoolYear='".$sy."' and sprof = '".$profName."'and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);

		
		return $count;
	}

	function checkCourseSched($day, $timein, $timeout, $sem, $sy, $courseID, $schedID){
		include("config.php");
		$sql = "SELECT * FROM tbl_schedule WHERE (stimeS BETWEEN ".$timein." and ".$timeout." or stimeE BETWEEN ".$timein." and ".$timeout.") and sday='".$day."' and schedID != ".$schedID." and sem=".$sem." and schoolYear='".$sy."' and courseID = '".$courseID."' and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		
		
		return $count;
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
	function getCourse($courseID)
	{
		include("config.php");
		$course_code = "";
		$sql = "SELECT * FROM tbl_course WHERE course = '$courseID'";
		$result = mysqli_query($conn,$sql);	
		while($row = mysqli_fetch_array($result)){
			$course_code = $row['course_code'];
		}
		return $course_code;
	}
	function getSubj($scode)
	{
		include("config.php");
		$Subject = "";
		$sql = "SELECT * FROM tbl_subjects WHERE SubjCode = '$scode'";
		$result = mysqli_query($conn,$sql);	
		while($row = mysqli_fetch_array($result)){
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

	function FacultyLoad($fcode, $sy, $units, $sem){
		include("config.php");
		$load_type="";
		$sql1 = "SELECT * FROM tbl_facultycurrentload WHERE FCode='".$fcode."' and schoolYear ='".$sy."' and sem =".$sem."";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_array($result1);
		$count = mysqli_num_rows($result1);
		$regular = $row1['Regular_Load'];
		$partTime = $row1['PartTime_Load'];
		$tsLoad = $row1['TeachingSub_Load'];

		if($count<=0){
			$sqleval = "SELECT Regular_Load, PartTime_Load FROM tbl_evaluationfaculty WHERE FCode = '".$fcode."'";
			$result = mysqli_query($conn, $sqleval);
			$row = mysqli_fetch_array($result);
			$reg = $row['Regular_Load'];
			// $part = $row['PartTime_Load'];


			$sqlfac = "INSERT INTO tbl_facultycurrentload VALUES('','".$fcode."',0,0,0,".$sem.",'".$sy."')";
			mysqli_query($conn,$sqlfac);
			
			
			if($reg == 0){
				$sqlup = "UPDATE tbl_facultycurrentload SET PartTime_Load = '".$units."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' AND  sem = '".$sem."'";
				$load_type = 0;
			} else {
				$sqlup = "UPDATE tbl_facultycurrentload SET Regular_Load = '".$units."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' AND  sem = '".$sem."'";
				$load_type = 1;
			}
			mysqli_query($conn,$sqlup);
		} else {
			$sqleval = "SELECT Regular_Load, PartTime_Load, TeachingSub_Load FROM tbl_evaluationfaculty WHERE FCode = '".$fcode."'";
			$result = mysqli_query($conn, $sqleval);
			$row = mysqli_fetch_array($result);
			$reg = $row['Regular_Load'];
			$part = $row['PartTime_Load'];
			$ts = $row['TeachingSub_Load'];
			$sum = 0;
			
			if($reg == 0){
				$sum = $partTime + $units;

				if ($sum >= $part) {
					$sum = 0;
					$sum = $tsLoad + $units;
					$sqlup = "UPDATE tbl_facultycurrentload SET TeachingSub_Load = '".$sum."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' AND sem = '".$sem."'";
					$load_type = 2;
				} else {
					$sqlup = "UPDATE tbl_facultycurrentload SET PartTime_Load = '".$sum."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' AND sem = '".$sem."'";
					$load_type = 0;
				}
			} else if($reg == 9){
			$sum = $regular + $units;
				if ($sum >= $reg) {
					$sum = 0;
					$sum = $tsLoad + $units;
					$sqlup = "UPDATE tbl_facultycurrentload SET TeachingSub_Load = '".$sum."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' AND  sem = '".$sem."'";
					$load_type = 2;
				} else {
					$sqlup = "UPDATE tbl_facultycurrentload SET Regular_Load = '".$sum."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' and sem = ".$sem."";
					$load_type = 1;
				}
				
				
			} else {
				$sum = $regular + $units;
				if ($sum >= $reg) {
					$sum = 0;
					$sum = $partTime + $units;

					if ($sum >= $part) {
						$sum = 0;
						$sum = $tsLoad + $units;
						$sqlup = "UPDATE tbl_facultycurrentload SET TeachingSub_Load = '".$sum."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' AND  sem = '".$sem."'";
						$load_type = 2;
					} else {
						$sqlup = "UPDATE tbl_facultycurrentload SET PartTime_Load = '".$sum."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' AND  sem = '".$sem."'";
						$load_type = 0;
					}
					
				} else {
					$sqlup = "UPDATE tbl_facultycurrentload SET Regular_Load = '".$sum."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' AND  sem = '".$sem."'";
					$load_type = 1;
				}
			
			}
			mysqli_query($conn,$sqlup);
		}

		return $load_type;
	}

	function DiminishFacultyLoadUnit($profold, $fcode, $sy, $units, $sem, $day, $timeS, $timeE, $courseID, $currID, $scode){
		include('config.php');
		$sql = "SELECT * FROM tbl_schedule WHERE currID = '".$currID."' AND courseID = '".$courseID."' AND sday = '".$day."' AND stimeS = '".$timeS."' AND stimeE = '".$timeE."' AND sprof = '".$profold."' AND sday = '".$day."' AND scode = '".$scode."' AND sem = '".$sem."' AND schoolYear = '".$sy."' AND Sched_type = 'OFFICIAL'";

		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);

		$sqlfac = "SELECT * FROM tbl_facultycurrentload WHERE FCode = '".$profold."' AND sem = '".$sem."' AND schoolYear = '".$sy."'";
		$result2 = mysqli_query($conn, $sqlfac);
		$row2 = mysqli_fetch_array($result2);
		$regular = $row2['Regular_Load'];
		$partTime = $row2['PartTime_Load'];
		$ts = $row2['TeachingSub_Load'];

		if ($row['load_type'] == 0) {
			$total = $partTime - $units;
			$up = "UPDATE tbl_facultycurrentload SET PartTime_Load = ".$total." WHERE FCode = '".$profold."' AND schoolYear = '".$sy."' AND  sem = '".$sem."'";
			mysqli_query($conn, $up);
		} else if($row['load_type']==2){
			$total = $ts - $units;
			$up = "UPDATE tbl_facultycurrentload SET TeachingSub_Load = ".$total." WHERE FCode = '".$profold."' AND schoolYear = '".$sy."' AND  sem = '".$sem."'";
			mysqli_query($conn, $up);
		} else {
			$total = $regular - $units;
			$sqlup = "UPDATE tbl_facultycurrentload SET Regular_Load = ".$total." WHERE FCode ='".$profold."' AND schoolYear = '".$sy."' AND sem = '".$sem."'";
			mysqli_query($conn, $sqlup);
			
		}

		
		
	}

	function checkPrefProfSched($day, $timeS, $timeE, $sy, $profName, $sem){
		include("config.php");
		$sql = "SELECT * FROM tbl_timepreferences WHERE sprof = '".$profName."' AND sday = '".$day."' AND schoolYear = '".$sy."' AND sem = '".$sem."'";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);
		$check = 0;

		if ($count >= 0) {
			while ($row = mysqli_fetch_array($result)) {
				if ($row['Whole_Day']==1) {
					$check = 1;
					break 1;
				}
				if ($timeS >= $row['stimeS'] && $timeS <= $row['stimeE']) {
					$check = 1;
					break 1;
				}
			}
		}
		return $check;
	}
?>
</section>
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->
<aside class=page-sidebar>
<section class='widget-container2 widget-categories'>
<h2 class=widget-heading>Profile</h2>
<div class=widget-content>
<ul class='widget-list categories-list'>
<?php include("SchedulingMenu.php");?>
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
<script id=js-dispatcher src='scripts/scripts.js'></script>
</body>
</html>

