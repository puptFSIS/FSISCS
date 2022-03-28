<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	$base = Yii::app()->getBaseUrl();
	include("config.php");
	if(isset($_POST['sday2']))
	{
		$day2 = $_POST['sday2'];
	}else
	{
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
		$roomName2 = $_POST['roomName2'];
	}else
	{
		$roomName2 = "";
	}
	$day = $_POST['sday'];
	$timeS = $_POST['timeS'];
	$timeE = $_POST['timeE'];
	$roomName = $_POST['roomName'];
	$profName = $_POST['profName'];
	$courseID = $_GET['cID'];
	$cyear = $_GET['yrlvl'];
	$scode = $_GET['scode'];
	$sem = $_GET['sem'];
	$sy = $_GET['sy'];
	$sec = $_GET['sec'];
	$cat = $_GET['cat'];
	$blank = "";
	$currID = $_GET['currID'];
	$valid = checkPrefSched($day, $timeS, $timeE, $profName);
	if($valid)
	{
		$sql = "SELECT * FROM tbl_schedule WHERE currID = '$currID' and courseID = '$courseID' and cyear = '$cyear' and scode = '$scode' and schoolYear = '$sy' and csection = '$sec'";
		$result = mysqli_query($conn,$sql);	
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			$sql="UPDATE tbl_schedule SET sday='$day', stimeS='$timeS', stimeE='$timeE', sroom='$roomName', sprof='$profName', sday2 = '$day2', stimeS2 = '$timeS2', stimeE2 = '$timeE2', sroom2 = '$roomName2' where currID = '$currID' and courseID = '$courseID' and cyear = '$cyear' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
			$result=mysqli_query($conn,$sql);	
			header("Location: index.php?r=administrator/PreScheduling&courseID=$courseID&sem=$sem&sy=$sy&cat=$cat");
			mysqli_close($conn);
		}
		
	}
	else
	{
		echo"
			<script>
			window.location.replace('index.php?r=administrator/PreScheduling&courseID=$courseID&sem=$sem&sy=$sy&cat=$cat');
			alert('Conflict with another schedule!');
			</script>";
			mysqli_close($conn);	
	}
	
	function checkPrefSched($day, $timein, $timeout, $fcode)
	{
		include("config.php");
		$cyear = $_GET['yrlvl'];
		$sem = $_GET['sem'];
		$sy = $_GET['sy'];
		$day = $_POST['sday'];
		$timeS = $_POST['timeS'];
		$timeE = $_POST['timeE'];
		$roomName = $_POST['roomName'];
		$profName = $_POST['profName'];
		$courseID = $_GET['cID'];
		$sql = "SELECT * FROM tbl_schedule WHERE sday='$day' and sem='$sem' and schoolYear='$sy'";
		$result = mysqli_query($conn,$sql);	
		$valid = true;
		
		while($row=mysqli_fetch_array($result)) 
		{	
			if($day == $row['sday'] and $timeS == $row['stimeS'] and $timeE == $row['stimeE'] and $profName == $row['sprof'] and $roomName <> $row['sroom'])
			{
				$valid = true;
			}
			else if($roomName <> "")
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
