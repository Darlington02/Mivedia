<?php

    require_once('merchant-session-manager.php');
    include_once('db-manager.php');

    $type = $_SESSION["type"];
    
    if(!MerchantSessionManager::isLoggedIn()){
        header("location:seller-login.php");
    }

    if($type == "user"){
        header("location:index.php");
    }
    
    if(isset($_POST['generate'])){
        $duration = $_POST['duration'];
        $coupon = $_POST['coupon'];
        $minimum = $_POST['minimum'];

        $sql = "INSERT INTO `coupons`(`coupon`, `duration`, `minimum`) VALUES ('$coupon','$duration','$minimum')";
        mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
        
        echo "<script>alert('$package coupon successfully created')</script>";
        echo "<script>window.location='create-coupon.php'</script>";
    }
?>

<head>
    <style>
        .jumbotron{
            color: gainsboro;
            margin: 40px;
            box-shadow: 0 50px 50px rgba(0,0,0,0.5);
        }
    </style>  
</head>

<body>
    <?php include_once('seller-nav.php'); ?>
    <main class="container">
        <h2 class="text-dark mb-3 text-center">Generate coupon</h2>

        <form method="post">
            <div class="form-group text-dark">
                <label for="inlineFormCustomSelect">Duration</label>
                <select name="duration" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Choose...</option>
                    <option>1 day</option>
                    <option>2 days</option>
                    <option>3 days</option>
                    <option>1 week</option>
                    <option>1 month</option>
                    <option>1 year</option>
                </select>
            </div>
            
            <div class="form-group text-dark">
                <label for="inlineFormCustomSelect">Minimum buy order</label>
                <input type="number" name="minimum" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Minimum">
            </div>
            <div class="form-group text-dark">
                <label for="couponCode">Coupon Code</label>
                <input type="text" name="coupon" class="form-control" id="couponCode" placeholder="Enter Your Coupon Here">
            </div>
            <button type="submit" name="generate" class="btn btn-primary btn-md mt-2">Generate</button>
        </form>
    </main>
</body>

<footer>
    <?php include_once('footer.php'); ?>
</footer>

</html>