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
<title>Scheduling | Pre-Scheduling </title>
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

<h2 class="underlined-header">Pre-scheduling Management</h2>
	<h4>Category</h4>
	<?php
		$currYear=date("Y")+1;
		$prevYear=date("Y");
		$yearString = $prevYear."-".$currYear;
	?>
	<form name="frmSched" method = "post" action = "index.php?r=administrator/PreScheduling">
		<select name = "category" style="width: 30%;">
			<?php
				$all = "ALL";
				
				if(isset($_POST['category']))
				{
					if($_POST['category']=="ALL")
					{
						echo'<option>'."ALL".'</option>';
					}
					$cc = $_POST['category'];
					$sql1= "SELECT * FROM tbl_categories WHERE category = '$cc'";
					$result1 = mysqli_query($conn,$sql1);
					while($row1 = mysqli_fetch_array($result1)){
						echo'<option value="'.$cc.'">'.$row1['category'].'</option>';
					}
				}
				
				else if(isset($_GET['cat']))
				{
					if($_GET['cat']=="ALL")
					{
						echo'<option>'."ALL".'</option>';
					}
					$cc = $_GET['cat'];
					$sql1= "SELECT * FROM tbl_categories WHERE category = '$cc'";
					$result1 = mysqli_query($conn,$sql1);
					while($row1 = mysqli_fetch_array($result1)){
						echo'<option value="'.$cc.'">'.$row1['category'].'</option>';
					}
				}
		
				$sql = "SELECT * FROM tbl_categories";
				$result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($result)) 
				{
					echo '
						<option value="'. $row['category'] .'">'. $row['category'] .'</option>
					';
				}
				echo '<option>'.$all.'</option>';
			
			?>
		</select>
		</br>
		<h4>Semester</h4>
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
		
		<h4>School Year</h4>
		<select name = "sy" style="width: 30%;">
			<?php
				//echo'<option>'.$yearString.'</option>';
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
				$sql = "SELECT DISTINCT schoolYear FROM tbl_subjectload ORDER BY schoolYear DESC";
				$result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($result)) {
					echo '
						<option value="'. $row['schoolYear'] .'">'. $row['schoolYear'] .'</option>
					';
				}
			?>
		</select>
		<br />
		<h4>Year Level</h4>
		<select name = "yrlvl" style="width: 30%;">
			<?php
				echo'<option value = "ALL">ALL</option>';
				if(isset($_GET['sy'])){
						for($ayear=1;$ayear<=5;$ayear++) 
					{
						if($ayear==1) {
							$yr = "1ST";
						} else if($ayear==2) {
							$yr = "2ND";
						} else if($ayear==3) {
							$yr = "3RD";
						} else if($ayear==4) {
							$yr = "4TH";
						} else if($ayear==5) {
							$yr = "5TH";
						}
						echo'<option value="'.$ayear.'">'.$yr.'</option>';
					}
				}
				else if(isset($_POST['yrlvl']))
				{
					for($ayear=1;$ayear<=5;$ayear++) 
					{
						if($ayear==1) {
							$yr = "1ST";
						} else if($ayear==2) {
							$yr = "2ND";
						} else if($ayear==3) {
							$yr = "3RD";
						} else if($ayear==4) {
							$yr = "4TH";
						} else if($ayear==5) {
							$yr = "5TH";
						}
						echo'<option value="'.$ayear.'">'.$yr.'</option>';
					}
				}
				else
				{
					for($ayear=1;$ayear<=5;$ayear++) 
					{
						if($ayear==1) {
							$yr = "1ST";
						} else if($ayear==2) {
							$yr = "2ND";
						} else if($ayear==3) {
							$yr = "3RD";
						} else if($ayear==4) {
							$yr = "4TH";
						} else if($ayear==5) {
							$yr = "5TH";
						}
						echo'<option value="'.$ayear.'">'.$yr.'</option>';
					}
				}
			?>
		</select>
    <br/>
    <br/>
		<input type="submit" name="btnSubmit" value="Go" />
		</form>

