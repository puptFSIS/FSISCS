<?php  
	session_start();
	include("config.php");
if(isset($_POST['submit']))
{
	$m = $_GET['m'];
	$y = $_GET['y'];
	$id = $_POST['id'];
	$fcode = $_POST['EmpID'];
	

	$accomplishment = $_POST['accomplishment'];
	
	$sql = "UPDATE tbl_ipcraccomp SET accomplishment='$accomplishment' WHERE id_ipcr1 = '$id' ";
	$result = mysqli_query($conn,$sql);
	
}

//echo $sql;
	if($result)
	{
		header('Location: index.php?r=faculty/IPCRcreatejantojunefaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
	}
	mysqli_close($conn);

?>