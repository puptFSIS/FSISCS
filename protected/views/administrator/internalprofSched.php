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
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<!--[if IE ]> <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <![endif]-->
<meta content='width=device-width, initial-scale=1.0' name=viewport />
<meta content='FSIS' name=keywords />
<meta content='PUP Taguig FSIS' name=description />
<meta content='vCore Team' name=author />
<!-- Page title -->
<title>Scheduling | Faculty Sched </title>
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

#internal_fac{
    background-color: #d8d8d8;
    color: black;
    padding: 5px;
    margin-bottom: 5px;
    float: right;
}

#internal_fac:hover{
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
</head>
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

<h2 class="underlined-header">Internal Faculty Daily Schedule</h2>
<br />
	<form name="frmSched" method = "post" action = "index.php?r=administrator/internalprofSched">
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
        <br/>
        <br/>
		<input type="submit" name="btnSubmit" value="Generate" />
		</form>

</section>
<section>
<table class=round-8 style="width:100%; ">
<tbody>
				
					<?php
						$csem = 0;
						$sy = "";
						if(isset($_POST['sem']) and isset($_POST['sy'])) 
						{
							$csem = $_POST['sem'];
							$sy = $_POST['sy'];
							$sqlo = "SELECT * from tbl_evaluationfaculty where status = 'Active' and int_courseGroup = 24 order by LName";
							$queryo = mysqli_query($conn,$sqlo);
							while($rowo = mysqli_fetch_array($queryo))
							{
								$pr = $rowo['FCode'];
								$sql = "SELECT DISTINCT sprof,sem,schoolYear FROM tbl_internaschedule WHERE sem = '$csem' and schoolYear = '$sy' and sprof = '$pr'";
								$query = mysqli_query($conn,$sql);
								while($row = mysqli_fetch_array($query))
								{
									$p = $row['sprof'];
									echo'<h4 class="underlined-header">'.getname($p).' <a href="index.php?r=administrator/PrintFDSinternal&prof='. $p .'&sem='. $csem .'&sy='. $sy .'" class="btn btn-s" target = "blank">Print</a></h4>
									
									<table class="table table-bordered table-hover responsive-utilities">
									  <tbody>
										<tr>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;">TIME</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"" >MONDAY</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">TUESDAY</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">WEDNESDAY</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">THURSDAY</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">FRIDAY</td>
											<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">SATURDAY</td>
										</tr>
									';	
									
									//////////////////////////////////////////////////////////7:30 - 10:30 Timeframe////////////////////////////////////////////////////////////
									
									/**
									*eto ung mga variable para sa display, 2 yan kasi up to 2 lng ung maximum na display ng schedule kada box.
									*/
									$codeM = $codeT = $codeW = $codeTH = $codeF = $codeS = "";
									$secM = $secT = $secW = $secTH = $secF = $secS = "";
									$yrlvlM = $yrlvlT = $yrlvlW = $yrlvlTH = $yrlvlF = $yrlvlS = "";
									$courseM = $courseT = $courseW = $courseTH = $courseF = $courseS = "";
									$timeM = $timeT = $timeW = $timeTH = $timeF = $timeS = "";
									$roomM = $roomT = $roomW = $roomTH = $roomF = $roomS = "";
									$startM = $startT = $startW = $startTH = $startF = $startS = 0;
									
									$codeM2 = $codeT2 = $codeW2 = $codeTH2 = $codeF2 = $codeS2 = "";
									$secM2 = $secT2 = $secW2 = $secTH2 = $secF2 = $secS2 = "";
									$yrlvlM2 = $yrlvlT2 = $yrlvlW2 = $yrlvlTH2 = $yrlvlF2 = $yrlvlS2 = ""; 
									$courseM2 = $courseT2 = $courseW2 = $courseTH2 = $courseF2 = $courseS2 = "";
									$timeM2 = $timeT2 = $timeW2 = $timeTH2 = $timeF2 = $timeS2 = "";
									$roomM2 = $roomT2 = $roomW2 = $roomTH2 = $roomF2 = $roomS2 = "";
									$startM2 = $startT2 = $startW2 = $startTH2 = $startF2 = $startS2 = 0;
									
									/**
									*eto ung count kung may laman na ung isang box, kung meron na laman sa pangalawang variable ng time nya na ilalagay ung display ng time ska room.
									*/
									$cM = $cT = $cW = $cTH = $cF = $cS = 0;
								
									$sql1 = "SELECT * FROM tbl_internaschedule WHERE sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS < 1030";
									$query1 = mysqli_query($conn,$sql1);
									while($row1 = mysqli_fetch_array($query1))
									{
										$currID = $row1['currID'];
										$cID = $row1['courseID'];
										//$day = getDay($row1['scode'],$row1['currID'],$row1['courseID'],$sy,$row1['csection'],$row1['cyear'],$csem);
										if($row1['sday']=='S' and $row1['stimeS']<1030)
										{
											if($cS == 0)
											{
												$startS = $row1['stimeS'];
												$codeS = $row1['scode'];									
												$secS = $row1['csection'];
												$yrlvlS = $row1['cyear'];
												$courseS = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
												{
													$timeS = getTime($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												}
												else
												{
													$timeS = "";
												}
												$roomS = getRoom($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												$cS = $cS + 1;
											}else if($cS > 0)
											{
												$startS2 = $row1['stimeS'];
												$codeS2 = $row1['scode'];									
												$secS2 = $row1['csection'];
												$yrlvlS2 = $row1['cyear'];
												$courseS2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
												{
													$timeS2 = getTime($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
												}
												else
												{
													$timeS2 = "";
												}
												$roomS2 = getRoom($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
											}
										}
										else if($row1['sday']=='M' and $row1['stimeS']<1030)
										{	
											if($cM == 0)
											{
												$startM = $row1['stimeS'];
												$codeM = $row1['scode'];									
												$secM = $row1['csection'];
												$yrlvlM = $row1['cyear'];
												$courseM = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
												{
													$timeM = getTime($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												}
												else
												{
													$timeM = "";
												}
												$roomM = getRoom($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												$cM = $cM + 1;
											}else if($cM > 0)
											{
												$startM2 = $row1['stimeS'];
												$codeM2 = $row1['scode'];									
												$secM2 = $row1['csection'];
												$yrlvlM2 = $row1['cyear'];
												$courseM2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
												{
													$timeM2 = getTime($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
												}
												else
												{
													$timeM2 = "";
												}
												$roomM2 = getRoom($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
											}
										}
										else if($row1['sday']=='T' and $row1['stimeS']<1030)
										{
											if($cT == 0)
											{
												$startT = $row1['stimeS'];
												$codeT = $row1['scode'];									
												$secT = $row1['csection'];
												$yrlvlT = $row1['cyear'];
												$courseT = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
												{
													$timeT = getTime($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												}
												else
												{
													$timeT = "";
												}	
												$roomT = getRoom($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												$cT = $cT + 1;
											}elseif ($cT > 0)
											{
												$startT2 = $row1['stimeS'];
												$codeT2 = $row1['scode'];									
												$secT2 = $row1['csection'];
												$yrlvlT2 = $row1['cyear'];
												$courseT2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
												{
													$timeT2 = getTime($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
												}
												else
												{
													$timeT2 = "";
												}	
												$roomT2 = getRoom($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
											}
										}
										else if($row1['sday']=='W' and $row1['stimeS']<1030)
										{
											if($cW == 0)
											{
												$startW = $row1['stimeS'];
												$codeW = $row1['scode'];									
												$secW = $row1['csection'];
												$yrlvlW = $row1['cyear'];
												$courseW = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
												{
													$timeW = getTime($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												}
												else
												{
													$timeW = "";
												}		
												$roomW = getRoom($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												$cW = $cW + 1;
											}elseif ($cW > 0)
											{
												$startW2 = $row1['stimeS'];
												$codeW2 = $row1['scode'];									
												$secW2 = $row1['csection'];
												$yrlvlW2 = $row1['cyear'];
												$courseW2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
												{
													$timeW2 = getTime($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
												}
												else
												{
													$timeW2 = "";
												}		
												$roomW2 = getRoom($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
											}	
										}
										else if($row1['sday']=='TH' and $row1['stimeS']<1030)
										{
											if($cTH == 0)
											{
												$startTH = $row1['stimeS'];
												$codeTH = $row1['scode'];									
												$secTH = $row1['csection'];
												$yrlvlTH = $row1['cyear'];
												$courseTH = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
												{
													$timeTH = getTime($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												}
												else
												{
													$timeTH = "";
												}	
												$roomTH = getRoom($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												$cTH = $cTH + 1;
											}elseif($cTH > 0)
											{
												$startTH2 = $row1['stimeS'];
												$codeTH2 = $row1['scode'];									
												$secTH2 = $row1['csection'];
												$yrlvlTH2 = $row1['cyear'];
												$courseTH2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
												{
													$timeTH2 = getTime($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
												}
												else
												{
													$timeTH2 = "";
												}	
												$roomTH2 = getRoom($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
											}
										}
										else if($row1['sday']=='F' and $row1['stimeS']<1030)
										{
											if($cF == 0)
											{
												$startF = $row1['stimeS'];
												$codeF = $row1['scode'];									
												$secF = $row1['csection'];
												$yrlvlF = $row1['cyear'];
												$courseF = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
												{
													$timeF = getTime($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												}
												else
												{
													$timeF = "";
												}	
												$roomF = getRoom($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												$cF = $cF + 1;
											}elseif($cF > 0)
											{
												$startF2 = $row1['stimeS'];
												$codeF2 = $row1['scode'];									
												$secF2 = $row1['csection'];
												$yrlvlF2 = $row1['cyear'];
												$courseF2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>730 or $row1['stimeE'] <> 1030)
												{
													$timeF2 = getTime($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
												}
												else
												{
													$timeF2 = "";
												}	
												$roomF2 = getRoom($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
											}	
										}
									}
									
									$sql1 = "SELECT * FROM tbl_internaschedule WHERE sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS2 < 1030";
									$query1 = mysqli_query($conn,$sql1);
									while($row1 = mysqli_fetch_array($query1))
									{
										$currID = $row1['currID'];
										$cID = $row1['courseID'];
										
										if($row1['sday2']=='M' and $row1['stimeS2']<1030)
										{
											
											if($cM == 0)
											{
												$startM = $row1['stimeS2'];
												$codeM = $row1['scode'];									
												$secM = $row1['csection'];
												$yrlvlM = $row1['cyear'];
												$courseM = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
												{
													$timeM = getTime2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												}
												else
												{
													$timeM = "";
												}
												$roomM = getRoom2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												$cM = $cM + 1;
											}else if($cM > 0)
											{
												$startM2 = $row1['stimeS2'];
												$codeM2 = $row1['scode'];									
												$secM2 = $row1['csection'];
												$yrlvlM2 = $row1['cyear'];
												$courseM2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
												{
													$timeM2 = getTime2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
												}
												else
												{
													$timeM2 = "";
												}
												$roomM2 = getRoom2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
											}			
										}
										else if($row1['sday2']=='T' and $row1['stimeS2']<1030)
										{
											if($cT == 0)
											{
												$startT = $row1['stimeS2'];
												$codeT = $row1['scode'];									
												$secT = $row1['csection'];
												$yrlvlT = $row1['cyear'];
												$courseT = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
												{
													$timeT = getTime2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												}
												else
												{
													$timeT = "";
												}	
												$roomT = getRoom2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												$cT = $cT + 1;
											}elseif ($cT > 0)
											{
												$startT2 = $row1['stimeS2'];
												$codeT2 = $row1['scode'];									
												$secT2 = $row1['csection'];
												$yrlvlT2 = $row1['cyear'];
												$courseT2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
												{
													$timeT2 = getTime2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
												}
												else
												{
													$timeT2 = "";
												}	
												$roomT2 = getRoom2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
											}
										}
										elseif($row1['sday2']=='W' and $row1['stimeS2']<1030)
										{
											if($cW == 0)
											{
												$startW = $row1['stimeS2'];
												$codeW = $row1['scode'];									
												$secW = $row1['csection'];
												$yrlvlW = $row1['cyear'];
												$courseW = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
												{
													$timeW = getTime2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												}
												else
												{
													$timeW = "";
												}		
												$roomW = getRoom2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												$cW = $cW + 1;
											}elseif ($cW > 0)
											{
												$startW2 = $row1['stimeS2'];
												$codeW2 = $row1['scode'];									
												$secW2 = $row1['csection'];
												$yrlvlW2 = $row1['cyear'];
												$courseW2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
												{
													$timeW2 = getTime2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
												}
												else
												{
													$timeW2 = "";
												}		
												$roomW2 = getRoom2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
											}
										}
										elseif($row1['sday2']=='TH' and $row1['stimeS2']<1030)
										{
											if($cTH == 0)
											{
												$startTH = $row1['stimeS2'];
												$codeTH = $row1['scode'];									
												$secTH = $row1['csection'];
												$yrlvlTH = $row1['cyear'];
												$courseTH = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
												{
													$timeTH = getTime2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												}
												else
												{
													$timeTH = "";
												}	
												$roomTH = getRoom2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												$cTH = $cTH + 1;
											}elseif($cTH > 0)
											{
												$startTH2 = $row1['stimeS2'];
												$codeTH2 = $row1['scode'];									
												$secTH2 = $row1['csection'];
												$yrlvlTH2 = $row1['cyear'];
												$courseTH2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
												{
													$timeTH2 = getTime2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
												}
												else
												{
													$timeTH2 = "";
												}	
												$roomTH2 = getRoom2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
											}
										}
										else if($row1['sday2']=='F' and $row1['stimeS2']<1030)
										{
											if($cF == 0)
											{
												$startF = $row1['stimeS2'];
												$codeF = $row1['scode'];									
												$secF = $row1['csection'];
												$yrlvlF = $row1['cyear'];
												$courseF = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
												{
													$timeF = getTime2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												}
												else
												{
													$timeF = "";
												}	
												$roomF = getRoom2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												$cF = $cF + 1;
											}elseif($cF > 0)
											{
												$startF2 = $row1['stimeS2'];
												$codeF2 = $row1['scode'];									
												$secF2 = $row1['csection'];
												$yrlvlF2 = $row1['cyear'];
												$courseF2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
												{
													$timeF2 = getTime2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
												}
												else
												{
													$timeF2 = "";
												}	
												$roomF2 = getRoom2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
											}	
										}
										else if($row1['sday2']=='S' and $row1['stimeS2']<1030)
										{
											if($cS == 0)
											{
												$startS = $row1['stimeS2'];
												$codeS = $row1['scode'];									
												$secS = $row1['csection'];
												$yrlvlS = $row1['cyear'];
												$courseS = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
												{
													$timeS = getTime2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												}
												else
												{
													$timeS = "";
												}
												$roomS = getRoom2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												$cS = $cS + 1;
											}else if($cS > 0)
											{
												$startS2 = $row1['stimeS2'];
												$codeS2 = $row1['scode'];									
												$secS2 = $row1['csection'];
												$yrlvlS2 = $row1['cyear'];
												$courseS2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS2']<>730 or $row1['stimeE2'] <> 1030)
												{
													$timeS2 = getTime2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
												}
												else
												{
													$timeS2 = "";
												}
												$roomS2 = getRoom2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
											}
										}
									}
										
									$timeframe = "7:30 - 10:30 AM";

									echo'
									<tr>
									<td style="text-align: center;" width = "10%">'. $timeframe .'</td>
									';
										if($cM == 0 or ($cM > 0 and $courseM2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseM . '<br />'. $codeM .'<br />'. $roomM .'<br />'. $timeM .'</td>';
										}elseif($cM > 0)
										{
											if($startM<$startM2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseM . '<br />'. $codeM .'<br />'. $roomM .'<br />'. $timeM .'<br />'.' / '. $courseM2 .'<br />'. $codeM2 .'<br />'. $roomM2 .'<br />'. $timeM2 .'</td>';
											}else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseM2 . '<br />'. $codeM2 .'<br />'. $roomM2 .'<br />'. $timeM2 .'<br />'.' / '. $courseM .'<br />'. $codeM .'<br />'. $roomM .'<br />'. $timeM .'</td>';
											}
										}
										if($cT == 0 or ($cT > 0 and $courseT2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseT . '<br />'. $codeT .'<br />'. $roomT .'<br />'. $timeT .'</td>';
										}
										elseif($cT > 0)
										{
											if($startT<$startT2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseT . '<br />'. $codeT .'<br />'. $roomT .'<br />'. $timeT .'<br />'.' / '. $courseT2 .'<br />'. $codeT2 .'<br />'. $roomT2 .'<br />'. $timeT2 .'</td>';
											}
											else
											{
												echo'
											<td style="text-align: center;" width = "15%">'. $courseT2 . '<br />'. $codeT2 .'<br />'. $roomT2 .'<br />'. $timeT2 .'<br />'.' / '. $courseT .'<br />'. $codeT .'<br />'. $roomT .'<br />'. $timeT .'</td>';
											}
										}
										if($cW == 0 or ($cW > 0 and $courseW2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseW . '<br />'. $codeW .'<br />'. $roomW .'<br />'. $timeW .'</td>';
										}
										elseif($cW > 0)
										{
											if($startW<$startW2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseW . '<br />'. $codeW .'<br />'. $roomW .'<br />'. $timeW .'<br />'.' / '. $courseW2 .'<br />'. $codeW2 .'<br />'. $roomW2 .'<br />'. $timeW2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseW2 . '<br />'. $codeW2 .'<br />'. $roomW2 .'<br />'. $timeW2 .'<br />'.' / '. $courseW .'<br />'. $codeW .'<br />'. $roomW .'<br />'. $timeW .'</td>';
											}
										}
										if($cTH == 0 or ($cTH > 0 and $courseTH2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseTH . '<br />'. $codeTH .'<br />'. $roomTH .'<br />'. $timeTH .'</td>';
										}
										elseif($cTH > 0)
										{	
											if($startTH<$startTH2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseTH . '<br />'. $codeTH .'<br />'. $roomTH .'<br />'. $timeTH .'<br />'.' / '. $courseTH2 .'<br />'. $codeTH2 .'<br />'. $roomTH2 .'<br />'. $timeTH2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseTH2 . '<br />'. $codeTH2 .'<br />'. $roomTH2 .'<br />'. $timeTH2 .'<br />'.' / '. $courseTH .'<br />'. $codeTH .'<br />'. $roomTH .'<br />'. $timeTH .'</td>';
											}
										}
										if($cF == 0 or ($cF > 0 and $courseF2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseF . '<br />'. $codeF .'<br />'. $roomF .'<br />'. $timeF .'</td>';
										}
										elseif($cF > 0)
										{
											if($startF<$startF2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseF . '<br />'. $codeF .'<br />'. $roomF .'<br />'. $timeF .'<br />'.' / '. $courseF2 .'<br />'. $codeF2 .'<br />'. $roomF2 .'<br />'. $timeF2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseF2 . '<br />'. $codeF2 .'<br />'. $roomF2 .'<br />'. $timeF2 .'<br />'.' / '. $courseF .'<br />'. $codeF .'<br />'. $roomF .'<br />'. $timeF .'</td>';
											}
										}
										if($cS == 0 or ($cS > 0 and $courseS2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseS . '<br />'. $codeS .'<br />'. $roomS .'<br />'. $timeS .'</td>';
										}
										elseif($cS > 0)
										{
											if($startS<$startS2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseS . '<br />'. $codeS .'<br />'. $roomS .'<br />'. $timeS .'<br />'.' / '. $courseS2 .'<br />'. $codeS2 .'<br />'. $roomS2 .'<br />'. $timeS2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseS2 . '<br />'. $codeS2 .'<br />'. $roomS2 .'<br />'. $timeS2 .'<br />'.' / '. $courseS .'<br />'. $codeS .'<br />'. $roomS .'<br />'. $timeS .'</td>';
											}
										}
									echo'
									</tr>';
									
									//////////////////////////////////////////////////////////10:30 - 1:30 Timeframe////////////////////////////////////////////////////////////
									
									/**
									*eto ung mga variable para sa display, 2 yan kasi up to 2 lng ung maximum na display ng schedule kada box.
									*/
									$codeM = $codeT = $codeW = $codeTH = $codeF = $codeS = "";
									$secM = $secT = $secW = $secTH = $secF = $secS = "";
									$yrlvlM = $yrlvlT = $yrlvlW = $yrlvlTH = $yrlvlF = $yrlvlS = "";
									$courseM = $courseT = $courseW = $courseTH = $courseF = $courseS = "";
									$timeM = $timeT = $timeW = $timeTH = $timeF = $timeS = "";
									$roomM = $roomT = $roomW = $roomTH = $roomF = $roomS = "";
									$startM = $startT = $startW = $startTH = $startF = $startS = 0;
									
									$codeM2 = $codeT2 = $codeW2 = $codeTH2 = $codeF2 = $codeS2 = "";
									$secM2 = $secT2 = $secW2 = $secTH2 = $secF2 = $secS2 = "";
									$yrlvlM2 = $yrlvlT2 = $yrlvlW2 = $yrlvlTH2 = $yrlvlF2 = $yrlvlS2 = ""; 
									$courseM2 = $courseT2 = $courseW2 = $courseTH2 = $courseF2 = $courseS2 = "";
									$timeM2 = $timeT2 = $timeW2 = $timeTH2 = $timeF2 = $timeS2 = "";
									$roomM2 = $roomT2 = $roomW2 = $roomTH2 = $roomF2 = $roomS2 = "";
									$startM2 = $startT2 = $startW2 = $startTH2 = $startF2 = $startS2 = 0;
									
									/**
									*eto ung count kung may laman na ung isang box, kung meron na laman sa pangalawang variable ng time nya na ilalagay ung display ng time ska room.
									*/
									$cM = $cT = $cW = $cTH = $cF = $cS = 0;
									
									$sql1 = "SELECT * FROM tbl_internaschedule WHERE (sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS >= 1030 and stimeS <1330) or (sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS < 1030 and stimeE > 1030)";
									$query1 = mysqli_query($conn,$sql1);
									while($row1 = mysqli_fetch_array($query1))
									{
										$currID = $row1['currID'];
										$cID = $row1['courseID'];
										if(($row1['sday']=='M' and $row1['stimeS'] >= 1030 and $row1['stimeS'] <1330) or ($row1['sday']=='M' and $row1['stimeS'] < 1030 and $row1['stimeE'] > 1030))
										{
											if($cM == 0)
											{
												$startM = $row1['stimeS'];
												$codeM = $row1['scode'];									
												$secM = $row1['csection'];
												$yrlvlM = $row1['cyear'];
												$courseM = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
												{
													$timeM = getTime($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												}
												else
												{
													$timeM = "";
												}
												$roomM = getRoom($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												$cM = $cM + 1;
											}else if($cM > 0)
											{
												$startM2 = $row1['stimeS'];
												$codeM2 = $row1['scode'];									
												$secM2 = $row1['csection'];
												$yrlvlM2 = $row1['cyear'];
												$courseM2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
												{
													$timeM2 = getTime($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
												}
												else
												{
													$timeM2 = "";
												}
												$roomM2 = getRoom($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
											}			
										}
										else if(($row1['sday']=='T' and $row1['stimeS']>= 1030 and $row1['stimeS'] <1330) or ($row1['sday']=='T' and $row1['stimeS'] < 1030 and $row1['stimeE'] > 1030))
										{
											if($cT == 0)
											{
												$startT = $row1['stimeS'];
												$codeT = $row1['scode'];									
												$secT = $row1['csection'];
												$yrlvlT = $row1['cyear'];
												$courseT = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
												{
													$timeT = getTime($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												}
												else
												{
													$timeT = "";
												}	
												$roomT = getRoom($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												$cT = $cT + 1;
											}elseif ($cT > 0)
											{
												$startT2 = $row1['stimeS'];
												$codeT2 = $row1['scode'];									
												$secT2 = $row1['csection'];
												$yrlvlT2 = $row1['cyear'];
												$courseT2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
												{
													$timeT2 = getTime($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
												}
												else
												{
													$timeT2 = "";
												}	
												$roomT2 = getRoom($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
											}
										}
										else if(($row1['sday'] == 'W' and $row1['stimeS'] >= 1030 and $row1['stimeS'] <1330) or ($row1['sday'] == 'W' and $row1['stimeS'] < 1030 and $row1['stimeE'] > 1030))
										{
											if($cW == 0)
											{
												$startW = $row1['stimeS'];
												$codeW = $row1['scode'];									
												$secW = $row1['csection'];
												$yrlvlW = $row1['cyear'];
												$courseW = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
												{
													$timeW = getTime($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												}
												else
												{
													$timeW = "";
												}		
												$roomW = getRoom($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												$cW = $cW + 1;
											}elseif ($cW > 0)
											{
												$startW2 = $row1['stimeS'];
												$codeW2 = $row1['scode'];									
												$secW2 = $row1['csection'];
												$yrlvlW2 = $row1['cyear'];
												$courseW2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
												{
													$timeW2 = getTime($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
												}
												else
												{
													$timeW2 = "";
												}		
												$roomW2 = getRoom($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
											}
										}
										else if(($row1['sday'] == 'TH' and $row1['stimeS'] >= 1030 and $row1['stimeS'] <1330) or ($row1['sday'] == 'TH' and $row1['stimeS'] < 1030 and $row1['stimeE'] > 1030))
										{
											if($cTH == 0)
											{
												$startTH = $row1['stimeS'];
												$codeTH = $row1['scode'];									
												$secTH = $row1['csection'];
												$yrlvlTH = $row1['cyear'];
												$courseTH = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
												{
													$timeTH = getTime($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												}
												else
												{
													$timeTH = "";
												}	
												$roomTH = getRoom($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												$cTH = $cTH + 1;
											}elseif($cTH > 0)
											{
												$startTH2 = $row1['stimeS'];
												$codeTH2 = $row1['scode'];									
												$secTH2 = $row1['csection'];
												$yrlvlTH2 = $row1['cyear'];
												$courseTH2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
												{
													$timeTH2 = getTime($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
												}
												else
												{
													$timeTH2 = "";
												}	
												$roomTH2 = getRoom($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
											}
										}
										else if(($row1['sday'] == 'F' and $row1['stimeS'] >= 1030 and $row1['stimeS'] <1330) or ($row1['sday'] == 'F' and $row1['stimeS'] < 1030 and $row1['stimeE'] > 1030))
										{
											if($cF == 0)
											{
												$startF = $row1['stimeS'];
												$codeF = $row1['scode'];									
												$secF = $row1['csection'];
												$yrlvlF = $row1['cyear'];
												$courseF = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
												{
													$timeF = getTime($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												}
												else
												{
													$timeF = "";
												}	
												$roomF = getRoom($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												$cF = $cF + 1;
											}elseif($cF > 0)
											{
												$startF2 = $row1['stimeS'];
												$codeF2 = $row1['scode'];									
												$secF2 = $row1['csection'];
												$yrlvlF2 = $row1['cyear'];
												$courseF2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
												{
													$timeF2 = getTime($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
												}
												else
												{
													$timeF2 = "";
												}	
												$roomF2 = getRoom($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
											}	
										}
										else if(($row1['sday'] == 'S' and $row1['stimeS'] >= 1030 and $row1['stimeS'] <1330) or ($row1['sday'] == 'S' and $row1['stimeS'] < 1030 and $row1['stimeE'] > 1030))
										{
											if($cS == 0)
											{
												$startS = $row1['stimeS'];
												$codeS = $row1['scode'];									
												$secS = $row1['csection'];
												$yrlvlS = $row1['cyear'];
												$courseS = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
												{
													$timeS = getTime($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												}
												else
												{
													$timeS = "";
												}
												$roomS = getRoom($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												$cS = $cS + 1;
											}elseif ($cS > 0)
											{
												$startS2 = $row1['stimeS'];
												$codeS2 = $row1['scode'];									
												$secS2 = $row1['csection'];
												$yrlvlS2 = $row1['cyear'];
												$courseS2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1030 or $row1['stimeE'] <> 1330)
												{
													$timeS2 = getTime($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
												}
												else
												{
													$timeS2 = "";
												}
												$roomS2 = getRoom($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
											}	
										}
									}	
									
									$sql1 = "SELECT * FROM tbl_internaschedule WHERE (sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS2 >= 1030 and stimeS2 <1330) or (sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS2 < 1030 and stimeE2 > 1030)";
									$query1 = mysqli_query($conn,$sql1);
									while($row1 = mysqli_fetch_array($query1))
									{
										$currID = $row1['currID'];
										$cID = $row1['courseID'];

										if(($row1['sday2']=='M' and $row1['stimeS2'] >= 1030 and $row1['stimeS2'] <1330) or ($row1['sday2']=='M' and $row1['stimeS2'] < 1030 and $row1['stimeE2'] > 1030))
										{
											if($cM == 0)
											{
												$startM = $row1['stimeS2'];
												$codeM = $row1['scode'];									
												$secM = $row1['csection'];
												$yrlvlM = $row1['cyear'];
												$courseM = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
												{
													$timeM = getTime2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												}
												else
												{
													$timeM = "";
												}
												$roomM = getRoom2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												$cM = $cM + 1;
											}else if($cM > 0)
											{
												$startM2 = $row1['stimeS2'];
												$codeM2 = $row1['scode'];									
												$secM2 = $row1['csection'];
												$yrlvlM2 = $row1['cyear'];
												$courseM2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
												{
													$timeM2 = getTime2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
												}
												else
												{
													$timeM2 = "";
												}
												$roomM2 = getRoom2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
											}	
										}
										else if(($row1['sday2']=='T' and $row1['stimeS2']>= 1030 and $row1['stimeS2'] <1330) or ($row1['sday2']=='T' and $row1['stimeS2'] < 1030 and $row1['stimeE2'] > 1030))
										{
											if($cT == 0)
											{
												$startT = $row1['stimeS2'];
												$codeT = $row1['scode'];									
												$secT = $row1['csection'];
												$yrlvlT = $row1['cyear'];
												$courseT = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
												{
													$timeT = getTime2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												}
												else
												{
													$timeT = "";
												}	
												$roomT = getRoom2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												$cT = $cT + 1;
											}elseif ($cT > 0)
											{
												$startT2 = $row1['stimeS2'];
												$codeT2 = $row1['scode'];									
												$secT2 = $row1['csection'];
												$yrlvlT2 = $row1['cyear'];
												$courseT2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
												{
													$timeT2 = getTime2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
												}
												else
												{
													$timeT2 = "";
												}	
												$roomT2 = getRoom2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
											}
										}
										else if(($row1['sday2'] == 'W' and $row1['stimeS2'] >= 1030 and $row1['stimeS2'] <1330) or ($row1['sday2'] == 'W' and $row1['stimeS2'] < 1030 and $row1['stimeE2'] > 1030))
										{
											if($cW == 0)
											{
												$startW = $row1['stimeS2'];
												$codeW = $row1['scode'];									
												$secW = $row1['csection'];
												$yrlvlW = $row1['cyear'];
												$courseW = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
												{
													$timeW = getTime2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												}
												else
												{
													$timeW = "";
												}		
												$roomW = getRoom2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												$cW = $cW + 1;
											}elseif ($cW > 0)
											{
												$startW2 = $row1['stimeS2'];
												$codeW2 = $row1['scode'];									
												$secW2 = $row1['csection'];
												$yrlvlW2 = $row1['cyear'];
												$courseW2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
												{
													$timeW2 = getTime2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
												}
												else
												{
													$timeW2 = "";
												}		
												$roomW2 = getRoom2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
											}
										}
										else if(($row1['sday2'] == 'TH' and $row1['stimeS2'] >= 1030 and $row1['stimeS2'] <1330) or ($row1['sday2'] == 'TH' and $row1['stimeS2'] < 1030 and $row1['stimeE2'] > 1030))
										{
											if($cTH == 0)
											{
												$startTH = $row1['stimeS2'];
												$codeTH = $row1['scode'];									
												$secTH = $row1['csection'];
												$yrlvlTH = $row1['cyear'];
												$courseTH = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
												{
													$timeTH = getTime2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												}
												else
												{
													$timeTH = "";
												}	
												$roomTH = getRoom2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												$cTH = $cTH + 1;
											}elseif($cTH > 0)
											{
												$startTH2 = $row1['stimeS2'];
												$codeTH2 = $row1['scode'];									
												$secTH2 = $row1['csection'];
												$yrlvlTH2 = $row1['cyear'];
												$courseTH2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
												{
													$timeTH2 = getTime2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
												}
												else
												{
													$timeTH2 = "";
												}	
												$roomTH2 = getRoom2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
											}
										}
										else if(($row1['sday2'] == 'F' and $row1['stimeS2'] >= 1030 and $row1['stimeS2'] <1330) or ($row1['sday2'] == 'F' and $row1['stimeS2'] < 1030 and $row1['stimeE2'] > 1030))
										{
											if($cF == 0)
											{
												$startF = $row1['stimeS2'];
												$codeF = $row1['scode'];									
												$secF = $row1['csection'];
												$yrlvlF = $row1['cyear'];
												$courseF = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
												{
													$timeF = getTime2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												}
												else
												{
													$timeF = "";
												}	
												$roomF = getRoom2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												$cF = $cF + 1;
											}elseif($cF > 0)
											{	
												$startF2 = $row1['stimeS2'];
												$codeF2 = $row1['scode'];									
												$secF2 = $row1['csection'];
												$yrlvlF2 = $row1['cyear'];
												$courseF2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
												{
													$timeF2 = getTime2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
												}
												else
												{
													$timeF2 = "";
												}	
												$roomF2 = getRoom2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
											}	
										}
										else if(($row1['sday2'] == 'S' and $row1['stimeS2'] >= 1030 and $row1['stimeS2'] <1330) or ($row1['sday2'] == 'S' and $row1['stimeS2'] < 1030 and $row1['stimeE2'] > 1030))
										{
											
											if($cS == 0)
											{
												$startS = $row1['stimeS2'];
												$codeS = $row1['scode'];									
												$secS = $row1['csection'];
												$yrlvlS = $row1['cyear'];
												$courseS = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
												{
													$timeS = getTime2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												}
												else
												{
													$timeS = "";
												}
												$roomS = getRoom2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												$cS = $cS + 1;
											}elseif ($cS > 0)
											{
												$startS2 = $row1['stimeS2'];
												$codeS2 = $row1['scode'];									
												$secS2 = $row1['csection'];
												$yrlvlS2 = $row1['cyear'];
												$courseS2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1030 or $row1['stimeE2'] <> 1330)
												{
													$timeS2 = getTime2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
												}
												else
												{
													$timeS2 = "";
												}
												$roomS2 = getRoom2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
											}	
										}
									}
									$timeframe = "10:30 - 1:30 PM";
									
									echo'
									<tr>
									<td style="text-align: center;" width = "10%">'. $timeframe .'</td>
									';
										if($cM == 0 or ($cM > 0 and $courseM2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseM . '<br />'. $codeM .'<br />'. $roomM .'<br />'. $timeM .'</td>';
										}elseif($cM > 0)
										{
											if($startM<$startM2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseM . '<br />'. $codeM .'<br />'. $roomM .'<br />'. $timeM .'<br />'.' / '. $courseM2 .'<br />'. $codeM2 .'<br />'. $roomM2 .'<br />'. $timeM2 .'</td>';
											}else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseM2 . '<br />'. $codeM2 .'<br />'. $roomM2 .'<br />'. $timeM2 .'<br />'.' / '. $courseM .'<br />'. $codeM .'<br />'. $roomM .'<br />'. $timeM .'</td>';
											}
										}
										if($cT == 0 or ($cT > 0 and $courseT2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseT . '<br />'. $codeT .'<br />'. $roomT .'<br />'. $timeT .'</td>';
										}
										elseif($cT > 0)
										{
											if($startT<$startT2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseT . '<br />'. $codeT .'<br />'. $roomT .'<br />'. $timeT .'<br />'.' / '. $courseT2 .'<br />'. $codeT2 .'<br />'. $roomT2 .'<br />'. $timeT2 .'</td>';
											}
											else
											{
												echo'
											<td style="text-align: center;" width = "15%">'. $courseT2 . '<br />'. $codeT2 .'<br />'. $roomT2 .'<br />'. $timeT2 .'<br />'.' / '. $courseT .'<br />'. $codeT .'<br />'. $roomT .'<br />'. $timeT .'</td>';
											}
										}
										if($cW == 0 or ($cW > 0 and $courseW2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseW . '<br />'. $codeW .'<br />'. $roomW .'<br />'. $timeW .'</td>';
										}
										elseif($cW > 0)
										{
											if($startW<$startW2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseW . '<br />'. $codeW .'<br />'. $roomW .'<br />'. $timeW .'<br />'.' / '. $courseW2 .'<br />'. $codeW2 .'<br />'. $roomW2 .'<br />'. $timeW2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseW2 . '<br />'. $codeW2 .'<br />'. $roomW2 .'<br />'. $timeW2 .'<br />'.' / '. $courseW .'<br />'. $codeW .'<br />'. $roomW .'<br />'. $timeW .'</td>';
											}
										}
										if($cTH == 0 or ($cTH > 0 and $courseTH2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseTH . '<br />'. $codeTH .'<br />'. $roomTH .'<br />'. $timeTH .'</td>';
										}
										elseif($cTH > 0)
										{	
											if($startTH<$startTH2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseTH . '<br />'. $codeTH .'<br />'. $roomTH .'<br />'. $timeTH .'<br />'.' / '. $courseTH2 .'<br />'. $codeTH2 .'<br />'. $roomTH2 .'<br />'. $timeTH2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseTH2 . '<br />'. $codeTH2 .'<br />'. $roomTH2 .'<br />'. $timeTH2 .'<br />'.' / '. $courseTH .'<br />'. $codeTH .'<br />'. $roomTH .'<br />'. $timeTH .'</td>';
											}
										}
										if($cF == 0 or ($cF > 0 and $courseF2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseF . '<br />'. $codeF .'<br />'. $roomF .'<br />'. $timeF .'</td>';
										}
										elseif($cF > 0)
										{
											if($startF<$startF2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseF . '<br />'. $codeF .'<br />'. $roomF .'<br />'. $timeF .'<br />'.' / '. $courseF2 .'<br />'. $codeF2 .'<br />'. $roomF2 .'<br />'. $timeF2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseF2 . '<br />'. $codeF2 .'<br />'. $roomF2 .'<br />'. $timeF2 .'<br />'.' / '. $courseF .'<br />'. $codeF .'<br />'. $roomF .'<br />'. $timeF .'</td>';
											}
										}
										if($cS == 0 or ($cS > 0 and $courseS2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseS . '<br />'. $codeS .'<br />'. $roomS .'<br />'. $timeS .'</td>';
										}
										elseif($cS > 0)
										{
											if($startS<$startS2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseS . '<br />'. $codeS .'<br />'. $roomS .'<br />'. $timeS .'<br />'.' / '. $courseS2 .'<br />'. $codeS2 .'<br />'. $roomS2 .'<br />'. $timeS2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseS2 . '<br />'. $codeS2 .'<br />'. $roomS2 .'<br />'. $timeS2 .'<br />'.' / '. $courseS .'<br />'. $codeS .'<br />'. $roomS .'<br />'. $timeS .'</td>';
											}
										}
									echo'
									</tr>';	
	
									//////////////////////////////////////////////////////////////////1:30 - 4:30 Timeframe///////////////////////////////////////////////////////////////////
									
									/**
									*eto ung mga variable para sa display, 2 yan kasi up to 2 lng ung maximum na display ng schedule kada box.
									*/
									$codeM = $codeT = $codeW = $codeTH = $codeF = $codeS = "";
									$secM = $secT = $secW = $secTH = $secF = $secS = "";
									$yrlvlM = $yrlvlT = $yrlvlW = $yrlvlTH = $yrlvlF = $yrlvlS = "";
									$courseM = $courseT = $courseW = $courseTH = $courseF = $courseS = "";
									$timeM = $timeT = $timeW = $timeTH = $timeF = $timeS = "";
									$roomM = $roomT = $roomW = $roomTH = $roomF = $roomS = "";
									$startM = $startT = $startW = $startTH = $startF = $startS = 0;
									
									$codeM2 = $codeT2 = $codeW2 = $codeTH2 = $codeF2 = $codeS2 = "";
									$secM2 = $secT2 = $secW2 = $secTH2 = $secF2 = $secS2 = "";
									$yrlvlM2 = $yrlvlT2 = $yrlvlW2 = $yrlvlTH2 = $yrlvlF2 = $yrlvlS2 = ""; 
									$courseM2 = $courseT2 = $courseW2 = $courseTH2 = $courseF2 = $courseS2 = "";
									$timeM2 = $timeT2 = $timeW2 = $timeTH2 = $timeF2 = $timeS2 = "";
									$roomM2 = $roomT2 = $roomW2 = $roomTH2 = $roomF2 = $roomS2 = "";
									$startM2 = $startT2 = $startW2 = $startTH2 = $startF2 = $startS2 = 0;
									
									/**
									*eto ung count kung may laman na ung isang box, kung meron na laman sa pangalawang variable ng time nya na ilalagay ung display ng time ska room.
									*/
									$cM = $cT = $cW = $cTH = $cF = $cS = 0;
									
									$sql1 = "SELECT * FROM tbl_internaschedule WHERE (sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS >=1330 and stimeS <1630) or (sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS < 1330 and stimeE > 1330)";
									$query1 = mysqli_query($conn,$sql1);
									while($row1 = mysqli_fetch_array($query1))
									{
										$currID = $row1['currID'];
										$cID = $row1['courseID'];
										if(($row1['sday']=='M' and $row1['stimeS'] >= 1330 and $row1['stimeS'] <1630) or ($row1['sday']=='M' and $row1['stimeS'] < 1330 and $row1['stimeE'] > 1330))
										{
											if($cM == 0)
											{
												$startM = $row1['stimeS'];
												$codeM = $row1['scode'];									
												$secM = $row1['csection'];
												$yrlvlM = $row1['cyear'];
												$courseM = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
												{
													$timeM = getTime($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												}
												else
												{
													$timeM = "";
												}
												$roomM = getRoom($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												$cM = $cM + 1;
											}else if($cM > 0)
											{
												$startM2 = $row1['stimeS'];
												$codeM2 = $row1['scode'];									
												$secM2 = $row1['csection'];
												$yrlvlM2 = $row1['cyear'];
												$courseM2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
												{
													$timeM2 = getTime($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
												}
												else
												{
													$timeM2 = "";
												}
												$roomM2 = getRoom($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
											}			
										}
										else if(($row1['sday']=='T' and $row1['stimeS']>= 1330 and $row1['stimeS'] <1630) or ($row1['sday']=='T' and $row1['stimeS'] < 1330 and $row1['stimeE'] > 1330))
										{
											if($cT == 0)
											{
												$startT = $row1['stimeS'];
												$codeT = $row1['scode'];									
												$secT = $row1['csection'];
												$yrlvlT = $row1['cyear'];
												$courseT = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
												{
													$timeT = getTime($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												}
												else
												{
													$timeT = "";
												}	
												$roomT = getRoom($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												$cT = $cT + 1;
											}elseif ($cT > 0)
											{
												$startT2 = $row1['stimeS'];
												$codeT2 = $row1['scode'];									
												$secT2 = $row1['csection'];
												$yrlvlT2 = $row1['cyear'];
												$courseT2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
												{
													$timeT2 = getTime($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
												}
												else
												{
													$timeT2 = "";
												}	
												$roomT2 = getRoom($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
											}
										}
										else if(($row1['sday'] == 'W' and $row1['stimeS']>= 1330 and $row1['stimeS'] <1630) or ($row1['sday'] == 'W' and $row1['stimeS'] < 1330 and $row1['stimeE'] > 1330))
										{
											if($cW == 0)
											{	
												$startW = $row1['stimeS'];
												$codeW = $row1['scode'];									
												$secW = $row1['csection'];
												$yrlvlW = $row1['cyear'];
												$courseW = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
												{
													$timeW = getTime($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												}
												else
												{
													$timeW = "";
												}		
												$roomW = getRoom($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												$cW = $cW + 1;
											}elseif ($cW > 0)
											{
												$startW2 = $row1['stimeS'];
												$codeW2 = $row1['scode'];									
												$secW2 = $row1['csection'];
												$yrlvlW2 = $row1['cyear'];
												$courseW2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
												{
													$timeW2 = getTime($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
												}
												else
												{
													$timeW2 = "";
												}		
												$roomW2 = getRoom($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
											}
										}
										else if(($row1['sday'] == 'TH' and $row1['stimeS']>= 1330 and $row1['stimeS'] <1630) or ($row1['sday'] == 'TH' and $row1['stimeS'] < 1330 and $row1['stimeE'] > 1330))
										{
											if($cTH == 0)
											{	
												$startTH = $row1['stimeS'];
												$codeTH = $row1['scode'];									
												$secTH = $row1['csection'];
												$yrlvlTH = $row1['cyear'];
												$courseTH = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
												{
													$timeTH = getTime($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												}
												else
												{
													$timeTH = "";
												}	
												$roomTH = getRoom($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												$cTH = $cTH + 1;
											}elseif($cTH > 0)
											{
												$startTH2 = $row1['stimeS'];
												$codeTH2 = $row1['scode'];									
												$secTH2 = $row1['csection'];
												$yrlvlTH2 = $row1['cyear'];
												$courseTH2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
												{
													$timeTH2 = getTime($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
												}
												else
												{
													$timeTH2 = "";
												}	
												$roomTH2 = getRoom($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
											}
										}
										else if(($row1['sday'] == 'F' and $row1['stimeS']>= 1330 and $row1['stimeS'] <1630) or ($row1['sday'] == 'F' and $row1['stimeS'] < 1330 and $row1['stimeE'] > 1330))
										{
											if($cF == 0)
											{
												$startF = $row1['stimeS'];
												$codeF = $row1['scode'];									
												$secF = $row1['csection'];
												$yrlvlF = $row1['cyear'];
												$courseF = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
												{
													$timeF = getTime($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												}
												else
												{
													$timeF = "";
												}	
												$roomF = getRoom($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												$cF = $cF + 1;
											}elseif($cF > 0)
											{
												$startF2 = $row1['stimeS'];
												$codeF2 = $row1['scode'];									
												$secF2 = $row1['csection'];
												$yrlvlF2 = $row1['cyear'];
												$courseF2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
												{
													$timeF2 = getTime($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
												}
												else
												{
													$timeF2 = "";
												}	
												$roomF2 = getRoom($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
											}	
										}
										else if(($row1['sday'] == 'S' and $row1['stimeS']>= 1330 and $row1['stimeS'] <1630) or ($row1['sday'] == 'S' and $row1['stimeS'] < 1330 and $row1['stimeE'] > 1330))
										{
											if($cS == 0)
											{
												$startS = $row1['stimeS'];
												$codeS = $row1['scode'];									
												$secS = $row1['csection'];
												$yrlvlS = $row1['cyear'];
												$courseS = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
												{
													$timeS = getTime($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												}
												else
												{
													$timeS = "";
												}
												$roomS = getRoom($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												$cS = $cS + 1;
											}elseif ($cS > 0)
											{
												$startS2 = $row1['stimeS'];
												$codeS2 = $row1['scode'];									
												$secS2 = $row1['csection'];
												$yrlvlS2 = $row1['cyear'];
												$courseS2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1330 or $row1['stimeE'] <> 1630)
												{
													$timeS2 = getTime($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
												}
												else
												{
													$timeS2 = "";
												}
												$roomS2 = getRoom($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
											}	
										}
									}	
									
									$sql1 = "SELECT * FROM tbl_internaschedule WHERE (sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS2 >=1330 and stimeS2 <1630) or (sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS2 < 1330 and stimeE2 > 1330)";
									$query1 = mysqli_query($conn,$sql1);
									while($row1 = mysqli_fetch_array($query1))
									{
										$currID = $row1['currID'];
										$cID = $row1['courseID'];
									
										if(($row1['sday2']=='M' and $row1['stimeS2'] >= 1330 and $row1['stimeS2'] <1630) or ($row1['sday2']=='M' and $row1['stimeS2'] < 1330 and $row1['stimeE2'] > 1330))
										{
											if($cM == 0)
											{
												$startM = $row1['stimeS2'];
												$codeM = $row1['scode'];									
												$secM = $row1['csection'];
												$yrlvlM = $row1['cyear'];
												$courseM = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
												{
													$timeM = getTime2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												}
												else
												{
													$timeM = "";
												}
												$roomM = getRoom2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												$cM = $cM + 1;
											}else if($cM > 0)
											{	
												$startM2 = $row1['stimeS2'];
												$codeM2 = $row1['scode'];									
												$secM2 = $row1['csection'];
												$yrlvlM2 = $row1['cyear'];
												$courseM2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
												{
													$timeM2 = getTime2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
												}
												else
												{
													$timeM2 = "";
												}
												$roomM2 = getRoom2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
											}	
										}
										else if(($row1['sday2']=='T' and $row1['stimeS2']>= 1330 and $row1['stimeS2'] <1630) or ($row1['sday2']=='T' and $row1['stimeS2'] < 1330 and $row1['stimeE2'] > 1330))
										{
											if($cT == 0)
											{
												$startT = $row1['stimeS2'];
												$codeT = $row1['scode'];									
												$secT = $row1['csection'];
												$yrlvlT = $row1['cyear'];
												$courseT = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
												{
													$timeT = getTime2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												}
												else
												{
													$timeT = "";
												}	
												$roomT = getRoom2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												$cT = $cT + 1;
											}elseif ($cT > 0)
											{
												$startT2 = $row1['stimeS2'];
												$codeT2 = $row1['scode'];									
												$secT2 = $row1['csection'];
												$yrlvlT2 = $row1['cyear'];
												$courseT2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
												{
													$timeT2 = getTime2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
												}
												else
												{
													$timeT2 = "";
												}	
												$roomT2 = getRoom2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
											}
										}
										else if(($row1['sday2'] == 'W' and $row1['stimeS2']>= 1330 and $row1['stimeS2'] <1630) or ($row1['sday2'] == 'W' and $row1['stimeS2'] < 1330 and $row1['stimeE2'] > 1330))
										{
											if($cW == 0)
											{
												$startW = $row1['stimeS2'];
												$codeW = $row1['scode'];									
												$secW = $row1['csection'];
												$yrlvlW = $row1['cyear'];
												$courseW = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
												{
													$timeW = getTime2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												}
												else
												{
													$timeW = "";
												}		
												$roomW = getRoom2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												$cW = $cW + 1;
											}elseif ($cW > 0)
											{
												$startW2 = $row1['stimeS2'];
												$codeW2 = $row1['scode'];									
												$secW2 = $row1['csection'];
												$yrlvlW2 = $row1['cyear'];
												$courseW2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
												{
													$timeW2 = getTime2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
												}
												else
												{
													$timeW2 = "";
												}		
												$roomW2 = getRoom2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
											}
										}
										else if(($row1['sday2'] == 'TH' and $row1['stimeS2']>= 1330 and $row1['stimeS2'] <1630) or ($row1['sday2'] == 'TH' and $row1['stimeS2'] < 1330 and $row1['stimeE2'] > 1330))
										{
											if($cTH == 0)
											{
												$startTH = $row1['stimeS2'];
												$codeTH = $row1['scode'];									
												$secTH = $row1['csection'];
												$yrlvlTH = $row1['cyear'];
												$courseTH = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
												{
													$timeTH = getTime2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												}
												else
												{
													$timeTH = "";
												}	
												$roomTH = getRoom2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												$cTH = $cTH + 1;
											}elseif($cTH > 0)
											{
												$startTH2 = $row1['stimeS2'];
												$codeTH2 = $row1['scode'];									
												$secTH2 = $row1['csection'];
												$yrlvlTH2 = $row1['cyear'];
												$courseTH2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
												{
													$timeTH2 = getTime2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
												}
												else
												{
													$timeTH2 = "";
												}	
												$roomTH2 = getRoom2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
											}
										}
										else if(($row1['sday2'] == 'F' and $row1['stimeS2']>= 1330 and $row1['stimeS2'] <1630) or ($row1['sday2'] == 'F' and $row1['stimeS2'] < 1330 and $row1['stimeE2'] > 1330))
										{
											if($cF == 0)
											{
												$startF = $row1['stimeS2'];
												$codeF = $row1['scode'];									
												$secF = $row1['csection'];
												$yrlvlF = $row1['cyear'];
												$courseF = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
												{
													$timeF = getTime2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												}
												else
												{
													$timeF = "";
												}	
												$roomF = getRoom2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												$cF = $cF + 1;
											}elseif($cF > 0)
											{
												$startF2 = $row1['stimeS2'];
												$codeF2 = $row1['scode'];									
												$secF2 = $row1['csection'];
												$yrlvlF2 = $row1['cyear'];
												$courseF2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
												{
													$timeF2 = getTime2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
												}
												else
												{
													$timeF2 = "";
												}	
												$roomF2 = getRoom2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
											}	
										}
										else if(($row1['sday2'] == 'S' and $row1['stimeS2']>= 1330 and $row1['stimeS2'] <1630) or ($row1['sday2'] == 'S' and $row1['stimeS2'] < 1330 and $row1['stimeE2'] > 1330))
										{
											
											if($cS == 0)
											{
												$startS = $row1['stimeS2'];
												$codeS = $row1['scode'];									
												$secS = $row1['csection'];
												$yrlvlS = $row1['cyear'];
												$courseS = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
												{
													$timeS = getTime2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												}
												else
												{
													$timeS = "";
												}
												$roomS = getRoom2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												$cS = $cS + 1;
											}elseif ($cS > 0)
											{
												$startS2 = $row1['stimeS2'];
												$codeS2 = $row1['scode'];									
												$secS2 = $row1['csection'];
												$yrlvlS2 = $row1['cyear'];
												$courseS2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1330 or $row1['stimeE2'] <> 1630)
												{
													$timeS2 = getTime2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
												}
												else
												{
													$timeS2 = "";
												}
												$roomS2 = getRoom2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
											}	
										}
									}
									$timeframe = "1:30 - 4:30 PM";
									
									echo'
									<tr>
									<td style="text-align: center;" width = "10%">'. $timeframe .'</td>
									';
										if($cM == 0 or ($cM > 0 and $courseM2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseM . '<br />'. $codeM .'<br />'. $roomM .'<br />'. $timeM .'</td>';
										}elseif($cM > 0)
										{
											if($startM<$startM2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseM . '<br />'. $codeM .'<br />'. $roomM .'<br />'. $timeM .'<br />'.' / '. $courseM2 .'<br />'. $codeM2 .'<br />'. $roomM2 .'<br />'. $timeM2 .'</td>';
											}else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseM2 . '<br />'. $codeM2 .'<br />'. $roomM2 .'<br />'. $timeM2 .'<br />'.' / '. $courseM .'<br />'. $codeM .'<br />'. $roomM .'<br />'. $timeM .'</td>';
											}
										}
										if($cT == 0 or ($cT > 0 and $courseT2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseT . '<br />'. $codeT .'<br />'. $roomT .'<br />'. $timeT .'</td>';
										}
										elseif($cT > 0)
										{
											if($startT<$startT2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseT . '<br />'. $codeT .'<br />'. $roomT .'<br />'. $timeT .'<br />'.' / '. $courseT2 .'<br />'. $codeT2 .'<br />'. $roomT2 .'<br />'. $timeT2 .'</td>';
											}
											else
											{
												echo'
											<td style="text-align: center;" width = "15%">'. $courseT2 . '<br />'. $codeT2 .'<br />'. $roomT2 .'<br />'. $timeT2 .'<br />'.' / '. $courseT .'<br />'. $codeT .'<br />'. $roomT .'<br />'. $timeT .'</td>';
											}
										}
										if($cW == 0 or ($cW > 0 and $courseW2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseW . '<br />'. $codeW .'<br />'. $roomW .'<br />'. $timeW .'</td>';
										}
										elseif($cW > 0)
										{
											if($startW<$startW2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseW . '<br />'. $codeW .'<br />'. $roomW .'<br />'. $timeW .'<br />'.' / '. $courseW2 .'<br />'. $codeW2 .'<br />'. $roomW2 .'<br />'. $timeW2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseW2 . '<br />'. $codeW2 .'<br />'. $roomW2 .'<br />'. $timeW2 .'<br />'.' / '. $courseW .'<br />'. $codeW .'<br />'. $roomW .'<br />'. $timeW .'</td>';
											}
										}
										if($cTH == 0 or ($cTH > 0 and $courseTH2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseTH . '<br />'. $codeTH .'<br />'. $roomTH .'<br />'. $timeTH .'</td>';
										}
										elseif($cTH > 0)
										{	
											if($startTH<$startTH2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseTH . '<br />'. $codeTH .'<br />'. $roomTH .'<br />'. $timeTH .'<br />'.' / '. $courseTH2 .'<br />'. $codeTH2 .'<br />'. $roomTH2 .'<br />'. $timeTH2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseTH2 . '<br />'. $codeTH2 .'<br />'. $roomTH2 .'<br />'. $timeTH2 .'<br />'.' / '. $courseTH .'<br />'. $codeTH .'<br />'. $roomTH .'<br />'. $timeTH .'</td>';
											}
										}
										if($cF == 0 or ($cF > 0 and $courseF2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseF . '<br />'. $codeF .'<br />'. $roomF .'<br />'. $timeF .'</td>';
										}
										elseif($cF > 0)
										{
											if($startF<$startF2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseF . '<br />'. $codeF .'<br />'. $roomF .'<br />'. $timeF .'<br />'.' / '. $courseF2 .'<br />'. $codeF2 .'<br />'. $roomF2 .'<br />'. $timeF2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseF2 . '<br />'. $codeF2 .'<br />'. $roomF2 .'<br />'. $timeF2 .'<br />'.' / '. $courseF .'<br />'. $codeF .'<br />'. $roomF .'<br />'. $timeF .'</td>';
											}
										}
										if($cS == 0 or ($cS > 0 and $courseS2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseS . '<br />'. $codeS .'<br />'. $roomS .'<br />'. $timeS .'</td>';
										}
										elseif($cS > 0)
										{
											if($startS<$startS2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseS . '<br />'. $codeS .'<br />'. $roomS .'<br />'. $timeS .'<br />'.' / '. $courseS2 .'<br />'. $codeS2 .'<br />'. $roomS2 .'<br />'. $timeS2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseS2 . '<br />'. $codeS2 .'<br />'. $roomS2 .'<br />'. $timeS2 .'<br />'.' / '. $courseS .'<br />'. $codeS .'<br />'. $roomS .'<br />'. $timeS .'</td>';
											}
										}
									echo'
									</tr>';	
									
									//////////////////////////////////////////////////////////////////4:30 - 7:30 Timeframe///////////////////////////////////////////////////////////////////
									
									/**
									*eto ung mga variable para sa display, 2 yan kasi up to 2 lng ung maximum na display ng schedule kada box.
									*/
									$codeM = $codeT = $codeW = $codeTH = $codeF = $codeS = "";
									$secM = $secT = $secW = $secTH = $secF = $secS = "";
									$yrlvlM = $yrlvlT = $yrlvlW = $yrlvlTH = $yrlvlF = $yrlvlS = "";
									$courseM = $courseT = $courseW = $courseTH = $courseF = $courseS = "";
									$timeM = $timeT = $timeW = $timeTH = $timeF = $timeS = "";
									$roomM = $roomT = $roomW = $roomTH = $roomF = $roomS = "";
									
									$codeM2 = $codeT2 = $codeW2 = $codeTH2 = $codeF2 = $codeS2 = "";
									$secM2 = $secT2 = $secW2 = $secTH2 = $secF2 = $secS2 = "";
									$yrlvlM2 = $yrlvlT2 = $yrlvlW2 = $yrlvlTH2 = $yrlvlF2 = $yrlvlS2 = ""; 
									$courseM2 = $courseT2 = $courseW2 = $courseTH2 = $courseF2 = $courseS2 = "";
									$timeM2 = $timeT2 = $timeW2 = $timeTH2 = $timeF2 = $timeS2 = "";
									$roomM2 = $roomT2 = $roomW2 = $roomTH2 = $roomF2 = $roomS2 = "";
									
									/**
									*eto ung mga variable para sa display, 2 yan kasi up to 2 lng ung maximum na display ng schedule kada box.
									*/
									$codeM = $codeT = $codeW = $codeTH = $codeF = $codeS = "";
									$secM = $secT = $secW = $secTH = $secF = $secS = "";
									$yrlvlM = $yrlvlT = $yrlvlW = $yrlvlTH = $yrlvlF = $yrlvlS = "";
									$courseM = $courseT = $courseW = $courseTH = $courseF = $courseS = "";
									$timeM = $timeT = $timeW = $timeTH = $timeF = $timeS = "";
									$roomM = $roomT = $roomW = $roomTH = $roomF = $roomS = "";
									$startM = $startT = $startW = $startTH = $startF = $startS = 0;
									
									$codeM2 = $codeT2 = $codeW2 = $codeTH2 = $codeF2 = $codeS2 = "";
									$secM2 = $secT2 = $secW2 = $secTH2 = $secF2 = $secS2 = "";
									$yrlvlM2 = $yrlvlT2 = $yrlvlW2 = $yrlvlTH2 = $yrlvlF2 = $yrlvlS2 = ""; 
									$courseM2 = $courseT2 = $courseW2 = $courseTH2 = $courseF2 = $courseS2 = "";
									$timeM2 = $timeT2 = $timeW2 = $timeTH2 = $timeF2 = $timeS2 = "";
									$roomM2 = $roomT2 = $roomW2 = $roomTH2 = $roomF2 = $roomS2 = "";
									$startM2 = $startT2 = $startW2 = $startTH2 = $startF2 = $startS2 = 0;
									
									/**
									*eto ung count kung may laman na ung isang box, kung meron na laman sa pangalawang variable ng time nya na ilalagay ung display ng time ska room.
									*/
									$cM = $cT = $cW = $cTH = $cF = $cS = 0;
									
									$sql1 = "SELECT * FROM tbl_internaschedule WHERE (sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS >= 1630) or (sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS < 1630 and stimeE > 1630)";
									$query1 = mysqli_query($conn,$sql1);
									while($row1 = mysqli_fetch_array($query1))
									{
										$currID = $row1['currID'];
										$cID = $row1['courseID'];
										if(($row1['sday']=='M' and $row1['stimeS'] >= 1630) or ($row1['sday']=='M' and $row1['stimeS'] < 1630 and $row1['stimeE'] > 1630))
										{
											if($cM == 0)
											{
												$startM = $row1['stimeS'];
												$codeM = $row1['scode'];									
												$secM = $row1['csection'];
												$yrlvlM = $row1['cyear'];
												$courseM = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
												{
													$timeM = getTime($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												}
												else
												{
													$timeM = "";
												}
												$roomM = getRoom($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												$cM = $cM + 1;
											}else if($cM > 0)
											{
												$startM2 = $row1['stimeS'];
												$codeM2 = $row1['scode'];									
												$secM2 = $row1['csection'];
												$yrlvlM2 = $row1['cyear'];
												$courseM2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
												{
													$timeM2 = getTime($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
												}
												else
												{
													$timeM2 = "";
												}
												$roomM2 = getRoom($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
											}			
										}
										else if(($row1['sday']=='T' and $row1['stimeS']>= 1630) or ($row1['sday']=='T' and $row1['stimeS'] < 1630 and $row1['stimeE'] > 1630))
										{
											if($cT == 0)
											{
												$startT = $row1['stimeS'];
												$codeT = $row1['scode'];									
												$secT = $row1['csection'];
												$yrlvlT = $row1['cyear'];
												$courseT = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
												{
													$timeT = getTime($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												}
												else
												{
													$timeT = "";
												}	
												$roomT = getRoom($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												$cT = $cT + 1;
											}elseif ($cT > 0)
											{
												$startT2 = $row1['stimeS'];
												$codeT2 = $row1['scode'];									
												$secT2 = $row1['csection'];
												$yrlvlT2 = $row1['cyear'];
												$courseT2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
												{
													$timeT2 = getTime($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
												}
												else
												{
													$timeT2 = "";
												}	
												$roomT2 = getRoom($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
											}
										}
										else if(($row1['sday'] == 'W' and $row1['stimeS']>= 1630) or ($row1['sday'] == 'W' and $row1['stimeS'] < 1630 and $row1['stimeE'] > 1630))
										{
											if($cW == 0)
											{
												$startW = $row1['stimeS'];
												$codeW = $row1['scode'];									
												$secW = $row1['csection'];
												$yrlvlW = $row1['cyear'];
												$courseW = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
												{
													$timeW = getTime($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												}
												else
												{
													$timeW = "";
												}		
												$roomW = getRoom($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												$cW = $cW + 1;
											}elseif ($cW > 0)
											{
												$startW2 = $row1['stimeS'];
												$codeW2 = $row1['scode'];									
												$secW2 = $row1['csection'];
												$yrlvlW2 = $row1['cyear'];
												$courseW2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
												{
													$timeW2 = getTime($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
												}
												else
												{
													$timeW2 = "";
												}		
												$roomW2 = getRoom($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
											}
										}
										else if(($row1['sday'] == 'TH' and $row1['stimeS']>= 1630) or ($row1['sday'] == 'TH' and $row1['stimeS'] < 1630 and $row1['stimeE'] > 1630))
										{
											if($cTH == 0)
											{
												$startTH = $row1['stimeS'];
												$codeTH = $row1['scode'];									
												$secTH = $row1['csection'];
												$yrlvlTH = $row1['cyear'];
												$courseTH = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
												{
													$timeTH = getTime($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												}
												else
												{
													$timeTH = "";
												}	
												$roomTH = getRoom($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												$cTH = $cTH + 1;
											}elseif($cTH > 0)
											{
												$startTH2 = $row1['stimeS'];
												$codeTH2 = $row1['scode'];									
												$secTH2 = $row1['csection'];
												$yrlvlTH2 = $row1['cyear'];
												$courseTH2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
												{
													$timeTH2 = getTime($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
												}
												else
												{
													$timeTH2 = "";
												}	
												$roomTH2 = getRoom($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
											}
										}
										else if(($row1['sday'] == 'F' and $row1['stimeS']>= 1630) or ($row1['sday'] == 'F' and $row1['stimeS'] < 1630 and $row1['stimeE'] > 1630))
										{
											if($cF == 0)
											{
												$startF = $row1['stimeS'];
												$codeF = $row1['scode'];									
												$secF = $row1['csection'];
												$yrlvlF = $row1['cyear'];
												$courseF = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
												{
													$timeF = getTime($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												}
												else
												{
													$timeF = "";
												}	
												$roomF = getRoom($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												$cF = $cF + 1;
											}elseif($cF > 0)
											{
												$startF2 = $row1['stimeS'];
												$codeF2 = $row1['scode'];									
												$secF2 = $row1['csection'];
												$yrlvlF2 = $row1['cyear'];
												$courseF2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
												{
													$timeF2 = getTime($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
												}
												else
												{
													$timeF2 = "";
												}	
												$roomF2 = getRoom($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
											}	
										}
										else if(($row1['sday'] == 'S' and $row1['stimeS']>= 1630) or ($row1['sday'] == 'S' and $row1['stimeS'] < 1630 and $row1['stimeE'] > 1630))
										{
											if($cS == 0)
											{
												$startS = $row1['stimeS'];
												$codeS = $row1['scode'];									
												$secS = $row1['csection'];
												$yrlvlS = $row1['cyear'];
												$courseS = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
												{
													$timeS = getTime($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												}
												else
												{
													$timeS = "";
												}
												$roomS = getRoom($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												$cS = $cS + 1;
											}elseif ($cS > 0)
											{
												$startS2 = $row1['stimeS'];
												$codeS2 = $row1['scode'];									
												$secS2 = $row1['csection'];
												$yrlvlS2 = $row1['cyear'];
												$courseS2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS']<>1630 or $row1['stimeE'] <> 1930)
												{
													$timeS2 = getTime($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
												}
												else
												{
													$timeS2 = "";
												}
												$roomS2 = getRoom($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
											}	
										}
									}	
									
									$sql1 = "SELECT * FROM tbl_internaschedule WHERE (sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS2 >= 1630) or (sem = '$csem' and schoolYear = '$sy' and sprof = '$p' and stimeS2 < 1630 and stimeE2 > 1630)";
									$query1 = mysqli_query($conn,$sql1);
									while($row1 = mysqli_fetch_array($query1))
									{
										$currID = $row1['currID'];
										$cID = $row1['courseID'];
										
										if(($row1['sday2']=='M' and $row1['stimeS2'] >= 1630) or ($row1['sday2']=='M' and $row1['stimeS2'] < 1630 and $row1['stimeE2'] > 1630))
										{
											if($cM == 0)
											{
												$startM = $row1['stimeS2'];
												$codeM = $row1['scode'];									
												$secM = $row1['csection'];
												$yrlvlM = $row1['cyear'];
												$courseM = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
												{
													$timeM = getTime2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												}
												else
												{
													$timeM = "";
												}
												$roomM = getRoom2($codeM,$currID,$cID,$sy,$secM,$yrlvlM,$csem);
												$cM = $cM + 1;
											}else if($cM > 0)
											{	
												$startM2 = $row1['stimeS2'];
												$codeM2 = $row1['scode'];									
												$secM2 = $row1['csection'];
												$yrlvlM2 = $row1['cyear'];
												$courseM2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];
												if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
												{
													$timeM2 = getTime2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
												}
												else
												{
													$timeM2 = "";
												}
												$roomM2 = getRoom2($codeM2,$currID,$cID,$sy,$secM2,$yrlvlM2,$csem);
											}	
										}
										else if(($row1['sday2']=='T' and $row1['stimeS2']>= 1630) or ($row1['sday2']=='T' and $row1['stimeS2'] < 1630 and $row1['stimeE2'] > 1630))
										{
											if($cT == 0)
											{
												$startT = $row1['stimeS2'];
												$codeT = $row1['scode'];									
												$secT = $row1['csection'];
												$yrlvlT = $row1['cyear'];
												$courseT = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
												{
													$timeT = getTime2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												}
												else
												{
													$timeT = "";
												}	
												$roomT = getRoom2($codeT,$currID,$cID,$sy,$secT,$yrlvlT,$csem);
												$cT = $cT + 1;
											}elseif ($cT > 0)
											{
												$startT2 = $row1['stimeS2'];
												$codeT2 = $row1['scode'];									
												$secT2 = $row1['csection'];
												$yrlvlT2 = $row1['cyear'];
												$courseT2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
												{
													$timeT2 = getTime2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
												}
												else
												{
													$timeT2 = "";
												}	
												$roomT2 = getRoom2($codeT2,$currID,$cID,$sy,$secT2,$yrlvlT2,$csem);
											}
										}
										else if(($row1['sday2'] == 'W' and $row1['stimeS2']>= 1630) or ($row1['sday2'] == 'W' and $row1['stimeS2'] < 1630 and $row1['stimeE2'] > 1630))
										{
											if($cW == 0)
											{
												$startW = $row1['stimeS2'];
												$codeW = $row1['scode'];									
												$secW = $row1['csection'];
												$yrlvlW = $row1['cyear'];
												$courseW = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
												{
													$timeW = getTime2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												}
												else
												{
													$timeW = "";
												}		
												$roomW = getRoom2($codeW,$currID,$cID,$sy,$secW,$yrlvlW,$csem);
												$cW = $cW + 1;
											}elseif ($cW > 0)
											{
												$startW2 = $row1['stimeS2'];
												$codeW2 = $row1['scode'];									
												$secW2 = $row1['csection'];
												$yrlvlW2 = $row1['cyear'];
												$courseW2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
												{
													$timeW2 = getTime2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
												}
												else
												{
													$timeW2 = "";
												}		
												$roomW2 = getRoom2($codeW2,$currID,$cID,$sy,$secW2,$yrlvlW2,$csem);
											}
										}
										else if(($row1['sday2'] == 'TH' and $row1['stimeS2']>= 1630) or ($row1['sday2'] == 'TH' and $row1['stimeS2'] < 1630 and $row1['stimeE2'] > 1630))
										{
											if($cTH == 0)
											{	
												$startTH = $row1['stimeS2'];
												$codeTH = $row1['scode'];									
												$secTH = $row1['csection'];
												$yrlvlTH = $row1['cyear'];
												$courseTH = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
												{
													$timeTH = getTime2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												}
												else
												{
													$timeTH = "";
												}	
												$roomTH = getRoom2($codeTH,$currID,$cID,$sy,$secTH,$yrlvlTH,$csem);
												$cTH = $cTH + 1;
											}elseif($cTH > 0)
											{
												$startTH2 = $row1['stimeS2'];
												$codeTH2 = $row1['scode'];									
												$secTH2 = $row1['csection'];
												$yrlvlTH2 = $row1['cyear'];
												$courseTH2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
												{
													$timeTH2 = getTime2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
												}
												else
												{
													$timeTH2 = "";
												}	
												$roomTH2 = getRoom2($codeTH2,$currID,$cID,$sy,$secTH2,$yrlvlTH2,$csem);
											}
										}
										else if(($row1['sday2'] == 'F' and $row1['stimeS2']>= 1630) or ($row1['sday2'] == 'F' and $row1['stimeS2'] < 1630 and $row1['stimeE2'] > 1630))
										{
											if($cF == 0)
											{
												$startF = $row1['stimeS2'];
												$codeF = $row1['scode'];									
												$secF = $row1['csection'];
												$yrlvlF = $row1['cyear'];
												$courseF = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
												{
													$timeF = getTime2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												}
												else
												{
													$timeF = "";
												}	
												$roomF = getRoom2($codeF,$currID,$cID,$sy,$secF,$yrlvlF,$csem);
												$cF = $cF + 1;
											}elseif($cF > 0)
											{
												$startF2 = $row1['stimeS2'];
												$codeF2 = $row1['scode'];									
												$secF2 = $row1['csection'];
												$yrlvlF2 = $row1['cyear'];
												$courseF2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
												{
													$timeF2 = getTime2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
												}
												else
												{
													$timeF2 = "";
												}	
												$roomF2 = getRoom2($codeF2,$currID,$cID,$sy,$secF2,$yrlvlF2,$csem);
											}	
										}
										else if(($row1['sday2'] == 'S' and $row1['stimeS2']>= 1630) or ($row1['sday2'] == 'S' and $row1['stimeS2'] < 1630 and $row1['stimeE2'] > 1630))
										{
											
											if($cS == 0)
											{
												$startS = $row1['stimeS2'];
												$codeS = $row1['scode'];									
												$secS = $row1['csection'];
												$yrlvlS = $row1['cyear'];
												$courseS = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
												{
													$timeS = getTime2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												}
												else
												{
													$timeS = "";
												}
												$roomS = getRoom2($codeS,$currID,$cID,$sy,$secS,$yrlvlS,$csem);
												$cS = $cS + 1;
											}elseif ($cS > 0)
											{
												$startS2 = $row1['stimeS2'];
												$codeS2 = $row1['scode'];									
												$secS2 = $row1['csection'];
												$yrlvlS2 = $row1['cyear'];
												$courseS2 = getCourse($row1['courseID'])." ".$row1['cyear']."-".$row1['csection'];										
												if($row1['stimeS2']<>1630 or $row1['stimeE2'] <> 1930)
												{
													$timeS2 = getTime2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
												}
												else
												{
													$timeS2 = "";
												}
												$roomS2 = getRoom2($codeS2,$currID,$cID,$sy,$secS2,$yrlvlS2,$csem);
											}	
										}
									}					
									$timeframe = "4:30 - 7:30 PM";
									
									echo'
									<tr>
									<td style="text-align: center;" width = "10%">'. $timeframe .'</td>
									';
										if($cM == 0 or ($cM > 0 and $courseM2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseM . '<br />'. $codeM .'<br />'. $roomM .'<br />'. $timeM .'</td>';
										}elseif($cM > 0)
										{
											if($startM<$startM2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseM . '<br />'. $codeM .'<br />'. $roomM .'<br />'. $timeM .'<br />'.' / '. $courseM2 .'<br />'. $codeM2 .'<br />'. $roomM2 .'<br />'. $timeM2 .'</td>';
											}else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseM2 . '<br />'. $codeM2 .'<br />'. $roomM2 .'<br />'. $timeM2 .'<br />'.' / '. $courseM .'<br />'. $codeM .'<br />'. $roomM .'<br />'. $timeM .'</td>';
											}
										}
										if($cT == 0 or ($cT > 0 and $courseT2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseT . '<br />'. $codeT .'<br />'. $roomT .'<br />'. $timeT .'</td>';
										}
										elseif($cT > 0)
										{
											if($startT<$startT2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseT . '<br />'. $codeT .'<br />'. $roomT .'<br />'. $timeT .'<br />'.' / '. $courseT2 .'<br />'. $codeT2 .'<br />'. $roomT2 .'<br />'. $timeT2 .'</td>';
											}
											else
											{
												echo'
											<td style="text-align: center;" width = "15%">'. $courseT2 . '<br />'. $codeT2 .'<br />'. $roomT2 .'<br />'. $timeT2 .'<br />'.' / '. $courseT .'<br />'. $codeT .'<br />'. $roomT .'<br />'. $timeT .'</td>';
											}
										}
										if($cW == 0 or ($cW > 0 and $courseW2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseW . '<br />'. $codeW .'<br />'. $roomW .'<br />'. $timeW .'</td>';
										}
										elseif($cW > 0)
										{
											if($startW<$startW2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseW . '<br />'. $codeW .'<br />'. $roomW .'<br />'. $timeW .'<br />'.' / '. $courseW2 .'<br />'. $codeW2 .'<br />'. $roomW2 .'<br />'. $timeW2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseW2 . '<br />'. $codeW2 .'<br />'. $roomW2 .'<br />'. $timeW2 .'<br />'.' / '. $courseW .'<br />'. $codeW .'<br />'. $roomW .'<br />'. $timeW .'</td>';
											}
										}
										if($cTH == 0 or ($cTH > 0 and $courseTH2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseTH . '<br />'. $codeTH .'<br />'. $roomTH .'<br />'. $timeTH .'</td>';
										}
										elseif($cTH > 0)
										{	
											if($startTH<$startTH2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseTH . '<br />'. $codeTH .'<br />'. $roomTH .'<br />'. $timeTH .'<br />'.' / '. $courseTH2 .'<br />'. $codeTH2 .'<br />'. $roomTH2 .'<br />'. $timeTH2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseTH2 . '<br />'. $codeTH2 .'<br />'. $roomTH2 .'<br />'. $timeTH2 .'<br />'.' / '. $courseTH .'<br />'. $codeTH .'<br />'. $roomTH .'<br />'. $timeTH .'</td>';
											}
										}
										if($cF == 0 or ($cF > 0 and $courseF2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseF . '<br />'. $codeF .'<br />'. $roomF .'<br />'. $timeF .'</td>';
										}
										elseif($cF > 0)
										{
											if($startF<$startF2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseF . '<br />'. $codeF .'<br />'. $roomF .'<br />'. $timeF .'<br />'.' / '. $courseF2 .'<br />'. $codeF2 .'<br />'. $roomF2 .'<br />'. $timeF2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseF2 . '<br />'. $codeF2 .'<br />'. $roomF2 .'<br />'. $timeF2 .'<br />'.' / '. $courseF .'<br />'. $codeF .'<br />'. $roomF .'<br />'. $timeF .'</td>';
											}
										}
										if($cS == 0 or ($cS > 0 and $courseS2 == ""))
										{
											echo'
											<td style="text-align: center;" width = "15%">'. $courseS . '<br />'. $codeS .'<br />'. $roomS .'<br />'. $timeS .'</td>';
										}
										elseif($cS > 0)
										{
											if($startS<$startS2)
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseS . '<br />'. $codeS .'<br />'. $roomS .'<br />'. $timeS .'<br />'.' / '. $courseS2 .'<br />'. $codeS2 .'<br />'. $roomS2 .'<br />'. $timeS2 .'</td>';
											}
											else
											{
												echo'
												<td style="text-align: center;" width = "15%">'. $courseS2 . '<br />'. $codeS2 .'<br />'. $roomS2 .'<br />'. $timeS2 .'<br />'.' / '. $courseS .'<br />'. $codeS .'<br />'. $roomS .'<br />'. $timeS .'</td>';
											}
										}
									echo'
									</tr>';
								echo'
								</tbody>
								</table>';
								}
							}
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
						
						function getDay($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_internaschedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$day = $row['sday'];
							return $day;
						}
						
						function getRoom($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_internaschedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$room = $row['sroom'];
							return $room;
						}
						
						function getRoom2($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_internaschedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$room = $row['sroom2'];
							return $room;
						}
						
						function getProf($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_internaschedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							$prof = getName($row['sprof']);
							return $prof;
						}
						
						function getTime($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_internaschedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							if($row['stimeS']<>0){
								$time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']);
							}else{
								$time = "";
							}
							return $time;
						}
						
						function getTime2($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_internaschedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_array($result);
							if($row['stimeS2']<>0){
								$time = to12Hr($row['stimeS2']) . '-' . to12Hr($row['stimeE2']);
							}else{
								$time = "";
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

