<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

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
            $userQuery = DB::query("SELECT * FROM users WHERE users_email=%s", $loginemail);

            $userPermission = DB::query("SELECT * FROM users WHERE users_email=%s", $loginemail);
            $userCount = DB::count(); 
            if($userCount == 1){ //user exist in database
              foreach($userPermission as $userPermissionResult ) {
                if($userPermissionResult['users_permission'] == 1) {
                  $loginerror = "You are an admin! Please login as an admin";
                } 
                else {
                  foreach($userQuery as $userResult){
                    $dbId = $userResult['users_id'];
                    $dbPermission = $userResult['users_permission'];
                    $dbName = $userResult['users_name'];
                    $dbEmail = $userResult['users_email'];
                    $dbPassword = $userResult['users_password'];
                    // $wcId = $dbId;
                  }
                    if(password_verify($loginpassword, $dbPassword)){
                      setcookie("users_id", $dbId, time() + (86400 * 30)); // 86400 = 1 day
                      setcookie("users_permission", $dbPermission, time() + (86400 * 30)); // 86400 = 1 day
                      setcookie("users_name", $dbName, time() + (86400 * 30)); // 86400 = 1 day
                      setcookie("users_email", $dbEmail, time() + (86400 * 30)); // 86400 = 1 day
                      setcookie("isLoggedIn", 1, time() + (86400 * 30)); // 86400 = 1 day
                      $loginsuccess = 1;
                  } else {
                    $loginerror = "Password is incorrect! Please try again";
                  }

                
               
                }
              }
                
                
            } else if($userCount > 1) {
                $loginerror = "Login error. Please contact the website administrator";
                // echo $loginerror;
            } else {
              $loginerror = "This email doesn't exist. ";
            }
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
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/passtrength.css">
    <link rel="icon" href="images/logo.png">

    <!-- for icon -->
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
        <div class="form-container sign-up-container">
            <form>
                <h1>Create Account</h1>
                
                <input type="text" placeholder="Name" name="name" class="name" value="<?php echo $_POST['name'] ?>">
                <input type="email" placeholder="Email" name="email" class="email" value="<?php echo $_POST['email'] ?>">
                <input type="password" placeholder="Password" class="password" name="password">
                <input type="password" placeholder="Retype Password" class="cfmPassword" name="cfmPassword">
                <button type="button" name="register" data-name="register" class="registerandlogin">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="<?php echo htmlspecialchars(SITE_URL . "login.php"); ?>" method="post">
                <h1>Sign in</h1>
                

                <input type="email" placeholder="Email" name="loginemail">
                <input type="password" placeholder="Password" name="loginpassword">
                <a href="#">Forgot your password?</a>
                <button type="submit" name="login">Sign In</button>
                <p><a href="admin/adminlogin.php" class="adminlogin">Sign in as admin here</a></p>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <a href="index.php" class="logo"><img src="images/logo.png" alt=""></a>
                    <h1>Welcome to Calorice!</h1>
                    <p>Stay in touch and login here</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <a href="index.php" class="logo"><img src="images/logo.png" alt=""></a>
                    <h1>Hello from Calorice!</h1>
                    <p>Enter your personal details and start eating better!</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="footer section bd-container">
        <div class="footer_container bd-grid">
            <div class="footer_content">
                
                <a href="index.php" class="footer_logo">CALORICE</a>
                
                <div>
                    <a href="" class="footer_social"><i class='bx bxl-facebook' ></i></a>
                    <a href="" class="footer_social"><i class='bx bxl-instagram' ></i></a>
                    <a href="" class="footer_social"><i class='bx bxl-twitter' ></i></a>
                    

                </div> 
            </div>
        </div>
    </footer>
<body>


<!-- main js here -->
    <script src="js/register.js"></script>
    <script src="js/jquery.passtrength.js"></script>
<!-- bootstrap jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  <?php

  if($loginerror != ""){ 
    echo 'swal("Oops", "' . $loginerror . '", "error");';
    }

  if($loginerror == "Password is incorrect! Please try again"){
    echo 'swal("Oops", "' . $loginerror . '", "error");';

    }

    if($loginsuccess == 1){ 
    echo 'swal({
     title: "Nice!",
     text: "Logging in now...",
     icon: "success",
     buttons: false,
     timer : 2000,
     }).then(function() {
     window.location = "index.php";
    });';
    }
  ?>

  $(".registerandlogin").click(function(){
            var name = $(".name").val();
            var email = $(".email").val();
            var password = $(".password").val();
            var cfmPassword = $(".cfmPassword").val();
            var register = $(this).data('name');
            
            $.ajax({
                url: 'register.php',
                method: 'POST',
                data: {
                name: name,
                email: email,
                password: password,
                cfmPassword: cfmPassword,
                register: register
                },

                success:function(data){
                    if(data == 1){
                      swal({
                        title: "Your registration is successful!",
                        text: "Please wait while we log you in...",
                        icon: "success",
                        buttons: false,
                        timer : 2500,
                        }).then(function() {
                        window.location = "index.php";
                          });
                    } else if (data == "Please fill up all the fields."){
                        swal("Oops...", "Please fill up all the fields.", "error");
                    } else if (data == "The email you entered has already been used! Please try another email."){
                      swal("Oops...", "The email you entered has already been used! Please try another email.", "error");
                    } else if (data == "Your passwords do not match! Please try again") {
                      swal("Oops...", "Your passwords do not match! Please try again", "error");
                    } else if (data == "Please enter a valid email.") {
                      swal("Oops...", "Please enter a valid email.", "error");
                    }
                  }
            })
          })


</script>

</body>
</html>