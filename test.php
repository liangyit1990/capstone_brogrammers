<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 


$getUserOrderQuery = DB::query("SELECT * FROM orders");
foreach ($getUserOrderQuery as $getUserOrderResult) {
    $getUserOrderDetails = DB::query("SELECT * FROM orderdetails 
                                        INNER JOIN food 
                                        ON orderdetails.food_id = food.food_id
                                        where users_id=%i AND orders_id=%i"  , $_COOKIE['users_id'],$getUserOrderResult['orders_id']);
    $getUserOrdercount = DB::count();
    echo 'Order ID:'.$getUserOrderResult['orders_id'].'<br>';
    
    foreach($getUserOrderDetails as $getUserOrderDetailsResult ) {
        
        
        // echo 'Item No 1:'.$getUserOrderDetailsResult['orderdetails_group'].'<br>';
        echo ucwords($getUserOrderDetailsResult['food_name']).' x '.$getUserOrderDetailsResult['orderdetails_qty'].'<br>';
      
        



    }
    echo '<br>';
}

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