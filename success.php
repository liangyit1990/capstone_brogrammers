<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

if(isset($_COOKIE["isLoggedIn"]) && (isset($_COOKIE['users_id']))) {

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Completed!</title>
    <link rel="icon" href="images/logo.png">
    <!-- scroll reveal here
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script> -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- icons here -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- css here -->
    <link rel="stylesheet" href="css/success.css">
</head>
<body>
      <section class="success-container">
        <?php
           if(isset($_GET["amount"]) && !empty($_GET["amount"])){
               ?>
            <h3>Your Transaction has been Successfully Completed</h3>
          <?php
          header("refresh:5;url=" . SITE_URL);
           } else {
            header("Location: " . SITE_URL);
           }
        ?>
        <p class="redirectpara">You will be redirected to the main page in 5 seconds, if not you can click <a href="<?php echo SITE_URL ?>">here</a> to return to the main page.</p>
      </section>  
</body>
</html>