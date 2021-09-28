<?php
require_once('session-manager.php');
require_once("db-manager.php");


// featured products for large devices

$SQL = "SELECT * FROM `products` WHERE `featured` = 'featured' AND `pieces` = 'available' AND `published` = 'yes'";
$featured_lg_result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));

    

function featured_lg($featured_lg_result) {
mysqli_data_seek($featured_lg_result, 0);
while($row = mysqli_fetch_assoc($featured_lg_result)) {
      extract($row);

    $price2 = $price * $discount;
    $main_price = $price - $price2;

    $component = "
                <li class=\"item-a d-none d-lg-block\">
                    <div class=\"box\">
                    <!-- image box -->
                    <div class=\"slide-img\">
                        <img src=\"$image1\" alt=\"product\">
                        <!-- Overlayer -->
                        <div class=\"overlay\">
                            <a class=\"btn btn-warning btn-sm mr-3 d-block\" title=\"Quick shop\" href=\"productpage.php?id=$id\">Shop</a>
                            <input type=\"button\" class=\"btn btn-warning btn-sm mr-3 d-block\" title=\"Add to Wishlist\" name=\"wish\" value=\"Wish\">
                            <input type=\"submit\" class=\"btn btn-warning btn-sm d-block\" title=\"Add to cart\" name=\"add\" value=\"Cart\">
                        </div>
                    </div>
                    <!-- details box -->
                    <div class=\"detail-box\">
                        <div class=\"type\">
                            <a href=\"productpage.php?id=$id\">$name</a>
                            <span>Price: NGN $main_price</span>
                        </div>
                    </div>
                    </div>
                </li>

                        ";

                  echo $component;
}
}

// featured products for small devices

$SQL = "SELECT * FROM `products` WHERE `featured` = 'featured' AND `pieces` = 'available' AND `published` = 'yes'";
$featured_sm_result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));

    

function featured_sm($featured_sm_result) {
mysqli_data_seek($featured_sm_result, 0);
while($row = mysqli_fetch_assoc($featured_sm_result)) {
      extract($row);

    $price2 = $price * $discount;
    $main_price = $price - $price2;

    $component = "
                    <div class=\"col-5 d-lg-none mr-3 bg-light mb-5\">
                        <form action=\"cart-manager.php?action=add&id=$id\" target=\"_blank\" method=\"post\">
                            <div class=\"product-top\">
                                <img src=\"$image1\" style=\"width: 120px; height: 140px\">
                                <div class=\"overlay-right\">
                                <a class=\"btn btn-warning btn-sm mb-3\" title=\"Quick shop\" href=\"productpage.php?id=$id\">Shop</a>
                                <input type=\"button\" class=\"btn btn-warning btn-sm mb-3\" title=\"Add to Wishlist\" name=\"wish\" value=\"Wish\">
                                <input type=\"submit\" class=\"btn btn-warning btn-sm\" title=\"Add to cart\" name=\"add\" value=\"Cart\">
                                </div>
                            </div>
                            <div class=\"product-bottom\">
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <a href=\"productpage.php?id=$id\">
                                    <h3>$name</h3>
                                </a>
                                <h5>NGN $main_price</h5>
                            </div>
                            <input type=\"hidden\" name=\"quantity\" value='1'>
                            <input type=\"hidden\" name=\"hidden_name\" value=\"$name \">
                            <input type=\"hidden\" name=\"shipping\" value=$shipping>
                            <input type=\"hidden\" name=\"hidden_image\" value=\" $image1 \">
                            <input type=\"hidden\" name=\"hidden_discount\" value=\"$price \">
                            <input type=\"hidden\" name=\"hidden_price\" value=\"$main_price\">
                        </form>
                    </div>";

                  echo $component;
}
}


// New Arrivals for large devices

$SQL = "SELECT * FROM `products` WHERE `pieces` = 'available' AND `published` = 'yes' ORDER BY `creationtime` DESC";
$new_lg_result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));

    

