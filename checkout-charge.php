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

      $getUserBatchQuery = DB::query("SELECT cartbatch_no FROM cartbatch WHERE users_id=%i AND cartbatch_status=%i" , $_COOKIE['users_id'],0);
      $getUserBatchCount = DB::count();


      DB::update("cart", [
        'cart_status' => 1
        
      ], "users_id=%i", $_COOKIE['users_id']);      

      DB::update("cartbatch", [
        'cartbatch_status' => 1
        
      ], "users_id=%i", $_COOKIE['users_id']);     




      $totalprice = $amount / 100;
      header("Location:success.php?amount=$amount");
    }
?>