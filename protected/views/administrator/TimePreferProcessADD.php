<?php
	session_start();
	include("config.php");
	$EmpID = $_SESSION['CEmpID']; 
	if (!isset($_POST['sday']) and !isset($_POST['timeS']) and !isset($_POST['timeE']) and !isset($_POST['WholeDay'])) {
		echo"
			<script>
			window.location.replace('index.php?r=administrator/AddTimePrefer&mes=1');
			</script>";
			mysqli_close($conn);
	}
	
	if (isset($_POST['timeS'])) {
		$stimeS = $_POST['timeS'];
	} else {
		$stimeS = "";
	}

	if (isset($_POST['timeE'])) {
		$stimeE = $_POST['timeE'];
	} else {
		$stimeE = "";
	}

	$sday = $_POST['sday'];
	$profName = $_POST['profName'];
	$sem = $_POST['sem'];
	$sy = $_POST['sy'];
	
	//if Whole Day checkbox is checked
	if (isset($_POST['WholeDay'])) {
		$Whole = 1;

		$valid = checkWholeDay($sday, $profName);

		if($valid == 0)
		{
				$sql = "INSERT INTO tbl_timepreferences (sday, stimeS, stimeE, Whole_Day, sprof, sem, schoolYear) VALUES ('$sday','','', '$Whole','$profName','$sem','$sy')";
				$result = mysqli_query($conn, $sql);
				if($result)
				{
				
				echo"
				<script>
				window.location.replace('index.php?r=administrator/AddTimePrefer&mes=0');
				</script>";
				mysqli_close($conn);
				}
			
		}
		else if($valid == 1)
		{
			echo"
				<script>
				window.location.replace('index.php?r=administrator/AddTimePrefer&mes=1');
				</script>";
				mysqli_close($conn);	
		} else if($valid == 2){
			echo"
				<script>
				window.location.replace('index.php?r=administrator/AddTimePrefer&mes=2');
				</script>";
				mysqli_close($conn);
		} else if($valid == 3){
			echo"
				<script>
				window.location.replace('index.php?r=administrator/AddTimePrefer&mes=2');
				</script>";
				mysqli_close($conn);
		}
	//if the Whole Day checkbox is not checked
	} else {

		$valid = checkPrefSched($sday, $stimeS, $stimeE, $profName);
		if($valid == 0)
		{
				$sql = "INSERT INTO tbl_timepreferences (sday, stimeS, stimeE, sprof, sem, schoolYear) VALUES ('$sday','$stimeS','$stimeE','$profName','$sem','$sy')";
				$result = mysqli_query($conn, $sql);
				if($result)
				{
				
				echo"
				<script>
				window.location.replace('index.php?r=administrator/AddTimePrefer&mes=0');
				</script>";
				mysqli_close($conn);
				}
			
		}
		else if($valid == 1)
		{
			echo"
				<script>
				window.location.replace('index.php?r=administrator/AddTimePrefer&mes=1');
				</script>";
				mysqli_close($conn);	
		} else if($valid == 2){
			echo"
				<script>
				window.location.replace('index.php?r=administrator/AddTimePrefer&mes=2');
				</script>";
				mysqli_close($conn);
		} else if($valid == 3){
			echo"
				<script>
				window.location.replace('index.php?r=administrator/AddTimePrefer&mes=2');
				</script>";
				mysqli_close($conn);
		}
	}
	
	
	function checkPrefSched($day, $timein, $timeout, $fcode)
	{
		include("config.php");
		$sem = $_POST['sem'];
		$sy = $_POST['sy'];
		$sql = "SELECT * FROM tbl_timepreferences WHERE sem='$sem' and schoolYear='$sy' and sprof = '$fcode'";
		$result = mysqli_query($conn, $sql);
		$valid = "";
		while($row=mysqli_fetch_array($result)) 
		{	
			
			if(is_null($day) OR is_null($timein) or is_null($timeout) or $day == "" or $timein == "" or $timeout == "")
			{
				$valid = 1;
			} else if($timein > $timeout OR $timein == $timeout){
				$valid = 2;

			} else if($day == $row['sday'] AND $timein == $row['stimeS'] AND $timeout == $row['stimeE']){
				$valid = 3;
				continue;
			} else if($day == $row['sday'] AND $row['Whole_Day'] == 1){
				$valid = 3;
				break;
			} else {
				$valid = 0;
			}
		}

		return $valid;
	}

	function checkWholeDay($day, $fcode){
		include("config.php");
		$sem = $_POST['sem'];
		$sy = $_POST['sy'];
		$sql = "SELECT * FROM tbl_timepreferences WHERE sem='$sem' and schoolYear='$sy' and sprof = '$fcode'";
		$result = mysqli_query($conn, $sql);
		$valid = "";
		while($row=mysqli_fetch_array($result)) 
		{	
			
			if(is_null($day))
			{
				$valid = 1;
			} else if(($day == $row['sday'] AND $row['Whole_Day']==1) OR ($day == $row['sday'])){
				$valid = 3;
				continue;
			} else {
				$valid = 0;
			}
		}

		return $valid;
	}

?>
