<?php 

    include_once('session-manager.php');
    include_once('db-manager.php');
    

?>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: new times roman;
    }
    main{
        width: 100%;
        background: linear-gradient(skyblue, white);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
    @media only screen and (min-width: 768px){
        main{
            padding: 5em 5em;
        }
    }
    .category-lg{
        height: 100vh;
        background-color: rgba(255,255,255,0.5);
        backdrop-filter: blur(10px);
        border: 2px solid transparent;
        border-radius: 25px;
        background-clip: padding-box;
    }
    .category-list{
        list-style: none;
        margin-left: 18px;
        padding-top: 20px;
    }
    .category-list li{
        padding-top: 20px;
    }

    .category-sm{
        background-color: rgba(255,255,255,0.5);
        backdrop-filter: blur(10px);
        border: 2px solid transparent;
        border-radius: 25px;
        background-clip: padding-box;
    }
</style>

<body>
    <header>
        <?php include_once('navbar.php') ?>
    </header>

    <main>
    <!-- LARGE DEVICES -->
        <div class="lg-devices row">
            <div class="category-lg col-md-4 d-none d-lg-block">
                <h4 class="text-center mt-3">Categories</h4>
                <hr>
                <ul class="category-list text-center">
                    <li>Food</li> 
                    <li>Clothings</li>
                    <li>Snacks & Drinks</li>
                    <li>Electronics</li>
                    <li>Health</li>
                    <li>Home Appliances</li>
                </ul>
            </div>


        <div class="stores col-md-7 d-none d-lg-block">
            <?php
                $select_sql = "SELECT * FROM `merchants`";
                $result = mysqli_query($cxn, $select_sql) or die(mysqli_error($cxn));
                while($row = mysqli_fetch_assoc($result)){
                    echo '
                            <div class="card mb-3 mt-3" style="max-width: 100%;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                    <img src="'; echo $row["store_img"]; echo '" class="card-img" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="store-outlet.php?merchant='; echo $row["merchant_id"]; echo '"><h5 class="card-title">'; echo $row["store_name"]; echo '</h5></a>
                                        <p class="card-text"><small class="text-muted">'; echo $row["store_address"]; echo '</small></p>
                                        <p class="card-text">'; echo $row["store_description"]; echo '</p>
                                        <p class="card-text"><small class="text-muted">'; echo $row["store_motto"]; echo '..</small></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    ';
                }
            ?>
            
            </div>
        </div>

    <!-- SMALL DEVICES -->
        <div class="category-sm d-lg-none mt-3">
          <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <a href="categories.php?category=Food And Restaurant"><img src="images/food.png" width="70" height="60"></a>
                        <p class="text-center">Food</p>
                    </div>
                    <div class="col-4">
                        <a href="categories.php?category=Education"><img src="images/library.png" width="60"></a>
                        <p class="text-center">Educational</p>
                    </div>
                    <div class="col-4">
                        <a href="categories.php?category=Health"><img src="images/health.png" width="70" height="60"></a>
                        <p class="text-center">Health</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <a href="categories.php?category=Clothings"><img src="images/shirt.png" width="60"></a>
                        <p class="text-center">Clothings</p>
                    </div>
                    <div class="col-4">
                        <a href="categories.php?category=Home"><img src="images/vacuum.png" width="60"></a>
                        <p class="text-center">Home</p>
                    </div>
                    <div class="col-4">
                        <a href="categories.php?category=Mobile phones & laptops"><img src="images/samsung-ultra.png" width="70"></a>
                        <p class="text-center">Mobile Phones</p>
                    </div>
                </div>
          </div>
        </div>

        <div class="card store-sm d-lg-none mt-3">
            
            <?php 
            $sm_select_sql = "SELECT * FROM `merchants`";
            $sm_result = mysqli_query($cxn, $sm_select_sql) or die(mysqli_error($cxn));
            while($sm_row = mysqli_fetch_assoc($sm_result)){
                echo '
                    <div class="card-single m-2">
                        <div>
                            <a href="store-outlet.php?merchant='; echo $sm_row["merchant_id"]; echo '"><h5 class="font-weight-bold">'; echo $sm_row["store_name"]; echo '</h5></a>
                            <p class="card-text"><small class="text-muted">'; echo $sm_row["store_address"]; echo '</small></p>
                            <p>'; echo $sm_row["store_description"]; echo '</p>
                        </div>
                    <span><img src="'; echo $sm_row["store_img"]; echo '" width="120" class="card-image" alt=""></span>
                    </div>';
                }
                ?>
        </div>
    </main>
</body>

<footer>
    <?php include_once('footer.php'); ?>
</footer>