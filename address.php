<?php

include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

$fullName = $companyName = $line1 = $line2 = $country = $zipCode = $saveAddSuccess = "";

if((empty($_POST['fullName']) || empty($_POST['line1'])) || (empty($_POST['country']) || empty($_POST['zipCode']))){
        echo "Please enter all the required fields!";
} else {
            $fullName = validateData($_POST['fullName']);
            $company = validateData($_POST['company']);
            $line1 = validateData($_POST['line1']);
            $line2 = validateData($_POST['line2']);
            $country = validateData($_POST['country']);
            $zipCode = validateData($_POST['zipCode']);

            // $checkAddress = DB::query("SELECT * FROM addresses WHERE users_id=%i", $_COOKIE['users_id']);
            // $checkAddressCount = DB::count();
            // foreach($checkAddress as $checkAddressResult){
            //     if($unit == $checkAddressResult['addresses_unit'] && $zipCode == $checkAddressResult['addresses_zipCode']){
            //         echo "same address";
            //     } else {
                    // DB::insert("addresses", [
                    //     'users_id' => $_COOKIE['users_id'],
                    //     'addresses_fullName' => $fullName,
                    //     'addresses_companyName' => $company,
                    //     'addresses_line1' => $line1,
                    //     'addresses_line2' => $line2,
                    //     'addresses_country' => $country,
                    //     'addresses_zipCode' => $zipCode,
        
                    // ]);
                    // echo 1;        
                // }
            // }
    
            DB::insert("addresses", [
                'users_id' => $_COOKIE['users_id'],
                'addresses_fullName' => $fullName,
                'addresses_companyName' => $company,
                'addresses_line1' => $line1,
                'addresses_line2' => $line2,
                'addresses_country' => $country,
                'addresses_zipCode' => $zipCode,

            ]);
            echo 1;

            // header("Location: " . SITE_URL . "account.php#addresses?saveAddSuccess=1");
    
        }


?>