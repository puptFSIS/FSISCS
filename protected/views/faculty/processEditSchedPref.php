<?php
	session_start();
	include("config.php");
	
	$FCode = $_SESSION['FCode'];
	$scode = $_POST['scode'];
	$sem = $_POST['sem'];
	$sy = $_POST['sy'];
	$sub = $_POST['sub'];
	$oldbracket = $_POST['oldbracket'];
	
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
				$bracket = "7:30AM-10:30AM";
			}if($MtimeIn<1030 and $MtimeOut >=1030){
				$bracket = "7:30AM-10:30AM";
			}if($MtimeIn>=1030 and $MtimeOut <=1330){
				$bracket = "10:30AM-1:30PM";
			}if($MtimeIn>=1300 and $MtimeOut<=1630){
				$bracket = "1:30PM-4:30PM";
			}if($MtimeIn>=1630){
				$bracket = "4:30PM-7:30PM/6:00PM-9:00PM";
			}
			$sql = "UPDATE tbl_schedpref SET scode = '$scode', day = 'M', timein = '$MtimeIn', timeout = '$MtimeOut', bracket = '$bracket' WHERE FCode = '$FCode' AND scode = '$sub' and bracket = '$oldbracket' and sem = '$sem' and sy = '$sy'";
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
				$bracket = "7:30AM-10:30AM";
			}if($TtimeIn<1030 and $TtimeOut >=1030){
				$bracket = "7:30AM-10:30AM";
			}if($TtimeIn>=1030 and $TtimeOut <=1330){
				$bracket = "10:30AM-1:30PM";
			}if($TtimeIn>=1300 and $TtimeOut<=1630){
				$bracket = "1:30PM-4:30PM";
			}if($TtimeIn>=1630){
				$bracket = "4:30PM-7:30PM/6:00PM-9:00PM";
			}
			$sql = "UPDATE tbl_schedpref set scode = '$scode', day = 'T', timein = '$TtimeIn', timeout = '$TtimeOut', bracket = '$bracket' WHERE FCode = '$FCode' AND scode = '$sub' and bracket = '$oldbracket' and sem = '$sem' and sy = '$sy'";
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
			}
			$sql = "UPDATE tbl_schedpref set scode = '$scode', day = 'W', timein = '$WtimeIn', timeout = '$WtimeOut', bracket = '$bracket' WHERE FCode = '$FCode' and scode = '$sub' and bracket = '$oldbracket' and sem = '$sem' and sy = '$sy'";
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
			}
			$sql = "UPDATE tbl_schedpref set scode = '$scode', day = 'TH', timein = '$THtimeIn', timeout = '$THtimeOut', bracket = '$bracket' WHERE FCode = '$FCode' and scode = '$sub' and bracket = '$oldbracket' and sem = '$sem' and sy = '$sy'";
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
			}
			$sql = "UPDATE tbl_schedpref set scode = '$scode', day = 'F', timein = '$FtimeIn', timeout = '$FtimeOut', bracket = '$bracket' WHERE FCode = '$FCode' and scode = '$sub' and bracket = '$oldbracket' and sem = '$sem' and sy = '$sy'";
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
			}
			$sql = "UPDATE tbl_schedpref set scode = '$scode', day = 'S', timein = '$StimeIn', timeout = '$StimeOut', bracket = '$bracket' WHERE FCode = '$FCode' and scode = '$sub' and bracket = '$oldbracket' and sem = '$sem' and sy = '$sy'";
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
		if($ctime==700) {
			$strTime = "07:00 AM";
		} else if($ctime==730) {
			$strTime = "07:30 AM";
		} else if($ctime==800) {
			$strTime = "08:00 AM";
		} else if($ctime==830) {
			$strTime = "08:30 AM";
		} else if($ctime==900) {
			$strTime = "09:00 AM";
		} else if($ctime==930) {
			$strTime = "09:30 AM";
		} else if($ctime==1000) {
			$strTime = "10:00 AM";
		} else if($ctime==1030) {
			$strTime = "10:30 AM";
		} else if($ctime==1100) {
			$strTime = "11:00 AM";
		} else if($ctime==1130) {
			$strTime = "11:30 AM";
		} else if($ctime==1200) {
			$strTime = "12:00 NN";
		} else if($ctime==1230) {
			$strTime = "12:30 NN";
		} else if($ctime==1300) {
			$strTime = "01:00 PM";
		} else if($ctime==1330) {
			$strTime = "01:30 PM";
		} else if($ctime==1400) {
			$strTime = "02:00 PM";
		} else if($ctime==1430) {
			$strTime = "02:30 PM";
		} else if($ctime==1500) {
			$strTime = "03:00 PM";
		} else if($ctime==1530) {
			$strTime = "03:30 PM";
		} else if($ctime==1600) {
			$strTime = "04:00 PM";
		} else if($ctime==1630) {
			$strTime = "04:30 PM";
		} else if($ctime==1700) {
			$strTime = "05:00 PM";
		} else if($ctime==1730) {
			$strTime = "05:30 PM";
		} else if($ctime==1800) {
			$strTime = "06:00 PM";
		} else if($ctime==1830) {
			$strTime = "06:30 PM";
		} else if($ctime==1900) {
			$strTime = "07:00 PM";
		} else if($ctime==1930) {
			$strTime = "07:30 PM";
		} else if($ctime==2000) {
			$strTime = "08:00 PM";
		} else if($ctime==2030) {
			$strTime = "08:30 PM";
		} else if($ctime==2100) {
			$strTime = "09:00 PM";
		} else if($ctime==2130) {
			$strTime = "09:30 PM";
		} else if($ctime==2200) {
			$strTime = "10:00 PM";
		} else if($ctime==2230) {
			$strTime = "10:30 PM";
		}
		return $strTime;
	}
?>