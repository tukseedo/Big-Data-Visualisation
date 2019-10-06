<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<div id="reCo">
  
</div>
<?php
    require "../Model/vendor/autoload.php";
    include("../Model/db_connection.php");
    $connectionObj = new Connection();

    session_start();
// echo $displayMsg = "Filtered Area: ". $_SESSION["fArea"] ." --- Filtered Location Selected: ". $_SESSION["fLocationSelected"];
    if(isset($_SESSION["fArea"]) && isset($_SESSION["fLocationSelected"])){
      $locaArea = $_SESSION["fArea"];
      $selectedArea = $_SESSION["fLocationSelected"];
    }
    else{
      $locaArea = 'Region';
      $selectedArea = 'Southern Africa';
    }

    $searchLimit = 20;
    // Getting Order_IDs from RETURNS
    $returns_col = $connectionObj->getReturns_Collection();
    $returns = $returns_col->find(
        [$locaArea => $selectedArea],
        [
          'limit' => $searchLimit,
          'sort' => ['Order ID' => 1]
        ]
    );   
    // Putting Product_Names & Region in array using Order_ID
    $orders_col = $connectionObj->getOrders_Collection();
    $prod_name = array();
    $region = array();
    foreach($returns as $custOrder){
        $orders = $orders_col->findOne(
          ['Order ID' => $custOrder->{'Order ID'}]
        );
        array_push($prod_name, $orders->{'Product Name'});
        array_push($region, $orders->Region);
    }
    
    // Call View
    include("../View/dashboard.php");
    $dashboardObj = new Dashboard();
    $dashboardObj->Header();
    // $dashboardObj->SearchNavbar();
    $dashboardObj->LeftBody();
    // // Data Visualisation Will take Mid section
    include("../View/returns_correlation_view.php");
    $dashboardObj->RightBody();
    $dashboardObj->Footer();
?>