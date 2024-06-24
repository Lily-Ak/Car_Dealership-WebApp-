<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location: admin_login.php');
}

if (isset($_POST['submit'])) {

    // Sanitize and validate user inputs
    $salutation = $_POST['salutation'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $message = array(); // Store error/success messages

    // Validate Salutation
    $allowed_salutations = ['Mr', 'Mrs', 'Dr', 'Miss'];
    if (!in_array($salutation, $allowed_salutations)) {
        $message[] = 'Invalid salutation. Please select from Mr, Mrs, Dr, Miss.';
    }

    // Validate Name and Surname
    if (!preg_match("/^[A-Za-z]+$/", $name) || !preg_match("/^[A-Za-z]+$/", $surname)) {
        $message[] = 'Invalid name or surname. Only letters allowed.';
    }

    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message[] = 'Invalid email format.';
    }

    // Validate Phone Number (must be 10 digits)
    $phone_number = preg_replace('/[^0-9]/', '', $phone_number); // Remove non-numeric characters
    if (strlen($phone_number) !== 10) {
        $message[] = 'Invalid phone number. It should be 10 digits.';
    }

    // Check if password and confirm password match
    if ($pass !== $cpass) {
        $message[] = 'Password and Confirm Password do not match.';
    }
    
        // Check if the email already exists
    $check_email_query = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $check_email_query->execute([$email]);
    if ($check_email_query->fetch()) {
        $message[] = 'Email is already in use.';
    }

    // Check if the phone number already exists
    $check_phone_query = $conn->prepare("SELECT * FROM admins WHERE phone_number = ?");
    $check_phone_query->execute([$phone_number]);
    if ($check_phone_query->fetch()) {
        $message[] = 'Phone number is already in use.';
    }


    // If there are no error messages, insert the admin record
    if (empty($message)) {
        // Continue with your database insert logic here
        $pass = sha1($pass); // Securely hash the password
        $insert_admin = $conn->prepare("INSERT INTO `admins` (name, password, salutation, surname, email, phone_number) VALUES (?,?,?,?,?,?)");
        $insert_admin->execute([$name, $pass, $salutation, $surname, $email, $phone_number]);
        $message[] = 'New admin registered successfully!';
    }
  }
  // JavaScript redirection and alert message
    if (!empty($message) && in_array('New admin registered successfully!', $message)) {
        echo "<script>
            if (confirm('Admin registered successfully! Do you want to register another admin?')) {
                // Stay on the same page
            } else {
                window.location.href = 'admin_accounts.php';
            }
        </script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register admin</title>
   <link rel="icon" type="image/x-icon" href="..\img\favicon.ico">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

<style>
  .tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  font-size: 12px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  margin-left: -60px;
  
  /* Fade in tooltip - takes 1 second to go from 0% to 100% opac: */
  opacity: 0;
  transition: opacity 1s;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>


</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="form-container">

<form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="salutation" required placeholder="Title" class="box" maxlength="20">
      <input type="text" name="name" required placeholder="Name" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="surname" required placeholder="Surname" class="box" maxlength="50">
      <input type="email" name="email" required placeholder="Email" class="box" maxlength="100">
      <input type="tel" name="phone_number" required placeholder="Phone Number" class="box" maxlength="10" pattern="[0-9]{10}">
      <input type="password" name="pass" required placeholder="Password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" required placeholder="Confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="register now" class="btn" name="submit">
   </form>

</section>

  <script>
    function register_pswFunction() {
      var x = document.getElementById("registerPassword");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

<script src="../js/admin_script.js"></script>
   
</body>
</html>