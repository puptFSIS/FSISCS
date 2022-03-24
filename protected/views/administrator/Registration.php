<?php
	$database_db="db_log";
	$user_db="root";
	$password_db="root";
	$host_db="localhost";

	$link=mysqli_connect($host_db,$user_db,$password_db) or die ("could not connect: ".mysqli_error());
	mysqli_select_db($database_db, $link)  or exit('Error Selecting database: '.mysqli_error()); ;

	$userid=$_POST["userid"];
	$password=$_POST["password"];

	$sql="SELECT * FROM tbl_users  where username='$userid' and password='$password'";
	$result = mysqli_query($conn, $sql);
	$num_rows = mysqli_num_rows($result);
	
	if($num_rows==0){
		header("Location: error.php");
	} else {
		header("Location: welcome.php");
	}
?>
<html>
<body>
	<form name="regform" action="ReadingFromDB.php" method="post">
		Username:<input name="username" type="text" value="" />
		Password:<input name="password" type="password" value="" />
		<input name="submit" type="submit" value="Submit" />
	</form>
</body>
</html>