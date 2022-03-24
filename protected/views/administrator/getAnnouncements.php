<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_announcementsfaculty";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	if($count<=0) {
		echo'
		<center><p><i>No announcement found.</i></p></center>
		<hr style="margin-top: -5px;"/>
		';
	}else { 
	while($row = mysqli_fetch_array($result)) {
	$status = $row['status'] ? 'Active' : 'Inactive';
	echo '
	<div class=align-left>
	<div class=element-holder>
	<img alt="Image example" src="assets/announcements.jpg" width=150 />
	<div class=caption>' . date('Y-m-d', strtotime($row['date_created'])) . '</div>
	</div>
	</div>
	<ul class=tags-floated-list>
	<li>
	<a href="index.php?r=administrator/uAnnc&id=' . $row['id'] . '" style="margin-top:-115px; margin-left:545px;">Update</a>
	</li>
	<li>
	<a href="index.php?r=administrator/crannc&id=' . $row['id'] . '" style="margin-top:-120px; margin-left:480px;">Remove</a>
	</li>
	</ul>
	<p><h4>' . $row['title'] . '</h4>(<b>Status:</b> ' . $status . ')<br>' . $row['content'] . '</p>
	<hr />';
		}
	}
?>