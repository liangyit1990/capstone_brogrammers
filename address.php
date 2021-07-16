<?php

include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

$fullName = $companyName = $line1 = $line2 = $unitNo = $country = $zipCode = $saveAddSuccess = "";

if((empty($_POST['fullName']) || empty($_POST['line1'])) || (empty($_POST['country']) || empty($_POST['zipCode'])) || empty($_POST['unitNo'])){
        echo "Please enter all the required fields";
} else {
    $fullName = validateData($_POST['fullName']);
    $company = validateData($_POST['company']);
    $line1 = validateData($_POST['line1']);
    $line2 = validateData($_POST['line2']);
    $unitNo = validateData($_POST['unitNo']);
    $country = validateData($_POST['country']);
    $zipCode = validateData($_POST['zipCode']);
    $checkAddress = DB::query("SELECT * FROM addresses WHERE users_id=%i", $_COOKIE['users_id']);
    $checkAddressCount = DB::count();

    if($checkAddressCount > 0){
        foreach($checkAddress as $checkAddressResult){
            if($unitNo == $checkAddressResult['addresses_unitNo'] && $zipCode == $checkAddressResult['addresses_zipCode']){
                echo "Please enter a different address";
            } else {
                DB::insert("addresses", [
                    'users_id' => $_COOKIE['users_id'],
                    'addresses_fullName' => $fullName,
                    'addresses_companyName' => $company,
                    'addresses_line1' => $line1,
                    'addresses_line2' => $line2,
                    'addresses_unitNo' => $unitNo,
                    'addresses_country' => $country,
                    'addresses_zipCode' => $zipCode,
                ]);
                echo 1;        
        
            }
        } 
    // header("Location: " . SITE_URL . "account.php#addresses?saveAddSuccess=1");
    }  else {
        DB::insert("addresses", [
            'users_id' => $_COOKIE['users_id'],
            'addresses_fullName' => $fullName,
            'addresses_companyName' => $company,
            'addresses_line1' => $line1,
            'addresses_line2' => $line2,
            'addresses_unitNo' => $unitNo,
            'addresses_country' => $country,
            'addresses_zipCode' => $zipCode,
        ]);
        echo 1;        
    }       


        // DB::insert("addresses", [
        //     'users_id' => $_COOKIE['users_id'],
        //     'addresses_fullName' => $fullName,
        //     'addresses_companyName' => $company,
        //     'addresses_line1' => $line1,
        //     'addresses_line2' => $line2,
        //     'addresses_unitNo' => $unitNo,
        //     'addresses_country' => $country,
        //     'addresses_zipCode' => $zipCode,
        // ]);
        // echo 1;        
    
}

?>