function loginUser(){
  let user_id = $("#userID").val();
  let loginPass = $("#loginPassword").val();
  if(user_id != "" && loginPass != ""){
    $.get('/Global_Superstore/Controller/user_credentials.php', {userID: user_id, userPassword: loginPass}, function(data){
      console.log(data);
      if(data == "Successful"){
        location.href = "http://localhost/Global_Superstore/View/dashboard.php";
      }
      else{
        alert("You Have Entered Incorrect Details : " + data);
      }
    });
  }
}

function signupUser(){
  let fName = $("#first_name").val();
  let lName = $("#last_name").val();
  let region = document.getElementById('selectedArea');
  let region_value = region.options[region.selectedIndex].value;
  let inputEmail = $("#email").val();
  let mail = false;
  // Validate email
  let emailReg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  if(emailReg.test(inputEmail) == false){
    alert("Please enter valid email");
  }
  else {
    mail = true;
  }
  // Validate password
  let passConfirmed = false;
  if($("#signupPassword").val() == $("#confPass").val() && $("#signupPassword").val() != ""){
    // configurng password pattern
    let passwordReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.*\s).{8,15}$/;
    if(passwordReg.test($("#signupPassword").val())){
      passConfirmed = true;
    }
    else{
      alert('Password must be 8 to 15 characters containing contain at least one lowercase letter, one uppercase letter, one numeric digit and one special character');
    }
  }
  else{
    alert("Passwords are not the same");
  }

  if(fName != "" && lName != "" && mail == true && passConfirmed == true){
    $.get('/Global_Superstore/Controller/user_credentials.php', {first_name: fName, last_name: lName, region: region_value, email: inputEmail, userPassword: $("#signupPassword").val()}, function(data){
      if(data == "Sign-up Successful - Check Email for User ID"){
        alert(data);
      }
      else{
        alert(data);
      }
    });
  }
}
