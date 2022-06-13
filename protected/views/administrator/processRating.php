<?php 
	session_start();
	include("config.php");

	if(isset($_POST['submit']))
	{
		$m = $_POST['m'];
		$y = $_POST['y'];
		$id = $_POST['id'];
		$idaccomp = $_POST['idaccomp'];
		$accomp = $_POST['accomp'];
		$fcode = $_POST['fcode'];
		$Q1 = $_POST['quality'];
		$E2 = $_POST['efficiency'];
		$T3 = $_POST['timeliness'];
		$A4 = $_POST['average'];

		if($A4 == NULL)
		{
			header('Location: index.php?r=administrator/IPCRevaluation&m='.$m.'&y='.$y.'&id='.$id.'&idaccomp='.$idaccomp.'&fcode='.$fcode.'&accomp='.$accomp.'&mess=1');
		} elseif($A4 != NULL) {
			$query = "UPDATE tbl_ipcraccomp SET rating_quality = '$Q1', rating_efficiency = '$E2', rating_timeliness = '$T3', rating_average = '$A4' WHERE idaccomp = '$idaccomp'";
			$query_result = mysqli_query($conn,$query);

			if($query_result) {
				// header('Location: index.php?r=administrator/IPCRevaluation&m='.$m.'&y='.$y.'&id='.$id.'&idaccomp='.$idaccomp.'&fcode='.$fcode.'&accomp='.$accomp.'');
				header('Location: index.php?r=administrator/IPCRevaluation&m='.$m.'&y='.$y.'&id='.$id.'&idaccomp='.$idaccomp.'&fcode='.$fcode.'&accomp='.$accomp.'&mess=2');
			}
			mysqli_close($conn);
		}
	}
	
?>