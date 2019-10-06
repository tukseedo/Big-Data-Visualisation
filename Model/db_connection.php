<?php
    class Connection{
        private $conn;
        private $db;
        public function __construct(){
            $this->conn = new MongoDB\Client("mongodb://tukseedo:tukseedo123@localhost:27017/global_superstore");
            if(isset($this->conn)){
                $this->db = $this->conn->global_superstore;
            }
        }
        
        public function getOrders_Collection(){
            return $orders_col = $this->db->orders_2016;
        }
        public function getPeople_Collection(){
            return $people_col = $this->db->people;
        }
        public function getReturns_Collection(){
            return $returns_col = $this->db->returns_2016;
        }
        public function getUserCred_Collection(){
            return $userCred_col = $this->db->userCredentials;
        }
    }
?>