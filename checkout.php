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
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- css here -->
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <title><?php echo SITE_NAME; ?></title>
</head>
<body>
    <!-- scroll to top -->
    <a href="#" class="scrolltop " id="scroll-top">
        <i class='bx bx-chevron-up-circle scrolltop_icon' ></i>
    </a>

    <!-- header -->
    <?php 
    include "header.php";
    ?>


    <main class="l-main">
        
        <!-- Menu -->
        
        <button type="button" onclick="goback()" class="back">Go Back</button> 
        <div class="row">
            <div class="col-md-6">
                <div class="form-container">
                    <form autocomplete="off" action="checkout-charge.php" method="POST">
                        <div>
                            <input type="text" name="c_name" required/>
                            <label>Customer Name</label>
                        </div>
                        <div>
                            <input type="text" name="address" required/>
                            <label>Address</label>
                        </div>
                        <div>
                            <input type="number" id="ph" name="phone" pattern="\d{10}" maxlength="10" required/>
                            <label>Contact number</label>
                        </div>
                        <div>
                            <input type="text"  name="product_name" value="<?php echo $_GET["item_name"]?>" disabled required/>
                            <label>Product name</label>
                        </div>
                        <div>
                            <input type="text"  name="price" value="<?php echo $_GET["price"]?>" disabled required/>
                            <label>Price</label>
                        </div>
                    
                            <input type="hidden" name="amount" value="<?php echo $_GET["price"]?>">
                            <input type="hidden" name="product_name" value="<?php echo $_GET["item_name"]?>">
                        
                        <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_51JC3VwF77heEa3oFtz0HzRPEOVUxvY1thI3QJlIi4QY4DLd6U7NiwR3DMJZlNqjTLg9iVamxN9AvcheBkGJ3WzJX00PnoxuKvI"
                        data-amount=<?php echo str_replace(",","",$_GET["price"]) * 100?>
                        data-name="<?php echo $_GET["item_name"]?>"
                        data-description="<?php echo $_GET["item_name"]?>"
                        data-image="<?php echo $_GET["image"]?>"
                        data-currency="inr"
                        data-locale="auto">
                        </script>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-container">
                    <h4>Product Name&nbsp;:&nbsp;<?php echo $_GET["item_name"]?></h4>
                    <img src="<?php echo $_GET["image"]?>"/>
                    <span>Price &nbsp;:&nbsp;<?php  echo $_GET["price"]?></span>
                </div>
            </div>
        </div> 
            


    </main>

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
    function goback(){
        window.history.go(-1);
    }
    
    </script>

</body>
</html>