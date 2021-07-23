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

$address = DB::query('SELECT * FROM addresses WHERE users_id=%i AND addresses_default = 1', $_COOKIE['users_id']);
foreach($address as $address_result) {
    $defaultfullName = $address_result['addresses_fullName'];
    $defaultline1 = $address_result['addresses_line1'];
    $defaultline2 = $address_result['addresses_line2'];
    $defaultunitNo = $address_result['addresses_unitNo'];
    $defaultcountry = $address_result['addresses_country'];
    $defaultzipCode = $address_result['addresses_zipCode'];
    // $defaultId = $address_result['addresses_default'];
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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/checkout.css">
 
    <title><?php echo SITE_NAME; ?></title>
</head>


<body>
    <!-- scroll to top -->
    <a href="#" class="scrolltop " id="scroll-top">
        <i class='bx bx-chevron-up-circle scrolltop_icon' ></i>
    </a>

    <!-- header -->
    <?php 
    // include "header.php";
    ?>

    
        <div class="container">
            <div>
                <div class="py-5 ">
                
                <h2>Checkout form</h2><br>

                <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-pill cartItemNo"><?php echo $totalCartItem ?></span>
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
                    <button type="button" class="btn btn-primary btn-sm clearCart" id="clearCart" data-id="<?php echo $_COOKIE["users_id"] ?>" wait >Clear Cart</button>
                    <a href="<?php echo SITE_URL; ?>"><button type="button" class="btn btn-primary btn-sm backtohome" id="backtohome" value="backtohome" data-id="" data-bs-toggle="modal" data-bs-target="" >Back to Home</button></a>
                    <a href="<?php echo SITE_URL . "menu.php" ?>"><button type="button" class="btn btn-primary btn-sm backtomenu" id="backtomenu" value="backtomenu" data-id="" data-bs-toggle="modal" data-bs-target="" >Back to Menu</button></a>
                    <br>
                    <br>
                    <h4 class="d-flex"><span class="text-primary">Your addresses</span></h4>
                    <?php 
                        $addressCheckOut = DB::query("SELECT * FROM addresses WHERE users_id=%i " , $_COOKIE['users_id']);
                        foreach($addressCheckOut as $addressCheckOut_result){
                            if($addressCheckOut_result['addresses_default']==1){
                                echo '
                                <div class="row checkoutaddressbox"><div class="col-12"><p>
                                ' . $addressCheckOut_result['addresses_fullName'] . '</p></div><div class="col-12"><p>
                                ' . $addressCheckOut_result['addresses_line1'] . '</p></div><div class="col-12"><p>
                                ' . $addressCheckOut_result['addresses_line2'] . '</p></div><div class="col-12"><p>
                                ' . $addressCheckOut_result['addresses_unitNo'] . '</p></div><div class="row"><div class="col-7"><p>
                                ' . $addressCheckOut_result['addresses_country'] . " " . $addressCheckOut_result['addresses_zipCode'] . '</p></div><div class="col-5">
                                <button type="button" class="btn btn-primary btn-sm usethisaddress" id="usethisaddress" value="usethisaddress" disabled>Default Address</button>

                                </div></div></div><hr>';
                            } else {
                                echo '
                                <div class="row checkoutaddressbox"><div class="col-12"><p>
                                ' . $addressCheckOut_result['addresses_fullName'] . '</p></div><div class="col-12"><p>
                                ' . $addressCheckOut_result['addresses_line1'] . '</p></div><div class="col-12"><p>
                                ' . $addressCheckOut_result['addresses_line2'] . '</p></div><div class="col-12"><p>
                                ' . $addressCheckOut_result['addresses_unitNo'] . '</p></div><div class="row"><div class="col-7"><p>
                                ' . $addressCheckOut_result['addresses_country'] . " " . $addressCheckOut_result['addresses_zipCode'] . '</p></div><div class="col-5">
                                <button type="button" class="btn btn-primary btn-sm usethisaddress" id="usethisaddress" value="usethisaddress" data-id="
                                ' .  $addressCheckOut_result['addresses_id'] . '" data-line1="' . $addressCheckOut_result['addresses_line1'] . '" data-line2="' . $addressCheckOut_result['addresses_line2'] . '" data-unitNo="' . $addressCheckOut_result['addresses_unitNo'] . '" data-country="' . $addressCheckOut_result['addresses_country'] . '" data-zipCode="' . $addressCheckOut_result['addresses_zipCode'] . '">Use This Address</button></div></div></div>';

                            }

                        }
                
                    ?>
                    <!-- <div>
                        <h5>Address</h5>
                    </div>
                    <div>
                        <h5>Address</h5>
                    </div> -->

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
                        <input type="text" class="form-control fullname" id="firstName" name="firstName"  value="<?php echo ucwords($defaultfullName); ?>" required>
                        <div class="invalid-feedback">
                            Name is required.
                        </div>
                        </div>

                        <div class="col-12">
                        <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email">
                        <!-- placeholder="you@example.com" -->

                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                        </div>

                        <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control address" id="address" name="address"  value="<?php echo ucwords($defaultline1); ?>" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                        </div>

                        <div class="col-12">
                        <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" name="address2"  value="<?php echo ucwords($defaultline2); ?>">
                        </div>
                        
                        <div class="col-md-4">
                        <label for="unitNo" class="form-label">Unit Number</label>
                        <input type="text" class="form-control unitno" id="unitNo" name="unitNo"  value="<?php echo ucwords($defaultunitNo); ?>" required="">
                        <div class="invalid-feedback">
                            Please enter your unit number.
                        </div>
                        </div>


                        <div class="col-md-5">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control country" id="country" name="country" placeholder="" value="<?php echo ucwords($defaultcountry); ?>">

                        <!-- <select class="form-select" id="country" required="" value="">
                            <option value="">Choose...</option>
                            <option>Singapore</option>
                        </select> -->
                        <!-- <div class="invalid-feedback">
                            Please select a valid country.
                        </div> -->
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
                        <label for="zip" class="form-label">Zip Code</label>
                        <input type="text" class="form-control zipcode" id="zip" name="zip" placeholder="" value="<?php echo ucwords($defaultzipCode); ?>" required="">
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                        </div>
                    </div>
                    <?php 
                    $getOrderQuery = DB::query("SELECT * FROM orders");
                    $getOrderCount = DB::count();
                    if($getOrderCount > 0) {
                        foreach($getOrderQuery as $getOrderResult ) {
                            $orderCount = $getOrderResult["orders_id"];
                        }
                    
                    } else {
                        $orderCount = 1;
                    }
                    ?>
                    
                    <input type="hidden" name="amount" value="<?php echo number_format((float)$totalcartprice, 2, '.', '') * 100; ?>">
                    <input type="hidden" name="product_name" value="Calorice - Order#<?php echo $orderCount?>">
                    

                    <hr class="my-4">

                    <script
                    
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button" id="stripe-button"
                    data-key="pk_test_51JC3VwF77heEa3oFtz0HzRPEOVUxvY1thI3QJlIi4QY4DLd6U7NiwR3DMJZlNqjTLg9iVamxN9AvcheBkGJ3WzJX00PnoxuKvI"
                    data-amount=<?php echo number_format((float)$totalcartprice, 2, '.', '') * 100; ?>
                    data-name="C A L O R I C E"
                    data-currency="sgd"
                    data-locale="auto">
                    </script>

                    <!-- <button class="w-100 btn btn-primary btn-lg checkout"  >Continue to checkout</button> -->
                    </form>
                    
                </div>
                </div>
            </div>



</div>    
    <!-- bootstrap jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- main js here -->
    <script src="js/main.js"></script>
        <script>
        <?php
        if($_GET['logoutSuccess'] == 1){
            echo 'swal("Logged Out.", "You have logged out successfully.", "success");';
        }
        ?>

        $("input[type='text'],input[type='email'] ").change( function() {
        if($(".fullname").val() == 0 || $(".address").val() == 0 || $(".address").val() == 0 || $(".unitno").val() == 0 || $(".country").val() == 0 || $(".zipcode").val() == 0    ) {
            document.getElementsByClassName("stripe-button-el")[0].disabled=true;
            swal({
                    title: "Alert!",
                    text: "Please fill up all the required sections",
                    icon: "error",
                    buttons: false,
                    timer: 3000,
                    });
        } else {
            document.getElementsByClassName("stripe-button-el")[0].disabled=false;
        }
                });
        
        
      

        $(".clearCart").click(function(){
            if($(".cartItemNo").text() == 0){
                swal("Cart is already empty!", {
                    buttons: false,
                    timer: 2000,
                });

                } else {
                var deleteCartUserId = $(this).data('id');
                

                swal({
                    title: `Are you sure you want to empty cart?`,
                    text: "Once emptied, all your cart items will be removed",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })

                    .then((willDelete) => {
                    //Proceed to delete if user press okay, else do nothing
                        if (willDelete) {
                            swal("Poof! Cart has been emptied!", {
                            icon: "success",
                            });
                            $.ajax({
                            url: 'deletecart.php', //action
                            method: 'POST', //method
                            data:{
                                deleteCartUserId:deleteCartUserId
                            },
                            success:function(data){
                                console.log(data);
                                if(data == 1){
                                    $(".cartItemNo").text("0");
                                    $(".list-group-item").remove();
                                    setTimeout(function(){
                                            window.location.href = 'index.php';
                                         }, 2000);
                                } else {
                                    alert(data);
                            }
                        }
                    });
                        } 
                        });
                }
    

        })

        $(".usethisaddress").click(function(){
            var usethisaddress = this;
            var useId = $(this).data('id');
            var address = $(this).data('line1');
            var address2 = $(this).data('line2');

            var unitNo = $(this).data('unitno');

            var country = $(this).data('country');
            var zip = $(this).data('zipCode');
            swal({
            title: `Are you sure you want to use this address?`,
            buttons: true,
            dangerMode: true,
            })
            .then((use) => {
            if (use) {
                console.log(unitNo);
                console.log(country);
                // $('#firstName').val();
                $('#address').val(address);
                $('#address2').val(address2);
                $('#unitNo').val(unitNo);
                $('#country').val(country);
                $('#zip').val(zipCode);
                
            } 
    

        })

        // $("#stripe-button").click(function(){
        //     console.log("stripe");
        // })
    })



        </script>
</body>
</html>