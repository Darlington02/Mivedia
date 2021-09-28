<?php

    include_once('db-manager.php');
    include_once('session-manager.php');
    
?>

<head>
    
</head>

<body>
    <?php include_once('navbar.php') ?>
    <main class="fluid-container">
        <h3 class="heading-text mt-3 text-center">Fundraise <a href="start-fundraise.php"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button></a></h3>
        
        <!--FOR LARGE DEVICES-->
        <div class="team row">
            <?php 
            $sm_select_sql = "SELECT * FROM `fundraising`";
            $sm_result = mysqli_query($cxn, $sm_select_sql) or die(mysqli_error($cxn));
            while($sm_row = mysqli_fetch_assoc($sm_result)){
                echo '
                   <div class="col-md-4 team-card d-none d-lg-block">
                       <div class="content">
                           <div class="img">
                               <img src="'; echo $sm_row['image']; echo '" alt="">
                           </div>
                           <div class="content">
                               <a href="fundraising-details.php?fundraiser='; echo $sm_row["fundraising_id"]; echo '"><h5 class="font-weight-bold text-dark">'; echo $sm_row['title']; echo '</h5></a>
                               <p class="text-primary mt-2"><b>NGN'; echo $sm_row['amount_raised']; echo '</b> raised of NGN'; echo $sm_row['goal']; echo '</p>
                               <p>'; echo $sm_row['caption']; echo '</p>
                           </div>
                       </div>
                   </div>
                ';
            }
            ?>
        </div>
        
        <!--FOR SMALL DEVICES-->
                   <?php 
            $sm_select_sql = "SELECT * FROM `fundraising`";
            $sm_result = mysqli_query($cxn, $sm_select_sql) or die(mysqli_error($cxn));
            while($sm_row = mysqli_fetch_assoc($sm_result)){
                echo '
                   <div class="card-single m-2 d-lg-none">
                        <div>
                            <a href="fundraising-details.php?fundraiser='; echo $sm_row["fundraising_id"]; echo '"><h5 class="font-weight-bold text-dark">'; echo $sm_row["title"]; echo '</h5></a>
                            <p class="text-primary mt-2"><b>NGN'; echo $sm_row['amount_raised']; echo '</b> raised of NGN'; echo $sm_row['goal']; echo '</p>
                            <p>'; echo $sm_row["caption"]; echo '</p>
                        </div>
                    <span><img src="'; echo $sm_row["image"]; echo '" width="150" class="card-image" alt=""></span>
                    </div>
                ';
            }
            ?>
    </main>
</body>

<?php include_once('footer.php') ?>

</html>