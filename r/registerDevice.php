<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	if(isset($_POST['empid']) && isset($_POST['registrationid'])) {
		$empid = mysqli_real_escape_string($conn, $_POST['empid']);
		$registrationid = mysqli_real_escape_string($conn, $_POST['registrationid']);

		$sql =
			"SELECT * 
			 FROM tbl_devicefaculty
			 WHERE empid = '$empid' AND registrationid = '$registrationid'";

		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result) == 0) {
			$sql = 
				"INSERT INTO tbl_devicefaculty
				 VALUES (
				 	NULL,
				 	'$empid',
				 	'$registrationid'
			 	 )";

			$result = mysqli_query($conn,$sql);

			if($result) {
				echo json_encode(array('success' => true));
			}
		}
	} else {
		echo json_encode(array('message' => 'Please provide all the required field'));
	}
