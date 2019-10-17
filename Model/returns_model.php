<?php
require "../Model/vendor/autoload.php";
include("../Model/db_connection.php");
  class Returns{
    public $connectionObj;
    public function __construct(){
      $this->connectionObj = new Connection();
    }

    public function getReturnsByOrder($locaArea, $selectedArea){
      $searchLimit = 20;
      // Getting Order_IDs from RETURNS
      $returns_col = $this->connectionObj->getReturns_Collection();
      $returns = $returns_col->find(
          [$locaArea => $selectedArea],
          [
            'limit' => $searchLimit,
            'sort' => ['Order ID' => 1]
          ]
      );
      return $returns;
    }
  }
?>
