<?php

    require_once("session-manager.php");
    include_once("db-manager.php");
    
    $email= $_GET['email'];

    $sql = "UPDATE `users` SET `email_verification`='verified' WHERE `email` = '$email'";

    mysqli_query($cxn, $sql) or die(mysqli_error($cxn));

?>

<body>
    <?php include_once('navbar.php'); ?>
    <main class="container my-5">
            <h4 class="">Your Email address has been verified successfully. Thank you for being part of our community.</h4><br>
           
            <img src="images/verified.png">
    </main>

</body>

<?php include_once('footer.php') ?>