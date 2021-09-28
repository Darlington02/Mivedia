<?php

    require_once('session-manager.php');
    include_once('db-manager.php');

    $user = $_SESSION['user'];
    
?>

<body>
    <?php include_once('navbar.php'); ?>
    <main class="container mt-5">
        <h2 class="text-dark mb-3 text-center heading-text">Deposit into Wallet</h2>

        <form method="POST" action="deposit_confirm.php">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                <div class="form-group text-dark">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter the Amount here!">
                </div>
                </li>                
                <li class="list-group-item">
                    <button type="submit" class="btn btn-warning btn-lg btn-block"> Deposit</button>
                </li>
            </ul>
        </form>
    </main>

</body>

<footer>
    <?php include_once('footer.php'); ?>
</footer>
</html>
