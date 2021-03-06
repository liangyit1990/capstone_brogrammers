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


    <main class="l-main">
        <!-- Home -->
        <section class="home" id="home">
            <div class="home_container bd-container bd-grid">
                <div class="home_data">
                    <!-- <h1 class="home_title"></h1> -->
                    <h1 class="calorice"><span>C A L O </span><span>R I C E</span></h1>
                    <!-- <img class="rotate_01" src="images/donut-icon.png"> -->
                    <!-- <img src="images/watermelon.png" class="rotate_01"> -->
                    <img src="images/food bowl.png" class="rotate_01">
                    <h2 class="home_subtitle">Control your calories intake</h2>
                    <a href='#menu'class="button">VIEW MENU</a>
                    
                </div>
                <img class="img-home" src="images/bento_home.png" alt="" class="home_img">
                
            </div>
        <div class="line">   
            
                <img class="sunny filter-green" src="images/sun2.svg">
                <img class="moon filter-moon" src="images/moonny.svg">
                
            
        </div>

        </section>
        <!-- Menu -->
        <div class="modal fade" id="ricecart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 class="modal-title" id="exampleModalLabel">
                                Base - Rice
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-image">
                                <thead>
                                    <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Ingredient</th>
                                    <th scope="col">Cal</th>
                                    <th scope="col">Price(SGD)</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Total Calories</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                
                                $getRiceQuery = DB::query("SELECT * FROM food WHERE food_name=%s","rice");
                                foreach($getRiceQuery as $getRiceResult){ 
                                    $rice_id = $getRiceResult['food_id'];
                                    $rice_name = $getRiceResult['food_name'];
                                    $rice_price = $getRiceResult['food_price'];
                                    $rice_calories = $getRiceResult['food_calories'];
                                    $rice_img = $getRiceResult['food_img'];
                                
                                }
                                ?>
                                <!--Display rice information -->
                                <tr>
                                    <td class="modal_menu">
                                        <img src="admin/<?php echo $rice_img; ?>" class="img-fluid img-thumbnail" alt="">
                                    </td>
                                    <td class="riceid" style="display:none;"><?php echo $rice_id; ?></td>
                                    <td><?php echo ucwords($rice_name); ?></td>
                                    <td class="ricecalories"><?php echo $rice_calories; ?></td>
                                    <td class="riceprice"><?php echo $rice_price; ?></td>
                                    <td class="qty"><input type="number" class="form-control testinput" id="input1" min="1" value="1" disabled></td>
                                    <td><?php echo $rice_calories; ?></td>
                                    
                                </tr>

                                <?php 
                                $count=0;
                                $getFoodQuery = DB::query("SELECT * FROM food WHERE food_category=%s AND food_name!=%s AND food_subcategory!='drinks' AND food_name!='noodle'" ,"ala carte","rice",'noodle');
                                foreach($getFoodQuery as $getFoodResult){ 
                                
                                ?>
                                <tr>
                                    <td class="modal_menu">
                                        <img src="admin/<?php echo $getFoodResult['food_img']; ?>" class="img-fluid img-thumbnail" alt="">
                                    </td>
                                    <td class="id<?php echo $count; ?>" style="display:none;"><?php echo $getFoodResult['food_id']; ?></td>
                                    <td class="name<?php echo $count?>"><?php echo ucwords($getFoodResult['food_name']); ?></td>
                                    <td class="calories<?php echo $count?>"><?php echo $getFoodResult['food_calories']; ?></td>
                                    <td class="price<?php echo $count?>"><?php echo $getFoodResult['food_price']; ?></td>
                                    <td><input type="number" class="form-control inputqty ricebaseqty<?php echo $count?>" id="input1 ricebaseqty<?php echo $count?>" min="0" value="0" oninput="validity.valid||(value='');" ></td>
                                    <td class="subcalories<?php echo $count?> ">-</td>
                                   
                                    
                                    
                                </tr>

                                <?php 
                                 $count++;
                                }
                                ?>
                                
                                
                                    
                                
                                </tbody>
                                </table> 
                                <div class="d-flex justify-content-end">
                                <h5>Total Price: $<span class="riceTotalPrice text-success"><?php echo $rice_price ?></span></h5><br>
                                </div>
                                 <div class="d-flex justify-content-end">
                                <h5>Total Calories: <span class="riceTotalCalories text-success"><?php echo $rice_calories ?></span></h5>
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success riceAddCart" value="riceAddCart">Add to Cart</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="noodlecart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 class="modal-title" id="exampleModalLabel">
                                Ingredients
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-image">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Ingredient</th>
                                        <th scope="col">Cal</th>
                                        <th scope="col">Price(SGD)</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total Calories</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    $getNoodleQuery = DB::query("SELECT * FROM food WHERE food_name=%s","noodle");
                                    foreach($getNoodleQuery as $getNoodleResult){ 
                                        $noodle_id = $getNoodleResult['food_id'];
                                        $noodle_name = $getNoodleResult['food_name'];
                                        $noodle_price = $getNoodleResult['food_price'];
                                        $noodle_calories = $getNoodleResult['food_calories'];
                                        $noodle_img = $getNoodleResult['food_img'];
                                    }
                                    ?>
                                    <!--Display rice information -->
                                    <tr>
                                    <td class="modal_menu">
                                        <img src="admin/<?php echo $noodle_img; ?>" class="img-fluid img-thumbnail" alt="">
                                    </td>
                                    <td class="noodleid" style="display:none;"><?php echo $noodle_id; ?></td>
                                    <td><?php echo ucwords($noodle_name); ?></td>
                                    <td class="noodlecalories"><?php echo $noodle_calories; ?></td>
                                    <td class="noodleprice"><?php echo $noodle_price; ?></td>
                                    <td class="qty"><input type="number" class="form-control testinput" id="input1" min="1" value="1" disabled></td>
                                    <td><?php echo $noodle_calories; ?></td>
                                    
                                    </tr>

                                    <?php 
                                    $noodlecount=0;
                                    $getNQuery = DB::query("SELECT * FROM food WHERE food_category=%s AND food_name!=%s AND food_name!=%s AND food_subcategory!='drinks'" ,"ala carte","rice",'noodle');
                                    foreach($getNQuery as $getNResult){ 
                                    
                                    
                                    ?>
                                    <tr>
                                    <td class="modal_menu">
                                        <img src="admin/<?php echo $getNResult['food_img']; ?>" class="img-fluid img-thumbnail" alt="">
                                    </td>
                                    <td class="nid<?php echo $noodlecount; ?>" style="display:none;" ><?php echo $getNResult['food_id']; ?></td>
                                    <td class="nname<?php echo $noodlecount?>"><?php echo ucwords($getNResult['food_name']); ?></td>
                                    <td class="ncalories<?php echo $noodlecount?>"><?php echo $getNResult['food_calories']; ?></td>
                                    <td class="nprice<?php echo $noodlecount?>"><?php echo $getNResult['food_price']; ?></td>
                                    <td><input type="number" class="form-control noodlebaseqty noodlebaseqty<?php echo $noodlecount?>" id="input1 noodlebaseqty<?php echo $noodlecount?>" min="0" value="0" oninput="validity.valid||(value='');" ></td>
                                    <td class="nsubcalories<?php echo $noodlecount?> ">-</td>
                                   
                                    
                                    
                                    </tr>

                                    <?php 
                                    $noodlecount++;
                                    }
                                    ?>
                                
                                    
                                </tbody>
                                </table> 
                                <div class="d-flex justify-content-end">
                                <h5>Total Price: $<span class="noodleTotalPrice text-success"><?php echo $noodle_price ?></span></h5><br>
                                </div>
                                <div class="d-flex justify-content-end">
                                <h5>Total Calories: <span class="noodleTotalCalories text-success"><?php echo $noodle_calories ?></span></h5>
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success noodleAddCart">Add to Cart</button>
                            </div>
                            </div>
                        </div>
                    </div>
        <section class="menu section bd-container" id="menu">
            <span class="section-title">Customise your meal</span>
            <span class="section-subtitle">Choose Your Base</span>
            <div class="menu_container bd-grid">
                <div class="menu_content">
                    <img src="images/bento_menu_rice2.png" alt="" class="menu_img">
                    <h3 class="menu_name"><strong>Rice</strong></h3>
                    <span class="menu_price"><strong>SGD 0.50</strong></span>
                    <span class="menu_calorie"><strong>130 Cal</strong></span>
                    <a class="button menu_button addbtn" data-bs-toggle="modal" data-bs-target="#ricecart"><i class='bx bxs-cart-download' ><span class="addandbase"> Base</span></i></a>
                    
                </div>
                <div class="menu_content">
                    <img src="images/bento_menu_noodles.png" alt="" class="menu_img">
                    <h3 class="menu_name"><strong>Noodle</strong></h3>
                    <span class="menu_price"><strong>SGD 0.50</strong></span>
                    <span class="menu_calorie"><strong>174 Cal</strong></span>
                    <a class="button menu_button" data-bs-toggle="modal" data-bs-target="#noodlecart"><i class='bx bxs-cart-download' ><span class="addandbase"> Base</span></i></a>
                    
                </div>
            </div>
            <span class="section-subtitle"><br>OR<br></span>
            <span class="section-title"><a href= "<?php echo htmlspecialchars(SITE_URL . "menu.php"); ?>">Let us customise for YOU<a></span>
            </div>
        </section>
        <!-- About us -->
        <section class="about section bd-container" id="about">
            <div class="line">   
                
                <img class="egg filter-moon" src="images/egg1.svg">
                <img class="egg1 filter-green" src="images/egg1.svg">
            
            </div>
            <div class="about_container bd-grid">
                <div class="about_data">
                    <span class="section-title">About Us</span>
                    <h2 class="section-subtitle">We are Food Enthusiasts</h2>
                    <p class="about_description">We hope that every person is able to control how much calorie they consume. We always 
                    talk about exercising<br> to live a healthy lifestyle. But what is actually a healthy lifestyle if we do not
                    plan our diet? With CALORICE, planning<br> your diet has never been easier and convenient.<br> </p>
                    <a href="menu.php" class="button">Explore our Full Menu</a>
                </div>
                <img src="images/bento_aboutus.png" alt="" class="home_img">
            </div>

        </section><hr>


    </main>

    <!-- footer -->
    <?php 
    include "footer.php";
    
    ?>
    
