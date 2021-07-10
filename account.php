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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title><?php echo SITE_NAME; ?> - My Account</title>
</head>


<?php
    // include "header.php";
    // include header here
?>

<body>

    <div class="container accountcontainer">
        <div class="row">
            <div class="col-sm-3 accountleftlov">
                <!-- <div class="row">
                </div> -->
                <div class="row">
                    <a href="account.php#account">Account Info</a>
                </div>
                <div class="row">
                    <a href="account.php#orders">Orders</a>
                </div>
                <div class="row">
                    <a href="account.php#addresses">Addresses</a>
                </div>
                <div class="row">
                    <a href="<?php echo SITE_URL; ?>">Back to Home</a>
                </div>
                <div class="row">
                    <a href="<?php echo SITE_URL; ?>logout.php">Logout</a>
                </div>
                <!-- <div class="row">
                    <a href="account.php#giftcards">Gift Cards</a>
                </div> -->
            </div>
            <div class="col-sm-9 modernproductblocks accountrightbody">
                <div class="row row-cols-2 accrow basicinforow">
                    <div class="col-lg-6 basicinfobox">
                        <div class="row">
                            <h4>Basic Info</h4><hr>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h5>Name</h5>
                                <p><?php 
                                echo $return_name;
                                ?>
                                </p>
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
                    <div class="col-lg-5 accsendfeedbackbox">
                        <div class="row">
                            <h4>Send Feedback</h4><hr>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>Found something about the site that you don't like? Click below to send us feedback.</p>
                            </div>
                            <div class="col-12">
                                <a href="<?php echo SITE_URL; ?>feedback.php">Send Feedback</a>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row accrow emailrow">
                    <h4>Email</h4><hr>
                    
                    <h5>Current Email</h5>
                    <p><?php echo $return_email; ?></p><hr>

                    <h5>Change Your Email</h5>
                    
                    <form>
                    <!-- <form method="POST" action="php echo htmlspecialchars(SITE_URL . "account.php?id=" . $_COOKIE['users_id']); "> -->
                        <label for="emailUpdate">New Email<span class="redasterisk">*</span></label><br>
                        <input type="email" class="form-control emailUpdate" id="emailUpdate" placeholder="Enter Your New Email" name="emailUpdate" value="<?php echo $dBEmail; ?>"><br>
                        
                        <input type="text" class="form-control idUpdate d-none" name="users_id" value="<?php echo $dBId; ?>"><br>

                        <input type="button" value="Change Email" name="updateUserEmail" class="updateUserEmail">
                    </form>

                </div>


                <div class="row accrow passwordrow">
                    <h4>Password</h4><hr>
                    <h5>Change Your Password</h5>

                    <form>
                        <label for="passwordCurrent">Current Password<span class="redasterisk">*</span></label><br>
                        <input type="password" class="form-control currentpassword" id="passwordCurrent" name="passwordCurrent">
                        <label for="passwordUpdate">New Password<span class="redasterisk">*</span></label><br>
                        <input type="password" class="form-control passwordUpdate" id="passwordUpdate" name="passwordUpdate">
                        <label for="cfmpasswordUpdate">Confirm New Password<span class="redasterisk">*</span></label><br>
                        <input type="password" class="form-control cfmpasswordUpdate" id="cfmpasswordUpdate" name="cfmpasswordUpdate"><br>
                        <input type="text" class="form-control passwordidUpdate d-none" name="passwordusers_id" value="<?php echo $dBId; ?>"><br>

                        <input type="button" value="Change Password" name="updateUserPassword" class="updateUserPassword">
                    </form>
                </div>

                <div class="row accrow ordersplacedrow" id="orders">
                    <div>
                        <h4>Orders Placed</h4>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate blanditiis aperiam asperiores sint aliquam nihil adipisci earum eos delectus quam nam facere ipsum doloribus iusto, similique dignissimos quisquam molestiae quia.</p>
                    </div>

                </div>
                <div class="row accrow addressrow" id="addresses">
                    <h4>Addresses</h4><br>
                </div>


                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>
  
                        <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            abcd
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Submit</button>

                            </div>
                        </div>
                        </div>
                    </div>


                    <!-- <div class="row accrow giftcardsrow" id="giftcards">
                    <h4>Gift Cards</h4>
                    <p><i>Available Soon!</i></p> -->

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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



        });

    </script>

</body>
</html>