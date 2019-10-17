<?php
  // if(isset($_COOKIE['userName'])){
  //   $uname = $_COOKIE['userName'];
  //   unset($_COOKIE['userName']);
  //
  //   setcookie('userName', $uname, time() - 1);
  // }
  // session_start();
  // session_destroy();
?>
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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="javascript:myFunc()">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="#signupModal" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <!-- Sign Up Modal -->
      <?php include_once("sign_up.php"); ?>
        <li><a href="#loginModal" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <!-- Login Modal -->
        <?php include_once("login.php"); ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <!-- <div class="col-sm-2 sidenav">
    </div> -->
    <div class="col-sm-12 text-center">
      <h1>Welcome To Global Superstore</h1>
      <hr>
      <h3>Big-Dreams Big-Desires Big-Data</h3>
    </div>
    <!-- <div class="col-sm-2 sidenav">
    </div> -->
  </div>
</div>

<footer class="container-fluid text-center" style="position:fixed; left: 0; bottom: 0; width: 100%;">
  <p>Global Superstore</p>
</footer>

<!--  -->
<script src="../Content/script/user_cred_post.js"></script>
</body>
</html>
