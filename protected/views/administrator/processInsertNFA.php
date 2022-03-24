<?php
include("config.php");
$sem = $_POST['sem'];
$sy = $_POST['sy'];
$Fcode = $_POST['fcode'];
$EmpID = $_POST['fcode'];
$sname = $_POST['sname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$frstltrmname = substr($mname,1);
$mname = substr($mname, 0, 1) . '.';
$next = $_POST['next'];
$cgroup = $_POST['cgroup'];
$emptype = $_POST['emptype'];
$pass = $_POST['pass'];
$repass = $_POST['repass'];
$role = $_POST['role'];
$epass = SHA1($pass);
$isAdmin = 0;
$currYear = date('Y');
$currCount = $_POST['count'];

$sql="SELECT * FROM tbl_evaluationfaculty WHERE FCode='$Fcode'";
$result=mysqli_query($conn,$sql);	
$count=mysqli_num_rows($result);


if($Fcode==null || $cgroup==null || $sname==null || $fname==null || $mname==null || $pass==null || $repass==null) {
	header("location:index.php?r=administrator/nfa&msg=<strong>ERROR: </strong>Please fill up all the required fields.&msgType=err");
} else if($pass!=$repass) {
	header("location:index.php?r=administrator/nfa&msg=Mismatch password.&msgType=err");
} else {
	if($count<=0) {
		$sql="SELECT * FROM tbl_evaluationfaculty WHERE EmpID='$EmpID'";
		$result=mysqli_query($conn,$sql);	
		$count=mysqli_num_rows($result);
		if($count<=0) {
			if($Fcode=="FA0000TG0000") {
				
			} else {
				$sql="INSERT INTO tbl_evaluationfaculty (FCode, password, enu_employmentStat, LName, FName, MName, Mobile, Email, int_courseGroup, evalRoles, EmpID, isAdmin, status, yearAdded, latestCount) VALUES ('$Fcode','$epass','$emptype','$sname','$fname','$mname','','','$cgroup','$role','$EmpID','$isAdmin','active','$currYear','$currCount')";
				$result=mysqli_query($conn,$sql);	
			}

			$sql="INSERT INTO tbl_personalinformation (surname, firstname, middlename, nameExtension, birthdate, bday, bmonth, byear, EmpID, userID, password, isAdmin, status, civilStatus) VALUES ('$sname','$fname','$mname','$next', '1950-01-01', '01', '01', '1950', '$EmpID', '$EmpID','$epass','$isAdmin','active','Single')";
			$result=mysqli_query($conn,$sql);	

			$sql="INSERT INTO tbl_faculty (EmpID, password, isAdmin, username) VALUES ('$EmpID','$epass','$isAdmin','$EmpID')";
			$result=mysqli_query($conn,$sql);	

			$sql="INSERT INTO tbl_familybackground (EmpID) VALUES ('$EmpID')";
			$result=mysqli_query($conn,$sql);	
			
			$sql="INSERT INTO tbl_masterlist (FCode, FName, Contact, Status, sem, schoolYear)
				SELECT '$Fcode', CONCAT(LName ,', ', FName, ' ', LEFT(MName, 1), '.') As Fullname, Mobile, 'NF', '$sem', '$sy' from tbl_evaluationfaculty 
				WHERE tbl_evaluationfaculty.Fcode = '$Fcode'";
			$result=mysqli_query($conn,$sql);	
			header("location:index.php?r=administrator/NewFaculty&sem=$sem&sy=$sy&msg=New faculty account has been added.&msgType=succ");
		} else {
			header("location:index.php?r=administrator/AddNewFaculty&msg=Employee ID already registered.&msgType=err");
		}
	} else {
		header("location:index.php?r=administrator/AddNewFaculty&msg=Faculty Code already registered.&msgType=err");
	}
}
mysqli_close($conn);
?>