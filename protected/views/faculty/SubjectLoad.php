﻿<?php

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
<div id="Gradienthiv" class="cssWLGradientCommon cssWLGradientIMG"></div>

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

<br />
	<form name="frmSched" method = "post" action = "index.php?r=faculty/SubjectLoad">
		
		<h4 class="underlined-header">Semester</h4>
		<select name = "sem" style="width: 30%;">
			<?php
				$row=1;
				$disp = 0;
				if(isset($_GET['sem']))
				{	
					echo'<option value="'.($_GET['sem']).'">'.($_GET['sem']).'</option>';
				}
				if(isset($_POST['sem']))
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
		<h4 class="underlined-header">School Year</h4>
		<select name = "sy" style="width: 30%;">
			<?php
				if(isset($_GET['sy'])){
						$sh = $_GET['sy'];
						$sql1= "SELECT DISTINCT schoolYear FROM tbl_subjectload  WHERE schoolYear= '$sh' ORDER BY schoolYear DESC ";
						$result1 = mysqli_query($conn, $sql1);
						while($row1 = mysqli_fetch_array($result1)){
							echo'<option value="'.$sh.'">'.$row1['schoolYear'].'</option>';
						}
				}
				else if(isset($_POST['sy']))
				{
					$sh = $_POST['sy'];
					$sql1= "SELECT DISTINCT schoolYear FROM tbl_subjectload  WHERE schoolYear= '$sh' ORDER BY schoolYear DESC";
					$result1 = mysqli_query($conn, $sql1);
					while($row1 = mysqli_fetch_array($result1)){
						echo'<option value="'.$sh.'">'.$row1['schoolYear'].'</option>';
					}
				}
			
					$sql = "SELECT DISTINCT schoolYear FROM tbl_subjectload ORDER BY schoolYear DESC";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($result)) {
						echo '
							<option value="'. $row['schoolYear'] .'">'. $row['schoolYear'] .'</option>
						';
					}
			
			?>
		</select>
		<input type="submit" name="btnSubmit" value="Go" />
		</form>

</section>
<section>
<?php if ((isset($_POST['sem']) and isset($_POST['sy'])) OR (isset($_GET['sem']) and isset($_GET['sy']))): ?>
<?php if (!empty($load)): ?>
	<p><a href="index.php?r=faculty/PrintFacultyAssign&sem=<?php echo $_POST['sem']?>&sy=<?php echo $_POST['sy']?>" class = "btn btn-primary" target ="_blank">Print</a></p>
<?php endif ?>


<!-- Regular Load Table -->
<?php $totUnits = 0; ?>
<h4 class="underlined-header">Regular Load</h4>
<table class="table table-bordered table-hover responsive-utilities">
	<thead>
		<tr>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;" >TITLE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">COURSE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;">DAY</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 150px; text-align: center;">TIME</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ROOM</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">REQUEST</th>
		</tr>
	</thead>
	
	<tbody>
	<?php foreach ($load as $row): ?>
		<?php if ($row['load_type']==1 && $row['load_type'] != NULL): ?>
			<tr>
			<td style="text-align: center;"><?php echo $row['scode'] ?></td>
			<td style="text-align: left;"><?php echo $row['stitle'] ?></td>
			<td style="text-align: center;"><?php echo $row['lec'] ?></td>
			<td style="text-align: center;"><?php echo $row['lab'] ?></td>
			<td style="text-align: center;"><?php echo $row['units'] ?></td>
			<td style="text-align: center;"><?php echo getCourse($row['courseID']) ?></td>
			<td style="text-align: center;"><?php echo $row['sday'] ?></td>
			<?php if ($row['stimeS2']=="" || $row['stimeS2'] == NULL): ?>
				<td style="text-align: center;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE']) ?></td>
				<?php else: ?>
					<td style="text-align: center;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE'])."/".to12Hr($row['stimeS2'])."-".to12Hr($row['stimeE2']) ?></td>
			<?php endif ?>
			
			<td style="text-align: center;"><?php echo $row['sroom'] ?></td>
			<td><a href="index.php?r=faculty/viewfacultyrequest&CurrID=<?php echo $row['currID'] ?>&sprof=<?php echo $row['sprof']?>&schedID=<?php echo $row['schedID']?>&schoolyear=<?php echo $row['schoolYear']?>&courseID=<?php echo $row['courseID'] ?>&cyear=<?php echo $row['cyear'] ?>&scode=<?php echo $row['scode'] ?>&sem=<?php echo $row['sem'] ?> &sy=<?php echo $_POST['sy'] ?>&sec=<?php echo $row['csection'] ?>&title=<?php echo $row['stitle']?>&units=<?php echo $row['units']?>&lec=<?php echo $row['lec']?>&lab=<?php echo $row['lab']?>" class="btn btn-mini btn-primary btn-block" >REQUEST</a>
		</tr>
		<?php $totUnits += $row['units']; ?>
		<?php endif ?>
		
	<?php endforeach ?>
	</tbody>
</table>
<p><center><?php echo "Total Units:".$totUnits." Units"; ?></center></p>

