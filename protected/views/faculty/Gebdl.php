<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Doctorate'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	if($count>=1) {
	
	}else {
		echo '<center><p><i>No educational background for Doctorate level found.</i></p></center><hr />';
	}
	while($row = mysqli_fetch_array($result)){	
	echo'
	<p style="margin-bottom: 9px;">NAME OF SCHOOL:<textarea id=ns6 name=e31 disabled="disabled" >' . $row['schoolName'] . '</textarea></p>
	<p style="margin-bottom: 9px;">DEGREE COURSE:<input id=dc6 name=e32 type=text disabled="disabled" value="' . $row['degreeCourse'] .'"/></p>
	<p style="margin-bottom: 9px;">YEAR GRADUATED:<select id=yg6 name=e33 type=text disabled="disabled" /><option>' . $row['yearGraduated'] . '</option></select></p>
	<p class="ue6">UNITS EARNED:<input id=ue6 name=e34 type=text disabled="disabled" value="' . $row['highestLevel'] . '"/></p>
	<p style="margin-bottom: 9px;">INCLUSIVE DATE OF ATTENDANCE (FROM-TO):
	<input id=att6 name=e35 type=text disabled="disabled" value="' . $row['incDateFrom'] . '-' . $row['incDateTo'] .'" /></p>
	<p style="margin-bottom: 9px;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED:
	<input id=hon6 name=e36 type=text disabled="disabled" value="' . $row['honorsReceived'] . '" /></p>
	<ul class=tags-floated-list>
	<center><li class=u6>
	<a href="index.php?r=faculty/uebl&sname='. $row['schoolName'] .'&level=' . $row['level'] . '" style="margin-left:542px; margin-top: -208px;">Update</a><center>
	</li>
	</ul>
	<hr />';
	}
?>
