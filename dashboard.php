<?php
include_once("db-manager.php");
require_once('session-manager.php');

if(!SessionManager::isLoggedIn()){
    header("location:login.php");
  }
  
$user_id = $_SESSION['user'];

$SQL = "SELECT * FROM `users`, `mifund` WHERE `users_mifund_id` = `mifund_id` AND id = $user_id";
$result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));

while($row = mysqli_fetch_assoc($result)) {
    extract($row);
}


?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>My Dashboard</title>
        
        <style>
            body{
                background-color: gainsboro !important;
            }
             .fa-check-circle{
                 padding-left: 2px;
                color: green;
            }
            .fa-times{
                padding-left: 2px;
                color: red;
            }
        </style>
    </head>

    <body>
        <?php include_once("navbar.php"); ?>

        <div class="large-device d-none d-lg-block ">
            <div class="row container">
                    <div class="col-7">
                        
                    </div>
                    <div class="ml-auto">
                        <label for="" class="font-weight-bold text-primary">Mifund Wallet(NGN)</label>
                        <h1 class="mt-3"><span
                                class="badge btn btn-outline-warning wallet text-primary"><?php echo $mifund_wallet ?></span>
                        </h1>
                    </div>
                </div>
                <div class="cardsdeck container">
                    <div class="card-single">
                        <div>
                            <a href="update.php?user=<?php echo $id ?>"><h3>Update</h3></a>
                            <span>Update your Details</span>
                        </div>
                        <div>
                            <span><i class="fa fa-pencil"></i></span>
                        </div>
                    </div>
    
                    <div class="card-single mt-2">
                        <div>
                            <a href="request-reset.php"><h3>Change Password</h3></a>
                            <span>Change your user password here</span>
                        </div>
                        <div>
                            <span><i class="fa fa-pencil"></i></span>
                        </div>
                    </div>
    
                    <div class="card-single mt-2">
                        <div>
                            <a href="transactions.php"><h3>All Transactions</h3></a>
                            <span>View all your transactions</span>
                        </div>
                        <div>
                            <span><i class="fa fa-money"></i></span>
                        </div>
                    </div>
    
                    <div class="card-single mt-2">
                        <div>
                            <a href="wallet.php"><h3>Mifund Wallet</h3></a>
                            <span>View wallet</span>
                        </div>
                        <div>
                            <span><i class="fa fa-money"></i></span>
                        </div>
                    </div>
    
                    <div class="card-single mt-2">
                        <div>
                            <a href="index.php#organization-signup"><h3>Register Organization</h3></a>
                            <span>Register your organization</span>
                        </div>
                        <div>
                            <span><i class="fa fa-upload"></i></span>
                        </div>
                    </div>
    
                    <div class="card-single mt-2">
                        <div>
                            <a href="invite.php"><h3>Invite</h3></a></a>
                            <span>Invite your friends to Mivedia and earn commissions.</span>
                        </div>
                        <div>
                            <span><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--SMALL DEVICES-->
            <section class="d-lg-none">
                <div class="row container">
                    <div class="col-7">
                        
                    </div>
                    <div class="ml-auto">
                        <label for="" class="font-weight-bold text-primary">Mifund Wallet(NGN)</label>
                        <h1 class="mt-3"><span
                                class="badge btn btn-outline-warning wallet text-primary"><?php echo $mifund_wallet ?></span>
                        </h1>
                    </div>
                </div>
                <div class="card small-card mt-4">
                    <div class="card-header">
                        <h6 class="">Account Management</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <a href="update.php?user=<?php echo $id ?>"><li class="list-group-item"><i class="fa fa-pencil"></i> Update Account details</li></a>
                        <a href="request-reset.php"><li class="list-group-item"><i class="fa fa-pencil"></i> Change Password</li></a>
                        <a href="transactions.php"><li class="list-group-item"><i class="fa fa-money"></i> Transactions</li></a>
                        <a href="wallet.php"><li class="list-group-item"><i class="fa fa-money"></i> Mifund Wallet</li></a>
                        <a href="index.php#organization-signup"><li class="list-group-item"><i class="fa fa-upload"></i> Register Organization</li></a>
                        <a href="invite.php"><li class="list-group-item"><i class="fa fa-users"></i> Invite Friends</li></a>
                        <a href="logout.php"><li class="list-group-item"><i class="fa fa-sign-out"></i> Logout</li></a>
                    </ul>
                </div>

            </section>
    </body>

<footer>
    <?php include_once('footer.php'); ?>
</footer>

</html>