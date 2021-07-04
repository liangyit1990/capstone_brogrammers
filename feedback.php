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
     <!-- icons here -->
     <link rel="icon" href="images/logo.png">

     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- css here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/feedback.css">
    <!-- <link rel="stylesheet" href="css/feedback.css"> -->
    <title><?php echo SITE_NAME; ?>- Feedbacks</title>
</head>
<body>

<!--Nav Bar -->
<header class="l-header " id="header">
        <nav class="nav bd-container">
            <a href="index.php" class="logo"><img src="images/logo.png" alt=""></a>
            <a href="<?php echo htmlspecialchars(SITE_URL); ?>" class="nav_logo"><h2><strong>C A L O R I C E</strong></h2></a>

            <div class="nav_menu" id="nav-menu">
                <ul class="nav_list">
                    <li class="nav-item"><a href="#home" class="nav_link active-link">Home</a></li>
                    <li class="nav-item"><a href="#menu" class="nav_link">Menu</a></li>
                    <li class="nav-item"><a href="#about" class="nav_link">About</a></li>
                    <li class="nav-item"><a href="<?php echo htmlspecialchars(SITE_URL . "feedback.php"); ?>" class="nav_link">Contact Us</a></li>
                    <!-- <li class="nav-item"><a class="nav_link" data-bs-toggle="modal" data-bs-target="#register">Login/Register</a></li> -->
                    <?php
                    loginAccountLogout();
                    ?>

                </ul>
            </div>
            

            <div class="nav_toggle" id="nav-toggle">
                <i class='bx bx-cart'></i>
                <i class='bx bxs-food-menu' ></i>
                
            </div>
        </nav>
</header>

<!--Form -->
    <div class="contact-in">
        
        <div class="contact-form">
            <h2>Contact Us</h2>
            <form>
                <input placeholder="Name" type="text" class="contact-form-txt"/>
                <input placeholder="Email" type="email" class="contact-form-txt"/>
                <textarea placeholder="Message" class="contact-form-textarea"></textarea>
                <span>Upload Document</span><input type="file" name="fileToUpload" class="form-control img" >
                <button type="submit" name="feedback" class="contact-form-btn">Submit</button>
            </form>

        <div class="contact-map">
            <div class= "map-responsive">
                <a href="https://www.embedgooglemap.net" class="location"></a><br>
                <iframe  id="gmap_canvas" src="https://maps.google.com/maps?q=paya%20lebar%20square&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:204px;width:566px;}</style>
                <style>.gmap_canvas {overflow:hidden;background:none!important;height:204px;width:566px;}</style>
            </div>
        
        </div>
        <!-- Shop Details like address & opening hours -->            
        <div class = "row">
            <h3 class="mt-3"><u>Pickup Address</u></h3>         
            <p>Paya Lebar Square Mall, L2-130</p>
    
            <h3 class="mt-3"><u>Ordering Hours</u></h3>         
            <p>Monday - Sunday  </p> 
            <p>11am - 9pm  </p> 
        </div>          
    </div>


<!-- footer -->
<footer class="footer section bd-container">
        <div class="footer_container bd-grid">
            <div class="footer_content">
                <a href="" class="footer_logo">CALORICE</a>
                
                <div>
                    <a href="" class="footer_social"><i class='bx bxl-facebook' ></i></a>
                    <a href="" class="footer_social"><i class='bx bxl-instagram' ></i></a>
                    <a href="" class="footer_social"><i class='bx bxl-twitter' ></i></a>
                    

                </div> 
            </div>
        </div>
</footer>

<!-- scroll reveal here -->
<script src="https://unpkg.com/scrollreveal"></script>   

<!-- main js here -->
    <script src="js/main.js"></script>
</body>
</html>

