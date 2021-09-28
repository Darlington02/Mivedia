<?php
    include_once("db-manager.php");
    include_once("session-manager.php");

    if(!SessionManager::isLoggedIn()){
        header("location:login.php");
     }

    $user_id = $_SESSION['user'];

    $SQL = "SELECT * FROM `mifund`, `users` WHERE `users_mifund_id` = `mifund_id` AND `id` = $user_id";
    $result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));
    
    while($row = mysqli_fetch_assoc($result)) {
        extract($row);
    }
    
?>

<style>

     
    @media only screen and (max-width: 768px){
        body{
            background: url('images/blue-background.jpg');
            background-repeat: no-repeat;
            background-position: top left;
            margin: 0 0 55px 0;
        }
        .nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 55px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            display: flex;
            overflow-x: auto;
        }
        
        .nav__link {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            min-width: 50px;
            overflow: hidden;
            white-space: nowrap;
            font-family: sans-serif;
            font-size: 13px;
            color: #444444;
            text-decoration: none;
            -webkit-tap-highlight-color: transparent;
            transition: background-color 0.1s ease-in-out;
        }
        
        .nav__link:hover {
            background-color: #eeeeee;
        }
        
        .nav__link--active {
            color: #009578;
        }
        
        .nav__icon {
            font-size: 18px;
        }
    }
    /* HEADER */
    .header {
    	width: 100%;
    	display: flex;
    	flex-direction: row;
    	justify-content: space-between;
    	align-items: center;
    	padding: 40px 30px;
    }
    
    .header h1 {
    	font-size: 16px;
    	flex: 2;
    	text-align: center;
    }
    
    .menu-icon-wrapper {
    	background-color: #22223A;
    	border-radius: 500px;
    	height: 45px;
    	width: 45px;
    	display: flex;
    	justify-content: center;
    	align-items: center;
    }
    
    .dots-wrapper div {
    	border-radius: 500px;
    	height: 5px;
    	width: 5px;
    	margin: 4px 2px;
    }
    
    .light-dot {
    	background-color: #A1A0BC;
    }
    
    .dark-dot {
    	background-color: #55546D;
    }
    
    .calender-icon-wrapper {
    	background-color: #22223A;
    	border-radius: 500px;
    	height: 45px;
    	width: 45px;
    	display: flex;
    	justify-content: center;
    	align-items: center;
    }
    
    .calender-icon-wrapper svg {
    	transform: scale(0.8);
    	opacity: 0.5;
    }
    h6{
        text-decoration: none;
        font-family: times new roman;
    }
    .mifund-icons{
        color: blue;
        font-size: 50px;
    }
</style>

<!-- Headers or Navbars -->
<div class="d-none d-lg-block">
    <?php include_once('navbar.php'); ?>
</div>

<div class="header d-lg-none">
    <div class="menu-icon-wrapper">
        <div class="dots-wrapper">
            <div class="light-dot"></div>
            <div class="dark-dot"></div>
        </div>
        <div class="dots-wrapper">
            <div class="dark-dot"></div>
            <div class="light-dot"></div>
        </div>
    </div>

    <div class="">
        <form method="POST">
            <h4 class="section-title heading-text text-light">
                <?php echo $mifund_id ?><input type="text" class="d-none" id="myInput" value="<?php echo $mifund_id ?>">
                <i type="submit" class="fa fa-clipboard" title="copy ID to clipboard" onclick="myFunction()"></i>
            </h4>
        </form>
    </div>
</div>

