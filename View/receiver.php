<?php
session_start();
    
    if(!empty($_GET["filteredArea"]) && !empty($_GET["filteredLocationSelected"])){
         
            $_SESSION["fArea"] = $_GET["filteredArea"];
            $_SESSION["fLocationSelected"] = $_GET["filteredLocationSelected"];

            $displayMsg = "Filtered Area: ". $_SESSION["fArea"] ." --- Filtered Location Selected: ". $_SESSION["fLocationSelected"];

      }
      // echo $displayMsg;
?>