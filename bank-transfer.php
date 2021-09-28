<?php

    include_once('db-manager.php');
    require_once('session-manager.php');
    
    if(!SessionManager::isLoggedIn()){
        header("location:login.php");
     }

    $user_id = $_SESSION['user'];

    $SQL = "SELECT * FROM `mifund`, `users` WHERE `mifund_id` = `users_mifund_id` AND `id` = '$user_id'";
    $result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));
    
    while($row = mysqli_fetch_assoc($result)) {
        extract($row);
    }
    
?>

<body>
    <?php include_once('navbar.php'); ?>

    <main class="container">
        <form class="card p-4" method="post">
            <div class="form-group">
            <h4 class="mb-5">Fiat Balance: <b>NGN <?php echo number_format($mifund_wallet) ?></b></h4>  
            <hr>
                <label for="exampleInputAmount">Account Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputAmount" aria-describedby="amountHelp" placeholder="Enter Name">
            </div>
            <div>
                <label for="exampleInputAmount">Transfer Amount</label>
                <input type="number" name="amount" class="form-control" id="exampleInputAmount" aria-describedby="amountHelp" placeholder="Enter Amount">
            </div>
            <div class="form-group mt-2">
                <label for="select">Bank</label>
                <select class="custom-select" name="bank">
                    <option selected>Choose..</option>
                    <option value="">Access Bank</option>
                    <option value="">Fidelity Bank</option>
                    <option value="">FCMB</option>
                    <option value="">First Bank</option>
                    <option value="">Guaranty Trust Bank</option>
                    <option value="">Union Bank</option>
                    <option value="">United Bank For Africa</option>
                    <option value="">Zenith Bank</option>
                    <option value="">Citibank Bank</option>
                    <option value="">Ecobank Bank</option>
                    <option value="">Heritage Bank</option>
                    <option value="">Keystone Bank</option>
                    <option value="">Polaris Bank</option>
                    <option value="">Stanbic IBTC Bank</option>
                    <option value="">Standard Chartered Bank</option>
                    <option value="">Sterling Bank</option>
                    <option value="">Titan Trust Bank</option>
                    <option value="">Unity Bank</option>
                    <option value="">Wema Bank</option>
                    <option value="">Providus Bank</option>
                    <option value="">Jaiz Bank</option>
                    <option value="">Kuda Bank</option>
                </select>
            </div>
            <div class="form-group text-dark">
                <label for="Amount">Mifund Password</label>
                <input type="password" name="mifund_pwd" class="form-control" id="Amount" placeholder="Enter your transaction password here!" autocomplete="new-password"required>
            </div>
            <input type="submit" name="transfer" class="btn btn-primary" value="Transfer" onclick="return confirm('Are you sure?')">
        </form>
    </main>
</body>

<?php include_once('footer.php'); ?>