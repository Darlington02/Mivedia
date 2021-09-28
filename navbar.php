<?php
    require_once("session-manager.php");
    
    if(SessionManager::isLoggedIn()){
        $email_user_id = $_SESSION['user'];
    }

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
        
        @media only screen and (max-width: 768px){
        body{
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
                        }else{
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
        
        <!--Bottom Navbar-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <nav class="nav d-lg-none">
        <a href="wallet.php" class="nav__link">
            <i class="material-icons nav__icon">dashboard</i>
            <span class="nav__text">Wallet</span>
        </a>
        <a href="dashboard.php" class="nav__link nav__link--active">
            <i class="material-icons nav__icon">person</i>
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
        
        <!--EMAIL VERIFICATION-->
    <?php
    if(SessionManager::isLoggedIn()){
        $SQL = "SELECT `email_verification` FROM `users` WHERE `id` = '$email_user_id'";
        $result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));
        
        while($row = mysqli_fetch_assoc($result)) {
            extract($row);
        }
            if($email_verification !== "verified"){
            echo '<div class="alert alert-danger" role="alert">
                     Your account is not verified! Please verify your account to gain full access. <a href="send-verification-email.php">Resend Verification Email</a> 
                  </div>';
        }
    }
        
    ?>

