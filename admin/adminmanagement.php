<?php 
include "../config/config.php";
include "../config/db.php";
include "../config/functions.php"; 

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Admin | CALORICE </title>
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="icon" href="../images/logo.png">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--Bootstrap Latest compiled and minified CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
   </head>
<body>
  <!-- Include adminheader -->
  <?php 
  include "adminheader.php";
  ?>

  <main class="home_content">
    
    <h1><strong>Welcome Admin</strong></h1>
    
    <div class="container">
      <div class="users">
        <h2>No. of Registered Users:</h2> 
          <div class="result">
            <h3>
              <?php 
              $noofRegUsers = DB::query('SELECT * FROM users WHERE users_permission = 0');
              $noofRegUsersCount = DB::count();
              echo $noofRegUsersCount;

              ?>
            </h3>
          </div>
      </div>
      <div class="food">
        <h2>Top 5 Most Popular Food:</h2>
          <div class="result">
            <h3>1. Bento</h3>
            <h3>2. Bento</h3>
            <h3>3. Bento</h3>
            <h3>4. Bento</h3>
            <h3>5. Bento</h3>
          </div>
      </div>
      <div class="orders">
        <h2>New Orders Today:</h2>
          <div class="result">
            <h3>50</h3>
          </div>
      </div>
      <div class="totalsales">
        <h2>Total Sales:</h2>
          <div class="result">
            <h3>200 SGD</h3>
          </div>
      </div>
      <div class="dailysales">
        <h2>Today sales:</h2>
          <div class="result">
            <h3>100 SGD</h3>
          </div>
      </div>
    </div>
  </main>

  


 


<!-- bootstrap jquery -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(document).ready(function(){

    $("#btn").click(function(){
    $(".sidebar").toggleClass("active");
    })
  });

</script>

  <!-- <script>
   let btn = document.querySelector("#btn");
   let sidebar = document.querySelector(".sidebar");
   let searchBtn = document.querySelector(".bx-search");

   btn.onclick = function() {
     sidebar.classList.toggle("active");
   }
   searchBtn.onclick = function() {
     sidebar.classList.toggle("active");
   }

  </script> -->

</body>
</html>