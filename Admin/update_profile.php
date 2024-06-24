<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $update_profile_name = $conn->prepare("UPDATE `admins` SET name = ? WHERE id = ?");
    $update_profile_name->execute([$name, $admin_id]);

    $salutation = $_POST['salutation'];
    $salutation = filter_var($salutation, FILTER_SANITIZE_STRING);

    $surname = $_POST['surname'];
    $surname = filter_var($surname, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $phone_number = $_POST['phone_number'];
    $phone_number = filter_var($phone_number, FILTER_SANITIZE_STRING);

    $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    $prev_pass = $_POST['prev_pass'];
    $old_pass = sha1($_POST['old_pass']);
    $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
    $new_pass = sha1($_POST['new_pass']);
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    $confirm_pass = sha1($_POST['confirm_pass']);
    $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

    $message = array();

    if (!in_array($salutation, ["Mr", "Mrs", "Dr", "Miss","Professor"])) {
        $message[] = "Invalid salutation. Please select from Mr, Mrs, Dr, Miss, Professor.";
    }

    if (!preg_match("/^[A-Za-z]+$/", $name) || !preg_match("/^[A-Za-z]+$/", $surname)) {
        $message[] = "Invalid name or surname. Only letters allowed.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message[] = "Invalid email format.";
    }

    if (!preg_match("/^\d{10}$/", $phone_number)) {
        $message[] = "Invalid phone number. It should be 10 digits.";
    }

    if ($old_pass == $empty_pass) {
        $message[] = "Please enter old password!";
    } elseif ($old_pass != $prev_pass) {
        $message[] = "Old password not matched!";
    } elseif ($new_pass != $confirm_pass) {
        $message[] = "Confirm password not matched!";
    } else {
        if ($new_pass != $empty_pass) {
            $update_admin_pass = $conn->prepare("UPDATE `admins` SET password = ?, salutation = ?, name = ?, email = ?, phone_number = ? WHERE id = ?");
            $update_admin_pass->execute([$confirm_pass, $salutation, $name, $email, $phone_number, $admin_id]);
            $message[] = "Profile and password updated successfully!";
        } else {
            $update_admin_pass = $conn->prepare("UPDATE `admins` SET salutation = ?, name = ?, email = ?, phone_number = ? WHERE id = ?");
            $update_admin_pass->execute([$salutation, $name, $email, $phone_number, $admin_id]);
            $message[] = "Profile updated successfully!";
          
            
        }
    }

    if (!empty($message)) {
        // Handle validation messages here
        // You can display them to the user or perform any other desired actions.
    } 

    
}

// JavaScript redirection and alert message
if (!empty($message) && in_array('Profile updated successfully!', $message)) {
    echo "<script>
        if (confirm('Profile updated successfully!')) {
            window.location.href = 'admin_accounts.php';
        } else {
            window.location.href = 'update_profile.php';
        }
    </script>";
}
if (!empty($message) && in_array('Profile and password updated successfully!', $message)) {
    echo "<script>
        if (confirm('Profile and password updated successfully!')) {
            window.location.href = 'admin_accounts.php';
        } else {
            window.location.href = 'update_profile.php';
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
   <title>update profile</title>
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
      <h3>update profile</h3>
      <input type="hidden" name="prev_pass" value="<?= $fetch_profile['password']; ?>">
      <input type="text" name="salutation" value="<?= $fetch_profile['salutation']; ?>" placeholder="Title" maxlength="20" class="box">
      <input type="text" name="name" value="<?= $fetch_profile['name']; ?>" placeholder="Name" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="surname" value="<?= $fetch_profile['surname']; ?>" placeholder="Surname" maxlength="20" class="box">
      <input type="email" name="email" value="<?= $fetch_profile['email']; ?>" placeholder="Email" maxlength="100" class="box">
      <input type="text" name="phone_number" value="<?= $fetch_profile['phone_number']; ?>" placeholder="Phone Number" maxlength="15" class="box">
      <input type="password" id="psw" name="old_pass" placeholder="Enter old password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <div class="tooltip"><input type="checkbox" onclick="pswFunction()">
            <span class="tooltiptext">show password</span>
        </div>
      <input type="password" name="new_pass" placeholder="Enter new password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="confirm_pass" placeholder="Confirm new password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="update now" class="btn" name="submit">
   </form>

</section>

  <script>
    function pswFunction() {
      var x = document.getElementById("psw");
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