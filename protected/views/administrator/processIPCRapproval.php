<?php 
	session_start();
	include('config.php');

	if(isset($_POST['btn'],$_POST['m'],$_POST['y'],$_POST['idaccomp'],$_POST['fcode'],$_POST['id'],$_POST['accomp']))
	{
		$btn_value = $_POST['btn'];
		$id = $_POST['id'];
		$accomp = $_POST['accomp'];
		$m = $_POST['m'];
		$y = $_POST['y'];
		$idaccomp = $_POST['idaccomp'];
		$fcode = $_POST['fcode'];

		if(isset($_POST['feedback'])) {
			$feedback = $_POST['feedback'];

			$query = "UPDATE tbl_ipcraccomp SET adminApproval='$btn_value', adminFeedback='$feedback' WHERE idaccomp='$idaccomp'";
	  		$result = mysqli_query($conn,$query);
		} else {
			$sql = "UPDATE tbl_ipcraccomp SET adminApproval='$btn_value', adminFeedback=NULL WHERE idaccomp='$idaccomp'";
	  		$result = mysqli_query($conn,$sql);
		}
	 }
	 if($result)
	  	{
	  		if($btn_value == "Approved")
	  		{
	  			header('Location: index.php?r=administrator/IPCRview&m='.$m.'&y='.$y.'&fcode='.$fcode.'&mess=1');
	  		} else if ($btn_value == "Disapproved")
	  		{
	  			header('Location: index.php?r=administrator/IPCRview&m='.$m.'&y='.$y.'&fcode='.$fcode.'&mess=2');
	  		}
	  	}
?>