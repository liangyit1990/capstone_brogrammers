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
    <div class="text">Food Management </div>
    
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
              <td class="foodname"><?php echo ucwords($getFoodResult['food_name']); ?></td>
              <td class="foodname"><?php echo $getFoodResult['food_price']; ?></td>
              <td class="foodcalories"><?php echo $getFoodResult['food_calories']; ?></td>
              <td class="foodcategory"><?php echo ucwords($getFoodResult['food_category']); ?></td>
              <td class="foodsubcategory"><?php echo ucwords($getFoodResult['food_subcategory']); ?></td>
              <td class="foodsimg"><img src="<?php echo $getFoodResult['food_img']; ?>"></td>
              <td><button type="button" class="btn btn-primary btn-sm editFood" id="editFood" value="editFood" data-id="<?php echo $getFoodResult['food_id']; ?>" data-bs-toggle="modal" data-bs-target="#foodinfo<?php echo $getFoodResult['food_id']; ?>" >View/Edit</button>
                  <button type="button" class="btn btn-danger btn-sm deleteFood" data-id="<?php echo $getUserResult['food_id']; ?>" data-name="<?php echo $getFoodResult['food_name']; ?>">Delete</button>
              </td>  
            </tr>
            <!-- Modals for each user's View/Edit button -->
            <div class="modal fade" id="foodinfo<?php echo $getFoodResult['food_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Food Id No : <?php echo $getFoodResult['food_id']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <!--Form body -->
                    
                   
                    <form class="foodform" autocomplete="off" >
                        <!--Input values, with values extracted from databases -->
                        <!--Input value for name -->
                        <div class="input-group">
                          <input type="text" name="id" class="form-control id" placeholder="Id" id="id<?php echo $getFoodResult['food_id'];?>" value="<?php echo $getFoodResult['users_id'];?>" hidden>  
                          <input type="text" name="name" class="form-control name " placeholder="Name" id="name<?php echo $getFoodResult['food_id'];?>" value="<?php echo ucwords($getFoodResult['food_name']);?>">
                          <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="bi bi-egg"></i>
                            </div>
                          </div>
                        </div>
                        <!--Input value for Price -->
                        <div class="input-group mt-3">
                          <input type="number" name="price" class="form-control price" placeholder="Price" id="price<?php echo $getFoodResult['food_id'];?>" value="<?php echo $getFoodResult['food_price'] ?>">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                <i class="bi bi-cash"></i>
                              </div>
                          </div>
                        </div>
                        <!--Input value for Calories -->
                        <div class="input-group mt-3">
                          <input type="number" name="calories" class="form-control calories" placeholder="Calories" id="calories<?php echo $getFoodResult['food_id'];?>" value="<?php echo $getFoodResult['food_calories'] ?>">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                 <i class="bi bi-calculator-fill"></i>
                              </div>
                          </div>
                        </div>
                        <!--Select option for Category -->
                        <div class="input-group mt-3">
                          <select class="form-select category<?php echo $getFoodResult['food_id'];?>" aria-label="Default select example">
                            <option disabled >Category</option>
                            <option value="1" <?php if($getFoodResult['food_category'] == 'ala carte') { echo "selected";} ?>>Ala-Carte</option>
                            <option value="2" <?php if($getFoodResult['food_category'] == 'bento') { echo "selected";} ?>>Bento</option>
                          </select>
                        </div>
                        <!--Select option for Sub-category -->
                        <div class="input-group mt-3">
                          <select class="form-select subcategory<?php echo $getFoodResult['food_id'];?>" aria-label="Default select example">
                            <option disabled >Sub-Category</option>
                            <option value="base" <?php if($getFoodResult['food_subcategory'] == 'base') { echo "selected";} ?>>Base</option>
                            <option value="meat" <?php if($getFoodResult['food_subcategory'] == 'meat') { echo "selected";} ?>>Meat</option>
                            <option value="vegetable" <?php if($getFoodResult['food_subcategory'] == 'vegetable') { echo "selected";} ?>>Vegetable</option>
                            <option value="gravy" <?php if($getFoodResult['food_subcategory'] == 'gravy') { echo "selected";} ?>>Gravy</option>
                          </select>
                        </div>
                        <div class="input-group mt-3">
                          <input type="file" name="fileToUpload" class="form-control img" >
                          <img src="<?php echo $getFoodResult['food_img']; ?>">
                        
                          
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
    <button type="button" data-bs-toggle="modal" data-bs-target="#addFood" class="btn btn-primary"><i class="bi bi-plus"></i> Add New Food</button>
    <!-- Modal for adding new user -->
    <div class="modal fade" id="addFood" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Food</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <!--Modal body -->
                  <div class="modal-body">
                    <form id="fupForm" method="post" class="addfoodform" autocomplete="off"  enctype="multipart/form-data">
                        <!--Input values, with values extracted from databases -->
                        <!--Input value for name -->
                        <div class="input-group">
                          <input type="text" name="newname" class="form-control newname " placeholder="Food Name" >
                          <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="bi bi-egg"></i>
                            </div>
                          </div>
                        </div>
                        <!--Input value for Price -->
                        <div class="input-group mt-3">
                          <input type="number" name="newprice" class="form-control newprice" placeholder="Price">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                <i class="bi bi-cash"></i>
                              </div>
                          </div>
                        </div>
                        <!--Input value for Calories -->
                        <div class="input-group mt-3">
                          <input type="number" name="newcalories" class="form-control newcalories" placeholder="Calories">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                 <i class="bi bi-calculator-fill"></i>
                              </div>
                          </div>
                        </div>
                        <!--Select option for Category -->
                        <div class="input-group mt-3">
                          <select class="form-select newcategory" aria-label="Default select example">
                            <option disabled >Category</option>
                            <option value="1" >Ala-Carte</option>
                            <option value="2" >Bento</option>
                          </select>
                        </div>
                        <!--Select option for Sub-category -->
                        <div class="input-group mt-3">
                          <select class="form-select newsubcategory" aria-label="Default select example">
                            <option disabled >Sub-Category</option>
                            <option value="base" >Base</option>
                            <option value="meat" >Meat</option>
                            <option value="vegetable" >Vegetable</option>
                            <option value="gravy" >Gravy</option>
                          </select>
                        </div>
                        <div class="input-group mt-3">
                          <input type="file" name="fileToUpload" class="form-control newfoodimg" >  
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <!--Close and Save btns -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input name="submit" type="submit" class="btn btn-primary submitBtn" value="Submit">
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

  
  $("#btn").click(function(){
    $(".sidebar").toggleClass("active");
  })

  // $('#addUser').on('hidden.bs.modal', function() {
  //   location.reload();
  // })

   
   //Execute functions upon clicking of delete button
  // $(".deleteUser").click(function(){
  //   var thisBtn = this;
  //   var deleteId = $(this).data('id');
  //   var deleteName = $(this).data('name');
  //   var userid = `.userdata${deleteId}`;
  //   //Alert message before confirm to delete
  //   swal({
  //     title: `Are you sure you want to delete ${deleteName}`,
  //     text: "Once deleted, you will not be able to recover this user!",
  //     icon: "warning",
  //     buttons: true,
  //     dangerMode: true,
  //   })
  //   .then((willDelete) => {
  //     //Proceed to delete if user press okay, else do nothing
  //     if (willDelete) {
  //         swal("Poof! User has been deleted!", {
  //         icon: "success",
  //       });
  //       //Ajax to delete user from database
  //       $.ajax({
  //         url: 'deleteuser.php', //action
  //         method: 'POST', //method
  //         data:{
  //           deleteId:deleteId
  //         },
  //         success:function(data){
  //           console.log(data);
  //           if(data == 1){
  //             $(thisBtn).closest('.userdata').remove();
  //           } else {
  //                   alert(data);
  //                 }
  //         }
  //       });
  //     } 
  //   });
                
  // });

  //Execute functions upon clicking of save changes
  // $(".savebtn").click(function(){ 
          
  //   //Retrieve values from input boxes
  //   var permission = '';
  //   var id = $(this).parent().parent().find(".id").val();
  //   var name = $(this).parent().parent().find(".name").val();
  //   var email = $(this).parent().parent().find(".email").val();
  //   var phone = $(this).parent().parent().find(".phone").val();
  //   var address = $(this).parent().parent().find(".address").val();
  //   var permissionchecked = $(this).parent().parent().find(".permission").prop("checked");
  //   //Check for value of radio buttons for gender
  //   var genderchecked = $(`input[name='gender${id}']:checked`).val();
  //   if(genderchecked == 'male') {
  //     gender = 1;
  //   } else if (genderchecked == 'female') {
  //     gender = 0;
  //   }
  //   var editUser = $(".editUser").val();
  //   //Check for value of permission checkbox
  //   if (permissionchecked == true) {
  //     var permission = 1;
  //   } else {
  //     var permission = 0;
  //   }
  //         // console.log(id);
  //         // console.log(name);
  //         // console.log(email);
  //         // console.log(phone);
  //         // console.log(address);
  //         // console.log(genderchecked);
  //         // console.log(gender);
  //         // console.log(permission);
  //         // console.log(editUser);
          
  //   //Ajax to update users info
  //   $.ajax({
  //     url: 'editusers.php', //action
  //     method: 'POST', //method
  //     data:{
  //     id:id,
  //     name:name,
  //     email:email,
  //     phone:phone,
  //     address:address,
  //     gender:gender,
  //     permission:permission,
  //     editUser:editUser
  //     },
  //     success:function(data){
  //       if(data==2){
  //         swal("Success!", "User Profile Updated", "success");
  //         var userid = `.userdata${id}`;
  //         $(userid).find('td').eq(1).text(name);
  //         $(userid).find('td').eq(2).text(email);
  //       } else {
  //           swal("Error!", "Please ensure all sections are filled up", "error");
  //       }
                  
  //     }
  //   });       
  // })

  $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'foodupload.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(response){ //console.log(response);
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});


});
</script>

</body>
</html>