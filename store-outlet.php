<?php

    include_once('db-manager.php');
    include_once('session-manager.php');
    
    $merchant_id = $_GET['merchant'];
    
    $select_sql = "SELECT * FROM `merchants` WHERE  `merchant_id` = '$merchant_id'";
    $result = mysqli_query($cxn, $select_sql) or die(mysqli_error($cxn));
    
    while($row = mysqli_fetch_assoc($result)){
        extract($row);
    }
    
    
    include_once('navbar.php');
?>

<head>
    <meta charset="utf-8" />
    <title><?php echo $store_name ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
	
	<!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Lightbox css -->
    <link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
</head>
	
    <style>
        .profile-box{
            width: 100% auto;
            height: 350px;
            background-color: #ccc;
            background-image: url('images/map.jpg');
            /* background-repeat: no-repeat; */
            background-position: 20% 50%;
            padding: 10px;
            background-clip: padding-box;
            background-attachment: fixed;
            position: relative;
        }
        @media only screen and (min-width: 600px){
            .profile-box{
                width: 100% auto;
                height: 450px;
                background-image: url('images/map.jpg');
                /* background-repeat: no-repeat; */
                background-position: 20% 50%;
                padding: 10px;
                background-clip: padding-box;
                background-attachment: fixed;
                position: relative;
            }
        }
        .shop-details{
            margin-top: 170px;
        }
    </style>
</head>

<body>
    

    <main>
         <!-- cover photo -->
         <header class="profile-box" role="banner">
                <div>
                    <img src="<?php echo $store_img ?>"class="profile-pic" alt="">
                    <h2 class="username"><?php echo $store_name ?></h2>
                </div>
            </header>
            <!-----------------------shop details--------------------------------->
            <div class="container-fluid shop-details">
                <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $store_name ?>" name="demote" class="btn btn-primary btn-md ml-2">Directions</a>
                <hr>
                    <div class="col-md-5">
                        <p><b>Merchant Code: </b><a href="pay-local-store.php?code=<?php echo $merchant_code ?>"><?php echo $merchant_code ?></a></p>
                        <p><b>Shop: </b><?php echo $store_name ?></p>
                        <p><b>Shop Category: </b><?php echo $store_category ?></p>
                        <p><b>Email: </b><?php echo $store_email ?></p>
                        <p><b>Phone: </b><?php echo $store_phone ?></p>
                        <p><b>Address: </b> <?php echo $store_address ?>, <?php echo $store_state ?></p>
                        <p class="d-none d-lg-block"><b>Description: </b><?php echo $store_description ?></p> 
                        <a href="pay-local-store.php?code=<?php echo $merchant_code ?>"><button class="btn btn-warning btn-block">Pay Merchant</button></a> 
                    </div>
                    <p class="d-lg-none"><?php echo $description ?></p>
                    
                     <div class="col-xl-12 mt-3">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Product Catalogue</h4>
                                        <p class="card-title-desc mb-1">Browse through images of our available products </p>
        
                                        <div class="popup-gallery">
                                            <div class="row">
                                                
                                                <div class="col-xl-2 col-md-4 col-6">
                                                    <div class="mt-4">
                                                        <a href="assets/images/small/img-3.jpg" title="Project 3">
                                                            <div class="img-fluid">
                                                                <img src="assets/images/small/img-3.jpg" alt="" class="img-fluid d-block">
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 col-md-4 col-6">
                                                    <div class="mt-4">
                                                        <a href="assets/images/small/img-4.jpg" title="Project 4">
                                                            <div class="img-fluid">
                                                                <img src="assets/images/small/img-4.jpg" alt="" class="img-fluid d-block">
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 col-md-4 col-6">
                                                    <div class="mt-4">
                                                        <a href="assets/images/small/img-5.jpg" title="Project 5">
                                                            <div class="img-fluid">
                                                                <img src="assets/images/small/img-5.jpg" alt="" class="img-fluid d-block">
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 col-md-4 col-6">
                                                    <div class="mt-4">
                                                        <a href="assets/images/small/img-6.jpg" title="Project 6">
                                                            <div class="img-fluid">
                                                                <img src="assets/images/small/img-6.jpg" alt="" class="img-fluid d-block">
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        
                        <!--PRODUCT INVENTORY-->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div>
                                    <h5 class="heading-text text-center"> Inventory</h5>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <div class="table-responsive">
                                            <table class="table table-editable table-nowrap align-middle table-edits">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
            								     $sql = "SELECT * FROM     `local_inventory` WHERE `merchant_id` = '$merchant_id' ORDER BY `inventory_id` DESC LIMIT 10";
                                                $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
            								    while($row = mysqli_fetch_assoc($result)){
            								  echo' 
                                                    <tr data-id="1">
                                                        <td data-field="name">'; echo $row['inventory_name']; echo '</td>
                                                        <td data-field="age"> NGN'; echo $row['inventory_price'];
                                                        echo'
                                                        <td style="width: 100px">
                                                        <a href="pay-local-store.php?code='; echo $merchant_code; echo '"><button class="btn btn-warning">Pay</button></a> 
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
                    
                    <!-- STORE REVIEWS -->
                    
                    	<div class="card mt-4">
                    		<div class="card-header"><h4 class="heading-text text-center">Reviews</h4></div>
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
                
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- Magnific Popup-->
        <script src="assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- lightbox init js-->
        <script src="assets/js/pages/lightbox.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
                    
    </main>
</body>

<?php include_once('footer.php'); ?> 