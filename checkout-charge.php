<?php
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51JC3VwF77heEa3oFaOjObMnlN5BwZ5J8rYc6bI55knRy2X3L5PkEUgXFLAuCRXfbD0UniDTGEeNocfYxGfvKAC6J00fPDRk9Ir",
        "publishableKey" => "pk_test_51JC3VwF77heEa3oFtz0HzRPEOVUxvY1thI3QJlIi4QY4DLd6U7NiwR3DMJZlNqjTLg9iVamxN9AvcheBkGJ3WzJX00PnoxuKvI"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);

    $token = $_POST["stripeToken"];
    // $contact_name = $_POST["c_name"];
    $token_card_type = $_POST["stripeTokenType"];
    // $phone           = $_POST["phone"];
    $email           = $_POST["stripeEmail"];
    $address         = $_POST["address"];
    $amount          = $_POST["amount"]; 
    $desc            = $_POST["product_name"];
    $charge = \Stripe\Charge::create([
      "amount" => $amount,
      "currency" => 'sgd',
      "description"=>$desc,
      "source"=> $token,
    ]);

    if($charge){

          $totalprice = $amount / 100;
          date_default_timezone_set('Singapore');
          
          DB::insert("orders", [
              'orders_totalprice' => $totalprice,
              'users_id' => $_COOKIE['users_id'],
              'orders_timestamp' => date("Y-m-d H:i:s")       

              
          ]);

          $totalOrderQuery = DB::query('SELECT * FROM orders');
          foreach($totalOrderQuery as $totalOrderResult){
              $orderID = $totalOrderResult['orders_id'];
          }

              
          $getUserBatchQuery = DB::query("SELECT * FROM cartbatch 
                                              INNER JOIN food 
                                              ON cartbatch.food_id = food.food_id
                                              where users_id=%i AND cartbatch_status=%i"  , $_COOKIE['users_id'],0);
          $totalBatchOrderCount = DB::count();


          if($totalBatchOrderCount > 0) {
              foreach($getUserBatchQuery as $totalBatchOrderResult ) {
                  $totalBatchOrderCount = $totalBatchOrderResult['cartbatch_no'];
              }

              echo $totalBatchOrderCount;

              $batchCounter = 1;
              while($batchCounter <= $totalBatchOrderCount) {
                  $getUserBatchQuery = DB::query("SELECT * FROM cartbatch 
                                              INNER JOIN food 
                                              ON cartbatch.food_id = food.food_id
                                              where users_id=%i AND cartbatch_status=%i AND cartbatch_no=%i"  , $_COOKIE['users_id'],0, $batchCounter);
                  foreach($getUserBatchQuery as $getUserBatchResult) {
                      DB::insert("orderdetails", [
                          'orderdetails_qty' => $getUserBatchResult['cartbatch_foodqty'],
                          'users_id' => $_COOKIE['users_id'],
                          'food_id' => $getUserBatchResult['food_id'],
                          'orders_id' => $orderID,
                          'orderdetails_group' => $batchCounter

                      ]);
                  }
                  $batchCounter++;
              }
          }

          $getOrderDetailsGroup = DB::query('SELECT * FROM orderdetails WHERE orders_id=%i', $orderID);
          $getOrderDetailsGroupCount = DB::count();
          if($getOrderDetailsGroupCount = 0 ) {
              $batchCounter = 1;
          }

          $getUserCartQuery = DB::query("SELECT * FROM cart 
                                                INNER JOIN food 
                                                  ON cart.food_id = food.food_id
                                                  where users_id=%i AND cart_status=%i"  , $_COOKIE['users_id'],0);

          foreach($getUserCartQuery as $getUserCartResult ) {
              DB::insert("orderdetails", [
                                  'orderdetails_qty' => $getUserCartResult['cart_foodqty'],
                                  'users_id' => $_COOKIE['users_id'],
                                  'food_id' => $getUserCartResult['food_id'],
                                  'orders_id' => $orderID,
                                  'orderdetails_group' => $batchCounter

                                  ]);
              $batchCounter++;
                                  
          }


      $getUserBatchQuery = DB::query("SELECT cartbatch_no FROM cartbatch WHERE users_id=%i AND cartbatch_status=%i" , $_COOKIE['users_id'],0);
      $getUserBatchCount = DB::count();


      DB::update("cart", [
        'cart_status' => 1
        
      ], "users_id=%i", $_COOKIE['users_id']);      

      DB::update("cartbatch", [
        'cartbatch_status' => 1
        
      ], "users_id=%i", $_COOKIE['users_id']);     




      
      header("Location:success.php?amount=$amount");

    }
?>