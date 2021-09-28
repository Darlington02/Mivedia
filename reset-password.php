<?php
    require_once("session-manager.php");
    require_once('db-manager.php');

    if(!SessionManager::isLoggedIn()){

        if(!isset($_GET['code'])){
            exit("The link to the page is broken");
        }
    
        $code = $_GET['code'];
    
        $sql = "SELECT * FROM `reset_passwords` WHERE `code` = '$code'";
        $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
    
        if(mysqli_num_rows($result) == 0){
            exit("The link to the page is broken");
        }
    
        if(isset($_POST['submit'])){
            $password = $_POST['pwd'];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $row = mysqli_fetch_array($result);
            $email = $row['email'];
    
            $update_sql = "UPDATE `users` SET `password`='$password_hash' WHERE `email` = '$email'";
            mysqli_query($cxn, $update_sql) or die(mysqli_error($cxn));
    
            if($update_sql){
                $remove = "DELETE FROM `reset_passwords` WHERE `code` = '$code'"; 
                mysqli_query($cxn, $remove) or die(mysqli_error($cxn));
        
                exit('Your password was updated successfully. click <a href="login.php">here</a> to login.');
            }else{
                exit('something went wrong. Please try again.');
            }
        
        }
      }else{

        if(isset($_POST['submit'])){
            $password = $_POST['pwd'];
            $confirm_password = $_POST['confirm_pwd'];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $row = mysqli_fetch_array($result);
            $email = $_SESSION['email'];

            $SQL = "UPDATE `users` SET `password`='$password_hash' WHERE `email` = '$email'";
            
            // IF PASSWORD MATCHES, EXECUTE QUERY
            if($password == $confirm_password){
                mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));
                header("location:dashboard.php");
            }else{
                $_SESSION["err_pwd"] = "your password does not match";
                header("location:reset-password.php");
            
            }
        }

      }
    

    include_once('navbar.php');
?>

<main class="container-fluid justify-content-center mt-5">
    <section class="d-flex justify-content-center">
        <div class="card mb-5" style="width: 48rem;">
            <div class="card-header bg-primary text-light">
                Input your New password here!
            </div>
            <form method="POST">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="pwd" class="form-control"
                                id="exampleInputPassword1" placeholder="Enter your new password" required>
                        </div>
                    </li>  
                    
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" name="confirm_pwd" class="form-control"
                                id="exampleInputPassword1" required>
                        </div>
                        <small class="form-text text-dark">
                            <?php  
                            if(isset($_SESSION['err_pwd'])){
                                echo ($_SESSION['err_pwd']);
                                unset($_SESSION['err_pwd']);
                            }
                            ?>
                        </small>
                    </li>
                    <li class="list-group-item">
                        <div class="">
                            <button type="submit" name="submit" class="btn btn-warning btn-lg btn-block">Update</button>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </section>
</main>      

<?php include_once('footer.php'); ?>