<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

$getuseraddress = DB::queryFirstRow("SELECT * FROM addresses WHERE users_id = %i",15);

   $fullAddress = $getuseraddress['addresses_line1']." ".$getuseraddress['addresses_line2']. " ". $getuseraddress['addresses_unitNo']. " ". $getuseraddress['addresses_country']. " ". $getuseraddress['addresses_zipCode'];
    echo $fullAddress;
    // echo $fulladdress;



// $getTotalOrderCount = db::query("SELECT * FROM orders");
// $getTotalOrderCount1 = db::count();
// echo $getTotalOrderCount1;
// $food_name = Array();
// $food_qty = Array();
// $getOrdersQuery = DB::query("SELECT * FROM orderdetails
//                                 INNER JOIN food
//                                 ON orderdetails.food_id = food.food_id
//                                 ");
// foreach($getOrdersQuery as $getOrdersResult) {
    
//     array_push($food_name, $getOrdersResult['food_name']);
//     array_push($food_qty, $getOrdersResult['orderdetails_qty']);

// }

// $a = array_unique($food_name);
// $a = array_combine($a, array_fill(0, count($a), 0));

// foreach($food_name as $k=>$v) {
//     $a[$v] += $food_qty[$k];
//   }

//   arsort($a);
//   $newArray = array_slice($a, 0, 5, true);
//   foreach(array_keys($newArray) as $newArrayKeyNames) {
//       echo $newArrayKeyNames."<br>";
//   }











// $foodarray = array();
// $getFoodlist = DB::query("SELECT food_id from food");
// foreach($getFoodlist as $getFoodListResult) {
//   $getOrdersQuery = DB::query("SELECT * FROM orderdetails
//   INNER JOIN food 
//   ON orderdetails.food_id = food.food_id
//   WHERE food.food_id=%i
//   ", $getFoodListResult["food_id"] );
//   foreach($getOrdersQuery as $getOrdersResult) {



        
//   }
  
  
// }

// $getUserOrderCount = DB::count();
// echo $getUserOrderCount;



?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<!-- <button type="button" class="btn btn-primary checkout">Primary</button> -->

<!-- bootstrap jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
<!-- main js here -->


<script>


$(".checkout").click(function(){
            $.ajax({
            url: 'checkouttest.php', //action
            method: 'POST', //method
            
            success:function(data){
                
                console.log(data);
                
            }   


        });
})


</script>


</body>
</html>


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