<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	$sql = 
		"SELECT *
		 FROM tbl_announcementsfaculty
		 WHERE status = 1
		 ORDER BY date_created DESC";
	
	$result = mysqli_query($conn,$sql);
	$data = array();

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$data[] = array(
			'id' => $row['id'],
			'title' => $row['title'],
			'content' => $row['content'],
			'date_created' => $row['date_created']
		);
	}

	echo json_encode($data);
