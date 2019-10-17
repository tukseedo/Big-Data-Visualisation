<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php
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

    include_once("../Model/orders_model.php");
    $shippingCost = new Orders();
    $ordersShipping = $shippingCost->getProductsByShipCost($locaArea, $selectedArea);

    $prod_name = array();
    $shipping_cost = array();
    foreach($ordersShipping as $orderDetails){
        array_push($prod_name, $orderDetails->{'Product Name'});
        array_push($shipping_cost, $orderDetails->{'Shipping Cost'});
    }

    //   Call View
    include("../View/dashboard.php");
    // Data Visualisation Will take Mid section
    include("../View/DataVisuals/shipped_loca_cost_view.php");
?>
<script type="text/javascript">
  // Putting Table inside view
  let displayInfo = document.getElementById('displayInfo');
  let tblInfo = document.getElementById('chart_div');
  displayInfo.parentNode.replaceChild(tblInfo, displayInfo);
</script>
