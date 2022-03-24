<?php
    require 'database.php';
    $rows = array();

      
          
            $requestid = $_POST['requestid'];
           // $p = "FA0013TG2009";
            //User Permissions
             $result = mysqli_query($conn, "SELECT * FROM tbl_requestschedule as tr LEFT JOIN tbl_course as tc ON tc.course = tr.courseID LEFT JOIN tbl_evaluationfaculty as te ON te.FCode = tr.sprof WHERE request_id=".$requestid."" );

            if (mysqli_num_rows($result) > 0) {
                $rows['status'] = "success";

                while($row = mysqli_fetch_array($result, MYSQL_NUM)) {   
                    $rows['data']['myrequestsdetails'][] = array(
                        'requestid' => $row[0],
                        'schedID' =>$row[1],
                        'csection' => $row[4],
                        'cyear' => $row[5],
                        'stitle' => $row[7],
                      'sday' => $row[11],
                      'stimeS' => $row[12],
                      'stimeE' => $row[13],
                      'sroom' => $row[14],
                      'sprof' => $row[15],
                       'sem' => $row[16],
                       'schoolYear' => $row[17],
                      'status' => $row[18],
                      'daterequested' => $row[20],
                      'course_code' => $row[27],
                      'LName' => $row[38],
                      'FName' => $row[39],
                       'MName' => $row[40]
                     
                    );
                }
                    echo json_encode($rows);
            } else {
                $rows['status'] = "failed";
                $rows['error'] = "Invalid Sem or schoolYear";
                echo json_encode($rows);
            }                           
            mysqli_query($conn, $sql);
            mysqli_close($conn);
     
   

    mysqli_close($conn);
?>