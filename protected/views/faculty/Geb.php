<?php
	//session_start();
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	
	if($_GET['level']=='Elementary') {
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Elementary'";
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
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Secondary'";
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
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Vocational'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	$row = mysql_fetch_array($result);
	
	$d1 = $row['schoolName'];
	$d2 = $row['degreeCourse'];
	$d3 = $row['yearGraduated'];
	$d4 = $row['highestLevel'];
	$d5 = $row['incDateFrom'];
	$d6 = $row['incDateTo'];
	$d7 = $row['honorsReceived'];
	} else if($_GET['level']=='College') {
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='College'";
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
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Masteral'";
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
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Graduate'";
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
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Doctorate'";
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