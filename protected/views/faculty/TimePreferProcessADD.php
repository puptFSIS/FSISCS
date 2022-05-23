<?php
	$dec = 0;
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");

	if (!isset($_POST['sday']) and !isset($_POST['timeS']) and !isset($_POST['timeE']) and !isset($_POST['WholeDay'])) {
		echo"
			<script>
			window.location.replace('index.php?r=faculty/AddTimePrefer&mes=1');
			</script>";
			mysqli_close($conn);
	}
	
	if (isset($_POST['timeS'])) {
		if (empty($_POST['timeS']) or $_POST['timeS'] == "") {
			$dec = 1;

			
		} else {
			$s = explode(":", $_POST['timeS']);
			$stimeS = $s[0].$s[1];
		}
	} else {
		$stimeS = "";
	}

	if (isset($_POST['timeE'])) {

		if (empty($_POST['timeE']) or $_POST['timeE'] == "") {
			$dec = 1;
			
			
		} else {
			$e = explode(":", $_POST['timeE']);
			$stimeE = $e[0].$e[1];
		}
		

	} else {
		$stimeE = "";
	}

	if($dec != 1){
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
					window.location.replace('index.php?r=faculty/AddTimePrefer&mes=0');
					</script>";
					mysqli_close($conn);
					}
				
			}
			else if($valid == 1)
			{
				echo"
					<script>
					window.location.replace('index.php?r=faculty/AddTimePrefer&mes=1');
					</script>";
					mysqli_close($conn);	
			} else if($valid == 2){
				echo"
					<script>
					window.location.replace('index.php?r=faculty/AddTimePrefer&mes=2');
					</script>";
					mysqli_close($conn);
			} else if($valid == 3){
				echo"
					<script>
					window.location.replace('index.php?r=faculty/AddTimePrefer&mes=3');
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
					window.location.replace('index.php?r=faculty/AddTimePrefer&mes=0');
					</script>";
					mysqli_close($conn);
					}
				
			}
			else if($valid == 1)
			{
				echo"
					<script>
					window.location.replace('index.php?r=faculty/AddTimePrefer&mes=1');
					</script>";
					mysqli_close($conn);	
			} else if($valid == 2){
				echo"
					<script>
					window.location.replace('index.php?r=faculty/AddTimePrefer&mes=2');
					</script>";
					mysqli_close($conn);
			} else if($valid == 3){
				echo"
					<script>
					window.location.replace('index.php?r=faculty/AddTimePrefer&mes=3');
					</script>";
					mysqli_close($conn);
			} else if($valid == 4){
				echo"
					<script>
					window.location.replace('index.php?r=faculty/AddTimePrefer&mes=4');
					</script>";
					mysqli_close($conn);
			}
		}
	} else {
		echo"
			<script>
			window.location.replace('index.php?r=faculty/AddTimePrefer&mes=1');
			</script>";
	}

	
	
	
	function checkPrefSched($day, $timein, $timeout, $fcode)
	{
		include("config.php");
		$sem = $_POST['sem'];
		$sy = $_POST['sy'];
		$sql = "SELECT * FROM tbl_timepreferences WHERE (".$timein." BETWEEN stimeS AND stimeE OR ".$timeout." BETWEEN stimeS AND stimeE) AND sem='$sem' and schoolYear='$sy' and sprof = '$fcode'";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);
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
				
		} else if($count != 0){
			$valid = 3;
			
		} else {
			$valid = 0;
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
				break;
			} else {
				$valid = 0;
			}
		}

		return $valid;
	}
?>
