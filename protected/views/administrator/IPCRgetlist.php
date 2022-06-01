<?php

    $m = $_POST['Month'];
    $y = $_POST['Year'];

    header('Location: index.php?r=administrator/IPCRlist&m='.$m.'&y='.$y.'');
 
?> 