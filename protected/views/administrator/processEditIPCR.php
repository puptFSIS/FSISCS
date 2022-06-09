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
		$ifRequired = $_POST['checkbox'];
	
		if($m == "JJ"){
			$sql = "UPDATE tbl_ipcr1 SET if_required='$ifRequired', output='$output', indicators='$indicators' WHERE id = '$id'";
			$result = mysqli_query($conn,$sql);
		} else {
			$sql = "UPDATE tbl_ipcr2 SET if_required='$ifRequired', output='$output', indicators='$indicators' WHERE id = '$id'";
			$result = mysqli_query($conn,$sql);
		}
		
	}
	if($result)
	{	
		if($m == "JJ")
		{
			header('Location: index.php?r=administrator/IPCRcreatejantojune&m='.$m.'&y='.$y.'&mess=2');
		} else {
			header('Location: index.php?r=administrator/IPCRcreatejultodec&m='.$m.'&y='.$y.'&mess=2');
		}
	}
	mysqli_close($conn);

?> 