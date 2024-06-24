<?php
include 'components/connect.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... Your existing head section ... -->
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Shop</title>
   <link rel="icon" type="image/x-icon" href="img\favicon.ico">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style_for_shop.css">
   
  

    <!-- font awesome cdn link -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>

    <!-- custom css file link -->
</head>

<body>
    <section class="theHeader">
    <?php include 'components/home_header.php'; ?>
</section>

 
    
    <?php include 'search_page.php'; ?>

    <section class='products'>
        <h1 class='heading'>Showroom</h1>
        <div class='box-container'>
            <?php
            $select_products = $conn->prepare('SELECT * FROM `products`');
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
                while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
                    if ($fetch_product['hidden'] == 0) { // Check the value of the 'hidden' column
            ?>
                <div class='card'>
                    <form action='' method='post' class='box'>
                        <input type='hidden' name='pid' value='<?= $fetch_product['id']; ?>'>
                        <input type='hidden' name='name' value='<?= $fetch_product['name']; ?>'>
                        <input type='hidden' name='price' value='<?= $fetch_product['once_off_price']; ?>'>
                        <input type='hidden' name='image' value='<?= $fetch_product['image_of_car01']; ?>'>

                        <div>
                            <img src='uploaded_img/<?= $fetch_product['image_of_car01']; ?>' alt=''>
                            <div class='name'>
                                <h1><?= $fetch_product['name']; ?></h1>
                            </div>
                        </div>
                        <div>
                            <p class='price'>Total purchase price:<br><b style="font-size:20px; font-weight:bold;">R <?= number_format($fetch_product['once_off_price'], 2); ?></b></p>
                        </div>
                        <div class='details'>
    <img src='engine.png' style="width: 35px; height: 35px; padding-left: 15px; vertical-align: middle;" alt='Engine Icon' class='icon'>
    <p style="vertical-align: middle; display: inline;"><?= $fetch_product['engine_size']; ?></p>
</div>
<div class='details'>
    <img src='gas-station.png' style="width: 35px; height: 35px; padding-left: 15px; vertical-align: middle;" alt='Fuel Type Icon' class='icon'>
    <p style="vertical-align: middle; display: inline;"><?= $fetch_product['fuel_type']; ?></p>
</div>
<div class='details'>
    <img src='icons8-transmission-64.png' alt='Transmission Icon' style="width: 35px; height: 35px; padding-left: 15px; vertical-align: middle;" class='icon'>
    <p style="vertical-align: middle; display: inline;"><?= $fetch_product['transmission']; ?></p>
</div>
<div class='details'>
    <img src='icons8-speedometer-64.png' alt='Mileage Icon' style="width: 35px; height: 35px; padding-left: 15px; vertical-align: middle;" class='icon'>
    <p style="vertical-align: middle; display: inline;"><?= $fetch_product['mileage']; ?></p>
</div>
                        <p><a class='buyandexplorebutton' href='quick_view.php?pid=<?= $fetch_product['id']; ?>'>Buy and explore</a></p>
                    </form>
                </div>
            <?php
                    }
                }
            } else {
                echo '<p class="empty">No cars found!</p>';
            }
            ?>
        </div>
    </section>
    <?php include 'components/footer.php'; ?>


</body>

    <script src="js\hamburger.js"></script>


</html>