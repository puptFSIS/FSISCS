<?php    
    include('config.php');
    session_start();
 
    $m = $_POST['Month'];
    $y = $_POST['Year'];

    header('Location: index.php?r=administrator/IPCR&m='.$m.'&y='.$y.'');
?> 