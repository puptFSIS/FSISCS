<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	if(isset($_POST['empid']) && isset($_POST['seminarsoffline'])) {
		$empid = mysqli_real_escape_string($conn, $_POST['empid']);
		$fail = false;
		$data = json_decode($_POST['seminarsoffline'], true);
		for ($i = 0; $i < count($data); $i++) {
			$title = mysqli_real_escape_string($conn, $data[$i]['title']);
			$type = mysqli_real_escape_string($conn, $data[$i]['type']);
			$from = explode('-', $data[$i]['fromdate']);
			$fromy = $from[0];
			$fromm = date('F', mktime(0, 0, 0, $from[1], 10));
			$fromd = $from[2];
			$to = explode('-', $data[$i]['todate']);
			$toy = $to[0];
			$tom = date('F', mktime(0, 0, 0, $to[1], 10));
			$tod = $to[2];
			$hours = mysqli_real_escape_string($conn, $data[$i]['hours']);
			$conby = mysqli_real_escape_string($conn, $data[$i]['conby']);
			$level = mysqli_real_escape_string($conn, $data[$i]['level']);
			$venue = mysqli_real_escape_string($conn, $data[$i]['venue']);
			$path = null;

			if(isset($data[$i]['path'])) {
				$upload_dir = 'acccertificates/';
				$path = $upload_dir . mysqli_real_escape_string($conn, $data[$i]['path']);
			} 

			$sql = 
				"INSERT INTO tbl_tprograms
				 VALUES (
				 	NULL,
				 	'$empid',
				 	'$title',
				 	'$type',
				 	'$fromm',
				 	'$fromd',
				 	'$fromy',
				 	'$tom',
				 	'$tod',
				 	'$toy',
				 	'$hours',
				 	'$conby',
				 	'$level',
				 	'$venue',
				 	'$path'
			 	 )";

			$result = mysqli_query($conn,$sql);
			if(!$result) {
				$fail = true;
			}
		}

		if(!$fail) {
			echo json_encode(array('success' => true));
		}
	} else {
		echo json_encode(array('message' => 'Please provide all the required field'));
	}
