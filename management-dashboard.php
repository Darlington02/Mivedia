<?php

    require_once('merchant-session-manager.php');
    include_once('db-manager.php');
    
    if(!MerchantSessionManager::isLoggedIn()){
        header('location:seller-login.php');
    }
    $merchant_id = $_SESSION["merchant"];
    $store_type = $_SESSION["type"];

    $sql = "SELECT * FROM `merchants` WHERE `merchant_id` = '$merchant_id'";
    $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
    while($row = mysqli_fetch_assoc($result)){
        extract($row);
    }


?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Mivedia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
</head>

<body>
	<!-- <body data-layout="horizontal" data-topbar="colored"> -->
	<!-- Begin page -->
	<div id="layout-wrapper">
		<header id="page-topbar">
			<div class="navbar-header bg-primary">
				<div class="d-flex">
					<!-- LOGO -->
					<div class="navbar-brand-box">
						<a href="management-dashboard.php" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="images/logo.png" alt="" height="72">
                        </span>
                        <span class="logo-lg">
                            <img src="images/logo.png" alt="" height="70">
                        </span> </a>
						<a href="management-dashboard.php" class="logo logo-light"> <span class="logo-sm">
                        <img src="images/logo.png" alt="" height="72">
                        </span> <span class="logo-lg">
                            <img src="images/logo.png" alt="" height="70">
                        </span> </a>
					</div>
					<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>
					<!-- App Search-->
					<form class="app-search d-none d-lg-block">
						<div class="position-relative">
							<input type="text" class="form-control" placeholder="Search..."> <span class="uil-search"></span> </div>
					</form>
				</div>
				<div class="d-flex">
					<div class="dropdown d-inline-block d-lg-none ms-2">
						<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="uil-search"></i> </button>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
							<form class="p-3">
								<div class="m-0">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
										<div class="input-group-append">
											<button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					
					<div class="dropdown d-inline-block">
						<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user"></i> <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15 text-light">Profile</span> <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i> </button>

						<div class="dropdown-menu dropdown-menu-end">
							<!-- item--><a class="dropdown-item" href="update-seller.php"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">Update Profile</span></a>
							<a class="dropdown-item" href="https://mivedia.com/store-outlet.php?merchant=<?php echo $merchant_id ?>"><i class="uil uil-wallet font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">My Organization</span></a> 
							<a class="dropdown-item" href="seller-logout.php"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">logout</span></a>
					    </div>
					</div>
					<div class="dropdown d-inline-block">
						<button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect"> <i class="uil-cog"></i> </button>
					</div>
				</div>
			</div>
		</header>
		<!-- ========== Left Sidebar Start ========== -->
		<div class="vertical-menu">
			<!-- LOGO -->
			<div class="navbar-brand-box">
				<a href="management-dashboard.php" class="logo logo-dark"> <span class="logo-sm">
                            <img src="images/logo.png" alt="" height="82">
                        </span> <span class="logo-lg">
                            <img src="images/logo.png" alt="" height="80">
                        </span> </a>
				<a href="management-dashboard.php" class="logo logo-light"> <span class="logo-sm">
                            <img src="images/logo.png" alt="" height="82">
                        </span> <span class="logo-lg">
                            <img src="images/logo.png" alt="" height="80">
                        </span> </a>
			</div>
			<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>
			<div data-simplebar class="sidebar-menu-scroll">
				<!--- Sidemenu -->
				<div id="sidebar-menu">
					<!-- Left Menu Start -->
					<ul class="metismenu list-unstyled" id="side-menu">
						<li class="menu-title">Menu</li>
						
						<li>
							<a href="management-dashboard.php"> <i class="fa fa-home"></i> <span>Dashboard</span> </a>
						</li>
						<li>
							<a href="javascript: void(0);" class="has-arrow waves-effect"> <i class="uil-store"></i> <span>Product Management</span> </a>
							<ul class="sub-menu" aria-expanded="false">
								<li><a href="local-merchant-products.php">Product Inventory</a></li>
								<li><a href="create-coupon.php">Create Coupon</a></li>
								<!--<li><a href="generate-product-qr.php">Generate Product QRs</a></li>-->
								<li><a href="generate-banner.php">Generate Merchant Banner</a></li>
							</ul>
						</li>
						<li>
							<a href="merchant-transactions.php"> <i class="fa fa-money"></i> <span>Transactions</span> </a>
						</li>
						<li>
							<a href="#"> <i class="fa fa-pencil"></i> <span>Store Analytics</span> </a>
						</li>
						<li>
							<a href="merchant-customers.php"> <i class="fa fa-pencil"></i> <span>Customers</span> </a>
						</li>
					</ul>
				</div>
				<!-- Sidebar -->
			</div>
		</div>
		<!-- Left Sidebar End -->
		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="main-content">
			<div class="page-content">
				<div class="container-fluid">
					<!-- start page title -->
					<div class="row">
						<div class="col-12">
							<div class="page-title-box d-flex align-items-center justify-content-between">
								<h4 class="mb-0">Dashboard</h4>
								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);">Minible</a></li>
										<li class="breadcrumb-item active">Dashboard</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
					<!-- end page title -->
					<div class="row">
						<div class="col-md-6 col-xl-3">
							<div class="card">
								<div class="card-body">
									<div class="float-end mt-2">
										<div id="total-revenue-chart"></div>
									</div>
									<div>
										<h4 class="mb-1 mt-1">NGN <span data-plugin="counterup"><?php echo number_format($merchant_wallet) ?></span></h4>
										<p class="text-muted mt-3">Total Revenue</p>
									</div>
								</div>
							</div>
						</div>
						<!-- end col-->
						<div class="col-md-6 col-xl-3">
							<div class="card">
								<div class="card-body">
									<div class="float-end mt-2">
										<div id="orders-chart"> </div>
									</div>
									<div>
										<h4 class="mb-1 mt-1"><span data-plugin="counterup">52</span></h4>
										<p class="text-muted mt-3">Purchases</p>
									</div>
								</div>
							</div>
						</div>
						<!-- end col-->
						<div class="col-md-6 col-xl-3">
							<div class="card">
								<div class="card-body">
									<div class="float-end mt-2">
										<div id="customers-chart"> </div>
									</div>
									<div>
										<h4 class="mb-1 mt-1"><span data-plugin="counterup">21</span></h4>
										<p class="text-muted mt-3">Customers</p>
									</div>
								</div>
							</div>
						</div>
						<!-- end col-->
						<div class="col-md-6 col-xl-3">
							<div class="card">
								<div class="card-body">
									<div class="float-end mt-2">
										<div id="growth-chart"></div>
									</div>
									<div>
										<h4 class="mb-1 mt-1">+ <span data-plugin="counterup">12.58</span>%</h4>
										<p class="text-muted mt-3">Growth</p>
									</div>
								</div>
							</div>
						</div>
						<!-- end col-->
					</div>
					<!-- end row-->
					<div class="row">
						<div class="col-xl-8">
							<div class="card">
								<div class="card-body">
									<div class="float-end">
										<div class="dropdown">
											<a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fw-semibold">Sort By:</span> <span class="text-muted">Yearly<i class="mdi mdi-chevron-down ms-1"></i></span> </a>
											<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton5"> <a class="dropdown-item" href="#">Monthly</a> <a class="dropdown-item" href="#">Yearly</a> <a class="dropdown-item" href="#">Weekly</a> </div>
										</div>
									</div>
									<h4 class="card-title mb-4">Sales Analytics</h4>
									<div class="mt-1">
										<ul class="list-inline main-chart mb-0">
											<li class="list-inline-item chart-border-left me-0 border-0">
												<h3 class="text-primary">NGN <span data-plugin="counterup"><?php echo number_format($merchant_wallet) ?></span><span class="text-muted d-inline-block font-size-15 ms-3">Income</span></h3> </li>
											<li class="list-inline-item chart-border-left me-0">
												<h3><span data-plugin="counterup">143</span><span class="text-muted d-inline-block font-size-15 ms-3">Sales</span>
                                                    </h3> </li>
							
										</ul>
									</div>
									<div class="mt-3">
										<div id="sales-analytics-chart" class="apex-charts" dir="ltr"></div>
									</div>
								</div>
								<!-- end card-body-->
							</div>
							<!-- end card-->
						</div>
						<!-- end col-->
						<div class="col-xl-4">
							<div class="card bg-primary">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-sm-8">
											<p class="text-white font-size-18">Upgrade your MiBA Package for better outreach <i class="mdi mdi-arrow-right"></i></p>
											<div class="mt-4"> <a href="index.php#organization-signup" class="btn btn-success waves-effect waves-light">Upgrade Account!</a> </div>
										</div>
										<div class="col-sm-4">
											<div class="mt-4 mt-sm-0"> <img src="assets/images/setup-analytics-amico.svg" class="img-fluid" alt=""> </div>
										</div>
									</div>
								</div>
								<!-- end card-body-->
							</div>
							<!-- end card-->
							<div class="card">
								<div class="card-body">
									<div class="float-end">
										<div class="dropdown">
											<a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fw-semibold">Sort By:</span> <span class="text-muted">Yearly<i class="mdi mdi-chevron-down ms-1"></i></span> </a>
											<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1"> <a class="dropdown-item" href="#">Monthly</a> <a class="dropdown-item" href="#">Yearly</a> <a class="dropdown-item" href="#">Weekly</a> </div>
										</div>
									</div>
									<h4 class="card-title mb-4">Top Selling Products</h4>
									<div class="row align-items-center g-0 mt-3">
										<div class="col-sm-3">
											<p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-primary me-2"></i> Desktops </p>
										</div>
										<div class="col-sm-9">
											<div class="progress mt-1" style="height: 6px;">
												<div class="progress-bar progress-bar bg-primary" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="52"> </div>
											</div>
										</div>
									</div>
									<!-- end row-->
									<div class="row align-items-center g-0 mt-3">
										<div class="col-sm-3">
											<p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-info me-2"></i> iPhones </p>
										</div>
										<div class="col-sm-9">
											<div class="progress mt-1" style="height: 6px;">
												<div class="progress-bar progress-bar bg-info" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"> </div>
											</div>
										</div>
									</div>
									<!-- end row-->
									<div class="row align-items-center g-0 mt-3">
										<div class="col-sm-3">
											<p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-success me-2"></i> Android </p>
										</div>
										<div class="col-sm-9">
											<div class="progress mt-1" style="height: 6px;">
												<div class="progress-bar progress-bar bg-success" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="48"> </div>
											</div>
										</div>
									</div>
									<!-- end row-->
									<div class="row align-items-center g-0 mt-3">
										<div class="col-sm-3">
											<p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-warning me-2"></i> Tablets </p>
										</div>
										<div class="col-sm-9">
											<div class="progress mt-1" style="height: 6px;">
												<div class="progress-bar progress-bar bg-warning" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"> </div>
											</div>
										</div>
									</div>
									<!-- end row-->
									<div class="row align-items-center g-0 mt-3">
										<div class="col-sm-3">
											<p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-purple me-2"></i> Cables </p>
										</div>
										<div class="col-sm-9">
											<div class="progress mt-1" style="height: 6px;">
												<div class="progress-bar progress-bar bg-purple" role="progressbar" style="width: 63%" aria-valuenow="63" aria-valuemin="0" aria-valuemax="63"> </div>
											</div>
										</div>
									</div>
									<!-- end row-->
								</div>
								<!-- end card-body-->
							</div>
							<!-- end card-->
						</div>
						<!-- end Col -->
					</div>
					<!-- end row-->
					
        <div class="col-md-12 mt-4">
            <div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-centered table-nowrap mb-0">
									<thead class="table-light">
										<tr>
											<th style="width: 20px;">
												<div class="form-check font-size-16">
													<input type="checkbox" class="form-check-input" id="customCheck1">
													<label class="form-check-label" for="customCheck1">&nbsp;</label>
												</div>
											</th>
											<th>TXN hash</th>
											<th>Billing Name</th>
											<th>Date</th>
											<th>Total</th>
											<th>View Details</th>
										</tr>
									</thead>
									<tbody>
									    
									 <?php
									     $sql = "SELECT * FROM `mifund_transactions` WHERE `sender_id` = '$merchant_code' OR `receiver_id` = '$merchant_code' ORDER BY `txn_id` DESC LIMIT 5";
                                        $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
									    while($row = mysqli_fetch_assoc($result)){
									  echo'      
										<tr>
											<td>
												<div class="form-check font-size-16">
													<input type="checkbox" class="form-check-input" id="customCheck2">
													<label class="form-check-label" for="customCheck2">&nbsp;</label>
												</div>
											</td>
											<td><a href="javascript: void(0);" class="text-body fw-bold">'; echo $row['transaction_hash']; echo '</a> </td>
											<td>'; echo $row['sender']; echo '</td>
											<td>'; echo $row['date']; echo '</td>
											<td>NGN '; echo $row['amount']; echo '</td>
											<td>
												<a href="transaction-details.php?code='; echo $merchant_code; echo '"><button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"> View </button></a>
											</td>
										</tr>';
									    }
									   ?>
										
									</tbody>
								</table>
							</div>
							<!-- end table-responsive -->
						</div>
					</div>
				</div>
			</div>
					<!-- end row -->
        </div>
				<!-- container-fluid -->
			</div>
		<!-- end main content-->
		
	</div>
	<!-- END layout-wrapper -->
	<!-- JAVASCRIPT -->
	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
	<script src="assets/libs/jquery/jquery.min.js"></script>
	<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/libs/metismenu/metisMenu.min.js"></script>
	<script src="assets/libs/simplebar/simplebar.min.js"></script>
	<script src="assets/libs/node-waves/waves.min.js"></script>
	<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
	<!-- apexcharts -->
	<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
	<script src="assets/js/pages/dashboard.init.js"></script>
	<!-- App js -->
	<script src="assets/js/app.js"></script>
</body>

</html>