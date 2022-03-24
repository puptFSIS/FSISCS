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
<title>Scheduling | PreScheduling </title>
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
<?php include("nav.php");?>
<!-- End - Page title -->
<!-- Page body content -->
<section id=page-body-content>
<div id=page-body-content-inner>
<!-- Page content -->

<div id=page-content>
<!-- Video - HTML5 -->
<section>

<h2 class="underlined-header">Room Control </h2>
<br />

	<form name="frmSched" method = "post" action = "index.php?r=administrator/RoomControl">
		
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
						$result1 = mysqli_query($conn, $sql1);
						while($row1 = mysqli_fetch_array($result1)){
							echo'<option value="'.$sh.'">'.$row1['schoolYear'].'</option>';
						}
				}
				else if(isset($_POST['sy']))
				{
					$sh = $_POST['sy'];
					$sql1= "SELECT DISTINCT schoolYear FROM tbl_subjectload WHERE schoolYear= '$sh'";
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
        <br/>
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
<table class=round-11 style="width:100%; ">
<tbody>
				
					<?php
						
						$csem = 0;
						$sy = "";
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
						if(isset($_POST['day'])){
							$day = $_POST['day'];
						}
						if(isset($_GET['day'])){
							$day = $_GET['day'];
						}
						
						if(isset($_POST['sem']) and isset($_POST['sy']) and isset($_POST['day']))
						{
							$A202 = ""; $A2021 = ""; $A2022 = ""; $A2023 = ""; $t1 = ""; $t31 = ""; 
							$A203 = ""; $A2031 = ""; $A2032 = ""; $A2033 = ""; $t2 = ""; $t32 = "";
							$A204 = ""; $A2041 = ""; $A2042 = ""; $A2043 = ""; $t3 = ""; $t33 = "";
							$A205 = ""; $A2051 = ""; $A2052 = ""; $A2053 = ""; $t4 = ""; $t34 = "";
							$DOST = ""; $DOST1 = ""; $DOST2 = ""; $DOST3 = ""; $t5 = ""; $t35 = "";
							$A301 = ""; $A3011 = ""; $A3012 = ""; $A3013 = ""; $t6 = ""; $t36 = "";
							$A302 = ""; $A3021 = ""; $A3022 = ""; $A3023 = ""; $t7 = ""; $t37 = "";
							$A303 = ""; $A3031 = ""; $A3032 = ""; $A3033 = ""; $t8 = ""; $t38 = "";
							$A304 = ""; $A3041 = ""; $A3042 = ""; $A3043 = ""; $t9 = ""; $t39 = "";
							$A305 = ""; $A3051 = ""; $A3052 = ""; $A3053 = ""; $t10 = ""; $t40 = "";
							$A202c = ""; $A202c1 = ""; $A202c2 = ""; $A202c3 = ""; $t11 = "";
							$A203c = ""; $A203c1 = ""; $A203c2 = ""; $A203c3 = ""; $t12 = ""; 
							$A204c = ""; $A204c1 = ""; $A204c2 = ""; $A204c3 = ""; $t13 = "";
							$A205c = ""; $A205c1 = ""; $A205c2 = ""; $A205c3 = ""; $t14 = "";
							$DOSTc = ""; $DOSTc1 = ""; $DOSTc2 = ""; $DOSTc3 = ""; $t15 = "";
							$A301c = ""; $A301c1 = ""; $A301c2 = ""; $A301c3 = ""; $t16 = "";
							$A302c = ""; $A302c1 = ""; $A302c2 = ""; $A302c3 = ""; $t17 = "";
							$A303c = ""; $A303c1 = ""; $A303c2 = ""; $A303c3 = ""; $t18 = "";
							$A304c = ""; $A304c1 = ""; $A304c2 = ""; $A304c3 = ""; $t19 = "";
							$A305c = ""; $A305c1 = ""; $A305c2 = ""; $A305c3 = ""; $t20 = "";
							$A202p = ""; $A202p1 = ""; $A202p2 = ""; $A202p3 = ""; $t21 = "";
							$A203p = ""; $A203p1 = ""; $A203p2 = ""; $A203p3 = ""; $t22 = "";
							$A204p = ""; $A204p1 = ""; $A204p2 = ""; $A204p3 = ""; $t23 = "";
							$A205p = ""; $A205p1 = ""; $A205p2 = ""; $A205p3 = ""; $t24 = "";
							$DOSTp = ""; $DOSTp1 = ""; $DOSTp2 = ""; $DOSTp3 = ""; $t25 = "";
							$A301p = ""; $A301p1 = ""; $A301p2 = ""; $A301p3 = ""; $t26 = "";
							$A302p = ""; $A302p1 = ""; $A302p2 = ""; $A302p3 = ""; $t27 = "";
							$A303p = ""; $A303p1 = ""; $A303p2 = ""; $A303p3 = ""; $t28 = "";
							$A304p = ""; $A304p1 = ""; $A304p2 = ""; $A304p3 = ""; $t29 = "";
							$A305p = ""; $A305p1 = ""; $A305p2 = ""; $A305p3 = ""; $t30 = "";
							
							$A307 = ""; $A3071 = ""; $A3072 = ""; $A3073 = ""; $t41 = ""; $t51 = "";
							$A308 = ""; $A3081 = ""; $A3082 = ""; $A3083 = ""; $t42 = ""; $t52 = "";
							$A309 = ""; $A3091 = ""; $A3092 = ""; $A3093 = ""; $t43 = ""; $t53 = "";
							$A310 = ""; $A3101 = ""; $A3102 = ""; $A3103 = ""; $t44 = ""; $t54 = "";
							$A401 = ""; $A4011 = ""; $A4012 = ""; $A4013 = ""; $t45 = ""; $t55 = "";
							$A402 = ""; $A4021 = ""; $A4022 = ""; $A4023 = ""; $t46 = ""; $t56 = "";
							$A403 = ""; $A4031 = ""; $A4032 = ""; $A4033 = ""; $t47 = ""; $t57 = "";
							$A404 = ""; $A4041 = ""; $A4042 = ""; $A4043 = ""; $t48 = ""; $t58 = "";
							$A405 = ""; $A4051 = ""; $A4052 = ""; $A4053 = ""; $t49 = ""; $t59 = "";
							$C101 = ""; $C1011 = ""; $C1012 = ""; $C1013 = ""; $t50 = ""; $t60 = "";
							$A307c = ""; $A307c1 = ""; $A307c2 = ""; $A307c3 = ""; $t61 = "";
							$A308c = ""; $A308c1 = ""; $A308c2 = ""; $A308c3 = ""; $t62 = "";
							$A309c = ""; $A309c1 = ""; $A309c2 = ""; $A309c3 = ""; $t63 = "";
							$A310c = ""; $A310c1 = ""; $A310c2 = ""; $A310c3 = ""; $t64 = "";
							$A401c = ""; $A401c1 = ""; $A401c2 = ""; $A401c3 = ""; $t65 = "";
							$A402c = ""; $A402c1 = ""; $A402c2 = ""; $A402c3 = ""; $t66 = "";
							$A403c = ""; $A403c1 = ""; $A403c2 = ""; $A403c3 = ""; $t67 = "";
							$A404c = ""; $A404c1 = ""; $A404c2 = ""; $A404c3 = ""; $t68 = "";
							$A405c = ""; $A405c1 = ""; $A405c2 = ""; $A405c3 = ""; $t69 = "";
							$C101c = ""; $C101c1 = ""; $C101c2 = ""; $C101c3 = ""; $t70 = "";
							$A307p = ""; $A307p1 = ""; $A307p2 = ""; $A307p3 = ""; $t71 = "";
							$A308p = ""; $A308p1 = ""; $A308p2 = ""; $A308p3 = ""; $t72 = "";
							$A309p = ""; $A309p1 = ""; $A309p2 = ""; $A309p3 = ""; $t73 = "";
							$A310p = ""; $A310p1 = ""; $A310p2 = ""; $A310p3 = ""; $t74 = "";
							$A401p = ""; $A401p1 = ""; $A401p2 = ""; $A401p3 = ""; $t75 = "";
							$A402p = ""; $A402p1 = ""; $A402p2 = ""; $A402p3 = ""; $t76 = "";
							$A403p = ""; $A403p1 = ""; $A403p2 = ""; $A403p3 = ""; $t77 = "";
							$A404p = ""; $A404p1 = ""; $A404p2 = ""; $A404p3 = ""; $t78 = "";
							$A405p = ""; $A405p1 = ""; $A405p2 = ""; $A405p3 = ""; $t79 = "";
							$C101p = ""; $C101p1 = ""; $C101p2 = ""; $C101p3 = ""; $t80 = "";
							
							$B101 = ""; $B1011 = ""; $B1012 = ""; $B1013 = ""; $t81 = ""; $t91 = "";
							$B102 = ""; $B1021 = ""; $B1022 = ""; $B1023 = ""; $t82 = ""; $t92 = "";
							$B103 = ""; $B1031 = ""; $B1032 = ""; $B1033 = ""; $t83 = ""; $t93 = "";
							$B104 = ""; $B1041 = ""; $B1042 = ""; $B1043 = ""; $t84 = ""; $t94 = "";
							$CL = ""; $CL1 = ""; $CL2 = ""; $CL3 = ""; 		   $t85 = ""; $t95 = "";
							$AL = ""; $AL1 = ""; $AL2 = ""; $AL3 = ""; 		   $t86 = ""; $t96 = "";
							$B205 = ""; $B2051 = ""; $B2052 = ""; $B2053 = ""; $t87 = ""; $t97 = "";
							$B206 = ""; $B2061 = ""; $B2062 = ""; $B2063 = ""; $t88 = ""; $t98 = "";
							$DR = ""; $DR1 = ""; $DR2 = ""; $DR3 = ""; 		   $t89 = ""; $t99 = "";
							$C102 = ""; $C1021 = ""; $C1022 = ""; $C1023 = ""; $t90 = ""; $t100 = "";
							$B101c = ""; $B101c1 = ""; $B101c2 = ""; $B101c3 = ""; $t110 = "";
							$B102c = ""; $B102c1 = ""; $B102c2 = ""; $B102c3 = ""; $t101 = "";
							$B103c = ""; $B103c1 = ""; $B103c2 = ""; $B103c3 = ""; $t102 = "";
							$B104c = ""; $B104c1 = ""; $B104c2 = ""; $B104c3 = ""; $t103 = "";
							$CLc = ""; $CLc1 = ""; $CLc2 = ""; $CLc3 = ""; 		   $t104 = ""; 
							$ALc = ""; $ALc1 = ""; $ALc2= ""; $ALc3 = "";		   $t105 = "";	
							$B205c = ""; $B205c1 = ""; $B205c2 = ""; $B205c3 = ""; $t106 = "";
							$B206c = ""; $B206c1 = ""; $B206c2 = ""; $B206c3 = ""; $t107 = "";
							$DRc = ""; $DRc1 = ""; $DRc2 = ""; $DRc3 = "";		   $t108 = "";
							$C102c = ""; $C102c1 = ""; $C102c2 = ""; $C102c3 = ""; $t109 = "";
							$B101p = ""; $B101p1 = ""; $B101p2 = ""; $B101p3 = ""; $t111 = "";
							$B102p = ""; $B102p1 = ""; $B102p2 = ""; $B102p3 = ""; $t112 = "";
							$B103p = ""; $B103p1 = ""; $B103p2 = ""; $B103p3 = ""; $t113 = "";
							$B104p = ""; $B104p1 = ""; $B104p2 = ""; $B104p3 = ""; $t114 = "";
							$CLp = ""; $CLp1 = ""; $CLp2 = ""; $CLp3 = "";		   $t115 = "";
							$ALp = ""; $ALp1 = ""; $ALp2 = ""; $ALp3 = "";		   $t116 = "";
							$B205p = ""; $B205p1 = ""; $B205p2 = ""; $B205p3 = ""; $t117 = "";
							$B206p = ""; $B206p1 = ""; $B206p2 = ""; $B206p3 = ""; $t118 = "";
							$DRp = ""; $DRp1 = ""; $DRp2 = ""; $DRp3 = "";		   $t119 = "";
							$C102p = ""; $C102p1 = ""; $C102p2 = ""; $C102p3 = ""; $t120 = "";
							
							$Mul = ""; $Mul1 = ""; $Mul2 = ""; $Mul3 = ""; 				$t121 = ""; $t127 = "";
							$Confe = ""; $Confe1 = ""; $Confe2 = ""; $Confe3 = ""; 		$t122 = ""; $t128 = "";
							$Mulc = ""; $Mulc1 = ""; $Mulc2 = ""; $Mulc3 = "";			$t123 = "";
							$Confec = ""; $Confec1 = ""; $Confec2 = ""; $Confec3 = "";	$t124 = ""; 
							$Mulp = ""; $Mulp1 = ""; $Mulp2 = ""; $Mulp3 = "";			$t125 = ""; 
							$Confep = ""; $Confep1 = ""; $Confep2 = ""; $Confep3 = "";	$t126 = ""; 
	
							echo'
								<h4 class="underlined-header">'.getD($day).'</h4
								<table class="table table-bordered table-hover responsive-utilities">
								  <tbody>
									<tr>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 92px; text-align: center;">TIME</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 92px; text-align: center;"" >A202</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 92px;text-align: center;"">A203</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 92px;text-align: center;"">A204</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 92px;text-align: center;"">A205</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 92px; text-align: center;"">DOST</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 92px;text-align: center;"">A301</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 92px; text-align: center;"">A302</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 92px; text-align: center;"">A303</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 92px; text-align: center;"">A304</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 92px; text-align: center;"">A305</td>
									</tr>
								';
								
							///////////////////////////////////////////////////Rooms A202 - C101/////////////////////////////////////////////
							///////////////////////////////////////////////////////////////////////////////////////////7:30 - 10:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where (sem = '$csem' and schoolYear='$sy' and sday = '$day' and stimeS < 1030) or (sem = '$csem' and schoolYear='$sy' and sday2 = '$day' and stimeS2 < 1030)";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{								
								if($row['sroom']=="TGA202" and $row['sroom2']<>"TGA202")
								{
									$t1 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A202 = $course;
									$A202c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A202p = $prof;
								}elseif($row['sroom2']=="TGA202")
								{
									$t1 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A202 = $course;
									$A202c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A202p = $prof;
								}
								if($row['sroom']=="TGA203" and $row['sroom2']<>"TGA203")
								{
									$t2 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A203 = $course;
									$A203c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A203p = $prof;
								}elseif($row['sroom2']=="TGA203")
								{
									$t2 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A203 = $course;
									$A203c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A203p = $prof;
								}
								if($row['sroom']=="TGA204" and $row['sroom2']<>"TGA204")
								{	
									$t3 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A204 = $course;
									$A204c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A204p = $prof;
								}elseif($row['sroom2']=="TGA204")
								{
									$t3 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A204 = $course;
									$A204c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A204p = $prof;
								}
								if($row['sroom']=="TGA205" and $row['sroom2']<>"TGA205")
								{
									$t4 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A205 = $course;
									$A205c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A205p = $prof;
								}elseif($row['sroom2']=="TGA205")
								{
									$t4 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A205 = $course;
									$A205c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A205p = $prof;
								}
								if($row['sroom']=="TGDST" and $row['sroom2']<>"TGDST")
								{
									$t5 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$DOST = $course;
									$DOSTc = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$DOSTp = $prof;
								}elseif($row['sroom2']=="TGDST")
								{
									$t5 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$DOST = $course;
									$DOSTc = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$DOSTp = $prof;
								}
								if($row['sroom']=="TGA301" and $row['sroom2']<>"TGA301")
								{
									$t6 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A301 = $course;
									$A301c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A301p = $prof;
								}elseif($row['sroom2']=="TGA301")
								{
									$t6 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A301 = $course;
									$A301c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A301p = $prof;
								}
								if($row['sroom']=="TGA302" and $row['sroom2']<>"TGA302")
								{
									$t7 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A302 = $course;
									$A302c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A302p = $prof;
								}elseif($row['sroom2']=="TGA302")
								{
									$t7 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A302 = $course;
									$A302c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A302p = $prof;
								}
								if($row['sroom']=="TGA303" and $row['sroom2']<>"TGA303")
								{
									$t8 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A303 = $course;
									$A303c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A303p = $prof;
								}elseif($row['sroom2']=="TGA303")
								{
									$t8 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A303 = $course;
									$A303c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A303p = $prof;
								}
								if($row['sroom']=="TGA304" and $row['sroom2']<>"TGA304")
								{
									$t9 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A304 = $course;
									$A304c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A304p = $prof;
								}elseif($row['sroom2']=="TGA304")
								{
									$t9 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A304 = $course;
									$A304c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A304p = $prof;
								}
								if($row['sroom']=="TGA305" and $row['sroom2']<>"TGA305")
								{
									$t10 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A305 = $course;
									$A305c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A305p = $prof;
								}elseif($row['sroom2']=="TGA305")
								{
									$t10 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A305 = $course;
									$A305c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A305p = $prof;
								}
							}	
							
							echo '
							<tr>
								<td style="text-align: center;" >'. "7:30 am".'<br />'. "  to" .'<br />'. "10:30 am" .'</td>	
								<td style="text-align: center;" >'. $t1 .'<br />'. $A202 .'<br />'. $A202c .'<br />'. $A202p .'</td>
								<td style="text-align: center;" >'. $t2 .'<br />'. $A203 .'<br />'. $A203c .'<br />'. $A203p .'</td>
								<td style="text-align: center;" >'. $t3 .'<br />'. $A204 .'<br />'. $A204c .'<br />'. $A204p .'</td>
								<td style="text-align: center;" >'. $t4 .'<br />'. $A205 .'<br />'. $A205c .'<br />'. $A205p .'</td>
								<td style="text-align: center;" >'. $t5 .'<br />'. $DOST.'<br />'. $DOSTc .'<br />'. $DOSTp .'</td>
								<td style="text-align: center;" >'. $t6 .'<br />'. $A301.'<br />'. $A301c .'<br />'. $A301p .'</td>
								<td style="text-align: center;" >'. $t7 .'<br />'. $A302.'<br />'. $A302c .'<br />'. $A302p .'</td>
								<td style="text-align: center;" >'. $t8 .'<br />'. $A303.'<br />'. $A303c .'<br />'. $A303p .'</td>
								<td style="text-align: center;" >'. $t8 .'<br />'. $A304.'<br />'. $A304c .'<br />'. $A304p .'</td>
								<td style="text-align: center;" >'. $t10 .'<br />'. $A305.'<br />'. $A305c .'<br />'. $A305p .'</td>
																		
							</tr>';
							
							///////////////////////////////////////////////////////////////////////////////////////////10:30 - 1:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where (sem = '$csem' and schoolYear='$sy' and sday = '$day' and stimeS >= 1030 and stimeS <1330) or (sem = '$csem' and schoolYear='$sy' and sday2 = '$day' and stimeS2 >= 1030 and stimeS2 <1330)";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{								
								if($row['sroom']=="TGA202" and $row['sroom2']<>"TGA202")
								{
									$t11 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2021 = $course;
									$A202c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A202p1 = $prof;
								}elseif($row['sroom2']=="TGA202")
								{
									$t11 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2021 = $course;
									$A202c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A202p1 = $prof;
								}
								if($row['sroom']=="TGA203" and $row['sroom2']<>"TGA203")
								{
									$t12 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2031 = $course;
									$A203c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A203p1 = $prof;
								}elseif($row['sroom2']=="TGA203")
								{
									$t12 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2031 = $course;
									$A203c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A203p1 = $prof;
								}
								if($row['sroom']=="TGA204" and $row['sroom2']<>"TGA204")
								{	
									$t13 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2041 = $course;
									$A204c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A204p1 = $prof;
								}elseif($row['sroom2']=="TGA204")
								{
									$t13 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2041 = $course;
									$A204c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A204p1 = $prof;
								}
								if($row['sroom']=="TGA205" and $row['sroom2']<>"TGA205")
								{
									$t14 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2051 = $course;
									$A205c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A205p1 = $prof;
								}elseif($row['sroom2']=="TGA205")
								{
									$t14 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2051 = $course;
									$A205c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A205p1 = $prof;
								}
								if($row['sroom']=="TGDST" and $row['sroom2']<>"TGDST")
								{
									$t15 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$DOST1 = $course;
									$DOSTc1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$DOSTp1 = $prof;
								}elseif($row['sroom2']=="TGDST")
								{
									$t15 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$DOST = $course;
									$DOSTc = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$DOSTp = $prof;
								}
								if($row['sroom']=="TGA301" and $row['sroom2']<>"TGA301")
								{
									$t16 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3011 = $course;
									$A301c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A301p1 = $prof;
								}elseif($row['sroom2']=="TGA301")
								{
									$t16 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3011 = $course;
									$A301c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A301p1 = $prof;
								}
								if($row['sroom']=="TGA302" and $row['sroom2']<>"TGA302")
								{
									$t17 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3021 = $course;
									$A302c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A302p1 = $prof;
								}elseif($row['sroom2']=="TGA302")
								{
									$t17 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3021 = $course;
									$A302c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A302p1 = $prof;
								}
								if($row['sroom']=="TGA303" and $row['sroom2']<>"TGA303")
								{
									$t18 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3031 = $course;
									$A303c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A303p1 = $prof;
								}elseif($row['sroom2']=="TGA303")
								{
									$t18 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3031 = $course;
									$A303c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A303p1 = $prof;
								}
								if($row['sroom']=="TGA304" and $row['sroom2']<>"TGA304")
								{
									$t19 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3041 = $course;
									$A304c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A304p1 = $prof;
								}elseif($row['sroom2']=="TGA304")
								{
									$t19 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3041 = $course;
									$A304c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A304p1 = $prof;
								}
								if($row['sroom']=="TGA305" and $row['sroom2']<>"TGA305")
								{
									$t20 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3051 = $course;
									$A305c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A305p1 = $prof;
								}elseif($row['sroom2']=="TGA305")
								{
									$t20 = getT1($row['stimeS2'],$row['stimeE2']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3051 = $course;
									$A305c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A305p1 = $prof;
								}
							}	
						
							echo '
							<tr>
								<td style="text-align: center;">'. "10:30 am".'<br />'. "  to" .'<br />'. "1:30 pm" .'</td>	
								<td style="text-align: center;">'. $t11 .'<br />'. $A2021 .'<br />'. $A202c1 .'<br />'. $A202p1 .'</td>
								<td style="text-align: center;">'. $t12 .'<br />'. $A2031 .'<br />'. $A203c1 .'<br />'. $A203p1 .'</td>
								<td style="text-align: center;">'. $t13 .'<br />'. $A2041 .'<br />'. $A204c1 .'<br />'. $A204p1 .'</td>
								<td style="text-align: center;">'. $t14 .'<br />'. $A2051 .'<br />'. $A205c1 .'<br />'. $A205p1 .'</td>
								<td style="text-align: center;">'. $t15 .'<br />'. $DOST1.'<br />'. $DOSTc1 .'<br />'. $DOSTp1 .'</td>
								<td style="text-align: center;">'. $t16 .'<br />'. $A3011.'<br />'. $A301c1 .'<br />'. $A301p1 .'</td>
								<td style="text-align: center;">'. $t17 .'<br />'. $A3021.'<br />'. $A302c1 .'<br />'. $A302p1 .'</td>
								<td style="text-align: center;">'. $t18 .'<br />'. $A3031.'<br />'. $A303c1 .'<br />'. $A303p1 .'</td>
								<td style="text-align: center;">'. $t19 .'<br />'. $A3041.'<br />'. $A304c1 .'<br />'. $A304p1 .'</td>
								<td style="text-align: center;">'. $t20 .'<br />'. $A3051.'<br />'. $A305c1 .'<br />'. $A305p1 .'</td>
																		
							</tr>';
							
							///////////////////////////////////////////////////////////////////////////////////////////1:30 - 4:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS >=1330 and stimeS <1630";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{								
								if($row['sroom']=="TGA202")
								{
									$t21 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2022 = $course;
									$A202c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A202p2 = $prof;
								}else if($row['sroom']=="TGA203")
								{
									$t22 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2032 = $course;
									$A203c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A203p2 = $prof;
								}else if($row['sroom']=="TGA204")
								{
									$t23 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2042 = $course;
									$A204c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A204p2 = $prof;
								}else if($row['sroom']=="TGA205")
								{
									$t24 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2052 = $course;
									$A205c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A205p2 = $prof;
								}else if($row['sroom']=="TGDST")
								{
									$t25 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$DOST2 = $course;
									$DOSTc2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$DOSTp2 = $prof;
								}else if($row['sroom']=="TGA301")
								{
									$t26 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3012 = $course;
									$A301c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A301p2 = $prof;
								}else if($row['sroom']=="TGA302")
								{	
									$t27 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3022 = $course;
									$A302c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A302p2 = $prof;
								}else if($row['sroom']=="TGA303")
								{
								    $t28 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3032 = $course;
									$A303c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A303p2 = $prof;
								}else if($row['sroom']=="TGA304")
								{	
									$t29 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3042 = $course;
									$A304c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A304p2 = $prof;
								}else if($row['sroom']=="TGA305")
								{
									$t30 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3052 = $course;
									$A305c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A305p2 = $prof;
								}
							}	
							
							echo '
							<tr>
								<td style="text-align: center;">'. "1:30 pm".'<br />'. "  to" .'<br />'. "4:30 pm" .'</td>	
								<td style="text-align: center;">'. $t21 .'<br />'. $A2022 .'<br />'. $A202c2 .'<br />'. $A202p2 .'</td>
								<td style="text-align: center;">'. $t22 .'<br />'. $A2032 .'<br />'. $A203c2 .'<br />'. $A203p2 .'</td>
								<td style="text-align: center;">'. $t23 .'<br />'. $A2042 .'<br />'. $A204c2 .'<br />'. $A204p2 .'</td>
								<td style="text-align: center;">'. $t24 .'<br />'. $A2052 .'<br />'. $A205c2 .'<br />'. $A205p2 .'</td>
								<td style="text-align: center;">'. $t25 .'<br />'. $DOST2.'<br />'. $DOSTc2 .'<br />'. $DOSTp2 .'</td>
								<td style="text-align: center;">'. $t26 .'<br />'. $A3012.'<br />'. $A301c2 .'<br />'. $A301p2 .'</td>
								<td style="text-align: center;">'. $t27 .'<br />'. $A3022.'<br />'. $A302c2 .'<br />'. $A302p2 .'</td>
								<td style="text-align: center;">'. $t28 .'<br />'. $A3032.'<br />'. $A303c2 .'<br />'. $A303p2 .'</td>
								<td style="text-align: center;">'. $t29 .'<br />'. $A3042.'<br />'. $A304c2 .'<br />'. $A304p2 .'</td>
								<td style="text-align: center;">'. $t30 .'<br />'. $A3052.'<br />'. $A305c2 .'<br />'. $A305p2 .'</td>
																		
							</tr>';
							
							///////////////////////////////////////////////////////////////////////////////////////////4:30 - 7:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS >= 1630";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{	
								if($row['sroom']=="TGA202")
								{
									$t31 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2023 = $course;
									$A202c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A202p3 = $prof;
								}else if($row['sroom']=="TGA203")
								{
									$t32 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2033 = $course;
									$A203c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A203p3 = $prof;
								}else if($row['sroom']=="TGA204")
								{
									$t33 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2043 = $course;
									$A204c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A204p3 = $prof;
								}else if($row['sroom']=="TGA205")
								{
									$t34 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A2053 = $course;
									$A205c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A205p3 = $prof;
								}else if($row['sroom']=="TGDST")
								{
									$t35 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$DOST3 = $course;
									$DOSTc3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$DOSTp3 = $prof;
								}else if($row['sroom']=="TGA301")
								{
									$t36 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3013 = $course;
									$A301c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A301p3 = $prof;
								}else if($row['sroom']=="TGA302")
								{
									$t37 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3023 = $course;
									$A302c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A302p3 = $prof;
								}else if($row['sroom']=="TGA303")
								{
									$t38 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3033 = $course;
									$A303c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A303p3 = $prof;
								}else if($row['sroom']=="TGA304")
								{
									$t39 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3043 = $course;
									$A304c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A304p3 = $prof;
								}else if($row['sroom']=="TGA305")
								{
									$t40 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3053 = $course;
									$A305c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A305p3 = $prof;
								}
								
							}
						
							echo '
							<tr>
								<td style="text-align: center;">'. "4:30 pm".'<br />'. "  to" .'<br />'. "7:30 pm" .'</td>	
								<td style="text-align: center;">'. $t31 .'<br />'. $A2023 .'<br />'. $A202c3 .'<br />'. $A202p3 .'</td>
								<td style="text-align: center;">'. $t32 .'<br />'. $A2033 .'<br />'. $A203c3 .'<br />'. $A203p3 .'</td>
								<td style="text-align: center;">'. $t33 .'<br />'. $A2043 .'<br />'. $A204c3 .'<br />'. $A204p3 .'</td>
								<td style="text-align: center;">'. $t34 .'<br />'. $A2053 .'<br />'. $A205c3 .'<br />'. $A205p3 .'</td>
								<td style="text-align: center;">'. $t35 .'<br />'. $DOST3.'<br />'. $DOSTc3 .'<br />'. $DOSTp3 .'</td>
								<td style="text-align: center;">'. $t36 .'<br />'. $A3013.'<br />'. $A301c3 .'<br />'. $A301p3 .'</td>
								<td style="text-align: center;">'. $t37 .'<br />'. $A3023.'<br />'. $A302c3 .'<br />'. $A302p3 .'</td>
								<td style="text-align: center;">'. $t38 .'<br />'. $A3033.'<br />'. $A303c3 .'<br />'. $A303p3 .'</td>
								<td style="text-align: center;">'. $t39 .'<br />'. $A3043.'<br />'. $A304c3 .'<br />'. $A304p3 .'</td>
								<td style="text-align: center;">'. $t40 .'<br />'. $A3053.'<br />'. $A305c3 .'<br />'. $A305p3 .'</td>
																		
							</tr>';
							
							//////////////////////////////////////////////END Rooms A202 - A305 TIMEFRAME////////////////////////////////////////
							
							////////////////////////////////////////////////////Rooms A307 - C101//////////////////////////////////////////////
							/////////////////////////////////////////////////////////////////////////////////////////////7:30 - 10:30 timeframe
							echo'
								<table class="table table-bordered table-hover responsive-utilities">
								  <tbody>
									<tr>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">TIME</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"" >A307</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">A308</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">A309</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">A310</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">A401</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">A402</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">A403</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">A404</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">A405</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">C101</td>
									</tr>
								';
							
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS < 1030";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{							
								if($row['sroom']=="TGA307")
								{	
									$t41 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A307 = $course;
									$A307c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A307p = $prof;
								}else if($row['sroom']=="TGA308")
								{
									$t42 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A308 = $course;
									$A308c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A308p = $prof;
								}else if($row['sroom']=="TGA309")
								{
									$t43 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A309 = $course;
									$A309c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A309p = $prof;
								}else if($row['sroom']=="TGA310")
								{
									$t44 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A310 = $course;
									$A310c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A310p = $prof;
								}else if($row['sroom']=="TGA401")
								{
									$t45 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A401 = $course;
									$A401c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A401p = $prof;
								}else if($row['sroom']=="TGA402")
								{	
									$t46 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A402 = $course;
									$A402c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A402p = $prof;
								}else if($row['sroom']=="TGA403")
								{
									$t47 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A403 = $course;
									$A403c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A403p = $prof;
								}else if($row['sroom']=="TGA404")
								{
									$t48 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A404 = $course;
									$A404c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A404p = $prof;
								}else if($row['sroom']=="TGA405")
								{
									$t49 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A405 = $course;
									$A405c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A405p = $prof;
								}else if($row['sroom']=="TGC101")
								{
									$t50 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$C101 = $course;
									$C101c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$C101p = $prof;
								}
							}	
							echo '
							<tr>
								<td style="text-align: center;">'. "7:30 am".'<br />'. "  to" .'<br />'. "10:30 am" .'</td>	
								<td style="text-align: center;">'. $t41 .'<br />'. $A307 .'<br />'. $A307c .'<br />'. $A307p .'</td>
								<td style="text-align: center;">'. $t42 .'<br />'. $A308 .'<br />'. $A308c .'<br />'. $A308p .'</td>
								<td style="text-align: center;">'. $t43 .'<br />'. $A309 .'<br />'. $A309c .'<br />'. $A309p .'</td>
								<td style="text-align: center;">'. $t44 .'<br />'. $A310 .'<br />'. $A310c .'<br />'. $A310p .'</td>
								<td style="text-align: center;">'. $t45 .'<br />'. $A401.'<br />'. $A401c .'<br />'. $A401p .'</td>
								<td style="text-align: center;">'. $t46 .'<br />'. $A402.'<br />'. $A402c .'<br />'. $A402p .'</td>
								<td style="text-align: center;">'. $t47 .'<br />'. $A403.'<br />'. $A403c .'<br />'. $A403p .'</td>
								<td style="text-align: center;">'. $t48 .'<br />'. $A404.'<br />'. $A404c .'<br />'. $A404p .'</td>
								<td style="text-align: center;">'. $t49 .'<br />'. $A405.'<br />'. $A405c .'<br />'. $A405p .'</td>
								<td style="text-align: center;">'. $t50 .'<br />'. $C101.'<br />'. $C101c .'<br />'. $C101p .'</td>
																		
							</tr>';
							
							///////////////////////////////////////////////////////////////////////////////////////////10:30 - 1:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS >= 1030 and stimeS <1330";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{								
								if($row['sroom']=="TGA307")
								{
									$t51 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3071 = $course;
									$A307c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A307p1 = $prof;
								}else if($row['sroom']=="TGA308")
								{
									$t52 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3081 = $course;
									$A308c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A308p1 = $prof;
								}else if($row['sroom']=="309")
								{
									$t53 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3091 = $course;
									$A309c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A309p1 = $prof;
								}else if($row['sroom']=="310")
								{
									$t54 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3101 = $course;
									$A310c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A310p1 = $prof;
								}else if($row['sroom']=="TGA401")
								{
									$t55 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4011 = $course;
									$A401c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A401p1 = $prof;
								}else if($row['sroom']=="TGA402")
								{
									$t56 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4021 = $course;
									$A402c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A402p1 = $prof;
								}else if($row['sroom']=="TGA403")
								{
									$t57 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4031 = $course;
									$A403c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A403p1 = $prof;
								}else if($row['sroom']=="TGA404")
								{
									$t58 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4041 = $course;
									$A404c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A404p1 = $prof;
								}else if($row['sroom']=="TGA405")
								{	$t59 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4051 = $course;
									$A405c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A405p1 = $prof;
								}else if($row['sroom']=="TGC101")
								{
									$t60 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$C1011 = $course;
									$C101c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$C101p1 = $prof;
								}
							}	
						
							echo '
							<tr>
								<td style="text-align: center;">'. "10:30 am".'<br />'. "  to" .'<br />'. "1:30 pm" .'</td>	
								<td style="text-align: center;">'. $t51 .'<br />'. $A3071 .'<br />'. $A307c1 .'<br />'. $A307p1 .'</td>
								<td style="text-align: center;">'. $t52 .'<br />'. $A3081 .'<br />'. $A308c1 .'<br />'. $A308p1 .'</td>
								<td style="text-align: center;">'. $t53 .'<br />'. $A3091 .'<br />'. $A309c1 .'<br />'. $A309p1 .'</td>
								<td style="text-align: center;">'. $t54 .'<br />'. $A3101 .'<br />'. $A310c1 .'<br />'. $A310p1 .'</td>
								<td style="text-align: center;">'. $t55 .'<br />'. $A4011.'<br />'. $A401c1 .'<br />'. $A401p1 .'</td>
								<td style="text-align: center;">'. $t56 .'<br />'. $A4021.'<br />'. $A402c1 .'<br />'. $A402p1 .'</td>
								<td style="text-align: center;">'. $t57 .'<br />'. $A4031.'<br />'. $A403c1 .'<br />'. $A403p1 .'</td>
								<td style="text-align: center;">'. $t58 .'<br />'. $A4041.'<br />'. $A404c1 .'<br />'. $A404p1 .'</td>
								<td style="text-align: center;">'. $t59 .'<br />'. $A4051.'<br />'. $A405c1 .'<br />'. $A405p1 .'</td>
								<td style="text-align: center;">'. $t60 .'<br />'. $C1011.'<br />'. $C101c1 .'<br />'. $C101p1 .'</td>											
							</tr>';
							
							///////////////////////////////////////////////////////////////////////////////////////////1:30 - 4:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS >= 1330 and stimeS <1630";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{								
								if($row['sroom']=="TGA307")
								{
									$t61 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3072 = $course;
									$A307c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A307p2 = $prof;
								}else if($row['sroom']=="TGA308")
								{
									$t62 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3082 = $course;
									$A308c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A308p2 = $prof;
								}else if($row['sroom']=="309")
								{
									$t63 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3092 = $course;
									$A309c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A309p2 = $prof;
								}else if($row['sroom']=="310")
								{
									$t64 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3102 = $course;
									$A310c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A310p2 = $prof;
								}else if($row['sroom']=="TGA401")
								{
									$t65 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4012 = $course;
									$A401c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A401p2 = $prof;
								}else if($row['sroom']=="TGA402")
								{
									$t66 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4022 = $course;
									$A402c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A402p2 = $prof;
								}else if($row['sroom']=="TGA403")
								{
									$t67 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4032 = $course;
									$A403c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A403p2 = $prof;
								}else if($row['sroom']=="TGA404")
								{
									$t68 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4042 = $course;
									$A404c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A404p2 = $prof;
								}else if($row['sroom']=="TGA405")
								{	$t69 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4052 = $course;
									$A405c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A405p2 = $prof;
								}else if($row['sroom']=="TGC101")
								{
									$t70 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$C1012 = $course;
									$C101c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$C101p2 = $prof;
								}
							}	
						
							echo '
							<tr>
								<td style="text-align: center;">'. "1:30 pm".'<br />'. "  to" .'<br />'. "4:30 pm" .'</td>	
								<td style="text-align: center;">'. $t61 .'<br />'. $A3072 .'<br />'. $A307c2 .'<br />'. $A307p2 .'</td>
								<td style="text-align: center;">'. $t62 .'<br />'. $A3082 .'<br />'. $A308c2 .'<br />'. $A308p2 .'</td>
								<td style="text-align: center;">'. $t63 .'<br />'. $A3092 .'<br />'. $A309c2 .'<br />'. $A309p2 .'</td>
								<td style="text-align: center;">'. $t64 .'<br />'. $A3102 .'<br />'. $A310c2 .'<br />'. $A310p2 .'</td>
								<td style="text-align: center;">'. $t65 .'<br />'. $A4012 .'<br />'. $A401c2 .'<br />'. $A401p2 .'</td>
								<td style="text-align: center;">'. $t66 .'<br />'. $A4022.'<br />'. $A402c2 .'<br />'. $A402p2 .'</td>
								<td style="text-align: center;">'. $t67 .'<br />'. $A4032.'<br />'. $A403c2 .'<br />'. $A403p2 .'</td>
								<td style="text-align: center;">'. $t68 .'<br />'. $A4042.'<br />'. $A404c2 .'<br />'. $A404p2 .'</td>
								<td style="text-align: center;">'. $t69 .'<br />'. $A4052.'<br />'. $A405c2 .'<br />'. $A405p2 .'</td>
								<td style="text-align: center;">'. $t70 .'<br />'. $C1012.'<br />'. $C101c2 .'<br />'. $C101p2 .'</td>											
							</tr>';
							
							///////////////////////////////////////////////////////////////////////////////////////////4:30 - 7:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS >= 1630";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{								
								if($row['sroom']=="TGA307")
								{
									$t71 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3073 = $course;
									$A307c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A307p3 = $prof;
								}else if($row['sroom']=="TGA308")
								{
									$t72 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3083 = $course;
									$A308c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A308p3 = $prof;
								}else if($row['sroom']=="309")
								{
									$t73 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3093 = $course;
									$A309c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A309p3 = $prof;
								}else if($row['sroom']=="310")
								{
									$t74 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A3103 = $course;
									$A310c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A310p3 = $prof;
								}else if($row['sroom']=="TGA401")
								{
									$t75 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4013 = $course;
									$A401c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A401p3 = $prof;
								}else if($row['sroom']=="TGA402")
								{
									$t76 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4023 = $course;
									$A402c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A402p3 = $prof;
								}else if($row['sroom']=="TGA403")
								{
									$t77 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4033 = $course;
									$A403c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A403p3 = $prof;
								}else if($row['sroom']=="TGA404")
								{
									$t78 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4043 = $course;
									$A404c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A404p3 = $prof;
								}else if($row['sroom']=="TGA405")
								{	$t79 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$A4053 = $course;
									$A405c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$A405p3 = $prof;
								}else if($row['sroom']=="TGC101")
								{
									$t80 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$C1013 = $course;
									$C101c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$C101p3 = $prof;
								}
							}	
						
							echo '
							<tr>
								<td style="text-align: center;">'. "4:30 pm".'<br />'. "  to" .'<br />'. "7:30 pm" .'</td>	
								<td style="text-align: center;">'. $t71 .'<br />'. $A3073 .'<br />'. $A307c3 .'<br />'. $A307p3 .'</td>
								<td style="text-align: center;">'. $t72 .'<br />'. $A3083 .'<br />'. $A308c3 .'<br />'. $A308p3 .'</td>
								<td style="text-align: center;">'. $t73 .'<br />'. $A3093 .'<br />'. $A309c3 .'<br />'. $A309p3 .'</td>
								<td style="text-align: center;">'. $t74 .'<br />'. $A3103 .'<br />'. $A310c3 .'<br />'. $A310p3 .'</td>
								<td style="text-align: center;">'. $t75 .'<br />'. $A4013 .'<br />'. $A401c3 .'<br />'. $A401p3 .'</td>
								<td style="text-align: center;">'. $t76 .'<br />'. $A4023.'<br />'. $A402c3 .'<br />'. $A402p3 .'</td>
								<td style="text-align: center;">'. $t77 .'<br />'. $A4033.'<br />'. $A403c3 .'<br />'. $A403p3 .'</td>
								<td style="text-align: center;">'. $t78 .'<br />'. $A4043.'<br />'. $A404c3 .'<br />'. $A404p3 .'</td>
								<td style="text-align: center;">'. $t79 .'<br />'. $A4053.'<br />'. $A405c3 .'<br />'. $A405p3 .'</td>
								<td style="text-align: center;">'. $t80 .'<br />'. $C1013.'<br />'. $C101c3 .'<br />'. $C101p3 .'</td>											
							</tr>';
							//////////////////////////////////////////////END Rooms A307 - C101 TIMEFRAME////////////////////////////////////////
							
							////////////////////////////////////////////////////Rooms B101 - C102////////////////////////////////////////////////
							///////////////////////////////////////////////////////////////////////////////////////////////7:30 - 10:30 timeframe
							echo'
								<table class="table table-bordered table-hover responsive-utilities">
								  <tbody>
									<tr>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">TIME</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"" >B101</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">B102</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">B103</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">B104</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">CHEM LAB</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;"">A LAB</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">B205</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"">B206</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">DRAFTING RM</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;"">C102</td>
									</tr>
								';
							
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS < 1030";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{							
								if($row['sroom']=="TGB101")
								{	
									$t81 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B101 = $course;
									$B101c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B101p = $prof;
								}else if($row['sroom']=="TGB102")
								{
									$t82 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B102 = $course;
									$B102c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B102p = $prof;
								}else if($row['sroom']=="TGB103")
								{
									$t83 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B103 = $course;
									$B103c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B103p = $prof;
								}else if($row['sroom']=="TGB104")
								{
									$t84 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B104 = $course;
									$B104c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B104p = $prof;
								}else if($row['sroom']=="TGB201")
								{
									$t85 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$CL = $course;
									$CLc = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$CLp = $prof;
								}else if($row['sroom']=="A LAB")
								{	
									$t86 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$AL = $course;
									$ALc = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$ALp = $prof;
								}else if($row['sroom']=="TGB205")
								{
									$t87 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B205 = $course;
									$B205c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B205p = $prof;
								}else if($row['sroom']=="TGB206")
								{
									$t88 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B206 = $course;
									$B206c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B206p = $prof;
								}else if($row['sroom']=="TGB207")
								{
									$t89 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$DR = $course;
									$DRc = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$DRp = $prof;
								}else if($row['sroom']=="TGC102")
								{
									$t90 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$C102 = $course;
									$C102c = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$C102p = $prof;
								}
							}	
							echo '
							<tr>
								<td style="text-align: center;">'. "7:30 am".'<br />'. "  to" .'<br />'. "10:30 am" .'</td>	
								<td style="text-align: center;">'. $t81 .'<br />'. $B101 .'<br />'. $B101c .'<br />'. $B101p .'</td>
								<td style="text-align: center;">'. $t82 .'<br />'. $B102 .'<br />'. $B102c .'<br />'. $B102p .'</td>
								<td style="text-align: center;">'. $t83 .'<br />'. $B103 .'<br />'. $B103c .'<br />'. $B103p .'</td>
								<td style="text-align: center;">'. $t84 .'<br />'. $B104 .'<br />'. $B104c .'<br />'. $B104p .'</td>
								<td style="text-align: center;">'. $t85 .'<br />'. $CL.'<br />'. $CLc .'<br />'. $CLp .'</td>
								<td style="text-align: center;">'. $t86 .'<br />'. $AL.'<br />'. $ALc .'<br />'. $ALp .'</td>
								<td style="text-align: center;">'. $t87 .'<br />'. $B205.'<br />'. $B205c .'<br />'. $B205p .'</td>
								<td style="text-align: center;">'. $t88 .'<br />'. $B206.'<br />'. $B206c .'<br />'. $B206p .'</td>
								<td style="text-align: center;">'. $t89 .'<br />'. $DR.'<br />'. $DRc .'<br />'. $DRp .'</td>
								<td style="text-align: center;">'. $t90 .'<br />'. $C102.'<br />'. $C102c .'<br />'. $C102p .'</td>									
							</tr>';
							
							///////////////////////////////////////////////////////////////////////////////////////////////10:30 - 1:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS >= 1030 and stimeS <1330";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{							
								if($row['sroom']=="TGB101")
								{	
									$t91 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B1011 = $course;
									$B101c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B101p1 = $prof;
								}else if($row['sroom']=="TGB102")
								{
									$t92 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B1021 = $course;
									$B102c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B102p1 = $prof;
								}else if($row['sroom']=="TGB103")
								{
									$t93 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B1031 = $course;
									$B103c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B103p1 = $prof;
								}else if($row['sroom']=="TGB104")
								{
									$t94 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B1041 = $course;
									$B104c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B104p1 = $prof;
								}else if($row['sroom']=="TGB201")
								{
									$t95 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$CL1 = $course;
									$CLc1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$CLp1 = $prof;
								}else if($row['sroom']=="A LAB")
								{	
									$t96 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$AL1 = $course;
									$ALc1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$ALp1 = $prof;
								}else if($row['sroom']=="TGB205")
								{
									$t97 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B2051 = $course;
									$B205c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B205p1 = $prof;
								}else if($row['sroom']=="TGB206")
								{
									$t98 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B2061 = $course;
									$B206c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B206p1 = $prof;
								}else if($row['sroom']=="TGB207")
								{
									$t99 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$DR1 = $course;
									$DRc1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$DRp1 = $prof;
								}else if($row['sroom']=="TGC102")
								{
									$t100 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$C1021 = $course;
									$C102c1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$C102p1 = $prof;
								}
							}	
							echo '
							<tr>
								<td style="text-align: center;">'. "10:30 am".'<br />'. "  to" .'<br />'. "1:30 pm" .'</td>	
								<td style="text-align: center;">'. $t91 .'<br />'. $B1011 .'<br />'. $B101c1 .'<br />'. $B101p1 .'</td>
								<td style="text-align: center;">'. $t92 .'<br />'. $B1021 .'<br />'. $B102c1 .'<br />'. $B102p1 .'</td>
								<td style="text-align: center;">'. $t93 .'<br />'. $B1031 .'<br />'. $B103c1 .'<br />'. $B103p1 .'</td>
								<td style="text-align: center;">'. $t94 .'<br />'. $B1041 .'<br />'. $B104c1 .'<br />'. $B104p1 .'</td>
								<td style="text-align: center;">'. $t95 .'<br />'. $CL1.'<br />'. $CLc1 .'<br />'. $CLp1 .'</td>
								<td style="text-align: center;">'. $t96 .'<br />'. $AL1.'<br />'. $ALc1 .'<br />'. $ALp1 .'</td>
								<td style="text-align: center;">'. $t97 .'<br />'. $B2051.'<br />'. $B205c1 .'<br />'. $B205p1 .'</td>
								<td style="text-align: center;">'. $t98 .'<br />'. $B2061.'<br />'. $B206c1 .'<br />'. $B206p1 .'</td>
								<td style="text-align: center;">'. $t99 .'<br />'. $DR1.'<br />'. $DRc1 .'<br />'. $DRp1 .'</td>
								<td style="text-align: center;">'. $t100 .'<br />'. $C1021.'<br />'. $C102c1 .'<br />'. $C102p1 .'</td>									
							</tr>';
							
							///////////////////////////////////////////////////////////////////////////////////////////////1:30 - 4:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS >= 1330 and stimeS <1630";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{							
								if($row['sroom']=="TGB101")
								{	
									$t101 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B1012 = $course;
									$B101c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B101p2 = $prof;
								}else if($row['sroom']=="TGB102")
								{
									$t102 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B1022 = $course;
									$B102c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B102p2 = $prof;
								}else if($row['sroom']=="TGB103")
								{
									$t103 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B1032 = $course;
									$B103c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B103p2 = $prof;
								}else if($row['sroom']=="TGB104")
								{
									$t104 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B1042 = $course;
									$B104c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B104p2 = $prof;
								}else if($row['sroom']=="TGB201")
								{
									$t105 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$CL2 = $course;
									$CLc2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$CLp2 = $prof;
								}else if($row['sroom']=="A LAB")
								{	
									$t106 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$AL2 = $course;
									$ALc2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$ALp2 = $prof;
								}else if($row['sroom']=="TGB205")
								{
									$t107 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B2052 = $course;
									$B205c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B205p2 = $prof;
								}else if($row['sroom']=="TGB206")
								{
									$t108 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B2062 = $course;
									$B206c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B206p2 = $prof;
								}else if($row['sroom']=="TGB207")
								{
									$t109 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$DR2 = $course;
									$DRc2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$DRp2 = $prof;
								}else if($row['sroom']=="TGC102")
								{
									$t110 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$C1022 = $course;
									$C102c2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$C102p2 = $prof;
								}
							}	
							echo '
							<tr>
								<td style="text-align: center;">'. "1:30 pm".'<br />'. "  to" .'<br />'. "4:30 pm" .'</td>	
								<td style="text-align: center;">'. $t101 .'<br />'. $B1012 .'<br />'. $B101c2 .'<br />'. $B101p2 .'</td>
								<td style="text-align: center;">'. $t102 .'<br />'. $B1022 .'<br />'. $B102c2 .'<br />'. $B102p2 .'</td>
								<td style="text-align: center;">'. $t103 .'<br />'. $B1032 .'<br />'. $B103c2 .'<br />'. $B103p2 .'</td>
								<td style="text-align: center;">'. $t104 .'<br />'. $B1042 .'<br />'. $B104c2 .'<br />'. $B104p2 .'</td>
								<td style="text-align: center;">'. $t105 .'<br />'. $CL2.'<br />'. $CLc2 .'<br />'. $CLp2 .'</td>
								<td style="text-align: center;">'. $t106 .'<br />'. $AL2.'<br />'. $ALc2 .'<br />'. $ALp2 .'</td>
								<td style="text-align: center;">'. $t107 .'<br />'. $B2052.'<br />'. $B205c2 .'<br />'. $B205p2 .'</td>
								<td style="text-align: center;">'. $t108 .'<br />'. $B2062.'<br />'. $B206c2 .'<br />'. $B206p2 .'</td>
								<td style="text-align: center;">'. $t109 .'<br />'. $DR2.'<br />'. $DRc2 .'<br />'. $DRp2 .'</td>
								<td style="text-align: center;">'. $t110 .'<br />'. $C1022.'<br />'. $C102c2 .'<br />'. $C102p2 .'</td>									
							</tr>';
							
							///////////////////////////////////////////////////////////////////////////////////////////////4:30 - 7:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS >= 1630";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{							
								if($row['sroom']=="TGB101")
								{	
									$t111 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B1013 = $course;
									$B101c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B101p3 = $prof;
								}else if($row['sroom']=="TGB102")
								{
									$t112 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B1023 = $course;
									$B102c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B102p3 = $prof;
								}else if($row['sroom']=="TGB103")
								{
									$t113 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B1033 = $course;
									$B103c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B103p3 = $prof;
								}else if($row['sroom']=="TGB104")
								{
									$t114 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B1043 = $course;
									$B104c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B104p3 = $prof;
								}else if($row['sroom']=="TGB201")
								{
									$t115 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$CL3 = $course;
									$CLc3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$CLp3 = $prof;
								}else if($row['sroom']=="A LAB")
								{	
									$t116 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$AL3 = $course;
									$ALc3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$ALp3 = $prof;
								}else if($row['sroom']=="TGB205")
								{
									$t117 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B2053 = $course;
									$B205c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B205p3 = $prof;
								}else if($row['sroom']=="TGB206")
								{
									$t118 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$B2063 = $course;
									$B206c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$B206p3 = $prof;
								}else if($row['sroom']=="TGB207")
								{
									$t119 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$DR3 = $course;
									$DRc3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$DRp3 = $prof;
								}else if($row['sroom']=="TGC102")
								{
									$t120 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$C1023 = $course;
									$C102c3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$C102p3 = $prof;
								}
							}	
							echo '
							<tr>
								<td style="text-align: center;">'. "4:30 pm".'<br />'. "  to" .'<br />'. "7:30 pm" .'</td>	
								<td style="text-align: center;">'. $t111 .'<br />'. $B1013 .'<br />'. $B101c3 .'<br />'. $B101p3 .'</td>
								<td style="text-align: center;">'. $t112 .'<br />'. $B1023 .'<br />'. $B102c3 .'<br />'. $B102p3 .'</td>
								<td style="text-align: center;">'. $t113 .'<br />'. $B1033 .'<br />'. $B103c3 .'<br />'. $B103p3 .'</td>
								<td style="text-align: center;">'. $t114 .'<br />'. $B1043 .'<br />'. $B104c3 .'<br />'. $B104p3 .'</td>
								<td style="text-align: center;">'. $t115 .'<br />'. $CL3.'<br />'. $CLc3 .'<br />'. $CLp3 .'</td>
								<td style="text-align: center;">'. $t116 .'<br />'. $AL3.'<br />'. $ALc3 .'<br />'. $ALp3 .'</td>
								<td style="text-align: center;">'. $t117 .'<br />'. $B2053.'<br />'. $B205c3 .'<br />'. $B205p3 .'</td>
								<td style="text-align: center;">'. $t118 .'<br />'. $B2063.'<br />'. $B206c3 .'<br />'. $B206p3 .'</td>
								<td style="text-align: center;">'. $t119 .'<br />'. $DR3.'<br />'. $DRc3 .'<br />'. $DRp3 .'</td>
								<td style="text-align: center;">'. $t120 .'<br />'. $C1023.'<br />'. $C102c3 .'<br />'. $C102p3 .'</td>									
							</tr>';
							
							//////////////////////////////////////////////END Rooms B101 - C102 TIMEFRAME////////////////////////////////////////
							
							////////////////////////////////////////////////////Rooms MULTIMEDIA & CONFE RM////////////////////////////////////////////////
							///////////////////////////////////////////////////////////////////////////////////////////////7:30 - 10:30 timeframe
							echo'
								<table class="table table-bordered table-hover responsive-utilities">
								  <tbody>
									<tr>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;">TIME</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;"" >MULTIMEDIA</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;"">CONFE RM</td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;""> </td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px;text-align: center;""> </td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;""> </td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 160px;text-align: center;""> </td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;""> </td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 100px; text-align: center;""> </td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;""> </td>
										<td style="background-color: maroon; color: white; font-weight: bold; width: 50px; text-align: center;""> </td>
									</tr>
								';
							
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS < 1030";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{							
								if($row['sroom']=="MULTIMEDIA")
								{	
									$t121 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$Mul = $course;
									$Mulc = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$Mulp = $prof;
								}else if($row['sroom']=="CONFE RM")
								{
									$t122 = getT1($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$Confe = $course;
									$Confec = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$Confep = $prof;
								}
							}	
							
							echo '
							<tr>
								<td style="text-align: center;">'. "7:30 am".'<br />'. "  to" .'<br />'. "10:30 am" .'</td>	
								<td style="text-align: center;">'. $t121 .'<br />'. $Mul .'<br />'. $Mulc .'<br />'. $Mulp .'</td>
								<td style="text-align: center;">'. $t122 .'<br />'. $Confe .'<br />'. $Confec .'<br />'. $Confep .'</td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
							</tr>';
							
							///////////////////////////////////////////////////////////////////////////////////////////////10:30 - 1:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS >= 1030 and stimeS <1330";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{							
								if($row['sroom']=="MULTIMEDIA")
								{	
									$t123 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$Mul1 = $course;
									$Mulc1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$Mulp1 = $prof;
								}else if($row['sroom']=="CONFE RM")
								{
									$t124 = getT2($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$Confe1 = $course;
									$Confec1 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$Confep1 = $prof;
								}
							}	
							
							echo '
							<tr>
								<td style="text-align: center;">'. "10:30 am".'<br />'. "  to" .'<br />'. "1:30 pm" .'</td>	
								<td style="text-align: center;">'. $t123 .'<br />'. $Mul1 .'<br />'. $Mulc1 .'<br />'. $Mulp1 .'</td>
								<td style="text-align: center;">'. $t124 .'<br />'. $Confe1 .'<br />'. $Confec1 .'<br />'. $Confep1 .'</td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
							</tr>';
							
							///////////////////////////////////////////////////////////////////////////////////////////////1:30 - 4:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS >= 1330 and stimeS <1630";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{							
								if($row['sroom']=="MULTIMEDIA")
								{	
									$t125 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$Mul2 = $course;
									$Mulc2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$Mulp2 = $prof;
								}else if($row['sroom']=="CONFE RM")
								{
									$t126 = getT3($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$Confe2 = $course;
									$Confec2 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$Confep2 = $prof;
								}
							}	
							
							echo '
							<tr>
								<td style="text-align: center;">'. "1:30 pm".'<br />'. "  to" .'<br />'. "4:30 pm" .'</td>	
								<td style="text-align: center;">'. $t125 .'<br />'. $Mul2 .'<br />'. $Mulc2 .'<br />'. $Mulp2 .'</td>
								<td style="text-align: center;">'. $t126 .'<br />'. $Confe2 .'<br />'. $Confec2 .'<br />'. $Confep2 .'</td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
							</tr>';
							
							///////////////////////////////////////////////////////////////////////////////////////////////1:30 - 4:30 timeframe
							$sql = "SELECT * FROM tbl_schedule where sem = '$csem' and schoolYear='$sy' and sday='$day' and stimeS >= 1330 and stimeS <1630";
							$query = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($query))
							{							
								if($row['sroom']=="MULTIMEDIA")
								{	
									$t127 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$Mul3 = $course;
									$Mulc3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$Mulp3 = $prof;
								}else if($row['sroom']=="CONFE RM")
								{
									$t128 = getT4($row['stimeS'],$row['stimeE']);
									$course = getCourse($row['courseID'])." ".$row['cyear']."-".$row['csection'];
									$Confe3 = $course;
									$Confec3 = $row['scode'];
									$prof = getProf($row['scode'],$row['currID'],$row['courseID'],$sy,$row['csection'],$row['cyear'],$csem);
									$Confep3 = $prof;
								}
							}	
							
							echo '
							<tr>
								<td style="text-align: center;">'. "4:30 pm".'<br />'. "  to" .'<br />'. "7:30 pm" .'</td>	
								<td style="text-align: center;">'. $t127 .'<br />'. $Mul3 .'<br />'. $Mulc3 .'<br />'. $Mulp3 .'</td>
								<td style="text-align: center;">'. $t128 .'<br />'. $Confe3 .'<br />'. $Confec3 .'<br />'. $Confep3 .'</td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
								<td style="text-align: center;"></td>
							</tr>';
							
						echo'</tbody>
						</table>';
						}	
						
						function getT1($ts,$te)
						{
							$t = "";
							if($ts <> 730 or $te <> 1030)
							{
								if($ts <>"" or $te<>"")
								{
									$t = to12Hr($ts) ."-". to12Hr($te);
								}
							}
							return $t;
						}
						function getT2($ts,$te)
						{
							$t = "";
							if($ts <> 1030 or $te <> 1330)
							{
								if($ts <>"" or $te<>"")
								{
									$t = to12Hr($ts) ."-". to12Hr($te);
								}
							}
							return $t;
						}
						function getT3($ts,$te)
						{
							$t = "";
							if($ts <> 1330 or $te <> 1630)
							{
								if($ts <>"" or $te<>"")
								{
									$t = to12Hr($ts) ."-". to12Hr($te);
								}
							}
							return $t;
						}
						function getT4($ts,$te)
						{
							$t = "";
							if($ts <> 1630 or $te <> 1930)
							{
								if($ts <>"" or $te<>"")
								{
									$t = to12Hr($ts) ."-". to12Hr($te);
								}
							}
							return $t;
						}
						
						function getD($day)
						{
							$d = "";
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
							}return $d;
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

						function getProf($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$prof = getName($row['sprof']);
							return $prof;
						}
						
						function getTime($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem)
						{
							include("config.php");
							$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							if($row['stimeS']<>0){
								$time = to12Hr($row['stimeS']) . '-' . to12Hr($row['stimeE']);
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
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($result)){
								$Name = substr($row['FName'],0,1) .'. '. $row['LName'];
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

