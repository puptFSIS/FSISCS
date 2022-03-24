<?php
	if(php_sapi_name() === 'cli') {
		include_once("config.php");
		include_once("fcm.php");
		
		$registrationIds = array();

		$sql = 
			"SELECT DISTINCT registrationid
			 FROM tbl_devicefaculty";

		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)) {
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$registrationIds[] = $row['registrationid'];
			}
		}

		$msg = array(
			'title'   => 'Announcement',
			'message' => 'Please update your seminars attended for this quarter.',
			'vibrate' => 1,
			'sound'	  => 1,
			'notId'   => rand(1, 15)
		);
		
		FCM::pushNotification($registrationIds, $msg);

		mysqli_close($conn);
	}
?>