<!-- bootstrap jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
<!-- main js here -->
<script src="js/main.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    <?php
    if($_GET['logoutSuccess'] == 1){
        echo 'swal("Logged Out.", "You have logged out successfully.", "success");';
      }
    ?>

    //Reload page on closing of modal windows
    $('#ricecart, #noodlecart').on('hidden.bs.modal', function() {
    location.reload();
    })
    

    //Detect for any change in input value for ingredients
    $(".inputqty").change( function() {
        //Count the number of class with the name "input"
        var count = $('.inputqty').length;
        var i = 0;
        var total_calories = parseInt($(`.ricecalories`).text());
        var total_price = parseFloat($(`.riceprice`).text());
        //To loop through all the different row of items and retrieve the value, based on the count
        while(i<count) {
            //Get the individual price * number of quantity entered
            count_price = parseFloat($(`.price${i}`).text()) * parseInt($(`.ricebaseqty${i}`).val());
            //Get the individual calories * number of quantity entered
            count_calories = parseInt($(`.calories${i}`).text()) * parseInt($(`.ricebaseqty${i}`).val());
            
            if(count_calories == 0) {
                sub_calories = "-";
            } else {
                sub_calories = count_calories;
            }
            total_calories += count_calories;
            total_price += parseFloat(count_price);
            //Amend the html text to reflect latest subcategory values
            $(`.subcalories${i}`).text(sub_calories);
            
            
            
            i++;
        }
        // Change to reflect latest total calories and total price
        $(".riceTotalCalories").text(total_calories);
        $(".riceTotalPrice").text(total_price.toFixed(2));
       
        
    }); 

    //Detect if there is any change in the input in noodle base modal form
    $(".noodlebaseqty").change(function(){
        //Count how many input with the class name "noodleabaseqty"
       var count = $(".noodlebaseqty").length;
       var x = 0;
       //Convert html data into numerical figures
       var noodleTotalCalories = parseInt($(`.noodlecalories`).text());
       var noodleTotal_price = parseFloat($(`.noodleprice`).text());
       //To loop through all the different row of items and retrieve the value, based on the count
       while (x < count) {
           //Get the individual price * number of quantity entered
            noodlecount_price = parseFloat($(`.nprice${x}`).text()) * parseInt($(`.noodlebaseqty${x}`).val()); 
            //Get the individual calories * number of quantity entered
            noodlecount_calories = parseInt($(`.ncalories${x}`).text()) * parseInt($(`.noodlebaseqty${x}`).val());
            if(noodlecount_calories == 0) {
                noodlesub_calories = "-";
            } else {
                noodlesub_calories = noodlecount_calories;
            }

            noodleTotalCalories += noodlecount_calories;
            noodleTotal_price += parseFloat(noodlecount_price);
            //Amend the html text to reflect latest subcategory values
            $(`.nsubcalories${x}`).text(noodlesub_calories);

   
            x++;
       }
       // Change to reflect latest total calories and total price
        $(".noodleTotalCalories").text(noodleTotalCalories);
        $(".noodleTotalPrice").text(noodleTotal_price.toFixed(2));
    })

    //Trigger functions on click of adding to cart for Rice base
    $('.riceAddCart').click(function(){
        
        //Count the number of input in the menu modal for rice
        var totalRiceCount = $('.inputqty').length;
        //set counter for while loop
        var riceBaseCount = 0;
        //Set various variables for assigning values
        var riceFoodId="";
        var riceFoodQty="";
        var riceid = $('.riceid').text();
        var riceAddCart = $('.riceAddCart').val();
        var riceSidesCounter = 0;
        //While loop to check if input box is > 0, if yes, append the value into the variables
        while(riceBaseCount < totalRiceCount ) {
            if(parseInt($(`.ricebaseqty${riceBaseCount}`).val()) > 0 ) {
                
                 riceFoodId += $(`.id${riceBaseCount}`).text() + " ";
                 riceFoodQty += $(`.ricebaseqty${riceBaseCount}`).val() + " ";
                 riceSidesCounter++;



            }
            riceBaseCount++;
            
        }
        
        
        //Ajax to post variables into batchaddcart.php
        $.ajax({
            url: 'batchaddcart.php', //action
            method: 'POST', //method
            data:{
                riceid:riceid,
                riceAddCart:riceAddCart,
                riceFoodId:riceFoodId,
                riceFoodQty:riceFoodQty,
                riceSidesCounter:riceSidesCounter
            },
            
            success:function(data){
                
                //display successful msg if success
                if(data==1){
                    swal("Success", "Item added to cart", "success")
                      .then((value) => {
                        location.reload();
                      });
                        
                 } else if(data==2){ //display error msg if user is not logged in
                    // swal("Error", "Please login/register an account to start adding to cart", "error");

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
    //Trigger functions on click of adding to cart for Rice base
    $('.noodleAddCart').click(function(){
       //Count the number of input in the menu modal for noodle
        var totalNoodleCount = $('.noodlebaseqty').length;
        //set counter for while loop
        var noodleBaseCount = 0;
        //set variables to assign values 
        var noodleFoodId="";
        var noodleFoodQty="";
        var noodleid = $('.noodleid').text();
        var noodleAddCart = $('.noodleAddCart').val();
        var noodleSidesCounter = 0;
        //While loop to check if input box is > 0, if yes, append the value into the variables
        while(noodleBaseCount < totalNoodleCount ) {
            if(parseInt($(`.noodlebaseqty${noodleBaseCount}`).val()) > 0 ) {
                
                 noodleFoodId += $(`.nid${noodleBaseCount}`).text() + " ";
                 noodleFoodQty += $(`.noodlebaseqty${noodleBaseCount}`).val() + " ";
                 noodleSidesCounter++;



            }
            
            noodleBaseCount++;
            
        }
        //Ajax to post variables into batchaddcart.php
        $.ajax({
            url: 'batchaddcart.php', //action
            method: 'POST', //method
            data:{
                noodleid:noodleid,
                noodleAddCart:noodleAddCart,
                noodleFoodId:noodleFoodId,
                noodleFoodQty:noodleFoodQty,
                noodleSidesCounter:noodleSidesCounter
            },
            success:function(data){
                
                if(data==1){
                    //display successful msg if success
                    swal("Success", "Item added to cart", "success")
                      .then((value) => {
                        location.reload();
                      });
                        
                 } else if (data ==2) {//display error msg if user is not logged in
                    // swal("Error", "Please login/register an account to start adding to cart", "error");

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

</body>
</html>