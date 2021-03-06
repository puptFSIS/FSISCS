<?php
	include('config.php'); 
	session_start();

	include('getPersonalInformation.php');

	$fcode = $_GET['fcode'];
	$m = $_GET['m'];
	$y = $_GET['y'];
	date_default_timezone_set('Asia/Manila');
    $now = date("h:i:a");
    $date = date("Y/m/d");

	
	if($m == "JJ") {
		//count the generated IPCR and this should be the same with the counted accomplishment inputted to be able to submit the form.
		$query1 = "SELECT * from tbl_ipcr1 WHERE month = '$m' AND year ='$y' AND if_required = 'Required'";
		$query_result1 = mysqli_query($conn,$query1);
		$count_ipcr1 = mysqli_num_rows($query_result1);

		//Fetch info in database where if_required is REQUIRED. meaning, the field is required to answer
		$query = "SELECT tbl_ipcr1.*,tbl_ipcraccomp.* FROM tbl_ipcr1 LEFT JOIN tbl_ipcraccomp ON tbl_ipcr1.id = tbl_ipcraccomp.id_ipcr1 WHERE tbl_ipcr1.month = '$m' AND tbl_ipcr1.year = '$y' AND tbl_ipcr1.deleted_on IS NULL AND tbl_ipcr1.if_required = 'Required'";
	} else if($m == "JD") {
		$query1 = "SELECT * from tbl_ipcr2 WHERE month = '$m' AND year ='$y' AND if_required = 'Required'";
		$query_result1 = mysqli_query($conn,$query1);
		$count_ipcr1 = mysqli_num_rows($query_result1);

		$query = "SELECT tbl_ipcr2.*,tbl_ipcraccomp.* FROM tbl_ipcr2 LEFT JOIN tbl_ipcraccomp ON tbl_ipcr2.id = tbl_ipcraccomp.id_ipcr2 WHERE tbl_ipcr2.month = '$m' AND tbl_ipcr2.year = '$y' AND tbl_ipcr2.deleted_on IS NULL AND tbl_ipcr2.if_required = 'Required'"; 
		
	}
	$query_result = mysqli_query($conn,$query);
	$count_accomp = mysqli_num_rows($query_result); //count Accomplishment
	while($row = mysqli_fetch_array($query_result))
	{
		$accomp = $row['accomplishment'];
	}
		//count the row of queried infos.
		if($count_accomp = $count_ipcr1)
		{
			// echo $count_rows;
			// echo $count_ipcr1;
			// die;
			//check if there is blank accomplishment
			if($accomp == "" || $accomp == NULL)
			{
				if($m == "JJ")
				{
					header('Location: index.php?r=faculty/IPCRcreatejantojunefaculty&a=1&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
				} else if($m == "JD"){
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


						if($m == "JJ")
						{
							$monthyear = "(January-June, ".$y.")";
						} else {
							$monthyear = "(July-December, ".$y.")";
						}

						$subject = "IPCR Submission ".$monthyear."";
						$text = "".$surname.", ".$firstname." ".$middlename." Submitted IPCR";
						$sql_notif = "INSERT INTO tbl_ipcrnotification (subject,text,date,time,status) VALUES ('".$subject."','".$text."','".$date."','".$now."',0)";
						$res = mysqli_query($conn,$sql_notif);

						header('Location: index.php?r=faculty/IPCRfaculty&a=1');

					} else if($status == "Submitted")
					{
						header('Location: index.php?r=faculty/IPCRfaculty&b=1');
					}

				}
			}
		} else if($count_accomp != $count_ipcr1) {
			if($m == "JJ")
			{
				header('Location: index.php?r=faculty/IPCRcreatejantojunefaculty&a=1&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
			} else if($m == "JD"){
				header('Location: index.php?r=faculty/IPCRcreatejultodecfaculty&a=1&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
			}
		}

?> 