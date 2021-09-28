<?php 
    include_once("session-manager.php");
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
        
        body{
            background: url('images/background.webp') no-repeat;
        }
        @media(max-width: 700px){
            body{
                background: url('images/background4.jpeg') no-repeat;
            }
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
                            <a class="nav-link text-dark font-weight-bold" href="index.php#about">About us<span
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
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>';					
					    }
					?>
                    </ul>                  
                </div>

            </nav>
    </header>

    <Section class="container-fluid">     

        <div class="image d-lg-none">
            <img src="images/placeholder3.png" width="80%" alt="">
        </div>   
        
        <div class="section-title heading-text container mb-5 mt-3">
            <h2>About us</h2>
            <p>Mivedia</p>
        </div> 

        <div class="row my-5  ml-3">
            <div class="col-md-6 d-none d-lg-block"><img src="images/placeholder3.png" width="600" height="300" alt="" srcset=""></div>
            <div class="col-lg-6 col-md-12">
                <h4 class="font-weight-bold text-color">Our Mission..</h4>
                <p>All your commercial solutions, in one package.. Mivedia aims to bridge the gap between physical store outlets, and digital stores whilst offering a unique payment model encompassing blockchain technologies, with the sole purpose of achieving a seamless and flawless shopping experience.</p>
                </div>
            </div>
        </div>
        <hr>

        <div class="row mt-4 ml-3">
            <div class="col-md-4">
                <h5 class="font-weight-bold text-color">Verified transactions.</h5>
                <img src="images/secure-trade.png" class="img-fluid my-2" width="170" height="120" alt="">
                <p class="mt-2">All transactions are verified and secured. No fear of getting hacked, cheated or robbed.</p>
            </div>
            <div class="col-md-4">
                <h5 class="font-weight-bold text-color">Detailed Store Analytics</h5>
                <img src="images/analytics.jpg" class="img-fluid my-2" width="210" height="120" alt="">
                <p>Be it a local or virtual store, with Mivedia you can now manage your stores more effectively using the daily, weekly and monthly reports on sales.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="font-weight-bold text-color">Professional Customer Management System</h5>
                <img src="images/customer-management.png" class="img-fluid my-2" width="210" height="120" alt="">
                <p>With our advanced methodologies, you can now keep track of new and existing customers, send emails and offer discounts from time to time.</p>
            </div>
        </div>

    </Section>

    <section class="container-fluid mt-3">
        <h3 class="heading-text text-center">Our Team</h3>
       <div class="team row">
           <div class="col-md-4 team-card">
               <div class="content">
                   <div class="img">
                       <img src="images/darlington.jpg" alt="">
                   </div>
                   <div class="content">
                       <p>Nnam Darlington</p>
                       <p>CEO, founder</p>
                   </div>
                   <div class="social">
                       <a href=""><i class="fa fa-twitter"></i></a>
                       <a href=""><i class="fa fa-linkedin"></i></a>
                   </div>
               </div>
           </div>

           <div class="col-md-4 team-card">
               <div class="content">
                   <div class="img">
                       <img src="images/darlington.jpg" alt="">
                   </div>
                   <div class="content">
                       <p>Richard Divine</p>
                       <p>CTO, co-founder</p>
                   </div>
                   <div class="social">
                       <a href=""><i class="fa fa-twitter"></i></a>
                       <a href=""><i class="fa fa-linkedin"></i></a>
                   </div>
               </div>
           </div>

           <div class="col-md-4 team-card">
               <div class="content">
                   <div class="img">
                       <img src="images/darlington.jpg" alt="">
                   </div>
                   <div class="content">
                       <p>Benjamin</p>
                       <p>Mobile Dev, co-founder</p>
                   </div>
                   <div class="social">
                       <a href=""><i class="fa fa-twitter"></i></a>
                       <a href=""><i class="fa fa-linkedin"></i></a>
                   </div>
               </div>
           </div>
           
       </div>
    </section>

    <footer>
        <?php include_once('footer.php'); ?>
    </footer>
