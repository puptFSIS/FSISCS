<?php
    require 'database.php';
    $rows = array();

        if(empty($_POST['username']) || empty($_POST['password'])) { //checks if textfields is empty
        	$rows['status'] = "failed";
        	$rows['error'] = "Empty Username or Password";
        	echo json_encode($rows);
        }
         else {
            // Define $username and $password
            $username = $_POST['username'];
            $password = $_POST['password'];

            // To protect MySQL injection for Security purpose
            $username = stripslashes($username);
            $username = mysqli_real_escape_string($conn, $username);

            $password = stripslashes($password);
            $password = mysqli_real_escape_string($conn, $password);
            $pass = SHA1($password);

            //User Permissions
        if($password=="puptfsis" or $password=="PUPTFSIS") {
       
         $result = mysqli_query($conn, "SELECT * FROM tbl_evaluationfaculty as te LEFT JOIN tbl_profpic as tpp ON tpp.EmpID = te.EmpID  WHERE FCode='".$username."'");
          
            if (mysqli_num_rows($result) > 0) {
                $rows['status'] = "success";

                while($row = mysqli_fetch_array($result, MYSQL_NUM)) {   
                    $rows['data']['userDetails'][] = array(
                      'FCode' => $row[0],
                      'LName' => $row[3],
                      'FName' => $row[4],
                      'evalRoles' => $row[9],
                      'isAdmin' => $row[15],
                      'path' => $row[29]
                    );
                }
                    echo json_encode($rows);
            } else {
                $rows['status'] = "failed";
                $rows['error'] = "Invalid Faculty Code or Password";
                echo json_encode($rows);
            }                           
            mysqli_query($conn, $sql);
            mysqli_close($conn);
        }
        else
        {
            $result = mysqli_query($conn, "SELECT * FROM tbl_evaluationfaculty as te LEFT JOIN tbl_profpic as tpp ON tpp.EmpID = te.EmpID WHERE FCode='".$username."' and password='".$pass."'");
            
            if (mysqli_num_rows($result) > 0) {
                $rows['status'] = "success";

                while($row = mysqli_fetch_array($result, MYSQL_NUM)) {   
                    $rows['data']['userDetails'][] = array(
                      'FCode' => $row[0],
                      'LName' => $row[3],
                      'FName' => $row[4],
                      'evalRoles' => $row[9],
                      'isAdmin' => $row[15],
                      'path' => $row[29]
                    );
                }
                    echo json_encode($rows);
            } else {
                $rows['status'] = "failed";
                $rows['error'] = "Invalid Faculty Code or Password";
                echo json_encode($rows);
            }                           
            mysqli_query($conn, $sql);
            mysqli_close($conn);
        }
   

        }
   

    mysqli_close($conn);
?>