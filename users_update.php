<?php
include 'config/config.php';
include 'config/db.php';
include 'config/functions.php';


$emailUpdate = $userId = $passwordUpdate = $cfmpasswordUpdate = $passworduserId = "";

if(isset($_POST['users_emailUpdate'])) {
    if(empty($_POST['users_emailUpdate'])){
    echo "Please enter an email address to proceed!";
  }else{ 
    $emailUpdate = validateData($_POST['users_emailUpdate']);
    $userId = $_POST['users_id'];

    if($_POST['users_emailUpdate'] == $return_email){
        echo "Please enter a different email address!";
    } else {
        $checkEmail = DB::query("SELECT * FROM users WHERE users_email=%s", $emailUpdate);
        $checkEmailCount = DB::count();
        if($checkEmailCount > 0){
            echo "The email you entered has already been used! Please try another email.";
        }else{
            DB::update("users", [
                'users_email' => $emailUpdate], "users_id=%i", $userId);
                setcookie("users_email", $emailUpdate, time() + (86400 * 30)); // 86400 = 1 day
                echo 1;
            // $updateSuccess = 1;
        }
      } 
  }
}


if(isset($_POST['users_passwordUpdate'])){
    $passworduserId = $_POST['passwordusers_id'];
    $checkPassword = DB::query("SELECT users_password FROM users WHERE users_id=%i", $passworduserId);
    foreach($checkPassword as $checkPasswordResult){
        $dBPassword = $checkPasswordResult['users_password'];
    }

    if(empty($_POST['users_currentpassword']) || empty($_POST['users_passwordUpdate']) || empty($_POST['users_cfmpasswordUpdate'])){
      echo "Please fill up all the required fields!";
    } else{
        $currentpassword = validateData($_POST['users_currentpassword']);
        $passwordUpdate = validateData($_POST['users_passwordUpdate']);
        $cfmpasswordUpdate = validateData($_POST['users_cfmpasswordUpdate']); 

        if($passwordUpdate != $cfmpasswordUpdate) {
            echo "Your newly entered passwords do not match! Please try again!";
        } else {

            if(password_verify($currentpassword, $dBPassword)){
                if ($passwordUpdate == $currentpassword) {
                    echo "You are currently using this password! Please try another password!";
                } else {
                    DB::update("users", [
                        'users_password' => password_hash($cfmpasswordUpdate, PASSWORD_DEFAULT)
                    ], "users_id=%i", $passworduserId);
    
                    echo 2;    
                }
                
            } else{
                echo "Your Current Password is Wrong! Please try again!";
            }
        }
    } 
} 


?>