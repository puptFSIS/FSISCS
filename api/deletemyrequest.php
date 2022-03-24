<?php
    require 'database.php';
    $rows = array();

      
            $requestid =$_POST['requestid'];
           // $p = "FA0013TG2009";
            //User Permissions
             $result = mysqli_query($conn, "DELETE FROM tbl_requestschedule WHERE request_id=".$requestid."" );

            if ($result) {
                $rows['status'] = "success";
              }
                 else {
                $rows['status'] = "failed";
                $rows['error'] = "Invalid Request ID";
              
            }                           
            mysqli_query($conn, $sql);
            mysqli_close($conn);
     
   

    mysqli_close($conn);
?>