<?php 
include "../config/config.php";
include "../config/db.php";
include "../config/functions.php"; 

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo SITE_NAME; ?> - Food Management</title>
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="icon" href="../images/logo.png">

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
                  <button type="button" class="btn btn-danger btn-sm deleteFood" data-id="<?php echo $getFoodResult['food_id']; ?>" data-url="<?php echo $getFoodResult['food_img'] ?>" data-name="<?php echo $getFoodResult['food_name']; ?>" >Delete</button>
              </td>  
            </tr>
            <!-- Modals for each user's View/Edit button -->
            <div class="modal fade foodinfo" id="foodinfo<?php echo $getFoodResult['food_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Food Id No : <?php echo $getFoodResult['food_id']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <!--Form body -->
                    
                   
                    <form class="foodform" autocomplete="off" method="post" enctype="multipart/form-data" >
                        <!--Input values, with values extracted from databases -->
                        <!--Input value for name -->
                        <div class="input-group">
                          <input type="text" name="id" class="form-control id" placeholder="Id" id="id<?php echo $getFoodResult['food_id'];?>" value="<?php echo $getFoodResult['food_id'];?>" hidden>  
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
                          <select class="form-select category category<?php echo $getFoodResult['food_id'];?>" aria-label="Default select example">
                            <option disabled >Category</option>
                            <option value="ala carte" <?php if($getFoodResult['food_category'] == 'ala carte') { echo "selected";} ?>>Ala-Carte</option>
                            <option value="bento" <?php if($getFoodResult['food_category'] == 'bento') { echo "selected";} ?>>Bento</option>
                          </select>
                        </div>
                        <!--Select option for Sub-category -->
                        <div class="input-group mt-3">
                          <select class="form-select subcategory subcategory<?php echo $getFoodResult['food_id'];?>" aria-label="Default select example">
                            <option disabled >Sub-Category</option>
                            <option value="base" <?php if($getFoodResult['food_subcategory'] == 'base') { echo "selected";} ?>>Base</option>
                            <option value="meat" <?php if($getFoodResult['food_subcategory'] == 'meat') { echo "selected";} ?>>Meat</option>
                            <option value="vegetable" <?php if($getFoodResult['food_subcategory'] == 'vegetable') { echo "selected";} ?>>Vegetable</option>
                            <option value="gravy" <?php if($getFoodResult['food_subcategory'] == 'gravy') { echo "selected";} ?>>Gravy</option>
                          </select>
                        </div>
                        <div class="input-group mt-3">
                          <input type="file" id="imgreplace<?php echo $getFoodResult['food_id'];?>" name="file" class="form-control imgreplace" >
                          <img class="originalimg" src="<?php echo $getFoodResult['food_img']; ?>">
                        </div>
                        <div class="modal-footer">
                         <!--Close and Save btns -->
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary updateBtn">Save changes</button>
                        </div>
                    </form>
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
                    <form id="fupForm" method="post" enctype="multipart/form-data">
                        <!--Input values, with values extracted from databases -->
                        <!--Input value for name -->
                        <div class="input-group form-group">
                          <input type="text" name="newname" class="form-control newname " placeholder="Food Name" >
                          <div class="input-group-append">
                            <div class="input-group-text">
                            <i class="bi bi-egg"></i>
                            </div>
                          </div>
                        </div>
                        <!--Input value for Price -->
                        <div class="input-group form-group mt-3">
                          <input type="text" name="newprice" class="form-control newprice" placeholder="Price">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                <i class="bi bi-cash"></i>
                              </div>
                          </div>
                        </div>
                        <!--Input value for Calories -->
                        <div class="input-group form-group mt-3">
                          <input type="number" name="newcalories" class="form-control newcalories" placeholder="Calories">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                 <i class="bi bi-calculator-fill"></i>
                              </div>
                          </div>
                        </div>
                        <!--Select option for Category -->
                        <div class="input-group form-group mt-3">
                          <select class="form-select newcategory" aria-label="Default select example">
                            <option disabled >Category</option>
                            <option value="ala carte" >Ala-Carte</option>
                            <option value="bento" >Bento</option>
                          </select>
                        </div>
                        <!--Select option for Sub-category -->
                        <div class="input-group form-group mt-3">
                          <select class="form-select newsubcategory" aria-label="Default select example">
                            <option disabled >Sub-Category</option>
                            <option value="base" >Base</option>
                            <option value="meat" >Meat</option>
                            <option value="vegetable" >Vegetable</option>
                            <option value="gravy" >Gravy</option>
                          </select>
                        </div>
                        <div class="input-group form-group mt-3">
                          <input type="file" class="form-control" id="file" name="file" required />
                        </div>
                        <div class="modal-footer">
                        <!--Close and Save btns -->
                        <button type="button" class="btn btn-secondary closebtn" data-bs-dismiss="modal">Close</button>
                          <input type="button" id="but_upload" class="btn btn-success submitBtn" value="SUBMIT"/>
                        </div> 
                    </form>
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
  });

  $('#addFood').on('hidden.bs.modal', function() {
    location.reload();
  })

  $('.foodinfo').on('hidden.bs.modal', function() {
    location.reload();
  })

  $("#file, .imgreplace").change(function() {
    var file = this.files[0];
    var fileType = file.type;
    var match = ['image/jpeg', 'image/png', 'image/jpg'];
    if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
        swal("Error!", "Please only upload image format such as 'jpeg', 'png' or 'jpg' ", "error");
        $("#file").val('');
        $(".imgreplace").val('');

       
    }
  });

  $(".submitBtn").click(function(){
        
        var fd = new FormData();
        var files = $('#file')[0].files;
        var name = $('.newname').val();
        var price = $('.newprice').val();
        var calories = $('.newcalories').val();
        var category = $('.newcategory').val();
        var subcategory = $('.newsubcategory').val();
        
        
        

           fd.append('file',files[0]);
           fd.append('name',name);
           fd.append('price',price);
           fd.append('calories',calories);
           fd.append('category',category);
           fd.append('subcategory',subcategory);
           

           $.ajax({
              url: 'foodupload.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(data){
                 if(data == 1){
                    swal("Good job!", "Food has been added successfully!", "success");
                    $('.newname').val("");
                    $('.newprice').val("");
                    $('.newcalories').val("");
                    $('#file').val("");
                    
                 }else if (data == 2) {
                    swal("Error!", "Image with duplicate same file name has been found.", "error");
                 } else if (data == 3) {
                    swal("Error!", "Please fill up all the sections", "error");
                 }
              }
           });
        
    


  });

  $(".deleteFood").click(function(){
            
    var thisBtn = this;
    var deleteId = $(this).data('id');
    var deleteName = $(this).data('name');
    var deleteUrl = $(this).data('url');

            
    //Display alert message before confirming to delete
    swal({
      title: `Are you sure you want to delete ${deleteName}?`,
      text: "Once deleted, you will not be able to recover this food listing!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
        //Proceed to delete if user confirms
         if (willDelete) {
            swal("Poof! Food listing has been deleted!", {
            icon: "success",
            });
            $.ajax({
            url: 'fooddelete.php', //action
            method: 'POST', //method
            data:{
              foodId:deleteId,
              foodImg:deleteUrl
              },
              //Remove data from website
              success:function(data){
                if(data = 1){
                    $(thisBtn).closest('.fooddata').remove();
                } else if (data = 2) {
                    swal("Error!", "There is an error deleting the listing", "error");
                  }
              }
            });
          } 
      });            
  });


        $(".updateBtn").click(function(){
          
        
        var replace = new FormData();
        
        var files = $(this).parent().parent().find('.imgreplace')[0].files;
        var imgpath = "uploads/" +  $(this).parent().parent().find('.imgreplace').val().split('\\').pop();
        var id = $(this).parent().parent().find(".id").val();
        var name = $(this).parent().parent().find(".name").val();
        var price = $(this).parent().parent().find(".price").val();
        var calories = $(this).parent().parent().find(".calories").val();
        var category = $(this).parent().parent().find(".category").val();
        var subcategory = $(this).parent().parent().find(".subcategory").val();
        var img = $(this).parent().parent().find(".originalimg").attr('src');
        
        // console.log(id);
        // console.log(imgpath);
        // console.log(name);    
        // console.log(price);
        // console.log(calories);
        // console.log(category);
        // console.log(subcategory);
            
           replace.append('file',files[0]);
           replace.append('id',id);
           replace.append('name',name);
           replace.append('price',price);
           replace.append('calories',calories);
           replace.append('category',category);
           replace.append('subcategory',subcategory);
           replace.append('img',img);
           

           $.ajax({
              url: 'foodupdate.php',
              type: 'post',
              data: replace,
              contentType: false,
              processData: false,
              success:function(data){
                if(data==1){
                  swal("Error!", "Please ensure all sections are filled up properly", "error");
                } else if (data == 2) {
                  swal("Success", "Changes Saved", "success");
                } else if (data == 3) {
                  swal("Error!", "Image with duplicate same file name has been found.", "error");
                } else if (data == 4) {
                  swal("Error!", "Error uploading the image", "error");
                }  else if (data == 5 ) {
                  swal("Success", "Changes Saved", "success")
                      .then((value) => {
                        location.reload();
                      });
                  // console.log(imgpath);

                }
                // console.log(data);
                
              }
            });
    


  });

  

});



</script>

</body>
</html>