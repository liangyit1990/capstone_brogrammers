<?php

include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

// $fullName = $companyName = $line1 = $line2 = $unitNo = $country = $zipCode = $saveAddSuccess = "";

// if(isset($_POST['zipCode'])) {
//     if((empty($_POST['fullName']) || empty($_POST['line1'])) || (empty($_POST['country']) || empty($_POST['zipCode'])) || empty($_POST['unitNo'])){
//         echo "Please enter all the required fields";
// } else {
//     $fullName = validateData($_POST['fullName']);
//     $company = validateData($_POST['company']);
//     $line1 = validateData($_POST['line1']);
//     $line2 = validateData($_POST['line2']);
//     $unitNo = validateData($_POST['unitNo']);   
//     $country = validateData($_POST['country']);
//     $zipCode = validateData($_POST['zipCode']);
//     $checkAddress = DB::query("SELECT * FROM addresses WHERE users_id=%i AND addresses_unitNo=%s  AND addresses_zipCode=%s" , $_COOKIE['users_id'], $unitNo, $zipCode);
//     $checkAddressCount = DB::count();
    
//     if($checkAddressCount == 0) {
//         DB::insert("addresses", [
//                             'users_id' => $_COOKIE['users_id'],
//                             'addresses_fullName' => $fullName,
//                             'addresses_companyName' => $company,
//                             'addresses_line1' => $line1,
//                             'addresses_line2' => $line2,
//                             'addresses_unitNo' => $unitNo,
//                             'addresses_country' => $country,
//                             'addresses_zipCode' => $zipCode,
//                         ]);
//         echo 1;                
//     } else {
//         echo "Please enter a different address";
//         }
//     }
// }



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
        <div class="container accountcontainer viewer" id="viewer">
            <div class="row justify-content-md-center">
                
                <div class="container col-xl-9 accountrightbody">

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Enter an Address</h5>
                                                <!-- The X -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    
                                                </div>

                                                <div class="modal-body">

                                                    <form class="row g-3" method="POST" action="<?php echo SITE_URL . "account.php#addresses"?>">
                                                        <div class="form-group col-12">
                                                            <label for="fullName">Full Name<span class="redasterisk">*</span></label>
                                                            <input type="text" class="form-control fullName" id="fullName" placeholder="" name="fullName" value="">
                                                        </div>
                                                        <!-- <div class="form-group col-md-6">
                                                            <label for="lastName">Last Name<span class="redasterisk">*</span></label>
                                                            <input type="text" class="form-control" id="lastName" placeholder="" name="lastName" value="">
                                                        </div> -->
                                                        <div class="form-group col-12">
                                                            <label for="companyName">Company/Organization</label>
                                                            <input type="text" class="form-control company" id="companyName" placeholder="" name="companyName" value="">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="line1">Address Line 1<span class="redasterisk">*</span></label>
                                                            <input type="text" class="form-control line1" id="line1" placeholder="" name="line1" value="">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="line2">Address Line 2</label>
                                                            <input type="text" class="form-control line2" id="line2" placeholder="" name="line2" value="">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="unitNo">Unit Number<span class="redasterisk">*</span></label>
                                                            <input type="text" class="form-control unitNo" id="unitNo" placeholder="" name="unitNo" value="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="country">Country<span class="redasterisk">*</span></label>
                                                            <select class="form-control country" id="country" placeholder="" name="country" value="">
                                                                <option value="Singapore">Singapore</option>
                                                                <option value="Malaysia">Malaysia</option>
                                                                <!-- <option value="Item Missing in Package">Item Missing in Package</option>
                                                                <option value="Damaged Item Received">Damaged Item Received</option>
                                                                <option value="Wrong Item Received">Wrong Item Received</option> -->
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="zipCode">Zip Code<span class="redasterisk">*</span></label>
                                                            <input type="text" class="form-control zipCode" id="zipCode" placeholder="" name="zipCode" value="">
                                                            <input type="text" class="form-control hiddenusersid d-none" name="users_id" value="<?php echo $dBId; ?>">
                                                        </div>

                                                        <div class="form-group requiredfields">
                                                            <p>Fields marked with a<span class="redasterisk"> * </span> are required.</p>
                                                        </div>
                                                        <!-- <div class="sendmessagebuttoncontainer">
                                                            <button class="btn"><span class="sendmessagebutton">Send Message</span></button>
                                                        </div> -->
                                                    </form>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary saveAddress" name="saveAddress" value="saveAddress">Save</button>
                                                </div>
                                            </div>
                                        </div>
                    </div>


                    <div class="row accrow addressrow accountpage" id="addresses">
                        <div>
                            <h4 class="accheader">My Addresses</h4>
                            <div class="row">
                                <div class="col-4 addaddressdiv">
                                    <div class="row">
                                        <i class="fa fa-plus" style="font-size: 48px"></i>
                                    </div>
                                    <div class="row addbtn">
                                        <a class="addaddressbutton" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Address</a>
                                    </div>                                    
                                    
                                </div>
                                
                                <?php 
                                    $address = DB::query("SELECT * FROM addresses WHERE users_id=%i " , $_COOKIE['users_id']);
                                        foreach($address as $address_result){
                                            echo '<div class="col-4 responsivenessneeded"><div class="row responsivenessneeded"><h5>';
                                            echo $address_result['addresses_fullName']; echo '</h5><p>';
                                            echo $address_result['addresses_line1']; echo '</p><p>';
                                            echo $address_result['addresses_line2']; echo '</p><p>';
                                            echo $address_result['addresses_unitNo']; echo '</p><p>';
                                            echo $address_result['addresses_country'] . " " . $address_result['addresses_zipCode'];
                                            echo '</p></div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <button type="button" class="btn btn-primary btn-sm editAdd" value="editAdd" data-bs-toggle="modal" data-bs-target="#addressinfo';

                                                    echo $address_result['addresses_id'];

                                                    echo '">Edit</button>
                                                </div>
                                                <div class="col-3">
                                                    <button type="button" class="btn btn-danger btn-sm deleteAdd" data-id="';

                                            echo $address_result['addresses_id'];
                                                    
                                            echo '">Delete</button>
                                                </div>
                                            </div>
                                        </div>';

                                        // start of modal for individual address box
                                        echo '
                                        <div class="modal fade" id="addressinfo'; echo $address_result['addresses_id']; echo'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit your Address</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    
                                                </div>

                                                <div class="modal-body">

                                                    <form class="row g-3">
                                                        <div class="form-group col-12">
                                                            <label for="fullName">Full Name<span class="redasterisk">*</span></label>
                                                            <input type="text" class="form-control fullName' . $address_result['addresses_id']; echo'" placeholder="" name="fullName" value="';
                                                            echo $address_result['addresses_fullName'];
                                                            echo'">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="companyName">Company/Organization</label>
                                                            <input type="text" class="form-control company' . $address_result['addresses_id']; echo'" placeholder="" name="companyName" value="';
                                                            echo $address_result['addresses_companyName'];
                                                            echo'">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="line1">Address Line 1<span class="redasterisk">*</span></label>
                                                            <input type="text" class="form-control line1' . $address_result['addresses_id']; echo'" placeholder="" name="line1" value="';
                                                            echo $address_result['addresses_line1'];
                                                            echo'">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="line2">Address Line 2</label>
                                                            <input type="text" class="form-control line2' . $address_result['addresses_id']; echo'" placeholder="" name="line2" value="';
                                                            echo $address_result['addresses_line2'];
                                                            echo'">
                                                        </div>
                                                        <div class="form-group col-12">
                                                            <label for="unitNo">Unit Number<span class="redasterisk">*</span></label>
                                                            <input type="text" class="form-control unitNo' . $address_result['addresses_id']; echo'" placeholder="" name="unitNo" value="';
                                                            echo $address_result['addresses_unitNo'];
                                                            echo'">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="country">Country<span class="redasterisk">*</span></label>
                                                            <select class="form-control country' . $address_result['addresses_id']; echo'" placeholder="" name="country" value="';
                                                            echo $address_result['addresses_country'];
                                                            echo'">
                                                                <option value="Singapore">Singapore</option>
                                                                <option value="Malaysia">Malaysia</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="zipCode">Zip Code<span class="redasterisk">*</span></label>
                                                            <input type="text" class="form-control zipCode' . $address_result['addresses_id']; echo'" placeholder="" name="zipCode" value="';
                                                            echo $address_result['addresses_zipCode'];
                                                            echo'">
                                                            <input type="text" class="form-control hiddenusersid d-none" name="users_id" value="';
                                                            echo $_COOKIE['users_id'];
                                                            echo'">
                                                        </div>

                                                        <div class="form-group requiredfields">
                                                            <p>Fields marked with a<span class="redasterisk"> * </span> are required.</p>
                                                        </div>
                                                    </form>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                        <button type="button" class="btn btn-primary saveAddressChanges" name="saveAddressChanges" data-id=" ';
                                                        
                                                        echo $address_result['addresses_id'];
                                                        
                                                       echo '">Save Changes</button></div></div></div></div>';     
                                        }
                                
                                ?>


                            </div>
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

   $('.addaddressbutton').click(function(){
       cosole.log('hello');
   })
        $(document).ready(function(){

        $(document).on('click',$(".saveAddress") , function(event){
        
            console.log('hello');
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