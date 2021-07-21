<?php
include '../config/config.php';
include '../config/db.php';
include '../config/functions.php';

//Check if user supposed to be here
if(isset($_POST['editUser'])){
   if(empty($_POST['name']) || empty($_POST['email'])) {
      echo 1;
      
   } else {
      $name = validateData($_POST['name']);
      $email = validateData($_POST['email']);
      $phone = validateData($_POST['phone']);
      $permission = validateData($_POST['permission']);
      $gender = validateData($_POST['gender']);

       //Update values in DB
       DB::update("users", [
         'users_name' => strtolower($name),
         'users_email' => strtolower($email),
         'users_phone' => $phone,
         'users_permission' => $permission,
         'users_gender' => $gender
      
     ], "users_id=%i", $_POST['id']);
     //Display success msg
     echo 2;
   }
}

?>

