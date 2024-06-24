<?php
include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

$isSignedIn = false;
$first_name = "";
if(isset($_SESSION['is_signed_in'])){
   $isSignedIn = $_SESSION['is_signed_in'];
   $first_name = $_SESSION['first_name'];
}


include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quick view</title>
   <link rel="icon" type="image/x-icon" href="img\favicon.ico">

   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      @import url("https://fonts.googleapis.com/css2?family=Lato:wght@100&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Open+Sans&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
      /* CSS for quick view page */

/* ... other styles ... */

/* Overall layout of the card */

body {
    font-family: 'Poppins', sans-serif;
    padding-top: 0 !important;
}

.theHeader{
    background-color: #7b7b7b;
    padding: 0 10px;
    height: 100px;
}

/* Left side - Images */
.image-container {
  flex-basis: 100%;
  padding-right: 10px;
}

.image-container .main-image img {
  width: 700px;
  height: 400px;
  display: block;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.image-container .sub-image {
  display: flex;
  margin-top: 10px;
  /* Added changes */
  width: 100%;
}

.image-container .sub-image img {
  width: 100%;
  height: auto;
  object-fit: fit;
  cursor: pointer;
  border: 1px solid #ccc;
  /* Modified the width and height */
  max-width: 80px;
  max-height: 60px;
  margin-right: 5px;
}



/* Right side - Product details */
.content {
  flex-basis: 100%;
}

.name {
  font-size: 50px;
  font-weight: bold;
  margin-bottom: 10px;
  color: #333;
}

.flex {
  display: flex;
  flex-wrap: wrap;
  margin-bottom: 20px;
}

/* Specific styles for monthly price and once-off price */
.icon-and-content:nth-child(6) {
  font-size: 18px;
}

.icon-and-content {
  flex-basis: 100%;
  display: flex;
  align-items: center;
  margin-bottom: 10px;
  color: #555;
  font-size: 15px;
  padding-top: 20px;
}

.icon-and-content i {
  margin-right: 10px;
  
}

.icon-and-content span {
  font-weight: bold;
  font-size: 15px;
  color: #333;
}

/* Buttons */
.flex-btn {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}


/* Additional styling for the quick view card */
.quick-view .row {
  display: flex;
  flex-wrap: wrap;
}

.quick-view {
  width: 100%;
  margin: 0;
  margin-left: auto;
  margin-right: auto;
  padding: 20px; /* Add padding to create space around the card */
  box-sizing: border-box; /* Ensure padding is included in the width */
  border: 1px solid #ccc;
  background-color: #f9f9f9;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column; /* To ensure items stack vertically */
}

.heading {
  font-family: 'Lato', sans-serif;
  font-size: 24px;
  font-weight: bold;
  color: #333;
  margin-bottom: 20px;
}

.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between; /* Creates space between the left and right sides */
  align-items: center; /* Aligns items vertically in the center */
}

.image-container {
  flex-basis: 60%; /* Adjust the image container size */
  max-width: 60%; /* Set a maximum width to limit the image size */
}

.image-container .main-image img {
  width: 100%;
  height: auto;
  display: block;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.image-container .sub-image {
  display: flex;
  margin-top: 10px;
}

.image-container .sub-image img {
  width: 60px; /* Increase the sub-image size for better visibility */
  height: 40px;
  object-fit: cover;
  cursor: pointer;
  border: 1px solid #ccc;
  margin-right: 5px;
}

.row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .content {
        flex: 1;
        padding-top: 20px;
        padding-left: 20px;
        /*background-color: #f5f5f5;*/
        border-radius: 5px;
    }

    .name {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .flex {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 10px;
    }

    .icon-and-content {
        display: flex;
        align-items: center;
        margin-right: 20px;
        margin-bottom: 10px;
    }

    .icon-and-content i {
        margin-right: 5px;
        color: black;
    }

    .icon-and-content span {
        font-weight: bold;
    }

    .flex-btn {
        display: flex;
        justify-content: space-between;
    }


    .getquote {
        margin-right: 10px;
    }

    .card {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.content {
    font-family: Arial, sans-serif;
}

.name {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.flex {
    display: flex;
    flex-wrap: wrap;
}

.icon-and-content {
    display: flex;
    align-items: center;
    margin-right: 20px;
    margin-bottom: 10px;
}

.icon-and-content i {
    margin-right: 5px;
}

.icon-and-content span {
    font-weight: bold;
    margin-right: 5px;
}

/* Add this CSS to your existing styles or external CSS file */
.icon-and-content {
    display: flex;
    align-items: center;
    margin-right: 20px;
    margin-bottom: 10px;
    font-size: 16px;
}

.icon-and-content img {
    width: 35px; /* Adjust the size of the icons as needed */
    height: 35px;
    margin-right: 10px;
}

.info {
    font-weight: bold;
    margin-right: 5px;
    color: #333;
}

/* Adjust other styles as needed */
/* ...your existing styles... */

/* ...your existing styles... */

.main-image {
    position: relative;
    display: flex;
    align-items: center;
  justify-content: space-between;
}

.slider-arrows {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
}

.slider-button {
    background-color: transparent;
    border: none;
    cursor: pointer;
    padding: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
}

.slider-button i {
    font-size: 24px;
}

.slider-button.prev {
    left: 0;
}

.slider-button.next {
    right: 0;
}

.slider-arrows {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between; /* Spread the buttons apart */
    width: 100%; /* Take full width of the main image */
}

.slider-button {
    background-color: transparent;
    border: none;
    cursor: pointer;
    padding: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50%; /* Each button takes 50% width */
    height: 30px;
    color: #555; /* Adjust color to match your design */
    
}

.slider-button i {
    font-size: 24px;
}

.slider-button.prev {
    /* Adjust position for left button */
    justify-content: flex-start;
    padding-left: 15px; /* Add some spacing */
}

.slider-button.next {
    /* Adjust position for right button */
    justify-content: flex-end;
    padding-right: 15px; /* Add some spacing */
}

/* Add this CSS to your existing styles or external CSS file */
/* ... your existing styles ... */

/* Adjust the position of the slider buttons */
.slider-arrows {
    /* ... existing styles ... */
    width: 100%; /* Take full width of the main image */
}

.slider-button {
    /* ... existing styles ... */
    height: 30px;
    color: #555; /* Adjust color to match your design */
}

.slider-button.prev {
    /* ... existing styles ... */
    padding-left: 15px; /* Add some spacing */
}

.slider-button.next {
    /* ... existing styles ... */
    padding-right: 15px; /* Add some spacing */
}

/* Set explicit dimensions for the image container */
.image-container {
    width: 100%; /* Take full width of the parent container */
    height: 450px; /* Set a fixed height for the container */
    display: flex;
    flex-direction: column; /* Ensure sub-image stays below main image */
    align-items: center; /* Center the content horizontally */
}

.image-container .main-image {
    width: 100%;
    height: 90%; /* Set the main image height as a percentage of the container */
    overflow: hidden; /* Hide any overflow */
}

.image-container .main-image img {
    width: 100%;
    height: 100%; /* Main image will take full height of its container */
    object-fit: contain; /* Ensure the whole image is visible */
}

.image-container .sub-image {
    /* ... existing styles ... */
    text-align: center; /* Center the sub-images horizontally */
    width: 100%; /* Take full width of the container */
}

.image-container .sub-image img {
    /* Set explicit dimensions for the sub-images */
    width: 80px;
    height: 60px;
    margin-right: 5px;
}

/* ... your existing styles ... */

/* Button Styles */
/* Button Styles */
.flex-btn {
    display: flex;
    gap: 10px; /* Adjust the spacing between buttons */
    justify-content: flex-end; /* Place buttons on the right side */
    padding-right: 490px;
}

.order a {
    display: flex;
}
.footer .content {
    display: flex;
    justify-content: space-evenly;
    margin: 0 !important;
    text-align: start;
}

.buyandexplorebutton {
        background-color: black; /* Set background color to black */
        color: white; /* Set text color to white */
        padding: 20px 30px; /* Adjust padding to make the button wider */
        text-decoration: none; /* Remove underline from the link */
        display: inline-block; /* Make the link behave like a block-level element to apply padding and width */
        border-radius: 5px; /* Add border-radius for rounded corners */
    }



   </style>

</head>
<body>

    <section class="theHeader">
        <?php include 'components/home_header.php'; ?>
    </section>
    <section class="quick-view">

        <h1 style="font-size: 30px; text-align:center;" >View Car</h1>

        <?php
        // Check if the 'pid' parameter is set in the URL
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
            $select_products->execute([$pid]);

            if ($select_products->rowCount() > 0) {
                while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
        ?>
                    <div class="row">
                        <!-- Left side - Images -->
                        <div class="image-container">
                            <div class="main-image">
                                <img src="uploaded_img/<?= $fetch_product['image_of_car01']; ?>" alt="">
                                <div class="slider-arrows">
                                    <button class="slider-button prev">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="slider-button next">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="sub-image">
                                <img src="uploaded_img/<?= $fetch_product['image_of_car01']; ?>" alt="">
                                <img src="uploaded_img/<?= $fetch_product['image_of_car02']; ?>" alt="">
                                <img src="uploaded_img/<?= $fetch_product['image_of_car03']; ?>" alt="">
                            </div>
                        </div>

                        <!-- Right side - Product details -->
    <!-- Right side - Product details -->
    <div class="content">
    <div class="content">
                                                                                                                                                                            <div class="card">
                                                                                                                                                                                <div class="content">
                                                                                                                                                                                    <div class="name" style="font-size: 28px; color: #333;"><?= $fetch_product['name']; ?></div>
                                                                                                                                                                                    <div class="flex">
                                                                                                                                                                                        <div class="icon-and-content">
                                                                                                                                                                                            <img src="icons8-rand-60.png" alt="Dollar Icon" class="icon">
                                                                                                                                                                                            <span style="font-weight: bold; font-size: 18px; color: #555;"> Total Purchase Price: </span>
                                                                                                                                                                                            <span style="font-weight: bold; font-size: 25px; color: black;"> R<?= number_format($fetch_product['once_off_price'], 2); ?></span>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="icon-and-content">
                                                                                                                                                                                            <img src="icons8-transmission-64.png" alt="Transmission Icon" class="icon">
                                                                                                                                                                                            <span> Transmission:</span> <?= $fetch_product['transmission']; ?>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="icon-and-content">
                                                                                                                                                                                            <img src="gas-station.png" alt="Fuel Type Icon" class="icon">
                                                                                                                                                                                            <span> Fuel Type:</span> <?= $fetch_product['fuel_type']; ?>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="icon-and-content">
                                                                                                                                                                                            <img src="engine.png" alt="Engine Size Icon" class="icon">
                                                                                                                                                                                            <span> Engine Size:</span> <?= $fetch_product['engine_size']; ?>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="icon-and-content">
                                                                                                                                                                                            <img src="icons8-car-seats-64.png" alt="Seating Capacity Icon" class="icon">
                                                                                                                                                                                            <span> Seating Capacity:</span> <?= $fetch_product['seating_capacity']; ?>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="icon-and-content">
                                                                                                                                                                                            <img src="icons8-doors-64.png" alt="Number of Doors Icon" class="icon">
                                                                                                                                                                                            <span> Number of Doors:</span> <?= $fetch_product['number_of_doors']; ?>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="icon-and-content">
                                                                                                                                                                                            <img src="icons8-speedometer-64.png" alt="Mileage Icon" class="icon">
                                                                                                                                                                                            <span> Mileage:</span> <?= $fetch_product['mileage']; ?>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="icon-and-content">
                                                                                                                                                                                            <img src="horse.png" alt="Horsepower Icon" class="icon">
                                                                                                                                                                                            <span> Horsepower:</span> <?= $fetch_product['horsepower']; ?>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="icon-and-content">
                                                                                                                                                                                            <img src="year.png" alt="Year Icon" class="icon">
                                                                                                                                                                                            <span> Year:</span> <?= $fetch_product['year']; ?>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="icon-and-content">
                                                                                                                                                                                            <img src="colour.png" alt="Exterior Color Icon" class="icon">
                                                                                                                                                                                            <span> Exterior Color:</span> <?= $fetch_product['exterior_color']; ?>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                      
    </div>
</div>

</div>

        <!-- Buttons -->
        <div class="flex-btn">
            <?php if($isSignedIn):?>
            <p><a class='buyandexplorebutton' href='checkout_start.php?id=<?= $fetch_product['id']; ?>'>Order</a></p>
            <?php else: ?>
            <p><a class='buyandexplorebutton' href='login_register\login_register.php'>Order</a></p>
            <?php endif; ?>


        </div>


    </div>
                    </div>
        <?php
                }
            } else {
                echo '<p class="empty">Product not found!</p>';
            }
        } else {
            echo '<p class="empty">Product ID not provided!</p>';
        }
        ?>

    </section>

    <!-- rest of the HTML code -->

    <?php include 'components/footer.php'; ?>

</body>

<script>
    // Function to change the main image source
    function changeMainImage(source) {
        document.querySelector('.main-image img').src = source;
    }

    // Add click event listeners to sub-images
    document.querySelectorAll('.sub-image img').forEach((img) => {
        img.addEventListener('click', function () {
            changeMainImage(this.src);
        });
    });
// Function to change the main image source
function changeMainImage(source) {
            document.querySelector('.main-image img').src = source;
        }

        // Initialize the current index of the displayed image
        let currentImageIndex = 0;

        // Get the array of sub-images
        const subImages = document.querySelectorAll('.sub-image img');

        // Add click event listeners to sub-images
        subImages.forEach((img, index) => {
            img.addEventListener('click', function () {
                changeMainImage(this.src);
                currentImageIndex = index;
            });
        });

        // Add click event listeners to slider buttons
        document.querySelector('.slider-button.prev').addEventListener('click', () => {
            changeImage(-1); // Previous button
        });

        document.querySelector('.slider-button.next').addEventListener('click', () => {
            changeImage(1); // Next button
        });

        // Function to change the currentImageIndex and update the main image
        function changeImage(direction) {
            currentImageIndex += direction;

            // Loop the index around when reaching the end or beginning of the images
            if (currentImageIndex >= subImages.length) {
                currentImageIndex = 0;
            } else if (currentImageIndex < 0) {
                currentImageIndex = subImages.length - 1;
            }

            // Update the main image source
            changeMainImage(subImages[currentImageIndex].src);
        }

</script>
</html>
