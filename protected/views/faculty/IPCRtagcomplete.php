<?php
	include('config.php'); 
	session_start();

	$fcode = $_GET['fcode'];
	$m = $_GET['m'];
	$y = $_GET['y'];

	//Fetch info in database where if_required is REQUIRED meaning, the field is required to answer
	if($m == "JJ") {
		$query = "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcr1.id = tbl_ipcraccomp.id_ipcr1 WHERE tbl_ipcr1.month = '$m' AND tbl_ipcr1.year = '$y' AND tbl_ipcr1.deleted_on IS NULL AND tbl_ipcr1.if_required = 'Required'";
		$query_result = mysqli_query($conn,$query);
		$count_rows = mysqli_num_rows($query_result);
	} else {
		$query = "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcr2.id = tbl_ipcraccomp.id_ipcr2 WHERE tbl_ipcr2.month = '$m' AND tbl_ipcr2.year = '$y' AND tbl_ipcr2.deleted_on IS NULL AND tbl_ipcr2.if_required = 'Required'";
		$query_result = mysqli_query($conn,$query);
		$count_rows = mysqli_num_rows($query_result);
	}
	
	while($row = mysqli_fetch_array($query_result))
	{
		$accomp = $row['accomplishment'];
	}
		//count the row of queried infos.
		if($count_rows)
		{
			//check if there is blank accomplishment
			if($accomp == "" || $accomp == NULL)
			{
				if($m == "JJ")
				{
					header('Location: index.php?r=faculty/IPCRcreatejantojunefaculty&a=1&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
				} else {
					header('Location: index.php?r=faculty/IPCRcreatejultodecfaculty&a=1&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
				}
			} else {
				//if all accomplishment are answered, proceed on submitting the IPCR to the admin
				$sql = "SELECT * FROM tbl_ipcrstatus WHERE fcode='$fcode' AND month = '$m' AND year = '$y'";
				$result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($result))
				{
					$status = $row['status'];

					//checking the status of the IPCR
					if($status == NULL)
					{
						//Set IPCR submitted and this will be reflected to the list of admin.
						$sql1 = "UPDATE tbl_ipcrstatus SET status = 'Submitted' WHERE fcode ='$fcode' AND month = '$m' AND year = '$y'";
						$result1 = mysqli_query($conn,$sql1);

						header('Location: index.php?r=faculty/IPCRfaculty&a=1');

					} else if($status == "Submitted")
					{
						header('Location: index.php?r=faculty/IPCRfaculty&b=1');
					}

				}
			}
		} 
?> 