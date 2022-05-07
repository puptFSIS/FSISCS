<?php  
	session_start();
	include("config.php");
if(isset($_POST['submit']))
{
	$m = $_GET['m'];
	$y = $_GET['y'];
	$idaccomp = $_POST['idaccomp'];
	$fcode = $_POST['fcode'];
	$accomplishment = $_POST['accomplishment'];
	
	// echo $m;
	// echo $accomplishment;
	// echo $idaccomp;
	// if($m == "JJ")
	// {
		$sql = "UPDATE tbl_ipcraccomp SET accomplishment='$accomplishment' WHERE idaccomp = '$idaccomp' ";
		$result = mysqli_query($conn,$sql);
	
	// } else if($m == "JD") {
		// $sql = "UPDATE tbl_ipcraccomp SET accomplishment='$accomplishment' WHERE id_ipcr2 = '$id' ";
		// $result = mysqli_query($conn,$sql);
	// }
}

// echo $sql;
	if($result)
	{
		if($m == "JJ")
		{
			header('Location: index.php?r=faculty/IPCRcreatejantojunefaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
		} else if($m == "JD") {
			header('Location: index.php?r=faculty/IPCRcreatejultodecfaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
		}
	}
	mysqli_close($conn);

?>