function newarrivals_lg($new_lg_result) {
mysqli_data_seek($new_lg_result, 0);
while($row = mysqli_fetch_assoc($new_lg_result)) {
      extract($row);

    $price2 = $price * $discount;
    $main_price = $price - $price2;

    $component = "
                <li class=\"item-a d-none d-lg-block\">
                    <div class=\"box\">
                    <!-- image box -->
                    <div class=\"slide-img\">
                        <img src=\"$image1\" alt=\"product\">
                        <!-- Overlayer -->
                        <div class=\"overlay\">
                            <a class=\"btn btn-warning btn-sm mr-3 d-block\" title=\"Quick shop\" href=\"productpage.php?id=$id\">Shop</a>
                            <input type=\"button\" class=\"btn btn-warning btn-sm mr-3 d-block\" title=\"Add to Wishlist\" name=\"wish\" value=\"Wish\">
                            <input type=\"submit\" class=\"btn btn-warning btn-sm d-block\" title=\"Add to cart\" name=\"add\" value=\"Cart\">
                        </div>
                    </div>
                    <!-- details box -->
                    <div class=\"detail-box\">
                        <div class=\"type\">
                            <a href=\"productpage.php?id=$id\">$name</a>
                            <span>Price: NGN $main_price</span>
                        </div>
                    </div>
                    </div>
                </li>

                        ";

                  echo $component;
}
}

// New arrivals for small devices

$SQL = "SELECT * FROM `products` WHERE `pieces` = 'available' AND `published` = 'yes' ORDER BY `creationtime` DESC";
$new_sm_result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));

    function newarrivals_sm($new_sm_result) {
  mysqli_data_seek($new_sm_result, 0); 
  // mysqli_data_seek functions to return the function to initial position 0 so it can be called again
while($row = mysqli_fetch_assoc($new_sm_result)) {
      extract($row);

    $price2 = $price * $discount;
	$main_price = $price - $price2;

    $component = "
                    <div class=\"col-5 d-lg-none mr-3 bg-light mb-5\">
                        <form action=\"cart-manager.php?action=add&id=$id\" target=\"_blank\" method=\"post\">
                            <div class=\"product-top\">
                                <img src=\"$image1\" style=\"width: 120px; height: 140px\">
                                <div class=\"overlay-right\">
                                <a class=\"btn btn-warning btn-sm mb-3\" title=\"Quick shop\" href=\"productpage.php?id=$id\">Shop</a>
                                <input type=\"button\" class=\"btn btn-warning btn-sm mb-3\" title=\"Add to Wishlist\" name=\"wish\" value=\"Wish\">
                                <input type=\"submit\" class=\"btn btn-warning btn-sm\" title=\"Add to cart\" name=\"add\" value=\"Cart\">
                                </div>
                            </div>
                            <div class=\"product-bottom\">
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <a href=\"productpage.php?id=$id\">
                                    <h3>$name</h3>
                                </a>
                                <h5>NGN $main_price</h5>
                            </div>
                            <input type=\"hidden\" name=\"quantity\" value='1'>
                            <input type=\"hidden\" name=\"hidden_name\" value=\"$name \">
                            <input type=\"hidden\" name=\"shipping\" value=$shipping>
                            <input type=\"hidden\" name=\"hidden_image\" value=\" $image1 \">
                            <input type=\"hidden\" name=\"hidden_discount\" value=\"$price \">
                            <input type=\"hidden\" name=\"hidden_price\" value=\"$main_price\">
                        </form>
                    </div>";


                  echo $component;
}
}

//MORE TO LOVE ON SMALL DEVICES
$SQL = "SELECT * FROM `products` WHERE `pieces` = 'available' AND `published` = 'yes' ORDER BY `creationtime` DESC LIMIT 4";
$rexults = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));

    function sm_devices($query) {
  mysqli_data_seek($query, 0); 
  // mysqli_data_seek functions to return the function to initial position 0 so it can be called again
while($row = mysqli_fetch_assoc($query)) {
      extract($row);

    $price2 = $price * $discount;
	$main_price = $price - $price2;

    $component = "
                    <div class=\"col-5 d-lg-none mr-2\">
                    <form action=\"cart-manager.php?action=add&id=$id\" target=\"_blank\" method=\"post\">
                    <div class=\"product-top\">
                        <img src=\"$image1\" style=\"width: 140px; height: 140px\">
                        <div class=\"overlay-right\">
                        <a class=\"btn btn-warning btn-sm mb-3\" title=\"Quick shop\" href=\"productpage.php?id=$id\">Shop</a>
                        <input type=\"button\" class=\"btn btn-warning btn-sm mb-3\" title=\"Add to Wishlist\" name=\"wish\" value=\"Wish\">
                        <input type=\"submit\" class=\"btn btn-warning btn-sm\" title=\"Add to cart\" name=\"add\" value=\"Cart\">
                        </div>
                    </div>
                    <div class=\"product-bottom\">
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <a href=\"productpage.php?id=$id\">
                            <h3>$name</h3>
                        </a>
                        <h5>NGN $main_price</h5>
                    </div>
                    <input type=\"hidden\" name=\"quantity\" value='1'>
                    <input type=\"hidden\" name=\"hidden_name\" value=\"$name \">
                    <input type=\"hidden\" name=\"shipping\" value=$shipping>
                    <input type=\"hidden\" name=\"hidden_image\" value=\" $image1 \">
                    <input type=\"hidden\" name=\"hidden_discount\" value=\"$price \">
                    <input type=\"hidden\" name=\"hidden_price\" value=\"$main_price\">
                    </form>
                    </div>
                        ";

                  echo $component;
}
}


