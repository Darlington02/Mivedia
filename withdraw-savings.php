<?php

    include_once('session-manager.php');
    include_once('db-manager.php');

    $id = $_SESSION['user'];

    if(isset($_POST['withdraw'])){

        $amount = $_POST['amount'];
        $savings_user_id = $_POST['savings_user_id'];
        $savings_id_count = $_POST['savings_id_count']; 

        // SELECT MIFUND WALLET INFORMATION
        $mifund_wallet_sql = "SELECT * FROM `mifund` WHERE `users_mifund_id` = '$id'";
        $mifund_wallet_result = mysqli_query($cxn, $mifund_wallet_sql) or die(mysqli_error($cxn));
        while($mifund_wallet_row = mysqli_fetch_assoc($mifund_wallet_result)){
            extract($mifund_wallet_row);
        }

        // ADD MIFUND BALANCE
        $add_balance_sql = "UPDATE `mifund` SET `mifund_wallet`= `mifund_wallet`+'$amount' WHERE `users_mifund_id` = '$savings_user_id'";
        mysqli_query($cxn, $add_balance_sql) or die(mysqli_error($cxn));

        // CHANGE WITHDRAWAL STATUS
        $change_status_sql = "UPDATE `mifund_savings` SET `status`= 'completed' WHERE `savings_id_count` = '$savings_id_count'";
        mysqli_query($cxn, $change_status_sql) or die(mysqli_error($cxn));

        echo "<script>alert('Your savings was withdrawn successfully')</script>";
    }
?>

<body>
    <?php include_once('navbar.php'); ?>

    <main class="container">
    <div class="card small-card mt-5">
            <div class="card-header">
                <h6 class="pr-3">Locked Funds</h6>
            </div>
            <div class="alert alert-warning">NB: Your locked funds cannot be withdrawn before the stipulated time.</div>
            <ul class="list-group mt-2">
                <?php
                    $sql = "SELECT * FROM `mifund_savings` WHERE `savings_user_id` = '$id'";
                    $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
                    if($result){
                        while($row = mysqli_fetch_assoc($result)) {
                            extract($row);

                            $today = date("d-m-y");

                            $date1 = strtotime($withdrawal_date);  
                            $date2 = strtotime($today);

                            if($date2 >= $date1){
                                $withdraw = 'yes';
                            }else{
                                $withdraw = 'no';
                            }

                        if($status == "pending"){
                            echo '
                            <ul>
                            <div class="card-single mt-3 col-md-4">
                            <div>
                                <a href="#"><h3>NGN '; echo $row["savings_amount"]; echo '</h3></a>
                                <span>Duration: <h6>'; echo $savings_duration; echo '</h6></span>
                                <span>Withdrawal Date: <h6>'; echo $withdrawal_date; echo '</h6></span>';

                                if($withdraw == "yes"){
                                    echo '
                                    <form method="post">

                                        <input type="hidden" name="amount" value="';echo $row["savings_amount"]; echo '">
                                        <input type="hidden" name="savings_user_id" value="'; echo $row["savings_user_id"]; echo '">
                                        <input type="hidden" name="savings_id_count" value="'; echo $row["savings_id_count"]; echo '">
                                        <button type="submit" name="withdraw" class="btn btn-warning" onclick="return confirm(\'withdraw your savings?\')">Withdraw</button>

                                    </form>';
                                }else{
                                    echo '
                                        <div class="btn-group mt-5" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary"><a href="lock-savings.php" class="text-light">Deposit</a></button>
                                            <button type="button" class="btn btn-warning" disabled>Withdraw</button>
                                        </div>';
                                } echo '
                            </div>
                            <div>
                                <span><img src="images/instant-pay.webp" width="80" class="card-image" alt=""></span>
                            </div>
                        </div>';

                        }
                                    echo '</form>
                                </ul>
                            </li>';
                        }
                    }
                ?>
            </ul>
        </div>
    </main>

    <footer>
        <?php include_once('footer.php'); ?>
    </footer>

</html>