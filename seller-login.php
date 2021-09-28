<?php

require_once("merchant-session-manager.php");

if(MerchantSessionManager::isLoggedIn()){
  header("location:index.php");
}

if(isset($_POST['login'])){
  //perform the login
        switch(MerchantSessionManager::login($_POST['email'], $_POST['pwd'])){
            case "admin":
                header("location:admin-dashboard.php");
                break;
            case "merchant":
                header("location:management-dashboard.php");
                break;
            case "email error":
                $error["err_email"] = "your email is incorrect";
                break;
            default:
            $error["err_pwd"] = "your password is incorrect";      
        }  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Mivedia - Login</title>

    <meta name="description" 
    content="Login to your Mivedia account, to enjoy the seamless and fluid experience of purchasing cryptocurrencies at your own will and pace.">
    
    <style>
        .card{
                border-radius: 10px;
                box-shadow: 0 50px 50px rgba(0,0,0,0.4);
        }
        .seller-image{
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <span class="d-none d-lg-block">
        <?php include_once('navbar.php'); ?>
    </span>
    
        <main class="container-fluid justify-content-center mt-3">
            
            <div class="section-title heading-text container mb-5">
                <h2>Login</h2>
                
            </div>
            
            <img src="images/seller-image.svg" class="d-lg-none" width="50%" class="seller-image">
            
            <div class="row align-items-center justify-content-center">
				<div class="col-md-8 col-lg-6 col-xl-5">
					<div class="card">
						<div class="card-body p-4">
							<div class="text-center mt-2">
								<h5 class="text-primary">Welcome Back !</h5>
								<p class="text-muted">Sign in to continue to your Dashboard.</p>
							</div>
							<div class="p-2 mt-4">
								<form method="post">
									<div class="mb-3">
										<label class="form-label" for="username">Organization Email</label>
										<input type="email" name="email" class="form-control" id="username" placeholder="Enter email"> 
										<small id="emailHelp"
                                            class="form-text text-dark"><?php       echo (isset($error['err_email']) ?      $error['err_email'] : "We' never        share your email with anyone else."); ?>
                                        </small>
										</div>
									<div class="mb-3">
										<div class="float-end"> <a href="request-reset.php" class="text-muted">Forgot password?</a> </div>
										<label class="form-label" for="userpassword">Organization Password</label>
										<input type="password" name="pwd" class="form-control" id="userpassword" placeholder="Enter password">
										<small id="pwdHelp"
                                            class="form-text text-dark"><?php       echo (isset($error['err_pwd']) ?        $error['err_pwd'] : "" )?>
                                        </small>
										</div>
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="auth-remember-check">
										<label class="form-check-label" for="auth-remember-check">Remember me</label>
									</div>
									<div class="mt-3 text-end">
										<button class="btn btn-primary w-sm waves-effect waves-light" name="login" type="submit">Log In</button>
									</div>
									
									<div class="mt-4 text-center">
										<p class="mb-0">Don't have an account ? <a href="seller-signup.php" class="fw-medium text-primary"> Signup now </a> </p>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end row -->
        </main>      
        </div>
</div>

</body>

</html>


