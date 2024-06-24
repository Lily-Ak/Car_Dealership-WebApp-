<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $salutation = $_POST["salutation"];
  $firstName = $_POST["first_name"];
  $lastName = $_POST["last_name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $phone = $_POST["phone"];
  $confirm_password = $_POST['confirm_password'];

  // Your database connection code here

  $conn = new mysqli('luther.aserv.co.za', 'mrranisu_ranger_db', "'Ranger123'", 'mrranisu_ranger_db');
  $servername = "luther.aserv.co.za";
  $username = "mrranisu_ranger_db";
  $password = "'Ranger123'";
  $dbname = "mrranisu_ranger_db";

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // You should use a secure password hashing method like bcrypt in a real-world scenario
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Check if email or phone number already exists
  $checkQuery = "SELECT * FROM registration WHERE email='$email' OR phone='$phone'";
  $result = $conn->query($checkQuery);

  if ($result->num_rows > 0) {
    echo "Email or phone number already exists. Please use a different email or phone number.";
  } else {
    // Check if password and confirm password match
    if ($password !== $confirmPassword) {
      echo "Password and confirm password do not match. Please make sure they are the same.";
    } else {
      // You should use a secure password hashing method like bcrypt in a real-world scenario
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // SQL query to insert data into the database table
      $sql = "INSERT INTO registration (salutation, first_name, last_name, email, phone, password) VALUES ('$salutation', '$firstName', '$lastName', '$email', '$phone', '$hashedPassword')";

      if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }

  $conn->close();
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
      <form action="register.php" class="sign-in-form" method="post">
          <!-- Add name attribute to input fields for form data submission -->
          <h3 class="title">Sign up</h3>
          <div class="input-field">
              <i class="fas fa-user"></i>
              <select name="salutation" required>
                  <option value="Mr">Mr</option>
                  <option value="Mrs">Mrs</option>
                  <option value="Dr">Dr</option>
                  <option value="Miss">Miss</option>
                  <option value="Professor">Professor</option>
              </select>
          </div>
          <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="first_name" placeholder="First Name" pattern="[A-Za-z\s]+" required />
          </div>
          <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="last_name" placeholder="Last Name" pattern="[A-Za-z]+" required />
          </div>
          <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" pattern="^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$" required />
          </div>
          <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="tel" name="phone" placeholder="Phone Number" pattern="[0-9]{10}" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" title="Password must contain: Minimum 8 characters atleast 1 Alphabet and 1 Number"
            placeholder="Password" required pattern="^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$" />
          </div>
          <!-- Add Confirm Password Field -->
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required />
          </div>
          <input type="submit" class="btn mar" value="Sign up" />
          <!-- ... Rest of the form ... -->
          
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <button class="btn transparent" id="sign-in-btn" onclick="redirectToIndex()">
            Sign in
          </button>
        </div>
        <img src="img/1547796795.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script>
    function redirectToIndex() {
        window.location.href = "login_register.php";
    }
</script>
  
  
  <!-- JavaScript to display the success message -->
  <script>
  // Check if the URL has a success parameter (set during successful registration)
  const urlParams = new URLSearchParams(window.location.search);
  const successMessage = urlParams.get('success');
  if (successMessage === 'true') {
    alert('Registration successful!'); // Display the success message as a pop-up
    // Remove the success parameter from the URL to prevent repeated alerts on refresh
    const newUrl = window.location.href.replace('?success=true', '');
    window.history.replaceState({}, document.title, newUrl);
  }
</script>

</body>
</html>