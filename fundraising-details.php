<?php

    include_once('db-manager.php');
    include_once('session-manager.php');
    
    $fundraiser_id = $_GET['fundraiser'];
    
    $sql = "SELECT * FROM `fundraising`, `users` WHERE `fundraising_id` = '$fundraiser_id' && `fundraiser_id` = `id`";
    $result = mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
    while($row = mysqli_fetch_assoc($result)){
        extract($row);
    }
?>

<head>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60076f4ea0fed60018ecd8ee&product=inline-share-buttons" async="async"></script>
</head>

<body>
    <?php include_once('navbar.php') ?>
    <main class="container">
        
        <!-- CAROUSEL HEADER -->
    <section class="header container-fluid mt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h4 class="heading-text"><?php echo $title ?></h4>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="<?php echo $image ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="<?php echo $image ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="<?php echo $image ?>" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
            
        <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-text mt-3"><b><?php echo number_format($amount_raised) ?></b> raised of NGN <?php echo number_format($goal) ?></h5>
                <hr>

            
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $caption ?></h6>
                
                    <form method="POST" action="donation_confirm.php">
                        <input type="number" class="form-control my-2" name="amount" placeholder="Donation amount">
                        <input type="hidden" name="name" value="<?php echo $name ?>">
                        <input type="hidden" name="mifund_id" value="<?php echo $mifund_id ?>">
                        <button type="submit" class="btn btn-warning btn-block"> Donate</button>
                    </form>
                
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Fundraising link: <input type="text" class="d-none" id="myInput" value="https://mivedia.com/fundraising-details.php?fundraiser=<?php echo $fundraising_id ?>">
                    <i type="submit" class="fa fa-clipboard" title="copy ID to clipboard" onclick="myFunction()"></i>  </li>
                    <li class="list-group-item">Created By: <?php echo $name ?></li>
                    <li class="list-group-item">Category: <?php echo $category ?></li>
                    <li class="list-group-item">Date: <?php echo $date ?></li>
                </ul>
                
                <div class="sharethis-inline-share-buttons text-left mt-3"></div>
              </div>
            </div>
        </div>
        </div>
    </section>
    
    <!--Body-->
    <hr>
    <?php echo $body ?>
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
    alert("Your Fundraising link was copied successfully: " + copyText.value);
    } 
    
</script>
</body>

<footer>
    <?php include_once('footer.php'); ?>
</footer>

</html>