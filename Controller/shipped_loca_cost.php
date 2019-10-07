<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php
    require "../Model/vendor/autoload.php";
    include("../Model/db_connection.php");
    $connectionObj = new Connection();

    session_start();
    // Search Demiliter
    if(isset($_SESSION["fArea"]) && isset($_SESSION["fLocationSelected"])){
      $locaArea = $_SESSION["fArea"];
      $selectedArea = $_SESSION["fLocationSelected"];
    }
    else{
      $locaArea = 'Region';
      $selectedArea = 'Southern Africa';
    }
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
    // Data Visualisation Will take Mid section
    include("../View/shipped_loca_cost_view.php");
?>
<script type="text/javascript">
  // Putting Table inside view
  let displayInfo = document.getElementById('displayInfo');
  let tblInfo = document.getElementById('chart_div');
  displayInfo.parentNode.replaceChild(tblInfo, displayInfo);
</script>
