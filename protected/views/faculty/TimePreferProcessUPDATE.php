<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	if ((!isset($_POST['sday']) and !isset($_POST['timeS']) and !isset($_POST['timeE']) and !isset($_POST['WholeDay']))) {
		echo"
			<script>
			window.location.replace('index.php?r=faculty/UpdateTimePrefer&sem=".$_GET['sem']."&sy=".$_GET['sy']."&mes=1');
			</script>";
			mysqli_close($conn);
	}
	
	if (isset($_POST['timeS'])) {
		
		$s = explode(":", $_POST['timeS']);
		$stimeS = $s[0].$s[1];
	
	} else {
		$stimeS = "";
	}

	if (isset($_POST['timeE'])) {
		$e = explode(":", $_POST['timeE']);
		$stimeE = $e[0].$e[1];
	} else {
		$stimeE = "";
	}

	$sday = $_POST['sday'];
	$profName = $_POST['profName'];
	$sem = $_GET['sem'];
	$sy = $_GET['sy'];
	$timeID = $_GET['timeID'];
	
	//if Whole Day checkbox is checked
	if (isset($_POST['WholeDay'])) {
		$Whole = 1;

		$valid = checkWholeDay($sday, $profName);

		if($valid == 0)
		{
			$sql = "UPDATE tbl_timepreferences SET sday='$sday', stimeS=0, stimeE=0, Whole_Day=1 WHERE timeID='$timeID'";
			$result = mysqli_query($conn, $sql);
			if($result)
			{
			echo"
			<script>
			window.location.replace('index.php?r=faculty/TimePrefer&sem=".$_GET['sem']."&sy=".$_GET['sy']."&mes=2');
			</script>";
			mysqli_close($conn);
			}
			
		}
		else if($valid == 1)
		{
			echo"
			<script>
			window.location.replace('index.php?r=faculty/UpdateTimePrefer&sem=".$_GET['sem']."&sy=".$_GET['sy']."&mes=1');
			</script>";
			mysqli_close($conn);
		}
	//if the Whole Day checkbox is not checked
	} else {
		$Whole = 0;

		$valid = checkPrefSched($sday, $stimeS, $stimeE, $profName);
		if($valid == 0)
		{
			$sql = "UPDATE tbl_timepreferences SET sday='$sday', stimeS='$stimeS', stimeE='$stimeE', Whole_Day=0, sprof='$profName' WHERE timeID='$timeID'";
			$result = mysqli_query($conn, $sql);
			if($result)
			{
			echo"
			<script>
			window.location.replace('index.php?r=faculty/TimePrefer&sem=".$_GET['sem']."&sy=".$_GET['sy']."&mes=2');
			</script>";
			mysqli_close($conn);
			}

			
		}
		else if($valid == 1)
		{
			echo"
			<script>
			window.location.replace('index.php?r=faculty/UpdateTimePrefer&sem=".$_GET['sem']."&sy=".$_GET['sy']."&timeID=". $timeID ."&mes=1');
			</script>";
			mysqli_close($conn);	
		} else if($valid == 2){
			echo"
			<script>
			window.location.replace('index.php?r=faculty/UpdateTimePrefer&sem=".$_GET['sem']."&sy=".$_GET['sy']."&timeID=". $timeID ."&mes=2');
			</script>";
			mysqli_close($conn);
		} else if($valid == 4){
			echo"
			<script>
			window.location.replace('index.php?r=faculty/UpdateTimePrefer&sem=".$_GET['sem']."&sy=".$_GET['sy']."&timeID=". $timeID ."&mes=3');
			</script>";
			mysqli_close($conn);
		}
	}
	
	function checkPrefSched($day, $timein, $timeout, $fcode)
	{
		$valid = "";	
			
		if(is_null($day) OR is_null($timein) or is_null($timeout) or $day == "" or $timein == "" or $timeout == "")
		{
			$valid = 1;
			
		} else if($timein > $timeout){
			$valid = 2;
			

		} else if($timein == $timeout){
			$valid = 2;
			
		} else if($timein < 730 OR $timeout > 2230){
				$valid = 4;
				
		} else {
			$valid = 0;
		}
		

		return $valid;
	}

	function checkWholeDay($day){
		$valid = "";
			
			
		if(is_null($day))
		{
			$valid = 1;
		} else {
			$valid = 0;
		}
		

		return $valid;
	}

?>
