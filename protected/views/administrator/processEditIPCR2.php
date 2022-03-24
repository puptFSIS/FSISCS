<?php 
	session_start();
	include("config.php");

	if(isset($_POST['submit']))
	{
		$m = $_GET['m'];
		$y = $_GET['y'];
		$output = $_POST['output'];
		$id = $_POST['id'];
		$indicators = $_POST['indicators'];
	
	
		$sql = "UPDATE tbl_ipcr2 SET output='$output', indicators='$indicators' WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
	}
	if($result)
	{
		header('Location: index.php?r=administrator/IPCRcreatejultodec&m='.$m.'&y='.$y.'');
	}
	mysqli_close($conn);

?>