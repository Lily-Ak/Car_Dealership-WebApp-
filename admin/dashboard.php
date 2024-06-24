<?php
$current_date = date('Y-m-d H:i:s');

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

// Initialize variables for storing data
$total_pendings = 0;
$total_completes = 0;
$number_of_orders = 0;
$number_of_products = 0;
$number_of_users = 0;
$number_of_admins = 0;
$number_of_messages = 0;

// Check if the 'generate_report' form has been submitted
if(isset($_POST['generate_report'])){
   // Generate the report here

   // Set the headers for a CSV file
   header('Content-Type: text/csv; charset=utf-8');
   header('Content-Disposition: attachment; filename=report.csv');

   // Open the output stream for writing
   $output = fopen('php://output', 'w');

   // Fetch and calculate the total pendings from the 'order_details' table
   $select_pendings = $conn->prepare("SELECT * FROM `order_details` WHERE payment_status = ?");
   $select_pendings->execute(['pending']);
   if($select_pendings->rowCount() > 0){
      while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
         $total_pendings += $fetch_pendings['total_price'];
      }
   }

   // Fetch and calculate the total completes from the 'order_details' table
   $select_completes = $conn->prepare("SELECT * FROM `order_details` WHERE payment_status = ?");
   $select_completes->execute(['completed']);
   if($select_completes->rowCount() > 0){
      while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
         $total_completes += $fetch_completes['total_price'];
      }
   }

   // Fetch the total number of orders from the 'order_details' table
   $select_orders = $conn->prepare("SELECT * FROM `order_details`");
   $select_orders->execute();
   $number_of_orders = $select_orders->rowCount();

   // Fetch the total number of products from the 'products' table
   $select_products = $conn->prepare("SELECT * FROM `products`");
   $select_products->execute();
   $number_of_products = $select_products->rowCount();

   // Fetch the total number of users from the 'users' table
   $select_users = $conn->prepare("SELECT * FROM `users`");
   $select_users->execute();
   $number_of_users = $select_users->rowCount();

   // Fetch the total number of admins from the 'admins' table
   $select_admins = $conn->prepare("SELECT * FROM `admins`");
   $select_admins->execute();
   $number_of_admins = $select_admins->rowCount();

   // Fetch the total number of messages from the 'messages' table
   $select_messages = $conn->prepare("SELECT * FROM `messages`");
   $select_messages->execute();
   $number_of_messages = $select_messages->rowCount();

   // Write the data to the CSV file
   fputcsv($output, array('Report Download Date', $current_date));
   fputcsv($output, array('Total Pendings', $total_pendings));
   fputcsv($output, array('Total Completes', $total_completes));
   fputcsv($output, array('Number of Orders', $number_of_orders));
   fputcsv($output, array('Number of products', $number_of_products));
   fputcsv($output, array('Number of Users', $number_of_users));
   fputcsv($output, array('Number of Admins', $number_of_admins));
//   fputcsv($output, array('Number of Messages', $number_of_messages));
 

   // Close the output stream
   fclose($output);

   // Stop executing the script
   exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>
   <link rel="icon" type="image/x-icon" href="..\img\favicon.ico">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="dashboard">

   <h1 class="heading">dashboard</h1>

   <div class="box-container">

      <div class="box">
         <h3>welcome!</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn">update profile</a>
      </div>

      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pendings = $conn->prepare("SELECT * FROM `order_details` WHERE payment_status = ?");
            $select_pendings->execute(['pending']);
            if($select_pendings->rowCount() > 0){
               while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                  $total_pendings += $fetch_pendings['total_price'];
               }
            }
         ?>
         <h3><?= $total_pendings; ?></h3>
         <p>total pendings</p>
         <a href="placed_orders.php" class="btn">see orders</a>
      </div>

      <div class="box">
         <?php
            $total_completes = 0;
            $select_completes = $conn->prepare("SELECT * FROM `order_details` WHERE payment_status = ?");
            $select_completes->execute(['completed']);
            if($select_completes->rowCount() > 0){
               while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
                  $total_completes += $fetch_completes['total_price'];
               }
            }
         ?>
         <h3><?= $total_completes; ?></h3>
         <p>completed orders</p>
         <a href="placed_orders.php" class="btn">see orders</a>
      </div>

      <div class="box">
         <?php
            $select_orders = $conn->prepare("SELECT * FROM `order_details`");
            $select_orders->execute();
            $number_of_orders = $select_orders->rowCount()
         ?>
         <h3><?= $number_of_orders; ?></h3>
         <p>orders placed</p>
         <a href="placed_orders.php" class="btn">see orders</a>
      </div>

      <div class="box">
         <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
         ?>
         <h3><?= $number_of_products; ?></h3>
         <p>products added</p>
         <a href="products.php" class="btn">see products</a>
      </div>

      <div class="box">
         <?php
            $select_users = $conn->prepare("SELECT * FROM `users`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
         ?>
         <h3><?= $number_of_users; ?></h3>
         <p>normal users</p>
         <a href="users_accounts.php" class="btn">see users</a>
      </div>

      <div class="box">
         <?php
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $number_of_admins = $select_admins->rowCount()
         ?>
         <h3><?= $number_of_admins; ?></h3>
         <p>admin users</p>
         <a href="admin_accounts.php" class="btn">see admins</a>
      </div>

          <form method="post" action="">
        <button type="submit" name="generate_report" class="btn">Generate Report</button>
    </form>


   </div>

</section>





<script src="../js/admin_script.js"></script>
   
</body>
</html>