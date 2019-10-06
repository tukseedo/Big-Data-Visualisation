<?php
    require "../Model/vendor/autoload.php";
    include("../Model/db_connection.php");
    $ordersObj = new Connection();
    
    // Delimiter
    $lifatsi = htmlspecialchars($_GET["selectedArea"]);

    session_start();
    $_SESSION["data_loca_filter"] = $lifatsi;
    // echo $lifatsi;
    $limit = null;

    $region_col = null;//$_SESSION["regionCollection"];
    try{
        $location_dump = array();
        $uniqueLocation = array();
        if(isset($region_col)){
        
        }
        else{
            $orders_col = $ordersObj->getOrders_Collection();
            $order_location = $orders_col->find(
                [],
                [
                    'projection' => ['_id' => 0, $lifatsi => 1],
                    'limit' => $limit,
                    'sort' => [$lifatsi => 1]
                ]
            );

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