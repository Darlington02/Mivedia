<?php

include_once('db-manager.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$ref_id = $_POST['ref'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['pwd'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$transaction_pwd = $_POST['transaction_pwd'];
$country = 'Nigeria';
$type = 'user';
$mifund_id = 'MI'.substr(str_shuffle("0123456789"), 0, 5);
$phone = $_POST['phone'];

// INSERT INTO USERS DATABASE
$sql = "INSERT INTO `users`(`name`, `email`, `password`, `type`, `mifund_id`, `phone`, `country`, `ref_id`) VALUES ('$fullname','$email','$password_hash','$type','$mifund_id','$phone','$country','$ref_id')";

mysqli_query($cxn, $sql) or die(mysqli_error($cxn));

//INSERT INTO MIFUND DATABASE
$mifund_sql = "INSERT INTO `mifund`(`users_mifund_id`, `transaction_password`, `mifund_wallet`) VALUES ('$mifund_id','$transaction_pwd','0.00')";

mysqli_query($cxn, $mifund_sql) or die(mysqli_error($cxn));

if(!$sql){
    exit('there was a problem with the transaction, please try again.');
}

$url = 'http://mivedia.com/verify-email.php';

function sendEmail($email, $url){
    $mail = new PHPMailer(true);
    {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'info.mivedia@gmail.com';                     // SMTP username
        $mail->Password   = 'Darlington@01';                               // SMTP password
        $mail->SMTPSecure = 'TLS'; 
        $mail->Port = 587;
    
        //Recipients
        $mail->setFrom('info.mivedia@gmail.com', 'Mivedia');
        $mail->addAddress($email);     // Add a recipient 
        $mail->addReplyTo('no-reply@gmail.com', 'No reply');
    
        // TO PASS VARIABLE TO THE REQUESTED FILE
        
        $url_path = "welcome-email.php";
        
        $body = file_get_contents($url_path); 
    
    
        $mail->isHTML(true);                               
        $mail->Subject = "Welcome To Mivedia";
        $mail->Body    = "
                            <div class='container'>
                              <img src='https://base.imgix.net/files/base/ebm/mhlnews/image/2019/03/mhlnews_4715_online_shopping_1.png?auto=format&fit=crop&h=432&w=768' alt='Snow'>
                              <a href='$url?email=$email'><button style='font-size: 20px; background-color: #008CBA; width: 100%; border-radius: 12px;'>Verify Email</button></a>
                            </div> 
                            $body";
        
        $mail->send();
        header("location:welcome.php");
    }
    }
    
    sendEmail($email, $url);
    
exit();