<!--Main Begins-->
<main class="container-fluid">
    <div class="section-title heading-text mb-5">
        <h6 class="">My Wallet</h6>
        <button type="button" class="btn btn-secondary btn-sm">Fiat</button>
        <button type="button" class="btn btn-light btn-sm"><a href="crypto-wallet.php" class="text-dark">Cryptocurrency</a></button>
    </div>
    
    <div class="list-group mt-3">
        <form method="POST" class="d-none d-lg-block">
            <h5 class="list-group-item list-group-item-action active bg-warning font-weight-bold">
                ID:  
                    <input type="text" id="myInput" value="<?php echo $mifund_id ?>">
                    <i type="submit" class="fa fa-clipboard" title="copy ID to clipboard" onclick="myFunction()"></i>    
            </h5>
        </form>

        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card-single">
                    <div>
                        <h4 class="my-3">Fiat: <b>NGN <?php echo number_format($mifund_wallet) ?></b></h4>
                        <div class="btn-group mt-5" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary"><a href="deposit.php" class="text-light">Deposit</a></button>
                        <button type="button" class="btn btn-warning"><a href="bank-withdrawal.php" class="text-light">Withdraw</a></button>
                        <button type="button" class="btn btn-success"><a href="bank-transfer.php" class="text-light">Transfer</a></button>
                    </div>
                </div>
                <div>
                    <span><img src="images/coin.png" width="200" class="card-image d-none d-lg-block" alt=""></span>
                    
                </div>
            </div>
        </div>
    </div>


    <!-- Services for large devices-->
    <section class="mt-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-3 mt-2">
                <a href="pay-local-store.php">
                    <div class="card-single">
                        <div>
                            <span><img src="images/mobile-store.png" width="90" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Pay Merchant</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mt-2">
                <a href="wallet-transfer.php">
                    <div class="card-single">
                        <div>
                            <span><img src="images/money-transfer.jpg" width="120" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Wallet To Wallet</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/qr.png" width="90" class="card-image" alt=""></span>
                        <a href="generate-qr.php"><p class="font-weight-bold mt-2">Generate QR</p></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/peer-exchange.png" width="137" class="card-image" alt=""></span>
                        <a href="https://virtual.mivedia.com"><p class="font-weight-bold mt-2">Mi-market</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services for sm devices -->
    <section class="mt-3 d-lg-none">
        <div class="row">
            <div class="col-6 mt-2">
                <a href="pay-local-store.php">
                    <div class="card-single">
                        <div>
                            <span><img src="images/mobile-store.png" width="50" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Pay Merchant</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 mt-2">
                <a href="wallet-transfer.php">
                    <div class="card-single">
                        <div>
                            <span><img src="images/money-transfer.jpg" width="70" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Wallet Transfer</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-6 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/qr.png" width="55" class="card-image" alt=""></span>
                        <a href="generate-qr.php"><p class="font-weight-bold mt-2">Generate QR</p></a>
                    </div>
                </div>
            </div>

            <div class="col-6 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/peer-exchange.png" width="90" class="card-image" alt=""></span>
                        <a href="https://virtual.mivedia.com"><p class="font-weight-bold mt-2">Mi-market</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!---Mifund Savings--->
    <div class="list-group mt-5">
        <a href="#" class="list-group-item list-group-item-action active bg-warning d-none d-lg-block">
                        Mifund Savings
        </a>
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card-single">
                    <div>
                    <h4 class="my-3">Locked Savings</h4>
                    <p>With Mifund Savings, lock funds away for a certain period of time.<br><br>
                    <b>NB: Your locked funds cannot be withdrawn before the stipulated time.</b></p>
                    <div class="btn-group mt-5" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary"><a href="lock-savings.php" class="text-light">Lock</a></button>
                        <button type="button" class="btn btn-warning"><a href="withdraw-savings.php" class="text-light">Withdraw</a></button>
                    </div>
                </div>
                <div>
                    <span><img src="images/secure-trade.png" width="200" class="card-image d-none d-lg-block" alt=""></span>
                    <span><img src="images/secure-trade.png" width="80" class="card-image d-lg-none" alt=""></span>
                </div>
            </div>
        </div>
    </div>
    
    <!--Organization-->
    <section class="mt-3">
        <div class="row">
            <div class="col-6 mt-2">
                <div class="card-single">
                <div>
                        <span><img src="images/coin.png" width="73" class="card-image" alt=""></span>
                        <a href="offerings.php"><p class="font-weight-bold mt-2">Tithes/Offerings</p></a>
                    </div>
                </div>
            </div>

            <div class="col-6 mt-2">
                <div class="card-single">
                <div>
                        <span><img src="images/fundraise.png" width="100" class="card-image" alt=""></span>
                        <a href="fundraising.php"><p class="font-weight-bold mt-2">Fundraisings</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Subscription and Bills-->
    <div class="list-group mt-5">
        <a href="#" class="list-group-item list-group-item-action active bg-warning d-none d-lg-block">
                       Bill Payments And Subscriptions
        </a>
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card-single">
                    <div>
                    <h4 class="my-3">Bill payments</h4>
                    <p>With your mifund wallet, pay all your bills and purchase all your subscriptions from the comfort of your home.<br><br>
                </div>
                <div>
                    <span><img src="images/bills.png" width="200" class="card-image d-none d-lg-block" alt=""></span>
                    <span><img src="images/bills.png" width="80" class="card-image d-lg-none" alt=""></span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bills for large devices-->
    <section class="mt-3 d-none d-lg-block">
        <div class="row">
            <div class="col-md-3 mt-2">
                <a href="pay-local-store.php">
                    <div class="card-single">
                        <div>
                            <span><img src="images/internet.png" width="60" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Data</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mt-2">
                <a href="#">
                    <div class="card-single">
                        <div>
                            <span><img src="images/airtime.png" width="120" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Airtime</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/electricity.png" width="60" class="card-image" alt=""></span>
                        <a href="#"><p class="font-weight-bold mt-2">Electricity </p></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/tv-sub.png" width="65" class="card-image" alt=""></span>
                        <a href="#"><p class="font-weight-bold mt-2">DSTV/GOtv</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bills for sm devices -->
    <section class="mt-3 d-lg-none">
        <div class="row">
            <div class="col-6 mt-2">
                <a href="#">
                    <div class="card-single">
                        <div>
                            <span><img src="images/internet.png" width="50" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Buy Data</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 mt-2">
                <a href="#">
                    <div class="card-single">
                        <div>
                            <span><img src="images/airtime.png" width="100" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Airtime</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-6 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/electricity.png" width="55" class="card-image" alt=""></span>
                        <a href="#"><p class="font-weight-bold mt-2">Electricity </p></a>
                    </div>
                </div>
            </div>

            <div class="col-6 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/tv-sub.png" width="60" class="card-image" alt=""></span>
                        <a href="#"><p class="font-weight-bold mt-2">DSTV/GOtv</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</main>
<!--Bottom Navbar-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <nav class="nav d-lg-none">
        <a href="wallet.php" class="nav__link">
            <i class="material-icons nav__icon">dashboard</i>
            <span class="nav__text">Wallet</span>
        </a>
        <a href="dashboard.php" class="nav__link nav__icon">
            <i class="material-icons nav__icon">account_circle</i>
            <span class="nav__text">Profile</span>
        </a>
        <a href="local-stores.php" class="nav__link">
            <i class="material-icons nav__icon">storefront</i>
            <span class="nav__text">Mi-local</span>
        </a>
        <a href="https://virtual.mivedia.com" class="nav__link">
            <i class="material-icons nav__icon">shopping_cart</i>
            <span class="nav__text">Mi-virtual</span>
        </a>
    </nav>

<script>
    function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("myInput");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Your Mifund ID was copied successfully: " + copyText.value);
    } 
</script>

<footer>
    <?php include_once('footer.php'); ?>
</footer>

</body>
</html>

