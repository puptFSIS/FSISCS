<?php
	include("config.php");
	$EmpID= "";
	if(isset($_SESSION['CEmpID'])) {
		$EmpID = $_SESSION['CEmpID'];
	} else {
		die(header("Location: index.php?r=site/index"));
	}
	$sql2 = "SELECT * FROM tbl_evaluationfaculty WHERE EmpID='$EmpID'";
	$result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_array($result2);
	$agencyempno = $row2['empNumber'];
	
	$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn, $sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	$FullName = $row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['nameExtension'];
	$_SESSION['FullName'] = $FullName;
	$surname = $row['surname'];
	$firstname = $row['firstname'];
	$middlename = $row['middlename'];
	$nameextension = $row['nameExtension'];
	$Fcode = $row['FCode'];
	$birthday = $row['birthdate'];
	$month = $row['bmonth'];
	$day = $row['bday'];
	$year = $row['byear'];
	$birthplace = $row['birthplace'];
	$gender = $row['sex'];
	$civilstatus = $row['civilStatus'];
	$citizenship = $row['citizenship'];
	$height = $row['height'];
	$weight= $row['weight'];
	$bloodtype = $row['bloodType'];
	$gsis = $row['GSIS_ID_NO'];
	$pagibig = $row['PAGIBIG_ID_NO'];
	$philhealth = $row['PHILHEALTH_NO'];
	$sss = $row['SSS_NO'];
	$residentialAdd = $row['residentialAddress'];
	$residentialZip = $row['zipCode'];
	$residentialTel = $row['telNo'];
	$permanentAdd = $row['permanentAddress'];
	$permanentZip = $row['pzipCode'];
	$permanentTel = $row['ptelNo'];
	$email = $row['email'];
	$cel = $row['cellNo'];
    $isAdmin = $row['isAdmin'];
       $_SESSION['isAdmin'] = $isAdmin;
    
	$tin = $row['TIN_NO'];
	if($month==1)
		$month = 'January';
	else if($month==2)
		$month = 'February';
	else if($month==3)
		$month = 'March';
	else if($month==4)
		$month = 'April';
	else if($month==5)
		$month = 'May';
	else if($month==6)
		$month = 'June';
	else if($month==7)
		$month = 'July';
	else if($month==8)
		$month = 'August';
	else if($month==9)
		$month = 'September';
	else if($month==10)
		$month = 'October';
	else if($month==11)
		$month = 'November';
	else if($month==12)
		$month = 'December';
?>