//for the brands
$brand =  isset($_GET['brand']) ? $_GET['brand'] : 'No Products..';

$SQL = "SELECT * FROM `products` WHERE `pieces` = 'available' AND `published` = 'yes' AND `brand` = '$brand'";
$resultss = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));

function brand($resultss) {
mysqli_data_seek($resultss, 0);
while($row = mysqli_fetch_assoc($resultss)) {
      extract($row);
   
    $price2 = $price * $discount;
    $main_price = $price - $price2;

    $component = "
                    <div class=\"col-md-3 d-none d-lg-block\">
                    <form action=\"cart-manager.php?action=add&id=$id\" target=\"_blank\" method=\"post\">
                    <div class=\"product-top\">
                        <img src=\"$image1\" style=\"width: 200px; height: 200px\">
                        <div class=\"overlay-right\">
                        <a class=\"btn btn-warning btn-sm mb-3\" title=\"Quick shop\" href=\"productpage.php?id=$id\">Shop</a>
                        <input type=\"button\" class=\"btn btn-warning btn-sm mb-3\" title=\"Add to Wishlist\" name=\"wish\" value=\"Wish\">
                        <input type=\"submit\" class=\"btn btn-warning btn-sm\" title=\"Add to cart\" name=\"add\" value=\"Cart\">
                        </div>
                    </div>
                    <div class=\"product-bottom\">
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <a href=\"productpage.php?id=$id\">
                            <h3>$name</h3>
                        </a>
                        <h5>NGN $main_price</h5>
                    </div>
                    <input type=\"hidden\" name=\"quantity\" value='1'>
                    <input type=\"hidden\" name=\"hidden_name\" value=\"$name \">
                    <input type=\"hidden\" name=\"shipping\" value=$shipping>
                    <input type=\"hidden\" name=\"hidden_image\" value=\" $image1 \">
                    <input type=\"hidden\" name=\"hidden_discount\" value=\"$price \">
                    <input type=\"hidden\" name=\"hidden_price\" value=\"$main_price\">
                    </form>
                    </div>

                    
                    <div class=\"col-6 mt-3 d-lg-none\">
                    <form action=\"cart-manager.php?action=add&id=$id\" target=\"_blank\" method=\"post\">
                    <div class=\"product-top\">
                        <img src=\"$image1\" style=\"width: 150px; height: 150px\">
                        <div class=\"overlay-right\">
                        <a class=\"btn btn-warning btn-sm mb-3\" title=\"Quick shop\" href=\"productpage.php?id=$id\">Shop</a>
                        <input type=\"button\" class=\"btn btn-warning btn-sm mb-3\" title=\"Add to Wishlist\" name=\"wish\" value=\"Wish\">
                        <input type=\"submit\" class=\"btn btn-warning btn-sm\" title=\"Add to cart\" name=\"add\" value=\"Cart\">
                        </div>
                    </div>
                    <div class=\"product-bottom\">
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <a href=\"productpage.php?id=$id\">
                            <h3>$name</h3>
                        </a>
                        <h5>NGN $main_price</h5>
                    </div>
                    <input type=\"hidden\" name=\"quantity\" value='1'>
                    <input type=\"hidden\" name=\"hidden_name\" value=\"$name \">
                    <input type=\"hidden\" name=\"shipping\" value=$shipping>
                    <input type=\"hidden\" name=\"hidden_image\" value=\" $image1 \">
                    <input type=\"hidden\" name=\"hidden_discount\" value=\"$price \">
                    <input type=\"hidden\" name=\"hidden_price\" value=\"$main_price\">
                    </form>
                    </div>
                        ";

                  echo $component;
}
}

// FOR CATEGORIES
$category =  isset($_GET['category']) ? $_GET['category'] : 'No Products..';

$SQL = "SELECT * FROM `products` WHERE `pieces` = 'available' AND `published` = 'yes' AND `category` = '$category'";
$category_result = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));

