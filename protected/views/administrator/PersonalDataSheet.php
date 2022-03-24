<?php
	session_start();
	if(isset($_GET['EMPID'])) {
		$tmpOrigEmpID = $_SESSION['CEmpID'];
		$_SESSION['CEmpID'] = $_GET['EMPID'];
		echo '<p>
		<h3>'. $_SESSION['FullName'] .'</h3>
		<p style="margin-top: -8px;"><i>Personal Data Sheet</i></p>
		<ul class=list-arrow-right style="margin-left: 140px; margin-top: -12px;">
		<a href="index.php?r=administrator/MyPDS1" target="_blank"><li>Page 1 of 4</li></a>
		<a href="index.php?r=administrator/MyPDS2" target="_blank"><li>Page 2 of 4</li></a>
		<a href="index.php?r=administrator/MyPDS3" target="_blank"><li>Page 3 of 4</li></a>
		<a href="index.php?r=administrator/MyPDS4" target="_blank"><li>Page 4 of 4</li></a>
		</ul>
		</p>';
		$_SESSION['CEmpID'] = $tmpOrigEmpID;
	}
	
?>