<?php 

include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

if(!isset($_POST['deleteCartUserId'])){
    header("Location: " . SITE_URL);
} else {
    //Combine Multiple ANDS condition into $where
    $where = new WhereClause('and'); // create a WHERE statement of pieces joined by ANDs
    
    $where->add('users_id=%i', $_POST['deleteCartUserId']);
    $where->add('cartbatch_status=%i', 0);

    $cartwhere = new WhereClause('and');
    $cartwhere->add('users_id=%i', $_POST['deleteCartUserId']);
    $cartwhere->add('cart_status=%i', 0);

    DB::delete('cartbatch', '%l', $where);
    DB::delete('cart', '%l', $cartwhere);
    
    echo 1 ;
    
} 




?>

