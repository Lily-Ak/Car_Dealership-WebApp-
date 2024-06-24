<?php
    include_once 'components/connect.php';
    if(!$conn){
        die("Conncetion Failed: ".mysqli_connect_error());
    }
    session_start();
    if(isset($_POST['submit'])){
    
        //page1
        $payOp=$_POST['payOp'];
        //page1
        $installType=$_POST['installType'];
        $deposit=$_POST['downpay'];
        $finMonths=$_POST['finMonths'];
        $balloon=$_POST['balloon'];
        //page 3
        $idType=$_POST['idType'];
        $idValue=$_POST['idPassport'];
        $cell=$_POST['cell'];
        $address1=$_POST['address1'];
        $address2=$_POST['address2'];
        $suburb=$_POST['suburb'];  
        $code=$_POST['code'];
        $city=$_POST['city'];
        //page 4
        $scheduleInfo=$_POST['scheduleInfo'];
        $scheduleDate=$_POST['scheduleDate'];
        //page 5
        $car_id=$_SESSION['carId'];
        $user_id=$_SESSION['user_session'];
        
        function storeDetails($conn,$user_id,$car_id,$payOp, $installType, $deposit, $finMonths, $balloon,$idType,$idValue,$cell,$address2,$address1,$suburb,$code,$city,$scheduleInfo, $scheduleDate){
            if($payOp=="cash"){
                $installType='';
                $deposit='';
                $finMonths='';
                $balloon='';
            }
            if($installType=='installment'){
                $balloon='';
            }
            $sql="INSERT INTO order_details(user_id,car_id,payment_option, installment_type, deposit, time_frame, balloon_percentage,id_type,id_passport,cell,house_num,street_name,suburb,postal_code,city,delivery_collection, schdule_date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $insert=$conn->prepare($sql);
            $insert->execute([$user_id,$car_id,$payOp, $installType, $deposit, $finMonths, $balloon,$idType,$idValue,$cell,$address2,$address1,$suburb,$code,$city,$scheduleInfo, $scheduleDate]);
            if(!$insert){
                header("location: checkout.php?error=Statment_Failed");
                exit();
               }
            
        } ?>
         
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="https://sandbox.payfast.co.za/eng/process" method="post">
        <input type="hidden" name="merchant_id" value="10000100">
        <input type="hidden" name="merchant_key" value="46f0cd694581a">
        <input type="hidden" name="return_url" value="https://www.mr-ranger.co.za/order_complete.php">
        <input type="hidden" name="cancel_url" value="https://www.example.com/cancel">
        <input type="hidden" name="notify_url" value="https://www.example.com/notify">
        <input type="hidden" name="amount" value="500.00">
        <input type="hidden" name="item_name" value="Reservation Fee">
        <h1> You Will Now Be Transferred To A Secure Payment Gateway To Pay The Reservation Fee</h1>
        <button class="toPay" name="toPay">Continue to Gateway</button>
    </form>
    <a href="mr-ranger.co.za/shop.php"><button>Back to Showroom</button></a>
</body>
</html>
        <?php
        
        storeDetails($conn,$user_id,$car_id,$payOp, $installType, $deposit, $finMonths, $balloon,$idType,$idValue,$cell,$address2,$address1,$suburb,$code,$city,$scheduleInfo, $scheduleDate);
    }
    else{
        header("location: index.php");
        exit();
    }

