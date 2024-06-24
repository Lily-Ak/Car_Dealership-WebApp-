<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['update_payment'])){
   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
   $update_payment = $conn->prepare("UPDATE `order_details` SET payment_status = ? WHERE id = ?");
   $update_payment->execute([$payment_status, $order_id]);
   $message[] = 'payment status updated!';
   
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `order_details` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>placed orders</title>
   <link rel="icon" type="image/x-icon" href="..\img\favicon.ico">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="orders">

<h1 class="heading">placed orders</h1>

<div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `order_details`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> Placed on : <span><?= $fetch_orders['order_date']; ?></span> </p>
      <p> Placed at : <span><?= $fetch_orders['order_time']; ?></span> </p>
      <p> payment option : <span><?= $fetch_orders['payment_option']; ?></span> </p>
      <p> Type of installment : <span><?= $fetch_orders['installment_type']; ?></span> </p>
      <p> Deposit : <span><?= $fetch_orders['deposit']; ?></span> </p>
      <p> Number : <span><?= $fetch_orders['cell']; ?></span> </p>
      <p> Name of the street : <span><?= $fetch_orders['street_name']; ?></span> </p>
      <p> Suburb : <span><?= $fetch_orders['suburb']; ?></span> </p>
      <p> City : <span><?= $fetch_orders['city']; ?></span> </p>
      <p> Postal code : <span><?= $fetch_orders['postal_code']; ?></span> </p>
      <p> Delivery collection : <span><?= $fetch_orders['delivery_collection']; ?></span> </p>
      <p> Scheduled date : <span><?= $fetch_orders['schdule_date']; ?></span> </p>
      <form action="" method="post">
         <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
         <select name="payment_status" class="select">
            <option selected disabled><?= $fetch_orders['order_status']; ?></option>
            <option value="pending">pending</option>
            <option value="completed">completed</option>
         </select>
        <div class="flex-btn">
         <input type="submit" value="update" class="option-btn" name="update_payment">
         <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
        </div>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">New orders will show here!</p>';
      }
   ?>

</div>

</section>

</section>












<script src="../js/admin_script.js"></script>
   
</body>
</html>