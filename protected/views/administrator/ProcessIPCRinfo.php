<?php  
	session_start();
	include("config.php"); 
	
	if(isset($_POST['submit']))
	{
		$m = $_GET['m'];
		$y = $_GET['y'];
		$ifRequired = $_POST['checkbox'];
		$outputs = $_POST['output'];
		$indi = $_POST['indicators'];
		//$accomp = $_POST['accomplishment'];
		$parts = $_POST['part'];
		if($m == "JJ")
		{
			$sql = "INSERT INTO tbl_ipcr1 (if_required,output,indicators,part,month,year) VALUES('".$ifRequired."','".$outputs."','".$indi."','".$parts."','".$m."','".$y."')";
			$result = mysqli_query($conn,$sql);

			 /* Get the latest id inserted in the db that will use to insert to tbl_accomp and use in checking required field */
			//$last_id = mysqli_insert_id($conn);

			//$query = "INSERT INTO tbl_ipcraccomp (id_ipcr1) VALUES ('".$last_id."')";
			//$query_result = mysqli_query($conn,$query);
		} else {
			$sql = "INSERT INTO tbl_ipcr2 (if_required,output,indicators,part,month,year) VALUES('".$ifRequired."','".$outputs."','".$indi."','".$parts."','".$m."','".$y."')";
			$result = mysqli_query($conn,$sql);

			/* Get the latest id inserted in the db that will use to insert to tbl_accomp and use in checking required field */
			//$last_id = mysqli_insert_id($conn);

			//$query = "INSERT INTO tbl_ipcraccomp (id_ipcr2) VALUES ('".$last_id."')";
			//$query_result = mysqli_query($conn,$query);
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