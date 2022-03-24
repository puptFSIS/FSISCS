<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	if(isset($_POST['empid'])) {
		$empid = mysqli_real_escape_string($conn, $_POST['empid']);

		$sql = 
			"SELECT
			 	pi.surname,
			 	pi.firstname,
			 	pi.middlename,
			 	pi.nameExtension,
			 	pi.byear,
			 	pi.bmonth,
			 	pi.bday,
			 	pi.birthplace,
			 	pi.sex,
			 	pi.civilStatus,
			 	pi.citizenship,
			 	pi.height,
			 	pi.weight,
			 	pi.bloodtype,
			 	pi.residentialAddress,
			 	pi.zipcode,
			 	pi.telNo,
			 	pi.email,
			 	pi.cellNo,
			 	pi.TIN_NO,
			 	pp.path
			 FROM tbl_evaluationfaculty AS ef
			 LEFT JOIN tbl_personalinformation AS pi
			 	ON ef.EmpID = pi.EmpID 
			 LEFT JOIN tbl_profpic AS pp 
			 	ON pp.EmpID = pi.EmpID 
			 WHERE ef.EmpID = '$empid' AND ef.status = 'Active'";
		
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		$data = array();

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data = array(
				'surname' => $row['surname'],
				'firstname' => $row['firstname'],
				'middlename' => $row['middlename'],
				'nameExtension' => $row['nameExtension'],
				'birthday' => $row['byear'] . '-' . date('m', strtotime($row['bmonth'])) . '-' . str_pad($row['bday'], 2, '0', STR_PAD_LEFT),
				'birthplace' => $row['birthplace'],
				'sex' => $row['sex'],
				'civilStatus' => $row['civilStatus'],
				'citizenship' => $row['citizenship'],
				'height' => $row['height'],
				'weight' => $row['weight'],
				'bloodtype' => $row['bloodtype'],
				'residentialAddress' => $row['residentialAddress'],
				'zipcode' => $row['zipcode'],
				'telNo' => $row['telNo'],
				'email' => $row['email'],
				'cellNo' => $row['cellNo'],
				'TIN_NO' => $row['TIN_NO'],
				'path' => $row['path']
			);
		}

		if($count) {
			$data['success'] = true;
		} 

		echo json_encode($data);
	} else {
		echo json_encode(array('message' => 'Please login to continue'));
	}
