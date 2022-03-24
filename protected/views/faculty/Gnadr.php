<?php
$EmpID = $_SESSION['CEmpID'];

include("config.php");

	$sql="SELECT * FROM tbl_nadr WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)) {
		echo '
		<form name=upnadr action="index.php?r=faculty/ProcessUpdateNADR&nadr='. $row['nadr'] .'" method="post">
		<p style="margin-top: 15px;">RECOGNITION	:<input name=nnadr type=text style="width: 50%; margin-top: -28px; margin-left: 20%;" value="' . $row['nadr'] . '"/></p>
		<p style="margin-left: 430px; margin-top: -55px;"><input type="submit" style="width: 60px;" value="Update">
		<a href="index.php?r=faculty/crnadr&nadr=' . $row['nadr'] . '"><input type="button" style="width: 60px;" value="Remove"></p></a>
		</form>
		';
	}
		
		echo '
		<form name=newnadr action="index.php?r=faculty/NewNADR" method="post">
		<p style="margin-top: 15px;">NEW RECOGNITION:<input name=nadr type=text style="width: 50%; margin-top: -28px; margin-left: 20%;" value=""/></p>
		<p style="margin-left: 430px; margin-top: -55px;"><input type="submit" style="width: 60px;" value="Save">
		<input type="reset" style="width: 60px;" value="Clear"></p>
		</form>
		';
?>