<?php 

    include("config.php");
    $EmpID= "";
    if(isset($_SESSION['CEmpID'])) {
        $EmpID = $_SESSION['CEmpID'];
    } else {
        die(header("Location: index.php?r=site/index"));
    }
    $sql = "SELECT * FROM tbl_evaluationfaculty WHERE EmpID='$EmpID'";
    $result=mysqli_query($conn,$sql);
    //$count=mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    $role = $row['evalRoles'];
 ?>