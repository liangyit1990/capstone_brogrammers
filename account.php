<?php 
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

$name = DB::query('SELECT * FROM users WHERE users_id=%i', $_COOKIE['users_id']);
foreach($name as $name_result) {
    $return_name = $name_result['users_name'];
}

$email = DB::query('SELECT * FROM users WHERE users_id=%i', $_COOKIE['users_id']);
foreach($email as $email_result) {
    $return_email = $email_result['users_email'];
}

$memberSince = DB::query('SELECT * FROM users WHERE users_id=%i', $_COOKIE['users_id']);
foreach($memberSince as $memberSince_result) {
    $return_memberSince = $memberSince_result['users_joindate'];
}

$updateUserEmail = DB::query("SELECT users_id, users_email FROM users WHERE users_id=%i", $_COOKIE['users_id']);
foreach($updateUserEmail as $updateUserEmail_result) {
    $dBId = $updateUserEmail_result['users_id'];
    $dBEmail = $updateUserEmail_result['users_email'];
}

$updateUserPassword = DB::query("SELECT users_id, users_password FROM users WHERE users_id=%i", $_COOKIE['users_id']);
foreach($updateUserPassword as $updateUserPassword_result) {
    $dBId = $updateUserPassword_result['users_id'];
    $dBPassword = $updateUserPassword_result['users_password'];
}

