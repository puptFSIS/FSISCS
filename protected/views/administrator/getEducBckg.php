<?php
	$be = "NOT APPLICABLE";
	$be1 = "----";
	include("config.php");
	$EmpID= "";
	if(isset($_SESSION['CEmpID'])) {
		$EmpID = $_SESSION['CEmpID'];
	} else {
		die(header("Location: index.php?r=site/index"));
	}
	$sql = "SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Elementary'";
	$result=mysqli_query($conn,$sql);
	//$count=mysql_num_rows($result);
	$Ename = "";
	$Edegree = "";
	$Eyg = "";
	$Eue = "";
	$Efrom = "";
	$Eto = "";
	$Ehonor = "";
	$row = mysqli_fetch_array($result);
	$Ename = $row['schoolName'];
	$Edegree = $row['degreeCourse'];
	if(strtoupper($row['yearGraduated'])=="NOT YET") {
		$Eyg = "NOT YET";
	} else {
		$Eyg = strtoupper($row['yearGraduated']);
	}
	$Eue = $row['highestLevel'];
	$Efrom = $row['incDateFrom'];
	$Eto = $row['incDateTo'];
	$Ehonor = $row['honorsReceived'];
	
	$sql = "SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Secondary'";
	$result=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($result);
	$Sname = "";
	$Sdegree = "";
	$Syg = "";
	$Sue = "";
	$Sfrom = "";
	$Sto = "";
	$Shonor = "";
	$row = mysqli_fetch_array($result);
	$Sname = $row['schoolName'];
	$Sdegree = $row['degreeCourse'];
	if(strtoupper($row['yearGraduated'])=="NOT YET") {
		$Syg = "";
	} else {
		$Syg = strtoupper($row['yearGraduated']);
	}
	$Sue = $row['highestLevel'];
	$Sfrom = $row['incDateFrom'];
	$Sto = $row['incDateTo'];
	$Shonor = $row['honorsReceived'];
	
	$sql = "SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Vocational'";
	$result=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($result);
	$Vname = "";
	$Vdegree = "";
	$Vyg = "";
	$Vue = "";
	$Vfrom = "";
	$Vto = "";
	$Vhonor = "";
	$row = mysqli_fetch_array($result);
	$Vname = $row['schoolName'];
	$Vdegree = $row['degreeCourse'];
	if(strtoupper($row['yearGraduated'])=="NOT YET") {
		$Vyg = "";
	} else {
		$Vyg = strtoupper($row['yearGraduated']);
	}
	$Vue = $row['highestLevel'];
	$Vfrom = $row['incDateFrom'];
	$Vto = $row['incDateTo'];
	$Vhonor = $row['honorsReceived'];
	if($Vue==null)
		$Vue = $be;
	
	
	$Cname = array("","","","","");
	$Cdegree = array("","","","","");
	$Cyg = array("","","","","");
	$Cue = array("","","","","");
	$Cfrom = array("","","","","");
	$Cto = array("","","","","");
	$Chonor = array("","","","","");
	$cctr = 0;
	$sql = "SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='College'";
	$result=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($result);

	while($row = mysqli_fetch_array($result)) {
		$Cname[$cctr] = $row['schoolName'];
		$Cdegree[$cctr] = $row['degreeCourse'];
		if(strtoupper($row['yearGraduated'])=="NOT YET") {
			$Cyg[$cctr] = "";
		} else {
			$Cyg[$cctr] = strtoupper($row['yearGraduated']);
		}
		$Cue[$cctr] = $row['highestLevel'];
		$Cfrom[$cctr] = $row['incDateFrom'];
		$Cto[$cctr] = $row['incDateTo'];
		$Chonor[$cctr] = $row['honorsReceived'];
		$cctr = $cctr + 1;
	}
	
	$Gname = array("","","","","");
	$Gdegree = array("","","","","");
	$Gyg = array("","","","","");
	$Gue = array("","","","","");
	$Gfrom = array("","","","","");
	$Gto = array("","","","","");
	$Ghonor = array("","","","","");
	$cctr = 0;
	$sql = "SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);

	while($row = mysqli_fetch_array($result)) {
		if ($row['level']=="Masteral" OR $row['level']=="Doctorate") {
			$Gname[$cctr] = $row['schoolName'];
			$Gdegree[$cctr] = $row['degreeCourse'];
			if(strtoupper($row['yearGraduated'])=="NOT YET") {
				$Gyg[$cctr] = "";
			} else {
				$Gyg[$cctr] = strtoupper($row['yearGraduated']);
			}
			$Gue[$cctr] = $row['highestLevel'];
			$Gfrom[$cctr] = $row['incDateFrom'];
			$Gto[$cctr] = $row['incDateTo'];
			$Ghonor[$cctr] = $row['honorsReceived'];
			$cctr = $cctr + 1;
		}
	}

?>