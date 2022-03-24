<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['type']) && isset($_POST['fromdate']) && isset($_POST['todate']) && isset($_POST['hours']) && isset($_POST['conby']) && isset($_POST['level']) && isset($_POST['venue'])) {
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$type = mysqli_real_escape_string($conn, $_POST['type']);
		$from = explode('-', $_POST['fromdate']);
		$fromy = $from[0];
		$fromm = date('F', mktime(0, 0, 0, $from[1], 10));
		$fromd = $from[2];
		$to = explode('-', $_POST['todate']);
		$toy = $to[0];
		$tom = date('F', mktime(0, 0, 0, $to[1], 10));
		$tod = $to[2];
		$hours = mysqli_real_escape_string($conn, $_POST['hours']);
		$conby = mysqli_real_escape_string($conn, $_POST['conby']);
		$level = mysqli_real_escape_string($conn, $_POST['level']);
		$venue = mysqli_real_escape_string($conn, $_POST['venue']);
		if(isset($_POST['path'])) {
			$upload_dir = 'acccertificates/';
			$path = $upload_dir . mysqli_real_escape_string($conn, $_POST['path']);
			$old_path = '';

			$sql = 
				"SELECT path
				 FROM tbl_tprograms
				 WHERE ID = '$id'";
			
			$result = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($result);

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
				"UPDATE tbl_tprograms
				 SET 
				 	title = '$title',
				 	type = '$type',
				 	fromm = '$fromm',
				 	fromd = '$fromd',
				 	fromy = '$fromy',
				 	tom = '$tom',
				 	tod = '$tod',
				 	toy = '$toy',
				 	hours = '$hours',
				 	conby = '$conby',
				 	level = '$level',
				 	venue = '$venue',
				 	path = '$path'
				 WHERE ID = '$id'";
		} else {
			$sql = 
				"UPDATE tbl_tprograms
				 SET 
				 	title = '$title',
				 	type = '$type',
				 	fromm = '$fromm',
				 	fromd = '$fromd',
				 	fromy = '$fromy',
				 	tom = '$tom',
				 	tod = '$tod',
				 	toy = '$toy',
				 	hours = '$hours',
				 	conby = '$conby',
				 	level = '$level',
				 	venue = '$venue'
				 WHERE ID = '$id'";
		}

		$result = mysqli_query($conn,$sql);

		if($result) {
			echo json_encode(array('success' => true));
		}
	} else {
		echo json_encode(array('message' => 'Please provide all the required field'));
	}
