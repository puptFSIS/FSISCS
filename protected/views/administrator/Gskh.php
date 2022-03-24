<?php
$EmpID = $_SESSION['CEmpID'];

include("config.php");

	$sql="SELECT * FROM tbl_skh WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {
		echo '
		<form name=upskh action="index.php?r=administrator/ProcessUpdateSKH&skh='. $row['skh'] .'" method="post">
		<p style="margin-top: 15px;">SKILL / HOBBY:<input name=nskh type=text style="width: 50%; margin-top: -28px; margin-left: 20%;" value="' . $row['skh'] . '"/></p>
		<p style="margin-left: 430px; margin-top: -55px;"><input type="submit" style="width: 60px;" value="Update">
		<a href="index.php?r=administrator/crskh&skh=' . $row['skh'] . '"><input type="button" style="width: 60px;" value="Remove"></p></a>
		</form>
		';
	}
		
		echo '
		<form name=newskh action="index.php?r=administrator/NewSKH" method="post">
		<p style="margin-top: 15px;">NEW SKILL / HOBBY:<input name=skh type=text style="width: 50%; margin-top: -28px; margin-left: 20%;" value=""/></p>
		<p style="margin-left: 430px; margin-top: -55px;"><input type="submit" style="width: 60px;" value="Save">
		<input type="reset" style="width: 60px;" value="Clear"></p>
		</form>
		';
?>