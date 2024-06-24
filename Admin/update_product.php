<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
}

if (isset($_POST['update'])) {
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $transmission = $_POST['transmission'];
    $fuel_type = isset($_POST['fuel_type']) ? $_POST['fuel_type'] : "";
    $engine_size = $_POST['engine_size'];
    $seating_capacity = $_POST['seating_capacity'];
    $number_of_doors = $_POST['number_of_doors'];
    $mileage = $_POST['mileage'];
    $horsepower = $_POST['horsepower'];
    $year = $_POST['year'];
    $exterior_color = $_POST['exterior_color'];
    $once_off_price = $_POST['once_off_price'];
    $number_of_stock = $_POST['number_of_stock']; // Added number_of_stock field

    $update_product = $conn->prepare("UPDATE `products` SET name = ?, transmission = ?, fuel_type = ?, engine_size = ?, seating_capacity = ?, number_of_doors = ?, mileage = ?, horsepower = ?, year = ?, exterior_color = ?, once_off_price = ?, number_of_stock = ? WHERE id = ?");
    $update_product->execute([$name, $transmission, $fuel_type, $engine_size, $seating_capacity, $number_of_doors, $mileage, $horsepower, $year, $exterior_color, $once_off_price, $number_of_stock, $pid]);

    $message[] = 'Product updated successfully!';

    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
    $image_size_01 = $_FILES['image_01']['size'];
    $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
    $image_folder_01 = '../uploaded_img/' . $image_01;

    if (!empty($image_01)) {
        if ($image_size_01 > 2000000) {
            $message[] = 'Image size is too large!';
        } else {
            $update_image_01 = $conn->prepare("UPDATE `products` SET image_of_car01 = ? WHERE id = ?");
            $update_image_01->execute([$image_01, $pid]);
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            // You may want to add code to delete the old image file here
            $message[] = 'Image 01 updated successfully!';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Product</title>
   <link rel="icon" type="image/x-icon" href="..\img\favicon.ico">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="update-product">
   <h1 class="heading">Update Product</h1>

   <?php
      $update_id = $_GET['update'];
      $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
      $select_products->execute([$update_id]);
      if ($select_products->rowCount() > 0) {
         while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
   ?>
<form action="" method="post" enctype="multipart/form-data" onsubmit="return showConfirmation()">
    <!-- ... Rest of your form ... -->
    <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <div class="image-container">
         <div class="main-image">
            <img src="../uploaded_img/<?= $fetch_products['image_of_car01']; ?>" alt="">
         </div>
         <div class="sub-image">
            <img src="../uploaded_img/<?= $fetch_products['image_of_car01']; ?>" alt="">
            <img src="../uploaded_img/<?= $fetch_products['image_of_car02']; ?>" alt="">
            <img src="../uploaded_img/<?= $fetch_products['image_of_car03']; ?>" alt="">
         </div>
      </div>
      <span>Update Name</span>
      <input type="text" name="name" required class="box" maxlength="100" placeholder="Enter product name" value="<?= $fetch_products['name']; ?>">
      <span>Update Transmission</span>
      <input type="text" name="transmission" required class="box" placeholder="Enter transmission" value="<?= $fetch_products['transmission']; ?>">
      <span>Update Fuel Type</span>
      <input type="text" name="fuel_type" required class="box" placeholder="Enter fuel type" value="<?= $fetch_products['fuel_type']; ?>">
      <span>Update Engine Size</span>
      <input type="text" name="engine_size" required class="box" placeholder="Enter engine size" value="<?= $fetch_products['engine_size']; ?>">
      <span>Update Seating Capacity</span>
      <input type="text" name="seating_capacity" required class="box" placeholder="Enter seating capacity" value="<?= $fetch_products['seating_capacity']; ?>">
      <span>Update Number of Doors</span>
      <input type="text" name="number_of_doors" required class="box" placeholder="Enter number of doors" value="<?= $fetch_products['number_of_doors']; ?>">
      <span>Update Mileage</span>
      <input type="text" name="mileage" required class="box" placeholder="Enter mileage" value="<?= $fetch_products['mileage']; ?>">
      <span>Update Horsepower</span>
      <input type="text" name="horsepower" required class="box" placeholder="Enter horsepower" value="<?= $fetch_products['horsepower']; ?>">
      <span>Update Year</span>
      <input type="text" name="year" required class="box" placeholder="Enter year" value="<?= $fetch_products['year']; ?>">
      <span>Update Exterior Color</span>
      <input type="text" name="exterior_color" required class="box" placeholder="Enter exterior color" value="<?= $fetch_products['exterior_color']; ?>">
      <span>Update Once-Off Price</span>
      <input type="number" name="once_off_price" required class="box" min="0" max="9999999999" placeholder="Enter once-off price" onkeypress="if(this.value.length == 10) return false;" value="<?= $fetch_products['once_off_price']; ?>">
      <span>Update Number of Stock</span>
      <input type="number" name="number_of_stock" required class="box" min="0" placeholder="Enter number of stock" value="<?= $fetch_products['number_of_stock']; ?>">
      <span>Update Image 01</span>
      <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <div class="flex-btn">
         <input type="submit" name="update" class="btn" value="Update">
         <a href="products.php" class="option-btn">Go Back</a>
      </div>
</form>

   <?php
         }
      } else {
         echo '<p class="empty">No product found!</p>';
      }
   ?>

</section>

<script src="../js/admin_script.js"></script><script>
    function showConfirmation() {
        var confirmation = confirm("Product updated successfully! Do you want to update another product?");
        if (confirmation) {
            // "Yes" was selected, stay on the same page
            return true;
        } else {
            // "No" was selected, redirect to products.php
            window.location.href = "products.php";
            return false;
        }
    }
</script>


</body>
</html>
