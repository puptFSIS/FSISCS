<?php
session_start();
include("config.php");
if(isset($_SESSION['user'])) {
	if($_SESSION['user']==1) {

	} else if($_SESSION['user']==0)  {}

	}
 else {
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
<title>Schedule | View Faculty Request </title>
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

<h2 class=underlined-header>Request Form</h2>
<?php
	if(isset($_GET['msg'])) {
	$msg = $_GET['msg'];
		if(isset($_GET['msgType'])) {
			if($_GET['msgType']=="err") {
				echo '
				<div class="box-error">
				  <div class="box-content">
					<p>' . $msg . '!</p>
				  </div>
				</div>
				<br />
				<hr style="margin-top:-5px;"/>
				';
			} else {
				echo '
				<div class="box-info">
				  <div class="box-content">
					<p>' . $msg . '!</p>
				  </div>
				</div>
				<br />
				<hr style="margin-top:-5px;"/>
				';
			}
		}
	} else {

	}
?>
<?php
$currID = $_GET['CurrID'];
$cID = $_GET['courseID'];
$yrlvl = $_GET['cyear'];
$scode = $_GET['scode'];
$sem = $_GET['sem'];
$sy = $_GET['sy'];
$sec = $_GET['sec'];
$sprof= $_GET['sprof'];
$schedID = $_GET['schedID'];
$stitle = getTitle($_GET['scode'], $_GET['courseID']);
$cr = getCourse($_GET['courseID'])." ".$_GET['cyear']." ".$_GET['sec'];
$day = getDay($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem);
$time = getTime($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem);
$room = getRoom($scode,$currID,$cID,$sy,$sec,$yrlvl,$sem);
// Get the stupid variables from the tbl_requestschedule
$requestID = $_GET['requestID'];
?>

<p style="margin-bottom: 9px;">Subject Code:<input id=dummy0 name=dummy0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $scode;?>'/></p><br/>
<p style="margin-bottom: 9px;">Subject Description: <input id=dummy0 name=dummy0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $stitle; ?>'/></p><br/>
<p style="margin-bottom: 9px;">Course: <input id=dummy0 name=dummy0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $cr;?>'/></p><br/>
<p style="margin-bottom: 9px;">Day: <input id=dummy0 name=dummy0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $day; ?>'/></p><br/>
<p style="margin-bottom: 9px;">Time: <input id=dummy0 name=dummy0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $time;?>'/></p><br/>
<p style="margin-bottom: 9px;">Room:<input id=dummy0 name=dummy0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $room;?>'/></p><br/>

<!-- This has been tainted Christian -->
<form
    action="index.php?r=faculty/processrequestschededit&requestID=<?php echo $_GET['requestID'] ?>&sprof=<?php echo $_GET['sprof']?>&currID=<?php echo $_GET['CurrID'];?>&schedID=<?php echo $_GET['schedID']; ?>&courseID=<?php echo $_GET['courseID'];?>&cyear=<?php echo $_GET['cyear'];?>&scode=<?php echo $_GET['scode'];?>&sem=<?php echo $_GET['sem'];?>&sy=<?php echo $_GET['sy'];?>&sec=<?php echo $_GET['sec'];?>&title=<?php echo $_GET['title'];?>&units=<?php echo $_GET['units'];?>&lec=<?php echo $_GET['lec'];?>&lab=<?php echo $_GET['lab'];?>"
    method="POST"
    enctype="multipart/form-data">

<h2>Change To</h2>
<?php
$sql = "SELECT * FROM tbl_requestschedule WHERE request_id =".$requestID;
$result = mysqli_query($conn, $sql);

// Do the stupid query and place them inside the row variable
while($row = mysqli_fetch_array($result))
{
    // Place the variables in a request variable
    $rschedID = $row['schedID'];
    $rcurrID = $row['currID'];
    $rcourseID = $row['courseID'];
    $rcsection = $row['csection'];
    $rcyear = $row['cyear'];
    $rscode = $row['scode'];
    $rstitle = $row['stitle'];
    $runits = $row['units'];
    $rlec = $row['lec'];
    $rlab = $row['lab'];
    $rsday = $row['sday'];
    $rstimeS = $row['stimeS'];
    $rstimeE = $row['stimeE'];
    $rsroom = $row['sroom'];
    $rsprof = $row['sprof'];
    $rsem = $row['sem'];
    $rschoolYear = $row['schoolYear'];
    $rstatus = $row['status'];
    $rdatemodified = $row['datemodified'];
    $rdaterequested = $row['daterequested'];
    $rsday2 = $row['sday2'];
    $rstimeS2 = $row['stimeS2'];
    $rstimeE2 = $row['stimeE2'];
    $rsroom2 = $row['sroom2'];
    $ruploaded_file = $row['uploaded_file'];
}


?>

<p style="margin-bottom: 9px;">Subject Code:
    <input id=dummy0 name=dummy0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $scode;?>'/>
</p>
<br/>
<p style="margin-bottom: 9px;">Subject Description:
    <input id=dummy0 name=dummy0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $stitle; ?>'/>
</p>
<br/>
<p style="margin-bottom: 9px;">Course:
    <input id=dummy0 name=dummy0 type=text style="width: 62%; margin-top: -28px; margin-left: 20%;" disabled="disabled" value='<?php echo $cr;?>' />
</p>
<br/>

<p style="margin-bottom: 9px;">*Day:
<select name="sday" style="width: 62%; margin-top: -28px; margin-left: 20%;">
	<?php
		$blank = "";
		$d1 = "M";
		$d2 = "T";
		$d3 = "W";
		$d4 = "TH";
		$d5 = "F";
		$d6 = "S";
		$d = "";
		$currID = $_GET['CurrID'];
		$schedID = $_GET['schedID'];
		$cID = $_GET['courseID'];
		$yrlvl = $_GET['cyear'];
		$scode = $_GET['scode'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$sec = $_GET['sec'];
		$araw = "";

		$sql2="SELECT * FROM tbl_internaschedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
		$result2 = mysqli_query($conn, $sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$araw = $row2['sday'];
		}

		if($araw <> "")
		{
                    $araw = $rsday;
                    echo '<option value = "'.$araw.'" selected>'. $araw .'</option>';
		}
		else
		{
			echo'
				<option value="'. $blank .'"></option>
			';
		}

		for($day=1;$day<=6;$day++)
		{
			if($day==1)
			{
				$d = $d1;
			}
			elseif($day==2)
			{
				$d = $d2;
			}
			elseif($day==3)
			{
				$d = $d3;
			}
			elseif($day==4)
			{
				$d = $d4;
			}
			elseif($day==5)
			{
				$d = $d5;
			}
			elseif($day==6)
			{
				$d = $d6;
			}
			echo '<option value = "'.$d.'">'. $d .'</option>';
		}
	?>
</select>
</p>
<br/>
<p style="margin-bottom: 9px;">*Time Start:
<select name="timeS" style="width: 62%; margin-top: -28px; margin-left: 20%;">
    <?php
    $currID = $_GET['CurrID'];
    $cID = $_GET['courseID'];
    $yrlvl = $_GET['cyear'];
    $scode = $_GET['scode'];
    $sem = $_GET['sem'];
    $sy = $_GET['sy'];
    $sec = $_GET['sec'];
    $start = "";
    $sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
    $result2 = mysqli_query($conn, $sql2);
    while($row2 = mysqli_fetch_array($result2))
    {
	$start = $row2['stimeS'];
    }

    if($start <> "")
    {
        // Previous code
        // echo '<option value="'. $start .'">'. to12Hr($start) .'</option>';
        $start = $rstimeS;
        echo '<option value="'. $start .'">'. to12Hr($start) .'</option>';
    }
    else
    {
	echo'
				<option value="'. $blank .'"></option>
			        ';
    }

    for($ctime=700;$ctime<=2200;) {
	echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
	if($ctime%100==0) {
	    $ctime = $ctime + 30;
	} else {
	    $ctime = $ctime + 70;
	}
    }
    ?>
</select>
</p>
<br/>
<p style="margin-bottom: 9px;">*Time End:
<select name="timeE" style="width: 62%; margin-top: -28px; margin-left: 20%;">
	<?php
		$currID = $_GET['CurrID'];
		$cID = $_GET['courseID'];
		$yrlvl = $_GET['cyear'];
		$scode = $_GET['scode'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$sec = $_GET['sec'];
		$end = "";
		$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
		$result2 = mysqli_query($conn, $sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$end = $row2['stimeE'];
		}

		if($end <> "")
		{
                    // echo '<option value="'. $end .'">'. to12Hr($end) .'</option>';
                    $end = $rstimeE;
                    echo '<option value="'. $end .'">'. to12Hr($end) .'</option>';
		}
		else
		{
			echo'
				<option value="'. $blank .'"></option>
			';
		}
		for($ctime=700;$ctime<=2200;) {
			echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
			if($ctime%100==0) {
				$ctime = $ctime + 30;
			} else {
				$ctime = $ctime + 70;
			}
		}
	?>
</select>
</p><br/>
<p style="margin-bottom: 9px;">*Room:
			<select name="roomName" style="width: 62%; margin-top: -28px; margin-left: 20%;">';
			<?php $currID = $_GET['CurrID'];
			$cID = $_GET['courseID'];
			$yrlvl = $_GET['cyear'];
			$scode = $_GET['scode'];
			$sem = $_GET['sem'];
			$sy = $_GET['sy'];
			$sec = $_GET['sec'];
			$rm = "";
			$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
			$result2 = mysqli_query($conn, $sql2);
			while($row2 = mysqli_fetch_array($result2))
			{
				$rm = $row2['sroom'];
			}

			if($rm <> "")
			{
                            // echo '<option value="'. $rm .'">'. $rm .'</option>';
                            $rm = $rsroom;
                            echo '<option value="'. $rm .'">'. $rm .'</option>';

			}
			else
			{
				echo'
					<option value="'. $blank .'"></option>
				';
			}
			$sql="SELECT * FROM tbl_room";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_array($result))
			{
				echo '
					<option value="'. $row['roomName'] .'"> '. $row['roomName'] .'</option>
				';
			}

			echo'
				</select>
				</p>
			';

?>
</select>
</p>
<p style="margin-bottom: 9px;">
<select name="profName" style="width: 62%; margin-top: -28px; margin-left: 20%; visibility: hidden;">
	<?php
		$currID = $_GET['CurrID'];
		$cID = $_GET['courseID'];
		$yrlvl = $_GET['cyear'];
		$scode = $_GET['scode'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$sec = $_GET['sec'];
		$prof = "";
		$blank = "";




		$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
		$result2 = mysqli_query($conn, $sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$prof = $row2['sprof'];
		}

		if($prof <> "")
		{
			echo'
				<option value="'. $prof .'"> '. getName($prof)  .'</option>
			';
		}
		else
		{
			$sql2="SELECT * FROM tbl_subjpreferences where scode = '$scode' and sem = '$sem' and schoolYear = '$sy'";
			$result2 = mysqli_query($conn, $sql2);
			while($row2 = mysqli_fetch_array($result2))
			{
				$prof = $row2['sprof'];
				echo'
				<option value="'. $prof .'"> '. getName($prof)  .'</option>
			';
			}
		}

		$sql="SELECT * FROM tbl_evaluationfaculty order by LName ASC";
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($result))
		{
			echo '
				<option value="'. $row['FCode'] .'"> '. $row['LName'] .', '. $row['FName'] .'</option>
			';
		}
	?>
</select>
</p>

<?php
	$day2 = "";
	$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
	$result2 = mysqli_query($conn, $sql2);
	while($row2 = mysqli_fetch_array($result2))
	{
		$day2 = $row2['sday2'];
	}
		if($day2<>"")
		{
		/////////////////////////////////////////// DAY //////////////////////////////////////////////
		echo'
			<br />
			<br />
			<p>DAY2</p>
			<p style="margin-bottom: 9px;">*Day2:
			<select name="sday2" style="width: 470px; margin-top: -28px; margin-left: 15%;">';

			$blank = "";
			$d1 = "M";
			$d2 = "T";
			$d3 = "W";
			$d4 = "TH";
			$d5 = "F";
			$d6 = "S";
			$d = "";
			$currID = $_GET['CurrID'];
			$cID = $_GET['courseID'];
			$yrlvl = $_GET['cyear'];
			$scode = $_GET['scode'];
			$sem = $_GET['sem'];
			$sy = $_GET['sy'];
			$sec = $_GET['sec'];
			$araw = "";

			$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
			$result2 = mysqli_query($conn, $sql2);
			while($row2 = mysqli_fetch_array($result2))
			{
				$araw = $row2['sday2'];
			}

			if($araw <> "")
			{
                            // echo '<option value = "'.$araw.'">'. $araw .'</option>';
                            $araw = $rsday2;
                            echo '<option value = "'.$araw.'" selected>'. $araw .'</option>';
                        }
			else
			{
				echo'
					<option value="'. $blank .'"></option>
				';
			}

			for($day=1;$day<=6;$day++)
			{
				if($day==1)
				{
					$d = $d1;
				}
				elseif($day==2)
				{
					$d = $d2;
				}
				elseif($day==3)
				{
					$d = $d3;
				}
				elseif($day==4)
				{
					$d = $d4;
				}
				elseif($day==5)
				{
					$d = $d5;
				}
				elseif($day==6)
				{
					$d = $d6;
				}
				echo '<option value = "'.$d.'">'. $d .'</option>';
			}
		echo'
			</select>
			</p>
		';
		////////////////////////////////////////////// START TIME /////////////////////////////////////
		echo'
			<p style="margin-bottom: 9px;">*Time Start:
			<select name="timeS2" style="width: 470px; margin-top: -28px; margin-left: 15%;">';
			$currID = $_GET['CurrID'];
			$cID = $_GET['courseID'];
			$yrlvl = $_GET['cyear'];
			$scode = $_GET['scode'];
			$sem = $_GET['sem'];
			$sy = $_GET['sy'];
			$sec = $_GET['sec'];
			$start = "";
			$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
			$result2 = mysqli_query($conn, $sql2);
			while($row2 = mysqli_fetch_array($result2))
			{
				$start = $row2['stimeS2'];
			}

			if($start <> "")
			{
                            $start = $rstimeS2;
                            echo '<option value="'. $start .'">'. to12Hr($start) .'</option>';
			}
			else
			{
				echo'
					<option value="'. $blank .'"></option>
				';
			}

			for($ctime=700;$ctime<=2200;) {
				echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
				if($ctime%100==0) {
					$ctime = $ctime + 30;
				} else {
					$ctime = $ctime + 70;
				}
			}
		echo'
			</select>
			</p>
		';
		////////////////////////////////////////////// END TIME /////////////////////////////////////
		echo'
			<p style="margin-bottom: 9px;">*Time End:
			<select name="timeE2" style="width: 470px; margin-top: -28px; margin-left: 15%;">';
			$currID = $_GET['CurrID'];
			$cID = $_GET['courseID'];
			$yrlvl = $_GET['cyear'];
			$scode = $_GET['scode'];
			$sem = $_GET['sem'];
			$sy = $_GET['sy'];
			$sec = $_GET['sec'];
			$end = "";
			$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
			$result2 = mysqli_query($conn, $sql2);
			while($row2 = mysqli_fetch_array($result2))
			{
				$end = $row2['stimeE2'];
			}

			if($end <> "")
			{
                            $end = $rstimeE2;
                            echo '<option value="'. $end .'">'. to12Hr($end) .'</option>';
			}
			else
			{
				echo'
					<option value="'. $blank .'"></option>
				';
			}

			for($ctime=700;$ctime<=2200;) {
				echo '<option value="'. $ctime .'">'. to12Hr($ctime) .'</option>';
				if($ctime%100==0) {
					$ctime = $ctime + 30;
				} else {
					$ctime = $ctime + 70;
				}
			}
		echo'
			</select>
			</p>
		';
		////////////////////////////////////////////// ROOM /////////////////////////////////////
		echo'
			<p style="margin-bottom: 9px;">*Room:
			<select name="roomName2" style="width: 470px; margin-top: -28px; margin-left: 15%;">';
			$currID = $_GET['CurrID'];
			$cID = $_GET['courseID'];
			$yrlvl = $_GET['cyear'];
			$scode = $_GET['scode'];
			$sem = $_GET['sem'];
			$sy = $_GET['sy'];
			$sec = $_GET['sec'];
			$rm = "";
			$sql2="SELECT * FROM tbl_schedule where currID = '$currID' and courseID = '$cID' and cyear = '$yrlvl' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
			$result2 = mysqli_query($conn, $sql2);
			while($row2 = mysqli_fetch_array($result2))
			{
				$rm = $row2['sroom2'];
			}

			if($rm <> "")
			{
                            $rm = $rsroom2;
                            echo '<option value="'. $rm .'">'. $rm .'</option>';
			}
			else
			{
				echo'
					<option value="'. $blank .'"></option>
				';
			}
			$sql="SELECT * FROM tbl_room";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_array($result))
			{
				echo '
					<option value="'. $row['roomName'] .'"> '. $row['roomName'] .'</option>
				';
			}

			echo'
				</select>
				</p>
			';
		}

?>

<!-- Show current file uploaded -->
<p>
    Current File Uploaded: 
    <input type="text" style="width: 62%; margin-top: -28px; margin-left: 20%;" value="<?php echo $ruploaded_file; ?>" disabled>
</p>

<!-- input form for uploading file -->
<p>
    <label for="file-upload">File Upload</label>
    <input id="file-upload" type="file" name="file_upload" style="width: 62%; margin-top: -28px; margin-left: 20%;">
</p>

<!-- This is the input for request... Tainted by Christian -->
<input type="submit" value="Request" style="margin-left:450px;"></input>

</form>

<?php function getTitle($code,$cID)
						{
							$sql = "SELECT * FROM tbl_subjectload WHERE scode ='$code' and courseID = '$cID'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$title = $row['stitle'];
							return $title;
						}

						function getLec($code,$cID)
						{
							$sql = "SELECT * FROM tbl_subjectload WHERE scode ='$code' and courseID = '$cID'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$lec = $row['hrs_lec'];
							return $lec;
						}

						function getLab($code,$cID)
						{
							$sql = "SELECT * FROM tbl_subjectload WHERE scode ='$code' and courseID = '$cID'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$lab = $row['hrs_lab'];
							return $lab;
						}

						function getCourse($ccode)
						{
							$sql = "SELECT * FROM tbl_course WHERE course ='$ccode'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$code = $row['course_code'];
							return $code;
						}

						function getDay($scode,$currID,$cID,$sy,$sec)
						{
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
							$sql ="SELECT * FROM tbl_schedule WHERE scode ='$scode' AND currID = '$currID' AND cyear = '$yrlvl' AND sem = '$sem' AND schoolYear = '$sy' AND courseID = '$cID' AND csection = '$sec'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$prof = getName($row['sprof']);
							return $prof;
						}



						function getTime($scode,$currID,$cID,$sy,$sec)
						{
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
<!-- End - Video -HTML5 -->
<br/>

<!-- End - Showcase gallery -->
</div>
<!-- End - Page content -->
<!-- Page sidebar -->

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
