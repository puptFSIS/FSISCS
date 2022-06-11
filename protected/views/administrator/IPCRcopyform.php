<?php 
	include('config.php');

	if(isset($_POST['submit']))
	{
		$mosCpy = $_POST['Month'];		//pinili na month na gagayahin
		$yearCpy = $_POST['Year'];		//pinili na year na gagayahin
		$toMonth = $_POST['toMonth']; 	//kung saang month ipapasa yung ginaya
		$toYear = $_POST['toYear'];	 	//kung saang year ipapasa yung ginaya
	}

		//Create a temporary table and then passed the copied IPCR form and then do some update to match the data of the form for which the copied data will be passed on. and Drop the temporary table.
		if($mosCpy == "JJ" && $toMonth == "JJ") 
		{
			$sql1 ="CREATE TEMPORARY TABLE tbl_tmp SELECT if_required,output,indicators,part,month,year,deleted_on FROM tbl_ipcr1 where month = '$mosCpy' AND year = '$yearCpy' AND deleted_on IS NULL limit 0";
				$res1 = mysqli_query($conn,$sql1);
			$sql2 ="INSERT INTO tbl_tmp SELECT if_required,output,indicators,part,month,year,deleted_on FROM tbl_ipcr1 where month = '$mosCpy' AND year = '$yearCpy' AND deleted_on IS NULL";
				$res2 = mysqli_query($conn,$sql2);
			$sql3 ="UPDATE tbl_tmp SET year = '$toYear'";
				$res3 = mysqli_query($conn,$sql3);
			$sql4 ="INSERT into tbl_ipcr1 (if_required,output,indicators,part,month,year,deleted_on) SELECT * FROM tbl_tmp";
				$res4 = mysqli_query($conn,$sql4);
			$sql5 ="DROP TABLE tbl_tmp";
				$res5 = mysqli_query($conn,$sql5);

		} elseif($mosCpy == "JJ" & $toMonth == "JD") {

			$sql1 ="CREATE TEMPORARY TABLE tbl_tmp SELECT if_required,output,indicators,part,month,year,deleted_on FROM tbl_ipcr1 where month = '$mosCpy' AND year = '$yearCpy' AND deleted_on IS NULL limit 0";
				$res1 = mysqli_query($conn,$sql1);
			$sql2 ="INSERT INTO tbl_tmp SELECT if_required,output,indicators,part,month,year,deleted_on FROM tbl_ipcr1 where month = '$mosCpy' AND year = '$yearCpy' AND deleted_on IS NULL";
				$res2 = mysqli_query($conn,$sql2);
			$sql3 ="UPDATE tbl_tmp SET year = '$toYear',month = '$toMonth'";
				$res3 = mysqli_query($conn,$sql3);
			$sql4 ="INSERT into tbl_ipcr2 (if_required,output,indicators,part,month,year,deleted_on) SELECT * FROM tbl_tmp";
				$res4 = mysqli_query($conn,$sql4);
			$sql5 ="DROP TABLE tbl_tmp";
				$res5 = mysqli_query($conn,$sql5);

		} elseif($mosCpy == "JD" && $toMonth == "JJ") {

			$sql1 ="CREATE TEMPORARY TABLE tbl_tmp SELECT if_required,output,indicators,part,month,year,deleted_on FROM tbl_ipcr2 where month = '$mosCpy' AND year = '$yearCpy' AND deleted_on IS NULL limit 0";
				$res1 = mysqli_query($conn,$sql1);
			$sql2 ="INSERT INTO tbl_tmp SELECT if_required,output,indicators,part,month,year,deleted_on FROM tbl_ipcr2 where month = '$mosCpy' AND year = '$yearCpy' AND deleted_on IS NULL";
				$res2 = mysqli_query($conn,$sql2);
			$sql3 ="UPDATE tbl_tmp SET year = '$toYear'";
				$res3 = mysqli_query($conn,$sql3);
			$sql4 ="INSERT into tbl_ipcr1 (if_required,output,indicators,part,month,year,deleted_on) SELECT * FROM tbl_tmp";
				$res4 = mysqli_query($conn,$sql4);
			$sql5 ="DROP TABLE tbl_tmp";
				$res5 = mysqli_query($conn,$sql5);

		} elseif($mosCpy == "JD" && $toMonth =="JD") {

			$sql1 ="CREATE TEMPORARY TABLE tbl_tmp SELECT if_required,output,indicators,part,month,year,deleted_on FROM tbl_ipcr2 where month = '$mosCpy' AND year = '$yearCpy' AND deleted_on IS NULL limit 0";
				$res1 = mysqli_query($conn,$sql1);
			$sql2 ="INSERT INTO tbl_tmp SELECT if_required,output,indicators,part,month,year,deleted_on FROM tbl_ipcr2 where month = '$mosCpy' AND year = '$yearCpy' AND deleted_on IS NULL";
				$res2 = mysqli_query($conn,$sql2);
			$sql3 ="UPDATE tbl_tmp SET year = '$toYear', month = '$toMonth'";
				$res3 = mysqli_query($conn,$sql3);
			$sql4 ="INSERT into tbl_ipcr2 (if_required,output,indicators,part,month,year,deleted_on) SELECT * FROM tbl_tmp";
				$res4 = mysqli_query($conn,$sql4);
			$sql5 ="DROP TABLE tbl_tmp";
				$res5 = mysqli_query($conn,$sql5);

		}
		if($toMonth == "JJ")
		{
			header('Location: index.php?r=administrator/IPCRcreatejantojune&m='.$toMonth.'&y='.$toYear.'&mess=6');	
		} else {
			header('Location: index.php?r=administrator/IPCRcreatejultodec&m='.$toMonth.'&y='.$toYear.'&mess=6');
		}
		
 ?>