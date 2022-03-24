<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	if(isset($_POST['empid']) && isset($_POST['path'])) {
		$empid = mysqli_real_escape_string($conn, $_POST['empid']);
		
		$upload_dir = 'accpictures/';
		$path = $upload_dir . mysqli_real_escape_string($conn, $_POST['path']);
		$old_path = '';

		$sql = 
			"SELECT path
			 FROM tbl_profpic
			 WHERE EmpID = '$empid'";
		
		$result = mysqli_query($conn,$sql);

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			if(!empty($row['path'])) {
				$old_path  = '../' . $row['path'];
			}
		}

		if(!empty($old_path)) {
			if (file_exists($old_path)) {
		        unlink($old_path);
		    }
		}

		$sql = 
			"UPDATE tbl_profpic
			 SET path = '$path'
			 WHERE EmpID = '$empid'";

		$result = mysqli_query($conn,$sql);

		if($result) {
			echo json_encode(array('success' => true));
		}
	} else {
		echo json_encode(array('message' => 'Please select an image'));
	}
