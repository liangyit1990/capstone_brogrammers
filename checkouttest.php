<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 


//Insert into ORDER db first
//To find the latest order ID so as to link order ID
$totalOrderQuery = DB::query('SELECT * FROM orders ');
foreach($totalOrderQuery as $totalOrderResult){
    $totalOrderCount = $totalOrderResult['order_id'];
}
    $totalOrderCount++;

//










?>