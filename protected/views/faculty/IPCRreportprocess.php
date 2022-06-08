<?php 
	//session_start();
	include('config.php');

	if(isset($_POST['submit']))
	{
		$m = $_POST['Month'];
		$ye = $_POST['Year'];
		$fcode = $_POST['fcode'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$sname = $_POST['sname'];
		// echo $sname;
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
							header('Location: index.php?r=faculty/IPCRform1faculty&m='.$m.'&ye='.$ye.'&fcode='.$fcode.'&fname='.$fname.'&mname='.$mname.'&sname='.$sname.'');
						} elseif($status == "Pending" || $status == "Submitted" || $status == NULL) {
							header('Location: index.php?r=faculty/IPCRreport&mess=1');
						}
					} elseif($count_row == 0) {
						header('Location: index.php?r=faculty/IPCRreport&mess=4');
					}
				} elseif($isVisible == "Not Available") {
					header('Location: index.php?r=faculty/IPCRreport&mess=2');
				} 
			} else {
				header('Location: index.php?r=faculty/IPCRreport&mess=3');
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
							header('Location: index.php?r=faculty/IPCRform2faculty&m='.$m.'&ye='.$ye.'&fcode='.$fcode.'&fname='.$fname.'&mname='.$mname.'&sname='.$sname.'');
						} elseif($status == "Pending" || $status == "Submitted" || $status == NULL) {
							header('Location: index.php?r=faculty/IPCRreport&mess=1');
						}
					} elseif($count_row == 0) {
						header('Location: index.php?r=faculty/IPCRreport&mess=4');
					}
				} elseif($isVisible == "Not Available") {
					header('Location: index.php?r=faculty/IPCRreport&mess=2');
				} 
			} else {
				header('Location: index.php?r=faculty/IPCRreport&mess=3');
			}	
		}
	}

	// 		$sql ="SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcr1.id = tbl_ipcraccomp.id_ipcr1 WHERE tbl_ipcr1.month = '$m' AND tbl_ipcr1.year = '$ye' AND tbl_ipcr1.deleted_on IS NULL AND tbl_ipcr1.if_required = 'Required' AND tbl_ipcraccomp.adminApproval IS NULL";
	// 	} else {
	// 		$sql ="SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcr2.id = tbl_ipcraccomp.id_ipcr2 WHERE tbl_ipcr2.month = '$m' AND tbl_ipcr2.year = '$ye' AND tbl_ipcr2.deleted_on IS NULL AND tbl_ipcr2.if_required = 'Required' AND tbl_ipcraccomp.adminApproval IS NULL";
	// 	}
	// 	$result = mysqli_query($conn,$sql);
	// 	$count_row = mysqli_num_rows($result);
	// 	if($count_row == 0)
	// 	{
	// 		//check if IPCR is available if not, decline.
	// 		$sql = "SELECT * FROM tbl_ipcrvisible WHERE month = '$m' AND year = '$ye'";
	// 		$result = mysqli_query($conn,$sql);
	// 		while($row = mysqli_fetch_array($result))
	// 		{
	// 			$isVisible = $row['visible']; 
	// 		}
	// 		if($isVisible == "Available")
	// 		{	
	// 			//Check if IPCR is Submitted but it will count first if the row is present in the db. if not, decline.
	// 			$sql = "SELECT * FROM tbl_ipcrstatus WHERE fcode = '$fcode' AND month = '$m' AND year = '$ye'";
	// 			$result = mysqli_query($conn,$sql);
	// 			$count = mysqli_num_rows($result);
	// 			while($row = mysqli_fetch_array($result))
	// 			{
	// 				$status = $row['status'];
	// 			}
	// 			if($count > 0) 
	// 			{
	// 				if($status == "Submitted" || $status == "Approved")
	// 				{
	// 					if($m == "JJ") {

	// 						/* Query to Get/Select all the required field with 'Disapprove' Approval. If there is existing on $row_count, it will not let the USER print a copy of (his/her) IPCR. */

	// 						$sql="SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr1 = tbl_ipcr1.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcraccomp.adminApproval = 'Disapproved' AND tbl_ipcr1.year = '$ye' AND tbl_ipcr1.if_required = 'Required' AND tbl_ipcr1.deleted_on IS NULL ORDER BY tbl_ipcr1.id, tbl_ipcraccomp.id_ipcr1 ASC";
	// 						$result = mysqli_query($conn,$sql);
	// 						$row_count = mysqli_num_rows($result);
	// 						//if($result == NULL) {
	// 							//header('Location: index.php?r=faculty/IPCRreport&null=true');
	// 						//} else if($result != NULL){
	// 							if($row_count > 0) {
	// 								header('Location: index.php?r=faculty/IPCRreport&warning=true');
	// 							} else if($row_count == 0){
	// 								header('Location: index.php?r=faculty/IPCRform1faculty&m='.$m.'&ye='.$ye.'&fcode='.$fcode.'');
	// 							}
	// 						//}
	// 					} else if($m == "JD"){
	// 						//Same as Above (for IPCR2 or July to december) 
	// 						$sql="SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcraccomp.id_ipcr2 = tbl_ipcr2.id AND tbl_ipcraccomp.FCode = '$fcode' WHERE tbl_ipcraccomp.adminApproval = 'Disapprove' AND tbl_ipcr2.year = '$ye' AND tbl_ipcr2.if_required = 'Required' AND tbl_ipcr2.deleted_on IS NULL ORDER BY tbl_ipcr2.id, tbl_ipcraccomp.id_ipcr2 ASC";
	// 						$result = mysqli_query($conn,$sql);
	// 						$row_count = mysqli_num_rows($result);
	// 						if($row_count > 0) {
	// 							header('Location: index.php?r=faculty/IPCRreport&warning=true');
	// 						} else if($row_count == 0) {
	// 							header('Location: index.php?r=faculty/IPCRform2faculty&m='.$m.'&ye='.$ye.'&fcode='.$fcode.'');
	// 						}
	// 					}
	// 				} else if($status == NULL) {
	// 					header('Location: index.php?r=faculty/IPCRreport&mes=1');
	// 				}
	// 			} else if($count == 0) {
	// 				header('Location: index.php?r=faculty/IPCRreport&mess=1');
	// 			}
	// 		} else if($isVisible == "Not Available") {
	// 			header('Location: index.php?r=faculty/IPCRreport&mesna=1');
	// 		}
	// 	} else if($count_row > 0) {
	// 		header('Location: index.php?r=faculty/IPCRreport&message=1');

	// 	}
	// }
?>