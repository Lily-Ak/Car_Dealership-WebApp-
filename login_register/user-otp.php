<?php 
    // require_once "controllerUserData.php";
    // $email = $_SESSION['email'];
    // if($email == false){
    // header('Location: login-user.php');
    // }
    require_once 'db_config.php';
    $errors = [];


        //if user click verification code submit button
        if(isset($_POST['check'])){
            // $_SESSION['info'] = "";
            $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
            $check_code = "SELECT * FROM users WHERE code = $otp_code";
            $code_res = mysqli_query($conn, $check_code);
            if(mysqli_num_rows($code_res) > 0){
                $fetch_data = mysqli_fetch_assoc($code_res);
                $fetch_code = $fetch_data['code'];
                $email = $fetch_data['email'];
                $code = 0;
                $status = 'verified';
                $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
                $update_res = mysqli_query($conn, $update_otp);
                if($update_res){
                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['email'] = $email;
                    header('location: login_register.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while updating code!";
                }
            }else{
                $errors['otp-error'] = "You've entered incorrect code!";
            }
        }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="icon" type="image/x-icon" href="..\img\favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="registration_style.cs">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="user-otp.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="otp" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>