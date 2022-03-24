<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	if(isset($_POST['empid'])) {
		$empid = mysqli_real_escape_string($conn, $_POST['empid']);

		$sql = 
			"SELECT *
			 FROM tbl_tprograms
			 WHERE EmpID = '$empid'
			 ORDER BY fromy ASC,
			 	FIELD(fromm, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December') ASC,
			 	FIELD(fromd, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31') ASC";
		
		$result = mysqli_query($conn,$sql);
		$data = array();

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[] = array(
				'ID' => $row['ID'],
				'title' => $row['title'],
				'type' => $row['type'],
				'from' => date('m', strtotime($row['fromm'])) . '/' . str_pad($row['fromd'], 2, '0', STR_PAD_LEFT) . '/' . $row['fromy'],
				'to' => date('m', strtotime($row['tom'])) . '/' . str_pad($row['tod'], 2, '0', STR_PAD_LEFT) . '/' . $row['toy'],
				'fromdate' => $row['fromy'] . '-' . date('m', strtotime($row['fromm'])) . '-' . str_pad($row['fromd'], 2, '0', STR_PAD_LEFT),
				'todate' => $row['toy'] . '-' . date('m', strtotime($row['tom'])) . '-' . str_pad($row['tod'], 2, '0', STR_PAD_LEFT),
				'hours' => $row['hours'],
				'conby' => $row['conby'],
				'level' => $row['level'],
				'venue' => $row['venue'],
				'path' => $row['path']
			);
		}

		echo json_encode($data);
	} else {
		echo json_encode(array('message' => 'Please login to continue'));
	}

