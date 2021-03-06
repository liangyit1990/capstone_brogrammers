<?php 
include "../config/config.php";
include "../config/db.php";
include "../config/functions.php"; 


isLoggedInasUser();

// Start of Login PHP Code
$loginemail = $loginpassword = $loginerror = $loginsuccess = "";

if(isset($_POST['login'])){
    if(empty($_POST['loginemail']) || empty($_POST['loginpassword'])){
        $loginerror = "Please enter both your email & password!";
        // echo $loginerror;
    } else{
        $loginemail = validateData($_POST['loginemail']);
        $loginpassword = validateData($_POST['loginpassword']);

        if (filter_var($loginemail, FILTER_VALIDATE_EMAIL)) { //validates email legitimacy
            // is a valid email address
            $userQuery = DB::query("SELECT * FROM users WHERE users_email=%s AND users_permission=1", $loginemail);
            $userCount = DB::count(); 
            if($userCount == 1) { //user exist in database
                foreach($userQuery as $userResult){
                    $dbId = $userResult['users_id'];
                    $dbPermission = $userResult['users_permission'];
                    $dbName = $userResult['users_name'];
                    $dbEmail = $userResult['users_email'];
                    $dbPassword = $userResult['users_password'];
                    // $wcId = $dbId;
                }
                
                  if(password_verify($loginpassword, $dbPassword)){
                
                    setcookie("users_id", $dbId, time() + (86400 * 30), "/"); // 86400 = 1 day
                    setcookie("users_permission", $dbPermission, time() + (86400 * 30), "/"); // 86400 = 1 day
                    setcookie("users_name", $dbName, time() + (86400 * 30), "/"); // 86400 = 1 day
                    setcookie("users_email", $dbEmail, time() + (86400 * 30), "/"); // 86400 = 1 day
                    setcookie("isLoggedIn", 1, time() + (86400 * 30), "/"); // 86400 = 1 day
                    $loginsuccess = 1;
                } else {
                  $loginerror = "Password is incorrect! Please try again";
                }
                // else {
                //   $adminerror = 1;
                // }
            } elseif($userCount > 1) {
                $loginerror = "Login error. Please contact the website administrator";
                // echo $loginerror;
            } else {
                $loginerror = "This account has no admin access! Please login as a user";
                // echo $loginerror;
            }
          } else {
            // is not a valid email address

            $loginerror = "Please enter a valid email address/password!";
            $loginemail = "";
            $loginpassword = "";
          }
    }



}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- icons here -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- css here -->
    <link rel="stylesheet" href="login.css">
    <!-- for icon -->
    <link rel="icon" href="../images/logo.png">

    <link href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" rel="stylesheet">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    
    <title><?php echo SITE_NAME; ?></title>
</head>
<body>
    
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="<?php echo htmlspecialchars(SITE_URL . "admin/adminlogin.php"); ?>" method="post">
                <h1>Admin Sign in</h1>

                <input type="email" placeholder="Email" name="loginemail" value="<?php echo $_POST['loginemail'] ?>">
                <input type="password" placeholder="Password" name="loginpassword">
                <a href="#">Forgot your password?</a>
                <button type="submit" name="login">Sign In</button>
                <a href="../login.php" class=""><p>Sign in as user here</p></a>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
               
                <div class="overlay-panel overlay-right">
                    <h1>Hello Admin!</h1>
                  
                </div>
            </div>
        </div>
    </div>

    
<body>


<!-- main js here -->
    <script src="login.js"></script>
<!-- bootstrap jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  <?php
  

  if($loginerror != ""){ 
    echo 'swal("Oops", "' . $loginerror . '", "error");';
    }

    if($loginerror == "Password is incorrect! Please try again"){
    echo 'swal("Oops", "' . $loginerror . '", "error");';

    }

    if($loginsuccess == 1){ 
      //  echo 'swal("Yes!", "Login is successful!", "success");';
       echo 'swal({
        title: "Welcome Admin!",
        text: "Directing you to Admin panel...",
        icon: "success",
        buttons: false,
        timer : 2000,
        }).then(function() {
        window.location = "../admin/adminmanagement.php";
       });';
       }

    if($adminerror == 1){ 
      //  echo 'swal("Yes!", "Login is successful!", "success");';
       echo 'swal({
        title: "This email has no admin access",
        text: "Please kindly login via the user login page",
        icon: "error",
        buttons: false,
        timer : 2000,
        }).then(function() {
        window.location = "../adminlogin.php";
       });';
       }

  ?>
</script>

</body>
</html>