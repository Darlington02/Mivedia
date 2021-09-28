<?php 
    include_once('navbar.php');
?>

<style>
    .div {
        background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFqWl_hST8rDKy0JNV1pcRvKYGZdEl24GhPw&usqp=CAU');
        height: 600px;
    }
    .shadow {
	background-color: rgba(0, 0, 0, 0.7);
	height: 600px;
    }
    .market {
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;

        }
</style>

<div>
            <h4 class="font-weight-bold text-warning text-center text nav-text">Your account was successfully created. you could login here.</h4>
            <p class="text-warning text-center text nav-text-size d-none d-lg-block">Login to your account, to have full access to all features, and purchase goods and services with no hassles.</p>
            <p class="btn-center d-flex justify-content-center pt-2 pb-4"><a href="login.php"><button
                        type="button" class="btn btn-primary btn-lg">Login</button></a></p>
        </div>
    </div>
</div>
	
    <?php include_once("footer.php"); ?>
</html>