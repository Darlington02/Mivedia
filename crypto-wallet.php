<?php
    include_once('db-manager.php');
    include_once('session-manager.php');

    $code = "";

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fa/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    
    <style>
        body{
            background-color: #000000;
        }
    </style>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand pl-3" href="index.php"><img src="images/logo.png" width="180" height="150"
                alt="" srcset=""></a>
    </nav>
    </header>

     <div class="section-title heading-text container mb-5">
        <h6 class="text-light">My Wallet</h6>
        <button type="button" class="btn btn-secondary btn-sm">Cryptocurrency</button>
        <button type="button" class="btn btn-light btn-sm"><a href="wallet.php" class="text-dark">Fiat</a></button>
    </div>
            
    <div class="row">
        <div class="col-md-2 d-flex flex-row flex-md-column">
            <div class="my-4 mx-2 square d-flex flex-row justify-content-center">
                <i class="fa fa-bank"></i>
            </div>
            <div class="my-4 mx-2 square d-flex flex-row justify-content-center">
                <i class="fa fa-send"></i>
            </div>
            <div class="my-4 mx-2 square d-flex flex-row justify-content-center">
                <i class="fa fa-money"></i>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row text-light">
                <div class="col-md-6">
                    <div class="d-flex flex-column balance">
                        <span class="balance-details">Balance Details</span>
                        <span class="balance-price ml-3">NGN 375,000</span>
                        <span class="small muted-text mt-3 ml-3">BTC: 0.13</span>
                        <span class="small muted-text ml-3">USDT: 3500</span>
                        <span class="small muted-text ml-3">ETH: 0.28</span>
                        <div class="d-flex flex-row m-3">
                        <button class="flex-grow-1 btn btn-warning mr-2">Receive</button>
                        <button class="flex-grow-1 btn btn-warning">Send</button>
                    </div>
                    </div>
                </div>
                <div class="col-md-5 mt-2">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th class="text-light">Wallets</th>
                                <th class="text-light">View All</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>    
                                <td>
                                    <div class="d-flex flex-row text-light">
                                        <div class="d-flex flex-row justify-content-center">
                                            <img src="images/btc.png" height="50" width="50">
                                        </div>
                                        <div class="d-flex flex-column ps-2 mx-3">
                                            <span class="font-weight-bold">BTC</span>
                                            <span>Bitcoin</span>
                                        </div>
                                        <div class="d-flex flex-column ml-3">
                                            <span>0.13 BTC</span>
                                            <span class="small text-muted">NGN 97,000</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex flex-row text-light">
                                        <div class="d-flex flex-row justify-content-center">
                                            <img src="images/eth.png" height="50" width="50">
                                        </div>
                                        <div class="d-flex flex-column ps-2 mx-3">
                                            <span class="font-weight-bold">ETH</span>
                                            <span>Ethereum</span>
                                        </div>
                                        <div class="d-flex flex-column ml-3">
                                            <span>0.26 ETH</span>
                                            <span class="small text-muted">NGN 108,000</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                                <td>
                                    <div class="d-flex flex-row text-light">
                                        <div class="d-flex flex-row justify-content-center">
                                            <img src="images/usdt.png" height="50" width="50">
                                        </div>
                                        <div class="d-flex flex-column ps-2 mx-3">
                                            <span class="font-weight-bold">USDT</span>
                                            <span>Tether</span>
                                        </div>
                                        <div class="d-flex flex-column ml-3">
                                            <span>3500 USDT</span>
                                            <span class="small text-muted">NGN 217,000</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 mt-5">
                    <div>
                        <table class="table table-borderless text-light">
                            <thead>
                                <tr>
                                    <th>Transactions</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-row">
                                           <div class="d-flex flex-row">
                                               <i class="fa fa-upload mr-2"></i>
                                           </div> 
                                           <div class="d-flex flex-column ps-2">
                                               <span class="font-weight-bold">Sent BTC</span>
                                               <span>12 July, 2021</span>
                                           </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column align-items-end">
                                            <span class="font-weight-bold text-danger">-0.04BTC</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex flex-row">
                                           <div class="d-flex flex-row">
                                               <i class="fa fa-download mr-2"></i>
                                           </div> 
                                           <div class="d-flex flex-column ps-2">
                                               <span class="font-weight-bold">Received USDT</span>
                                               <span>18 Aug, 2021</span>
                                           </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column align-items-end">
                                            <span class="font-weight-bold text-success">+400 USDT</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>