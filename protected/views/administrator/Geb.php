<?php
	//session_start();
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	
	if($_GET['level']=='Elementary') {
	$sname = $_GET['sname'];
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Elementary' AND schoolName='$sname'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	$d1 = $row['schoolName'];
	$d2 = $row['degreeCourse'];
	$d3 = $row['yearGraduated'];
	$d4 = $row['highestLevel'];
	$d5 = $row['incDateFrom'];
	$d6 = $row['incDateTo'];
	$d7 = $row['honorsReceived'];
	
	} else if($_GET['level']=='Secondary') {
	$sname = $_GET['sname'];
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Secondary' AND schoolName='$sname'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	$d1 = $row['schoolName'];
	$d2 = $row['degreeCourse'];
	$d3 = $row['yearGraduated'];
	$d4 = $row['highestLevel'];
	$d5 = $row['incDateFrom'];
	$d6 = $row['incDateTo'];
	$d7 = $row['honorsReceived'];
	
	} else if($_GET['level']=='Vocational') {
	$sname = $_GET['sname'];
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Vocational' AND schoolName='$sname'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	$d1 = $row['schoolName'];
	$d2 = $row['degreeCourse'];
	$d3 = $row['yearGraduated'];
	$d4 = $row['highestLevel'];
	$d5 = $row['incDateFrom'];
	$d6 = $row['incDateTo'];
	$d7 = $row['honorsReceived'];
	
	} else if($_GET['level']=='College') {
	$sname = $_GET['sname'];
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='College' AND schoolName='$sname'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	$d1 = $row['schoolName'];
	$d2 = $row['degreeCourse'];
	$d3 = $row['yearGraduated'];
	$d4 = $row['highestLevel'];
	$d5 = $row['incDateFrom'];
	$d6 = $row['incDateTo'];
	$d7 = $row['honorsReceived'];
	
	} else if($_GET['level']=='Masteral') {
	$sname = $_GET['sname'];
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Masteral' AND schoolName='$sname'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	$d1 = $row['schoolName'];
	$d2 = $row['degreeCourse'];
	$d3 = $row['yearGraduated'];
	$d4 = $row['highestLevel'];
	$d5 = $row['incDateFrom'];
	$d6 = $row['incDateTo'];
	$d7 = $row['honorsReceived'];
	
	} else if($_GET['level']=='Graduate') {
	$sname = $_GET['sname'];
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Graduate' AND schoolName='$sname'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	$d1 = $row['schoolName'];
	$d2 = $row['degreeCourse'];
	$d3 = $row['yearGraduated'];
	$d4 = $row['highestLevel'];
	$d5 = $row['incDateFrom'];
	$d6 = $row['incDateTo'];
	$d7 = $row['honorsReceived'];
	
	} else if($_GET['level']=='Doctorate') {
	$sname = $_GET['sname'];
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Doctorate' AND schoolName='$sname'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	$d1 = $row['schoolName'];
	$d2 = $row['degreeCourse'];
	$d3 = $row['yearGraduated'];
	$d4 = $row['highestLevel'];
	$d5 = $row['incDateFrom'];
	$d6 = $row['incDateTo'];
	$d7 = $row['honorsReceived'];
	}
	
	
	
?>