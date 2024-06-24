<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags and title as before -->

    <!-- Font Awesome and custom CSS files as before -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link rel="icon" type="image/x-icon" href="img\favicon.ico">


    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">


    <style>
        /* Add this CSS code to your style.css file */

        .filter-section {
            background-color: #f5f5f5;
            padding: 20px;
            margin-bottom: 20px;
        }
        


        .filter-section form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .filter-section label {
            font-size: 16px;
            font-weight: bold;
            margin-right: 10px;
        }

        .filter-section select,
        .filter-section input[type="number"],
        .filter-section input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .filter-section button {
            padding: 10px 20px;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .filter-section button:hover {
            background-color: #45a049;
        }

        .filter-section .fas {
            margin-right: 5px;
        }

        .filter-section .box-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .filter-section .box {
            width: 48%;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .filter-section .box img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .filter-section .box .name {
          
             font-size: 68.7%;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .filter-section .box .price {
            font-size: 16px;
            font-weight: bold;
            color: #4caf50;
            margin-bottom: 10px;
        }

        .filter-section .box .details p {
            margin-bottom: 5px;
        }

        .filter-section .empty {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        .filter-section form {
            display: flex;
            flex-direction: column;
        }

        .top-row,
        .bottom-row {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 10px;
        }

        .filter-group {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .filter-group label {
            margin-bottom: 5px;
        }

        button[name="apply_filter"] {
            align-self: flex-end;
            margin-top: 10px;
            width: auto;
        }

        .card {
            width: 60%;
            /* Set a fixed width for the card */
            margin: 10px;
            /* Adjust the margin to control the space */
        }

        .icon img {
            width: 20px;
            /* Adjust the width as needed for the icons */
            height: 20px;
            /* Adjust the height as needed for the icons */
        }

        .box {
            border: none;
            outline: 0;
            padding: 12px;
            color: black;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        img {
            width: 100%;
        }

        .buyandexplorebutton {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 0px;
            font-size: 15px;
            transition: background-color 0.3s ease;
        }

        .buyandexplorebutton:hover {
            background-color: #0056b3;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            width: 100%;
            margin: auto;
            text-align: left;
            font-family: arial;
            margin-bottom: 90px;
        }

        .card .box .flex .price {
            color: grey;
            font-size: 22px;
        }

        .card .box p a {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .card .box p a:hover {
            opacity: 0.7;
        }

        .details {
            text-align: left;
            font-size: 18px;
        }

        .details {
            margin-top: 10px;
        }

        /* Style the car details icons */
        .details p {
            margin-bottom: 5px;
        }

        .details i {
            margin-right: 5px;
        }

        /* Style the "Buy and explore" button */
        .buyandexplorebutton {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        .buyandexplorebutton:hover {
            background-color: #0056b3;
        }

        .icon {
            width: 50px;
            /* Adjust the size of the icons as needed */
            height: 50px;
            margin-right: 5px;
            /* Add some space between the icon and text */
        }

        /* Add this CSS code to your style.css file */

        .filter-section {
            background-color: #f5f5f5;
            padding: 20px;
            margin-bottom: 20px;
        }

        .filter-section form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .filter-section label {
            font-size: 16px;
            font-weight: bold;
            margin-right: 10px;
        }

        .filter-section .search-group {
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px;
            width: 100%;
        }

        .filter-section .search-box {
            width: calc(100% - 45px);
            /* Adjust the width based on the icon size */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 0px;
        }

        .filter-section .search-icon {
            padding: 18px;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 0 4px 4px 0;
            /* To round the right end */
            cursor: pointer;
            font-size: 16px;

        }

        .filter-section .search-icon:hover {
            background-color: #45a049;
        }

        .filter-section .filter-group {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-right: 10px;
        }

        .filter-section .top-row,
        .filter-section .bottom-row {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            /* Align items to the start of the container */
            margin-bottom: 10px;
        }

        .filter-section button[name="apply_filter"] {
            align-self: flex-end;
            margin-top: 0px;
            width: auto;
        }


        .search-group {
            display: flex;
            align-items: center;
        }

        .search-box {
            height: 45px;
            /* Adjust the padding to increase the height */
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .search-icon {
            padding: 12px;
            /* Match the padding with the search-box for consistency */
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-icon:hover {
            background-color: #2980b9;
        }

        /* Other styles remain unchanged */
    </style>
</head>

<body>



    <section class="filter-section">
        <form action="" method="post">

            <p style="font-size: 20px;">
                Search
            </p>
            <div class="search-group">
                <input type="text" name="car_name" id="car_name" class="search-box" placeholder="Search by model...">
                <button type="submit" name="apply_filter" class="search-icon">Search</button>
            </div>

            <hr>

            <p style="font-size: 20px;">
                Filter Section
            </p>

            <div class="top-row">
                <div class="filter-group">
                    <label for="transmission"> <img src="icons8-transmission-64.png" alt="transmission"
                            style="width: 35px; height: 35px;"> Transmission:</label>
                    <select name="transmission" id="transmission">
                        <option value="">All</option>
                        <option value="automatic"><img src="automatic-icon.png" alt="Automatic"
                                style="width: 35px; height: 35px;"> Automatic</option>
                        <option value="manual"><img src="manual-icon.png" alt="Manual" height="16" width="16"> Manual
                        </option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="fuel_type"><img src="gas-station.png" alt="Fuel Type"
                            style="width: 35px; height: 35px;"> Fuel Type:</label>
                    <select name="fuel_type" id="fuel_type">
                        <option value="">All</option>
                        <option value="petrol"><img src="petrol-icon.png" alt="Petrol" height="16" width="16"> Petrol
                        </option>
                        <option value="diesel"><img src="diesel-icon.png" alt="Diesel" height="16" width="16"> Diesel
                        </option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="engine_size"><img src="engine.png" alt="Engine Size" style="width: 35px; height: 35px;">
                        Engine Size:</label>
                    <input type="text" name="engine_size" id="engine_size">
                </div>

                <div class="filter-group">
                    <label for="mileage"><img src="icons8-capacity-64.png" alt="Mileage"
                            style="width: 35px; height: 35px;"> Mileage:</label>
                    <input type="number" name="mileage" id="mileage" min="0">
                </div>

                <div class="filter-group">
                    <label for="horsepower"><img src="horse.png" alt="Horsepower" style="width: 35px; height: 35px;">
                        Horsepower:</label>
                    <input type="text" name="horsepower" id="horsepower">
                </div>

            </div>

            <div class="bottom-row">
                <div class="filter-group">
                    <label for="year"><img src="year.png" alt="Year" style="width: 35px; height: 35px;"> Year:</label>
                    <input type="text" name="year" id="year" min="0">
                </div>

                <div class="filter-group">
                    <label for="min_price"><img src="icons8-rand-60.png" alt="Min Price"
                            style="width: 35px; height: 35px;"> Min Price:</label>
                    <input type="text" name="min_price" id="min_price" min="0">
                </div>

                <div class="filter-group">
                    <label for="max_price"><img src="icons8-rand-60.png" alt="Max Price"
                            style="width: 35px; height: 35px;"> Max Price:</label>
                    <input type="text" name="max_price" id="max_price" min="0">
                </div>

                <button type="submit" name="apply_filter">Apply Filter</button>
            </div>

        </form>

    </section>

    <section class="products">

        <div class="box-container">


            <?php
            // Database connection
            $servername = "luther.aserv.co.za"; // Use "localhost" for localhost
            $username = "mrranisu_ranger_db"; // Replace with your database username
            $password = "'Ranger123'"; // Replace with your database password
            $dbname = "mrranisu_ranger_db"; // Replace with your database name
            

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // Set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }

            if (isset($_POST['apply_filter'])) {
                $where_clause = "WHERE 1=1";

                // Handle filter conditions
                $transmission = $_POST['transmission'];
                $fuel_type = $_POST['fuel_type'];
                $engine_size = isset($_POST['engine_size']) ? $_POST['engine_size'] : '';
                $mileage = isset($_POST['mileage']) ? $_POST['mileage'] : '';
                $horsepower = isset($_POST['horsepower']) ? $_POST['horsepower'] : '';
                $year = isset($_POST['year']) ? $_POST['year'] : '';
                $max_price = isset($_POST['max_price']) ? $_POST['max_price'] : '';
                $min_price = isset($_POST['min_price']) ? $_POST['min_price'] : '';

                // Search by car name
                $car_name = isset($_POST['car_name']) ? $_POST['car_name'] : '';

                // Append filter conditions to the WHERE clause
                if ($transmission !== '') {
                    $where_clause .= " AND transmission = :transmission";
                }
                if ($fuel_type !== '') {
                    $where_clause .= " AND fuel_type = :fuel_type";
                }
                if ($engine_size !== '') {
                    $where_clause .= " AND engine_size = :engine_size";
                }
                if ($mileage !== '') {
                    $where_clause .= " AND mileage <= :mileage";
                }
                if ($horsepower !== '') {
                    $where_clause .= " AND horsepower <= :horsepower";
                }
                if ($year !== '') {
                    $where_clause .= " AND year = :year";
                }
                if ($max_price !== '') {
                    $where_clause .= " AND once_off_price <= :max_price";
                }
                if ($min_price !== '') {
                    $where_clause .= " AND once_off_price >= :min_price";
                }

                // Search by car name condition
                if ($car_name !== '') {
                    $where_clause .= " AND name LIKE :car_name";
                }

                $sql = "SELECT * FROM `products` $where_clause";
                $select_products = $conn->prepare($sql);

                if ($transmission !== '') {
                    $select_products->bindParam(':transmission', $transmission);
                }
                if ($fuel_type !== '') {
                    $select_products->bindParam(':fuel_type', $fuel_type);
                }
                if ($engine_size !== '') {
                    $select_products->bindParam(':engine_size', $engine_size);
                }
                if ($mileage !== '') {
                    $select_products->bindParam(':mileage', $mileage);
                }
                if ($horsepower !== '') {
                    $select_products->bindParam(':horsepower', $horsepower);
                }
                if ($year !== '') {
                    $select_products->bindParam(':year', $year);
                }
                if ($max_price !== '') {
                    $select_products->bindParam(':max_price', $max_price);
                }
                if ($min_price !== '') {
                    $select_products->bindParam(':min_price', $min_price);
                }

                // Bind car name parameter for search
                if ($car_name !== '') {
                    $car_name = '%' . $car_name . '%'; // Add wildcards for partial matching
                    $select_products->bindParam(':car_name', $car_name);
                }

                $select_products->execute();

                if ($select_products->rowCount() > 0) {
                    while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
                        // Display product details using the provided HTML structure
                        // ...
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
                                        <h1>
                                            <?= $fetch_product['name']; ?>
                                        </h1>
                                    </div>
                                </div>
                                <div>
                                    <p class='price'>Total purchase price:<br><b style="font-size:20px; font-weight:bold;">R
                                            <?= number_format($fetch_product['once_off_price'], 2); ?>
                                        </b></p>
                                </div>
                                <div class='details'>
                                    <img src='engine.png'
                                        style="width: 35px; height: 35px; padding-left: 15px; vertical-align: middle;"
                                        alt='Engine Icon' class='icon'>
                                    <p style="vertical-align: middle; display: inline;">
                                        <?= $fetch_product['engine_size']; ?>
                                    </p>
                                </div>
                                <div class='details'>
                                    <img src='gas-station.png'
                                        style="width: 35px; height: 35px; padding-left: 15px; vertical-align: middle;"
                                        alt='Fuel Type Icon' class='icon'>
                                    <p style="vertical-align: middle; display: inline;">
                                        <?= $fetch_product['fuel_type']; ?>
                                    </p>
                                </div>
                                <div class='details'>
                                    <img src='icons8-transmission-64.png' alt='Transmission Icon'
                                        style="width: 35px; height: 35px; padding-left: 15px; vertical-align: middle;" class='icon'>
                                    <p style="vertical-align: middle; display: inline;">
                                        <?= $fetch_product['transmission']; ?>
                                    </p>
                                </div>
                                <div class='details'>
                                    <img src='icons8-capacity-64.png' alt='Mileage Icon'
                                        style="width: 35px; height: 35px; padding-left: 15px; vertical-align: middle;" class='icon'>
                                    <p style="vertical-align: middle; display: inline;">
                                        <?= $fetch_product['mileage']; ?>
                                    </p>
                                </div>

                                <p><a class='buyandexplorebutton' href='quick_view.php?pid=<?= $fetch_product['id']; ?>'>Buy and
                                        explore</a></p>
                            </form>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p class="empty">No cars found!</p>';
                }
            }
            ?>
        </div>
    </section>

</body>

</html>