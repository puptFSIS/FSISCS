<?php
	session_start();
	include("config.php");
	
	$FCode = $_SESSION['FCode'];
	$scode = $_POST['scode'];
	$sem = $_POST['sem'];
	if($sem=="SUMMER"){
	$sem = 3;
	}
	$sy = $_POST['sy'];
	
	$MtimeIn = $_POST['MtimeIn'];
	$MtimeOut = $_POST['MtimeOut'];

	$TtimeIn = $_POST['TtimeIn'];
	$TtimeOut = $_POST['TtimeOut'];

	$WtimeIn = $_POST['WtimeIn'];
	$WtimeOut = $_POST['WtimeOut'];

	$THtimeIn = $_POST['THtimeIn'];
	$THtimeOut = $_POST['THtimeOut'];

	$FtimeIn = $_POST['FtimeIn'];
	$FtimeOut = $_POST['FtimeOut'];

	$StimeIn = $_POST['StimeIn'];
	$StimeOut = $_POST['StimeOut'];
	
	$err = 0;
	$errMsg = "Cannot save preferred schedule: ";
	$bracket = "";
	if($MtimeIn!='' and $MtimeOut!='') {
		$valid = checkPrefSched('M',$MtimeIn,$MtimeOut,$FCode);
		if($valid) {
			if($MtimeIn<1030 and $MtimeOut <=1030){
				$ref = $MtimeIn + $MtimeOut;
				$bracket = "07:30 AM-10:30 AM";
			}elseif($MtimeIn<1030 and $MtimeOut >=1030){
				$ref = $MtimeIn + $MtimeOut;
				$bracket = "07:30 AM-10:30 AM";
			}elseif($MtimeIn>=1030 and $MtimeOut <=1330){
				$ref = $MtimeIn + $MtimeOut;
				$bracket = "10:30 AM-1:30 PM";
			}elseif($MtimeIn>=1300 and $MtimeOut<=1630){
				$ref = $MtimeIn + $MtimeOut;
				$bracket = "01:30 PM-4:30 PM";
			}elseif($MtimeIn>=1630){
				$ref = $MtimeIn + $MtimeOut;
				$bracket = "4:30PM-7:30PM/6:00PM-9:00PM";
			}
			else
			{
				$ref = $MtimeIn + $MtimeOut;
				$bracket = to12Hr($MtimeIn) .'-'. to12Hr($MtimeOut);
			}
			/*
			if($MtimeIn<1030 and $MtimeOut<=1130){
				$bracket = "7:30AM-1:30PM";
			}if($MtimeIn<1030 and $MtimeOut>1130){
				$bracket = "7:30AM-4:30PM";
			}if($MtimeIn>=1030 and $MtimeOut<=1630 and $MtimeOut>1330){
				$bracket = to12Hr($MtimeIn) . '-' . to12Hr($MtimeOut);
			}if($MtimeIn>=1030 and $MtimeOut>1630){
				$bracket = "10:30AM-9:00PM";
			}if($MtimeIn>=1330 and $MtimeOut>1630){
				$bracket = "1:30PM-9:00PM";
			}*/
			$sql = "INSERT INTO tbl_schedpref (FCode, scode, sem, sy, day, timein, timeout, bracket, bracketRef) VALUE ('$FCode','$scode','$sem','$sy','M','$MtimeIn','$MtimeOut','$bracket','$ref')";
			$res = mysqli_query($conn, $sql);
			$bracket = "";
		} else {
			$err = 1;
			$errMsg = $errMsg . 'MONDAY '. to12Hr($MtimeIn) .'-'. to12Hr($MtimeOut) .'; ';
		}
	}
	
	if($TtimeIn!='' and $TtimeOut!='') {
		$valid = checkPrefSched('T',$TtimeIn,$TtimeOut,$FCode);
		if($valid) {
			if($TtimeIn<1030 and $TtimeOut <=1030){
				$ref = $TtimeIn + $TtimeOut;
				$bracket = "07:30 AM-10:30 AM";
			}elseif($TtimeIn<1030 and $TtimeOut >=1030){
				$ref = $TtimeIn + $TtimeOut;
				$bracket = "07:30 AM-10:30 AM";
			}elseif($TtimeIn>=1030 and $TtimeOut <=1330){
				$ref = $TtimeIn + $TtimeOut;
				$bracket = "10:30 AM-1:30 PM";
			}elseif($TtimeIn>=1300 and $TtimeOut<=1630){
				$ref = $TtimeIn + $TtimeOut;
				$bracket = "01:30 PM-4:30 PM";
			}elseif($TtimeIn>=1630){
				$ref = $TtimeIn + $TtimeOut;
				$bracket = "4:30PM-7:30PM/6:00PM-9:00PM";
			}
			else
			{
				$ref = $TtimeIn + $TtimeOut;
				$bracket = to12Hr($TtimeIn) .'-'. to12Hr($TtimeOut);
			}
			/*
			if($TtimeIn<1030 and $TtimeOut<=1330){
				$bracket = "7:30AM-1:30PM";
			}if($TtimeIn<1030 and $TtimeOut>1330){
				$bracket = "7:30AM-4:30PM";
			}if($TtimeIn>=1030 and $TtimeOut<=1630){
				$bracket = "10:30AM-4:30PM";
			}if($TtimeIn>=1030 and $TtimeOut>1630){
				$bracket = "10:30AM-9:00PM";
			}if($TtimeIn>=1330 and $TtimeOut>1630){
				$bracket = "1:30PM-9:00PM";
			}*/
			
			
			$sql = "INSERT INTO tbl_schedpref (FCode, scode, sem, sy, day, timein, timeout, bracket, bracketRef) VALUE ('$FCode','$scode','$sem','$sy','T','$TtimeIn','$TtimeOut','$bracket','$ref')";
			$res = mysqli_query($conn, $sql);
			$bracket = "";
		} else {
			$err = 1;
			$errMsg = $errMsg . 'TUESDAY '. to12Hr($TtimeIn) .'-'. to12Hr($TtimeOut) .'; ';
		}
	}
	
	if($WtimeIn!='' and $WtimeOut!='') {
		$valid = checkPrefSched('W',$WtimeIn,$WtimeOut,$FCode);
		if($valid) {
			if($WtimeIn<1030 and $WtimeOut <=1030){
				$bracket = "7:30AM-10:30AM";
			}if($WtimeIn<1030 and $WtimeOut >=1030){
				$bracket = "7:30AM-10:30AM";
			}if($WtimeIn>=1030 and $WtimeOut <=1330){
				$bracket = "10:30AM-1:30PM";
			}if($WtimeIn>=1300 and $WtimeOut<=1630){
				$bracket = "1:30PM-4:30PM";
			}if($WtimeIn>=1630){
				$bracket = "4:30PM-7:30PM/6:00PM-9:00PM";
			}if($WtimeIn<1030 and $WtimeOut<=1130){
				$bracket = "7:30AM-1:30PM";
			}if($WtimeIn<1030 and $WtimeOut>1130){
				$bracket = "7:30AM-4:30PM";
			}if($WtimeIn>=1030 and $WtimeOut<=1630){
				$bracket = "10:30AM-4:30PM";
			}if($WtimeIn>=1030 and $WtimeOut>1630){
				$bracket = "10:30AM-9:00PM";
			}if($WtimeIn>=1330 and $WtimeOut>1630){
				$bracket = "1:30PM-9:00PM";
			}
			$sql = "INSERT INTO tbl_schedpref (FCode, scode, sem, sy, day, timein, timeout, bracket) VALUE ('$FCode','$scode','$sem','$sy','W','$WtimeIn','$WtimeOut','$bracket')";
			$res = mysqli_query($conn, $sql);
			$bracket = "";
		} else {
			$err = 1;
			$errMsg = $errMsg . 'WEDNESDAY '. to12Hr($WtimeIn) .'-'. to12Hr($WtimeOut) .'; ';
		}
		
	}
	
	if($THtimeIn!='' and $THtimeOut!='') {
		$valid = checkPrefSched('TH',$THtimeIn,$THtimeOut,$FCode);
		if($valid) {
			if($THtimeIn<1030 and $THtimeOut <=1030){
				$bracket = "7:30AM-10:30AM";
			}if($THtimeIn<1030 and $THtimeOut >=1030){
				$bracket = "7:30AM-10:30AM";
			}if($THtimeIn>=1030 and $THtimeOut <=1330){
				$bracket = "10:30AM-1:30PM";
			}if($THtimeIn>=1300 and $THtimeOut<=1630){
				$bracket = "1:30PM-4:30PM";
			}if($THtimeIn>=1630){
				$bracket = "4:30PM-7:30PM/6:00PM-9:00PM";
			}if($THtimeIn<1030 and $THtimeOut<=1130){
				$bracket = "7:30AM-1:30PM";
			}if($THtimeIn<1030 and $THtimeOut>1130){
				$bracket = "7:30AM-4:30PM";
			}if($THtimeIn>=1030 and $THtimeOut<=1630){
				$bracket = "10:30AM-4:30PM";
			}if($THtimeIn>=1030 and $THtimeOut>1630){
				$bracket = "10:30AM-9:00PM";
			}if($THtimeIn>=1330 and $THtimeOut>1630){
				$bracket = "1:30PM-9:00PM";
			}
			$sql = "INSERT INTO tbl_schedpref (FCode, scode, sem, sy, day, timein, timeout, bracket) VALUE ('$FCode','$scode','$sem','$sy','TH','$THtimeIn','$THtimeOut','$bracket')";
			$res = mysqli_query($conn, $sql);
			$bracket = "";
		} else {
			$err = 1;
			$errMsg = $errMsg . 'THURSDAY '. to12Hr($THtimeIn) .'-'. to12Hr($THtimeOut) .'; ';
		}
	}
	
	if($FtimeIn!='' and $FtimeOut!='') {
		$valid = checkPrefSched('F',$FtimeIn,$FtimeOut,$FCode);
		if($valid) {
			if($FtimeIn<1030 and $FtimeOut <=1030){
				$bracket = "7:30AM-10:30AM";
			}if($FtimeIn<1030 and $FtimeOut >=1030){
				$bracket = "7:30AM-10:30AM";
			}if($FtimeIn>=1030 and $FtimeOut <=1330){
				$bracket = "10:30AM-1:30PM";
			}if($FtimeIn>=1300 and $FtimeOut<=1630){
				$bracket = "1:30PM-4:30PM";
			}if($FtimeIn>=1630){
				$bracket = "4:30PM-7:30PM/6:00PM-9:00PM";
			}if($FtimeIn<1030 and $FtimeOut<=1130){
				$bracket = "7:30AM-1:30PM";
			}if($FtimeIn<1030 and $FtimeOut>1130){
				$bracket = "7:30AM-4:30PM";
			}if($FtimeIn>=1030 and $FtimeOut<=1630){
				$bracket = "10:30AM-4:30PM";
			}if($FtimeIn>=1030 and $FtimeOut>1630){
				$bracket = "10:30AM-9:00PM";
			}if($FtimeIn>=1330 and $FtimeOut>1630){
				$bracket = "1:30PM-9:00PM";
			}
			$sql = "INSERT INTO tbl_schedpref (FCode, scode, sem, sy, day, timein, timeout, bracket) VALUE ('$FCode','$scode','$sem','$sy','F','$FtimeIn','$FtimeOut','$bracket')";
			$res = mysqli_query($conn, $sql);
			$bracket = "";
		} else {
			$err = 1;
			$errMsg = $errMsg . 'FRIDAY '. to12Hr($FtimeIn) .'-'. to12Hr($FtimeOut) .'; ';
		}
		
	}
	
	if($StimeIn!='' and $StimeOut!='') {
		$valid = checkPrefSched('S',$StimeIn,$StimeOut,$FCode);
		if($valid) {
			if($StimeIn<1030 and $StimeOut <=1030){
				$bracket = "7:30AM-10:30AM";
			}if($StimeIn<1030 and $StimeOut >=1030){
				$bracket = "7:30AM-10:30AM";
			}if($StimeIn>=1030 and $StimeOut <=1330){
				$bracket = "10:30AM-1:30PM";
			}if($StimeIn>=1300 and $StimeOut<=1630){
				$bracket = "1:30PM-4:30PM";
			}if($StimeIn>=1630){
				$bracket = "4:30PM-7:30PM/6:00PM-9:00PM";
			}if($StimeIn<1030 and $StimeOut<=1130){
				$bracket = "7:30AM-1:30PM";
			}if($StimeIn<1030 and $StimeOut>1130){
				$bracket = "7:30AM-4:30PM";
			}if($StimeIn>=1030 and $StimeOut<=1630){
				$bracket = "10:30AM-4:30PM";
			}if($StimeIn>=1030 and $StimeOut>1630){
				$bracket = "10:30AM-9:00PM";
			}if($StimeIn>=1330 and $StimeOut>1630){
				$bracket = "1:30PM-9:00PM";
			}
			$sql = "INSERT INTO tbl_schedpref (FCode, scode, sem, sy, day, timein, timeout, bracket) VALUE ('$FCode','$scode','$sem','$sy','S','$StimeIn','$StimeOut','$bracket')";
			$res = mysqli_query($conn, $sql);
			$bracket = "";
		} else {
			$err = 1;
			$errMsg = $errMsg . 'SATURDAY '. to12Hr($StimeIn) .'-'. to12Hr($StimeOut) .'; ';
		}
		
	}
	
	if($err==1){
		header("Location: index.php?r=faculty/SchedulePreference&msg=$errMsg $err&msgType=err");
	} else {
		header("Location: index.php?r=faculty/SchedulePreference&msg=Schedule Preferences has been saved.&msgType=succ");
	}
	
	function checkPrefSched($day, $timein, $timeout, $fcode)
	{
		$sem = $_POST['sem'];
		$sy = $_POST['sy'];
		$sql = "SELECT * FROM tbl_schedPref WHERE FCode='$fcode' AND sem = '$sem' AND sy = '$sy'";
		$result = mysqli_query($conn, $sql);
		$valid = true;
		while($row=mysqli_fetch_array($result)) {
			if($row['day']==$day) 
			{
				/*if($timein<$row['timein'] and ($timeout>$row['timein'] and $timeout<=$row['timeout'])) {
					$valid=false;
				} 
				if($timein>=$row['timein'] and ($timeout>$row['timein'] and $timeout<=$row['timeout'])) {
					$valid=false;
				}
				if($timein>=$row['timein'] and $timeout<=$row['timeout']) {
					$valid=false;
				}
				if($timein>=$row['timein'] and ($timeout>$row['timein'] and $timeout)<=$row['timeout']) {
					$valid=false;
				}
				if($timein<=$row['timein'] and $timeout>=$row['timeout']) {
					$valid=false;
				}
				if($timein>=$row['timein'] and $timeout<=$row['timeout']) {
					$valid=false;
				}*/
				if($timein == $row['timein']){
					$valid=false;
				}
				else if($timein < $row['timein'] and $timeout > $row['timein']){
					$valid=false;
				}
				else if($timein > $timeout){
					$valid=false;
				}
				else if($timein > $row['timein'] and $timein < $row['timeout']){
					$valid=false;
				}
				else if($timein > $row['timein'] and $timeout < $row['timeout']){
					$valid=false;
				}
			}	
		}
		return $valid;
	}
	function to12Hr($ctime) {
		$strTime = "";
							$dn = "";

							if (strlen($ctime) == 4) {
								$hour = substr($ctime, 0, 2);
								$min = substr($ctime, 2, 3);



								if ($hour > 12) {
									$dn = "PM";
									if ($hour == 13) {
										$hour = "01";
									} else if ($hour == 14) {
										$hour = "02";
									} else if ($hour == 15) {
										$hour = "03";
									} else if ($hour == 16) {
										$hour = "04";
									} else if ($hour == 17) {
										$hour = "05";
									} else if ($hour == 18) {
										$hour = "06";
									} else if ($hour == 19) {
										$hour = "07";
									} else if ($hour == 20) {
										$hour = "08";
									} else if ($hour == 21) {
										$hour = "09";
									} else if ($hour == 22) {
										$hour = "10";
									}
								} else {
									$dn = "AM";
								}

								$strTime = $hour.":".$min." ".$dn;
							 } else {
							 	$hour = substr($ctime, 0, 1);
								$min = substr($ctime, 1, 2);

								if ($hour > 12) {
									$dn = "PM";
									if ($hour == 13) {
										$hour = "01";
									} else if ($hour == 14) {
										$hour = "02";
									} else if ($hour == 15) {
										$hour = "03";
									} else if ($hour == 16) {
										$hour = "04";
									} else if ($hour == 17) {
										$hour = "05";
									} else if ($hour == 18) {
										$hour = "06";
									} else if ($hour == 19) {
										$hour = "07";
									} else if ($hour == 20) {
										$hour = "08";
									} else if ($hour == 21) {
										$hour = "09";
									} else if ($hour == 22) {
										$hour = "10";
									}
								} else {
									$dn = "AM";
								}

								$strTime = $hour.":".$min." ".$dn;
							 }
							return $strTime;
	}
?>