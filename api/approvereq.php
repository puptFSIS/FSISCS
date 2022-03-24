<?php
    require 'database.php';
    $rows = array();

      
            $requestid =$_POST['requestid'];
            $schedID = $_POST['schedID'];
             $sday = $_POST['sday'];
              $stimeS = $_POST['stimeS'];
               $stimeE = $_POST['stimeE'];
                $sroom = $_POST['sroom'];

           // $p = "FA0013TG2009";
            //User Permissions
              $result = mysqli_query($conn,"UPDATE tbl_requestschedule SET  status='Approved' , datemodified=NOW(), reason='Approved by the administrator' where request_id=".$requestid." and schedID = ".$schedID." ");
        $result2 = mysqli_query($conn,"UPDATE tbl_internaschedule SET sday='$sday', stimeS=$stimeS, stimeE=$stimeE, sroom='$sroom' where schedID=".$schedID."");
      
            if ($result2) {
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