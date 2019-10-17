<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php
  $locaArea;
  $selectedArea;
  session_start();
  // Search Demiliter
  if(isset($_SESSION["fArea"]) && isset($_SESSION["fLocationSelected"])){
    $locaArea = $_SESSION["fArea"];
    $selectedArea = $_SESSION["fLocationSelected"];
  }
  else{
    $locaArea = 'Country';
    $selectedArea = 'South Africa';
  }

  include_once("../Model/orders_model.php");
  $locaOrder = new Orders();
  $locaOrderPriority = $locaOrder->getOrderPriority($locaArea, $selectedArea);

  // Order Priority array
  $orderPriorityVals = array();
  foreach ($locaOrderPriority as $value) {
    array_push($orderPriorityVals, $value->{'Order Priority'});
  }
  // getting number of duplicates of each value
  $orderPriorityKeys = array_count_values($orderPriorityVals);

  // Call View
  include("../View/dashboard.php");
  // Data Visualisation Will take Mid section
  include("../View/DataVisuals/loca_order_priority_view.php");
?>
<script type="text/javascript">
  // Putting Table inside view
  let displayInfo = document.getElementById('displayInfo');
  let pieChart = document.getElementById('piechart_3d');
  displayInfo.parentNode.replaceChild(pieChart, displayInfo)
</script>
