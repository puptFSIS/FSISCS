<?php
    require 'database.php';
    $rows = array();

   
            //User Permissions
            $result = mysqli_query($conn, "SELECT * FROM tbl_course WHERE Status='Post now'" );

            if (mysqli_num_rows($result) > 0) {
                $rows['status'] = "success";

                while($row = mysqli_fetch_array($result, MYSQL_NUM)) {   
                    $rows['data']['coursess'][] = array(
                        'course_code' => $row[0],
                         'course_desc' =>$row[2],
                        'NoOfYears' => $row[7]
                        
                    
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