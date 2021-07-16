<?php 

if(!isset($_POST['deleteCartUserId'])){
    header("Location: " . SITE_URL);
} else {
    DB::query("DELETE FROM cartbatch where users_id=%i AND cartbatch_status=%i" , $_POST['deleteCartUserId'],0); 
    DB::query("DELETE FROM cart where users_id=%i AND cartbatch_status=%i" , $_POST['deleteCartUserId'],0); 
    echo 1;
} 




?>

