<?php
function loginAccountLogout(){
    // if($_COOKIE['users_permission'] == 1){
    //     echo '
    //     <li><a class="nav-link adminpaneltopright active" href="admin.php">Admin Panel</a></li>
    //     <li><a class="nav-link logouttopright" href="logout.php">Logout</a></li>';
    // } else 
    if((isset($_COOKIE['users_id']) || isset($_COOKIE['isLoggedIn']) && $_COOKIE['users_permission'] == 0)){
        echo '
        <li class="nav-item"><a href="account.php" class="nav_link">Account</a></li>
        <li class="nav-item"><a href="logout.php" class="nav_link">Logout</a></li>
        ';
    } else {
        echo '
        <li class="nav-item"><a href="login.php" class="nav_link">Login</a></li>
        ';}
}                    ?>


<!-- Header for main pages -->
<header class="l-header " id="header">
        <nav class="nav bd-container">
            <a href="index.php" class="logo"><img src="images/logo.png" alt=""></a>
            <a href="<?php echo htmlspecialchars(SITE_URL); ?>" class="nav_logo"><h2><strong>CALORICE</strong></h2></a>

            <div class="nav_menu" id="nav-menu">
                <ul class="nav_list">
                    <li class="nav-item"><a href="#home" class="nav_link active-link">Home</a></li>
                    <li class="nav-item"><a href="#menu" class="nav_link">Menu</a></li>
                    <li class="nav-item"><a href="#about" class="nav_link">About</a></li>
                    <li class="nav-item"><a href="<?php echo htmlspecialchars(SITE_URL . "feedback.php"); ?>" class="nav_link">Contact Us</a></li>
                    <!-- <li class="nav-item"><a class="nav_link" data-bs-toggle="modal" data-bs-target="#register">Login/Register</a></li> -->
                    <li class="nav-item"><a href="login.php" class="nav_link">Login</a></li>

                </ul>
            </div>
            

            <div class="nav_toggle" id="nav-toggle">
                <i class='bx bx-cart'></i>
                <i class='bx bxs-food-menu' ></i>
                
            </div>
        </nav>
</header>

<form method="post" action="<?php echo htmlspecialchars(SITE_URL . "admin-upload.php"); ?>" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="text" name="foodname" class="form-control foodname " placeholder="Food Name" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <i class="bi bi-egg-fried"></i>
                                </div>
                            </div>
                            </div>
                            <p class="error"><?php echo $nameError; ?></p>  
                        <div class="input-group">
                            <input type="text" name="foodprice" class="form-control price " placeholder="Food Price" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                $
                                </div>
                            </div>
                            </div>
                            <p class="error"><?php echo $priceError; ?></p>  
                            <div class="input-group ">
                            <input type="file" name="fileToUpload" class="form-control img" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <i class="bi bi-card-image"></i>
                                </div>
                            </div>
                            </div>
                            <p class="error"><?php echo $fileError; ?></p>  
                            <input type="submit" class="btn btn-primary" value="Upload Image" name="upload">





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
                    window.location = "feedback.php";
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
        <!-- <div class="form-container sign-up-container">
            <form action="<?php echo htmlspecialchars(SITE_URL . "admin/login.php"); ?>" method="post">
                <h1>Create Account</h1>
                
                <input type="text" placeholder="Name" name="name" value="<?php echo $_POST['name'] ?>">
                <input type="email" placeholder="Email" name="email" value="<?php echo $_POST['email'] ?>">
                <input type="password" placeholder="Password" name="password">
                <input type="password" placeholder="Retype Password" name="cfmPassword">
                <button type="submit" name="register">Sign Up</button>
            </form>
        </div> -->

    <!-- liang yit's old menu wireframe -->
    <main class="l-main">
        
        <!-- Menu -->
        <section class="menu section bd-container" id="menu">
            <!-- <span class="section-title">Menu</span> -->
            <h1>Menu</h1>
            <div class="menu_container bd-grid">
                <div class="menu_content">
                    <img src="images/ebifrybento.png" alt="" class="menu_img">
                    <h3 class="menu_name">Ebi Fry Bento</h3>
                    <span class="menu_price">SGD 6</span>
                    <span class="menu_calorie">510 Cal</span>
                    <a class="button menu_button add-cart cart1"><i class='bx bxs-cart-download' ><span class="addandbase"> Add</span></i></a>
                </div>
                <div class="menu_content">
                    <img src="images/chickenkaraagebento.png" alt="" class="menu_img">
                    <h3 class="menu_name">Karaage Bento</h3>
                    <span class="menu_price">SGD 6</span>
                    <span class="menu_calorie">530 Cal</span>
                    <a class="button menu_button add-cart cart2"><i class='bx bxs-cart-download' ><span class="addandbase"> Add</i></a>
                </div>
                
                
            </div>
        </section>


    </main>



    <!-- anselm bento div box -->
            <div class="col-4 menubox">
                <div class="row">
                    <p class="text-center">
                        <img src="images/menu/bento/chickenkaraagebento.png" alt="" class="menu_img">
                    </p>
                </div>
                <div class="row namerow">
                    <h4 class="text-center">Ebi Fry Bento</h4>
                </div>
                <div class="row pricerow">
                    <span class="text-center">SGD 6</span>
                </div>
                <div class="row caloriesrow">
                    <span class="text-center">510 Cal</span>
                </div>
                <div class="row addbuttonrow">
                    <a class="addbutton text-center"><i class='bx bxs-cart-download' ></i>Add</a>
                </div>
            </div>



<?php
    $fullName = $companyName = $line1 = $line2 = $country = $zipCode = $saveAddSuccess = "";

    if(isset($_POST['saveAddress'])){
        if((empty($_POST['fullName']) || empty($_POST['line1'])) || (empty($_POST['country']) || empty($_POST['zipCode']))){
            $saveAddError = "Please enter all the required fields!";

            } else{
                $fullName = validateData($_POST['fullName']);
                $companyName = validateData($_POST['companyName']);
                $line1 = validateData($_POST['line1']);
                $line2 = validateData($_POST['line2']);
                $country = validateData($_POST['country']);
                $zipCode = validateData($_POST['zipCode']);
                DB::insert("addresses", [
                    'users_id' => $_COOKIE['users_id'],
                    // 'users_addresses_id' => ,
                    'addresses_fullName' => $fullName,
                    'addresses_companyName' => $companyName,
                    'addresses_line1' => $line1,
                    'addresses_line2' => $line2,
                    'addresses_country' => $country,
                    'addresses_zipCode' => $zipCode,

                ]);
                header("Location: " . SITE_URL . "account.php#addresses?saveAddSuccess=1");
        
            }
    }

?>

<!-- address division for responsiveness -->

                                <div class="col-4 responsivenessneeded">
                                    <div class="row responsivenessneeded">
                                        <h5>Anselm Sim</h5>
                                        <p>BLK 237 Bukit Panjang Ring Road</p>
                                        <p>Line 2</p>
                                        <p>#13-75</p>
                                        <p>Singapore 670237</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <button type="button" class="btn btn-primary btn-sm editAdd">View/Edit</button>
              
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-danger btn-sm deleteAdd">Delete</button>

                                        </div>
                                    </div>
                                </div>
                                
