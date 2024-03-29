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
    $prodPurchase = new Orders();
    $custOrders = $prodPurchase->getProductsByShipDate($locaArea, $selectedArea);

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
    // Data Visualisation Will take Mid section
    include("../View/DataVisuals/products_purchased_view.php");
?>
<script type="text/javascript">
  // Putting Table inside view
  let displayInfo = document.getElementById('displayInfo');
  let tblInfo = document.getElementById('timeline');
  displayInfo.parentNode.replaceChild(tblInfo, displayInfo);

  // Adding headings
  let midSection = document.getElementById('midSection');
  let heading  = document.getElementById('dataHeading');
  let subHeading  = document.getElementById('dataSubHeading');

  midSection.insertBefore(subHeading, midSection.childNodes[0]);
  midSection.insertBefore(heading, midSection.childNodes[0]);
</script>
