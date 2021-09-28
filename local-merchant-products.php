<?php
    include_once('db-manager.php');
    include_once('merchant-session-manager.php');
    
    if(!MerchantSessionManager::isLoggedIn()){
        header('location:seller-login.php');
    }
    $type = $_SESSION['type'];
    
    $merchant = $_SESSION['merchant'];

    
    if(isset($_POST['Delete'])){
        
        $inventory_id = $_POST['inventory_id'];
        
        $sql = "DELETE FROM `local_inventory` WHERE `inventory_id` = '$inventory_id'";
        mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
    }
    
    if(isset($_POST['add_product'])){
        
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        
        $insert_sql = "INSERT INTO `local_inventory`(`merchant_id`, `inventory_name`, `inventory_price`) VALUES ('$merchant','$product_name','$product_price')";
        mysqli_query($cxn, $insert_sql) or die(mysqli_error($cxn));
    }
    
?>

<head>
    <meta charset="utf-8" />
        <title>Product Inventory</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        
</head>

<body>
    <?php 
            include_once('seller-nav.php');
    ?>
    <main class="container-fluid">
        <!-- start page title -->
                        <div class="row">
                            <div class="col-12 d-flex flex-row">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 heading-text">Product Inventory</h4>
                                </div>
                                <div class="ml-auto">
                                    <a href="local-merchant-products.php#add"><button class="btn btn-primary btn-lg mb-2"><i class="fa fa-plus" title="add new product"></i></button></a>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <div class="table-responsive">
                                            <table class="table table-editable table-nowrap align-middle table-edits">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
            								     $sql = "SELECT * FROM     `local_inventory` WHERE `merchant_id` = '$merchant'";
                                                $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
            								    while($row = mysqli_fetch_assoc($result)){
            								  echo' 
                                                    <tr data-id="1">
                                                        <td data-field="id" style="width: 80px">'; echo $row['inventory_id']; echo '</td>
                                                        <td data-field="name">'; echo $row['inventory_name']; echo '</td>
                                                        <td data-field="age"> NGN'; echo $row['inventory_price'];
                                                        echo'
                                                        <td style="width: 100px">
                                                        <form method="post">
                                                        <input class="btn btn-outline-secondary btn-sm edit" type="submit" name="Delete" value="Delete">
                                    
                                                        <input type="hidden" name="inventory_id" value="'; echo $row['inventory_id']; echo '">
                                                            </form>
                                                        </td>
                                                    </tr>';
            								    }
                                            ?>
                                                </tbody>
                                                </table>
                                        </div>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        
                        <!--NEW PRODUCT FORM-->
                        <div class="card p-4 mt-3" id="add">
							<div class="text-center mt-2">
								<h5 class="text-primary">New Product</h5>
								<p class="text-muted">Add new product to your inventories here.</p>
							</div>
							<div class="p-2 mt-4">
								<form method="post">
									<div class="mb-3">
										<label class="form-label" for="name">Product Name</label>
										<input type="text" name="product_name" class="form-control" id="name" placeholder="Enter product name"> 
									</div>
									<div class="mb-3">
										<label class="form-label" for="price">Product price</label>
										<input type="number" name="product_price" class="form-control" id="price" placeholder="Enter product price"> 
									</div>

									<div class="mt-3 text-end">
										<button class="btn btn-primary w-sm waves-effect waves-light" name="add_product" type="submit">Add product</button>
									</div>
						
								</form>
							</div>
						</div>
    </main>
</body>

<?php include_once('footer.php'); ?>

</html>