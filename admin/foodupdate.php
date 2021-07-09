
<?php
include '../config/config.php';
include "../config/db.php";
include "../config/functions.php";


$nameChecked = $priceChecked = $caloriesChecked = 1;


if(isset($_POST['name'])){
    /* Getting file name */

    
    
   $category = $_POST["category"];
   $subcategory = $_POST["subcategory"];

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

    if(empty($_POST['price'])){
       
        $priceChecked = 1;
    }else{  
        #Validate values for comment and passed into variable
        $price = validateData($_POST['price']);     
        $priceChecked = 0; 
        if(!filter_var($price, FILTER_VALIDATE_FLOAT)){
            
            $priceChecked = 1;
        }
    }

    if(empty($_POST['calories'])){
       
        $caloriesChecked = 1;
    }else{  
        #Validate values for comment and passed into variable
        $calories = validateData($_POST['calories']);     
        $caloriesChecked = 0; 
        if(!filter_var($calories, FILTER_VALIDATE_INT)){
            
            $caloriesChecked = 1;
        }
    }

   /* Check file extension */
   if($priceChecked == 0 && $nameChecked == 0 && $caloriesChecked == 0) { 
      /* Upload file */
      
         DB::update("food", [
            'food_name' => strtolower($name),
            'food_price' => $price,
            'food_calories' => $calories,
            'food_category' => $category,
            'food_subcategory' => $subcategory,
            
        ], "food_id=%i", $_POST['id']);
        echo 2;
        // echo $name;
        // echo ($priceChecked);
        // echo ($nameChecked);
        // echo ($caloriesChecked);
       
        
   } else {
       echo 1;
   } 

 
   exit;
}
?>
