<?php    
    include('config.php');
    session_start();

    $m = $_POST['Month'];
    $y = $_POST['Year'];
    // $dlinem = $_POST['dlinemonth'];
    // $dlinet = $_POST['dlinetime'];

    // echo $dlinem;
    // echo $dlinet;


    $sql = "SELECT * FROM tbl_ipcrvisible WHERE month = '$m' AND year = '$y'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);

    if($count == 0)
    {  
        $sql1 = "INSERT INTO tbl_ipcrvisible (month,year) VALUES ('".$m."','".$y."')";
        $result1 = mysqli_query($conn,$sql1);
        if($m=='JJ')
        {
            header('Location: index.php?r=administrator/IPCRcreatejantojune&m='.$m.'&y='.$y.'');
        }
        else if($m=='JD') {
            header('Location: index.php?r=administrator/IPCRcreatejultodec&m='.$m.'&y='.$y.'');
        }
    } else if($count > 0)
    {
        if($m=='JJ')
        {
            header('Location: index.php?r=administrator/IPCRcreatejantojune&m='.$m.'&y='.$y.'');
        }
        else if($m=='JD') {
            header('Location: index.php?r=administrator/IPCRcreatejultodec&m='.$m.'&y='.$y.'');
        }
    }

?> 