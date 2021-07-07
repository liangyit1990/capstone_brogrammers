<?php 
include "../config/config.php";
include "../config/db.php";
include "../config/functions.php"; 

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Admin | CALORICE </title>
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="icon" href="images/logo.png">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--Bootstrap Latest compiled and minified CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

   </head>
<body>
  <!-- Include adminheader -->
  <?php 
  include "adminheader.php";
  ?>

  <div class="home_content">
    <div class="text">Admin Management </div>
    
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Food ID</th>
            <th scope="col">Food Name</th>
            <th scope="col">Food Price</th>
            <th scope="col">Food Calories</th>
            <th scope="col">Food Category</th>
            <th scope="col">Food Subcategory</th>
            <th scope="col">Food Image</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
       
        <tbody>
        <!--Retrieve user infro from database -->
        <?php 
        $getFoodQuery = DB::query("SELECT * FROM food");
        foreach($getFoodQuery as $getFoodResult){
        
        ?>
            <!-- Output users data in table forms -->
            <tr class="fooddata fooddata<?php echo $getFoodResult['food_id']; ?>">
              <td class="foodid"><?php echo $getFoodResult['food_id']; ?></td>
              <td class="foodname"><?php echo $getFoodResult['food_name']; ?></td>
              <td class="foodname"><?php echo $getFoodResult['food_price']; ?></td>
              <td class="foodcalories"><?php echo $getFoodResult['food_calories']; ?></td>
              <td class="foodcategory"><?php echo $getFoodResult['food_category']; ?></td>
              <td class="foodsubcategory"><?php echo $getFoodResult['food_subcategory']; ?></td>
              <td class="foodsimg"><img src="<?php echo $getFoodResult['food_img']; ?>"></td>
              <td><button type="button" class="btn btn-primary btn-sm editFood" id="editFood" value="editFood" data-id="<?php echo $getFoodResult['food_id']; ?>" data-bs-toggle="modal" data-bs-target="#foodinfo<?php echo $getFoodResult['food_id']; ?>" >View/Edit</button>
                  <button type="button" class="btn btn-danger btn-sm deleteFood" data-id="<?php echo $getUserResult['food_id']; ?>" data-name="<?php echo $getFoodResult['food_name']; ?>">Delete</button>
              </td>  
            </tr>
            <!-- Modals for each user's View/Edit button -->
            <div class="modal fade" id="userinfo<?php echo $getUserResult['users_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Id No : <?php echo $getUserResult['users_id']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <!--Form body -->
                    
                    <p>Member Since : <?php echo $getUserResult['users_joindate'];  ?></p>
                    <form class="userform" autocomplete="off" >
                        <!--Input values, with values extracted from databases -->
                        <!--Input value for name -->
                        <div class="input-group">
                          <input type="text" name="id" class="form-control id" placeholder="Id" id="id<?php echo $getUserResult['users_id'];?>" value="<?php echo $getUserResult['users_id'];?>" hidden>  
                          <input type="text" name="name" class="form-control name " placeholder="Name" id="name<?php echo $getUserResult['users_id'];?>" value="<?php echo $getUserResult['users_name'];?>">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <i class="bi bi-person-fill"></i>
                            </div>
                          </div>
                        </div>
                        <!--Input value for Email -->
                        <div class="input-group mt-3">
                          <input type="email" name="email" class="form-control email" placeholder="Email" id="email<?php echo $getUserResult['users_email'];?>" value="<?php echo $getUserResult['users_email'] ?>">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                <i class="bi bi-envelope-fill"></i>
                              </div>
                          </div>
                        </div>
                        <!--Input value for Phone -->
                        <div class="input-group mt-3">
                          <input type="text" name="phone" class="form-control phone" placeholder="Phone" id="phone<?php echo $getUserResult['users_id'];?>" value="<?php echo $getUserResult['users_phone'] ?>">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                <i class="bi bi-telephone-fill"></i>
                              </div>
                          </div>
                        </div>
                        <!--Radio buttons for Gender-->
                        <div class="input-group mt-3">
                          <div class="form-check">
                            <input class="form-check-input gender" type="radio" name="gender<?php echo $getUserResult['users_id']; ?>"  value="male" <?php if($getUserResult['users_gender'] == 1) { echo "checked";} ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                              Male
                            </label>
                          </div>
                          <div class="form-check ">
                            <input class="form-check-input gender" type="radio" name="gender<?php echo $getUserResult['users_id']; ?>"  value="female"  <?php if($getUserResult['users_gender'] == 0) { echo "checked";} ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                              Female
                            </label>
                          </div>
                        </div>
                        <!--Input value for Address -->
                        <div class="input-group mt-3">
                          <textarea class="form-control address" id="exampleFormControlTextarea1<?php echo $getUserResult['users_id'];?>" rows="3" id="address<?php echo $getUserResult['users_id'];?>" name="newadd" ><?php echo $getUserResult['users_address'] ?></textarea>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <i class="bi bi-house-door-fill"></i>
                            </div>
                          </div>
                        </div>
                        <!--Input value for permission -->
                        <div class="input-group mt-3">
                          <div class="form-check form-switch">
                            <input class="form-check-input permission" type="checkbox" id="flexSwitchCheckChecked<?php echo $getUserResult['users_id'];?>" id="permission<?php echo $getUserResult['users_id'];?>" <?php if($getUserResult['users_permission'] == 1){echo "checked"; }?>>
                            <label class="form-check-label" for="flexSwitchCheckChecked<?php echo $getUserResult['users_id'];?>">Admin Permission</label>
                          </div>
                        </div>

                    </form>
                  </div>
                  <div class="modal-footer">
                    <!--Close and Save btns -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary savebtn">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            

        <?php 
        }
        ?>
        </tbody>
        <tfoot>
          <tr>
            <th scope="col">Food ID</th>
            <th scope="col">Food Name</th>
            <th scope="col">Food Price</th>
            <th scope="col">Food Calories</th>
            <th scope="col">Food Category</th>
            <th scope="col">Food Subcategory</th>
            <th scope="col">Food Image</th>
            <th scope="col">Action</th>
          </tr>
        </tfoot>
    </table>
    <!--Button to add new user -->
    <button type="button" data-bs-toggle="modal" data-bs-target="#addUser" class="btn btn-primary"><i class="bi bi-plus"></i> Add New User</button>
    <!-- Modal for adding new user -->
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form class="userform" autocomplete="off" >
                        <!--Input values, with values extracted from databases -->
                        <!--Input value for name -->
                        <div class="input-group"> 
                          <input type="text" name="newname" class="form-control newname" placeholder="Name" >
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <i class="bi bi-person-fill"></i>
                            </div>
                          </div>
                        </div>
                        <!--Input value for Email -->
                        <div class="input-group mt-3">
                          <input type="email" name="newemail" class="form-control newemail" placeholder="Email">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                <i class="bi bi-envelope-fill"></i>
                              </div>
                          </div>
                        </div>
                        <!--Input value for password -->
                        <div class="input-group mt-3">
                          <input type="password" name="newpassword" class="form-control newpassword" placeholder="Password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="bi bi-file-lock"></i>
                            </div>
                          </div>
                        </div>
                        <!--Input value to confirm password -->
                        <div class="input-group mt-3">
                          <input type="password" name="newcfmpassword" class="form-control newcfmpassword" placeholder="Confirm Password">
                          <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="bi bi-file-lock-fill"></i>
                            </div>
                          </div>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <!--Close and Save btns -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary addbtn">Add User</button>
                  </div>
                </div>
              </div>
            </div>

  </div>

 


