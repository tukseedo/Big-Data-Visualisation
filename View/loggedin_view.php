<?php
    include("./dashboard.php");
    $dashboardObj = new Dashboard();
    
    $dashboardObj->Header();
    
    $dashboardObj->LeftBody();
    $msg = '<h1>Welcome</h1><hr>
    <h3 id="dashMessage">Choose A Data Visualisation Sample On Left Side Bar</h3>';
    $dashboardObj->DefaultMidBody($msg);
    $dashboardObj->RightBody();

    $dashboardObj->Footer();
?>