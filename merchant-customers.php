<?php

    include_once('db-manager.php');
    include_once('merchant-session-manager.php');
    
    $code = $_SESSION['mifund_id'];
    
    $sql = "SELECT DISTINCT `sender_id`, `sender`, `sender_email` FROM `mifund_transactions` WHERE `receiver_id` = '$code'";
    $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));


?>

<head>
    <meta charset="utf-8" />
	<title>Customers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<!-- DataTables -->
	<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<!-- Responsive datatable examples -->
	<link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" /> </head>
</head>

<body>
    <?php include_once('seller-nav.php') ?>
    
    <div class="page-content">
				<div class="container-fluid">
					<!-- start page title -->
					<div class="row">
						<div class="col-12">
							<div class="page-title-box d-flex align-items-center justify-content-between">
								<h4 class="mb-0">Customers</h4>
								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
										<li class="breadcrumb-item active">Customers</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
					<!-- end page title -->
					<div class="row">
						<div class="col-lg-12">
							<div>
								<div class="table-responsive mb-4">
									<table class="table table-centered datatable dt-responsive nowrap table-card-list" style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
										<thead>
											<tr class="bg-transparent">
												<th style="width: 20px;">
													<div class="form-check text-center">
														<input type="checkbox" class="form-check-input" id="customercheck">
														<label class="form-check-label" for="customercheck"></label>
													</div>
												</th>
												<th style="width: 120px;">Customer ID</th>
												<th>Customer</th>
												<th>Email</th>
												<th>Status</th>
												<th style="width: 120px;">Action</th>
											</tr>
										</thead>
										<tbody>
										 <?php
										    while($row = mysqli_fetch_assoc        ($result)){
											echo '<tr>
												<td>
													<div class="form-check text-center">
														<input type="checkbox" class="form-check-input" id="customercheck1">
														<label class="form-check-label" for="customercheck1"></label>
													</div>
												</td>
												<td><a href="javascript: void(0);" class="text-dark fw-bold">'; echo $row['sender_id']; echo '</a> </td>
												<td> <img src="https://www.kindpng.com/picc/m/78-785827_user-profile-avatar-login-account-male-user-icon.png" alt="" class="avatar-xs rounded-circle me-2"> <span>'; echo $row['sender']; echo'</span></td>
												<td>'; echo $row['sender_email']; echo' </td>
												<td>
													<div class="badge bg-pill bg-soft-success font-size-12">Active</div>
												</td>
												<td> <a href="javascript:void(0);" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a> <a href="javascript:void(0);" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a> </td>
											</tr>';
										}
									?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- end row -->
				</div>
</body>

<?php include_once('footer.php'); ?>

</html>