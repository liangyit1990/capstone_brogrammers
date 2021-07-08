<?php 
include "../config/config.php";
include "../config/db.php";
include "../config/functions.php"; 


if(!isset($_POST['foodId'])){
    header("Location: " . SITE_URL);
} else {
    $file_pointer = $_POST['foodImg']; 
    //Check if file is able to delete successfully
    if (!unlink($file_pointer)) { 
        //Display error message if not able to delete
        echo 2;
    } 
    else { 

        DB::delete("food", "food_id=%?", $_POST['foodId']); //delete foods with specific id from DB
        //Display succcess msg
        echo 1;
    } 
    
}


?>