<?php
$EmpID = $_SESSION['CEmpID'];

include("config.php");

	$sql="SELECT * FROM tbl_miao WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {
		echo '
		<form name=upmiao action="index.php?r=faculty/ProcessUpdateMIAO&miao='. $row['miao'] .'" method="post">
		<p style="margin-top: 15px;">MEMBER OF	:<input name=nmiao type=text style="width: 50%; margin-top: -28px; margin-left: 20%;" value="' . $row['miao'] . '"/></p>
		<p style="margin-left: 420px; margin-top: -55px;"><input type="submit" style="width: 80px;" value="Update">
		<a href="index.php?r=faculty/crmiao&miao=' . $row['miao'] . '"><input type="button" style="width: 80px;" value="Remove"></p></a>
		</form>
		';
	}
		
		echo '
		<form name=newmiao action="index.php?r=faculty/Newmiao" method="post">
		<p style="margin-top: 15px;">NEW MEMBERSHIP:<input name=miao type=text style="width: 50%; margin-top: -28px; margin-left: 20%;" value=""/></p>
		<p style="margin-left: 420px; margin-top: -55px;"><input type="submit" style="width: 80px;" value="Save">
		<input type="reset" style="width: 80px;" value="Clear"></p>
		</form>
		';
?>