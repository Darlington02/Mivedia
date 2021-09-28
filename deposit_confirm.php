<?php

    require_once('session-manager.php');
    include_once('db-manager.php');
    
    if(!SessionManager::isLoggedIn()){
        header('location:login.php');
    }

    $user = $_SESSION['user'];
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $mifund_id = $_SESSION["mifund_id"];
    $amount= $_POST['amount'];
    
?>

<body>
    <?php include_once("navbar.php"); ?>   
    <main class="container">       
        <div class="card my-5">
            <div class="card-header">
                Confirm Deposit
            </div>
            <div class="card-body">
                ID: <?php echo $mifund_id; ?>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Name: <?php echo $name; ?></li>
                <li class="list-group-item">Email: <?php echo $email; ?></li>
                <li class="list-group-item">Amount: NGN <?php echo $amount; ?></li>
                <li class="list-group-item">
                    <form>
                        <script src="https://js.paystack.co/v1/inline.js"></script>
                        <button type="button" class="btn btn-primary btn-block" onclick="payWithPaystack()"> Deposit</button>
                    </form>
                </li>
            </ul>
            </div>
        </div>
    </main>
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_6f2d6a2de71865bfecd500c4a86de4ff1119cd19',
      email: '<?php echo $email ?>',
      amount: <?php echo $amount ?>00,
      ref: 'CRM'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "<?php echo $name ?>",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          const referenced = response.reference; 
          var mifund_id = "<?php echo $mifund_id ?>";
          var amount = "<?php echo $amount ?>";
          window.location.href="success.php?hash="+referenced+"&&receiver_name="+mifund_id+"&&amount="+amount+"&&successful=yes";
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>

</body>

<footer>
    <?php include_once('footer.php'); ?>
</footer>

</html>
