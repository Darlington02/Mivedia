<?php

    include_once('session-manager.php');
    include_once('db-manager.php');
    
    if($_GET['successful'] == 'mytiwieoryajreirha32iife'){
        $package = 'gold';
    }
    if($_GET['successful'] == 'mygkifaeoryfwijreiraa39fz'){
        $package = 'premium';
    }
    if($_GET['successful'] == ''){
        $package = 'classic';
    }
    
    if(isset($_POST['register'])){
        
        if(isset($_SESSION["user"]) && isset($_SESSION["type"])){
            unset($_SESSION["user"]);
            unset($_SESSION["type"]);
            unset($_SESSION["name"]);
            unset($_SESSION["country"]);
            unset($_SESSION["mifund_id"]);
            session_destroy();
            
        }
        
        $motto = $_POST['motto'];
        $description = $_POST['description'];
        $shop = $_POST['shop'];
        $state = $_POST['state'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $category = $_POST['category'];
        
        $merchant_code = 'MER'.substr(str_shuffle("0123456789"), 0, 5);
        
        $sql = "INSERT INTO `merchants`(`store_motto`, `store_name`, `store_email`, `store_password`, `store_phone`, `store_description`, `store_category`, `store_address`, `store_state`, `merchant_code`, `store_package`) VALUES ('$motto','$shop','$email','$password_hash','$phone','$description','$category','$address','$state','$merchant_code','$package')";

        mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
        
        echo "<script>alert('Your account has been created successfully! Log into your organization dashboard!')</script>";
        echo "<script>window.location.href='seller-login.php'</script>";
    }
?>

<head>
	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	
    <style>
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
    
    <main class="container">
        <div class="account-pages my-5 pt-sm-5">
		<div class="container">
			<div class="row">
				<div class="section-title heading-text container mb-5">
                    <h2>Register</h2>
                    <p><?php echo $package ?> account</p>
                </div>
			</div>
			
			<img src="images/seller-image.svg" width="50%" class="seller-image">
			
			<div class="row align-items-center justify-content-center">
				<div class="">
					<div class="card">
						<div class="card-body p-4">
							<div class="text-center mt-2">
								<h5 class="text-primary">Register Organization </h5>
								<p class="text-muted">Complete your registration below</p>
							</div>
							<div class="p-2 mt-4">
								<form method="post">
									<div class="mb-3">
										<label class="form-label" for="store">Organization Name</label>
										<input type="text" class="form-control" id="store" name="shop" placeholder="Enter organization name"> </div>
									<div class="mb-3">
										<label class="form-label" for="category">Organization Category</label>
                                        <select id="category" name="category" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>Catering</option>
                                            <option>Church</option>
                                            <option>Food And Restaurants</option>
                                            <option>Hair Beauty</option>
                                            <option>NGOs</option>
                                            <option>Laundry</option>
                                            <option>Pharmacy</option>
                                            <option>Hospital</option>
                                            <option>Cinema</option>
                                            <option>Home</option>
                                            <option>Footwears</option>
                                            <option>Entertainment</option>
                                            <option>Cosmetics</option>
                                            <option>Photography</option>
                                            <option>Education</option>
                                            <option>Electronics</option>
                                            <option>Travels</option>
                                            <option>Automobiles</option>
                                            <option>Hotel</option>
                                            <option>Communication</option>
                                            <option>Farming</option>
                                            <option>Clothings</option>
                                            <option>Computers</option>
                                            <option>Internet</option>
                                            <option>Mobile Phones</option>
                                            <option>Real Estate</option>
                                            <option>General</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
										<label class="form-label" for="email">Email</label>
										<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"> </div>
										<div class="mb-3">
										<label class="form-label" for="password">Password</label>
										<input type="password" class="form-control" id="password" name="password" placeholder="Enter password"> </div>
									<div class="mb-3">
										<label class="form-label" for="address">Organization Address</label>
										<input type="text" class="form-control" id="address" name="address" placeholder="Enter address"> </div>
										<div class="mb-3">
										<label for="inputState">State</label>
                                        <select name="state" id="inputState" class="form-control">
                                            <option selected>Choose...</option>
                                            <option value="Rivers">Rivers State</option>
                                            <option value="Enugu">Enugu State</option>
                                            <option value="Lagos">Lagos State</option>
                                            <option value="Imo">Imo State</option>
                                            <option value="Kogi">Kogi State</option>
                                            <option value="Anambara">Anambara State</option>
                                            <option value="Ekiti">Ekiti State</option>
                                            <option value="Jigawa">Jigawa State</option>
                                            <option value="Edo">Edo state</option>
                                        </select>
                                    </div>
									<div class="mb-3">
										<label class="form-label" for="motto">Motto</label>
										<input type="text" class="form-control" id="motto" name="motto" placeholder="Enter motto"> </div>
									<div class="mb-3">
										<label class="form-label" for="phone">Phone</label>
										<input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone number"> </div>
									<div class="mb-3">
										<label class="form-label" for="address">Organization Description</label>
										<input type="text" class="form-control" id="description" name="description" placeholder="Enter description"> </div>
									
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="auth-terms-condition-check">
										<label class="form-check-label" for="auth-terms-condition-check">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
									</div>
									<div class="mt-3 text-end">
										<button class="btn btn-primary w-sm waves-effect waves-light" name="register" type="submit">Register</button>
									</div>
									
									<div class="mt-4 text-center">
										<p class="text-muted mb-0">Not an organization? Sign up as a user <a href="signup.php" class="fw-medium text-primary"> Sign up</a></p>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</div>
        
    </main>
</body>

