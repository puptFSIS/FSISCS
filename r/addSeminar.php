<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	if(isset($_POST['empid']) && isset($_POST['title']) && isset($_POST['type']) && isset($_POST['from']) && isset($_POST['to']) && isset($_POST['hours']) && isset($_POST['conby']) && isset($_POST['level']) && isset($_POST['venue'])) {
		$empid = mysqli_real_escape_string($conn, $_POST['empid']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$type = mysqli_real_escape_string($conn, $_POST['type']);
		$from = explode('-', $_POST['from']);
		$fromy = $from[0];
		$fromm = date('F', mktime(0, 0, 0, $from[1], 10));
		$fromd = $from[2];
		$to = explode('-', $_POST['to']);
		$toy = $to[0];
		$tom = date('F', mktime(0, 0, 0, $to[1], 10));
		$tod = $to[2];
		$hours = mysqli_real_escape_string($conn, $_POST['hours']);
		$conby = mysqli_real_escape_string($conn, $_POST['conby']);
		$level = mysqli_real_escape_string($conn, $_POST['level']);
		$venue = mysqli_real_escape_string($conn, $_POST['venue']);
		$path = null;

		if(isset($_POST['path'])) {
			$upload_dir = 'acccertificates/';
			$path = $upload_dir . mysqli_real_escape_string($conn, $_POST['path']);
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

		if($result) {
			echo json_encode(array('success' => true));
		}
	} else {
		echo json_encode(array('message' => 'Please provide all the required field'));
	}
