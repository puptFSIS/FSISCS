<?php
    require 'database.php';
    $rows = array();

      
          
          
             $FCode = $_POST['username'];
              $feedback = $_POST['reasontext'];
              
 $datetoday = date('Y-m-d');
           // $p = "FA0013TG2009";
            //User Permissions
              $result = mysqli_query($conn,"INSERT INTO tblinv_feedback VALUES ('','$datetoday','$FCode','$feedback',0)");
        //$result2 = mysqli_query($conn,"UPDATE tbl_internaschedule SET sday='$sday', stimeS=$stimeS, stimeE=$stimeE, sroom='$sroom' where schedID=".$schedID."");
      
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