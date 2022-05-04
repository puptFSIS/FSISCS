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
