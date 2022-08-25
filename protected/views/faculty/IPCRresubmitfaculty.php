<?php 
	include('config.php'); 
	session_start();

	include('getPersonalInformation.php');

	// echo $firstname;
	// die;
	date_default_timezone_set('Asia/Manila');
    $now = date("h:i:a");
    $date = date("Y/m/d");
	$fcode = $_GET['fcode'];
	$m = $_GET['m'];
	$y = $_GET['y'];

	if($m == "JJ")
	{
		$monthyear = "(January-June, ".$y.")";
	} else {
		$monthyear = "(July-December, ".$y.")";
	}

	$subject = "IPCR form Resubmission ".$monthyear."";

	$text = "".$surname.", ".$firstname." ".$middlename." resubmitted IPCR";

	$sql1 = "UPDATE tbl_ipcrstatus SET status = 'Submitted' WHERE fcode ='$fcode' AND month = '$m' AND year = '$y'";
	$result1 = mysqli_query($conn,$sql1);

	$sql_notif = "INSERT INTO tbl_ipcrnotification (subject,text,date,time,status) VALUES ('".$subject."','".$text."','".$date."','".$now."',0)";
	$res = mysqli_query($conn,$sql_notif);

	// print_r($res);
	header('Location: index.php?r=faculty/IPCRfaculty&m='.$m.'&y='.$y.'&a=1');


?>