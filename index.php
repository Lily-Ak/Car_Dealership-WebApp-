<?php
session_start();
$isSignedIn = false;
$first_name = "";
if(isset($_SESSION['is_signed_in'])){
   $isSignedIn = $_SESSION['is_signed_in'];
   $first_name = $_SESSION['first_name'];
}
   // if($email == false){
   // header('Location: login-user.php');
   // }

// // phpinfo();
// var_dump($_SESSION);
// exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="icon" type="image/x-icon" href="img\favicon.ico">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
    <style>
        .present {
            background-color: #72A0C1;
            color: white;
        }
    </style>


</head>
<body>
<section class="firstSection">
   <video autoplay muted loop>
      <source src="Ford Pro Welcomes All-New Ranger Wildtrak X to Pickup Family(1080P_HD).mp4" type="video/mp4">
   </video>
      <section class="container">
         <header class="header">
            <div class="nav-bar">
               <div class="logo">
                  <a href="index.php"><img src="logo-veed-remove-background.png" alt="logo"></a>
               </div>
               <div class="menu">
                  <ul id="navbar1">
                     <li><a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'present' : ''; ?>">Home</a></li>
                     <li><a href="shop.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'shop.php' ? 'present' : ''; ?>">Showroom</a></li>
                     <li><a href="about.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'present' : ''; ?>">aboutUs</a></li>
                     <li><a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'present' : ''; ?>">contactUs</a></li>
                     <?php if($isSignedIn):?>
                     <li><i class="fa fa-user"></i> <?php echo $first_name ?></li>
                     <!--<li><a title="Sign Out" href="login_register\logout-user.php"><i class="fa fa-sign-out"></i></a></li>-->
                      <li><a href="login_register\logout-user.php">Log out</a></li> 
                     <?php else: ?>
                     <li><a href="login_register\login_register.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'login_register\login_register.php' ? 'present' : ''; ?>">sign in</a></li>
                     <?php endif; ?>
                     <a href="#" id="close"><i class="fa-regular fa-rectangle-xmark"></i></a>
                  </ul>
               </div>
               <div id="mobile">
                  <i id="bar" class="fa-solid fa-outdent"></i>        
               </div>
            </div>
         </header>
         <div class="hero-sec">
               <div class="caption overlay">
                  <h3>FORD RANGER 100% ELECTRIC CARS</h3>
                  <p class="description">
                  We have a passion for Ford Rangers. So we have made it our mission to assist anyone looking to buy a pre-loved Ford Ranger and we also buy Ford Rangers from the public and companies looking to de-fleet from their current inventory.                  
                  </p>
               </div>   
         </div>
      </section>
</section>
<section class="secondSection">
   <p>SHOPPING TOOLS</p>
   <h1>FIND YOUR FORD RANGER</h1>
   <div class="cta">
      <div class="overlay">
         <h4>A LUXURY CLASS VEHICLE WITH A LIFESTYLE TO MATCH</h4>
         <h2>FORD RANGER EXCELLENCE CLUB</h2>
         <h3>EXPERIENCE BEING PART OF A COMPLIMENTARY MEMBERS CLUB EXCLUSIVELY FOR RANGERS LUXURY CLASS OWNERS</h3>
         <a href="shop.php">Explore More</a>
      </div>   
   </div>
</section>

<section class="thirdSection">
   <div class="flexbox">
      <div class="zoom first">
         <div class="overlay">
            <h2>Sophisticated Platinum</h2>
            <p>Platinum brings an exclusive level of sophistication, luxury and intelligence to overlanding mastery. Built because we can, Ranger Platinum is king of the road.</p>
         </div>
      </div>
      <div class="zoom second">
         <div class="overlay">
            <h2>Practical Driving</h2>
            <p>The majority of the training day will be spent in your vehicle on one of our various 4x4 tracks and courses to practically apply what you have learned in the classroom session. The instructors will be at hand to guide your through the obstacles to give you guidance and build your confidence</p>
         </div>
      </div>
      <div class="zoom mar third">
         <div class="overlay">
            <h2>Striking Sport</h2>
            <p>Blacked-out grille, trim and wheels are matched with a luxury ebony interior, for a dominant signature effect. Ranger is ready to take on your adventures, and look great doing it.</p>
         </div>
      </div>
      <div class="zoom mar fourth">
         <div class="overlay">
            <h2>New Design</h2>              
            <p>Ford signature global DNA comes to life with the Next-Gen Ranger. Tough and agile, with a segment redefining interior</p>
         </div>
      </div>
   </div>
</section>

<?php include 'components/footer.php'; ?>
</body>

<script src="js\hamburger.js"></script>

<script>

</script>


</html>