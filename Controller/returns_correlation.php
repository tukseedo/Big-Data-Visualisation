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
    // Data Visualisation Will take Mid section
    include("../View/returns_correlation_view.php");
?>
<script type="text/javascript">
  // Putting Table inside view
  let displayInfo = document.getElementById('displayInfo');
  let tblInfo = document.getElementById('tbl_div');
  displayInfo.parentNode.replaceChild(tblInfo, displayInfo);

  // Adding headings
  let midSection = document.getElementById('midSection');
  let heading  = document.getElementById('dataHeading');
  let subHeading  = document.getElementById('dataSubHeading');

  midSection.insertBefore(subHeading, midSection.childNodes[0]);
  midSection.insertBefore(heading, midSection.childNodes[0]);
</script>
