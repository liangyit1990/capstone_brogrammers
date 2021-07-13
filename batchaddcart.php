<?php
include 'config/config.php';
include "config/db.php";
include "config/functions.php";



if(isset($_POST['riceAddCart']) || isset($_POST['noodleAddCart'])) {
    if(isset($_COOKIE['users_id']) && isset($_COOKIE['isLoggedIn'])) {

        if(isset($_POST['riceAddCart'])) {
            //Count how many batchNo User has in the cart
        $userQuery = DB::query("SELECT cartbatch_no FROM cartbatch where users_id=%i AND cartbatch_status=%i" , $_COOKIE['users_id'],0);
        $count = 1;
        foreach($userQuery as $userResult){
            if($count < $userResult['cartbatch_no']){
                $count = $userResult['cartbatch_no'];
            } else if ($count == $userResult['cartbatch_no']){
                $count++;
            }
            
        }

        $riceId = validateData($_POST['riceid']);
        DB::insert("cartbatch", [
            'cartbatch_foodqty' => 1,
            'cartbatch_no' => $count,
            'users_id' => $_COOKIE['users_id'],
            'food_id' => $riceId

        ]);

        
        if(isset($_POST['riceFoodId'])) {
            $sidecount = 0;
            $riceSidesId = explode(" ",$_POST['riceFoodId']);
            $riceSidesQty = explode(" ",$_POST['riceFoodQty']);
            while($sidecount < $_POST['riceSidesCounter']) {
                DB::insert("cartbatch", [
                    'cartbatch_foodqty' => $riceSidesQty[$sidecount] ,
                    'cartbatch_no' => $count,
                    'users_id' => $_COOKIE['users_id'],
                    'food_id' => $riceSidesId[$sidecount]
            
                ]);
                $sidecount ++;
            }
            
        }

        echo 1;

        } else if(isset($_POST['noodleAddCart'])){
            //Count how many batchNo User has in the cart
            $userQuery = DB::query("SELECT cartbatch_no FROM cartbatch where users_id=%i AND cartbatch_status=%i" , $_COOKIE['users_id'],0);
            $count = 1;
            foreach($userQuery as $userResult){
                if($count < $userResult['cartbatch_no']){
                    $count = $userResult['cartbatch_no'] + 1;
                } else if ($count == $userResult['cartbatch_no']){
                    $count++;
                }
                
            }

            $noodleId = validateData($_POST['noodleid']);
            DB::insert("cartbatch", [
                'cartbatch_foodqty' => 1,
                'cartbatch_no' => $count,
                'users_id' => $_COOKIE['users_id'],
                'food_id' => $noodleId

            ]);
        
            if(isset($_POST['noodleFoodId'])) {
                $sidecount = 0;
                $noodleSidesId = explode(" ",$_POST['noodleFoodId']);
                $noodleSidesQty = explode(" ",$_POST['noodleFoodQty']);
                while($sidecount < $_POST['noodleSidesCounter']) {
                    DB::insert("cartbatch", [
                        'cartbatch_foodqty' => $noodleSidesQty[$sidecount] ,
                        'cartbatch_no' => $count,
                        'users_id' => $_COOKIE['users_id'],
                        'food_id' => $noodleSidesId[$sidecount]
                
                    ]);
                    $sidecount ++;
                }
                
            }

            echo 1;

        }
    } else {
        echo 2;
    }
    
    
        
} else {
    header("Location: " . SITE_URL);
}





?>