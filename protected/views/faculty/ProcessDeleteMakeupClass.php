<?php
session_start();

$EmpID = $_SESSION['CEmpID'];

include("config.php");

$makeupClassID = $_GET['makeupClassID'];

$sql="DELETE FROM tbl_makeup_class WHERE MakeupClassID =".$makeupClassID;

// do the query
$result=mysqli_query($conn, $sql);

if($result) {
    header("Location: index.php?r=faculty/MakeupClassRequest&mes=3");
}

mysqli_close($conn);
?>