<!-- bootstrap jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
$(document).ready(function(){

  //  let btn = document.querySelector("#btn");
  //  let sidebar = document.querySelector(".sidebar");
  //  let searchBtn = document.querySelector(".bx-search");

  //  btn.onclick = function() {
  //    sidebar.classList.toggle("active");
  //  }
  //  searchBtn.onclick = function() {
  //    sidebar.classList.toggle("active");
  //  }
  $("#btn").click(function(){
    $(".sidebar").toggleClass("active");
  })

  $('#addUser').on('hidden.bs.modal', function() {
    location.reload();
  })

   
   //Execute functions upon clicking of delete button
  $(".deleteUser").click(function(){
    var thisBtn = this;
    var deleteId = $(this).data('id');
    var deleteName = $(this).data('name');
    var userid = `.userdata${deleteId}`;
    //Alert message before confirm to delete
    swal({
      title: `Are you sure you want to delete ${deleteName}`,
      text: "Once deleted, you will not be able to recover this user!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      //Proceed to delete if user press okay, else do nothing
      if (willDelete) {
          swal("Poof! User has been deleted!", {
          icon: "success",
        });
        //Ajax to delete user from database
        $.ajax({
          url: 'deleteuser.php', //action
          method: 'POST', //method
          data:{
            deleteId:deleteId
          },
          success:function(data){
            console.log(data);
            if(data == 1){
              $(thisBtn).closest('.userdata').remove();
            } else {
                    alert(data);
                  }
          }
        });
      } 
    });
                
  });

  //Execute functions upon clicking of save changes
  $(".savebtn").click(function(){ 
          
    //Retrieve values from input boxes
    var permission = '';
    var id = $(this).parent().parent().find(".id").val();
    var name = $(this).parent().parent().find(".name").val();
    var email = $(this).parent().parent().find(".email").val();
    var phone = $(this).parent().parent().find(".phone").val();
    var address = $(this).parent().parent().find(".address").val();
    var permissionchecked = $(this).parent().parent().find(".permission").prop("checked");
    //Check for value of radio buttons for gender
    var genderchecked = $(`input[name='gender${id}']:checked`).val();
    if(genderchecked == 'male') {
      gender = 1;
    } else if (genderchecked == 'female') {
      gender = 0;
    }
    var editUser = $(".editUser").val();
    //Check for value of permission checkbox
    if (permissionchecked == true) {
      var permission = 1;
    } else {
      var permission = 0;
    }
          // console.log(id);
          // console.log(name);
          // console.log(email);
          // console.log(phone);
          // console.log(address);
          // console.log(genderchecked);
          // console.log(gender);
          // console.log(permission);
          // console.log(editUser);
          
    //Ajax to update users info
    $.ajax({
      url: 'editusers.php', //action
      method: 'POST', //method
      data:{
      id:id,
      name:name,
      email:email,
      phone:phone,
      address:address,
      gender:gender,
      permission:permission,
      editUser:editUser
      },
      success:function(data){
        if(data==2){
          swal("Success!", "User Profile Updated", "success");
          var userid = `.userdata${id}`;
          $(userid).find('td').eq(1).text(name);
          $(userid).find('td').eq(2).text(email);
        } else {
            swal("Error!", "Please ensure all sections are filled up", "error");
        }
                  
      }
    });       
  })

  $(".addbtn").click(function(){ 

    var name = $(".newname").val();
    var email = $(".newemail").val();
    var password = $(".newpassword").val();
    var cfmpassword = $(".newcfmpassword").val();
    var addbtn = $(".addbtn").val();

    // console.log(name);
    // console.log(email);
    // console.log(password);
    // console.log(cfmpassword);

    $.ajax({
      url: 'insertuser.php', //action
      method: 'POST', //method
      data:{
      name:name,
      email:email,
      password : password,
      cfmpassword : cfmpassword,
      addbtn : addbtn
      },
      success:function(data){
        if(data==1) {
          swal("Error!", "Please ensure all sections are filled up properly", "error");
        } else if (data==2){
            swal("Error!", "Both of your passwords don't match!", "error");
        } else if (data==3){
            swal("Error!", "The email has already been used.", "error");
        } else if(data==4) {
            swal("Good job!", "User has been added successfully!", "success");
        }
      }
    }); 


  });


});
</script>

</body>
</html>