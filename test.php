<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

$count = 3;


$value = "Rice-1 Egg-1 Sake-2 4.00, Noodle-1 Egg-2 3.50, Rice-1 Egg-2 2.50";
// Count the numbe rof batch item user has in the cart
// Use inner join
// Then use that number to do a while loop
// and pass food name together with food quantity
// and also do a subtotal price
// and pass into the string 
//price must have comma
$explode = explode(",", $value);
foreach($explode as $test){
     $explodefurther = explode(" ", $test);
     foreach($explodefurther as $value2) {
         echo $value2.'<br>';
     }
}



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