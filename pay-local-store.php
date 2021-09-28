<?php

    require_once('session-manager.php');
    include_once('db-manager.php');

    $user_id = $_SESSION['user'];
    $sender_email = $_SESSION["email"];
    $sender_id = $_SESSION['mifund_id'];
    
    // GET MIFUND ID FROM QR CODE WHEN USED
    if(isset($_GET['code'])){
        $code = $_GET['code'];
    }else{
        $code = "Enter User MIfund ID here!";
    }


    // IF TRANSFER BUTTON IS CLICKED
    if(isset($_POST['transfer'])){
        $amount = $_POST['amount'];
        $receiver_id = $_POST['code'];      
        $desc = $_POST['desc'];
        $transaction_type = 'merchant sale';
        $mifund_pwd = $_POST['mifund_pwd'];
        $transaction_hash = 'MT'.uniqid();
        $sender_name = $_SESSION['name'];

    // GET RECEIVER'S NAME FROM DATABASE
        $select_receiver_sql = "SELECT `store_name` FROM `merchants` WHERE `merchant_code` = '$receiver_id'";
        $select_receiver_result = mysqli_query($cxn, $select_receiver_sql) or die(mysqli_error($cxn));
        while($row = mysqli_fetch_assoc($select_receiver_result)){
            extract($row);
        }
        $receiver_name = $store_name;

        date_default_timezone_set('Africa/Lagos');
        $date = date("d-m-y:h:i:s");

        // GET INFORMATION OF USER'S MIFUND WALLET
        $mifund_wallet_sql = "SELECT * FROM `mifund`, `users` WHERE `users_mifund_id` = `mifund_id` AND `id` = $user_id";
        $result = mysqli_query($cxn, $mifund_wallet_sql) or die(mysqli_error($cxn));
        while($row = mysqli_fetch_assoc($result)){
            extract($row);
        }

        if($amount > $mifund_wallet){
            echo '<script>alert("You do not have sufficient funds for this transaction")</script>';
        }else if($mifund_pwd !== $transaction_password){
            echo '<script>alert("Your Mifund Transaction Password is Incorrect!")</script>';
        }else{
            // ADD RECEIVER BALANCE
            $add_balance_sql = "UPDATE `merchants`, `users` SET `merchant_wallet`= `merchant_wallet`+$amount WHERE `merchant_code` = '$receiver_id'";

            mysqli_query($cxn, $add_balance_sql) or die(mysqli_error($cxn));

            // DEDUCT SENDER BALANCE
            $deduct_balance_sql = "UPDATE `mifund`, `users` SET `mifund_wallet`= `mifund_wallet`-$amount WHERE `users_mifund_id` = `mifund_id` AND `id` = $user_id";

            mysqli_query($cxn, $deduct_balance_sql) or die(mysqli_error($cxn));

            // ADD TRANSACTION DETAILS TO DATABASE
            $transaction_sql = "INSERT INTO `mifund_transactions`(`transaction_hash`, `sender`, `sender_email`, `receiver`, `sender_id`, `receiver_id`, `amount`, `date`, `description`, `transaction_type`) VALUES ('$transaction_hash','$sender_name','$sender_email','$receiver_name','$sender_id','$receiver_id','$amount','$date','$desc','$transaction_type')";

            mysqli_query($cxn, $transaction_sql) or die(mysqli_error($cxn));

            header("location:success.php?receiver_name=$receiver_name&&amount=$amount&&hash=$transaction_hash");
        }

    }
?>

<head>
   <style>
   
    </style>  
</head>

<body>
    <?php include_once('navbar.php'); ?>
    <main class="container">
        <div class="transfer-form card">
            <div class="container my-4">
                <h4 class="text-dark text-center font-weight-bold mb-3"><i class="fa fa-money"></i> Organization</h4>

                <form method="post">
                    <div class="form-group text-dark">
                        <label for="Code">Organization ID</label>
                        <input type="text" name="code" class="form-control" id="Code" value="<?php echo $code ?>" required>
                    </div>

                    <div class="form-group text-dark">
                        <label for="Amount">Amount</label>
                        <input type="number" name="amount" class="form-control" id="Amount" placeholder="Enter The Amount here!" required>
                    </div>

                    <div class="form-group text-dark">
                        <label for="desc">Item Purchased</label>
                        <input type="text" name="desc" class="form-control" id="desc" placeholder="Enter The Description here!" required>
                    </div>

                    <div class="form-group text-dark">
                        <label for="Amount">Password</label>
                        <input type="password" name="mifund_pwd" class="form-control" id="Amount" placeholder="Enter your transaction password here!" autocomplete="new-password" required>
                    </div>


                    <input name="transfer" type="submit" class="btn btn-primary btn-block" value="Transfer" onclick="return confirm('Are you sure?')">
                </form>

            </div>
        </div>
    </main>
</body>

<footer>
    <?php include_once('footer.php'); ?>
</footer>

</html>
