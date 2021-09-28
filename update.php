<?php

    require_once("session-manager.php");
    include_once("db-manager.php");

    if(!SessionManager::isLoggedIn()){
        header("location:index.php");
    }

    $id = $_GET['user'];
    $SQL = "SELECT * FROM `users`, `mifund` WHERE `id` = $id AND `mifund_id` = `users_mifund_id`";
    $result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));
    $row = mysqli_fetch_assoc($result);
    extract($row);

    include_once("navbar.php");
?>

    <div>
        <main class="container-fluid justify-content-center mt-5">
            <section class="d-flex justify-content-center">
                <div class="card mb-5" style="width: 48rem;">
                    <form action="updateprocessor.php" method="POST" enctype="multipart/form-data">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-group text-capitalize">
                                    <label for="Name">Full name</label>
                                    <input type="text" name="name" class="form-control"
                                        id="Name" value="<?php echo $name ?>">
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone">Phone number</label>
                                            <input type="text" name="phone" class="form-control"
                                                id="phone" value="<?php echo $phone ?>">
                                        </div>
                                    </div>
                                </div> 
                            </li>
                            
                            <li class="list-group-item">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="mifund">Mifund Password</label>
                                            <input type="number" name="mifund" class="form-control"
                                                id="mifund" value="<?php echo $transaction_password ?>">
                                        </div>
                                    </div>
                                </div> 
                            </li>
                            
                            <li class="list-group-item">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control"
                                                id="address" value="<?php echo $first_address ?>">
                                        </div>
                                    </div>
                                </div> 
                            </li>
                            
                            <li class="list-group-item">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" name="state" class="form-control"
                                                id="state" value="<?php echo $state ?>">
                                        </div>
                                    </div>
                                </div> 
                            </li>
                            
                            <li class="list-group-item">
                                <div class="">
                                    <button type="submit" class="btn btn-warning btn-lg btn-block">Update</button>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </section>
        </main>      
        </div>
    </div>
</div>

</body>

<?php
    include_once("footer.php");
?>
</html>


