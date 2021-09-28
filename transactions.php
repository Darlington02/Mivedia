<?php

    include_once('session-manager.php');
    include_once('db-manager.php');
    
    $code = $_SESSION['mifund_id'];

?>

<head>
    
</head>

<body>
    <?php include_once('navbar.php'); ?>
    
    <mainclass="container-fluid">
        <h4 class="heading-text text-center">Mifund Transactions</h4>
        
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
									     $sql = "SELECT * FROM `mifund_transactions` WHERE `sender_id` = '$code' OR `receiver_id` = '$code' ORDER BY `txn_id` DESC";
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
												<a href="transaction-details.php?code='; echo $code; echo '"><button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"> View </button></a>
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
    </main>
    
    <?php include_once('footer.php'); ?>
</body>