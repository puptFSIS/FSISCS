<?php

	require 'database.php';

	if(!empty($_GET)) {
		$serialNumber = $_GET['serialNumber'];

		$sql = "SELECT a.name, 
						 b.equip_id, 
						 b.serial_number, 
						 b.description, 
						 c.username,
						 c.firstname,
						 c.lastname,
						 b.status
				 FROM tbl_category AS a 
				 JOIN tbl_equipments AS b ON a.category_id = b.category_id 
				 JOIN tbl_users AS c ON b.receiver_id = c.user_id 
				 WHERE b.serial_number =".$serialNumber.";";


		$result = mysqli_query($conn, $sql);
		$rows = array();
		
		if(mysqli_num_rows($result) != 0) {
			$rows['status'] = "success";
			while($row = mysqli_fetch_array($result, MYSQL_NUM)) { 
					if($row[7] == 0) {
						$row[7] = "Working";
					} else if($row[7] == 1) {
						$row[7] = "Good Condition";
					} else if($row[7] == 2) {
						$row[7] = "Defective";
					} else if($row[7] == 3) {
						$row[7] = "Damaged";
					} else if($row[7] == 4) {
						$row[7] = "Missing";
					} else if($row[7] == 5) {
						$row[7] = "Transferred";
					} else if($row[7] == 6) {
						$row[7] = "Under Maintenance";
					} else if($row[7] == 7) {
						$row[7] = "For Testing";
					} else if($row[7] == 8) {
						$row[7] = "Condemned";
					} else {
						$row[7] = "n/a";
					}

					$rows['data']['itemDetails'][] = array(
					  'name' => $row[0],
					  'equipId' => $row[1],
					  'serialNumber' => $row[2],
					  'description' => $row[3],
					  'username' => $row[4],
					  'firstname' => $row[5],
					  'lastname' => $row[6],
					  'status' => $row[7],
					);
			}
			echo json_encode($rows);
		} else {
			$rows['status'] = "failed";
			echo json_encode($rows);
		}

	} else {
		$rows['status'] = "failed";
		$rows['message'] = "Empty Request";
		echo json_encode($rows);
	}


	mysqli_close($conn);
?>