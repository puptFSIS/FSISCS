<?php

session_start();
$EmpID  = $_SESSION['CEmpID'];
include("config.php");

$makeupClass = $_GET['makeupClassID'];

$sql = "DELETE FROM tbl_makeup_class WHERE MakeupClassID = ".$makeupClass;
mysqli_query($conn,$sql);

header("Location: index.php?r=administrator/MakeupClassRequest");

mysqli_close($conn);

?>
