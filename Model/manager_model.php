<?php
  require "../Model/vendor/autoload.php";
  include("../Model/db_connection.php");
  class Manager{
    private $conn;
    private $colPeople;
    private $colManaCred;

    public function __construct(){
      $this->conn = new Connection();
      $this->colPeople = $this->conn->getPeople_Collection();
      $this->colManaCred = $this->conn->getUserCred_Collection();
    }

    // Retrieving User Details for confirmation
    public function getManagerName($manName){
      $managerDetails = $this->colPeople->findOne(
        ['Person' => $manName],
        [
          'projection' => ['_id' => 0, 'Person' => 1]
        ]
      );
      return $managerDetails;
    }

    public function getRegion($manName){
      $managerRegion = $this->colPeople->findOne(
        ['Person' => $manName],
        [
          'projection' => ['_id' => 0, 'Region' => 1]
        ]
      );
      return $managerRegion->Region;
    }

    // mainly for login purposes
    public function getMangerDetails($managerID){
      $getManDetails = $this->colManaCred->findOne(
        ['ManagerID' => $managerID],
        [
          'projection' => ['_id' => 0, 'ManagerID' => 1, 'Person' => 1, 'Password' => 1]
        ]
      );
      return $getManDetails;
    }

  // mainly for sign-up purposes
    public function insertManagerCredential($manID, $manNames, $manEmail, $manPass){
      $insertManager = $this->colManaCred->insertOne([
        'ManagerID' => $manID,
        'Person' => $manNames,
        'Email' => $manEmail,
        'Password' => $manPass
      ]);
      return $insertManager->getInsertedId();
    }

    // for manager registering to the program
    public function constructManagerID($f_name, $l_name, $reg){
       return $constructedManID = ord(substr($f_name, 0, 1)) . ord(substr($l_name, 0, 1)) . ord(substr($reg, 0, 1)) . ord(substr(strtoupper($l_name), (strlen($l_name) - 1), 1));
    }
  }
?>
