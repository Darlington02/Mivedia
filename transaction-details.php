<?php

    include_once('db-manager.php');
    include_once('session-manager.php');
    
    $code = $_GET['code'];
    
    $sql = "SELECT * FROM `mifund_transactions` WHERE `sender_id` = '$code' OR `receiver_id` = '$code'";
    $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
    while($row = mysqli_fetch_assoc($result)){
        extract($row);
    }

?>

    <head>
        <style>
            .timeline {
            	width:70%;
            	height: 20px;
            	list-style: none;
            	text-align: justify;
            	margin: 80px auto;
            	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,0)), color-stop(45%, rgba(255,255,255,0)), color-stop(51%, rgba(191,128,11,1)), color-stop(57%, rgba(255,255,255,0)), color-stop(100%, rgba(255,255,255,0)));
            	background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,0) 45%, rgba(191,128,11,1) 51%, rgba(255,255,255,0) 57%, rgba(255,255,255,0) 100%);
            }
            
            .timeline:after {
                display: inline-block;
                content: "";
                width: 100%;
            }
            
            .timeline li {
            	display: inline-block;
            	width: 20px;
            	height: 20px;
            	background: #F2BB13;
            	text-align: center;
            	line-height: 1.2;
            	position: relative;
            	border-radius: 50%;
            }
            .timeline li:before {
            	display: inline-block;
            	content: attr(data-year);
            	font-size: 16px;
            	position: absolute;
            	left: 50%;
            	transform: translateX(-50%);
            }
            .timeline li:nth-child(odd):before {
            	top: -40px;
            }
            .timeline li:nth-child(even):before {
            	bottom: -40px;
            }
            .timeline li:after {
            	display: inline-block;
            	content: attr(data-text);
            	font-size: 16px;
            	position: absolute;
            	left: 50%;
            	transform: translateX(-50%);
            }
            .timeline li:nth-child(odd):after {
            	bottom: 0;
            	margin-bottom: -10px;
            	transform: translate(-50%, 100%);
            }
            .timeline li:nth-child(even):after {
            	top: 0;
            	margin-top: -10px;
            	transform: translate(-50%, -100%);
            }
        </style>
    </head>
    
    <body>
        <?php include_once('navbar.php'); ?>
        
        <main class="container-fluid">
            <ul class="timeline">
            	<li data-year="Paid" data-text=""></li>
            	<li data-year="Processed" data-text=""></li>
            	<li data-year="Completed" data-text=""></li>
            </ul>
            
            <!--TRANSACTION DETAILS-->
            <div class="heading-text text-center mt-3"><?php echo $transaction_hash ?></div>
            <div class="card">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Transaction Type</b>: <?php echo $transaction_type ?></li>
                <li class="list-group-item"><b>Sender</b>: <?php echo $sender ?></li>
                <li class="list-group-item"><b>Receiver</b>: <?php echo $receiver ?></li>
                <li class="list-group-item"><b>Amount</b>: <?php echo $amount ?></li>
                <li class="list-group-item"><b>Date</b>: <?php echo $date ?></li>
                <li class="list-group-item"><b>Description</b>: <?php echo $description ?></li>
              </ul>
            </div>
        </main>
    </body>
    
    <footer>
        <?php include_once('footer.php'); ?>
    </footer>
</html>