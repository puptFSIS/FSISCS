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
@media only screen and (min-width:150px) and (max-width:600px)
{
/* Title right */
    .title-right {
        float: left;
        margin: 0;
        padding: 0;
        height: 90px;
        line-height: 40px;
		width:100%;
    }

        .title-right a {
            float: left;
            display: block;
            margin-right: 0;
            height: 30px;
            padding: 0;
            line-height: 30px;
            text-align: center;
			width: 100%;
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

<?php
	if(isset($_POST['sy']) AND isset($_POST['sem']))
	{
		$FCode = $_SESSION['FCode'];
		echo'<a class="btn btn-l" href = "index.php?r=faculty/PrintSchedPref&sy='.$_POST['sy'].'&sem='.$_POST['sem'].'&FCode='.$FCode.'">Print Preference</a>';
	}
?>

</br>
<br />

<form id="annc" name="annc" action="index.php?r=faculty/SchedPrefList" method="post">
<h4 class=underlined-header>School Year</h4>
<select name="sy" id = "sy" style="width: 120px;">

	<?php
		$FCode = $_SESSION['FCode'];
		
		if(isset($_POST['sy']))
		{
			echo'
			<option value = "'. $_POST['sy'] .'">'.$_POST['sy'].'</option>
			';
		}
		
		$sql = "SELECT DISTINCT sy FROM tbl_schedpref WHERE FCODE = '$FCode'";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result)){
			echo'
			<option value = "'. $row['sy'] .'">'.$row['sy'].'</option>
			';
		}
	?>
</select>	
<br />
<h4 class=underlined-header>Sem</h4>
<select name="sem" id = "sy" style="width: 120px;">

	<?php
		
		if(isset($_POST['sem']))
		{
			$r = $_POST['sem'];
			if($r['sem']==3)
			{
				$r = "SUMMER";
			}
			echo'
			<option value = "'. $_POST['sem'] .'">'.$r.'</option>
			';
		}
		$FCode = $_SESSION['FCode'];
		$sql = "SELECT DISTINCT sem FROM tbl_schedpref WHERE FCODE = '$FCode'";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result)){
			$r = $row['sem'];
			if($row['sem']==3)
			{
				$r = "SUMMER";
			}
			echo'
			<option value = "'. $row['sem'] .'">'.$r.'</option>
			';
		}
	?>
</select>	
<br />
<input type="submit" value="View" />
<a class = "btn btn-r" href = "index.php?r=faculty/SchedulePreference">Add</a>
</form>


