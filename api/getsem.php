<?php
    require 'database.php';
    $rows = array();

        if(empty($_POST['sm']) || empty($_POST['sy'])) { //checks if textfields is empty
            $rows['status'] = "failed";
            $rows['error'] = "Empty Username or Password";
            echo json_encode($rows);
        } else {
            // Define $username and $password
            $sm = $_POST['sm'];
            $sy = $_POST['sy'];

            // To protect MySQL injection for Security purpose
            $sm = stripslashes($sm);
            $sm = mysqli_real_escape_string($conn, $sm);

            $sy = stripslashes($sy);
            $sy = mysqli_real_escape_string($conn, $sy);
            $p =$_POST['username'];

            if($sm == "SUMMER")
            {
              $sm= 3;
            }

            //User Permissions
            $result = mysqli_query($conn, "SELECT * FROM tbl_internaschedule as ti LEFT JOIN tbl_course as tc ON tc.course = ti.courseID WHERE sem = '".$sm."'  and schoolYear = '".$sy."' and sprof = '".$p."' ORDER BY cyear ASC" );

            if (mysqli_num_rows($result) > 0) {
                $rows['status'] = "success";

                while($row = mysqli_fetch_array($result, MYSQL_NUM)) {   
                    $rows['data']['teachingdetails'][] = array(
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
                $rows['error'] = "Invalid Sem or schoolYear";
                echo json_encode($rows);
            }                           
            mysqli_query($conn, $sql);
            mysqli_close($conn);
        }
   

    mysqli_close($conn);
?>