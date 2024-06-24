<?php

$isSignedIn = false;
$first_name = "";
if(isset($_SESSION['is_signed_in'])){
   $isSignedIn = $_SESSION['is_signed_in'];
   $first_name = $_SESSION['first_name'];
}
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
   
    <style>
        .isactive {
            background-color: #72A0C1;
            color: white;
        }
    </style>
</head>


<header class="header">
            <div class="nav-bar">
               <div class="logo">
                  <a href="index.php"><img src="logo-veed-remove-background.png" alt="logo"></a>
               </div>
               <div class="menu">
                  <ul id="navbar1">
                     <li><a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'isactive' : ''; ?>">Home</a></li>
                     <li><a href="shop.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'shop.php' ? 'isactive' : ''; ?>">Showroom</a></li>
                     <li><a href="about.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'isactive' : ''; ?>">AboutUs</a></li>
                     <li><a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'isactive' : ''; ?>">ContactUs</a></li>
                     <?php if($isSignedIn):?>
                     <li><i class="fa fa-user"></i> <?php echo $first_name ?></li>
                     <li><a href="login_register\logout-user.php">Log out</a></li>
                     <?php else: ?>
                     <li><a href="login_register\login_register.php">Sign in</a></li>
                     <?php endif; ?>
                     <a href="#" id="close"><i class="fa-regular fa-rectangle-xmark"></i></a>
                  </ul>
               </div>
               <div class="mobile">
                  <i id="bar" class="fa-solid fa-outdent"></i>        
               </div>
               <!-- <div class="profile">
                  <?php          
                        $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                        $select_profile->execute([$user_id]);
                        if($select_profile->rowCount() > 0){
                        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                     ?>
                     <p><?= $fetch_profile["name"]; ?></p>
                     <a href="update_user.php" class="btn">update profile</a>
                     <div class="flex-btn">
                        <a href="user_register.php" class="option-btn">register</a>
                        <a href="user_login.php" class="option-btn">login</a>
                     </div>
                     <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
                     <?php
                        }else{
                     ?>
                     <?php
                        }
                     ?>               
                  </div>
               </div> -->
         </header>
