<?php
    require 'database.php';
    $rows = array();

   
            //User Permissions
            $result = mysqli_query($conn, "SELECT * FROM tblinv_feedback ORDER BY feedbackID DESC " );

            if (mysqli_num_rows($result) > 0) {
                $rows['status'] = "success";

                while($row = mysqli_fetch_array($result, MYSQL_NUM)) {   
                    $rows['data']['reportss'][] = array(
                        'feedbackID' => $row[0],
                         'DateSent' =>$row[1],
                        'FCode' => $row[2],
                        'feedback' => $row[3]
                    
                    );
                }
                    echo json_encode($rows);
            } else {
                $rows['status'] = "failed";
                $rows['error'] = "Empty";
                echo json_encode($rows);
            }                           
            mysqli_query($conn, $sql);
            mysqli_close($conn);
       

    mysqli_close($conn);
?>