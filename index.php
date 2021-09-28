<?php 
    include_once("session-manager.php");
    
    $type = $_SESSION['type'];
    
    if($type == 'merchant'){
        header('location:management-dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fa/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <style>
        :root{
            --blue: #2273f8;
        }
        *{
            font-family: 'Open Sans', sans-serif;
            margin:0; padding: 0;
            box-sizing: border-box;
            outline: none;
            text-decoration: none;
            transition: all .2s linear;
            text-transform: capitalize;
        }
        .home{
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            background-size: 140%, 85%;
            background-position: top;
            padding: 1.5rem, 7%;
        }
        .home .image{
            flex: 1 1 40rem;
            padding-top: -16rem;
        }
        .home .image img{
            width: 60%;
        }
        .home .content{
            flex: 1 1 40rem;
        }
        .home .content h1{
            font-size: 4rem;
            font-family: times new roman;
            color: black;
        }
        p{
            font-family: times new roman;
        }
        .home .content p{
            font-size: 1.2rem;
            color: black;
            padding: .5rem, 0;
        }
        .link-btn{
            margin-left: 40px;
            display: inline-flex;
        }
        .link-btn-inner{
            margin: 10px;
        }

        .accept-crypto{
            background-image: url('images/mivedia-pos.png');
            height: 600px;
            margin-top: 30px;
            margin-bottom: 20px;
        }
        .shadow {
            background-color: rgba(0, 0, 0, 0.7);
            height: 600px;
        }

        .miv-card {
            background-image: url('images/Circuit Primary.svg');
            height: 600px;
            margin-top: 30px;
            margin-bottom: 20px;
        }
        @media(max-width: 760px){
            .miv-card {
                background-image: url('images/Circle-background.png');
                height: 600px;
                margin-top: 30px;
                margin-bottom: 40px;
            }
        }
        .card-details{
            margin-top: 200px;
        }
        .card-image{
            margin-top: 60px;
        }

        .app-download {
            background-image: url('images/Polygon.svg');
            height: 600px;
            margin-top: 100px;
            margin-bottom: 20px;
        }

        @media(max-width: 760px){
            .home .content h1{
            font-size: 2rem;
            
            color: black;
            }
            .home .content p{
                font-size: 0.9rem;
                color: black;
                padding: .5rem, 0;
            } 
            
        }
        .store{
            margin-top: 120px;
        }
        body{
            background: url('images/background2.png') no-repeat;
        }
        
        .unavailable{
            text-decoration: line-through;
        }
    
    </style>
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand pl-3" href="index.php"><img src="images/logo.png" width="220" height="220"
                        alt="" srcset=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars" id="nav-toggle"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse text-center" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-dark font-weight-bold" href="about.php">About us<span
                                    class="sr-only">(current)</span></a>
                        </li>
                        
                    
                    <?php 
                        if(!SessionManager::isLoggedIn()){
                            echo '<li class="nav-item">
                            <a class="nav-link text-dark font-weight-bold mr-2" href="signup.php">Sign up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark font-weight-bold" href="login.php">Login</a>
                            </li>';
                        }else{
                            echo'
                            <li class="nav-item">
                                <a class="nav-link text-dark font-weight-bold" href="local-stores.php">Mi-Locals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark font-weight-bold" href="https://virtual.mivedia.com">Mi-market</a>
                            </li>';
                        
                            if($_SESSION['type'] == "super" OR $_SESSION['type'] == "admin"){
                                echo "<a class=\"nav-link text-dark font-weight-bold nav-item\" href=\"admin-dashboard.php\">Admin Dashboard</a>";
                            }
                            else{
                                        echo" ";
                            }
                            
                        echo '<li class="nav-item">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user text-dark"></i><span class="text-dark">'; echo " ".$_SESSION["name"];
                        echo '</span>
                        </a>
                        <div class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                        <a class="dropdown-item" href="wallet.php">Wallet</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>';					
					    }
					?>
                    </ul>                  
                </div>

            </nav>
    </header>

    <Section class="home" id="home">
           <div class="content pl-4">
                    <h1>Mivedia - Digital Commerce Solutions</h1>
                    <p>All your commercial solutions in one package, creating a financial ecosystem.<br> Mivedia is a fintech startup, that aims at providing a platform equipped with the neccessary tools required to help Small and Medium Entreprises(SMEs) in Africa grow, the right web technologies to help users monitor expenses, control their finances and make day to day transactions without costs.</p>
                    <div class="link-btn">
                    <div class="link-btn-inner">
                    <?php
                        if(!SessionManager::isLoggedIn()){
                        echo'
                            <span><a href="signup.php"><h5><button class="btn btn-warning">Create Account <i class="fa fa-angle-double-right"></i></button></h5></a></span>';
                        }else{
                            echo'
                            <span><a href="wallet.php"><h5><button class="btn btn-warning">Mifund Wallet <i class="fa fa-angle-double-right"></i></button></h5></a></span>';
                        }
                    ?>
                    </div>
                </div>
           </div>       

           <div class="image">
                <img src="images/mobile.png" alt="">
           </div>     
    </Section>
    
    <main class="">

        <!-- Features -->
        <section class="container">
        <div class="row">
            <div class="col-md-3 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/money-transfer.jpg" width="160" class="card-image" alt=""></span>
                        <p class="font-weight-bold">wallet to wallet transfer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/mobile-store.png" width="120" class="card-image" alt=""></span>
                       <p class="font-weight-bold">Buy from local store.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/airtime.png" width="230" class="card-image" alt=""></span>
                       <p class="font-weight-bold">Purchase Airtime</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/tech.png" width="160" class="card-image" alt=""></span>
                       <p class="font-weight-bold">Buy from Virtual store.</p>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!-- Local Store -->
            <section class="local container-fluid">
                <div class="row store">
                    <div class="col-md-6 d-none d-lg-block">
                        <img src="images/local-sales.jpeg" width="550" height="300" alt="">
                    </div>
                    <div class="col-md-6 d-lg-none">
                        <img src="images/local-sales.jpeg" width="300" height="250" alt="">
                    </div>

                    <div class="col-md-5 mt-2">
                        <p>Mivedia Locals, connects physical shops from across the Country. Purchase goods and services from your favourite eateries, stores, shopping malls etc and make payments, using your Mifund wallet.</p>
                        <br>
                        <p>Get listed on Mivedia Locals today, and reach out to over a thousand mifund users. With Mivedia, you can accept payments in both fiats and cryptocurrencies, and keep track of your day to day sales transactions with no hassles.</p>
                        <span><a href="local-stores.php"><h5><button class="btn btn-primary">Mivedia Locals <i class="fa fa-angle-double-right"></i></button></h5></a></span>
                    </div>
                </div> 
            </section>
        <!-- Virtual Store -->
        <section class="virtual container-fluid">
            <div class="row store">
                <div class="col-md-6 d-lg-none">
                    <img src="images/peer-exchange.png" width="300" height="250" alt="">
                </div>

                <div class="col-md-5 mt-2">
                    <p>Purchase goods and services online, from different merchants across the Globe, protected by our customer safety policies, and get them delivered to your doorsteps. Payments are easy, swift and secured when using your Mifund wallet.</p>
                    <br>
                    <p>Do you have a physical outlet and in dire need of a virtual marketplace from which you can have access to more potential customers, not restricted to your surrounding region? Mivedia virtual was created to help you reach out to more persons in a shorter time and with lesser resources. Sign up as a virtual store owner, to join over 500+ merchants trading on Mivedia, and have access to over 2,000 mifund users.</p>
                    <span><a href="https://virtual.mivedia.com"><h5><button class="btn btn-warning">Mi-market <i class="fa fa-angle-double-right"></i></button></h5></a></span>
                </div>
                
                <div class="col-md-6 d-none d-lg-block">
                    <img src="images/peer-exchange.png" width="650" height="300" alt="">
                </div>
            </div> 
        </section>
        
        <!-- Crypto payments are accepted -->
        <div class="accept-crypto">
            <div class="shadow">
            <section class="container-fluid">
                <div class="row store">
                    <div class="card-details text-light text-center">
                        <p>Get your business, school, Church and NGOs listed on Mivedia Locals, to gain access to our advanced web technologies, to manage your organization effectively, control finances efficiently, and establish a strong digital presence at almost no cost.</p>
                        <br>
                        <span><a href="signup.php"><h5><button class="btn btn-primary mt-3">Get Started <i class="fa fa-angle-double-right"></i></button></h5></a></span>
                    </div>
                </div> 
            </section>
            </div>
        </div>

        <!-- MEET MiBA -->
        <section class="text-center" id="organization-signup">
            <h2 class="heading-text text-center mt-5" id="packages">Mivedia's Business Assistant</h2>
            <p>Meet MiBA our local business Assistant.<br> With MiBA, manage your organizations with ease and efficiency. MiBA is the all in one AI, to help you organize your business, improve productivity and achieve mind-blowing results. <br>MiBA was built specifically for Mivedia Locals, to help manage and keep track of your organization’s performances. Our AI could help you achieve a lot with its robust management-oriented  services. Hire MiBA today.</p>
            <!-- MiBA image for small devices -->
            <div class="miba-card d-lg-none">
                <div class="card__content">
                    <div class="card__front">
                        <img src="images/miba-female.png" width="230" alt="">
                    </div>

                    <div class="card__back">
                        <img src="images/miba-male.png" width="200" alt="">
                    </div>
                </div>
            </div>

        <!-- OUR PACKAGES -->
        <div class="container-fluid cards">
                <div class="card-single">
                    <div>
                        <a href="update.php"><h3>MiBA Classic</h3></a>
                        <span class="font-weight-bold"><h5>Price: NGN 0</h5></span>
                        <!-- Listing offerings -->
                        <ul class="list-group">
                            <li class="list-group-item">Accept Mifund Payment</li>
                            <li class="list-group-item">Access MiBA Dashboard</li>
                            <li class="list-group-item">Email Notifications</li>
                            <li class="list-group-item">SMS Notifications</li>
                            <li class="list-group-item unavailable">Product Catalogue</li>
                            <li class="list-group-item unavailable">Mi coupons</li>
                            <li class="list-group-item unavailable">Google My Business Listing</li>
                            <li class="list-group-item unavailable">Detailed Analytics/Report</li>
                            <li class="list-group-item unavailable">Keep Track of Customers</li>
                            <li class="list-group-item unavailable">Send promotional emails to Customers</li>
                            <li class="list-group-item unavailable">Email Statement</li>
                        </ul>
                        <a href="seller-signup.php?package=classic"><button class="btn btn-block btn-warning mt-3">Sign Up</button></a>
                    </div>
                    <div class="span">
                        <!-- for large devices -->
                        <div class="miba-card d-none d-lg-block">
                            <div class="card__content">
                                <div class="card__front">
                                    <img src="images/miba-female.png" width="230" alt="">
                                </div>

                                <div class="card__back">
                                    <img src="images/miba-male.png" width="200" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- for small devices -->
                        <span class="d-lg-none"><img src="images/swift.png" width="150" class="card-image" alt=""></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <a href="update.php"><h3>MiBA Gold</h3></a>
                        <span class="font-weight-bold"><h5>Price: NGN 1,999/mth</h5></span>
                        <!-- Listing offerings -->
                        <ul class="list-group">
                            <li class="list-group-item">Accept Mifund Payment</li>
                            <li class="list-group-item">Access MiBA Dashboard</li>
                            <li class="list-group-item">Google My Business Listing</li>
                            <li class="list-group-item">Email Notifications</li>
                            <li class="list-group-item">SMS Notifications</li>
                            <li class="list-group-item">Product Catalogue</li>
                            <li class="list-group-item">Mi coupons</li>
                            <li class="list-group-item unavailable">Detailed Analytics/Report</li>
                            <li class="list-group-item unavailable">Keep Track of Customers</li>
                            <li class="list-group-item unavailable">Send promotional emails to Customers</li>
                            <li class="list-group-item unavailable">Email Statement</li>
                        </ul>
                        <a href="subscription_payment.php?package=gold"><button class="btn btn-block btn-warning mt-3">Sign Up</button></a>
                    </div>
                    <div class="span">
                        <!-- for large devices -->
                        <div class="miba-card d-none d-lg-block">
                            <div class="card__content">
                                <div class="card__front">
                                    <img src="images/miba-female.png" width="230" alt="">
                                </div>

                                <div class="card__back">
                                    <img src="images/miba-male.png" width="200" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- for small devices -->
                        <span class="d-lg-none"><img src="images/speedy.png" width="150" class="card-image" alt=""></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <a href="update.php"><h3>MiBA Premium</h3></a>
                        <span class="font-weight-bold"><h5>Price: NGN 4,999/mth</h5></span>
                        <!-- Listing offerings -->
                        <ul class="list-group">
                            <li class="list-group-item">Accept Mifund Payment</li>
                            <li class="list-group-item">Access MiBA Dashboard</li>
                            <li class="list-group-item">Google My Business Listing</li>
                            <li class="list-group-item">Email Notifications</li>
                            <li class="list-group-item">SMS Notifications</li>
                            <li class="list-group-item">Product Catalogue</li>
                            <li class="list-group-item">Mi coupons</li>
                            <li class="list-group-item">Detailed Analytics/Report</li>
                            <li class="list-group-item">Keep Track of Customers</li>
                            <li class="list-group-item">Send promotional emails to Customers</li>
                            <li class="list-group-item">Email Statement</li>
                        </ul>
                        <a href="subscription_payment.php?package=premium"><button class="btn btn-block btn-warning mt-3">Sign Up</button></a>
                    </div>
                    <div class="span">
                        <!-- for large devices -->
                        <div class="miba-card d-none d-lg-block">
                            <div class="card__content">
                                <div class="card__front">
                                    <img src="images/miba-female.png" width="230" alt="">
                                </div>

                                <div class="card__back">
                                    <img src="images/miba-male.png" width="200" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- for small devices -->
                        <span class="d-lg-none"><img src="images/lightning.png" width="150" class="card-image" alt=""></span>
                    </div>
                </div>

        </section>

        <!-- Mivedia Cards Coming Soon -->
        <div class="accept-crypto">
            <div class="shadow">
            <section class="container-fluid">
                <div class="row store">
                    <div class="col-md-5 card-details text-light">
                        <p>Mivedia Debit cards and QR POS will be coming soon. With our debit cards, you can withdraw funds, directly from your mifund wallet, from any ATM outlet in the country. <br><br>
                        </p>
                        <br>
                        <span><a href="virtual.mivedia.com"></a><h5><button class="btn btn-warning" disabled>Coming Soon <i class="fa fa-angle-double-right"></i></button></h5></a></span>
                    </div>
                    
                    <div class="col-md-6 d-none d-lg-block card-image">
                        <img src="images/mivedia-card.png" width="850" height="500" alt="">
                    </div>
                </div> 
            </section>
            </div>
        </div>

        <!-- Features -->
        <section class="container mt-3">
            <h2 class="heading-text text-center mt-5" id="packages">As A Mifund User,</h2>
            <div class="row">
                <div class="col-md-4 mt-2">
                    <div class="card-single">
                        <div>
                            <span><img src="images/instant-pay.webp" width="90" class="card-image" alt=""></span>
                            <p class="font-weight-bold">instant payments</p>
                            <p class="mt-2">Make payments to store owners instantly from your Mifund Wallet by visiting the site or using the USSD code.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="card-single">
                        <div>
                            <span><img src="images/wallet.png" width="120" class="card-image" alt=""></span>
                        <p class="font-weight-bold">Operate cashless</p>
                        <p class="mt-2">Get access to all you need using your phone and your Mipay wallet. Time to go cashless</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="card-single">
                        <div>
                            <span><img src="images/secured.jpg" width="130" class="card-image" alt=""></span>
                        <p class="font-weight-bold">Verified and secure transactions.</p>
                        <p class="mt-2">All transactions are verified and secured. No fear of getting hacked, cheated or robbed.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- DOWNLOAD APP BUTTONS -->
        <div class="app-download">
        <section class="container-fluid">
            <div class="row">
                <div class="col-md-5 mt-5 d-lg-none text-light">
                    <p>Get your Mifund Mobile App for your Android Devices on Google play store, or on Apple Store for your IOS Devices.</p>
                </div>
                <div class="col-md-6 d-lg-none card-details">
                    <img src="images/google-play-badge.png" width="300" class="app-store-btn-sm" alt="">
                    <img src="images/apple-store-badge.png" width="230" class="app-store-btn-sm" alt="">
                </div>

                <div class="col-md-5 card-details d-none d-lg-block text-light">
                    <p>Get your Mivedia Mobile App for your Android Devices on Google play store, or on Apple Store for your IOS Devices.</p>
                </div>
                
                <div class="col-md-6 d-none d-lg-block card-image">
                    <img src="images/google-play-badge.png" width="300" class="app-store-btn-lg" alt="">
                    <img src="images/apple-store-badge.png" width="230" class="app-store-btn-lg" alt="">
                </div>
            </div> 
            </section>
        </div>

<?php include_once('footer.php'); ?>
</body>