// For Addresses
$address = DB::query("SELECT * FROM addresses WHERE users_id=%i", $_COOKIE['users_id']);
foreach($address as $address_result) {
    $dBId = $address_result['users_id'];
    $dBPassword = $address_result['users_password'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png">
    <!-- scroll reveal here
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script> -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- icons here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- css here -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/account.css">
    
    <title><?php echo SITE_NAME; ?></title>
</head>

<body>
    <!-- scroll to top -->
    <a href="#" class="scrolltop " id="scroll-top">
        <i class='bx bx-chevron-up-circle scrolltop_icon' ></i>
    </a>

    <!-- header -->
        <div class="navi">
            
            <a href="index.php" class="logo"><img class="img-logo" src="images/logo.png" alt=""></a>
                
            <div class="row1">
                <a href="account.php" ><i class='bx bxs-user-account'></i>Account</a>
            </div>
            <div class="row1">
                <a href="#orders" onclick="getPage('orders.php')" ><i class='bx bxs-dish'></i>Orders</a>
            </div>
            <div class="row1">
                <a href="#addresses" onclick="getPage('address.php')"><i class='bx bx-building-house' ></i>Addresses</a>
            </div>
            <div class="row1">
                <a href="<?php echo SITE_URL; ?>" ><i class='bx bx-arrow-back' ></i>Back to Home</a>
            </div>
            <div class="row1">
                <a href="<?php echo SITE_URL; ?>logout.php" ><i class='bx bx-log-out'></i>Logout</a>
            </div>
            <div class="moon">
                <i class='bx bx-moon bx-sm symbol' id="theme-button"></i>
            </div>
            <!-- <div class="row">
                <a href="account.php#giftcards">Gift Cards</a>
            </div> -->
        </div>
        <div class="container accountcontainer viewer" id="viewer">
            <div class="row justify-content-md-center">
                
                <div class="container col-xl-9 accountrightbody">
                    <!-- Start of Basic Info Row - Contains basic info, send feedback, change email and change password -->
                    <div id="account" class="row accountpage">
                        <div class="row accrow basicinforow">
                            <div class="col-lg-6 basicinfobox">
                                <div class="row">
                                    <h4 class="accheader">Basic Info</h4><hr>
                                </div>
                                <div class="row basicinfo">
                                    <div class="col-lg-6">
                                        <h5>Name</h5>
                                        <p><?php 
                                        echo $return_name;
                                        ?>
                                        </p><br>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Email</h5>
                                        <p><?php 
                                        echo $return_email;
                                        ?>
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <h5>Member Since</h5>
                                        <p><?php 
                                        echo displayDate($return_memberSince);
                                        ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 accsendfeedbackbox feed ">
                                <div class="row">
                                    <h4 class="accheader">Send Feedback</h4>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Found something about the site that you don't like? Click here to send us feedback.</p><br>
                                    </div>
                                    <div class="col-12">
                                        <a href="<?php echo SITE_URL; ?>feedback.php">Send Feedback</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row accrow emailrow">
                            <h4 class="accheader">Email</h4><hr>
                            
                            <h5>Current Email</h5>
                            <p class="p"><?php echo $return_email; ?></p>

                            <h5>Change Your Email</h5>
                            
                            <form>
                            <!-- <form method="POST" action="php echo htmlspecialchars(SITE_URL . "account.php?id=" . $_COOKIE['users_id']); "> -->
                                <label for="emailUpdate">New Email<span class="redasterisk">*</span></label><br>
                                <input type="email" class="form-control emailUpdate" id="emailUpdate" placeholder="Enter Your New Email" name="emailUpdate" value="<?php echo $dBEmail; ?>">
                                
                                <input type="text" class="form-control idUpdate d-none" name="users_id" value="<?php echo $dBId; ?>">

                                <button type="button" value="Change Email" name="updateUserEmail" class="updateUserEmail">Change Email</button>
                            </form>

                        </div>

                        <div class="row accrow passwordrow">
                            <h4 class="accheader">Password</h4><hr>
                            <h5>Change Your Password</h5>

                            <form>
                                <label for="passwordCurrent">Current Password<span class="redasterisk">*</span></label><br>
                                <input type="password" class="form-control currentpassword" id="passwordCurrent" name="passwordCurrent" placeholder="Current password">
                                <label for="passwordUpdate">New Password<span class="redasterisk">*</span></label><br>
                                <input type="password" class="form-control passwordUpdate" id="passwordUpdate" name="passwordUpdate" placeholder="New password">
                                <label for="cfmpasswordUpdate">Confirm New Password<span class="redasterisk">*</span></label>
                                <input type="password" class="form-control cfmpasswordUpdate" id="cfmpasswordUpdate" name="cfmpasswordUpdate" placeholder="Confirm new password">
                                <input type="text" class="form-control passwordidUpdate d-none" name="passwordusers_id" value="<?php echo $dBId; ?>">

                                <input type="button" value="Change Password" name="updateUserPassword" class="updateUserPassword">
                            </form>
                        </div>

                    </div>
            </div>
        </div>


    

    <!-- footer -->
    <!-- <footer class="footer section bd-container">
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
    </footer> -->
    


    <!-- bootstrap jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- main js here -->
        <script src="js/main.js"></script>
    
    <script>
        
    <?php
    if($_GET['logoutSuccess'] == 1){
        echo 'swal("Logged Out.", "You have logged out successfully.", "success");';
      }

    if($saveAddError != ""){
        echo 'swal("Opps...", "'. $saveAddError .'", "error");';
      }

    

    ?>
    </script>
    <script type="text/javascript">      

        $(document).ready(function(){

        $(".updateUserEmail").click(function(){
            var thisBtn = this;
            var users_id = $(".idUpdate").val();
            var users_emailUpdate = $(".emailUpdate").val();
            $.ajax({
                url: 'users_update.php',
                method: 'POST',
                data: {
                users_id: users_id,
                users_emailUpdate: users_emailUpdate 
                },

                success:function(data){
                    if(data == 1){
                        <?php    
                            echo 'swal({
                            title: "Nice",
                            text: "You have successfully changed your email!",
                            icon: "success",
                            buttons: false,
                            timer : 2000,
                            }).then(function() {
                            window.location = "account.php";
                            });';
                        ?>    
                    } else if (data == "Please enter an email address to proceed!"){
                        <?php
                        echo 'swal("Oops...", "Please enter an email address to proceed!", "error");';
                        ?>
                    } else if (data == "Please enter a different email address!"){
                        <?php
                        echo 'swal("Oops...", "Please enter a different email address!", "error");';
                        ?>
                    } else {
                        <?php
                        echo 'swal("Oops...", "You are currently using this email! Please enter a different email address.", "error");';
                        ?>
                    }
                }
            })
        })

        $(".updateUserPassword").click(function(){
            var thisBtn = this;
            var passwordusers_id = $(".passwordidUpdate").val();
            var users_currentpassword = $(".currentpassword").val();
            var users_passwordUpdate = $(".passwordUpdate").val();
            var users_cfmpasswordUpdate = $(".cfmpasswordUpdate").val();
            $.ajax({
                url: 'users_update.php',
                method: 'POST',
                data: {
                passwordusers_id: passwordusers_id,
                users_currentpassword: users_currentpassword,
                users_passwordUpdate: users_passwordUpdate,
                users_cfmpasswordUpdate: users_cfmpasswordUpdate 
                },
                success:function(data){
                    if(data == 2){
                        <?php    
                            echo 'swal({
                            title: "Nice",
                            text: "You have successfully changed your password!",
                            icon: "success",
                            buttons: false,
                            timer : 2000,
                            }).then(function() {
                            window.location = "account.php";
                            });';
                        ?>    
                    } else if (data == "Please fill up all the required fields!"){
                        <?php
                        echo 'swal("Oops...", "Please fill up all the required fields!", "error");';
                        ?>
                    } else if (data == "Your newly entered passwords do not match! Please try again!"){
                        <?php
                        echo 'swal("Oops...", "Your newly entered passwords do not match! Please try again!", "error");';
                        ?>
                    } else if (data == "You are currently using this password! Please try another password!"){
                        <?php
                        echo 'swal("Oops...", "You are currently using this password! Please try another password!", "error");';
                        ?>
                    } else {
                        <?php
                        echo 'swal("Oops...", "Your Current Password is Wrong! Please try again!", "error");';
                        ?>
                    }
                }
            })
        })

        $(".saveAddress").click(function(){
            
            var thisBtn = this;
            var users_id = $(".hiddenusersid").val();
            var fullName = $(".fullName").val();
            var company = $(".company").val();
            var line1 = $(".line1").val();
            var line2 = $(".line2").val();
            var unitNo = $(".unitNo").val();
            var country = $(".country").val();
            var zipCode = $(".zipCode").val();

            $.ajax({
                url: 'addaddress.php',
                method: 'POST',
                data: {
                users_id: users_id,
                fullName: fullName,
                company: company,
                line1: line1,
                line2: line2,
                unitNo: unitNo,
                country: country, 
                zipCode: zipCode,
                },
                success:function(data){
                    console.log(data);
                    if(data == 1){
                            swal({
                            title: "Nice",
                            text: "Address has been added!",
                            icon: "success",
                            buttons: false,
                            timer : 2000,
                            }).then(function() {
                                location.reload();
                            // window.location = "account.php#addresses";
                            });

                    } else if (data == "Please enter all the required fields"){
                        swal("Oops...", "Please enter all the required fields", "error");
                    } else if (data == "Please enter a different address"){
                        swal("Oops...", "Please enter a different address", "error");
                    } 
                    
                }
            })
        })


        $(".saveAddressChanges").click(function(){
            var saveId = $(this).data('id'); //data-id class
            // var users_id = $(".hiddenusersid").val();
            var fullName = $(`.fullName${saveId}`).val();
            var company = $(`.company${saveId}`).val();
            var line1 = $(`.line1${saveId}`).val();
            var line2 = $(`.line2${saveId}`).val();
            var unitNo = $(`.unitNo${saveId}`).val();
            var country = $(`.country${saveId}`).val();
            var zipCode = $(`.zipCode${saveId}`).val();
            var editAdd = $(".editAdd").val();
                // console.log(fullName);
                // console.log(company);
                // console.log(line1);
                // console.log(line2);
                // console.log(unitNo);
                // console.log(country);
                // console.log(zipCode);
                // console.log(editAdd);
                
          //Ajax to update users info
          $.ajax({
            // url: 'adminedit.php', 
            // method: 'POST', 
            // data:{
            // id:id,
            // name:name,
            // email:email,
            // phone:phone,
            // address:address,
            // gender:gender,
            // permission:permission,
            // editUser:editUser
            // },
            // success:function(data){
            //   if(data==2){
            //     swal("Success!", "User Profile Updated", "success");
            //     var userid = `.userdata${id}`;
            //     $(userid).find('td').eq(1).text(name);
            //     $(userid).find('td').eq(2).text(email);
            //   } else {
            //       swal("Error!", "Please ensure all sections are filled up", "error");
            //   }
                        
            // }
          });       
        })
      




        $(".deleteAdd").click(function(){
            var thisBtn = this;
            var deleteId = $(this).data('id'); //data-id class
            // var userid = `.userdata${deleteId}`;
            //Alert message before confirm to delete
            swal({
            title: `Are you sure you want to delete?`,
            text: "Once deleted, you will not be able to recover the address!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            //Proceed to delete if user press okay, else do nothing
            if (willDelete) {

                //Ajax to delete user from database
                $.ajax({
                url: 'deleteaddress.php', //action
                method: 'POST', //method
                data:{
                    deleteId:deleteId
                },


                success:function(data){
                    
                    if(data == 1){
                        swal("Address deleted successfully", {
                        icon: "success",
                        timer : 2000

                        }).then(function() {
                                location.reload();
                        });

                        // location.reload();
                    } 
                    
                    // else {
                    //         alert(data);
                    //     }
                }
                });
            } 
            });
                
        });


        });

    </script>

</body>
</html>