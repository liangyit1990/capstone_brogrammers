<?php 
include "../config/config.php";
include "../config/db.php";
include "../config/functions.php"; 


if(!isset($_POST['deleteId'])){
    header("Location: " . SITE_URL);
} else {
    //Check if there is any file being uploaded
    if(!empty($_POST['deleteFile'])){
        $file_pointer = "../".$_POST['deleteFile']; 
        //Check if file is able to delete successfully
        if (!unlink($file_pointer)) { 
            //Display error message if not able to delete
            echo 2;
        } 
        else { 
            DB::delete("feedbackothers", "feedbackothers_id=%?", $_POST['deleteId']); //delete foods with specific id from DB
            //Display succcess msg
            echo 1;
        } 
        
    } else {
        DB::delete("feedbackothers", "feedbackothers_id=%?", $_POST['deleteId']); //delete foods with specific id from DB
            //Display succcess msg
            echo 1;
    }
    }
    


?>