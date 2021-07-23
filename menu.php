<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

isAdmin();

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
    <link rel="stylesheet" href="css/menu.css">
    
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
    
    <div class="container">

        <div class="row">
            <h1 class="text-center">Customised Menu</h1>

        </div>
        
        <menu>
        <div class="contain">
            
            <main>
                <div class="card">
                    <img src="images/ricebox.jpeg" alt="">
                    <div class="blogcontent">
                        <h3><strong>Bento</strong></h3>
                        <p>< <a href="#">510 Cal</a></p>
                        <a href="#bento" class="btn-click">Click here</a>
                    </div>
                </div>
                <div class="card">
                    <img src="images/drinks.jpeg" alt="">
                    <div class="blogcontent">
                        <h3><strong>Drinks<strong></h3>
                        <p>< <a href="">80 Cal</a></p>
                        <a href="#drinks" class="btn-click">Click here</a>
                    </div>
                </div>
                <div class="card">
                    <img src="images/gravy.jpeg" alt="">
                    <div class="blogcontent">
                        <h3><strong>Gravy<strong></h3><br>
                        
                        <a href="#gravy" class="btn-click">Click here</a>
                    </div>
                </div>
            </main>
        </div>
        </menu>
        
        <div class="row bentodiv" id="bento">
            <h1 class="text-center">Bento</h1>
            <p class="text-center">
                <!-- Description: Our Bentos are... -->
            </p>
          

            <?php
                //Populate Bento from DB
                $bento = DB::query('SELECT * FROM food WHERE food_category = "Bento"');
                foreach($bento as $bento_result){
                    echo '<div class="col-lg-4 col-sm-6 menubox"><div class="row"><p class="text-center"><img src=" ';
                    echo SITE_URL . "admin/" . $bento_result['food_img'];
                    echo '" alt="" class="menu_img"></p></div><div class="row namerow"><h4 class="text-center">';
                    echo ucwords($bento_result['food_name']);
                    echo '</h4></div><div class="row pricerow"><span class="text-center">';
                    echo "SGD" . $bento_result['food_price'];
                    echo '</span></div><div class="row caloriesrow"><span class="text-center">';
                    echo $bento_result['food_calories'] . "Cal";
                    echo '</span></div><div class="row addbuttonrow"><a class="addbutton text-center" data-id="'.$bento_result['food_id'].'" ><i class="bx bxs-cart-download buy_now"></i>Add</a></div></div>
                    ';
                    
                }
            ?>    
        </div>
        
        
        <div class="row drinksdiv" id="drinks">
            <h1 class="text-center" >Drinks</h1>
            <p class="text-center">
                <!-- Description -->
            </p>


            <?php
                
                //Populate drinks from DB
                $drinks = DB::query('SELECT * FROM food WHERE food_subcategory = "drinks"');
                foreach($drinks as $drinks_result){
                    echo '<div class="col-lg-4 col-sm-6 menubox"><div class="row"><p class="text-center"><img src=" ';
                    echo SITE_URL . "admin/" . $drinks_result['food_img'];
                    echo '" alt="" class="menu_img"></p></div><div class="row namerow"><h4 class="text-center">';
                    echo ucwords($drinks_result['food_name']);
                    echo '</h4></div><div class="row pricerow"><span class="text-center">';
                    echo "SGD" . $drinks_result['food_price'];
                    echo '</span></div><div class="row caloriesrow"><span class="text-center">';
                    echo $drinks_result['food_calories'] . "Cal";
                    echo '</span></div><div class="row addbuttonrow"><a class="addbutton text-center" data-id="'.$drinks_result['food_id'].'"><i class="bx bxs-cart-download"></i>Add</a></div></div>
                    ';
                }
            ?>

        </div>

 

        <div class="row gravydiv" id="gravy">
            <h1 class="text-center">Gravy</h1>
            <p class="text-center">
            </p>
    


            <?php
                //Populate gravy from DB
                $gravy = DB::query('SELECT * FROM food WHERE food_subcategory = "gravy"');
                foreach($gravy as $gravy_result){
                    echo '<div class="col-lg-4 col-sm-6 menubox"><div class="row"><p class="text-center"><img src=" ';
                    echo SITE_URL . "admin/" . $gravy_result['food_img'];
                    echo '" alt="" class="menu_img"></p></div><div class="row namerow"><h4 class="text-center">';
                    echo ucwords($gravy_result['food_name']);
                    echo '</h4></div><div class="row pricerow"><span class="text-center">';
                    echo "SGD" . $gravy_result['food_price'];
                    echo '</span></div><div class="row caloriesrow"><span class="text-center">';
                    echo $gravy_result['food_calories'] . "Cal";
                    echo '</span></div><div class="row addbuttonrow"><a class="addbutton text-center" data-id="'.$gravy_result['food_id'].'"><i class="bx bxs-cart-download"></i>Add</a></div></div>
                    ';
                }
            ?>

        </div><hr>

    </div>


    

    <!-- footer -->
    <?php 
    include "footer.php";
    
    ?>
    



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


    //Add to cart on click via AJAX
    $('.addbutton').click(function(){
        var addFoodId = $(this).data('id');
        
        $.ajax({
            url: 'cart.php', //action
            method: 'POST', //method
            data:{
            addFoodId:addFoodId,
          
            },
            success:function(data){
                
                if(data==1 || data == 2){
                    swal({
                        title: "Hurray!",
                        text: "Item added Successfully",
                        icon: "success",
                        buttons: false,
                        timer : 1500,
                        })
                        cartCount = parseInt($(".count").text()) + 1;
                        $(".count").text(cartCount);
                        $(".cartLink").attr("href", "checkout.php");
                       
                        
                 }  else if(data == 3) {
                    
                    swal({
                            title: "Error",
                            text: "Please login/register an account to start adding to cart",
                            icon: "error",
                            buttons: false,
                            timer : 2000,
                            }).then(function() {
                            window.location = "login.php";
                            });  
                 }
                        
            }
            });   



    });




</script>

<!-- <script>
    
</script> -->

</body>
</html>