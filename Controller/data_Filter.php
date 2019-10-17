<?php
    // Delimiter
    $lifatsi = htmlspecialchars($_GET["selectedArea"]);

    session_start();
    $_SESSION["data_loca_filter"] = $lifatsi;

    $limit = null;

    $region_col = null;
    try{
        $location_dump = array();
        $uniqueLocation = array();
        if(isset($region_col)){
          echo "Could Not Read Data";
        }
        else{
            // Data filter for the drop down list
            include_once("../Model/orders_model.php");
            $allOrders = new Orders();
            $order_location = $allOrders->getAllOrders($lifatsi, $limit);

            foreach($order_location as $getLocation){
                array_push($location_dump, $getLocation->$lifatsi);
            }
            $uniqueLocation = array_unique($location_dump);
            foreach($uniqueLocation as $uniLoca){
                print_r($uniLoca. ".");
            }
        }
    }
    catch(MongoDB\Exception\Exception $e){
        echo "Exception:", $e->getMessage(), "\n";
        echo "In file:", $e->getFile(), "\n";
        echo "On line:", $e->getLine(), "\n";
    }
?>
