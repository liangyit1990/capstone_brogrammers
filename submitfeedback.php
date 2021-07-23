
<?php
include 'config/config.php';
include "config/db.php";
include "config/functions.php";


$nameChecked = $emailChecked = $topicChecked = $msgChecked = 1;
$uploadOk = 0;

if(isset($_POST['name'])){

    
    //If there is a file uploaded, execute the following functions
   if(isset($_FILES['file']['name'])) {
        $count = 0;
        $filename = date("dmy").'-'.$_FILES['file']['name']  ;
        $location = "submittedfile/".$filename;
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);
        $valid_extensions = array("jpg","jpeg","png","pdf");
         while (file_exists($location)) {
            $count++;
            $filename = date("dmy").'-'.$count.'-'.$_FILES['file']['name'] ;
            $location = "submittedfile/".$filename;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
             
            }
   
    }
    
    //Check if name input is empty
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

    //Check if email input is empty
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

    //Check if email input is empty
    if(empty($_POST['topic'])){
        $topicChecked = 1;
    }else{
        #Validate values for comment and passed into variable
        $topic = validateData($_POST['topic']);
        $topicChecked = 0;
        
    }   

    if(empty($_POST['message'])){
        $messageChecked = 1;
    }else{
        #Validate values for comment and passed into variable
        $message = validateData($_POST['message']);
        $messageChecked = 0;
        
    }   



   /* Check file extension */
   if($nameChecked == 0 && $emailChecked == 0 && $topicChecked == 0 && $messageChecked == 0 && $uploadOk == 0) { 
      //Check and see if there is any file to upload
      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
          //if yes, upload all values and file to DB
            DB::insert("feedbackothers", [
            'feedbackothers_name' => strtolower($name),
            'feedbackothers_email' => strtolower($email),
            'feedbackothers_topic' => strtolower($topic),
            'feedbackothers_message' => strtolower($message),
            'feedbackothers_file' => $location
        ]);
    
        echo 1;

         } else {
             //Else only insert data values to DB
            DB::insert("feedbackothers", [
                'feedbackothers_name' => strtolower($name),
                'feedbackothers_email' => strtolower($email),
                'feedbackothers_topic' => strtolower($topic),
                'feedbackothers_message' => strtolower($message),
            ]);
            //Echo "success"
            echo 1;
     }
        
   } else {
       echo 2;
       
   } 

 
   exit;
} else {
    header("Location: " . SITE_URL);
}
?>
