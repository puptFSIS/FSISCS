<?php
	
	
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$currID = $_POST['currID'];
	$sy = $_POST['sy'];
	$course = $_POST['course'];

	$sql = "SELECT * FROM tbl_subjectloadlist WHERE currDesc='$sy' AND courseDesc='$course'";
	$result = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		if($result)
		{
			echo"
			<script>
			window.location.replace('index.php?r=administrator/curriculum');
			alert('Curriculum already exists!');
			</script>";
			mysqli_close($conn);		
		}
	}
	
	include("config.php");
	$sql2="INSERT INTO tbl_subjectloadlist (currID, currDesc,courseDesc) VALUES ('$currID','$sy','$course')";
	$result2 = mysqli_query($conn,$sql2);
	if($result2){
		header("Location: index.php?r=administrator/CurriculumList");
	}
	mysqli_close($conn);
?>
