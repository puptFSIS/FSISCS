<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$sday = $_POST['sday'];
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
	$day = $_GET['day'];
	$blank = "";
	$currID = $_GET['currID'];
	$valid = checkPrefSched($day, $timeS, $timeE, $profName);
	if($valid)
	{
		$sql = "SELECT * FROM tbl_schedule WHERE currID = '$currID' and courseID = '$courseID' and cyear = '$cyear' and scode = '$scode' and schoolYear = '$sy' and csection = '$sec' and sday = '$day' and sem = '$sem'";
		$result = mysqli_query($conn,$sql);	
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			$sql="UPDATE tbl_schedule SET sday='$sday', stimeS='$timeS', stimeE='$timeE', sroom='$roomName', sprof='$profName' where currID = '$currID' and courseID = '$courseID' and cyear = '$cyear' and scode = '$scode' and sem = '$sem' and schoolYear = '$sy' and csection = '$sec'";
			$result=mysqli_query($conn,$sql);	
			header("Location: index.php?r=administrator/DailySched&sem=$sem&sy=$sy&day=$day");
			mysqli_close($conn);
		}
		
	}
	else
	{
		echo"
			<script>
			window.location.replace('index.php?r=administrator/DailySched&sem=$sem&sy=$sy&day=$day');
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
		$sday = $_POST['sday'];
		$timeS = $_POST['timeS'];
		$timeE = $_POST['timeE'];
		$roomName = $_POST['roomName'];
		$profName = $_POST['profName'];
		$courseID = $_GET['cID'];
		$sql = "SELECT * FROM tbl_schedule WHERE sday='$sday' and sem='$sem' and schoolYear='$sy'";
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
		return $valid;
	}

?>
