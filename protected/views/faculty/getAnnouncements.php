<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_announcement WHERE status='Active'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	if($count<=0) {
		echo'
		<center><p><i>No active announcement found.</i></p></center>
		<hr style="margin-top: -5px;"/>
		';
	}else { 
	while($row = mysqli_fetch_array($result)) {
	echo '
	<div class=align-left>
	<div class=element-holder>
	<img alt="Image example" src="assets/announcements.jpg" width=150 />
	<div class=caption>' . $row['sDay'] . ' ' . $row['sMonth'] . ' ' . $row['sYear'] . '</div>
	</div>
	</div>
	<ul class=tags-floated-list>
	<li>
	<a href="index.php?r=faculty/announcement&ID=' . $row['ID'] . '" style="margin-top:-115px; margin-left:513px;">View Details</a>
	</li>
	</ul>
	<p><h4>' . $row['title'] . '</h4>' . $row['message'] . '</p>
	<hr />';
		}
	}
?>