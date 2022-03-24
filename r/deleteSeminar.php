<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	if(isset($_POST['id'])) {
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$old_path = '';

		$sql = 
			"SELECT path
			 FROM tbl_tprograms
			 WHERE ID = '$id'";
		
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
			"DELETE FROM tbl_tprograms 
			 WHERE ID = '$id'";

		$result = mysqli_query($conn,$sql);

		if($result) {
			echo json_encode(array('success' => true));
		}
	} else {
		echo json_encode(array('message' => 'Please provide all the required field'));
	}
