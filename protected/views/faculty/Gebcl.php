<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='College'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	if($count>=1) {
	
	}else {
		echo '<center><p><i>No educational background for college level found.</i></p></center><hr />';
	}
	while($row = mysqli_fetch_array($result)){	
	echo'
	<p style="margin-bottom: 9px;">NAME OF SCHOOL:<textarea id=ns4 name=e19 disabled="disabled" >' . $row['schoolName'] . '</textarea></p>
	<p style="margin-bottom: 9px;">DEGREE COURSE:<input id=dc4 name=e20 type=text disabled="disabled" value="' . $row['degreeCourse'] .'"/></p>
	<p style="margin-bottom: 9px;">YEAR GRADUATED:<select id=yg4 name=e21 type=text disabled="disabled" /><option>' . $row['yearGraduated'] . '</option></select></p>
	<p class="ue4">UNITS EARNED:<input id=ue4 name=e22 type=text disabled="disabled" value="' . $row['highestLevel'] . '"/></p>
	<p style="margin-bottom: 9px;">INCLUSIVE DATE OF ATTENDANCE (FROM-TO):
	<input id=att4 name=e23 type=text disabled="disabled" value="' . $row['incDateFrom'] . '-' . $row['incDateTo'] .'" /></p>
	<p style="margin-bottom: 9px;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED:
	<input id=hon4 name=e24 type=text disabled="disabled" value="' . $row['honorsReceived'] . '" /></p>
	<ul class=tags-floated-list>
	<center><li class=u4>
	<a href="index.php?r=faculty/uebl&sname='. $row['schoolName'] .'&level=' . $row['level'] . '">Update</a></center>
	</li>
	</ul>
	<hr />';
	}
?>
