<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

date_default_timezone_set('Singapore');
//Insert into ORDER db first
//To find the latest order ID so as to link order ID
$amount = 30.50;

// DB::insert("orders", [
//     'orders_totalprice' => $amount,
//     'users_id' => $_COOKIE['users_id'],
//     'orders_timestamp' => date("Y-m-d H:i:s")       

    
// ]);




$totalOrderQuery = DB::query('SELECT * FROM orders');
foreach($totalOrderQuery as $totalOrderResult){
    $orderID = $totalOrderResult['orders_id'];
}

    
$getUserBatchQuery = DB::query("SELECT * FROM cartbatch 
                                    INNER JOIN food 
                                    ON cartbatch.food_id = food.food_id
                                    where users_id=%i AND cartbatch_status=%i"  , $_COOKIE['users_id'],0);
$totalBatchOrderCount = DB::count();


if($totalBatchOrderCount > 0) {
    foreach($getUserBatchQuery as $totalBatchOrderResult ) {
        $totalBatchOrderCount = $totalBatchOrderResult['cartbatch_no'];
    }

    echo $totalBatchOrderCount;

    $batchCounter = 1;
    while($batchCounter <= $totalBatchOrderCount) {
        $getUserBatchQuery = DB::query("SELECT * FROM cartbatch 
                                    INNER JOIN food 
                                    ON cartbatch.food_id = food.food_id
                                    where users_id=%i AND cartbatch_status=%i AND cartbatch_no=%i"  , $_COOKIE['users_id'],0, $batchCounter);
        foreach($getUserBatchQuery as $getUserBatchResult) {
            DB::insert("orderdetails", [
                'orderdetails_qty' => $getUserBatchResult['cartbatch_foodqty'],
                'users_id' => $_COOKIE['users_id'],
                'food_id' => $getUserBatchResult['food_id'],
                'orders_id' => $orderID,
                'orderdetails_group' => $batchCounter

            ]);
        }
        $batchCounter++;
    }
}

$getOrderDetailsGroup = DB::query('SELECT * FROM orderdetails WHERE orders_id=%i', $orderID);
$getOrderDetailsGroupCount = DB::count();
if($getOrderDetailsGroupCount = 0 ) {
    $batchCounter = 1;
}

$getUserCartQuery = DB::query("SELECT * FROM cart 
                                       INNER JOIN food 
                                        ON cart.food_id = food.food_id
                                        where users_id=%i AND cart_status=%i"  , $_COOKIE['users_id'],0);

foreach($getUserCartQuery as $getUserCartResult ) {
    DB::insert("orderdetails", [
                        'orderdetails_qty' => $getUserCartResult['cart_foodqty'],
                        'users_id' => $_COOKIE['users_id'],
                        'food_id' => $getUserCartResult['food_id'],
                        'orders_id' => $orderID,
                        'orderdetails_group' => $batchCounter

                        ]);
    $batchCounter++;
                        
}









//










?>