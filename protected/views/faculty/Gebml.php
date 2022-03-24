<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Masteral'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	if($count>=1) {
	
	}else {
		echo '<center><p><i>No educational background for masteral level found.</i></p></center><hr />';
	}
	while($row = mysqli_fetch_array($result)){	
	echo'
	<p style="margin-bottom: 9px;">NAME OF SCHOOL:<textarea id=ns5 name=e31 disabled="disabled" >' . $row['schoolName'] . '</textarea></p>
	<p style="margin-bottom: 9px;">DEGREE COURSE:<input id=dc5 name=e32 type=text disabled="disabled" value="' . $row['degreeCourse'] .'"/></p>
	<p style="margin-bottom: 9px;">YEAR GRADUATED:<select id=yg5 name=e33 type=text disabled="disabled" /><option>' . $row['yearGraduated'] . '</option></select></p>
	<p class="ue5">UNITS EARNED:<input id=ue5 name=e34 type=text disabled="disabled" value="' . $row['highestLevel'] . '"/></p>
	<p style="margin-bottom: 9px;">INCLUSIVE DATE OF ATTENDANCE (FROM-TO):
	<input id=att5 name=e35 type=text disabled="disabled" value="' . $row['incDateFrom'] . '-' . $row['incDateTo'] .'" /></p>
	<p style="margin-bottom: 9px;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED:
	<input id=hon5 name=e36 type=text disabled="disabled" value="' . $row['honorsReceived'] . '" /></p>
	<ul class=tags-floated-list>
	<center><li class=u5>
	<a href="index.php?r=faculty/uebl&sname='. $row['schoolName'] .'&level=' . $row['level'] . '">Update</a><center>
	</li>
	</ul>
	<hr />';
	}
?>
