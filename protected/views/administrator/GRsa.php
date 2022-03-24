<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sqlCoverage = "select * from tbl_reportcoverage where report = 'FAS'";
	$resultCoverage=mysqli_query($conn,$sqlCoverage);
	$rowCoverage = mysqli_fetch_array($resultCoverage);
	$fromy = $rowCoverage['yfrom'];
	$toy = $rowCoverage['yto'];
	$fromm = $rowCoverage['fromMonth'];
	$tom = $rowCoverage['toMonth'];
	
	$sql="SELECT * FROM tbl_tprograms where fromy >= '$fromy' and toy <= '$toy' order by fromy, fromm, fromd ASC";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {
		$yfrom = $row['fromy'];
		$ytoy = $row['toy'];
        if((getMonth($row['fromm']) >= $fromm and $yfrom >= $fromy) or (getMonth($row['fromm']) < $fromm and $yfrom > $fromy)){ //and (getMonth($row['tom']) <= $tom and $ytoy <= $toy) or (getMonth($row['tom']) > $tom and $ytoy < $toy)){
			if((getMonth($row['tom']) <= $tom and $ytoy <= $toy) or (getMonth($row['tom']) > $tom and $ytoy < $toy)){
				if($row['fromm']=="January") {
						$fm = "01";
				} else if($row['fromm']=="February") {
						$fm = "02";
				} else if($row['fromm']=="March") {
						$fm = "03";
				} else if($row['fromm']=="April") {
						$fm = "04";
				} else if($row['fromm']=="May") {
						$fm = "05";
				} else if($row['fromm']=="June") {
						$fm = "06";
				} else if($row['fromm']=="July") {
						$fm = "07";
				} else if($row['fromm']=="August") {
						$fm = "08";
				} else if($row['fromm']=="September") {
						$fm = "09";
				} else if($row['fromm']=="October") {
						$fm = "10";
				} else if($row['fromm']=="November") {
						$fm = "11";
				} else if($row['fromm']=="December") {
						$fm = "12";
				} else {
						$fm = "00";
				} 

				if($row['tom']=="January") {
						$mm = "01";
				} else if($row['tom']=="February") {
						$mm = "02";
				} else if($row['tom']=="March") {
						$mm = "03";
				} else if($row['tom']=="April") {
						$mm = "04";
				} else if($row['tom']=="May") {
						$mm = "05";
				} else if($row['tom']=="June") {
						$mm = "06";
				} else if($row['tom']=="July") {
						$mm = "07";
				} else if($row['tom']=="August") {
						$mm = "08";
				} else if($row['tom']=="September") {
						$mm  = "09";
				} else if($row['tom']=="October") {
						$mm = "10";
				} else if($row['tom']=="November") {
						$mm = "11";
				} else if($row['tom']=="December") {
						$mm = "12";
				} else {
						$mm = "00";
				} 
				echo '
					<tr>
					<td>' . getFullName($row['EmpID']) . '</td>
					<td>' . $row['title'] . '</td>
					<td>' . $fm . '/' . $row['fromd'] . '/' . $row['fromy'] . '</td>
					<td>' . $mm . '/' . $row['tod'] . '/' . $row['toy'] . '</td>
					<td>' . $row['hours'] . '</td>
					<td>' . $row['conby'] . '</td>
					</tr>
				';
			}
		}
	} 
?>
<?php
	function getFullName($empid) {
		include("config.php");
		$sql="SELECT * FROM tbl_personalinformation WHERE EmpID='$empid'";
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['surname'] . ' ' . $row['nameExtension'];
		return $fullname;
	}
	
	function getMonth($m){
		if($m == "January")
			return 1;
		elseif($m == "February")
			return 2;
		elseif($m == "March")
			return 3;
		elseif($m == "April")
			return 4;
		elseif($m == "May")
			return 5;
		elseif($m == "June")
			return 6;
		elseif($m == "July")
			return 7;
		elseif($m == "August")
			return 8;
		elseif($m == "September")
			return 9;
		elseif($m == "October")
			return 10;
		elseif($m == "November")
			return 11;
		elseif($m == "December")
			return 12;
	}
?>