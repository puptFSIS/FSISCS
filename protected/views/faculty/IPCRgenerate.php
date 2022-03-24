<?php 
    include('config.php');
    session_start();
	$m = $_POST['Month'];
    $y = $_POST['Year'];
    $fcode = $_POST['fcode'];
 
    //to check the deadline
    $sql3 = "SELECT dline_date FROM tbl_ipcrvisible WHERE month = '$m' AND year = '$y'"; //Querying the deadline date
    $results = mysqli_query($conn,$sql3);
    $row = mysqli_fetch_array($results);
    $dline = $row['dline_date'];
    $date_today = date("Y-m-d");

    $today = strtotime($date_today);
    $deadline = strtotime($dline);
   
        //For validation of selected month and year
        $sql2 = "SELECT * FROM tbl_ipcrvisible WHERE month = '$m' AND year = '$y'";
        $query = mysqli_query($conn,$sql2);
        $count1 = mysqli_num_rows($query);

        

        while ($row= mysqli_fetch_array($query))
        {
            $IsAvailable = $row['visible'];

            if($IsAvailable == "Not Available")
            {
                header('Location: index.php?r=faculty/IPCRcreatefaculty&b=1');
            } else if ($IsAvailable == "Available") {
                if($deadline == NULL) //if Deadline is NULL or Not Set, It must continue
                {
                
                    $sql = "SELECT * FROM tbl_ipcrstatus WHERE fcode='$fcode' AND month='$m' AND year='$y'";
                    $result = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($result);
                    if($count == 0)
                    {
                        $sql1 = "INSERT INTO tbl_ipcrstatus (fcode,month,year) VALUES ('".$fcode."','".$m."','".$y."')";
                        // echo $sql1;
                        $result1 = mysqli_query($conn,$sql1);
                        if($m=='JJ')
                        {
                            header('Location: index.php?r=faculty/IPCRcreatejantojunefaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
                        }
                        else if($m=='JD') {
                            header('Location: index.php?r=faculty/IPCRcreatejultodecfaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
                        }

                    } else if($count > 0)
                    {
                        if($m=='JJ')
                        {
                            header('Location: index.php?r=faculty/IPCRcreatejantojunefaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
                        }
                        else if($m=='JD') {
                            header('Location: index.php?r=faculty/IPCRcreatejultodecfaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
                        }
                    }
                } else if($deadline != NULL) //If Dealine is Not null or it was set then continue,
                {
                  
                    if($deadline > $today) //If deadline is present, system will check if the the date exceed or not.
                    {
                        
                        $sql = "SELECT * FROM tbl_ipcrstatus WHERE fcode='$fcode' AND month='$m' AND year='$y'";
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);
                        if($count == 0)
                        {
                            $sql1 = "INSERT INTO tbl_ipcrstatus (fcode,month,year) VALUES ('".$fcode."','".$m."','".$y."')";
                            // echo $sql1;
                            $result1 = mysqli_query($conn,$sql1);
                            if($m=='JJ')
                            {
                                header('Location: index.php?r=faculty/IPCRcreatejantojunefaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
                            }
                            else if($m=='JD') {
                                header('Location: index.php?r=faculty/IPCRcreatejultodecfaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
                            }
                        } else if($count > 0)
                        {
                            if($m=='JJ')
                            {
                                header('Location: index.php?r=faculty/IPCRcreatejantojunefaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
                            }
                            else if($m=='JD') {
                                header('Location: index.php?r=faculty/IPCRcreatejultodecfaculty&m='.$m.'&y='.$y.'&fcode='.$fcode.'');
                            }
                        }
                    } else { // if exceeded it will return to the previous page and prompt a alert.
                         header('Location: index.php?r=faculty/IPCRcreatefaculty&a=1');
                    }
                }
            }
        }
?>