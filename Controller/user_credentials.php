<?php
  $first_name; $last_name; $region; $email; $userID; $password; $userName;

  if(isset($_GET["first_name"])){
      $first_name = htmlspecialchars($_GET["first_name"]);
  }
  if(isset($_GET["last_name"])){
      $last_name = htmlspecialchars($_GET["last_name"]);
  }
  if(isset($_GET["region"])){
      $region = htmlspecialchars($_GET["region"]);
  }
  if(isset($_GET["email"])){
      $email = htmlspecialchars($_GET["email"]);
  }
  if(isset($_GET["userID"])){
      $userID = htmlspecialchars($_GET["userID"]);
  }
  if(isset($_GET["userPassword"])){
      $password = htmlspecialchars($_GET["userPassword"]);
  }

    // procedure for sign-up
  if(isset($first_name) && isset($last_name)){
    userSignUp($first_name, $last_name, $region, $email, $password);
  }
  function userSignUp($first_name, $last_name, $region, $email, $password){
    include("../Model/manager_model.php");
    $manager = new Manager();
    $managerName = $manager->getManagerName(($first_name ." ". $last_name));

    if(isset($managerName)){
      $managerRegion = $manager->getRegion(($first_name ." ". $last_name));
      if($managerRegion == $region){
        // creating manager id
        $managerID = $manager->constructManagerID($first_name, $last_name, $region);

        // calling cypher 
        $cypherdPswd = cypherPassword($password);
        $manIDCyphered = cypherPassword($managerID);
        // check if it's a real email
        $emailResponse = sendEMail($email, $managerID);
        if($emailResponse == 'Email has been sent'){
          // inserting into data set
          $_id = $manager->insertManagerCredential($manIDCyphered, ($first_name ." ". $last_name), $email, $cypherdPswd);
          echo "Sign-up Successful - Check Email for User ID";
        }
        else{
          // Provide valid email
          echo "Please Provide A Valid Email";
        }
      }
      else{
        // display invalid manager alert
        echo "Invalid Credentials";
      }
    }
    else{
      // display invalid user name alert
      echo "Invalid Credentials";
    }
  }

  // cyphering manager password
  function cypherPassword($pswd){
    include_once("../PHPMailer/hash.php");
    $hashPswd = new Hash();
    $userPswd = $hashPswd->cypher($pswd);
    return $userPswd;
  }
  // decypher manager password
  function decypherPassword($pswd){
    include_once("../PHPMailer/hash.php");
    $hashPswd = new Hash();
    $userPswd = $hashPswd->decypher($pswd);
    return $userPswd;
  }
  // use manID to send email
  function sendEMail($manEmail, $man_id){
    include_once("../PHPMailer/send_email.php");
    return sendAuthMessage($manEmail, $man_id);
  }

  // procedure for login
  if(isset($userID)){
    userLogin($userID, $password);
  }
  function userLogin($userID, $password){
    // using cyphered user name to get details
    $cypheredUserID = cypherPassword($userID);

    if(isset($cypheredUserID)){
      include_once("../Model/manager_model.php");
      $manager = new Manager();
      $manDetails = $manager->getMangerDetails($cypheredUserID);

      $decypheredPass = decypherPassword($manDetails->Password);
      if($password == $decypheredPass){
        // setcookie("userName", $manDetails->Person, time() + 86400, "/Global_Superstore/View/dashboard.php");
        session_start();
        $_SESSION['userName'] = $manDetails->Person;
        echo "Successful";

      }
      else {
        echo "Incorrect Password";
      }
    }
    else{
      // display invalid username
      echo "Unsuccessful";
    }
  }
?>
