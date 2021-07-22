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

    <!-- anselm -->
    <div class="panline">   
            <img class="pan filter-green" src="images/pan.svg">
    </div>
    
    <div class="container">

        <div class="row">
            <h1 class="text-center">Customised Menu</h1>

        </div>
        
        <div class="row bentodiv">
            <h1 class="text-center">Bento</h1>
            <p class="text-center">
                <!-- Description: Our Bentos are... -->
            </p>
            <!-- <div class="searchmenu">
                <div class="sortbyoptions">
                    <b>Show Only:</b>
                    <select class="bentooptionsbox">
                        <option><span>-</span></option>
                        <option>Chicken</option>
                        <option>Seafood</option>
                        <option>Others</option>
                    </select>
                    <b>Sort By:</b>
                    <select class="drinkssort">
                        <option><span class="text-center">-</span></option>
                        <option class="bentoh2l" value="bentoh2l">Price: High to Low</option>
                        <option class="bentol2h" value="bentol2h">Price: Low to High</option>
                        <option class="bentoalph" value="bentoalph">Alphabetically</option>
                    </select>
                </div>
            </div> -->

            <?php
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
        
        <div class="panline">   
            <img class="drinks filter-green" src="images/drinks.svg">
        </div>
        <div class="row drinksdiv">
            <h1 class="text-center">Drinks</h1>
            <p class="text-center">
                <!-- Description -->
            </p>

            <!-- <div class="searchmenu">
                <div class="sortbyoptions">
                    <b>Show Only:</b>
                    <select class="drinksoptionsbox">
                        <option><span>-</span></option>
                        <option>Chicken</option>
                        <option>Seafood</option>
                        <option>Others</option>
                    </select>
                    <b>Sort By:</b>
                    <select class="drinkssort">
                        <option><span class="text-center">-</span></option>
                        <option class="drinksh2l" value="drinksh2l">Price: High to Low</option>
                        <option class="drinksl2h" value="drinksl2h">Price: Low to High</option>
                        <option class="drinksalph" value="drinksalph">Alphabetically</option>
                    </select>
                </div>
            </div> -->

            <?php
                

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

        <div class="panline">   
            <img class="gravy filter-green" src="images/sauce.svg">
        </div>

        <div class="row gravydiv" id="gravydiv">
            <h1 class="text-center">Gravy</h1>
            <p class="text-center">
            </p>
            <!-- <div class="searchmenu">
                <div class="sortbyoptions">
                    <b>Sort By:</b>
                    <select class="gravySort" id="gravySort" onchange="gravySort();">
                        <option><span class="text-center">-</span></option>
                        <option class="gravyh2l" value="gravyh2l">Price: High to Low</option>
                        <option class="gravyl2h" value="gravyl2h">Price: Low to High</option>
                        <option class="gravyalph" value="gravyalph">Alphabetically</option>
                    </select>
                </div>
            </div> -->


            <?php

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
                    // swal("Error", "Please login/register an account to start adding to cart", "error")
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