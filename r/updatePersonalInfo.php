<?php
	header('Access-Control-Allow-Origin: *');
	include_once('config.php');

	if(
		isset($_POST['empid']) &&
		isset($_POST['surname']) && 
		isset($_POST['firstname']) && 
		isset($_POST['birthday']) && 
		isset($_POST['sex']) && 
		isset($_POST['civilStatus']) && 
		isset($_POST['citizenship']) && 
		isset($_POST['residentialAddress'])
	) {
		$empid         = isset($_POST['empid'])         ? mysqli_real_escape_string($conn, $_POST['empid'])         : '';
		$surname       = isset($_POST['surname'])       ? mysqli_real_escape_string($conn, $_POST['surname'])       : '';
		$firstname     = isset($_POST['firstname'])     ? mysqli_real_escape_string($conn, $_POST['firstname'])     : '';
		$middlename    = isset($_POST['middlename'])    ? mysqli_real_escape_string($conn, $_POST['middlename'])    : '';
		$nameExtension = isset($_POST['nameExtension']) ? mysqli_real_escape_string($conn, $_POST['nameExtension']) : '';
		$birthday_val  = isset($_POST['birthday'])      ? mysqli_real_escape_string($conn, $_POST['birthday'])      : '';
		$birthday      = explode('-', $birthday_val);
		$byear         = $birthday[0];
		$bmonth        = date('F', mktime(0, 0, 0, $birthday[1], 10));
		$bday          = $birthday[2];
		$birthplace    = isset($_POST['birthplace'])    ? mysqli_real_escape_string($conn, $_POST['birthplace'])    : '';
		$sex           = isset($_POST['sex'])           ? mysqli_real_escape_string($conn, $_POST['sex'])           : '';
		$civilStatus   = isset($_POST['civilStatus'])   ? mysqli_real_escape_string($conn, $_POST['civilStatus'])   : '';
		$citizenship   = isset($_POST['citizenship'])   ? mysqli_real_escape_string($conn, $_POST['citizenship'])   : '';
		$height        = isset($_POST['height'])        ? mysqli_real_escape_string($conn, $_POST['height'])        : '';
		$weight        = isset($_POST['weight'])        ? mysqli_real_escape_string($conn, $_POST['weight'])        : '';
		$bloodtype     = isset($_POST['bloodtype'])     ? mysqli_real_escape_string($conn, $_POST['bloodtype'])     : '';
		$residentialAddress = isset($_POST['residentialAddress']) ? mysqli_real_escape_string($conn, $_POST['residentialAddress']) : '';
		$zipcode       = isset($_POST['zipcode'])       ? mysqli_real_escape_string($conn, $_POST['zipcode'])       : '';
		
		$sql = 
			"UPDATE tbl_personalinformation
			 SET 
			 	surname = '$surname',
			 	firstname = '$firstname',
			 	middlename = '$middlename',
			 	nameExtension = '$nameExtension',
			 	bmonth = '$bmonth',
			 	bday = '$bday',
			 	byear = '$byear',
			 	birthplace = '$birthplace',
			 	sex = '$sex',
			 	civilStatus = '$civilStatus',
			 	citizenship = '$citizenship',
			 	height = '$height',
			 	weight = '$weight',
			 	bloodtype = '$bloodtype',
			 	residentialAddress = '$residentialAddress',
			 	zipcode = '$zipcode'
			 WHERE EmpID = '$empid'";

		$result = mysqli_query($conn,$sql);

		if($result) {
			echo json_encode(array('success' => true));
		}
	} else {
		echo json_encode(array('message' => 'Please provide all the required field'));
	}
