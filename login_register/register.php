<?php
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $salutation = $_POST['salutation'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the email or phone already exists
    $check_query = "SELECT * FROM users WHERE email = ? OR phone = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("ss", $email, $phone);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    // Additional validation for the fields
    $error = false;
    $error_messages = [];

    if (!in_array($salutation, ['Mr', 'Mrs', 'Dr', 'Miss', 'Professor'])) {
        $error_messages[] = "Invalid salutation. Please select from Mr, Mrs, Dr, Miss, Professor";
        $error = true;
    }

    if (!preg_match("/^[A-Za-z ]+$/", $first_name) || empty($first_name)) {
        $error_messages[] = "Invalid first name. Only letters and spaces allowed, and the field cannot be empty.";
        $error = true;
    }
    
    if (!preg_match("/^[A-Za-z]+$/", $last_name) || empty($last_name)) {
        $error_messages[] = "Invalid last name. Only letters allowed, and the field cannot be empty.";
        $error = true;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_messages[] = "Invalid email format.";
        $error = true;
    }

    if (!preg_match("/^\d{10}$/", $phone)) {
        $error_messages[] = "Invalid phone number. It should be 10 digits.";
        $error = true;
    }
    /***************************************************************************** */
    if ($result->num_rows > 0) {
        // User with this email or phone number already exists
        echo '<script>alert("User with this email or phone number already exists!"); window.location.href="SignUp.php";</script>';
        $check_stmt->close();
    } else {
        // Check if the password and confirm password match
        if ($password !== $confirm_password) {
             echo '<script>alert("Password and Confirm Password do not match!"); window.location.href="SignUp.php";</script>';
        } else {
            // User does not exist and passwords match, proceed with registration
            $check_stmt->close();
    /***************************************************************************** */

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $code = rand(999999, 111111);

            // Insert data into the database table
            $sql = "INSERT INTO users (salutation, first_name, last_name, email, phone, password, code) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $salutation, $first_name, $last_name, $email, $phone, $hashedPassword, $code);

            if ($stmt->execute()) {
                // Close the database connection
                $stmt->close();
                $conn->close();


                    $recipient = $email;
                    $subject = "Email Verification Code";
                    $body = "Your verification code is $code";
                    if(sendMail($recipient, $subject, $body)){
                        $info = "We've sent a verification code to your email - $recipient";
                        $_SESSION['info'] = $info;
                        header('location: user-otp.php');
                        exit();
                    }else{
                        $error_messages['otp-error'] = "Failed while sending code!";
                    }                
        
            } else {
                // echo "Error: " . $conn->error;
                $error_messages['db-error'] = "Failed while inserting data into database!";

            }

            $stmt->close();
        }
    }
}