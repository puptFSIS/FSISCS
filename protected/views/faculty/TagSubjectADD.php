<?php
	session_start();
	$EmpID = $_SESSION['FCode']; 
	include("config.php");
	
	$scode = $_GET['scode'];
	$stitle = $_GET['stitle'];	
	$units = $_GET['units'];
	$lec = $_GET['lec'];
	$lab = $_GET['lab'];
	$csem = $_GET['csem'];
	$sy = $_GET['sy'];
	$categoryname = $_GET['categoryname'];
	
	$valid = validation($scode, $EmpID, $csem, $sy);
	// alert('Subject successfully tagged!');
	if($valid)
	{
		$sql="INSERT INTO tbl_subjpreferences (scode,stitle,units,lec,lab,sem,schoolYear, sprof) VALUES ('$scode','$stitle','$units','$lec','$lab','$csem','$sy', '$EmpID')";
		$result=mysqli_query($conn, $sql);
		 echo "<script>
		 window.location.replace('index.php?r=faculty/tagSubjectspage&sy=$sy&sem=$csem&categories=$categoryname&mes=1');
		 ;</script>";

		mysqli_close($conn);
	}
	else
	{
		 
			 echo "<script>
			 
			 window.location.replace('index.php?r=faculty/tagSubjectspage&sy=$sy&sem=$csem&categories=$categoryname&mes=2');
			 </script>";
		 mysqli_close($conn);
	}
	
	function validation($scode, $EmpID, $csem, $sy)
	{
		include("config.php");
		$valid = true;
		$sql = "SELECT * FROM tbl_subjpreferences WHERE sprof = '$EmpID' AND sem = '$csem' AND schoolYear = '$sy'";
		$result = mysqli_query($conn, $sql);
		while($row=mysqli_fetch_array($result))
		{
			if($scode == $row['scode'])
			{
				$valid = false;
				break;	
			}
		}
		return $valid;
	}
	
	
	
?>
