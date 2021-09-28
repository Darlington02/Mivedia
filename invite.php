<?php
    require_once("session-manager.php");
    include_once("db-manager.php");
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if(!SessionManager::isLoggedIn()){
        header("location:login.php");
    }

    $id = $_SESSION['user'];

    $sql = "SELECT * FROM `users` WHERE '$id' = `id`";
    $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
    while($row = mysqli_fetch_assoc($result)){
        extract($row);
    }
    
    $total_ref = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM `users` WHERE `ref_id` = '$id'")); 
    $active_ref = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM `users` WHERE `ref_id` = '$id' AND `bonus_status` = 'active'"));
    $total_earnings = $active_ref * 500;

    include_once("navbar.php");
?>

<style>

</style>

<body>

    <main class="container">
        <div class="card">
            <h5 class="card-header">Invite Friends</h5>
            <div class="card-body">
                <h5 class="card-title">Referral Link</h5>
                <p class="card-text">Copy your referral link below to send an invite to your friends to sign up on Mivedia, and you get 10% of their first deposit..</p>

                <form class="form-inline">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Referral Link</label>
                        <input type="text" class="form-control" id="myInput" value="https://mivedia.com/signup.php?ref=MVD38gjhaoekfWYEjkfkehVSVdj20ZX<?php echo $id ?>" readonly>
                    </div>
                    <button title="copy link to clipboard" type="submit" class="btn btn-warning mb-2 ml-2" onclick="myFunction()">Copy</button>
                </form>

                <ul class="list-group mb-3 mt-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Referrals
                        <span class="badge badge-warning badge-pill"><?php echo $total_ref ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Active Referrals
                        <span class="badge badge-warning badge-pill"><?php echo $active_ref ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</body>

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
    alert("Copied the text: " + copyText.value);
    } 
</script>

<?php include_once("footer.php"); ?>
