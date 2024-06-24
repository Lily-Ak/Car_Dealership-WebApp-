<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


function sendMail($recipient, $subject, $body){

   

      $mail = new PHPMailer(true);
      $mail->IsSMTP();                      //Sets Mailer to send message using SMTP
      $mail->Host = 'mail.mr-ranger.co.za';       //Sets the SMTP hosts of your Email hosting, this for Godaddy
      $mail->Port = '465';                  //Sets the default SMTP server port
      $mail->SMTPAuth = true;               //Sets SMTP authentication.Utilizes the Username and Password variables
      $mail->Username = 'noreply@mr-ranger.co.za';     //Sets SMTP username
      $mail->Password = 'LRCbj#ix#FSB';             //Sets SMTP password
        
      $mail->SMTPSecure = 'ssl';                    //Sets connection prefix. Options are "", "ssl" or "tls"
      $mail->From = 'noreply@mr-ranger.co.za';         //Sets the From email address for the message
      $mail->FromName = 'mrranger';                  //Sets the From name of the message
      $mail->AddAddress($recipient, $recipient);            //Adds a "To" address
    //   $mail->AddCC('', '');                        //Adds a "Cc" address
      $mail->WordWrap = 70;                     //Sets word wrapping on the body of the message to a given number of characters
      $mail->IsHTML(true);              //Sets message type to HTML       
      $mail->Subject = $subject;       //Sets the Subject of the message
      $mail->Body = $body;        //An HTML or plain text message body
      if($mail->Send())               //Send an Email. Return true on success or false on error
      {
        return true;
      }
      else
      {
        return false;
      } 
    }


// function sendMail2($recipient, $subject, $body){
//         $mail = new PHPMailer(true); // Passing `true` enables exceptions
//     try {
//         //Server settings
//         $mail->SMTPDebug = 2; // Enable verbose debug output
//         $mail->isSMTP(); // Set mailer to use SMTP
//         $mail->Host = 'mail.mr-ranger.co.za'; // Specify main and backup SMTP servers
//         $mail->SMTPAuth = false; // Enable SMTP authentication
//         $mail->Username   = "noreply@mr-ranger.co.za";
//         $mail->Password   = "LRCbj#ix#FSB";
//         $mail->SMTPSecure = 'tls'; // Enable SSL encryption, TLS also accepted with port 465
//         $mail->Port = 465; // TCP port to connect to
//         //Recipients
//         $mail->setFrom('noreply@mr-ranger.co.za', 'Mailer'); //This is the email your form sends From
//         $mail->addAddress($recipient, $recipient); // Add a recipient address
//         //Content
//         $mail->isHTML(true); // Set email format to HTML
//         $mail->Subject = $subject;
//         $mail->Body    = $body;

//         if($mail->send()){
//             return true;
//         }else{
//             return false;
//         }

//         // echo 'Message has been sent';
//     } catch (Exception $e) {
//         echo 'Message could not be sent.';
//         echo 'Mailer Error: ' . $mail->ErrorInfo;
//     }
    
// }

function generateOtp($conn, $email){
    
    $error_messages = [];
    $code = rand(999999, 111111);

    // Insert data into the database table
    $sql = "UPDATE users SET  code = ?  WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $code, $email);

    if ($stmt->execute()) {
        // Close the database connection
        $stmt->close();
        $conn->close();


            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: jonathanbeya38@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                header('location: user-otp.php');
                exit();
            }else{
                $error_messages['otp-error'] = "Failed while sending code!";
            }                

    } else {
        // echo "Error: " . $conn->error;
        $error_messages['db-error'] = "Failed while inserting data into database!";

    }
    exit;

}
