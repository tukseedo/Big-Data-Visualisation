<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Visualisation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <!-- <script src="../Content/jquery-3.4.1.js"></script> -->
  <link rel="stylesheet" href="../Content/css/home_dash.css">

</head>
<body>
<!-- <button id="btnClick">ClickMe</button> -->
<!-- Header -->
<!-- <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Logo</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Projects</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </div>
        </div>
      </nav> -->

<!-- Filter the Data With Locational Searches      -->
<!-- <div id="locationSearchHeading"></div> -->

<!-- Left Body -->
<!-- <div class="container-fluid text-center">     -->
  <!-- <div class="row content"> -->

          <!-- <div class="col-sm-2 sidenav">
            <p><button id="returnsCorrelation" onclick="myReturnsCorrelation()">Correlation of Returns with Location</button></p>
            <p><a href="../Controller/products_purchased.php">Products Purchased</a></p>
            <p><a href="../Controller/shipped_loca_cost.php">Product Shipping Cost</a></p>
          </div> -->
        
          
          <!-- Middle Section -->
          <!-- class="col-sm-8 text-left"  -->
          <!-- <div class="col-sm-8 text-left" id="midSection" style="height: 100%;">
          <h4 id="disMsg"></h4>
            <h1>Welcome</h1><hr>
            <h3 id="dashMessage">Choose A Data Visualisation Sample On Left Side Bar</h3>
          </div> -->

          <!-- Rigth Body -->
          <!-- <div class="col-sm-2 sidenav">
            <div class="well">
              <p>ADS</p>
            </div>
            <div class="well">
              <p>ADS</p>
            </div>
          </div> -->

  <!-- </div> -->
<!-- </div> -->

<!-- Footer -->
<!-- <footer class="container-fluid text-center">
        <p>Footer Text</p>
      </footer> -->

  <?php
  
    class Dashboard{
      function __construct(){}

      // Header 
      function Header(){
        
        echo '<nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Logo</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Projects</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>

<!-- Filter the Data With Locational Searches      -->
<div id="locationSearchHeading"></div>';
      }

      // Filter the Data With Locational Searches
      function SearchNavbar(){
        echo "<nav class='navbar navbar-inverse'>
        <ul class='nav navbar-nav' id='linkHeadings' style='width: 50em;'>
          <p class='navbar-text'>Select Location:</p>
          <li><a href='javascript:getSelectedLocation(\"Country\");' id='Country'>Country</a></li>
          <li><a href='javascript:getSelectedLocation(\"Region\");' id='Region'>Region</a></li>
          <li><a href='javascript:getSelectedLocation(\"State\");' id='State'>State</a></li>
          <li><a href='javascript:getSelectedLocation(\"City\");' id='City'>City</a></li>
          <li style='top: 7px; width: 15em;'>
              <select class='form-control col-sm-4' name='selectedArea' id='selectedArea' > <!-- onchange='getSelectedArea()' -->
                <option value=>Select Value</option>
              </select>
          </li>
          <li><a href='javascript:dataLocationFilter()' style='background-color: rgb(49, 60, 75); left: 20px; border-radius: 15%; padding-bottom: 15%;'>Search</a></li>
        </ul>
      </nav>";
      }

      function LeftBody(){
        echo '<div class="container-fluid text-center">    
        <div class="row content">
        
          <div class="col-sm-2 sidenav">
            <p><button id="returnsCorrelation" onclick="myReturnsCorrelation()">Correlation of Returns with Location</button></p>
            <p><a href="../Controller/products_purchased.php">Products Purchased</a></p>
            <p><a href="../Controller/shipped_loca_cost.php">Product Shipping Cost</a></p>
          </div>
        
          <div class="col-sm-8 text-left" id="midSection" style="height: 100%;"> 
          '; // MID SECTION STARTS
      }
      function DefaultMidBody($message){
        echo $message;
      }
      function RightBody(){
        // MID SECTION ENDS
        echo '</div>

              <div class="col-sm-2 sidenav">
                <div class="well">
                  <p>ADS</p>
                </div>
                <div class="well">
                  <p>ADS</p>
                </div>
              </div>

            </div>
          </div>';
      }

      function Footer(){
        echo '<footer class="container-fluid text-center">
        <p>Footer Text</p>
      </footer>';
      }
    }

  ?>

  <script src="../Content/script/select_location.js"></script>
  <script src="../Content/script/data_location_filter.js"></script>

<script>
  let dataVisual;
  function setDataVisual(dataType){
    dataVisual = dataType;
  }

  function displayDashMessage(){
    let dashMessage = document.getElementById('dashMessage');
    let parag = document.createElement('h3');
    parag.innerHTML = 'Now Choose A Location, Choose An Area Within The Location Then Search --- This Will Display The Correlation Of Returns With Location';

    dashMessage.parentNode.replaceChild(parag, dashMessage);
  }
  
  // Calling Returns Correlation
  function myReturnsCorrelation(){
    $("#locationSearchHeading").load("searchLocation.php");
        setDataVisual("returns_correlation");
        displayDashMessage()
  }

  // Calling Products Purchased
  function myProductsPurchased(){

  }

  // Calling Shipped Location Cost
  function myShippedLocationCost(){
    
  }

  function dataLocationFilter(){
    let selectedLocation = document.getElementById('selectedArea');
    let value_selectedLocation =selectedLocation.options[selectedLocation.selectedIndex].value;

    // Sending Selected Index Value and Area Name for Data Visualisation
    if(dataVisual == 'returns_correlation'){
        $.get('/Global_Superstore/View/receiver.php', {filteredArea: area, filteredLocationSelected: value_selectedLocation},
        function(data){
          location.href = "http://localhost//Global_Superstore/Controller/returns_correlation.php";
        });
        // location.href = "http://localhost//Global_Superstore/View/receiver.php";
        // $("#midSection").load("receiver.php");
    }
    if(dataVisual == 'products_purchased'){
      $.get('/Global_Superstore/View/receiver.php', {filteredArea: area, filteredLocationSelected: value_selectedLocation},
        function(data){
          location.href = "http://localhost//Global_Superstore/Controller/products_purchased.php";
        });
    }
    if(dataVisual = 'shipped_loca_cost'){
      $.get('/Global_Superstore/View/receiver.php', {filteredArea: area, filteredLocationSelected: value_selectedLocation},
        function(data){
          location.href = "http://localhost//Global_Superstore/Controller/shipped_loca_cost.php";
        });
    }
  }
  </script>
</body>
</html>