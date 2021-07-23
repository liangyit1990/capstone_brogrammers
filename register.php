<?php
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

// Start of Register PHP Code
if(isset($_POST['register'])){
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['cfmPassword'])){
      echo "Please fill up all the fields.";
      // echo $registererror;
    }else{
      $email = validateData($_POST['email']);
      //validate if email is legit
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $name = validateData($_POST['name']);
        $password = validateData($_POST['password']);
        $cfmPassword = validateData($_POST['cfmPassword']);
        //check if password and confirm password are the same
        if($password == $cfmPassword){
          //check if email exist in database
          $checkEmail = DB::query("SELECT * FROM users WHERE users_email=%s AND users_permission=0", $email);
          $checkEmailCount = DB::count();
          //if email already exist
          if($checkEmailCount > 0){
            echo "The email you entered has already been used! Please try another email.";
          }else{
              DB::insert("users", [
                'users_name' => $name,
                'users_email' => $email,
                'users_password' => password_hash($password, PASSWORD_DEFAULT),
                // 'users_registeredDate' => MySQLDate($date)
              ]);
  
              
              $userQuery = DB::query("SELECT * FROM users WHERE users_email=%s AND users_permission=0", $email);
              foreach($userQuery as $userResult) {
              $dbId = $userResult['users_id'];
              $dbPermission = $userResult['users_permission'];
              $dbName = $userResult['users_name'];
              $dbEmail = $userResult['users_email'];
              }
  
              setcookie("users_id", $dbId, time() + (86400 * 30)); // 86400 = 1 day
              setcookie("users_permission", $dbPermission, time() + (86400 * 30)); // 86400 = 1 day
              setcookie("users_name", $dbName, time() + (86400 * 30)); // 86400 = 1 day
              setcookie("users_email", $dbEmail, time() + (86400 * 30)); // 86400 = 1 day
              setcookie("isLoggedIn", 1, time() + (86400 * 30)); // 86400 = 1 day
              
  
              echo 1;
          }
        }else{
          echo "Your passwords do not match! Please try again";
        }
      } else{
        echo "Please enter a valid email.";
      }
    }
  }
  

?>