<!-- Part Time Load Table -->
<?php $totUnits = 0; ?>
<h4 class="underlined-header">Part Time Load</h4>
<table class="table table-bordered table-hover responsive-utilities">
	<thead>
		<tr>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;" >TITLE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">COURSE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;">DAY</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TIME</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ROOM</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">REQUEST</th>
		</tr>
	</thead>
	
	<tbody>
	<?php foreach ($load as $row): ?>
		<?php if ($row['load_type']==0  && $row['load_type'] != NULL): ?>
			<tr>
			<td style="text-align: center;"><?php echo $row['scode'] ?></td>
			<td style="text-align: left;"><?php echo $row['stitle'] ?></td>
			<td style="text-align: center;"><?php echo $row['lec'] ?></td>
			<td style="text-align: center;"><?php echo $row['lab'] ?></td>
			<td style="text-align: center;"><?php echo $row['units'] ?></td>
			<td style="text-align: center;"><?php echo getCourse($row['courseID']) ?></td>
			<td style="text-align: center;"><?php echo $row['sday'] ?></td>
			<?php if ($row['stimeS2']=="" || $row['stimeS2'] == NULL): ?>
				<td style="text-align: center;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE']) ?></td>
				<?php else: ?>
					<td style="text-align: center;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE'])."/".to12Hr($row['stimeS2'])."-".to12Hr($row['stimeE2']) ?></td>
			<?php endif ?>
			<td style="text-align: center;"><?php echo $row['sroom'] ?></td>
			<td><a href="index.php?r=faculty/viewfacultyrequest&CurrID=<?php echo $row['currID'] ?>&sprof=<?php echo $row['sprof']?>&schedID=<?php echo $row['schedID']?>&schoolyear=<?php echo $row['schoolYear']?>&courseID=<?php echo $row['courseID'] ?>&cyear=<?php echo $row['cyear'] ?>&scode=<?php echo $row['scode'] ?>&sem=<?php echo $row['sem'] ?> &sy=<?php echo $_POST['sy'] ?>&sec=<?php echo $row['csection'] ?>&title=<?php echo $row['stitle']?>&units=<?php echo $row['units']?>&lec=<?php echo $row['lec']?>&lab=<?php echo $row['lab']?>" class="btn btn-mini btn-primary btn-block" >REQUEST</a>
		</tr>
		<?php $totUnits += $row['units']; ?>
		<?php endif ?>
		
	<?php endforeach ?>
	</tbody>
</table>
<p><center><?php echo "Total Units:".$totUnits." Units"; ?></center></p>

<!-- Teaching Substitution -->
<?php $totUnits = 0; ?>
<h4 class="underlined-header">Temporary Substitution</h4>
<table class="table table-bordered table-hover responsive-utilities">
	<thead>
		<tr>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;" >TITLE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LEC</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">LAB</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">UNITS</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;">COURSE</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;">DAY</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TIME</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">ROOM</th>
			<th style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">REQUEST</th>
		</tr>
	</thead>
	
	<tbody>
		<?php foreach ($load as $row): ?>
			<?php if ($row['load_type']==2  && $row['load_type'] != NULL): ?>
				<tr>
					<td style="text-align: center;"><?php echo $row['scode'] ?></td>
					<td style="text-align: left;"><?php echo $row['stitle'] ?></td>
					<td style="text-align: center;"><?php echo $row['lec'] ?></td>
					<td style="text-align: center;"><?php echo $row['lab'] ?></td>
					<td style="text-align: center;"><?php echo $row['units'] ?></td>
					<td style="text-align: center;"><?php echo getCourse($row['courseID']) ?></td>
					<td style="text-align: center;"><?php echo $row['sday'] ?></td>
					<?php if ($row['stimeS2']=="" || $row['stimeS2'] == NULL): ?>
				<td style="text-align: center;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE']) ?></td>
				<?php else: ?>
					<td style="text-align: center;"><?php echo to12Hr($row['stimeS'])."-".to12Hr($row['stimeE'])."/".to12Hr($row['stimeS2'])."-".to12Hr($row['stimeE2']) ?></td>
			<?php endif ?>
					<td style="text-align: center;"><?php echo $row['sroom'] ?></td>
					<td><a href="index.php?r=faculty/viewfacultyrequest&CurrID=<?php echo $row['currID'] ?>&sprof=<?php echo $row['sprof']?>&schedID=<?php echo $row['schedID']?>&schoolyear=<?php echo $row['schoolYear']?>&courseID=<?php echo $row['courseID'] ?>&cyear=<?php echo $row['cyear'] ?>&scode=<?php echo $row['scode'] ?>&sem=<?php echo $row['sem'] ?> &sy=<?php echo $_POST['sy'] ?>&sec=<?php echo $row['csection'] ?>&title=<?php echo $row['stitle']?>&units=<?php echo $row['units']?>&lec=<?php echo $row['lec']?>&lab=<?php echo $row['lab']?>" class="btn btn-mini btn-primary btn-block" >REQUEST</a>
				</tr>
				<?php $totUnits += $row['units']; ?>
			<?php endif ?>
		
	<?php endforeach ?>
	</tbody>
</table>
<p><center><?php echo "Total Units:".$totUnits." Units"; ?></center></p>
<?php endif ?>
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
	
	function gethay($scode,$currID,$cID,$sy,$sec)
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
