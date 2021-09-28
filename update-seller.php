<?php 

    include_once('session-manager.php');
    include_once('db-manager.php');
    
    $merchant_id = $_SESSION['merchant'];
    
    $sql = "SELECT * FROM `merchants` WHERE `merchant_id` = '$merchant_id'";
    $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
    while($row = mysqli_fetch_assoc($result)){
        extract($row);
    }
    
    if(isset($_POST['update'])){
        
        $motto = $_POST['motto'];
        $description = $_POST['description'];
        $shop = $_POST['shop'];
        $state = $_POST['state'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $category = $_POST['category'];
        $filename = $_FILES['image']['name'];
        
        if($filename !== ''){
            $tmp_file = $_FILES['image']['tmp_name'];
            $stored_file = "images/upload-root/" . $filename;
            
            move_uploaded_file($tmp_file, $stored_file);
            
            $imageUrl= "images/upload-root/" . $filename;
        }else{
            $imageUrl = $store_img;
        }
        
        
        $update_sql = "UPDATE `merchants` SET `store_name`='$shop',`store_phone`='$phone',`store_category`='$category',`store_motto`='$motto',`store_description`='$description',`store_address`='$address',`store_state`='$state',`store_img`='$imageUrl' WHERE `merchant_id` = $merchant_id";
        mysqli_query($cxn, $update_sql) or die(mysqli_error($cxn));
    }
    
?>

<head>
	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>


<body>
    <?php include_once('seller-nav.php'); ?>
    <main class="container">
        
        <div class="account-pages my-5 pt-sm-5">
		<div class="container col-md-12">
			
			<div class="row align-items-center justify-content-center">
				<div class="">
					<div class="card">
						<div class="card-body p-4">
							<div class="text-center mt-2">
								<h5 class="text-primary">Update Details </h5>
								<p class="text-muted">Update your organization details below</p>
							</div>
							<div class="p-2 mt-4">
								<form method="post" enctype="multipart/form-data">
									<div class="mb-3">
										<label class="form-label" for="store">Organization Name</label>
										<input type="text" class="form-control" id="store" name="shop" value="<?php echo $store_name ?>"> </div>
									<div class="mb-3">
										<label class="form-label" for="category">Organization Category</label>
                                        <select id="category" name="category" class="form-control">
                                            <option selected>Choose...</option>
                                            <option <?php print($store_category == 'Catering') ? "selected" : ""; ?>>Catering</option>
                                            <option <?php print($store_category == 'Church') ? "selected" : ""; ?>>Church</option>
                                            <option <?php print($store_category == 'Food And Restaurants') ? "selected" : ""; ?>>Food And Restaurants</option>
                                            <option <?php print($store_category == 'Hair Beauty') ? "selected" : ""; ?>>Hair Beauty</option>
                                            <option <?php print($store_category == 'NGOs') ? "selected" : ""; ?>>NGOs</option>
                                            <option <?php print($store_category == 'Laundry') ? "selected" : ""; ?>>Laundry</option>
                                            <option <?php print($store_category == 'Pharmacy') ? "selected" : ""; ?>>Pharmacy</option>
                                            <option <?php print($store_category == 'Hospital') ? "selected" : ""; ?>>Hospital</option>
                                            <option <?php print($store_category == 'Cinema') ? "selected" : ""; ?>>Cinema</option>
                                            <option <?php print($store_category == 'Home') ? "selected" : ""; ?>>Home</option>
                                            <option <?php print($store_category == 'Footwears') ? "selected" : ""; ?>>Footwears</option>
                                            <option <?php print($store_category == 'Entertainment') ? "selected" : ""; ?>>Entertainment</option>
                                            <option <?php print($store_category == 'Cosmetics') ? "selected" : ""; ?>>Cosmetics</option>
                                            <option <?php print($store_category == 'Photography') ? "selected" : ""; ?>>Photography</option>
                                            <option <?php print($store_category == 'Education') ? "selected" : ""; ?>>Education</option>
                                            <option <?php print($store_category == 'Electronics') ? "selected" : ""; ?>>Electronics</option>
                                            <option <?php print($store_category == 'Travels') ? "selected" : ""; ?>>Travels</option>
                                            <option <?php print($store_category == 'Automobiles') ? "selected" : ""; ?>>Automobiles</option>
                                            <option <?php print($store_category == 'Hotel') ? "selected" : ""; ?>>Hotel</option>
                                            <option <?php print($store_category == 'Communication') ? "selected" : ""; ?>>Communication</option>
                                            <option <?php print($store_category == 'Farming') ? "selected" : ""; ?>>Farming</option>
                                            <option <?php print($store_category == 'Clothings') ? "selected" : ""; ?>>Clothings</option>
                                            <option <?php print($store_category == 'Computers') ? "selected" : ""; ?>>Computers</option>
                                            <option <?php print($store_category == 'Internet') ? "selected" : ""; ?>>Internet</option>
                                            <option <?php print($store_category == 'Mobile Phones') ? "selected" : ""; ?>>Mobile Phones</option>
                                            <option <?php print($store_category == 'Real Estate') ? "selected" : ""; ?>>Real Estate</option>
                                            <option <?php print($store_category == 'General') ? "selected" : ""; ?>>General</option>
                                            <option <?php print($store_category == 'Others') ? "selected" : ""; ?>>Others</option>
                                        </select>
                                    </div>
									<div class="mb-3">
										<label class="form-label" for="address">Organization Address</label>
										<input type="text" class="form-control" id="address" name="address" value="<?php echo $store_address ?>"> </div>
										<div class="mb-3">
										<label for="inputState">State</label>
                                        <select name="state" id="inputState" class="form-control">
                                            <option selected>Choose...</option>
                                            <option  <?php print($store_state == 'Rivers') ? "selected" : ""; ?>>Rivers</option>
                                            <option  <?php print($store_state == 'Enugu') ? "selected" : ""; ?>>Enugu</option>
                                            <option  <?php print($store_state == 'Lagos') ? "selected" : ""; ?>>Lagos</option>
                                            <option  <?php print($store_state == 'Imo') ? "selected" : ""; ?>>Imo</option>
                                            <option  <?php print($store_state == 'Kogi') ? "selected" : ""; ?>>Kogi</option>
                                            <option  <?php print($store_state == 'Anambara') ? "selected" : ""; ?>>Anambara</option>
                                            <option  <?php print($store_state == 'Ekiti') ? "selected" : ""; ?>>Ekiti</option>
                                            <option  <?php print($store_state == 'Jigawa') ? "selected" : ""; ?>>Jigawa</option>
                                            <option  <?php print($store_state == 'Edo') ? "selected" : ""; ?>>Edo</option>
                                        </select>
                                    </div>
									<div class="mb-3">
										<label class="form-label" for="motto">Motto</label>
										<input type="text" class="form-control" id="motto" name="motto" value="<?php echo $store_motto ?>"> </div>
									<div class="mb-3">
										<label class="form-label" for="phone">Phone</label>
										<input type="number" class="form-control" id="phone" name="phone" value="<?php echo $store_phone ?>"> </div>
									<div class="mb-3">
										<label class="form-label" for="address">Organization Description</label>
										<input type="text" class="form-control" id="description" name="description" value="<?php echo $store_description ?>"> </div>
									<div class="mb-3">
										<label class="form-label" for="image">Organization Image</label>
                                        <img class="img-thumbnail" src="<?php print $store_img ?>" width="120" height="120" alt="">
                                        <input type="file" class="form-control-file mb-3" name="image" id="image">
                                    </div>
									
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="auth-terms-condition-check">
										<label class="form-check-label" for="auth-terms-condition-check">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
									</div>
									<div class="mt-3 text-end">
										<button class="btn btn-primary w-sm waves-effect waves-light" name="update" type="submit">Update</button>
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

<footer>
    <?php include_once('footer.php'); ?>
</footer>