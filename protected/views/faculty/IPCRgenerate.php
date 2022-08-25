<?php 
    include('config.php');
    session_start();
	$m = $_POST['Month'];
    $y = $_POST['Year'];
    // $fcode = $_POST['fcode'];
 
   header('Location: index.php?r=faculty/IPCRfaculty&m='.$m.'&y='.$y.'');