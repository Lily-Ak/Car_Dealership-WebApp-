<?php
include '../components/connect.php';

session_start();



$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
    exit;
}

if (isset($_POST['add_product'])) {
    // ... Your existing code for adding a new product ...
    // ... Your existing code for adding a new product ...
    $name = $_POST['name'];
    $transmission = $_POST['transmission'];
    $fuel_type = $_POST['fuel_type'];
    $engine_size = $_POST['engine_size'];
    $seating_capacity = $_POST['seating_capacity'];
    $number_of_doors = $_POST['number_of_doors'];
    $mileage = $_POST['mileage'];
    $horsepower = $_POST['horsepower'];
    $year = $_POST['year'];
    $exterior_color = $_POST['color']; // Change 'exterior_color' to 'color'
    $once_off_price = $_POST['once_off_price'];

    $image_01 = $_FILES['image_01']['name'];
    $image_02 = $_FILES['image_02']['name'];
    $image_03 = $_FILES['image_03']['name'];

    $image_folder_01 = '../uploaded_img/' . $image_01;
    $image_folder_02 = '../uploaded_img/' . $image_02;
    $image_folder_03 = '../uploaded_img/' . $image_03;

    // Sanitize inputs (you may want to add further validation)
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $transmission = filter_var($transmission, FILTER_SANITIZE_STRING);
    $fuel_type = filter_var($fuel_type, FILTER_SANITIZE_STRING);
    $engine_size = filter_var($engine_size, FILTER_SANITIZE_STRING);
    $seating_capacity = filter_var($seating_capacity, FILTER_SANITIZE_STRING);
    $number_of_doors = filter_var($number_of_doors, FILTER_SANITIZE_STRING);
    $mileage = filter_var($mileage, FILTER_SANITIZE_STRING);
    $horsepower = filter_var($horsepower, FILTER_SANITIZE_STRING);
    $year = filter_var($year, FILTER_SANITIZE_STRING);
    $exterior_color = filter_var($exterior_color, FILTER_SANITIZE_STRING);
    $once_off_price = filter_var($once_off_price, FILTER_SANITIZE_NUMBER_INT);

    $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
    $select_products->execute([$name]);

    if ($select_products->rowCount() > 0) {
        $message[] = 'Product name already exists!';
    } else {
        $insert_products = $conn->prepare("INSERT INTO `products` (name, transmission, fuel_type, engine_size, seating_capacity, number_of_doors, mileage, horsepower, year, exterior_color, once_off_price, image_of_car01, image_of_car02, image_of_car03) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $insert_products->execute([$name, $transmission, $fuel_type, $engine_size, $seating_capacity, $number_of_doors, $mileage, $horsepower, $year, $exterior_color, $once_off_price, $image_01, $image_02, $image_03]);

        if ($insert_products) {
            $image_size_01 = $_FILES['image_01']['size'];
            $image_size_02 = $_FILES['image_02']['size'];
            $image_size_03 = $_FILES['image_03']['size'];

            if ($image_size_01 > 2000000 || $image_size_02 > 2000000 || $image_size_03 > 2000000) {
                $message[] = 'Image size is too large!';
            } else {
                move_uploaded_file($_FILES['image_01']['tmp_name'], $image_folder_01);
                move_uploaded_file($_FILES['image_02']['tmp_name'], $image_folder_02);
                move_uploaded_file($_FILES['image_03']['tmp_name'], $image_folder_03);
                $message[] = 'New product added!';
            }
        }
    }

}

if (isset($_GET['delete'])) {
    // ... Your existing code for deleting a product ...
    $delete_id = $_GET['delete'];
    $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
    $delete_product_image->execute([$delete_id]);
    $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
    unlink('../uploaded_img/' . $fetch_delete_image['image_of_car01']);
    unlink('../uploaded_img/' . $fetch_delete_image['image_of_car02']);
    unlink('../uploaded_img/' . $fetch_delete_image['image_of_car03']);
    $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
    $delete_product->execute([$delete_id]);
    header('location:products.php');
    exit;
}

if (isset($_GET['toggle'])) {
    $toggle_id = $_GET['toggle'];
    $get_visibility = $conn->prepare("SELECT `hidden` FROM `products` WHERE id = ?");
    $get_visibility->execute([$toggle_id]);
    $visibility = $get_visibility->fetchColumn();

    // Toggle visibility
    $new_visibility = $visibility ? 0 : 1;

    $update_visibility = $conn->prepare("UPDATE `products` SET `hidden` = ? WHERE id = ?");
    $update_visibility->execute([$new_visibility, $toggle_id]);

    // Set the message
    $_SESSION['toggle_message'] = $new_visibility ? 'Car is now showing!' : 'Car is now hidden!';

    header('location:products.php');
    exit;
}

// Check if a message is set in the session
if (isset($_SESSION['popup_message'])) {
    $popupMessage = $_SESSION['popup_message'];
    $popupType = isset($_SESSION['popup_type']) ? $_SESSION['popup_type'] : 'success';

    // Clear the session variables
    unset($_SESSION['popup_message']);
    unset($_SESSION['popup_type']);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        <?php if (isset($_SESSION['toggle_message'])) { ?>
            const toggleMessage = "<?php echo $_SESSION['toggle_message']; ?>";
            const currentURL = window.location.href;
            const separator = currentURL.includes('?') ? '&' : '?';
            const newURL = currentURL + separator + 'toggle_message=' + encodeURIComponent(toggleMessage);
            window.history.pushState({ path: newURL }, '', newURL);
            <?php
            // Clear the session variable after adding it to the URL
            unset($_SESSION['toggle_message']);
        }
        ?>
    </script>



    <!-- ... Head section with your styles and scripts ... -->

    <!-- ... Head section with your styles and scripts ... -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="icon" type="image/x-icon" href="..\img\favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <style>
        .custom-datepicker .ui-datepicker-calendar {
            display: none;
            /* Hide the day numbers */

        }

        /* Increase font size of the output element */
        .form-group output {
            font-size: 18px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 10px;
            /* Add space between form groups */
        }

        .fixed-width-input {
            width: 100px;
            /* Adjust the width to match the desired fixed width */
        }

        input[type="text"],
        input[type="number"],
        form select {
            padding: 7px;
            font-size: 16px;
            outline: 1px solid black;
            /* Add black outline */
            border-radius: 2px;
            /* Add rounded border */

        }

        /* Style the input box */
        .year-picker {
            width: 150px;
            padding: 8px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
        }

        /* Style the input box when focused */
        .year-picker:focus {
            border: 2px solid #007bff;
            /* Change the border color when focused */
        }

        /* Style the calendar */
        .ui-datepicker {
            font-family: Arial, sans-serif;
            width: 250px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Style the calendar header */
        .ui-datepicker-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 5px;
        }

        /* Style the calendar title */
        .ui-datepicker-title {
            font-size: 1.2em;
            font-weight: bold;
        }

        /* Style the calendar navigation buttons */
        .ui-datepicker-prev,
        .ui-datepicker-next {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            border-radius: 50%;
            font-size: 16px;
            width: 24px;
            height: 24px;
            line-height: 24px;
            text-align: center;
            cursor: pointer;
            margin: 0 5px;
        }

        /* Style the calendar days */
        .ui-state-default {
            background-color: #fff;
            color: #333;
            border: 1px solid transparent;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .ui-state-default:hover {
            background-color: #f0f0f0;
        }

        /* Style the selected date */
        .ui-state-active {
            background-color: #007bff;
            color: #fff;
        }

        /* Style the weekend days (e.g., Saturday and Sunday) */
        .ui-datepicker-week-end .ui-state-default {
            color: #ff5733;
        }

        /* Style today's date */
        .ui-datepicker-today .ui-state-default {
            border: 2px solid #007bff;
        }

        /* Style the other month's dates */
        .ui-datepicker-other-month .ui-state-default {
            color: #999;
        }

        /* Style the Hide button */
        .toggle-btn {
            background-color: #ff5733;
            /* Change the background color */
            color: #fff;
            text-align: center;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            text-transform: uppercase;
        }

        /* Style the message container */
        .message-container {
            display: none;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: top;
            top: 10px;
            right: 10px;
            z-index: 9999;
            border-radius: 5px;
        }


        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            padding: 10px;
            z-index: 9999;
        }

        .popup-container.success {
            background-color: #4CAF50;
        }

        .popup-container.error {
            background-color: #ff5733;
        }
        #productForm{
            display: none;
        }
        #form_toggle{
           display: inline-block;
           padding: 10px 20px;
           background-color: #007bff;
           color: #fff;
           font-size: 19px;
           text-decoration: none;
           border-radius: 25px;
           margin-top: 15px;
           transition: 0.3s ease;

        }

    </style>


