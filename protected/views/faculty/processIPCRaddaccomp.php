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

		if($m == "JJ")
		{
			$sql = "INSERT INTO tbl_ipcraccomp (id_ipcr1,accomplishment,FCode,month,year) VALUES('".$id."','".$accomplishment."','".$fcode."','".$m."','".$y."')";
			$result = mysqli_query($conn,$sql);
			
		} else if($m == "JD")
		{
			$sql1 = "INSERT INTO tbl_ipcraccomp (id_ipcr2,accomplishment,FCode,month,year) VALUES('".$id."','".$accomplishment."','".$fcode."','".$m."','".$y."')";
			$result = mysqli_query($conn,$sql1);
		}	
	} 
	if($result)
	{
		if($m == "JJ")
		{
			header('Location: index.php?r=faculty/IPCRcreatejantojunefaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
		} else if($m == "JD")
		{
			header('Location: index.php?r=faculty/IPCRcreatejultodecfaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
		}
	}
	mysqli_close($conn);
?>  