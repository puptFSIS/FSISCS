<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	if(isset($_POST['email'])) {
		$empid  = isset($_POST['empid'])  ? mysqli_real_escape_string($conn, $_POST['empid'])  : '';
		$telNo  = isset($_POST['telNo'])  ? mysqli_real_escape_string($conn, $_POST['telNo'])  : '';
		$email  = isset($_POST['email'])  ? mysqli_real_escape_string($conn, $_POST['email'])  : '';
		$cellNo = isset($_POST['cellNo']) ? mysqli_real_escape_string($conn, $_POST['cellNo']) : '';
		$TIN_NO = isset($_POST['TIN_NO']) ? mysqli_real_escape_string($conn, $_POST['TIN_NO']) : '';

		$sql = 
			"UPDATE tbl_personalinformation
			 SET 
			 	telNo = '$telNo',
			 	email = '$email',
			 	cellNo = '$cellNo',
			 	TIN_NO = '$TIN_NO'
			 WHERE EmpID = '$empid'";

		$result = mysqli_query($conn,$sql);

		if($result) {
			echo json_encode(array('success' => true));
		}
	} else {
		echo json_encode(array('message' => 'Please provide all the required field'));
	}
