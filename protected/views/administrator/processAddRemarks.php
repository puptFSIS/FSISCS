<?php  
	session_start();
	include("config.php");

	if(isset($_POST['submit']))
	{
		$m = $_POST['m'];
		$y = $_POST['y'];
		$id = $_POST['id'];
		$remarks = $_POST['remarks'];

		//echo $remarks;
		//echo $id;
		$sql = "UPDATE tbl_ipcraccomp SET remarks = '$remarks' WHERE id_ipcr1 = '$id'";
		$result = mysqli_query($conn,$sql);
	}
	if($result)
	{
		header('Location: index.php?r=administrator/IPCRremarks&m='.$m.'&y='.$y.'&id='.$id.'');
	}
	 mysqli_close($conn);
?>