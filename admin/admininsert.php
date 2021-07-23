<?php
include '../config/config.php';
include '../config/db.php';
include '../config/functions.php';




#variables for user input values

if(isset($_POST['addbtn'])){

    if(empty($_POST['name'])){
        $nameChecked = 1;
    }else{
        #Validate values for comment and passed into variable
        $name = validateData($_POST['name']);
        $nameChecked = 0;
        // The code below shows a simple way to check if the name field only contains letters and whitespaces.
        // If the value of the name field is not valid, then store an error message:
        if(!preg_match("/^[a-zA-Z ]*$/", $name)){ 
            $nameChecked = 1;
            $name = "";
        }
    }

    if(empty($_POST['email'])){
        $emailChecked = 1;
    }else{  
        #Validate values for comment and passed into variable
        $email = validateData($_POST['email']);    
        $emailChecked = 0;  
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email = "";
            $emailChecked = 1;  
        }
    }

    //Check if password is empty
    if(empty($_POST['password'])){
        $passwordChecked = 1;
        
    }else{  
       //Validate values for password
        $password = validateData($_POST['password']);
        $cfmpassword = validateData($_POST['cfmpassword']);
        $passwordChecked = 0;
       
    }   
    
    #To make sure all sections are filled correctly before submitting
    if(!empty($name) && !empty($email) &&  !empty($password) && !empty($cfmpassword)) {
        
        if($password != $cfmpassword){
            //Display alert message if passwords dont match
            echo 2;
        }
       else if ($nameChecked = $emailChecked = $phoneChecked = $addChecked = $passwordChecked == 0) {

            $checkEmail = DB::query("SELECT * FROM users where users_email=%s", $email);
            $checkEmailCount = DB::count();
            if($checkEmailCount == 0) {
                //Insert input values into DB
                DB::insert("users", [
                    'users_name' => strtolower($name),
                    'users_email' => strtolower($email),
                    'users_password' => password_hash($password, PASSWORD_DEFAULT),

                ]);
                $userQuery = DB::query("SELECT * FROM users where users_email=%s", $email);
                foreach($userQuery as $userResult){
                    $dbId = $userResult['users_id'];
    
                }
                //Return back newly added ID value
                echo 4;

            } else {
                //Display alert message if email has already been used
                echo 3;
            }

        }
    } else {
        //Display alert message if sections are not filled up properly
        echo 1;
    }


} 
?>

