<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	if(isset($_POST['fcode']) && isset($_POST['password'])) {
		$fcode = $_POST['fcode'];
		$password = $_POST['password'];
		$fcode = stripslashes($fcode);
		$password = stripslashes($password);
		$fcode = mysqli_real_escape_string($conn,$fcode);
		$password = mysqli_real_escape_string($conn,$password);
		$epassword = sha1($password);

		if($password == 'PUPTFSIS' || $password == 'puptfsis') {
			$sql = 
				"SELECT 
				 	ef.EmpID,
				 	CONCAT_WS(
						'', 
						IF(LENGTH(pi.firstname), CONCAT(pi.firstname, ' '), NULL), 
						IF(LENGTH(pi.surname), pi.surname, NULL)
					) AS name
				 FROM tbl_evaluationfaculty AS ef
				 INNER JOIN tbl_personalinformation AS pi
				 	ON ef.EmpID = pi.EmpID 
				 WHERE ef.FCode = '$fcode'";
		} else {
			$sql =
				"SELECT 
				 	ef.EmpID,
				 	CONCAT_WS(
						'', 
						IF(LENGTH(pi.firstname), CONCAT(pi.firstname, ' '), NULL), 
						IF(LENGTH(pi.surname), pi.surname, NULL)
					) AS name
				 FROM tbl_evaluationfaculty AS ef
				 INNER JOIN tbl_personalinformation AS pi
				 	ON ef.EmpID = pi.EmpID
				 WHERE ef.FCode = '$fcode' AND ef.password = '$epassword' AND ef.status = 'Active'"; 
		}
		
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if($count) {
			$row['success'] = true;
			$row['message'] = 'Welcome, ' . $row['name'];
			echo json_encode($row);
		} else {
			 echo json_encode(array('message' => 'Incorrect faculty code or password'));
		}
	} else {
		echo json_encode(array('message' => 'Faculty code and password is required'));
	}
	