<?php

		$m = "";
		$t = "";
		$w = "";
		$th = "";
		$f = "";
		$s = "";
	if(isset($_POST['sy']) and isset($_POST['sem']))
	{		
		$sy = $_POST['sy'];
		$sem = $_POST['sem'];
	
		$i = 700;
		echo'
		<TABLE>
		
		<tr>
			<td align="center">Time</td>
			<td align="center">Mon</td>
			<td align="center">Tue</td>
			<td align="center">Wed</td>
			<td align="center">Thu</td>
			<td align="center">Fri</td>
			<td align="center">Sat</td>
		</tr>';
		
		while($i<=2200)
		{
		
			$FCode = $_SESSION['FCode'];
			$blank = "";
			$sql2 = "SELECT * FROM tbl_schedpref WHERE FCode = '$FCode' AND sy = '$sy' AND sem = '$sem' and timein = '$i' order by bracketRef ASC";
			$result2 = mysqli_query($conn, $sql2);
			while($row2 = mysqli_fetch_array($result2))
			{
				$timein = $row2['timein'];
			
				if($timein==$i or $i<=$row2['timeout'])
				{
					if($row2['day']=="M") 
					{
						$m = $row2['scode'];
						$blank = "#FF0000";
					}
					if($row2['day']=="T") 
					{
						$t = $row2['scode'];
						$blank = "#FF0000";
					}
					if($row2['day']=="W") 
					{
						$w = $row2['scode'];
						$blank = "#FF0000";
					}
					if($row2['day']=="TH") 
					{
						$th = $row2['scode'];
						$blank = "#FF0000";
					}
					if($row2['day']=="F") 
					{
						$f = $row2['scode'];
						$blank = "#FF0000";
					}
					if($row2['day']=="S") 
					{
						$s = $row2['scode'];
						$blank = "#FF0000";
					}
				}else{
					$blank = "";
				}
			}
				echo'
				<TR>
				<TD ROWSPAN="2" align="center" width = "120">'.toTime($i).'</TD>
				<td align="center" height = "25" width = "120">'.$m.'</td>
				<TD align="center" height = "25" width = "120">'.$t.'</TD>
				<TD align="center" height = "25" width = "120">'.$w.'</TD>
				<TD align="center" height = "25" width = "120">'.$th.'</TD>
				<TD align="center" height = "25" width = "120">'.$f.'</TD>
				<TD align="center" height = "none" width = "120" >'.$s.'</TD>
				
				</TR>
				<TR>
				
				<TD align="center" height = "25" width = "120">'.$m.'</TD>
				<TD align="center" height = "25" width = "120">'.$t.'</TD>
				<TD align="center" height = "25" width = "120">'.$w.'</TD>
				<TD align="center" height = "25" width = "120">'.$th.'</TD>
				<TD align="center" height = "25" width = "120">'.$f.'</TD>
				<TD align="center" height = "25" width = "120">'.$s.'</TD>
				</TR>
				';
				
			$m = "";
			$t = "";
			$w = "";
			$th = "";
			$f = "";
			$s = "";
			
			if($i % 100 == 0)
			{
				$i = $i + 30;
			}else
			{
				$i = $i + 70;
			}	
		}
		echo'</TABLE>';
	}

	function toTime($i)
	{
		if($i==700)
		{
			$time = "7:00 AM";
		}
		if($i==730)
		{
			$time = "7:30 AM";
		}
		if($i==800)
		{
			$time = "8:00 AM";
		}
		if($i==830)
		{
			$time = "8:30 AM";
		}
		if($i==900)
		{
			$time = "9:00 AM";
		}
		if($i==930)
		{
			$time = "9:30 AM";
		}
		if($i==1000)
		{
			$time = "10:00 AM";
		}
		if($i==1030)
		{
			$time = "10:30 AM";
		}
		if($i==1100)
		{
			$time = "11:00 AM";
		}
		if($i==1130)
		{
			$time = "11:30 AM";
		}
		if($i==1200)
		{
			$time = "12:00 NN";
		}if($i==1230)
		{
			$time = "12:30 PM";
		}
		if($i==1300)
		{
			$time = "1:00 PM";
		}
		if($i==1330)
		{
			$time = "1:30 PM";
		}
		if($i==1400)
		{
			$time = "2:00 PM";
		}
		if($i==1430)
		{
			$time = "2:30 PM";
		}
		if($i==1500)
		{
			$time = "3:00 PM";
		}
		if($i==1530)
		{
			$time = "3:30 PM";
		}
		if($i==1600)
		{
			$time = "4:00 PM";
		}
		if($i==1630)
		{
			$time = "4:30 PM";
		}
		if($i==1700)
		{
			$time = "5:00 PM";
		}
		if($i==1730)
		{
			$time = "5:30 PM";
		}
		if($i==1800)
		{
			$time = "6:00 PM";
		}
		if($i==1830)
		{
			$time = "6:30 PM";
		}
		if($i==1900)
		{
			$time = "7:00 PM";
		}
		if($i==1930)
		{
			$time = "7:30 PM";
		}
		if($i==2000)
		{
			$time = "8:00 PM";
		}
		if($i==2030)
		{
			$time = "8:30 PM";
		}
		if($i==2100)
		{
			$time = "9:00 PM";
		}
		if($i==2130)
		{
			$time = "9:30 PM";
		}
		if($i==2200)
		{
			$time = "10:00 PM";
		}
		return $time;
	}
	
	function checkTime($FCode,$sem,$sy)
	{
		$sql = "select * from tbl_schedpref where sem = '$sem' and sy = '$sy' and FCode = '$FCode'";
	}
	
	if(isset($_POST['sy']) and isset($_POST['sem']))
	{		
		$sy = $_POST['sy'];
		$sem = $_POST['sem'];
		$m = "";
		$t = "";
		$w = "";
		$th = "";
		$f = "";
		$s = "";
		$i=700;
		$rspan = 1;
		$count = 700;
		echo'
				<table class=round-7 style="width:100%; ">
				<thead>
				<tr>
				<th style="width:50px"><h5 style="text-align:center">Time</h5></th>
				<th style="width:150px"><h5 style="text-align:center">Monday</h5></th>
				<th style="width:150px"><h5 style="text-align:center">Tuesday</h5></th>
				<th style="width:150px"><h5 style="text-align:center">Wednesday</h5></th>
				<th style="width:150px"><h5 style="text-align:center">Thursday</h5></th>
				<th style="width:150px"><h5 style="text-align:center">Friday</h5></th>
				<th style="width:150px"><h5 style="text-align:center">Saturday</h5></th>
				</tr>
				</thead>
				<tbody>
		';
		while($i<=2200)
		{
				echo'
				<tr>
				<td>'.$i.'</td>
				
				';	
			
				$FCode = $_SESSION['FCode'];
				$sql2 = "SELECT * FROM tbl_schedpref WHERE FCode = '$FCode' AND sy = '$sy' AND sem = '$sem' order by bracketRef ASC";
				$result2 = mysqli_query($conn, $sql2);
				while($row2 = mysqli_fetch_array($result2))
				{
					$m = "";
					$t = "";
					$w = "";
					$th = "";
					$f = "";
					$s = "";
					
					if($row2['timein']==$i)
					{
						$dif = $row2['timeout'] - $i;
						$r = ($dif/50) + 1;

						if($row2['day']=="M") 
						{
							$m = $row2['scode'];
						}
						if($row2['day']=="T") 
						{
							$t = $row2['scode'];
						}
						if($row2['day']=="W") 
						{
							$w = $row2['scode'];
						}
						if($row2['day']=="TH") 
						{
							$th = $row2['scode'];
						}
						if($row2['day']=="F") 
						{
							$f = $row2['scode'];
						}
						if($row2['day']=="S") 
						{
							$s = $row2['scode'];
						}
						
						echo'
						<td rowspan = "'.$rspan.'">'.$m.'</td>
						<td>'.$t.'</td>
						<td>'.$w.'</td>
						<td>'.$th.'</td>
						<td>'.$f.'</td>
						<td>'.$s.'</td>	
				
						';
					}
				}
	
				echo'
				</tr>
				';	
			if($i % 100 == 0)
			{
				$i = $i + 30;
			}else
			{
				$i = $i + 70;
			}
		}
		echo '
			</tbody>
			</table>
		';		
	}	
		
	/*
	if(isset($_POST['sy']) and isset($_POST['sem']))
	{		
		$sy = $_POST['sy'];
		$sem = $_POST['sem'];
		$m = "";
		$t = "";
		$w = "";
		$th = "";
		$f = "";
		$s = "";
		echo'
			<table class=round-8 style="width:100%; ">
			<thead>
			<tr>
			<th><h5>Time</h5></th>
			<th><h5>Mon</h5></th>
			<th><h5>Tue</h5></th>
			<th><h5>Wed</h5></th>
			<th><h5>Thu</h5></th>
			<th><h5>Fri</h5></th>
			<th><h5>Sat</h5></th>
			<th><h5>Action</h5></th>
			</tr>
			</thead>
			<tbody>
		';
		
		$FCode = $_SESSION['FCode'];
		$sql = "SELECT DISTINCT bracket FROM tbl_schedpref WHERE FCode = '$FCode' ORDER BY bracketRef ASC";
		$result = mysqli_query($conn, $sql);
		while($row=mysqli_fetch_array($result))
		{	
			$time = $row['bracket'];
			$sql2 = "SELECT * FROM tbl_schedpref WHERE FCode = '$FCode' AND bracket = '$time' AND sy = '$sy' AND sem = '$sem'";
			$result2 = mysqli_query($conn, $sql2);
			while($row2 = mysqli_fetch_array($result2)){
				if($row2['day']=="M") 
				{
					$m = $row2['scode'];
				}
				if($row2['day']=="T") 
				{
					$t = $row2['scode'];
				}
				if($row2['day']=="W") 
				{
					$w = $row2['scode'];
				}
				if($row2['day']=="TH") 
				{
					$th = $row2['scode'];
				}
				if($row2['day']=="F") 
				{
					$f = $row2['scode'];
				}
				if($row2['day']=="S") 
				{
					$s = $row2['scode'];
				}
			}
			echo'
			<tr>
			<td>'.$time.'</td>
			<td>'.$m.' </td> 
			<td>'.$t.'</td>
			<td>'.$w.'</td>
			<td>'.$th.'</td>
			<td>'.$f.'</td>
			<td>'.$s.'</td>
			<td><a href = "index.php?r=faculty/EditSchedPref&sem='.$sem.'&sy='.$sy.'&bracket='.$time.'" class = "btn" style = "width:35px">Edit</a><a href="index.php?r=faculty/DeleteSchedPref&sem='.$sem.'&sy='.$sy.'&bracket='.$time.'" class = "btn btn-mini"style = "width:35px">Delete</a></td>
			</tr>';
			$m = "";
			$t = "";
			$w = "";
			$th = "";
			$f = "";
			$s = "";
		}
		echo '
		</tbody>
		</table>
		';
	}*/
	
	function getSubj($day){
		$sql = "SELECT * FROM tbl_schedpref WHERE FCode = '$FCode' AND sy = '$sy' ";
	}
	
	function getStitle($scode){
		$sql = "SELECT * FROM tbl_subjects WHERE SubjCode = '$scode'";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result)){
			$stitle = $row['SubjDescription'];
		}
		return $stitle;
	}
?>
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

