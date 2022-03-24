<?php

	require 'database.php';

	if(!empty($_POST)) {
		$status = $_POST['status'];
		$location = $_POST['location'];
		$equip_id = $_POST['equip_id'];

		if($status == "Working") {
			$status = 0;
		} else if ($status == "Good Condition") {
			$status = 1;
		} else if ($status == "Defective") {
			$status = 2;
		} else if ($status == "Damaged") {
			$status = 3;
		} else if ($status == "Missing") {
			$status = 4;
		} else if ($status == "Transferred") {
			$status = 5;
		} else if ($status == "Under Maintenance") {
			$status = 6;
		} else if ($status == "For Testing") {
			$status = 7;
		} else if ($status == "Condemmed") {
			$status = 8;
		} else {
			$status = -1;
		}

		if($location == "DOSTLAB") {
			$location = 9;
		} else if ($location == "ABOITIZ") {
			$location = 10;
		} else if ($location == "REGISTRAR") {
			$location = 12;
		} else if ($location == "DIRECTOR") {
			$location = 13;
		} else if ($location == "HSS") {
			$location = 14;
		} else if ($location == "LIBRARY") {
			$location = 15;
		} else if ($location == "DENTAL") {
			$location = 16;
		} else if ($location == "MEDICAL") {
			$location = 17;
		} else if ($location == "SECURITY") {
			$location = 18;
		} else if ($location == "ACCOUNTING") {
			$location = 19;
		} else if ($location == "HAP") {
			$location = 20;
		} else if ($location == "CSC") {
			$location = 21;
		} else if ($location == "FACULTY") {
			$location = 22;
		} else if ($location == "GUIDANCE") {
			$location = 23;
		} else {
			$location = -1;
		}


		 $sql = "UPDATE tbl_equipments SET receiver_id = ".$location.", status = ".$status.", location = '".$_POST['location']."' WHERE tbl_equipments.equip_id ='".$equip_id."';";


		$retval = mysqli_query($conn, $sql);

		if($retval) {
			$rows['status'] = "success";
			$rows['message'] = "Item Updated Successfully";
			echo json_encode($rows);

		} else {
			$rows['status'] = "failed";
			$rows['message'] = "An Error Occured. Try Again.";
			echo json_encode($rows);
		}
	} else {
	 	$rows['status'] = "failed";
		$rows['message'] = "Empty Request";
		echo json_encode($rows);
	}

	mysqli_close($conn);
?>