<?php
    require 'database.php';
    $rows = array();

      
            $schedID =$_POST['schedID'];
           // $p = "FA0013TG2009";
            //User Permissions
             $result = mysqli_query($conn, "SELECT * FROM tbl_internaschedule as tr LEFT JOIN tbl_course as tc ON tc.course = tr.courseID LEFT JOIN tbl_evaluationfaculty as te ON te.FCode = tr.sprof WHERE tr.schedID=".$schedID." " );

            if (mysqli_num_rows($result) > 0) {
                $rows['status'] = "success";

                while($row = mysqli_fetch_array($result, MYSQL_NUM)) {   
                    $rows['data']['origsched'][] = array(
                      'csection' => $row[3],
                        'cyear' => $row[4],
                        'stitle' => $row[6],
                      'sday' => $row[10],
                      'stimeS' => $row[11],
                      'stimeE' => $row[12],
                      'sroom' => $row[13],
                      'sprof' => $row[14],
                      'sday2' => $row[17],
                      'stimeS2' => $row[18],
                      'stimeE2' => $row[19],
                      'sroom2' => $row[20],
                      'course_code' => $row[22]
                     
                     
                    );
                }
                    echo json_encode($rows);
            } else {
                $rows['status'] = "failed";
                $rows['error'] = "Invalid Schedule";
                echo json_encode($rows);
            }                           
            mysqli_query($conn, $sql);
            mysqli_close($conn);
     
   

    mysqli_close($conn);
?>