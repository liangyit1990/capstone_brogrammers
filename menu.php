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

    <!-- anselm -->
    <div class="container">
        <div class="row">
            <span class="text-center">Our Full Menu</span>
            <div class="col-4">
                <img src="images/ebifrybento.png" alt="" class="menu_img">
                <h3 class="menu_name">Ebi Fry Bento</h3>
                <span class="menu_price">SGD 6</span>
                <span class="menu_calorie">510 Cal</span>
                <a class="button menu_button add-cart cart1"><i class='bx bxs-cart-download' ><span class="addandbase"> Add</span></i></a>
            </div>
        </div>

        <div class="row">
            <h1 class="text-center">Bento</h1>
        </div>
        <div class="row">
            <h1 class="text-center">Drinks</h1>
        </div>
        <div class="row">
            <h1 class="text-center">Gravy</h1>
        </div>

    </div>


    <!-- <main class="l-main">
        
        <section class="menu section bd-container" id="menu">
            <h1>Menu</h1>
            <div class="menu_container bd-grid">
                <div class="menu_content">
                    <img src="images/ebifrybento.png" alt="" class="menu_img">
                    <h3 class="menu_name">Ebi Fry Bento</h3>
                    <span class="menu_price">SGD 6</span>
                    <span class="menu_calorie">510 Cal</span>
                    <a class="button menu_button add-cart cart1"><i class='bx bxs-cart-download' ><span class="addandbase"> Add</span></i></a>
                </div>
                <div class="menu_content">
                    <img src="images/chickenkaraagebento.png" alt="" class="menu_img">
                    <h3 class="menu_name">Karaage Bento</h3>
                    <span class="menu_price">SGD 6</span>
                    <span class="menu_calorie">530 Cal</span>
                    <a class="button menu_button add-cart cart2"><i class='bx bxs-cart-download' ><span class="addandbase"> Add</i></a>
                </div>
                
                
            </div>
        </section>


    </main> -->

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