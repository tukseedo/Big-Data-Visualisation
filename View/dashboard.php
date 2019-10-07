<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Visualisation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../Content/css/home_dash.css">

</head>
<body>
<!-- Header -->
<nav class="navbar navbar-inverse">
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
<div id="locationSearchHeading"></div>

<!-- Left Body -->
<div class="container-fluid text-center" style="height: 1000px;">
  <div class="row content" style="height: 100%;">

          <div class="col-sm-2 sidenav">
            <p><a href="javascript:visualisationSearch('returns_correlation')">Correlation of returns with location</a></p>
            <p><a href="javascript:visualisationSearch('products_purchased')">Products purchased</a></p>
            <p><a href="javascript:visualisationSearch('shipped_loca_cost')">Product shipping cost</a></p>

            <div class="well" style="position: relative; top: 50px;">
              <p>ADS</p>
            </div>
            <div class="well" style="position: relative; top: 50px;">
              <p>ADS</p>
            </div>
          </div>


          <!-- Middle Section -->
          <div class="col-sm-8 text-left" id="midSection" style="height: 100%; width: 1070px;">
            <div id="displayInfo">
              <h1>Welcome</h1><hr>
              <h3 id="dashMessage">Choose A Data Visualisation Sample On Left Side Bar</h3>
            </div>
          </div>

          <!-- Rigth Body -->
          <!-- <div class="col-sm-2 sidenav" id="rightSideNav">
            
          </div> -->

  </div>
</div>

<!-- Footer -->
  <!-- <footer class="container-fluid text-center">
      <p>Footer Text</p>
  </footer> -->

  <script src="../Content/script/select_location.js"></script>
  <script src="../Content/script/data_location_filter.js"  type="text/javascript"></script>

</body>
</html>