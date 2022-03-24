<?php
session_start();
include("config.php");
$userID = $_SESSION['userID'];

if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0) {

	}
} else {
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
<?php include("nav.php");?>
<!-- End - Title right side -->
</header>
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
	$room = mysqli_query($conn,"Select * from tbl_room ORDER BY roomName ASC");
	
?>-->

<br />
<?php
	if(isset($_GET['msg'])){
		if($_GET['msg']=='00110'){
			echo'
			<div align="center">
				<div  class="box-success" style="width:50%;">
					<div class="box-content">
						<p>Make-up class saved, please wait for the approval of the Head of Academic Programs.</p>
					</div>
				</div>
			</div><br><br>'
		;
		}
	}
?>

	<form name="frmSched" method = "post" action = "index.php?r=faculty/processMakeup">
		
		<h4 class="underlined-header">Makeup class application</h4>
		<div align="left"><label style="color:red"><i>Required(*)</i></label></div>
			<br>
		<label>I. Date of absent<span style="  color:red;">*</span></label>
		<input style="width:40%;"  type="date" name="absent" />
		<br>
		<h4 class="underlined-header">Re-scheduling</h4>
		<label>I. Date selection<span style="  color:red;">*</span></label>
		<input style="width:40%;"  type="date" name="makeup_date" /><br>
		<label>II. Time selection<span style="  color:red;">*</span></label>
		<input style="width:40%;" placeholder="Select a time" type="text" name="time" list="combo"/><br> 
			<datalist id="combo">
				<option value="7:30 AM - 10:30 AM">7:30 AM - 10:30 AM</option>
				<option value="8:00 AM - 12:00 NN">Morning session</option>
				<option value="10:30 AM - 1:30 PM">Afternoon  session</option>
				<option value="1:00 PM - 5:00 PM">Afternoon session</option>
				<option value="1:30 PM - 4:30 PM">Afternoon  session</option>
				<option value="4:30 PM - 7:30 PM">evening  session</option>
				<option value="7:30 PM - 9:30 PM">evening  session</option>
			</datalist>
			<?php echo'
			<label>III. Room Selection<span style="  color:red;">*</span></label>
			<select style="width:40%;" name="room">
			<option>Select a room</option>
			<option disabled>-------------</option>
			';
			while($row = mysqli_fetch_assoc($room)){
			$silid = $row['roomName'];
			echo'<option>'.$silid.'</option>';
			}	
				echo		
				'</select><br>'; ?>
			<label>IV. Subject Selection<span style="  color:red;">*</span></label>
			<select name="subject" style="width:40%;" >
				<option>Subject selection</option>
				<option disabled>-----------------</option>
				<?php
					$sub = mysqli_query($conn,"SELECT scode,stitle,courseID from tbl_schedule where sprof = '$userID' and schoolYear='2014-2015' ORDER BY scode ASC") or die ("ERROR");
					$course = mysqli_query($conn,"SELECT tbl_course.course_code, tbl_schedule.cyear,tbl_schedule.csection from tbl_schedule join tbl_course on courseID=course WHERE  sprof = '$userID' and schoolYear='2014-2015' ORDER BY cyear ASC") or die ("ERROR");
					
					while($row = mysqli_fetch_assoc($sub)){
					$subject = $row['scode'].'&nbsp&nbsp&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp&nbsp&nbsp'.$row['stitle'];
					echo '
					<option>'.$subject.'</option>
					';
					}
				
				?>
			</select><br>
			<label>V. Course Selection<span style="  color:red;">*</span></label>
			<select name="course" style="width:40%;" >
				<option>Course selection</option>
				<option disabled>-----------------</option>
				<?php
				while($row1 = mysqli_fetch_assoc($course)){
					$c = $row1['course_code'].' '.$row1['cyear'].'-'.$row1['csection'];
					
					echo '
					<option>'.$c.'</option>
					';
					}?>
			</select>
		<hr>
		
		<input type="submit" align="right"  name="btnSubmit" value="Save" />
		</form>
	<div style="margin-top:-5.5%; margin-left:6%;" ><a href="index.php?r=faculty/viewMakeup"><button>View request</button></a></div>
		
	
		
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
©Copyright 2014 <a href="#" title="Dbooom Themes">BCHIX Development Team | PUP Taguig</a> - All Rights Reserved.
</section>
<!-- End - Footer left -->
<!-- Footer right -->
<section id=footer-right>
<ul class=footer-navigation>
<!--
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
-->
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