function category($category_result) {
mysqli_data_seek($category_result, 0);
while($row = mysqli_fetch_assoc($category_result)) {
      extract($row);
   
    $price2 = $price * $discount;
    $main_price = $price - $price2;

    $component = "
                    <div class=\"col-md-3 d-none d-lg-block\">
                    <form action=\"cart-manager.php?action=add&id=$id\" target=\"_blank\" method=\"post\">
                    <div class=\"product-top\">
                        <img src=\"$image1\" style=\"width: 200px; height: 200px\">
                        <div class=\"overlay-right\">
                        <a class=\"btn btn-warning btn-sm mb-3\" title=\"Quick shop\" href=\"productpage.php?id=$id\">Shop</a>
                        <input type=\"button\" class=\"btn btn-warning btn-sm mb-3\" title=\"Add to Wishlist\" name=\"wish\" value=\"Wish\">
                        <input type=\"submit\" class=\"btn btn-warning btn-sm\" title=\"Add to cart\" name=\"add\" value=\"Cart\">
                        </div>
                    </div>
                    <div class=\"product-bottom\">
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <a href=\"productpage.php?id=$id\">
                            <h3>$name</h3>
                        </a>
                        <h5>NGN $main_price</h5>
                    </div>
                    <input type=\"hidden\" name=\"quantity\" value='1'>
                    <input type=\"hidden\" name=\"hidden_name\" value=\"$name \">
                    <input type=\"hidden\" name=\"shipping\" value=$shipping>
                    <input type=\"hidden\" name=\"hidden_image\" value=\" $image1 \">
                    <input type=\"hidden\" name=\"hidden_discount\" value=\"$price \">
                    <input type=\"hidden\" name=\"hidden_price\" value=\"$main_price\">
                    </form>
                    </div>

                    
                    <div class=\"col-6 mt-3 d-lg-none\">
                    <form action=\"cart-manager.php?action=add&id=$id\" target=\"_blank\" method=\"post\">
                    <div class=\"product-top\">
                        <img src=\"$image1\" style=\"width: 150px; height: 150px\">
                        <div class=\"overlay-right\">
                        <a class=\"btn btn-warning btn-sm mb-3\" title=\"Quick shop\" href=\"productpage.php?id=$id\">Shop</a>
                        <input type=\"button\" class=\"btn btn-warning btn-sm mb-3\" title=\"Add to Wishlist\" name=\"wish\" value=\"Wish\">
                        <input type=\"submit\" class=\"btn btn-warning btn-sm\" title=\"Add to cart\" name=\"add\" value=\"Cart\">
                        </div>
                    </div>
                    <div class=\"product-bottom\">
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <i class=\"fa fa-star\"></i>
                        <a href=\"productpage.php?id=$id\">
                            <h3>$name</h3>
                        </a>
                        <h5>NGN $main_price</h5>
                    </div>
                    <input type=\"hidden\" name=\"quantity\" value='1'>
                    <input type=\"hidden\" name=\"hidden_name\" value=\"$name \">
                    <input type=\"hidden\" name=\"shipping\" value=$shipping>
                    <input type=\"hidden\" name=\"hidden_image\" value=\" $image1 \">
                    <input type=\"hidden\" name=\"hidden_discount\" value=\"$price \">
                    <input type=\"hidden\" name=\"hidden_price\" value=\"$main_price\">
                    </form>
                    </div>
                        ";

                  echo $component;
}
}


//FOR THE EBOOKS

$ebooks =  isset($_GET['brands']) ? $_GET['brands'] : 'School';

$SQL = "SELECT * FROM `soft_copies` WHERE `brands` = '$ebooks' AND `published` = 'yes'";
$rexult = mysqli_query($cxn, $SQL) or die(mysqli_error($cxn));

function ebook($rexult){
mysqli_data_seek($rexult, 0);
while($row = mysqli_fetch_assoc($rexult)) {
      extract($row);

      $component ="
                        <div class=\"col-md-4 mt-3 d-none d-lg-block\">
                        <img src=\"$image1\" class=\"book-image\" height=\"300px\" width=\"220px\" alt=\"...\">
                        <a href=\"ebookpage.php?id=$id\"><h6 class=\"text-primary mt-3\">$title</h6></a>
                        <a href=\"$upload\" target=\"_blank\"><button type=\"button\"
                            class=\"btn btn-warning btn-sm\">Download</button></a>
                        </div>
                        
                        <div class=\"col-6 mt-3 d-lg-none\">
                        <img src=\"$image1\" class=\"\" height=\"200px\" width=\"150px\" alt=\"...\">
                        <a href=\"ebookpage.php?id=$id\"><h6 class=\"text-primary mt-3\">$title</h6></a>
                        <a href=\"$upload\" target=\"_blank\"><button type=\"button\"
                            class=\"btn btn-warning btn-sm\">Download</button></a>
                        </div>
                        
                ";

      echo $component;
}
}