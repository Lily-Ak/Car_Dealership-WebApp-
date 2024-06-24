<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['id'])){
   $id = $_SESSION['id'];
}else{
   $id = '';
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("This message has already been sent !")';  
    echo '</script>';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(name, email, number, message) VALUES(?,?,?,?)");
      $insert_message->execute([$name, $email, $number, $msg]);

      echo "<script>
            if (confirm('Message sent successfully! Do you want to send another message ?')) {
                // Stay on the same page
            } else {
                window.location.href = 'index.php';
            }
        </script>"; 

   }

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ContactUs</title>
        <link rel="icon" type="image/x-icon" href="img\favicon.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="css\style.css">
        <link rel="stylesheet" href="css\contactStyle.css">

    </head>
    <body>
        <section class="theHeader">
            <?php include 'components/home_header.php';?>
        </section>
        <section class="contactUs">
            <div class="title">
                <h2>Get in Touch</h2>
            </div>
            <div class="box">
                <!-- form -->
                <div class="contact form">
                    <h3>Send us a message</h3>
                    <form action="mail.php" method="post">
                        <div class="formBox">
                            <div class="row50">
                                <div class="inputBox">
                                    <span>Name</span>
                                    <input type="text" name="name" placeholder="John" required maxlength="20">
                                </div>
                                <div class="inputBox">
                                    <span>Email</span>
                                    <input type="email" name="email" placeholder="jhondoe@gmail.com" required maxlength="50">
                                </div>
                            </div>

                            <div class="row50">
                                <div class="inputBox">
                                    <span>Mobile</span>
                                    <input type="number" name="number" min="0" max="9999999999" placeholder="+1 xxx xxx xxx">
                                </div>
                            </div>

                            <div class="row100">
                                <div class="inputBox">
                                    <span>Message</span>
                                    <textarea name="msg" placeholder="Write your text here..."></textarea>
                                </div>
                            </div>

                            <div class="row100">
                                <div class="inputBox">
                                    <input type="submit" name="send" value="Send">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- info Box -->
                <div class="contact info">
                    <h3>Contact Info</h3>
                    <div class="infoBox">
                        <div>
                            <span></span>
                            <p> Cornwall View Shopping Centre<br>
                                C/o Boeing & Piering Street<br>
                                Elarduspark<br>
                                Pretoria      
                            </p>
                        </div>
                        <div>
                            <span></span>
                            <a href="mailto:morneswaart@mr-ranger.co.za">morneswaart@mr-ranger.co.za</a>
                        </div>
                        <div>
                            <span></span>
                            <p>Call <a href="tel:+27691146649">+27 691 1466 49</a></p>
                        </div>
                        <!-- social media links -->
                        <ul class="sci">
                            <li><a href="https://www.facebook.com/mrrangerpretoria/" target="_blank"><i class="fa-brands fa-facebook"></i> Facebook</a></li><br>
                            <li><a href="https://wa.me/27769466088" target="_blank"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Map -->
                <div class="contact map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14363.930650122615!2d28.2535485!3d-25.8371166!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e95671d8ee99fa5%3A0x2e0c21d5f1f27e36!2sCornwall%20View!5e0!3m2!1sen!2sza!4v1699699203465!5m2!1sen!2sza" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>

        <script src="js\script.js"></script>
        <script src="js\hamburger.js"></script>


    </body>
</html>