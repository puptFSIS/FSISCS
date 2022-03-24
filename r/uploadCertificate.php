<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	if(isset($_FILES['file'])) {
		$upload_dir = "../acccertificates/";
		$file = $upload_dir . basename($_FILES['file']['name']);
		 
		if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
		    echo json_encode(array('success' => true));
		} else {
		    echo json_encode(array('message' => 'There was an error uploading the file, please try again!'));
		}
	} else {
		echo json_encode(array('message' => 'There was an error uploading the file, please try again!'));
	}
	
