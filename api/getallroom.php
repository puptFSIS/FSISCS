<?php
    require 'database.php';
    $rows = array();

   
            //User Permissions
            $result = mysqli_query($conn, "SELECT * FROM tbl_room" );

            if (mysqli_num_rows($result) > 0) {
                $rows['status'] = "success";

                while($row = mysqli_fetch_array($result, MYSQL_NUM)) {   
                    $rows['data']['roomsss'][] = array(
                        'roomName' => $row[0],
                         'roomDesc' =>$row[1],
                        'room_id' => $row[2]
                    
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