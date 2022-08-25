<?php 
	session_start();
	include('config.php');

	// if(isset($_POST['submit']))
	// {
		
		// $fname = $_POST['fname'];
		// $mname = $_POST['mname'];
		// $sname = $_POST['sname'];
		include('getPersonalInformation.php');
		$m = $_GET['m'];
		$ye = $_GET['y'];
		$fcode = $_GET['fcode'];
		// echo $ye;
		// die;
		

		//Check if the IPCR status is Approved
		$sql = "SELECT * FROM tbl_ipcrstatus WHERE year = '$ye' AND month = '$m' AND fcode = '$fcode'";
			$res = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($res))
		{
			$status = $row['status'];
		}

		//Check if the IPCR is Available to Faculty
		$query = "SELECT * FROM tbl_ipcrvisible WHERE month = '$m' AND year = '$ye'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		while($rows = mysqli_fetch_array($result))
		{
			$isVisible = $rows['visible'];
		}

		$sql_query = "SELECT * FROM tbl_ipcrstatus WHERE fcode = '$fcode' AND month = '$m' AND year = '$ye'";
		$query_res = mysqli_query($conn,$sql_query);
		$count_row = mysqli_num_rows($query_res); //Count the query and check if the IPCR Info of faculty is existing in database

		if($m == "JJ")
		{	
			if($count > 0)
			{
				if($isVisible == "Available")
				{
					if($count_row > 0)
					{
						if($status == "Approved")
						{
							header('Location: index.php?r=faculty/IPCRform1faculty&m='.$m.'&ye='.$ye.'&fcode='.$fcode.'&fname='.$firstname.'&mname='.$middlename.'&sname='.$surname.'');
						} elseif($status == "Pending" || $status == "Submitted" || $status == NULL) {
							header('Location: index.php?r=faculty/IPCRfaculty&m='.$m.'&y='.$ye.'&mess=11');
						}
					} elseif($count_row == 0) {
						header('Location: index.php?r=faculty/IPCRfaculty&m='.$m.'&y='.$ye.'&mess=14');
					}
				} elseif($isVisible == "Not Available") {
					header('Location: index.php?r=faculty/IPCRfaculty&m='.$m.'&y='.$ye.'&mess=12');
				} 
			} else {
				header('Location: index.php?r=faculty/IPCRfaculty&m='.$m.'&y='.$ye.'&mess=13');
			}
		} elseif($m == "JD")
		{
			if($count > 0)
			{
				if($isVisible == "Available")
				{
					if($count_row > 0)
					{
						if($status == "Approved")
						{
							header('Location: index.php?r=faculty/IPCRform2faculty&m='.$m.'&ye='.$ye.'&fcode='.$fcode.'&fname='.$firstname.'&mname='.$middlename.'&sname='.$surname.'');
						} elseif($status == "Pending" || $status == "Submitted" || $status == NULL) {
							header('Location: index.php?r=faculty/IPCRfaculty&m='.$m.'&y='.$ye.'&mess=11');
						}
					} elseif($count_row == 0) {
						header('Location: index.php?r=faculty/IPCRfaculty&m='.$m.'&y='.$ye.'&mess=14');
					}
				} elseif($isVisible == "Not Available") {
					header('Location: index.php?r=faculty/IPCRfaculty&m='.$m.'&y='.$ye.'&mess=12');
				} 
			} else {
				header('Location: index.php?r=faculty/IPCRfaculty&m='.$m.'&y='.$ye.'&mess=13');
			}	
		}
?>