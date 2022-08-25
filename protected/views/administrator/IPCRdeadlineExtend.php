<?php 
    include('config.php');
    session_start();

    $dline = $_POST['dlinedatetime'];
    $fcode = $_POST['fcode'];
    $m = $_POST['month'];
    $y = $_POST['year'];

    $sql = "UPDATE tbl_ipcrstatus SET dline_date='$dline' WHERE month='$m' AND year='$y' AND fcode='$fcode'";
    $result=mysqli_query($conn,$sql);

    header('Location: index.php?r=administrator/IPCRdeadlineExtend2&m='.$m.'&y='.$y.'&mess=1');
?>