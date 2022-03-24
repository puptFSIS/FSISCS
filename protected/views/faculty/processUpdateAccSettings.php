<?php
	session_start();
	$EmpID = $_SESSION['CEmpID'];

	include("config.php");
	
	$action = $_GET['action'];
	$err = 0;

	if($action=="1") {
		$olduser = $_POST['olduser'];
		$newuser1 = $_POST['newuser'];
		if($newuser1==null) {
			header("Location: index.php?r=faculty/cas&msg=Blank username not allowed. Please fill up your new username. &msgType=err");
		} else if($olduser==$newuser1) {
			header("Location: index.php?r=faculty/cas&msg=New username cannot be the same with your current username.&msgType=err");
		} else {
			$same = 0;
			$sql="SELECT * FROM tbl_accounts";
			$result=mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($result)) {
				if($row['userID']==$newuser1) {
					$same = 1;
				}
			}
			if($same==0) {
				$newuser = $newuser1;
				$sql="UPDATE tbl_accounts SET userID='$newuser' WHERE EmpID='$EmpID'";
				$result=mysqli_query($conn, $sql);
				if($result) {
					header("location: index.php?r=faculty/AccSettings&msg=Username has been changed successfully.&msgType=succ");
				} else {
					header("location: index.php?r=faculty/AccSettings&msg=Username not available. Please choose different username.&msgType=succ");
				}
			} else {
				header("Location: index.php?r=faculty/cas&msg=Username unavailable. Please try different username. &msgType=err");
			}
		}
	} else if ($action=="2") {
		$as3 = SHA1($_POST['oldpass']);
		$as4 = SHA1($_POST['newpass']);
		$as5 = SHA1($_POST['repass']);
		if($as3==null || $as4==null || $as5==null) {
			header("Location: index.php?r=faculty/cas&msg.Please fill up all the required fields. &msgType=err");
		} else {
			$sql="SELECT * FROM tbl_accounts WHERE EmpID='$EmpID'";
			$result=mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$opass = $row['password'];
			if($as3==$opass) {
				if($as4==$as5) {
					$sql="UPDATE tbl_accounts SET password='$as4' WHERE EmpID='$EmpID'";
					$result=mysqli_query($conn, $sql);
					header("location: index.php?r=faculty/AccSettings&msg=Password has been changed successfully.&msgType=succ");
				} else {
					header("location: index.php?r=faculty/AccSettings&msg=New password and re-type password mismatch. Please make sure you type it correctly.&msgType=err");
				}
			} else {
				header("location: index.php?r=faculty/AccSettings&msg=Old password didn't match. Please try again.&msgType=succ");
			}
		}
	} else if ($action=="3") {
		$as6 = $_POST['as6'];
		$as7 = $_POST['as7'];
		$sql = "UPDATE tbl_accounts SET question = '$as6', answer = '$as7' WHERE EmpID='$EmpID'";
		$result = mysqli_query($conn, $sql);
		if($result) {
			header("Location: index.php?r=faculty/AccSettings&msg=Your security question and secret answer has been set successfully.&msgType=succ");
		} else {
			header("Location: index.php?r=faculty/AccSettings&msg=Your security question and secret answer has not been set.&msgType=succ");
		}
	} else if ($action=="4") {
		$EmpNo = $_POST['newempid'];
		$sql = "SELECT * FROM tbl_personalinformation WHERE EmpID='$EmpNo'";
		$result = mysqli_query($conn, $sql);
		$count=mysqli_num_rows($result);
		if($count<=0) {
			$FCode = $_SESSION['FCode'];
			$sql = "UPDATE tbl_evaluationfaculty SET EmpID='$EmpNo' WHERE FCode='$FCode'";
			$result = mysqli_query($conn, $sql);
			
			$sql1 = "UPDATE tbl_personalinformation SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result1 = mysqli_query($conn, $sql1);

			$sql2="UPDATE tbl_familybackground SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result2=mysqli_query($conn, $sql2);
			
			$sql3="UPDATE tbl_children SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result3=mysqli_query($conn, $sql3);
			
			$sql4="UPDATE tbl_cse SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result4=mysqli_query($conn, $sql4);

			$sql5="UPDATE tbl_educationalbackground SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result5=mysqli_query($conn, $sql5);

			$sql6="UPDATE tbl_faculty SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result6=mysqli_query($conn, $sql6);

			$sql7="UPDATE tbl_familybackground SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result7=mysqli_query($conn, $sql7);

			$sql8="UPDATE tbl_gov SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result8=mysqli_query($conn, $sql8);

			$sql9="UPDATE tbl_lastlogin SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result9=mysqli_query($conn, $sql9);

			$sql10="UPDATE tbl_org SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result10=mysqli_query($conn, $sql10);

			$sql11="UPDATE tbl_recognition SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result11=mysqli_query($conn, $sql11);

			$sql12="UPDATE tbl_referred SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result12=mysqli_query($conn, $sql12);

			$sql13="UPDATE tbl_scholar SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result13=mysqli_query($conn, $sql13);

			$sql14="UPDATE tbl_seminar SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result14=mysqli_query($conn, $sql14);

			$sql15="UPDATE tbl_snc SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result15=mysqli_query($conn, $sql15);

			$sql16="UPDATE tbl_workexperience SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result16=mysqli_query($conn, $sql16);
			
			$sql17="UPDATE tbl_vwork SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result17=mysqli_query($conn, $sql17);
			
			$sql18="UPDATE tbl_tprograms SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result18=mysqli_query($conn, $sql18);
			
			$sql19="UPDATE tbl_skh SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result19=mysqli_query($conn, $sql19);
			
			$sql20="UPDATE tbl_nadr SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result20=mysqli_query($conn, $sql20);
			
			$sql21="UPDATE tbl_miao SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result21=mysqli_query($conn, $sql21);
			
			$sql22="UPDATE tbl_qa SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result22=mysqli_query($conn, $sql22);
			
			$sql23="UPDATE tbl_references SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result23=mysqli_query($conn, $sql23);
			
			$sql24="UPDATE tbl_taxcertificate SET EmpID='$EmpNo' WHERE EmpID='$EmpID'";
			$result24=mysqli_query($conn, $sql24);
			if($result) {
				$_SESSION['CEmpID'] = $EmpNo;
				header("Location: index.php?r=faculty/AccSettings&msg=Your new Employee ID has been saved.&msgType=succ");
			} else {
				header("Location: index.php?r=faculty/AccSettings&msg=Your security new Employee ID has not been set.&msgType=err");
			}
		} else {
			header("Location: index.php?r=faculty/AccSettings&msg=Employee ID is already in used.&msgType=err");
		}
		
	}
	mysqli_close($conn);
?>