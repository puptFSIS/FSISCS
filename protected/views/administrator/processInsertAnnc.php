<?php
	session_start();
	$EmpID = $_SESSION['CEmpID'];
	include("config.php");
	include("r/fcm.php");
	
	$title = $_POST['ann1'];
	$content = $_POST['ann2'];
	$mark = $_POST['ann3'];
	$date_created = date("Y-m-d H:i:s");
	$sql="INSERT INTO tbl_announcementsfaculty VALUES (NULL, '$title', '$content', '$mark', '$date_created')";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		$last_id = mysqli_insert_id();
		if($mark) {
			$registrationIds = array();

			$sql = 
				"SELECT DISTINCT registrationid
				 FROM tbl_devicefaculty";

			$result = mysqli_query($conn,$sql);	

			if(mysqli_num_rows($result)) {
				while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
					$registrationIds[] = $row['registrationid'];
				}
			}

			$msg = array(
				'title'   => $title,
				'message' => $content,
				'vibrate' => 1,
				'sound'	  => 1,
				'notId'   => $last_id
			);
			
			FCM::pushNotification($registrationIds, $msg);
		}

		header("Location: index.php?r=administrator/announcements");
	}
	mysqli_close($conn);
?>