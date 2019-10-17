<?php
// Array Keys
  // $array = array(12,43,66,21,56,43,43,78,78,100,43,43,43,21);
  // $vals = array_count_values($array);
  // echo 'No. of NON Duplicate Items: '.count($vals).'<br><br>';
  // print_r($vals);
?>

  <!-- // Password Validation -->
<!-- <!DOCTYPE html>
<html lang="en">
   <head>
  <meta charset="utf-8">
  <title>JavaScript form validation - Password Checking - 4</title>
  <link rel='stylesheet' href='form-style.css' type='text/css' />
  </head>
  <body onload='document.form1.text1.focus()'>
  <div class="mail">
  <h2>Input Password and Submit [8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character]</h2>
  <form name="form1" action="#">
  <ul>
  <li><input type='text' name='text1'/></li>
  <li class="rq">*Enter numbers only.</li>
  <li>&nbsp;</li>
  <li><input type="submit" name="submit" value="Submit" onclick="CheckPassword(document.form1.text1)" /></li>
  <li>&nbsp;</li>
  </ul>
  </form>
  </div>
  <script>
    function CheckPassword(inputtxt){
      let passwordReg=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*\s).{8,15}$/;
      if(passwordReg.test(inputtxt.value)){
        alert('Correct, try another...');
        return true;
      }
      else{
        alert('Password must be 8 to 15 characters containing contain at least one lowercase letter, one uppercase letter, one numeric digit and one special character');
        return false;
      }
    }
  </script>
  </body>
</html>-->

<!-- Comparing characters -->
 <!-- Use strcmp() function
 $hashStr = '123awq#W';
 $trialHash = array('1'=>'a','a'=>'1','b'=>'2','c'=>'3','W'=>'4');
 for($i = 0; $i < strlen($hashStr); $i++){
 	foreach(array_keys($trialHash) as $use){
 		if(strcmp($use, substr($hashStr, $i, 1)) == 0){
 			echo "true <br/>";
 			break;
 		}
 		else{
 			echo "false <br/>";
 		}
 	}
 } -->
