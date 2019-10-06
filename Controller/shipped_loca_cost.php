<?php
    require "../Model/vendor/autoload.php";
    include("../Model/db_connection.php");
    $connectionObj = new Connection();

    $locaArea = 'Region';
    $selectedArea = 'Southern Africa';
    $searchLimit = 20;
    // Getting 
    $orders_col = $connectionObj->getOrders_Collection();
    $ordersShipping = $orders_col->find(
        [$locaArea => $selectedArea],
        [
        'projection' => ['_id' => 0, 'Product Name' => 1, 'Shipping Cost' => 1],
        'limit' => $searchLimit
        ]
    );

    $prod_name = array();
    $shipping_cost = array();
    foreach($ordersShipping as $orderDetails){
        array_push($prod_name, $orderDetails->{'Product Name'});
        array_push($shipping_cost, $orderDetails->{'Shipping Cost'});
    }

    //   Call View
    include("../View/dashboard.php");
    $dashboardObj = new Dashboard();
    $dashboardObj->SearchNavbar();
    $dashboardObj->LeftBody();
    include("../View/shipped_loca_cost_view.php");
    $dashboardObj->RightBody();
    $dashboardObj->Footer();
?>