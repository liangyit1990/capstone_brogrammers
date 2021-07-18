
// // Count the numbe rof batch item user has in the cart
// // Use inner join
// // Then use that number to do a while loop
// // and pass food name together with food quantity
// // and also do a subtotal price
// // and pass into the string 
// //price must have comma

// $orderDetails = "";

// // $value = "Rice-1 Egg-1 Sake-2 4.00, Noodle-1 Egg-2 3.50, Rice-1 Egg-2 2.50";

// // $checkUserOrder = DB::query('SELECT * FROM orders WHERE users_id =%i', $_COOKIE["users_id"]);
// // $checkUserOrderCount = DB::count();
// // if ($checkUserOrdercount > 0) {
// //     $cartNo = $checkUserOrderCount + 1;
// // } else if ($checkUserOrdercount == 0) {
// //     $cartNo = 1;
// // }

// $getUserBatchQuery = DB::query("SELECT * FROM cartbatch 
//                                     INNER JOIN food 
//                                     ON cartbatch.food_id = food.food_id
//                                     where users_id=%i AND cartbatch_status=%i"  , $_COOKIE['users_id'],0);
// $getUserBatchCount = DB::count();

// if($getUserBatchCount > 0) {
//     //Find how many batches of items user has in the cart
//     foreach($getUserBatchQuery as $getUserBatchResult){
//         $batchCount = $getUserBatchResult['cartbatch_no'];

//     }
//     echo $batchCount.'<br>';
    
//     $counter = 1;
//     while($counter <= $batchCount) {
//         $subtotal = 0;
//         $getUserBatchQuery = DB::query("SELECT * FROM cartbatch 
//                                     INNER JOIN food 
//                                     ON cartbatch.food_id = food.food_id
//                                     where users_id=%i AND cartbatch_status=%i AND cartbatch_no=%i" , $_COOKIE['users_id'],0,$counter);
//        foreach($getUserBatchQuery as $getUserBatchResult) {
           
//            $batchOrderDetails .= $getUserBatchResult["food_name"].'-'.$getUserBatchResult["cartbatch_foodqty"].'&';
//            $subtotal += $getUserBatchResult["food_price"] * $getUserBatchResult["cartbatch_foodqty"];
           
//        }
//        $batchOrderDetails = substr($batchOrderDetails, 0, -1);
//        $batchOrderDetails .='-'.$subtotal.',';
//        $counter++;
       
//     }
//     $batchOrderDetails = substr($batchOrderDetails, 0, -1);
//     $explode = explode(',',$batchOrderDetails);
    
//     echo $batchOrderDetails.'<br>';
//     foreach($explode as $value) {
//         echo $value.'<br>';
//     }

//     $arraycount = count($explode);
//     $count = 0;
//     while($count <= $arraycount){

//     }
    
   
// }

// echo '<br>';
// // $getUserCartQuery = DB::query("SELECT * FROM cart 
// //                                     INNER JOIN food 
// //                                     ON cart.food_id = food.food_id
// //                                     where users_id=%i AND cart_status=%i"  , $_COOKIE['users_id'],0);

// // $getUserCartCount = DB::count();

// // if($getUserCartCount > 0) {
// //     foreach($getUserCartQuery as $getUserCartResult) {
        
// //         $cartOrderDetails .= $getUserCartResult["food_name"].'-'.$getUserCartResult["cart_foodqty"]."-";
// //         $price += $getUserCartResult["food_price"] * $getUserCartResult["cart_foodqty"];
// //         $cartOrderDetails .= $price.',';

// //     }
// //     echo $cartOrderDetails;
// // }



