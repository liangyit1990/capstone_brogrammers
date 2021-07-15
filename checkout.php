<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

if(isset($_COOKIE["isLoggedIn"]) && (isset($_COOKIE['users_id']))) {

    $getuserQuery = DB::query("SELECT cartbatch_no FROM cartbatch WHERE users_id=%i AND cartbatch_status=%i" , $_COOKIE['users_id'],0);
    $getUserBatchCount = DB::count();
    $totalCartItem = 0;
    $batchItemNo = 0;
    if($getUserBatchCount > 0) {
        foreach ($getuserQuery as $getUserResult){
            if($batchItemNo < $getUserResult['cartbatch_no']) {
                $batchItemNo = $getUserResult['cartbatch_no'];
            }
        } $totalCartItem += $batchItemNo;
    }

    $getUserCartQuery = DB::query("SELECT * FROM cart 
    INNER JOIN food
    ON cart.food_id = food.food_id
    WHERE users_id=%i AND cart_status=%i" , $_COOKIE['users_id'],0);
    $getUserCartCount = DB::count();
    if($getUserCartCount > 0){
        $totalCartItem += $getUserCartCount;
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png">
    <!-- scroll reveal here
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script> -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- icons here -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- css here -->
    <link rel="stylesheet" href="css/checkout.css">
 
    <title><?php echo SITE_NAME; ?></title>
</head>


<body>
    <!-- scroll to top -->
    <a href="#" class="scrolltop " id="scroll-top">
        <i class='bx bx-chevron-up-circle scrolltop_icon' ></i>
    </a>

    
        <div class="container">
            <div>
                <div class="py-5 ">
                
                <h2>Checkout form</h2><br>

                <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-pill"><?php echo $totalCartItem ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php 
                        if($batchItemNo > 0){
                            $count = 1;
                            while($count <= $batchItemNo ){
                                $subprice = 0;
                                echo '<li class="list-group-item d-flex justify-content-between lh-sm">
                                        <div>';
                                $getBatchQuery = DB::query("SELECT * FROM cartbatch 
                                    INNER JOIN food 
                                    ON cartbatch.food_id = food.food_id
                                    where users_id=%i AND cartbatch_status=%i AND cartbatch_no=%i"  , $_COOKIE['users_id'],0,$count);
                                    foreach($getBatchQuery as $getBatchQueryResult) {
                                        
                                        if($getBatchQueryResult['food_subcategory'] == 'base'){
                                            echo "<h6 class='my-0'>".ucwords($getBatchQueryResult['food_name'])."</h6>";
                                        } else {
                                            echo '<small class="text-muted">'.ucwords($getBatchQueryResult['food_name']).'</small> x '.$getBatchQueryResult['cartbatch_foodqty'].'<br>';
                                        }

                                        $subprice = $getBatchQueryResult['cartbatch_foodqty'] * $getBatchQueryResult['food_price'];
                                        $totalprice += $subprice;
                                        $totalcartprice += $subprice;
                                        

                                    }
                                    echo "</div>";
                                    echo "<span class='text-muted'>".number_format((float)$totalprice, 2, '.', '')."</span>";
                                    $totalprice = 0;
                                    $count++;
                            }
                        }

                        if($getUserCartCount > 0) {
                            
                            foreach($getUserCartQuery as $getUserCartResult) {
                                echo '<li class="list-group-item d-flex justify-content-between lh-sm">
                                        <div>';
                                echo "<h6 class='my-0'>".ucwords($getUserCartResult['food_name'])." x ".$getUserCartResult['cart_foodqty']."</h6> ";   
                                echo "</div>";
                                $subCartPrice = $getUserCartResult['food_price'] * $getUserCartResult['cart_foodqty'];
                                echo "<span class='text-muted'>".number_format((float)$subCartPrice, 2, '.', '')."</span>";
                                $totalcartprice += $subCartPrice;

                            }
                        }
                        
                        ?>
                        
                        <!-- <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$12</span>
                        </li> -->
                        <!-- <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                            <h6 class="my-0">Second product</h6>
                            <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$5</span>
                        </li> -->
                        <!-- <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">-</span>
                        </li> -->
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (SGD)</span>
                            <strong><?php echo number_format((float)$totalcartprice, 2, '.', ''); ?></strong>
                        </li>
                    </ul>

                    <!-- <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                    </form> -->
                </div>
                <div class="col-md-7 col-lg-8">
                    
                    <form class="needs-validation" action="checkout-charge.php" method="POST" novalidate="">
                    <div class="row g-3">
                        <div class="col-sm-12">
                        <label for="firstName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Name is required.
                        </div>
                        </div>

                        <div class="col-12">
                        <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                        </div>

                        <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                        </div>

                        <div class="col-12">
                        <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="col-md-5">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" id="country" required="">
                            <option value="">Choose...</option>
                            <option>Singapore</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                        </div>

                        <!-- <div class="col-md-4">
                        <label for="state" class="form-label">State</label>
                        <select class="form-select" id="state" required="">
                            <option value="">Choose...</option>
                            <option>California</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                        </div> -->

                        <div class="col-md-3">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required="">
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                        </div>
                    </div>
                    <?php 
                    $getOrderQuery = DB::query("SELECT * FROM orders");
                    $getOrderCount = DB::count();
                    if($getOrderCount > 0) {
                        $orderCount = $getOrderCount + 1;
                    } else {
                        $orderCount = 1;
                    }
                    ?>
                    
                    <input type="hidden" name="amount" value="<?php echo number_format((float)$totalcartprice, 2, '.', '') * 100; ?>">
                    <input type="hidden" name="product_name" value="Calorice - Order#<?php echo $orderCount?>">

                    <hr class="my-4">
                    <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_51JC3VwF77heEa3oFtz0HzRPEOVUxvY1thI3QJlIi4QY4DLd6U7NiwR3DMJZlNqjTLg9iVamxN9AvcheBkGJ3WzJX00PnoxuKvI"
                    data-amount=<?php echo number_format((float)$totalcartprice, 2, '.', '') * 100; ?>
                    data-name="Calorice"
                    data-currency="sgd"
                    data-locale="auto">
                    </script>

                    <!-- <button class="w-100 btn btn-primary btn-lg checkout"  >Continue to checkout</button> -->
                    </form>
                    
                </div>
                </div>
            </div>



</div>



    <!-- footer -->
    <footer class="footer section bd-container">
            <div class="footer_container bd-grid">
                <div class="footer_content">
                    <a href="index.php" class="footer_logo">CALORICE</a>
                    
                    <div>
                        <a href="" class="footer_social"><i class='bx bxl-facebook' ></i></a>
                        <a href="" class="footer_social"><i class='bx bxl-instagram' ></i></a>
                        <a href="" class="footer_social"><i class='bx bxl-twitter' ></i></a>
                        

                    </div> 
                </div>
            </div>
        </footer>
        


    <!-- main js here -->
        <script src="js/main.js"></script>
    <!-- bootstrap jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
        <?php
        if($_GET['logoutSuccess'] == 1){
            echo 'swal("Logged Out.", "You have logged out successfully.", "success");';
        }
        ?>
        </script>
</body>
</html>