<?php

if(isset($_POST['feedback']) && isset($_FILES['fileToUpload'])) {
    echo "<pre>";
    print_r($_FILES['fileToUpload']);
    echo "</pre>";
    
    // $target_dir = "uploads/";
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
    header("Location: " . SITE_URL);
}

?>