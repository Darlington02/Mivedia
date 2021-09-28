<?php

    include_once('session-manager.php');
    include_once('db-manager.php');
    
    if(!SessionManager::isLoggedIn()){
        header("location:login.php");
     }

    $user_id = $_SESSION['user'];

    $SQL = "SELECT * FROM `mifund`, `users` WHERE `mifund_id` = `users_mifund_id` AND `id` = '$user_id'";
    $result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));
    
    while($row = mysqli_fetch_assoc($result)) {
        extract($row);
    }

    if(isset($_POST['lock'])){
        $lock_amount = $_POST['amount'];
        $lock_duration = $_POST['duration'];
        $mifund_pwd = $_POST['mifund_pwd'];
        $transaction_hash = 'MT'.uniqid();

        date_default_timezone_set('Africa/Lagos');
        $withdrawal_date = date('d-m-y', strtotime(" + $lock_duration"));

        // CHECK TO SEE IF LOCK AMOUNT IS GREATER THAN MIFUND BALANCE OR FOR WRONG PASSWORD
        if($lock_amount > $mifund_wallet){
            echo '<script>alert("You do not have sufficient funds for this transaction")</script>';
        }
        else if($mifund_pwd !== $transaction_password){
            echo '<script>alert("Your Mifund Transaction Password is Incorrect!")</script>';
        }
        else{
            // DEDUCT SENDER BALANCE
            $deduct_balance_sql = "UPDATE `mifund` SET `mifund_wallet`= `mifund_wallet`-'$lock_amount' WHERE `users_mifund_id` = '$user_id'";
            mysqli_query($cxn, $deduct_balance_sql) or die(mysqli_error($cxn));

            // SQL TO INSERT INTO MIFUND_SAVINGS
            $lock_sql = "INSERT INTO `mifund_savings`(`savings_user_id`, `savings_amount`, `savings_duration`, `withdrawal_date`) VALUES ('$user_id','$lock_amount','$lock_duration','$withdrawal_date')";
            mysqli_query($cxn, $lock_sql) or die(mysqli_error($cxn));

            header("location:success.php?receiver_name=Locked&&amount=$lock_amount&&hash=$transaction_hash");
        }
    }
?>

<body>
    <?php include_once('navbar.php'); ?>

    <main class="container">
        <form class="card p-4" method="post">
            <div class="form-group">
            <h4 class="mb-5">Fiat Balance: <b>NGN <?php echo number_format($mifund_wallet) ?></b></h4>  
            <hr>
                <label for="exampleInputAmount">Amount</label>
                <input type="number" name="amount" class="form-control" id="exampleInputAmount" aria-describedby="amountHelp" placeholder="Enter Amount">
            </div>
            <div class="form-group">
                <label for="select">Duration</label>
                <select class="custom-select" name="duration">
                    <option selected>Choose..</option>
                    <option value="1 month">1 month</option>
                    <option value="3 month">3 month</option>
                    <option value="6 month">6 month</option>
                    <option value="1 year">1 year</option>
                    <option value="2 years">2 years</option>
                    <option value="5 years">5 years</option>
                </select>
            </div>
            <div class="form-group text-dark">
                <label for="Amount">Password</label>
                <input type="password" name="mifund_pwd" class="form-control" id="Amount" placeholder="Enter your transaction password here!" autocomplete="new-password"required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">I agree to the terms</label>
            </div>
            <input type="submit" name="lock" class="btn btn-primary" value="lock" onclick="return confirm('Are you sure?')">
        </form>
    </main>
</body>

<?php include_once('footer.php'); ?>