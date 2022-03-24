<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Graduate'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	if($count>=1) {
	
	}else {
		echo '<center><p><i>No educational background for graduate studies level found.</i></p></center><hr />';
	}
	while($row = mysqli_fetch_array($result)){	
	echo'
	<p style="margin-bottom: 9px;">NAME OF SCHOOL:<textarea name=e25 style="width: 320px; margin-top: -28px; margin-left: 35%;" disabled="disabled" >' . $row['schoolName'] . '</textarea></p>
	<p style="margin-bottom: 9px;">DEGREE COURSE:<input name=e26 type=text style="width: 320px; margin-top: -28px; margin-left: 35%;" disabled="disabled" value="' . $row['degreeCourse'] .'"/></p>
	<p style="margin-bottom: 9px;">YEAR GRADUATED:<select name=e27 type=text style="width: 90px; margin-top: -28px; margin-left: 35%;" disabled="disabled" /><option>' . $row['yearGraduated'] . '</option></select></p>
	<p style="margin-top: -37px; margin-left:53%;">UNITS EARNED:<input name=e28 type=text style="width: 100px; margin-top: -28px; margin-left: 40%;" disabled="disabled" value="' . $row['highestLevel'] . '"/></p>
	<p style="margin-bottom: 9px;">INCLUSIVE DATE OF ATTENDANCE (FROM-TO):
	<input name=e29 type=text style="width: 230px; margin-top: -28px; margin-left: 50%;" disabled="disabled" value="' . $row['incDateFrom'] . '-' . $row['incDateTo'] .'" /></p>
	<p style="margin-bottom: 9px;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED:
	<input name=e30 type=text style="width: 230px; margin-top: -28px; margin-left: 50%;" disabled="disabled" value="' . $row['honorsReceived'] . '" /></p>
	<ul class=tags-floated-list>
	<li>
	<a href="index.php?r=faculty/uebl&sname='. $row['schoolName'] .'&level=' . $row['level'] . '" style="margin-left:542px; margin-top: -208px;">Update</a>
	</li>
	</ul>
	<hr />';
	}
?>
