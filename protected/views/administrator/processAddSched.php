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
<?php if (isset($_GET['mes'])) : ?>
	<?php if ($_GET['mes']==1): ?>
	<div class="flash-data" data-flashdata="<?= $_GET['mes']?>"></div>
	<?php endif;?>
<?php endif;?>

<h2 class=underlined-header style="margin-left:-65px;">  <?php echo $_GET['scode'];?></h2>
<?php
	session_start();
	$base = Yii::app()->getBaseUrl();
	$prof = $_GET['prof'];
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
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
	$valid1 = "";
	$valid2 = "";
	$valid3 = "";


// $ping = CheckLoad($profName, $sy, $units, $sem);
// if ($ping <= 0) {
	$check = checkFirstParameters($day, $timeS, $timeE, $roomName, $profName);
	if ($check == 'pass') {
		if ($profName == "") {
			$prefSched = checkPrefProfSched($day, $timeS, $timeE, $sy, $prof, $sem);
		} else {
			$prefSched = checkPrefProfSched($day, $timeS, $timeE, $sy, $profName, $sem);
		}
		// echo $prefSched;
	if($prefSched > 0){
		$valid1 = checkRoomSched($day, $timeS, $timeE, $sem, $sy, $roomName);

		if($valid1 <= 0){
			$valid2 = checkProfSched($day, $timeS, $timeE, $sem, $sy, $profName);

			if($valid2 <= 0){
				$valid3 = checkCourseSched($day, $timeS, $timeE, $sem, $sy, $courseID);

				if($valid3 <= 0){
					$sql = "SELECT * FROM tbl_schedule WHERE currID= '$currID' and courseID = '$courseID' and cyear = '$cyear' and scode = '$scode' and schoolYear = '$sy' and csection = '$sec' and Sched_type = 'OFFICIAL'";
					$result = mysqli_query($conn,$sql);
					$count=mysqli_num_rows($result);
					$row = mysqli_fetch_array($result);
					if($count>0)
					{

						if($row['sday'] != "" and $row['stimeS'] != "" and $row['stimeE'] != "" and $row['sroom'] != "" and $row['sprof'] != ""){
							// $load_type = FacultyLoad($profName,$sy,$units, $sem);
							$sql="UPDATE tbl_schedule SET sday2='$day', sroom2='$roomName', stimeS2 = '$timeS', stimeE2 = '$timeE', sprof = '$prof' where currID='$currID' and courseID = '$courseID' and cyear = '$cyear' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec' and Sched_type = 'OFFICIAL'";
							$result=mysqli_query($conn,$sql);
							header("Location: index.php?r=administrator/SchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=2");
							mysqli_close($conn);
						} else {
							// $load_type = FacultyLoad($profName,$sy,$units, $sem);
							$sql="UPDATE tbl_schedule SET sday='$day', sroom='$roomName', stimeS = '$timeS', stimeE = '$timeE', sprof = '$profName' where currID='$currID' and courseID = '$courseID' and cyear = '$cyear' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec' and Sched_type = 'OFFICIAL'";
							$result=mysqli_query($conn,$sql);
							header("Location: index.php?r=administrator/SchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=2");
							mysqli_close($conn);
						}

					}
					else
					{	
						// $load_type = FacultyLoad($profName,$sy,$units, $sem);
						// echo $load_type;
						$sql = "INSERT INTO tbl_schedule VALUES ('','$currID','$courseID','$sec','$cyear','$scode','$title','$units','$lec','$lab','$day','$timeS','$timeE','$roomName','$profName','$sem','$sy','','','','',NULL,'OFFICIAL')";
						$result = mysqli_query($conn,$sql);
						// echo $sql;
						if($result)
						{
						header("Location: index.php?r=administrator/SchedulingPage&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&mes=1");
						mysqli_close($conn);
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
							text:'Conflict with the Student Course Schedule!',
							timer: '2000'
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
										<a href="index.php?r=administrator/AddSched&prof='.$prof.'&day='.$day.'&timeS='.$timeS.'&timeE='.$timeE.'&roomName='.$roomName.'&profName='.$profName.'&CurrID='. $currID .'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem .' &sy='. $sy .'&sec='. $sec .'&title='.$title.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-65px;">BACK</a>';
				}
			} else {
				echo"
				<script src='".$base."assets/jquery-3.6.0.min.js'></script>
				<script src='".$base."assets/sweetalert2.all.min.js'></script>
				<script>

				Swal.fire({
					icon:'error',
					title:'Ooops!',
					text:'Conflict with the Faculty Schedule!',
					timer: '2000'
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
									<a href="index.php?r=administrator/AddSched&prof='.$prof.'&day='.$day.'&timeS='.$timeS.'&timeE='.$timeE.'&roomName='.$roomName.'&profName='.$profName.'&CurrID='. $currID .'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem .' &sy='. $sy .'&sec='. $sec .'&title='.$title.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-65px;">BACK</a>';
			}
		} else {
				echo"
				<script src='".$base."assets/jquery-3.6.0.min.js'></script>
				<script src='".$base."assets/sweetalert2.all.min.js'></script>
				<script>
				
				Swal.fire({
					icon:'error',
					title:'Ooops!',
					text:'Conflict with the Room Schedule!',
					timer: '2000'
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
									<a href="index.php?r=administrator/AddSched&prof='.$prof.'&day='.$day.'&timeS='.$timeS.'&timeE='.$timeE.'&roomName='.$roomName.'&profName='.$profName.'&CurrID='. $currID .'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem .' &sy='. $sy .'&sec='. $sec .'&title='.$title.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-65px;">BACK</a>';				

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
			if ($profName == "") {
				$sql = "SELECT * FROM tbl_timepreferences WHERE schoolYear = '$sy' && sem = '$sem' && sprof = '$prof'";
			} else {
				$sql = "SELECT * FROM tbl_timepreferences WHERE schoolYear = '$sy' && sem = '$sem' && sprof = '$profName'";
			}
			
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
									<a href="index.php?r=administrator/AddSched&prof='.$prof.'&day='.$day.'&timeS='.$timeS.'&timeE='.$timeE.'&roomName='.$roomName.'&profName='.$profName.'&CurrID='. $currID .'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem .' &sy='. $sy .'&sec='. $sec .'&title='.$title.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-65px;">BACK</a>';
	}

	} else {

		header("location:index.php?r=administrator/AddSched&prof=$prof&CurrID=$currID&courseID=$courseID&cyear=$cyear&scode=$scode&sem=$sem&sy=$sy&sec=$sec&title=$title&units=$units&lec=$lec&lab=$lab&mes=1");
	}
// } else {
// 	echo"
// 				<script src='".$base."assets/jquery-3.6.0.min.js'></script>
// 				<script src='".$base."assets/sweetalert2.all.min.js'></script>
// 				<script>

// 				Swal.fire({
// 					icon:'error',
// 					title:'Ooops!',
// 					text:'Faculty Load is Full!',
// 					timer: '2000'
// 				})
// 				</script>";
		
// 				echo'
										
// 							<table class="table table-bordered table-hover responsive-utilities" style="margin-left:-65px">
// 							  <tbody>
// 							  <tr>
// 								<td class="table-narrow" colspan = "4">
// 								<h4><strong>Faculty Load: '.getName($profName).'</strong><br /></h4>
// 								<h4><strong>Status: '.getStatus($profName).'</strong></h4>
// 								</td>
// 							</tr>
// 								<tr>
// 									<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">CODE:</td>
// 									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">TITLE</td>
// 									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">LEC</td>
// 									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">LAB</td>
// 									<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">UNITS</td>
// 								</tr>
// 							';
// 			$sql = "SELECT * FROM tbl_schedule WHERE sprof = '$profName' && schoolYear = '$sy' && sem = '$sem' && Sched_type = 'OFFICIAL'";
			
// 			$result = mysqli_query($conn,$sql);
// 			while ($row = mysqli_fetch_array($result)) {
// 					echo'
// 											<tr>	
// 												<td style="text-align: center;">'. $row['scode'] .'</td>
// 												<td style="text-align: left;">'. $row['stitle']. '</td>			
// 												<td style="text-align: center;">'. $row['lec'] .'</td>
// 												<td style="text-align: center;">'. $row['lab'].'</td>
// 												<td style="text-align: center;">'. $row['units'].'</td>
// 											</tr>';	

// 				}
// 			$sql2 = "SELECT * FROM tbl_facultycurrentload WHERE FCode = '$profName' && schoolYear = '$sy' && sem = '$sem'";
// 			$result2 = mysqli_query($conn,$sql2);
// 			$row2 = mysqli_fetch_array($result2);
// 			$regular = $row2['Regular_Load'];
// 			$part = $row2['PartTime_Load'];
// 			$ts = $row2['TeachingSub_Load'];
			
// 									echo'
									
// 									</tbody>
// 									</table>
// 							<table class="table table-bordered table-hover responsive-utilities" style="margin-left:-65px">
// 							<tbody>
// 								<tr>
// 									<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">REGULAR LOAD</td>
// 									<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">PART TIME LOAD</td>
// 									<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">TEACHING SUBSTITUTION</td>
// 								</tr>

// 								<tr>
// 									<td style="text-align: center;">'.$regular.' Unit/s</td>
// 									<td style="text-align: center;">'.$part.' Unit/s</td>
// 									<td style="text-align: center;">'.$ts.' Unit/s</td>
// 								</tr>
// 							</tbody>
// 							</table>
// 							<a href="index.php?r=administrator/AddSched&prof='.$prof.'&day='.$day.'&timeS='.$timeS.'&timeE='.$timeE.'&roomName='.$roomName.'&profName='.$profName.'&CurrID='. $currID .'&courseID='. $courseID .'&cyear='. $cyear .'&scode='. $scode .'&sem='. $sem .' &sy='. $sy .'&sec='. $sec .'&title='.$title.'&units='.$units.'&lec='.$lec.'&lab='.$lab.'" class="btn btn-mini btn-primary btn-block" style="width:45px text-decoration:none; color:white; margin-left:-65px;">BACK</a>';
// 			}

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

	function getStatus($fcode){
		include("config.php");
		$Name = "";
		$sql = "SELECT * FROM tbl_evaluationfaculty WHERE FCode = '$fcode'";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result)){
			$status = $row['enu_employmentStat'];
		}
		return $status;
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
	
	function to12Hr($ctime)
	{
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

	function checkFirstParameters($day, $timein, $timeout, $roomName, $profName){
		$valid = "";
		if($day == "" and $timein == "" and $timeout == "" and $roomName == "" and $profName == ""){
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
	
	function checkRoomSched($day, $timein, $timeout, $sem, $sy, $roomName)
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_schedule WHERE (stimeS BETWEEN ".$timein." and ".$timeout." or stimeE BETWEEN ".$timein." and ".$timeout.") and sday='".$day."' and sem=".$sem." and schoolYear='".$sy."' and sroom = '".$roomName."' and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);

		return $count;
	}

	function checkProfSched($day, $timein, $timeout, $sem, $sy, $profName)
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_schedule WHERE (stimeS BETWEEN ".$timein." and ".$timeout." or stimeE BETWEEN ".$timein." and ".$timeout.") and sday='".$day."' and sem=".$sem." and schoolYear='".$sy."' and sprof = '".$profName."'and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);

		
		return $count;
	}

	function checkCourseSched($day, $timein, $timeout, $sem, $sy, $courseID){
		include("config.php");
		$sql = "SELECT * FROM tbl_schedule WHERE (stimeS BETWEEN ".$timein." and ".$timeout." or stimeE BETWEEN ".$timein." and ".$timeout.") and sday='".$day."' and sem=".$sem." and schoolYear='".$sy."' and courseID = '".$courseID."'and Sched_type = 'OFFICIAL'";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);

		
		return $count;
	}
						//	  2020		5     2
	// function CheckLoad($fcode, $sy, $units, $sem){
	// 	include("config.php");
	// 	$check="";
	// 	$sql = "SELECT * FROM tbl_facultycurrentload WHERE FCode='".$fcode."' and schoolYear ='".$sy."' and sem = ".$sem."";
	// 	$result = mysqli_query($conn, $sql);
	// 	$row = mysqli_fetch_array($result);
	// 	$count = mysqli_num_rows($result);
	// 	$regular = $row['Regular_Load'];
	// 	$partTime = $row['PartTime_Load'];
	// 	$tsLoad = $row['TeachingSub_Load'];

	// 	if($count > 0){
	// 		$sqleval = "SELECT Regular_Load, PartTime_Load, TeachingSub_Load FROM tbl_evaluationfaculty WHERE FCode = '".$fcode."'";
	// 		$result = mysqli_query($conn, $sqleval);
	// 		$row = mysqli_fetch_array($result);
	// 		$reg = $row['Regular_Load']; //15 units
	// 		$part = $row['PartTime_Load']; //12 units
	// 		$ts = $row['TeachingSub_Load']; //12 units
	// 		$sum = 0;


	// 		if ($reg == 0) { //for part time faculty
	// 			$sum = $partTime + $units;
	// 			if ($sum <= $part) {
	// 				$check = 0;
	// 			} else {
	// 				$sum = 0;
	// 				$sum = $tsLoad + $units;
	// 				if ($sum <= $ts) {
	// 					$check = 0;
	// 				} else {
	// 					$check = 1;
	// 				}
	// 			}
	// 		} else if($reg == 9){ //for faculty designee
	// 			$sum = $regular + $units;
	// 			if ($sum <= $reg) {
	// 				$check = 0;
	// 			} else {
	// 				$sum = 0;
	// 				$sum = $tsLoad + $units;
	// 				if ($sum <= $ts) {
	// 					$check = 0;
	// 				} else {
	// 					$check = 1;
	// 				}
	// 			}
	// 		} else {	// for regular faculty
	// 			$sum = $regular + $units;
	// 			if ($sum <= $reg) {
	// 				$check = 0;
	// 			} else {
	// 				$sum = 0;
	// 				$sum = $partTime + $units;
	// 				if ($sum <= $part) {
	// 					$check = 0;
	// 				} else {
	// 					$sum = 0;
	// 					$sum = $tsLoad + $units;
	// 					if ($sum <= $ts) {
	// 						$check = 0;
	// 					} else {
	// 						$check = 1;
	// 					}
	// 				}
	// 			}
	// 		}
	// 	} else {
	// 		$check = 0;
	// 	}

	// 	return $check;
	// }

	// function FacultyLoad($fcode, $sy, $units, $sem){
	// 	include("config.php");
	// 	$load_type="";
	// 	$sql1 = "SELECT * FROM tbl_facultycurrentload WHERE FCode='".$fcode."' and schoolYear ='".$sy."' and sem = ".$sem."";
	// 	$result1 = mysqli_query($conn, $sql1);
	// 	$row1 = mysqli_fetch_array($result1);
	// 	$count = mysqli_num_rows($result1);
	// 	$regular = $row1['Regular_Load'];
	// 	$partTime = $row1['PartTime_Load'];
	// 	$tsLoad = $row1['TeachingSub_Load'];

	// 	if($count<=0){
	// 		$sqleval = "SELECT Regular_Load, PartTime_Load, TeachingSub_Load FROM tbl_evaluationfaculty WHERE FCode = '".$fcode."'";
	// 		$result = mysqli_query($conn, $sqleval);
	// 		$row = mysqli_fetch_array($result);
	// 		$reg = $row['Regular_Load'];
	// 		$part = $row['PartTime_Load'];

	// 		$sqlfac = "INSERT INTO tbl_facultycurrentload VALUES('','".$fcode."',0,0,0,".$sem.",'".$sy."')";
	// 		mysqli_query($conn,$sqlfac);
			
			
	// 		if($reg == 0){
	// 			$sqlup = "UPDATE tbl_facultycurrentload SET PartTime_Load = '".$units."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' and sem = ".$sem."";
	// 			$load_type = 0;
	// 		} else {
	// 			$sqlup = "UPDATE tbl_facultycurrentload SET Regular_Load = '".$units."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' and sem = ".$sem."";
	// 			$load_type = 1;
	// 		}
	// 		mysqli_query($conn,$sqlup);
	// 	} else {
	// 		$sqleval = "SELECT Regular_Load, PartTime_Load, TeachingSub_Load FROM tbl_evaluationfaculty WHERE FCode = '".$fcode."'";
	// 		$result = mysqli_query($conn, $sqleval);
	// 		$row = mysqli_fetch_array($result);
	// 		$reg = $row['Regular_Load'];
	// 		$part = $row['PartTime_Load'];
	// 		$ts = $row['TeachingSub_Load'];
			
	// 		if($reg == 0){
	// 			$sum = $partTime + $units;
	// 			if ($sum >= $part) {
	// 				$sum = 0;
	// 				$sum = $tsLoad + $units;
	// 				$sqlup = "UPDATE tbl_facultycurrentload SET TeachingSub_Load = ".$sum." WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' and sem = ".$sem."";
	// 				$load_type = 2;
	// 			} else {
	// 				$sqlup = "UPDATE tbl_facultycurrentload SET PartTime_Load = ".$sum." WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' and sem = ".$sem."";
	// 				$load_type = 0;
	// 			}
	// 		} else if($reg == 9){

	// 			$sum = $regular + $units;
	// 			if ($sum >= $reg) {
	// 				$sum = 0;
	// 				$sum = $tsLoad + $units;
	// 				$sqlup = "UPDATE tbl_facultycurrentload SET TeachingSub_Load = ".$sum." WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' and sem = ".$sem."";
	// 				$load_type = 2;
	// 			} else {
	// 				$sqlup = "UPDATE tbl_facultycurrentload SET Regular_Load = '".$sum."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' and sem = ".$sem."";
	// 				$load_type = 1;
	// 			}

	// 		} else {
	// 			$sum = $regular + $units;
	// 			if ($sum >= $reg) {
	// 				$sum = 0;
	// 				$sum = $partTime + $units;
	// 				if ($sum >= $part) {
	// 					$sum = 0;
	// 					$sum = $tsLoad + $units;
	// 					$sqlup = "UPDATE tbl_facultycurrentload SET TeachingSub_Load = '".$sum."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' and sem = ".$sem."";
	// 					$load_type = 2;
	// 				} else {
	// 					$sqlup = "UPDATE tbl_facultycurrentload SET PartTime_Load = '".$sum."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' and sem = ".$sem."";
	// 					$load_type = 0;
	// 				}
					
	// 			} else {
	// 				$sqlup = "UPDATE tbl_facultycurrentload SET Regular_Load = '".$sum."' WHERE FCode ='".$fcode."' and schoolYear = '".$sy."' and sem = ".$sem."";
	// 				$load_type = 1;
	// 			}
				
				
	// 		}
	// 		mysqli_query($conn,$sqlup);
	// 	}

	// 	return $load_type;
	// }

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