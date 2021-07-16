<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

$orderDetails = "";

$checkUserOrder = DB::query('SELECT * FROM orders WHERE users_id =%i', $_COOKIE["users_id"]);
$checkUserOrderCount = DB::count();
if ($checkUserOrdercount > 0) {
    $cartNo = $checkUserOrderCount + 1;
} else if ($checkUserOrdercount == 0) {
    $cartNo = 1;
}

$getUserBatchQuery = DB::query("SELECT * FROM cartbatch 
                                    INNER JOIN food 
                                    ON cartbatch.food_id = food.food_id
                                    where users_id=%i AND cartbatch_status=%i AND cartbatch_no=%i"  , $_COOKIE['users_id'],0,$count);
$getUserBatchCount = DB::count();
if($getUserBatchCount > 0) {
    foreach($getUserBatchQuery as $getUserBatchResult){
        $orderDetails .= $getUserBatchResult["cartbatch"].'x'.$getUserBatchResult["cartbatch"];
    }


}












?>