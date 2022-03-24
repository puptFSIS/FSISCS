<?php
	session_start();
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
	$cat = $_GET['cat'];
	$valid = checkPrefSched($day, $timeS, $timeE, $profName);
	if($valid)
	{
		$sql = "SELECT * FROM tbl_schedule WHERE currID= '$currID' and courseID = '$courseID' and cyear = '$cyear' and scode = '$scode' and schoolYear = '$sy' and csection = '$sec'";
		$result = mysqli_query($conn,$sql);
		$count=mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		if($count>0)
		{


			$sql="UPDATE tbl_schedule SET sday2='$day', sroom2='$roomName', stimeS2 = '$timeS', stimeE2 = '$timeE' where currID='$currID' and courseID = '$courseID' and cyear = '$cyear' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
			$result=mysqli_query($conn,$sql);
			header("Location: index.php?r=administrator/preScheduling&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&cat=$cat");
			mysqli_close();
		}
		else
		{
			$sql = "INSERT INTO tbl_schedule VALUES ('$currID','$courseID','$sec','$cyear','$scode','$title','$units','$lec','$lab','$day','$timeS','$timeE','$roomName','$profName','$sem','$sy','','','','')";
			$result = mysqli_query($conn,$sql);
			if($result)
			{
			header("Location: index.php?r=administrator/preScheduling&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&cat=$cat'");
			mysqli_close($conn);
			}
		}
	}
	else
	{
		echo"
			<script>
			window.location.replace('index.php?r=administrator/preScheduling&currID=$currID&courseID=$courseID&sem=$sem&sy=$sy&sec=$sec&cat=$cat');
			alert('Conflict with another schedule!');
			</script>";
			mysqli_close($conn);	
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
	
	function checkPrefSched($day, $timein, $timeout, $fcode)
	{
		include("config.php");
		$courseID = $_GET['courseID'];
		$cyear = $_GET['cyear'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$day = $_POST['sday'];
		$timeS = $_POST['timeS'];
		$timeE = $_POST['timeE'];
		$roomName = $_POST['roomName'];
		$profName = $_POST['profName'];
		$sql = "SELECT * FROM tbl_schedule WHERE sday='$day' and sem='$sem' and schoolYear='$sy'";
		$result = mysqli_query($conn,$sql);
		$valid = true;
		while($row=mysqli_fetch_array($result)) 
		{	
			if($roomName <> "")
			{
				if($row['sday']==$day) 
				{
					if($timein > $timeout){
						$valid=false;
					}else if($timein == $timeout){
						$valid=false;
					}else if(($timein == $row['stimeS'] and $cyear == $row['cyear'] and $courseID == $row['courseID']) or ($timein == $row['stimeS'] and $roomName == $row['sroom']) or ($timein == $row['stimeS'] and $profName == $row['sprof'])){
						$valid=false;
					}else if(($timein < $row['stimeS'] and $timeout > $row['stimeS'] and $cyear == $row['cyear'] and $courseID == $row['courseID']) or ($timein < $row['stimeS'] and $timeout > $row['stimeS'] and $roomName == $row['sroom']) or ($timein < $row['stimeS'] and $timeout > $row['stimeS'] and $profName == $row['sprof'])){
						$valid=false;
					}else if(($timein > $row['stimeS'] and $timein < $row['stimeE'] and $cyear == $row['cyear'] and $courseID == $row['courseID']) or ($timein > $row['stimeS'] and $timein < $row['stimeE'] and $roomName == $row['sroom']) or $timein > $row['stimeS'] and $timein < $row['stimeE'] and $profName == $row['sprof']){
						$valid=false;
					}else if(($timein > $row['stimeS'] and $timeout < $row['stimeE'] and $cyear == $row['cyear'] and $courseID == $row['courseID']) or ($timein > $row['stimeS'] and $timeout < $row['stimeE'] and $roomName == $row['sroom']) or ($timein > $row['stimeS'] and $timeout < $row['stimeE'] and $profName == $row['sprof'])){
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
					}else if($timein == $timeout){
						$valid=false;
					}else if(($timein == $row['stimeS'] and $cyear == $row['cyear'] and $courseID == $row['courseID']) or ($timein == $row['stimeS'] and $profName == $row['sprof'])){
						$valid=false;
					}else if(($timein < $row['stimeS'] and $timeout > $row['stimeS'] and $cyear == $row['cyear'] and $courseID == $row['courseID']) or ($timein < $row['stimeS'] and $timeout > $row['stimeS'] and $profName == $row['sprof'])){
						$valid=false;
					}else if(($timein > $row['stimeS'] and $timein < $row['stimeE'] and $cyear == $row['cyear'] and $courseID == $row['courseID']) or $timein > $row['stimeS'] and $timein < $row['stimeE'] and $profName == $row['sprof']){
						$valid=false;
					}else if(($timein > $row['stimeS'] and $timeout < $row['stimeE'] and $cyear == $row['cyear'] and $courseID == $row['courseID']) or ($timein > $row['stimeS'] and $timeout < $row['stimeE'] and $profName == $row['sprof'])){
					$valid=false;
					}
				}
			}
		}
		return $valid;
	}

?>
