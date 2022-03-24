<?php

session_start();
$EmpID  = $_SESSION['CEmpID'];
include("config.php");
$makeupClass = $_GET['makeupClassID'];

$sql = "UPDATE tbl_makeup_class SET isApproved = 1 WHERE MakeupClassID = ".$makeupClass;
mysqli_query($conn,$sql);

header("Location: index.php?r=administrator/MakeupClassRequest");
mysqli_close($conn);

?>
