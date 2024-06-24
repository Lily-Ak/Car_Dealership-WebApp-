<?php
include 'components/connect.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};

include 'components/wishlist_cart.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>
   <link rel="icon" type="image/x-icon" href="img\favicon.ico">
   

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="css/style.css">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
    <link rel="stylesheet" href="css/aboutStyle.css">
    </head>
    <body>
<section class="theHeader">
    <?php include 'components/home_header.php'; ?>
</section>
    
    <div class="heading">
        <h1>About us</h1>
        
    </div>
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="css\man-buying-car.jpg" alt="">
            </div>
            <div class="about-content">
                <h2>Who we are ?</h2>
                <p>Privately owned and operated by Mr Morne Swaart since 2018, Mr-Ranger continues to build on a 
                    history of excellence as SA’s first Ford Rangers specific dealership. The company's network represents 
                    one of a kind automotive dealership at Pretoria, south africa. 
                    In 2022 and 2023, the company was proud to announce that several of its dealerships had been 
                    recognized as J.D. Power Dealers of Excellence, on the basis of their ability to deliver 
                    efficient, transparent and customer-friendly sales experiences. Mr-Ranger is also a 2023 winner of 
                    the SA’s Best Managed Companies program, which recognizes excellence in private South african-owned
                    companies.
                    Mr-Ranger is proud to offer exceptional products and services, delivered by our employees. 
                    We are committed to leadership in business as well as in the communities we serve. 
                    </p>
            <a href="contact.php" class="read-more">Contact Us</a>
            </div>
        </section>
    </div>    
<?php include 'components/footer.php' ?>

</body>

    <script src="js\hamburger.js"></script>

</html>