<?php 
    require_once("session-manager.php");
    include_once("db-manager.php");

      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\SMTP;
      use PHPMailer\PHPMailer\Exception;
      
      require 'PHPMailer/src/Exception.php';
      require 'PHPMailer/src/PHPMailer.php';
      require 'PHPMailer/src/SMTP.php';

      
    if(isset($_POST['submit'])){

        $mailer = $_POST['email'];
        $title = $_POST['title'];
        $body = $_POST['body'];
 
    
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
            $mail->setFrom('info.mivedia@gmail.com', 'Customer Support');
            $mail->addAddress('support@mivedia.com');     // Add a recipient 
            $mail->addReplyTo($mailer);
    
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "$title";
            $mail->Body    = "$body";
            $mail->AltBody = "$body";
        
            $mail->send();
            header("location:index.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        exit();
        
            }
        
    


    include_once('navbar.php');

    ?>

    <head>
        <title>Mivedia - Contact Us, We Reply Almost Instantly..</title>
    
        <meta name="description" 
        content="We Love to hear you, we need your critics and recommendation, that's the only way we can get better..Send us a message, and we'll be ready to give you our best assistance...">
        
        <style>
            .div {
                background-image: url('images/customer.jpg');
                height: 600px;
                margin-bottom: 20px;
            }
            .shadow {
                background-color: rgba(0, 0, 0, 0.7);
                height: 600px;
            }
        </style>
    </head>

    <html>
        <div>
            <h4 class="font-weight-bold text-warning text-center text nav-text">We reply almost instantly..</h4>
            <br>
            <p class="text-warning text-center text nav-text-size d-none d-lg-block">We Love to hear you, we need your critics and recommendation, that's the only way we can get better..Send us a message, and we'll be ready to give you our best assistance.
                <br><br>
            </p>
             <p class="text-warning text-center text nav-text-size">"Your most unhappy customers are your greatest source of learning" - Bill Gates
            </p>
        </div>
    </div>
</div>
        <body>
            <main class="container">
            <h3 class="my-2 text-center heading-text text-bold">Leave Us A Message</h3>
                <hr>
                <form method="POST">
                    <div class="form-group">
                        <label for="inputAddress">Title</label>
                        <input type="text" class="form-control col-md-11" name="title" id="inputEmail" placeholder="Input the message title here!" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputAddress">Your Email</label>
                        <input type="email" class="form-control col-md-11" name="email" id="inputEmail" placeholder="Input your email here!" required>
                        <small>We'll send you a reply here. Please use a correct E-mail that exists</small>
                    </div>

                    <label for="exampleFormControlTextarea1">Message</label>
                    <div class="form-inline mt-3">
                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="10"
                            cols="110">
                        </textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Send Message</button>
                </form>
            </main>
        </body>
    
    <?php include_once('footer.php'); ?>

    </html>