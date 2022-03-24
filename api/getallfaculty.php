<?php
    require 'database.php';
    $rows = array();

   
            //User Permissions
            $result = mysqli_query($conn, "SELECT * FROM tbl_evaluationfaculty WHERE status='active' ORDER BY LName ASC" );

            if (mysqli_num_rows($result) > 0) {
                $rows['status'] = "success";

                while($row = mysqli_fetch_array($result, MYSQL_NUM)) {   
                    $rows['data']['facultys'][] = array(
                        'FCode' => $row[0],
                         'LName' =>$row[3],
                        'FName' => $row[4],
                           'MName' => $row[5]
                    
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