<?php

    $m = $_POST['Month'];
    $y = $_POST['Year'];

    header('Location: index.php?r=administrator/IPCRreport3&m='.$m.'&y='.$y.'');

?>