</head>

<body>
    <div class="message-container" id="message-container"></div>
    <?php include '../components/admin_header.php'; ?>



    <section class="add-products">
        <!-- ... Your existing code for adding products ... -->
        <!-- ... Your existing code for adding products ... -->
        <h1 class="heading">Add Product</h1>
        <button id="form_toggle" onclick="addProduct()">Click to add products</button>
        <form action="" method="post" id="productForm" enctype="multipart/form-data">
            <!-- Input fields for product information -->
            <div class="flex">
                <div class="inputBox">
                    <span>Product Name (required)</span>
                    <input type="text" class="box" required maxlength="100" placeholder="Enter product name"
                        name="name">
                </div>
                <div class="inputBox">
                    <span>Transmission (required)</span>
                    <input type="text" class="box" required placeholder="Enter transmission" name="transmission">
                </div>
                <div class="inputBox">
                    <span>Fuel Type (required)</span>
                    <input type="text" class="box" required placeholder="Enter fuel type" name="fuel_type">
                </div>
                <div class="inputBox">
                    <span>Engine Size (required)</span>
                    <input type="text" class="box" required placeholder="Enter engine size" name="engine_size">
                </div>
                <div class="inputBox">
                    <span>Seating Capacity (required)</span>
                    <input type="text" class="box" required placeholder="Enter seating capacity"
                        name="seating_capacity">
                </div>
                <div class="inputBox">
                    <span>Number of Doors (required)</span>
                    <input type="text" class="box" required placeholder="Enter number of doors" name="number_of_doors">
                </div>
                <div class="inputBox">
                    <span>Mileage (required)</span>
                    <input type="text" class="box" required placeholder="Enter mileage" name="mileage">
                </div>
                <div class="inputBox">
                    <span>Horsepower (required)</span>
                    <input type="text" class="box" required placeholder="Enter horsepower" name="horsepower">
                </div>

                <div class="inputBox">
                    <span>Exterior Color (required)</span>
                    <input type="text" name="color" class="box" required placeholder="Enter exterior color" id="color">
                </div>

                <div class="inputBox">
                    <span>Year (required)</span>
                    <select name="year" class="box" required>
                        <?php
                        // Generate a dropdown list for years from 2000 to 2030
                        for ($year = 2000; $year <= 2030; $year++) {
                            echo "<option value='$year'>$year</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="inputBox">
                    <span>Once-off Price (required)</span>
                    <input type="number" min="0" class="box" required placeholder="Enter once-off price"
                        name="once_off_price">
                </div>
                <div class="inputBox">
                    <span>Image 01 (required)</span>
                    <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box"
                        required>
                </div>
                <div class="inputBox">
                    <span>Image 02 (required)</span>
                    <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box"
                        required>
                </div>
                <div class="inputBox">
                    <span>Image 03 (required)</span>
                    <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box"
                        required>
                </div>
            </div>
            <input type="submit" value="Add Product" class="btn" name="add_product">
        </form>



    </section>

    <section class="show-products">
        <!-- ... Your existing code for displaying products ... -->
        <h1 class="heading">Products Added</h1>
        <div class="box-container">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
                while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="box">

                        <img src="../uploaded_img/<?= $fetch_products['image_of_car01']; ?>" alt="">
                        <div class="name">
                            <?= $fetch_products['name']; ?>
                        </div>
                        <div class="price">R<span>
                                <?= $fetch_products['once_off_price']; ?>
                            </span></div>
                        <div class="transmission"><span>
                                <?= $fetch_products['transmission']; ?>
                            </span></div>
                        <div class="engine"><span>
                                <?= $fetch_products['engine_size']; ?>
                            </span></div>
                        <div class="fuel type"><span>
                                <?= $fetch_products['fuel_type']; ?>
                            </span></div>
                        <div class="horse power"><span>
                                <?= $fetch_products['horsepower']; ?>
                            </span></div>
                        <div class="mileage"><span>
                                <?= $fetch_products['mileage']; ?>
                            </span></div>
                        <!-- Add other product information as needed -->



                        <div class="flex-btn">
                            <a href="update_product.php?update=<?= $fetch_products['id']; ?>" class="option-btn">Update</a>
                            <a href="products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn"
                                onclick="return confirm('Delete this product?');">Delete</a>
                            <a class="btn" name="add_product"
                                href="products.php?toggle=<?= $fetch_products['id']; ?>&car_id=<?= $fetch_products['id']; ?>"
                                class="toggle-btn">
                                <?php echo $fetch_products['hidden'] ? 'Show' : 'Hide'; ?>

                            </a>

                            </a>

                            <?php echo $fetch_products['hidden'] ? 'Car hidden' : 'Car Showing'; ?>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="empty">No products added yet!</p>';
            }
            ?>
        </div>
    </section>

    <!-- ... Footer and additional scripts ... -->
    <script>
        function addProduct() {
          var y = document.getElementById("form_toggle");
          var x = document.getElementById("productForm");
          if (x.style.display === "none") {
            x.style.display = "block";
            y.innerHTML = "Click to hide the form";
          } else {
            x.style.display = "none";
            y.innerHTML = "Click to add products";
          }
        }
    </script>




</body>

</html>