<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
include 'config/config.php';
include "config/db.php";
include "config/functions.php";

 
adminloggedIn();


//START OF UPLOAD IMAGE FILE SOURCE CODE
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$hasPost = false;
$name = $price = $imageurl = "";
$nameChecked = $priceChecked = 0;
// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {
    
    echo $_POST["upload"];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            
        } else {
            echo '<script> 
                swal({
                    title: "Duplicate image found",
                    text: "Directing back to listing page...",
                    icon: "error",
                    buttons: false,
                    timer : 3000,
                    }).then(function() {
                    window.location = "admin.php";
                });
                </script>'; 
        }
    }

    
    if(empty($_POST['foodname'])){
        $nameChecked = 1;
    }else{
        #Validate values for comment and passed into variable
        $name = validateData($_POST['foodname']);
        $nameChecked = 0;
        // The code below shows a simple way to check if the name field only contains letters and whitespaces.
        // If the value of the name field is not valid, then store an error message:
        if(!preg_match("/^[a-zA-Z ]*$/", $name)){ 
            $nameChecked = 1;
            $name = "";
        }
    }

     
    if(empty($_POST['foodprice'])){
       
        $priceChecked = 1;
    }else{  
        #Validate values for comment and passed into variable
        $price = validateData($_POST['foodprice']);     
        $priceChecked = 0; 
        if(!filter_var($price, FILTER_VALIDATE_FLOAT)){
            
           
            $priceChecked = 1;
        }
    }
    //Conditions to check if every input is filled correctly
    if($priceChecked = $nameChecked == 0 && $uploadOk == 1){
        DB::insert("foods", [
            'foods_name' => strtolower($name),
            'foods_price' => $price,
            'foods_imgurl' => $target_file
        ]);
    //Display alert message if successful
        echo '<script> 
                swal({
                    title: "Item added successfully",
                    text: "Directing back to listing page...",
                    icon: "success",
                    buttons: false,
                    timer : 3000,
                    }).then(function() {
                    window.location = "admin.php";
                });
                </script>'; 

    //Display error message if file not uploaded
    } else {
        echo '<script> 
        swal({
            title: "Error in adding items",
            text: "Directing back to listing page...",
            icon: "error",
            buttons: false,
            timer : 3000,
            }).then(function() {
            window.location = "admin.php";
        });
        </script>'; 
    
} 


    
} else {
    header("Location: " . SITE_URL . "admin.php");
} 
//END OF UPLOAD IMAGE FILE SOURCE CODE
?>
