<?php
include 'config/config.php';
include "config/db.php";
include "config/functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME ?></title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<br/>
   <?php
     $itemNo = 1;
    
     $getuserQuery = DB::query("SELECT cartbatch_no FROM cartbatch where users_id=%i AND cartbatch_status=%i" , $_COOKIE['users_id'],0);
     $getUserBatchCount = DB::count();
     $batchItemNo = 0;
     if($getUserBatchCount > 0) {
          foreach ($getuserQuery as $getUserResult){
               if($batchItemNo < $getUserResult['cartbatch_no']) {
                    $batchItemNo = $getUserResult['cartbatch_no'];
               }
          } 

          // echo $batchItemNo;
          $count = 1;
          while($count <= $batchItemNo ){
               echo "Batch Item :". $count . "<br>";
               $getBatchQuery = DB::query("SELECT * FROM cartbatch 
                  INNER JOIN food 
                  ON cartbatch.food_id = food.food_id
                  where users_id=%i AND cartbatch_status=%i AND cartbatch_no=%i"  , $_COOKIE['users_id'],0,$count);

                  foreach($getBatchQuery as $getBatchQueryResult) {
                       echo "Food Name :" . ucwords($getBatchQueryResult['food_name']) . "--";
                       echo  $getBatchQueryResult['cartbatch_foodqty'] . "<br>";
                       $subcalories = $getBatchQueryResult['cartbatch_foodqty'] * $getBatchQueryResult['food_calories'];
                       $totalsubcalories += $subcalories;
                       $subprice = $getBatchQueryResult['cartbatch_foodqty'] * $getBatchQueryResult['food_price'];
                       $totalprice += $subprice;
                      
                       
                       
                  }
                  echo "Total Price:" . number_format((float)$totalprice, 2, '.', '') . "<br>";
                  echo "Total Calories :" . $totalsubcalories. "<br><br>";

               


               $count++;     
               }
          }
          
     
     
     
     
     

        



   ?>
   
   <script>
        $(document).ready(function(){
           $(".buy_now").on('click',function(e){
                e.preventDefault();
                    var image_src = $(this).closest(".card").find("#image_src").attr("value");
                    var item_name = $(this).closest(".card").find("#item_name").attr("value");
                    var price = $(this).closest(".card").find("#price").attr("value");
                    var dt = '&image='+image_src+'&item_name='+item_name+'&price='+price;
                    var url = 'http://localhost:8888/capstone_brogrammers/menutest.php?'+dt; 
                    
                    $.ajax({
                         url:url,
                         method:'GET',
                         success:function(){
                              window.location.href=url;
                         }
                    });
                   
                    
           });
          
        });
   </script>
</body>
</html>