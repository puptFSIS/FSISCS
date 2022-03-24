<?php
	session_start();
	include("config.php");
	if(isset($_SESSION['userID'])){
		$userID = $_SESSION['userID'];
		$absent = $_POST['absent'];
		$makeup_date = date('F j, Y',strtotime($_POST['makeup_date']));
		$room = $_POST['room'];
		$time = $_POST['time'];
		$course = $_POST['course'];
		$subject = $_POST['subject'];
		$sql = mysqli_query($conn,"INSERT INTO tbl_make_up (FCode,date_absent,date_makeup,room,time,course,subject) VALUES ('$userID','$absent','$makeup_date','$room','$time','$course','$subject')") or die("WRONG QUERY");
		if($sql){
			header("location:index.php?r=faculty/applyMakeup&msg=00110");
		}
		else{
		echo "SERVER ERROR
			-BDT ";
		}
		
	}
	else{
		 header("location:index.php?r=faculty/applyMakeup&msg=ERROR");
	}
?>