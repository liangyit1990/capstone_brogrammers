<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

if(!isset($_POST['deleteId'])){
    header("Location: " . SITE_URL);
} else {
    DB::delete("addresses", "addresses_id=%i", $_POST['deleteId']); //delete users with specific id from DB
    echo 1;
}

?>