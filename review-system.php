

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating System in PHP & Mysql using Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    	
    	<div class="card">
    		<div class="card-header">Vireo Stores</div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<script>
    var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

</script>

























<?php
    include_once("db-manager.php");
    include_once("session-manager.php");

    if(!SessionManager::isLoggedIn()){
        header("location:login.php");
     }
      
    include_once("navbar.php");

    $user_id = $_SESSION['user'];

    $SQL = "SELECT * FROM `mifund`, `users` WHERE `users_mifund_id` = `mifund_id` AND `id` = $user_id";
    $result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));
    
    while($row = mysqli_fetch_assoc($result)) {
        extract($row);
    }
    
?>

<style>
    h6{
        text-decoration: none;
        font-family: times new roman;
    }
    .mifund-icons{
        color: blue;
        font-size: 50px;
    }
</style>

<main class="container-fluid">
    <div class="list-group mt-3">
        <form method="POST">
            <h5 class="list-group-item list-group-item-action active bg-warning font-weight-bold">
                ID:  
                    <input type="text" id="myInput" value="<?php echo $mifund_id ?>">
                    <i type="submit" class="fa fa-clipboard" title="copy ID to clipboard" onclick="myFunction()"></i>    
            </h5>
        </form>

        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card-single">
                    <div>
                        <h4 class="my-3">Fiat: <b>NGN <?php echo number_format($mifund_wallet) ?></b></h4>
                        <div class="btn-group mt-5" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary"><a href="deposit.php" class="text-light">Deposit</a></button>
                        <button type="button" class="btn btn-warning"><a href="bank-withdrawal.php" class="text-light">Withdraw</a></button>
                        <button type="button" class="btn btn-success"><a href="bank-transfer.php" class="text-light">Transfer</a></button>
                    </div>
                </div>
                <div>
                    <span><img src="images/coin.png" width="200" class="card-image d-none d-lg-block" alt=""></span>
                    <span><img src="images/coin.png" width="100" class="card-image d-lg-none" alt=""></span>
                </div>
            </div>
        </div>
    </div>


    <!-- Services for large devices-->
    <section class="mt-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-3 mt-2">
                <a href="pay-local-store.php">
                    <div class="card-single">
                        <div>
                            <span><img src="images/mobile-store.png" width="90" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Pay Merchant</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mt-2">
                <a href="wallet-transfer.php">
                    <div class="card-single">
                        <div>
                            <span><img src="images/money-transfer.jpg" width="120" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Wallet To Wallet</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/qr.png" width="90" class="card-image" alt=""></span>
                        <a href="generate-qr.php"><p class="font-weight-bold mt-2">Generate QR</p></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/qr-scanner.png" width="90" class="card-image" alt=""></span>
                        <a href="https://qrcodescan.in"><p class="font-weight-bold mt-2">Scan QR</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services for sm devices -->
    <section class="mt-3 d-lg-none">
        <div class="row">
            <div class="col-6 mt-2">
                <a href="pay-local-store.php">
                    <div class="card-single">
                        <div>
                            <span><img src="images/mobile-store.png" width="50" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Pay Merchant</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 mt-2">
                <a href="wallet-transfer.php">
                    <div class="card-single">
                        <div>
                            <span><img src="images/money-transfer.jpg" width="70" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Wallet Transfer</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-6 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/qr.png" width=55" class="card-image" alt=""></span>
                        <a href="generate-qr.php"><p class="font-weight-bold mt-2">Generate QR</p></a>
                    </div>
                </div>
            </div>

            <div class="col-6 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/qr-scanner.png" width="60" class="card-image" alt=""></span>
                        <a href="https://qrcodescan.in"><p class="font-weight-bold mt-2">Scan QR</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!---Mifund Savings--->
    <div class="list-group mt-5">
        <a href="#" class="list-group-item list-group-item-action active bg-warning">
                        Mifund Savings
        </a>
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card-single">
                    <div>
                    <h4 class="my-3">Locked Savings</h4>
                    <p>With Mifund Savings, lock funds away for a certain period of time.<br><br>
                    <b>NB: Your locked funds cannot be withdrawn before the stipulated time.</b></p>
                    <div class="btn-group mt-5" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary"><a href="lock-savings.php" class="text-light">Lock</a></button>
                        <button type="button" class="btn btn-warning"><a href="withdraw-savings.php" class="text-light">Withdraw</a></button>
                    </div>
                </div>
                <div>
                    <span><img src="images/secure-trade.png" width="200" class="card-image d-none d-lg-block" alt=""></span>
                    <span><img src="images/secure-trade.png" width="80" class="card-image d-lg-none" alt=""></span>
                </div>
            </div>
        </div>
    </div>
    
    <!--Organization-->
    <section class="mt-3">
        <div class="row">
            <div class="col-6 mt-2">
                <div class="card-single">
                <div>
                        <span><img src="images/coin.png" width="73" class="card-image" alt=""></span>
                        <a href="pay-local-store.php"><p class="font-weight-bold mt-2">Tithes/Offerings</p></a>
                    </div>
                </div>
            </div>

            <div class="col-6 mt-2">
                <div class="card-single">
                <div>
                        <span><img src="images/fundraise.png" width="100" class="card-image" alt=""></span>
                        <a href="fundraising.php"><p class="font-weight-bold mt-2">Fundraisings</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Subscription and Bills-->
    <div class="list-group mt-5">
        <a href="#" class="list-group-item list-group-item-action active bg-warning">
                       Bill Payments And Subscriptions
        </a>
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card-single">
                    <div>
                    <h4 class="my-3">Bill payments</h4>
                    <p>With your mifund wallet, pay all your bills and purchase all your subscriptions from the comfort of your home.<br><br>
                </div>
                <div>
                    <span><img src="images/bills.png" width="200" class="card-image d-none d-lg-block" alt=""></span>
                    <span><img src="images/bills.png" width="80" class="card-image d-lg-none" alt=""></span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bills for large devices-->
    <section class="mt-3 d-none d-lg-block">
        <div class="row">
            <div class="col-md-3 mt-2">
                <a href="pay-local-store.php">
                    <div class="card-single">
                        <div>
                            <span><img src="images/internet.png" width="60" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Data</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mt-2">
                <a href="#">
                    <div class="card-single">
                        <div>
                            <span><img src="images/airtime.png" width="120" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Airtime</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/electricity.png" width="60" class="card-image" alt=""></span>
                        <a href="#"><p class="font-weight-bold mt-2">Electricity </p></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/tv-sub.png" width="65" class="card-image" alt=""></span>
                        <a href="#"><p class="font-weight-bold mt-2">DSTV/GOtv</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bills for sm devices -->
    <section class="mt-3 d-lg-none">
        <div class="row">
            <div class="col-6 mt-2">
                <a href="#">
                    <div class="card-single">
                        <div>
                            <span><img src="images/internet.png" width="50" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Buy Data</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 mt-2">
                <a href="#">
                    <div class="card-single">
                        <div>
                            <span><img src="images/airtime.png" width="100" class="card-image" alt=""></span>
                            <p class="font-weight-bold mt-2">Airtime</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-6 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/electricity.png" width=55" class="card-image" alt=""></span>
                        <a href="#"><p class="font-weight-bold mt-2">Electricity </p></a>
                    </div>
                </div>
            </div>

            <div class="col-6 mt-2">
                <div class="card-single">
                    <div>
                        <span><img src="images/tv-sub.png" width="60" class="card-image" alt=""></span>
                        <a href="#"><p class="font-weight-bold mt-2">DSTV/GOtv</p></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Recent transactions-->
    
</main>

<script>
    function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("myInput");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Your Mifund ID was copied successfully: " + copyText.value);
    } 
</script>

<?php include_once('footer.php'); ?>
</body>
</html>

