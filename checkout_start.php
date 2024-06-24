<?php 
include 'components/connect.php';
if (isset($_GET['id'])) {
$id = $_GET['id'];
}
$sql="select * from products where id=?;";

$statment=$conn->prepare($sql);
$statment->execute([$id]);

if($statment->rowCount() > 0){
    ($row = $statment->fetch(PDO::FETCH_ASSOC));
        session_start();
        $_SESSION['carId']=$row['id'];
        $_SESSION['carName']=$row['name'];
        $_SESSION['picture']=$row['image_of_car01'];
        $_SESSION['price']=$row['once_off_price'];
        $_SESSION['transmission']=$row['transmission'];
        $_SESSION['fuel_type']=$row['fuel_type'];
        $_SESSION['year']=$row['year'];
        $_SESSION['engine']=$row['engine_size'];
        header("Location: checkout.php");
    

}
else{
     header("Location: checkout_start.php?error=$id");//quickview
    exit();
}


?>