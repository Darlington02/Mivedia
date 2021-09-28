<?php

    include_once('session-manager.php');
    include_once('db-manager.php');

    $id = $_SESSION["user"];
    $sender_name = $_SESSION['name'];
    $receiver_name = $_GET['receiver_name'];
    $amount = $_GET['amount'];
    $hash = $_GET['hash'];

    if(isset($_GET['successful'])){
        $transaction_type = 'deposit';
        $desc = 'Money deposit';
        date_default_timezone_set('Africa/Lagos');
        $date = date("d-m-y:h:i:s");
        
        // SELECT INFORMATIONS FROM MIFUND DATABASE TO GET THE CURRENT WALLET BALANCE
        $select_sql = "SELECT * FROM `mifund`, `users` WHERE `users_mifund_id` = `mifund_id` AND `id` = $id";
        $result = mysqli_query($cxn, $select_sql) or die(mysqli_error($cxn));
        while($row = mysqli_fetch_assoc($result)){
            extract($row);
        }

        // DEPOSIT INFO INTO DATABASE
        $deposit_sql = "UPDATE `mifund` SET `mifund_wallet`=`mifund_wallet`+'$amount'";
        mysqli_query($cxn, $deposit_sql) or die(mysqli_error($cxn));

        // ADD TRANSACTION DETAILS TO DATABASE
        $transaction_sql = "INSERT INTO `mifund_transactions`(`transaction_hash`, `sender`, `receiver_id`, `amount`, `date`, `description`, `transaction_type`) VALUES ('$hash','$sender_name','$receiver_name','$amount','$date','$desc','$transaction_type')";
        mysqli_query($cxn, $transaction_sql) or die(mysqli_error($cxn));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.5/css/lightslider.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.5/js/lightslider.min.js" defer></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fa/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>

<style>
    body{
        background: url('images/background2.png');
        height: 100vh;
        display: grid;
        place-items: center;
    }
    h4{
        font-weight: 600;
        font-size: 30px;
        text-align: center;
    }
    
</style>

</head>
<body>
    <div class=""> 
        <img src="images/verify.png" width="150" alt="">

        <ul class="list-group mt-5">
  <li class="list-group-item font-weight-bold">From: <?php echo $sender_name; ?></li>
  <li class="list-group-item font-weight-bold">To: <?php echo $receiver_name; ?></li>
  <li class="list-group-item font-weight-bold">Amount: NGN <?php echo $amount; ?></li>
  <li class="list-group-item font-weight-bold">hash: <?php echo $hash; ?></li>
</ul>
        <a href="wallet.php"><h5 class="text-center">Go Back</h5></a>
    </div>    
</body>
