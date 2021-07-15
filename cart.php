<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 


if(isset($_POST['addFoodId'])) {
    if(isset($_COOKIE['users_id']) && isset($_COOKIE['isLoggedIn'])) {

    $foodId = validateData($_POST['addFoodId']);;
    $foodQuery = DB::query("SELECT * FROM cart where users_id=%i AND food_id=%i" , $_COOKIE['users_id'],$foodId);
    $foodCountCheck = DB::count();
    if($foodCountCheck > 0) {
        foreach($foodQuery as $foodCountResult)
        $foodCount = $foodCountResult['cart_foodqty'] + 1;
        $cartId = $foodCountResult['cart_id'];
        DB::update("cart", [
            'cart_foodqty' => $foodCount,
            
        ], "cart_id=%i", $cartId);
        echo 2;
    } else {
        $foodCount = 1;
        DB::insert("cart", [
            'cart_foodqty' => $foodCount,
            'users_id' => $_COOKIE['users_id'],
            'food_id' => $foodId
        ]);
        echo 1;
    }
    

    } else {
        echo 3;
      }
} else {
    header("Location: " . SITE_URL);
}
?>
