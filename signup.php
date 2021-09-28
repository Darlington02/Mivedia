<?php
    require_once("session-manager.php");
    require_once("db-manager.php");

    if(SessionManager::isLoggedIn()){
    header("location:index.php");
    }

    if(isset($_GET['ref'])){
        $ref_code = $_GET['ref'];
        $ref_id = substr("$ref_code", 32);

        $sql = "SELECT `name` FROM `users` WHERE '$ref_id' = `id`";
        $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
        while($row = mysqli_fetch_assoc($result)){
            extract($row);
        }
    }else{
        $name = '';
    }
    
    if(isset($_GET['type'])){
        $type = $_GET['type'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>Sign up - Mivedia</title>

    <meta name="description" 
    content="Do not have an account with Mivedia yet? Create a new account with Miveda, to enjoy the seamless and fluid experience of controlling your finances and expenses efficiently.">
    
    <style>
        .login-image{
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <span class="d-none d-lg-block">
        <?php include_once("navbar.php"); ?>
    </span>

    <div>
        <main class="container-fluid justify-content-center mt-5">
            
            <div class="section-title heading-text container mb-5">
                <h2>Signup</h2>
            </div>
            
            <span class="d-lg-none">
                <img src="images/login-image.svg" width="50%" class="login-image">
            </span>
            
            <section class="d-flex justify-content-center">
                <div class="card mb-5" style="width: 48rem;">
                    <form action="signup-processor.php" method="POST" enctype="multipart/form-data">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-group text-capitalize">
                                    <label for="exampleInputPassword1">Full name</label>
                                    <input type="text" name="fullname" class="form-control"
                                        id="exampleInputPassword1" placeholder="name">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Enter email" required>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="pwd" class="form-control"
                                        id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mifund Transaction Password</label>
                                    <input type="password" name="transaction_pwd" class="form-control"
                                        id="exampleInputPassword1" placeholder="Mifund Password" required>
                                </div>
                            </li>
                            <!--<li class="list-group-item">-->
                            <!--    <div class="form-group">-->
                            <!--        <label for="exampleInputPassword1">You were reffered by:</label>-->
                            <!--        <input type="text" name="refer" class="form-control"-->
                            <!--            id="exampleInputPassword1" value="<?php echo $name ?>" readonly>-->
                            <!--    </div>-->
                            <!--</li>-->
                            <div class="row mt-2">
                                <div class="col-md-12">
                                <li class="list-group-item">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone number</label>
                                        <input type="text" name="phone" class="form-control"
                                            id="exampleInputPassword1" placeholder="phone number">
                                    </div>
                                </li>
                            </div>  
                            </div>
                            <input type="hidden" name="ref" value="<?php echo $id ?>">
                            <li class="list-group-item">
                                <div class="">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign
                                        up</button>
                                </div>
                            </li>
                        </ul>
                        <a href="login.php" <small id="emailHelp"
                            class="form-text text-muted text-center py-2 text-primary">Already have an account?
                            Login
                            here!</small></a>
                    </form>
                </div>
            </section>
        </main>      
        </div>
    </div>
</div>

</body>

</html>


