<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND level='Elementary'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	if($count>=1) {
	
	}else {
		echo '<ul class=tags-floated-list>
			<li>
			<a href="index.php?r=faculty/aebl&level=Elementary" style="margin-top:-55px; margin-left:463px;">Add Elementary Level</a>
			</li>
			</ul>';
		echo '<center><p><i>No educational background for elementary level found.</i></p></center><hr />';
	}
	while($row = mysqli_fetch_array($result)){	
	echo'
	<p style="margin-bottom: 9px;">NAME OF SCHOOL:<textarea id=ns1 name=e1 " disabled="disabled" >' . $row['schoolName'] . '</textarea></p>
	<p style="margin-bottom: 9px;">DEGREE COURSE:<input id=dc1 name=e2 type=text disabled="disabled" value="' . $row['degreeCourse'] .'"/></p>
	<p style="margin-bottom: 9px;">YEAR GRADUATED:<select id=yg1 name=e3 type=text disabled="disabled" /><option>' . $row['yearGraduated'] . '</option></select></p>
	<p class="ue1">UNITS EARNED:<input id=ue1 name=e4 type=text disabled="disabled" value="' . $row['highestLevel'] . '"/></p>
	<p style="margin-bottom: 9px;">INCLUSIVE DATE OF ATTENDANCE (FROM-TO):
	<input id=att1 name=e5 type=text disabled="disabled" value="' . $row['incDateFrom'] . '-' . $row['incDateTo'] .'" /></p>
	<p style="margin-bottom: 9px;">SCHOLARSHIP/ACADEMIC HONORS RECEIVED:
	<input id=hon1 name=e6 type=text disabled="disabled" value="' . $row['honorsReceived'] . '" /></p>
	<ul class=tags-floated-list>
	<center><li class=u1>
	<a href="index.php?r=faculty/uebl&sname='. $row['schoolName'] .'&level=' . $row['level'] . '">Update</a>
	</li></center>
	</ul>
	<hr />';
	}
?>
