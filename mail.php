<?php

$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];
$mobile = $_POST['number'];
$to = "morneswaart@mr-ranger.co.za";
$subject = "Mail from Website";

$headers = "From: ".$name. "\r\n" .
"CC: jonathanbeya38@gmail.com";

$txt = "You have received an email from ".$name ."\r\nEmail: " .$email ."\r\nPhone number: ". $mobile ."\r\nMessage: ". $msg;

if($email=!null){
    mail($to, $subject, $txt, $headers);
}
      echo "<script>
            if (confirm('Message sent successfully! Do you want to send another message ?')) {
                // Stay on the same page
                window.location.href = 'contact.php';
            } else {
                window.location.href = 'index.php';
            }
        </script>";

?>