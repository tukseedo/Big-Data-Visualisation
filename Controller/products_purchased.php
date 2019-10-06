<?php
    require "../Model/vendor/autoload.php";
    include("../Model/db_connection.php");
    $ordersObj = new Connection();

    // Search Demiliter
    $locaArea = 'Country';
    $selectedArea = 'South Africa';
    $searchLimit = 20;

    $orders_col = $ordersObj->getOrders_Collection();
    $custOrders = $orders_col->find(
        [$locaArea => $selectedArea],
        [
            'projection' => ['_id' => 0, 'Product Name' => 1, 'Order Date' => 1, 'Ship Date' => 1],
            'limit' => $searchLimit,
            'sort' => ['Product Name' => 1]
        ]
    );   
    
    // Putting Product Names in array to make array unique
    $prodName = array();
    $orderDate = array();
    $shipDate = array();
    foreach($custOrders as $custArr){
        array_push($prodName, $custArr->{'Product Name'});

        // Formating Order Date
        $orderDateObj = DateTime::createFromFormat('m/d/Y', $custArr->{'Order Date'});
        $new_order_date_format = $orderDateObj->format('Y, m, d');
        // Formating Ship Date
        $shipDateObj = DateTime::createFromFormat('m/d/Y', $custArr->{'Ship Date'});
        $new_ship_date_format = $shipDateObj->format('Y, m, d');

        array_push($orderDate, $new_order_date_format);
        array_push($shipDate, $new_ship_date_format);
    }
    
    // Call View
    include("../View/dashboard.php");
    $dashboardObj = new Dashboard();
    $dashboardObj->SearchNavbar();
    $dashboardObj->LeftBody();
    // Data Visualisation Will take Mid section
    include("../View/products_purchased_view.php");
    $dashboardObj->RightBody();
    $dashboardObj->Footer();
?>