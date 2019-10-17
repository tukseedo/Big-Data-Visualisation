<?php
require "../Model/vendor/autoload.php";
include("../Model/db_connection.php");
  class Orders{
    private $ordersObj;
    public function __construct(){
      $this->ordersObj = new Connection();
    }

    public function getAllOrders($lifatsi, $limit){
      $orders_col = $this->ordersObj->getOrders_Collection();
      $order_location = $orders_col->find(
          [],
          [
              'projection' => ['_id' => 0, $lifatsi => 1],
              'limit' => $limit,
              'sort' => [$lifatsi => 1]
          ]
      );
      return $order_location;
    }

    public function getProductsByShipDate($locaArea, $selectedArea){
      $searchLimit = 20;

      $orders_col = $this->ordersObj->getOrders_Collection();
      $custOrders = $orders_col->find(
          [$locaArea => $selectedArea],
          [
              'projection' => ['_id' => 0, 'Product Name' => 1, 'Order Date' => 1, 'Ship Date' => 1],
              'limit' => $searchLimit,
              // 'sort' => ['Product Name' => 1]
          ]
      );
      return $custOrders;
    }

    public function getProductsByShipCost($locaArea, $selectedArea){
      $searchLimit = 20;
      $orders_col = $this->ordersObj->getOrders_Collection();
      $ordersShipping = $orders_col->find(
          [$locaArea => $selectedArea],
          [
            'projection' => ['_id' => 0, 'Product Name' => 1, 'Shipping Cost' => 1],
            'limit' => $searchLimit
          ]
      );
      return $ordersShipping;
    }

    public function getOrderPriority($locaArea, $selectedArea){
      $searchLimit = 20;
      $orders_col = $this->ordersObj->getOrders_Collection();
      $orderPriority = $orders_col->find(
        [$locaArea => $selectedArea],
        [
          'projection' => ['_id' => 0, 'Order Priority' => 1],
          // 'limit' => $searchLimit,
          'sort' => ['Order Priority' => 1]
        ]
      );
      return $orderPriority;
    }
  }
?>
