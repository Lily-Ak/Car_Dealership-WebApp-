<!DOCTYPE html>
<html lang="en">

<head>
   
    <style>
        .active {
            border-bottom: 2px solid #3498db;
            color: #000;
            padding-bottom: 5px;
        }
    </style>
</head>

<?php
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

<header class="header">

   <section class="flex">

      <a href="../admin/dashboard.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
                <a href="../admin/products.php"       class="<?php echo basename($_SERVER['PHP_SELF']) == 'products.php' ? 'active' : ''; ?>">View/Add Cars</a>
                <a href="../admin/placed_orders.php"  class="<?php echo basename($_SERVER['PHP_SELF']) == 'placed_orders.php' ? 'active' : ''; ?>">Orders</a>
                <a href="../admin/admin_accounts.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'admin_accounts.php' ? 'active' : ''; ?>">Admins</a>
                <a href="../admin/users_accounts.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'users_accounts.php' ? 'active' : ''; ?>">Users</a>
            </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <a href="../admin/update_profile.php"    class="<?php echo basename($_SERVER['PHP_SELF']) == '../admin/update_profile.php' ? 'active' : ''; ?>">Update profile</a>
         <div class="flex-btn">
            <a href="../admin/register_admin.php" class="<?php echo basename($_SERVER['PHP_SELF']) == '../admin/register_admin.php' ? 'active' : ''; ?>">Register</a>
            <!--<a href="../admin/admin_login.php">login</a>-->
         </div>
         <a href="../components/admin_logout.php" onclick="return confirm('You are about to log out?');">Logout</a> 
         
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><i class="fa fa-user"></i> <?= $fetch_profile['name']; ?></p>

      </div>

   </section>

</header>