<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require('db-manager.php');

if(isset($_POST["email"])){

    $mailTo = $_POST["email"];
    $code = uniqid(true);

    $sql = "INSERT INTO `reset_passwords`(`code`, `email`) VALUES ('$code','$mailTo')";
    mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
    
    if(!$sql){
        exit('error');
    }

    $mail = new PHPMailer(true);
    try {
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
        $mail->addAddress($mailTo);     // Add a recipient 
        $mail->addReplyTo('no-reply@gmail.com', 'No reply');
    
        // Content
        $url = "Mivedia.com/reset-password.php?code=$code";
        //$url = "https://reset-password.php?code=$code";

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Your Password Reset Link';
        $mail->Body    = "Hello, please use this link to reset your password. Click <a href='$url'>here</a>";
        $mail->AltBody = "Hello, please use this link to reset your password. Click <a href='$url'>here</a>";
    
        $mail->send();
        echo 'Your reset password link, has been sent to your Email. Check to reset password.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
}

    include_once("navbar.php");
?>


<main class="container-fluid justify-content-center mt-5">
  <section class="d-flex justify-content-center">
      <div class="card mb-5" style="width: 48rem;">
          <div class="card-header bg-primary text-light">
              Input Email used to sign up here!
          </div>
          <form method="POST">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control"
                              id="email" placeholder="Enter your Email" required>
                      </div>
                  </li>                
                  <li class="list-group-item">
                      <div class="">
                          <button type="submit" class="btn btn-warning btn-lg btn-block">Reset Password</button>
                      </div>
                  </li>
              </ul>
          </form>
      </div>
  </section>
</main>

<?php include_once("footer.php"); ?>