<?php 
include "../config/config.php";
include "../config/db.php";
include "../config/functions.php"; 

if(!isset($_POST['deleteId'])){
    header("Location: " . SITE_URL);
} else {

    DB::delete("cartbatch", "users_id=%?", $_POST['deleteId']);//delete users with specific id from DB
    DB::delete("cart", "users_id=%?", $_POST['deleteId']);//delete users with specific id from DB
    DB::delete("addresses", "users_id=%?", $_POST['deleteId']);//delete users with specific id from DB
    DB::delete("users", "users.users_id=%?", $_POST['deleteId']); 
    
    echo 1;
}

?>