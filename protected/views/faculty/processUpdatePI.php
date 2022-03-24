<?php
	include("config.php");
	session_start();
	$surname = $_POST['surname'];
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$nameextension = $_POST['nameextension'];
	$bmonth = $_POST['bmonth'];
	$bday = $_POST['bday'];
	$byear = $_POST['byear'];

	$birthplace = $_POST['birthplace'];
	$gender = $_POST['gender'];
	$civilstatus = $_POST['cs'];
	$citizenship = $_POST['citizenship'];
	$height = $_POST['height'];
	$weight= $_POST['weight'];
	$bloodtype = $_POST['bloodtype'];
	$gsis = $_POST['gsis'];
	$pagibig = $_POST['pagibig'];
	$philhealth = $_POST['philhealth'];
	$sss = $_POST['sss'];
	$residentialAdd = $_POST['residentialAddress'];
	$residentialZip = $_POST['zipCode'];
	$residentialTel = $_POST['telNo'];
	$permanentAdd = $_POST['permanentAddress'];
	$permanentZip = $_POST['pzipCode'];
	$permanentTel = $_POST['ptelNo'];
	$email = $_POST['email'];
	$cel = $_POST['cellNo'];
	$tin = $_POST['TIN_NO'];
	$EmpID = $_SESSION['CEmpID'];
	$EmpNo = $_POST['agencyempno'];
	$UserID = $_SESSION['FCode'];
	
	$sql="UPDATE tbl_personalinformation SET surname='$surname', firstname='$firstname', middlename='$middlename', nameExtension='$nameextension', bmonth='$bmonth', bday='$bday', byear='$byear', birthplace='$birthplace', sex='$gender', civilStatus='$civilstatus', citizenship='$citizenship', height='$height', weight='$weight', bloodType='$bloodtype', GSIS_ID_NO='$gsis', PAGIBIG_ID_NO='$pagibig', PHILHEALTH_NO='$philhealth', SSS_NO='$sss', TIN_NO='$tin', zipCode='$residentialZip', telNo='$residentialTel', cellNo='$cel', email='$email', residentialAddress='$residentialAdd', permanentAddress='$permanentAdd', pzipCode='$permanentZip', ptelNo='$permanentTel' WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn, $sql);	

	// echo $sql;
	
	$sql1="UPDATE tbl_evaluationfaculty SET empNumber='$EmpNo' WHERE FCode='$UserID'";
	$result1=mysqli_query($conn, $sql1);

	if($result) {
		/*
		$sql1="UPDATE tbl_accounts SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result1=mysqli_query($conn, $sql1);
		
		$sql2="UPDATE tbl_evaluationfaculty SET EmpID='$EmpNo' WHERE FCode='$UserID'";
		$result2=mysqli_query($conn, $sql2);
		
		$sql3="UPDATE tbl_children SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result3=mysql_query($sql3);
		
		$sql4="UPDATE tbl_cse SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result4=mysql_query($sql4);

		$sql5="UPDATE tbl_educationalbackground SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result5=mysql_query($sql5);

		$sql6="UPDATE tbl_faculty SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result6=mysql_query($sql6);
			
		$sql7="UPDATE tbl_familybackground SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result7=mysql_query($sql7);

		$sql8="UPDATE tbl_gov SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result8=mysql_query($sql8);

		$sql9="UPDATE tbl_lastlogin SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result9=mysql_query($sql9);

		$sql10="UPDATE tbl_org SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result10=mysql_query($sql10);

		$sql11="UPDATE tbl_recognition SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result11=mysql_query($sql11);

		$sql12="UPDATE tbl_referred SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result12=mysql_query($sql12);

		$sql13="UPDATE tbl_scholar SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result13=mysql_query($sql13);

		$sql14="UPDATE tbl_seminar SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result14=mysql_query($sql14);

		$sql15="UPDATE tbl_snc SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result15=mysql_query($sql15);

		$sql16="UPDATE tbl_workexperience SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result16=mysql_query($sql16);
		
		$sql17="UPDATE tbl_vwork SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result17=mysql_query($sql17);
		
		$sql18="UPDATE tbl_tprograms SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result18=mysql_query($sql18);
		
		$sql19="UPDATE tbl_skh SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result19=mysql_query($sql19);
		
		$sql20="UPDATE tbl_nadr SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result20=mysql_query($sql20);
		
		$sql21="UPDATE tbl_miao SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result21=mysql_query($sql21);
		
		$sql22="UPDATE tbl_references SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result22=mysql_query($sql22);
		
		$sql23="UPDATE tbl_taxcertificate SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
		$result23=mysql_query($sql23);
		
		$sql24="UPDATE tbl_evaluationfaculty SET userID='$EmpNo' WHERE FCode='$UserID'";
		$result24=mysql_query($sql24);
		
		$_SESSION['CEmpID'] = $EmpNo;
		*/
		header("Location: index.php?r=faculty/pi&msg=Your profile has been updated successfully&type=succ");
	} else {
		header("Location: index.php?r=faculty/pi&msg=Employee ID already used by other faculty member. Please choose other Employee ID&type=err");
	}
?>