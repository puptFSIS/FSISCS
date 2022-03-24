<?php
session_start();

$EmpID = $_SESSION['CEmpID'];

include("config.php");

$makeupClassID = $_GET['makeupClassID'];

$sql="DELETE FROM tbl_makeup_class WHERE MakeupClassID =".$makeupClassID;

// do the query
$result=mysqli_query($conn,$sql);	

if($result) {
    header("Location: index.php?r=administrator/MakeupClassRequest");
}

mysqli_close($conn);
?>
