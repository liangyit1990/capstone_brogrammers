<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

if(isset($_POST['defaultId'])){
    $newDefault = DB::query("SELECT addresses_default FROM addresses WHERE users_id=%i", $_COOKIE['users_id']);
    foreach($newDefault as $newDefaultResults){
        DB::update("addresses", [
            'addresses_default' =>0,
        
        ], "users_id=%i", $_COOKIE['users_id']);
    }

    DB::update("addresses", [
        'addresses_default' =>1,
    
    ], "addresses_id=%i", $_POST['defaultId']);
    
    echo 1;
    //make checkbox disabled

} 

// else {
//     DB::delete("addresses", "addresses_id=%i", $_POST['deleteId']); //delete users with specific id from DB
//     echo 1;
// }

?>