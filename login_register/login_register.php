<?php

require_once 'db_config.php';
$errors = [];

    //if user click login button
    if(isset($_POST['login'])){
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $check_email = "SELECT * FROM users WHERE email = '$email'";
      $res = mysqli_query($conn, $check_email);
      if(mysqli_num_rows($res) > 0){
          $fetch = mysqli_fetch_assoc($res);
          $fetch_pass = $fetch['password'];
          if(password_verify($password, $fetch_pass)){
              session_start();
              $status = $fetch['status'];
              if($status == 'verified'){
                $_SESSION['user_session'] = $fetch['id'];
                $_SESSION['email'] = $fetch['email'];
                $_SESSION['last_name'] = ucwords(strtolower($fetch['last_name']));
                $_SESSION['phone'] = $fetch['phone'];
                $_SESSION['first_name'] = ucwords(strtolower($fetch['first_name']));
                $_SESSION['is_signed_in'] = true;
                // $_SESSION['password'] = $password;
                  header('location: ../index.php');
              }else{
                  $info = "It looks like you haven't still verified your email - $email";
                  $_SESSION['info'] = $info;
                  
                  generateOtp($conn, $email);
                  echo '<script>alert("It looks like you haven\'t still verified your email - ' . $email . '"); window.location.href="login_register.php";</script>';
                  header('location: user-otp.php');
              }
          }else{
              $errors['email'] = "Incorrect email or password!";
               echo '<script>alert("Incorrect email or password!"); window.location.href="login_register.php";</script>';
          }
      }else{
          $errors['email'] = "User does not exist !";
          echo '<script>alert("User does not exist!"); window.location.href="login_register.php";</script>';
      }
  }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="loginStyle.css" />
  <title>Sign in & Sign up Form</title>
  <link rel="icon" type="image/x-icon" href="..\img\favicon.ico">

</head>
<body>
  <button class="back" onclick="history.back()">Back</button>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
      <form action="login_register.php" class="sign-in-form" method="post">
          <!-- Add name attribute to input fields for form data submission -->
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" name="email" placeholder="Email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="pwd" placeholder="Password" required />
            <span><i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i></span>
          </div>
          <a href="forgot-password.php">forgot password</a>
          <input type="submit" value="Login" name="login" class="btn solid" />
        </form>
      </div>
    </div>

     <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img\1547250986.svg" class="image" alt="" />
      </div>
    </div>
  </div>
  
  <script>
  // Add event listener to the sign-up button
  document.getElementById("sign-up-btn").addEventListener("click", function() {
    window.location.href = "SignUp.php";
  });
</script>
  
  <!-- JavaScript to display the success message -->
  <script>
  // Check if the URL has a success parameter (set during successful registration)
  const urlParams = new URLSearchParams(window.location.search);
  const successMessage = urlParams.get('success');
  if (successMessage === 'true') {
    alert('Registration successful! now you can log in'); // Display the success message as a pop-up
    // Remove the success parameter from the URL to prevent repeated alerts on refresh
    const newUrl = window.location.href.replace('?success=true', '');
    window.history.replaceState({}, document.title, newUrl);
  }
</script>

<script>
  var state= false;
  function toggle(){
    if(state){
      document.getElementById("pwd").setAttribute("type","password");
      document.getElementById("eye").style.color="blue";
      state = false;
    }
    else{
      document.getElementById("pwd").setAttribute("type","text");
      document.getElementById("eye").style.color="red";
      state = true;
    }
  }
</script>


  <!--<script src="app.js"></script>-->
</body>
</html>