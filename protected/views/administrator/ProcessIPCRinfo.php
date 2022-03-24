<?php  
	session_start();
	include("config.php");
	
	if(isset($_POST['submit']))
	{
		$m = $_GET['m'];
		$y = $_GET['y'];
		$outputs = $_POST['output'];
		$indi = $_POST['indicators'];
		//$accomp = $_POST['accomplishment'];
		$parts = $_POST['part'];
		if($m == "JJ")
		{
			$sql = "INSERT INTO tbl_ipcr1 (output,indicators,part,month,year) VALUES('".$outputs."','".$indi."','".$parts."','".$m."','".$y."')";
			$result = mysqli_query($conn,$sql);
		} else {
			$sql = "INSERT INTO tbl_ipcr2 (output,indicators,part,month,year) VALUES('".$outputs."','".$indi."','".$parts."','".$m."','".$y."')";
			$result = mysqli_query($conn,$sql);
		}
	}
	if($result)
	{
		if($m == "JJ")
		{
			header('Location: index.php?r=administrator/IPCRcreatejantojune&b=1&m='.$m.'&y='.$y.'');
		} else {
			header('Location: index.php?r=administrator/IPCRcreatejultodec&b=1&m='.$m.'&y='.$y.'');
		}
	}
	mysqli_close($conn);
?> 