<?php

    require_once('merchant-session-manager.php');
    include_once('db-manager.php');
    
    if(!MerchantSessionManager::isLoggedIn()){
        header('location:seller-login.php');
    }
    $merchant_id = $_SESSION["merchant"];
    $store_type = $_SESSION["type"];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        .navbar {
            background: linear-gradient(skyblue, white);
        }

    </style>

</head>

<body>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" width="200" height="200"
                    alt="" srcset=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-bars text-white" id="nav-toggle"></i>
                </span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-dark font-weight-bold" href="about.php">About us<span
                                class="sr-only">(current)</span></a>
                    </li>
                
                <li class="nav-item active">
                            <?php
                                if($_SESSION['type'] == "merchant"){
                                    echo "<a href='management-dashboard.php' class='nav-link text-dark'>Management Dashboard</a>
                                    ";
                                }
                        ?>
                        </li>
                        
                <?php 
                    if(!MerchantSessionManager::isLoggedIn()){
                        echo '<li class="nav-item">
                        <a class="nav-link text-dark font-weight-bold mr-2" href="signup.php">Sign up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark font-weight-bold" href="login.php">Login</a>
                        </li>';
                    }else{
                        echo'
                        <li class="nav-item">
                            <a class="nav-link text-dark font-weight-bold" href="local-stores.php">Mivedia Locals</a>
                        </li>';
                        
                        if($_SESSION['type'] == "super" OR $_SESSION['type'] == "admin"){
                            echo "<a class=\"nav-link text-dark font-weight-bold nav-item\" href=\"admin-dashboard.php\">Admin Dashboard</a>";
                        }else{
                                    echo" ";
                        }
                        
                    echo '<li class="nav-item">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user text-dark"></i><span class="text-dark">'; echo " ".$_SESSION["name"];
                    echo '</span>
                    </a>
                    <div class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="management-dashboard.php">Dashboard</a>
                    <a class="dropdown-item" href="https://mivedia.com/store-outlet.php?merchant='; echo $merchant_id; echo '">My Organization</a>
                    <a class="dropdown-item" href="seller-logout.php">Logout</a>
                    </div>
                </li>';					
                    }
                ?>
                </ul>                  
            </div>

        </nav>
        
        <!--EMAIL VERIFICATION-->
    <?php
    // if(SessionManager::isLoggedIn()){
    //     $SQL = "SELECT `email_verification` FROM `users` WHERE `id` = '$email_user_id'";
    //     $result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));
        
    //     while($row = mysqli_fetch_assoc($result)) {
    //         extract($row);
    //     }
    //         if($email_verification !== "verified"){
    //         echo '<div class="alert alert-danger" role="alert">
    //                  Your account is not verified! Please verify your account to gain full access. <a href="send-verification-email.php">Resend Verification Email</a> 
    //               </div>';
    //     }
    // }
        
    ?>

