<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 



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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- css here -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/account.css">
    
    <title><?php echo SITE_NAME; ?></title>
</head>

<body>
    <!-- scroll to top -->
    <a href="#" class="scrolltop " id="scroll-top">
        <i class='bx bx-chevron-up-circle scrolltop_icon' ></i>
    </a>

        <div class="container accountcontainer viewer" id="viewer">
            <div class="row justify-content-md-center">
                
                <div class="container col-xl-9 accountrightbody">

                    <!-- Start of Orders Row - WIP -->
                    <div class="row accrow ordersplacedrow accountpage" id="orders">
                        <div>
                            <h4 class="accheader">Orders Placed</h4>
                        </div>
                        <?php 
                        $getUserOrderQuery = DB::query("SELECT * FROM orders WHERE users_id=%i",$_COOKIE['users_id']);
                        foreach ($getUserOrderQuery as $getUserOrderResult) {
                            $getUserOrderDetails = DB::query("SELECT * FROM orderdetails 
                                                                INNER JOIN food 
                                                                ON orderdetails.food_id = food.food_id
                                                                where users_id=%i AND orders_id=%i"  , $_COOKIE['users_id'],$getUserOrderResult['orders_id']);
                        ?>
                        <div>
                            <div class="date-container">
                                <div class="date-order">
                                    <div class="date-header">
                                        <h5><?php echo displayDate($getUserOrderResult['orders_timestamp']) . ", " . displayTime($getUserOrderResult['orders_timestamp']) ?></h5>
                                    
                                    </div>
                                    <div class="order-id">
                                        <h6>Order ID: <?php echo $getUserOrderResult['orders_id'] ?></h6> 
                                    </div>
                                </div>
                                <div class="order-stat">
                                    <h6><strong>Order details:</strong></h6><br>
                        <?php 
                        foreach($getUserOrderDetails as $getUserOrderDetailsResult ) {
                        
                        ?>
                        <p><?php echo ucwords($getUserOrderDetailsResult['food_name']).' x '.$getUserOrderDetailsResult['orderdetails_qty']?></p><br>

                        <?php 
                        }
                        ?>
                                </div>
                                <div class="order-total">
                                    <h6><strong>Total Price: $<?php echo $getUserOrderResult['orders_totalprice'] ?></strong></h6> 
                                </div>
                                
                            </div>
                        </div>


                        <?php
                        }
                        
                        ?>
                        
                    </div>


            </div>
        </div>


    

    <!-- footer -->
    <!-- <footer class="footer section bd-container">
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
    </footer> -->
    


    <!-- bootstrap jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- main js here -->
        <script src="js/main.js"></script>
        
        


</body>
</html>