</section>
<section>
    	<?php if(isset($_POST['sem'])) { ?>
<a href="index.php?r=administrator/PrintPreSched&sem=<?php if(isset($_POST['sem']) and isset($_POST['sy']) and isset($_POST['category'])) { echo $_POST['sem']; }?>&sy=<?php if(isset($_POST['sem']) and isset($_POST['sy']) and isset($_POST['category'])) { echo $_POST['sy']; }?>&cat=<?php if(isset($_POST['sem']) and isset($_POST['sy']) and isset($_POST['category'])) { echo $_POST['category']; }?>" class="btn btn-l" target = "blank">Print</a>
<?php } ?>
<table class=round-10 style="width:100%; ">
<tbody>
				
					<?php
						
						$csem = 0;
						$sy = "";
						$cat = "";
						if(isset($_POST['sem'])) {
							$csem = $_POST['sem'];
						}
						if(isset($_GET['sem'])) {
							$csem = $_GET['sem'];
						}
					
						if(isset($_POST['sy'])){
							$sy = $_POST['sy'];
						}
						if(isset($_GET['sy'])){
							$sy = $_GET['sy'];
						}
						
						
						
						if(isset($_POST['category']))
						{
							$cat = $_POST['category'];
							
							if($cat=="ALL")
							{
								$sqlcat = "SELECT * FROM tbl_categories";
								$querycat = mysqli_query($conn,$sqlcat);
								while($rowcat = mysqli_fetch_array($querycat))
								{
								    
									echo'<br/><h4 class="underlined-header">'.$rowcat['category'].'</h4>
									<table class="table table-bordered table-hover responsive-utilities">
									  <tbody>
										<tr>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"" >TITLE</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LEC</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LAB</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">COURSE</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">PROFESSOR</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">DAY</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">TIME</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">ROOM</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">ACTION</td>
										</tr>
									';
									$type = $rowcat['category'];
									$sqlcat1 = "SELECT * FROM tbl_subjects WHERE Category = '$type'";
									$querycat1 = mysqli_query($conn,$sqlcat1);
									while($rowcat1 = mysqli_fetch_array($querycat1))
									{
										$code = $rowcat1['SubjCode'];
										$sql = "SELECT * FROM tbl_subjectload WHERE scode = '$code' and sem = '$csem'";
										$query = mysqli_query($conn,$sql);
										while($row = mysqli_fetch_array($query))
										{
											$cID = $row['courseID'];
											$yrlvl = $row['cyear'];
											$cuID = $row['currID'];
											$spacer = "";
											$currID = checkCurrRef($cID,$yrlvl,$sy);	
											if($cuID == $currID)
											{
												$sqls = "SELECT * FROM tbl_subjectload WHERE currID = '$currID' AND scode='$code' AND cyear='$yrlvl' AND courseID='$cID' AND sem = '$csem'";
												$querys = mysqli_query($conn,$sqls);
												while($rows = mysqli_fetch_array($querys)) 
												{
													if(($rows['courseID'] == 1234 and $rows['cyear'] > 2) or ($rows['courseID'] == 1232 and $rows['cyear'] > 2) or ($rows['courseID'] == 16 and $rows['cyear'] > 2))
													{
														$spacer = 1;	
													}
													else
													{
														$stitle = $rows['stitle'];
														$lec = $rows['hrs_lec'];
														$lab = $rows['hrs_lab'];
														$sunit = $row['sunit'];
														$course = getCourse($rows['courseID'])." ".$rows['cyear']."-".$rows['csection'];
														$sec = $rows['csection'];
														$prof = getProf($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
														$day = getDay($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
														$time = getTime($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
														$room = getRoom($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
														
														echo '
														<tr>
															<td style="text-align: left;">'. $code .'</td>
															<td style="text-align: left;">'. $stitle .'</td>
															<td style="text-align: center;">'. $lec .'</td>
															<td style="text-align: center;">'. $lab .'</td>
															<td style="text-align: center;">'. $course.'</td>
															<td style="text-align: center;">'. $prof.'</td>
															<td style="text-align: center;">'. $day.'</td>
															<td style="text-align: center;">'. $time.'</td>
															<td style="text-align: center;">'. $room.'</td>
															<td><a href="index.php?r=administrator/setPreScheduling&currID='. $currID .'&scode='. $code .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&category='. $cat .'" class="btn btn-mini btn-primary btn-block" style="width:45px">UPDATE</a><a href="index.php?r=administrator/deletePreScheduling&currID='. $currID .'&scode='. $code .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&cat='. $cat .'" class="btn btn-mini btn-primary btn-block" style="width:45px">RESET</a><a href="index.php?r=administrator/AddPreSched&CurrID='. $currID .'&courseID='. $cID .'&cyear='. $yrlvl .'&scode='. $code .'&sy='. $sy .'&sec='. $sec .'&sem='.$csem.'&title='.$stitle.'&units='.$sunit.'&lec='.$lec.'&lab='.$lab.'&CurrID='. $currID .'&cat='. $cat .'" class="btn btn-mini btn-primary btn-block"style="width:45px">ADD SCHED</a></td>
														</tr>';
													}
												}
											}
										}	
									}
									echo'
									</tbody>
									</table>';
								}
							}
							else
							{
								echo '
									<h4 class="underlined-header">'.$cat.'</h4>
									<table class="table table-bordered table-hover responsive-utilities">
									  <tbody>
										<tr>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"" >TITLE</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LEC</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LAB</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">COURSE</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">PROFESSOR</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">DAY</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">TIME</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">ROOM</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">ACTION</td>
										</tr>
									';
								$sqlcat = "SELECT * FROM tbl_subjects WHERE Category = '$cat'";
								$querycat = mysqli_query($conn,$sqlcat);
								while($rowcat = mysqli_fetch_array($querycat))
								{
									$code = $rowcat['SubjCode'];
									$sql = "SELECT * FROM tbl_subjectload WHERE scode = '$code' and sem = '$csem'";
									$query = mysqli_query($conn,$sql);
									while($row = mysqli_fetch_array($query))
									{
										$cID = $row['courseID'];
										$yrlvl = $row['cyear'];
										$cuID = $row['currID'];
										$currID = checkCurrRef($cID,$yrlvl,$sy);	
										if($cuID == $currID)
										{
											$sqls = "SELECT * FROM tbl_subjectload WHERE currID = '$currID' AND scode='$code' AND cyear='$yrlvl' AND courseID='$cID' AND sem = '$csem'";
											$querys = mysqli_query($conn,$sqls);
											while($rows = mysqli_fetch_array($querys)) 
											{
												if(($rows['courseID'] == 1234 and $rows['cyear'] > 2) or ($rows['courseID'] == 1232 and $rows['cyear'] > 2) or ($rows['courseID'] == 16 and $rows['cyear'] > 2))
												{
													$spacer = 1;	
												}
												else
												{
													$stitle = $rows['stitle'];
													$lec = $rows['hrs_lec'];
													$lab = $rows['hrs_lab'];
													$sunit = $row['sunit'];
													$course = getCourse($rows['courseID'])." ".$rows['cyear']."-".$rows['csection'];
													$sec = $rows['csection'];
													$prof = getProf($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
													$day = getDay($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
													$time = getTime($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
													$room = getRoom($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
													
													echo '
													<tr>
														<td style="text-align: left;">'. $code .'</td>
														<td style="text-align: left;">'. $stitle .'</td>
														<td style="text-align: center;">'. $lec .'</td>
														<td style="text-align: center;">'. $lab .'</td>
														<td style="text-align: center;">'. $course.'</td>
														<td style="text-align: center;">'. $prof.'</td>
														<td style="text-align: center;">'. $day.'</td>
														<td style="text-align: center;">'. $time.'</td>
														<td style="text-align: center;">'. $room.'</td>
														<td><a href="index.php?r=administrator/setPreScheduling&currID='. $currID .'&scode='. $code .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&category='. $cat .'" class="btn btn-mini btn-primary btn-block" style="width:45px">UPDATE</a><a href="index.php?r=administrator/deletePreScheduling&currID='. $currID .'&scode='. $code .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&cat='. $cat .'" class="btn btn-mini btn-primary btn-block" style="width:45px">RESET</a><a href="index.php?r=administrator/AddPreSched&CurrID='. $currID .'&courseID='. $cID .'&cyear='. $yrlvl .'&scode='. $code .'&sy='. $sy .'&sec='. $sec .'&sem='.$csem.'&title='.$stitle.'&units='.$sunit.'&lec='.$lec.'&lab='.$lab.'&CurrID='. $currID .'&cat='. $cat .'" class="btn btn-mini btn-primary btn-block"style="width:45px">ADD SCHED</a></td>
													</tr>';
												}
											}
										}
									}
								}
							}
						}
						
						if(isset($_GET['cat']) and isset($_GET['sem']) and isset($_GET['sy']))
						{
							$cat = $_GET['cat'];
							$csem = $_GET['sem'];
							$sy = $_GET['sy'];
							
							if($cat=="ALL")
							{
								$sqlcat = "SELECT * FROM tbl_categories";
								$querycat = mysqli_query($conn,$sqlcat);
								while($rowcat = mysqli_fetch_array($querycat))
								{
									echo'<h4 class="underlined-header">'.$rowcat['category'].'</h4>
									<table class="table table-bordered table-hover responsive-utilities">
									  <tbody>
										<tr>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"" >TITLE</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LEC</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LAB</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">COURSE</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">PROFESSOR</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">DAY</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">TIME</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">ROOM</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">ACTION</td>
										</tr>
									
									';
									$type = $rowcat['category'];
									$sqlcat1 = "SELECT * FROM tbl_subjects WHERE Category = '$type'";
									$querycat1 = mysqli_query($conn,$sqlcat1);
									while($rowcat1 = mysqli_fetch_array($querycat1))
									{
										$code = $rowcat1['SubjCode'];
										$sql = "SELECT * FROM tbl_subjectload WHERE scode = '$code' and sem = '$csem' and schoolYear = '$sy'";
										$query = mysqli_query($conn,$sql);
										while($row = mysqli_fetch_array($query))
										{
											$cuID = $row['currID'];
											$cID = $row['courseID'];
											$yrlvl = $row['cyear'];
											$currID = checkCurrRef($cID,$yrlvl,$sy);	
											if($cuID == $currID)
											{
												$sqls = "SELECT * FROM tbl_subjectload WHERE currID = '$currID' AND scode='$code' AND cyear='$yrlvl' AND courseID='$cID' AND sem = '$csem' AND schoolYear = '$sy'";
												$querys = mysqli_query($conn,$sqls);
												while($rows = mysqli_fetch_array($querys)) 
												{
													if(($rows['courseID'] == 1234 and $rows['cyear'] > 2) or ($rows['courseID'] == 1232 and $rows['cyear'] > 2) or ($rows['courseID'] == 16 and $rows['cyear'] > 2))
													{
														$spacer = 1;	
													}
													else
													{
														$stitle = $rows['stitle'];
														$lec = $rows['hrs_lec'];
														$lab = $rows['hrs_lab'];
														$sunit = $row['sunit'];
														$course = getCourse($rows['courseID'])." ".$rows['cyear']."-".$rows['csection'];
														$sec = $rows['csection'];
														$prof = getProf($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
														$day = getDay($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
														$time = getTime($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
														$room = getRoom($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
														
														echo '
														<tr>
															<td style="text-align: left;">'. $code .'</td>
															<td style="text-align: left;">'. $stitle .'</td>
															<td style="text-align: center;">'. $lec .'</td>
															<td style="text-align: center;">'. $lab .'</td>
															<td style="text-align: center;">'. $course.'</td>
															<td style="text-align: center;">'. $prof.'</td>
															<td style="text-align: center;">'. $day.'</td>
															<td style="text-align: center;">'. $time.'</td>
															<td style="text-align: center;">'. $room.'</td>
															<td><a href="index.php?r=administrator/setPreScheduling&currID='. $currID .'&scode='. $code .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&category='. $cat .'" class="btn btn-mini btn-primary btn-block" style="width:45px">UPDATE</a><a href="index.php?r=administrator/deletePreScheduling&currID='. $currID .'&scode='. $code .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&cat='. $cat .'" class="btn btn-mini btn-primary btn-block" style="width:45px">RESET</a><a href="index.php?r=administrator/AddPreSched&CurrID='. $currID .'&courseID='. $cID .'&cyear='. $yrlvl .'&scode='. $code .'&sy='. $sy .'&sec='. $sec .'&sem='.$csem.'&title='.$stitle.'&units='.$sunit.'&lec='.$lec.'&lab='.$lab.'&CurrID='. $currID .'&cat='. $cat .'" class="btn btn-mini btn-primary btn-block"style="width:45px">ADD SCHED</a></td>
														</tr>';
													}
												}
											}
										}
									}
									echo'
									</tbody>
									</table>';
								}
							}
							
							else
							{
								echo '
								<h4 class="underlined-header">'.$cat.'</h4>
								<table class="table table-bordered table-hover responsive-utilities">
								  <tbody>
									<tr>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">CODE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"" >TITLE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LEC</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">LAB</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">COURSE</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">PROFESSOR</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">DAY</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">TIME</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">ROOM</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">ACTION</td>
									</tr>
								';
								$sqlcat = "SELECT * FROM tbl_subjects WHERE Category = '$cat'";
								$querycat = mysqli_query($conn,$sqlcat);
								while($rowcat = mysqli_fetch_array($querycat))
								{
									$code = $rowcat['SubjCode'];
									$sql = "SELECT * FROM tbl_subjectload WHERE scode = '$code' and sem = '$csem' and schoolYear = '$sy'";
									$query = mysqli_query($conn,$sql);
									while($row = mysqli_fetch_array($query))
									{
										$cuID = $row['currID'];
										$cID = $row['courseID'];
										$yrlvl = $row['cyear'];
										$currID = checkCurrRef($cID,$yrlvl,$sy);	
										if($cuID == $currID)
										{
											$sqls = "SELECT * FROM tbl_subjectload WHERE currID = '$currID' AND scode='$code' AND cyear='$yrlvl' AND courseID='$cID' AND sem = '$csem' AND schoolYear = '$sy'";
											$querys = mysqli_query($conn,$sqls);
											while($rows = mysqli_fetch_array($querys)) 
											{
												if(($rows['courseID'] == 1234 and $rows['cyear'] > 2) or ($rows['courseID'] == 1232 and $rows['cyear'] > 2) or ($rows['courseID'] == 16 and $rows['cyear'] > 2))
												{
													$spacer = 1;	
												}
												else
												{
													$stitle = $rows['stitle'];
													$lec = $rows['hrs_lec'];
													$lab = $rows['hrs_lab'];
													$course = getCourse($rows['courseID'])." ".$rows['cyear']."-".$rows['csection'];
													$sec = $rows['csection'];
													$sunit = $row['sunit'];
													$prof = getProf($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
													$day = getDay($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
													$time = getTime($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
													$room = getRoom($code,$currID,$cID,$sy,$sec,$yrlvl,$csem);
													
													echo '
													<tr>
														<td style="text-align: left;">'. $code .'</td>
														<td style="text-align: left;">'. $stitle .'</td>
														<td style="text-align: center;">'. $lec .'</td>
														<td style="text-align: center;">'. $lab .'</td>
														<td style="text-align: center;">'. $course.'</td>
														<td style="text-align: center;">'. $prof.'</td>
														<td style="text-align: center;">'. $day.'</td>
														<td style="text-align: center;">'. $time.'</td>
														<td style="text-align: center;">'. $room.'</td>
														<td><a href="index.php?r=administrator/setPreScheduling&currID='. $currID .'&scode='. $code .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&category='. $cat .'" class="btn btn-mini btn-primary btn-block" style="width:45px">UPDATE</a><a href="index.php?r=administrator/deletePreScheduling&currID='. $currID .'&scode='. $code .'&cID='. $cID .'&sem='. $csem .' &sy='. $sy .'&sec='. $sec .'&yrlvl='. $yrlvl .'&cat='. $cat .'" class="btn btn-mini btn-primary btn-block" style="width:45px">RESET</a><a href="index.php?r=administrator/AddPreSched&CurrID='. $currID .'&courseID='. $cID .'&cyear='. $yrlvl .'&scode='. $code .'&sy='. $sy .'&sec='. $sec .'&sem='.$csem.'&title='.$stitle.'&units='.$sunit.'&lec='.$lec.'&lab='.$lab.'&CurrID='. $currID .'&cat='. $cat .'" class="btn btn-mini btn-primary btn-block"style="width:45px">ADD SCHED</a></td>
													</tr>';
												}
											}
										}
									}
								}
							}
						}	
									
						
						function getCategory($code) 
						{
							include("config.php");
							$sql = "SELECT * FROM tbl_subjects WHERE SubjCode ='$code'"; 
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$cat = $row['Category'];
							return $cat;
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
						
						function checkCurrRef($cID,$yr,$sy) 
						{
							include("config.php");
							$sql = "SELECT * FROM tbl_subjectloadref WHERE courseID='$cID' AND cyear='$yr' AND schoolYear = '$sy'"; 
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$ID = $row['currID'];
							return $ID;
						}
						
						function getDay($scode,$currID,$cID,$sy,$sec)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec' AND Sched_type = 'OFFICIAL'";
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
						
						function getRoom($scode,$currID,$cID,$sy,$sec)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec' AND Sched_type = 'OFFICIAL'";
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
						
						function getProf($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec' AND Sched_type = 'OFFICIAL'";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$prof = getName($row['sprof']);
							return $prof;
						}
						
						function getTime($scode,$currID,$cID,$sy,$sec)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_schedule where scode ='$scode' and currID = '$currID' and schoolYear = '$sy' and courseID = '$cID' and csection = '$sec' AND Sched_type = 'OFFICIAL'";
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

