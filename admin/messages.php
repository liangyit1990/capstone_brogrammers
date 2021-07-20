<?php 
include "../config/config.php";
include "../config/db.php";
include "../config/functions.php"; 

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo ADMIN_SITE_NAME; ?> - Messages</title>
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="icon" href="../images/logo.png">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--Bootstrap Latest compiled and minified CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

   </head>
<body>
  <!-- Include adminheader -->
  <?php 
  include "adminheader.php";
  ?>

  <div class="home_content">
    <div class="text">Messages</div>
    <table id="myTable" class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Feedback ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Topic</th>
            <th scope="col">Message</th>
            <th scope="col">File</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
       
        <tbody>
        <!--Retrieve user infro from database -->
        <?php 
        $getFBQuery = DB::query("SELECT * FROM feedbackothers");
        foreach($getFBQuery as $getFBResult){
        
        ?>
            <!-- Output users data in table forms -->
            <tr class="feedbackdata feedbackdata<?php echo $getFBResult['feedbackothers_id']; ?>">
              <td class="feedbackid"><?php echo $getFBResult['feedbackothers_id']; ?></td>
              <td class="feedbackname"><?php echo $getFBResult['feedbackothers_name']; ?></td>
              <td class="feedbackemail"><?php echo $getFBResult['feedbackothers_email']; ?></td>
              <td class="feedbacketopic"><?php echo ucwords($getFBResult['feedbackothers_topic']); ?></td>
              <td class="feedbackmsg"><?php echo ucfirst($getFBResult['feedbackothers_message']); ?></td>
              <td class="feedbackfile"><a href="../<?php echo $getFBResult['feedbackothers_file']; ?>" target="_blank"><?php if($getFBResult['feedbackothers_file'] == null) { echo "-";} else { echo "Attachment";} ?></a></td>
              <td><button type="button" class="btn btn-primary btn-sm viewFeedback"  value="viewFeedback" data-id="<?php echo $getFBResult['feedbackothers_id']; ?>" data-bs-toggle="modal" data-bs-target="#feedbackinfo<?php echo $getFBResult['feedbackothers_id']; ?>" >View</button>
                  <button type="button" class="btn btn-danger btn-sm deleteFeedback" data-id="<?php echo $getFBResult['feedbackothers_id']; ?>" data-name="<?php echo $getFBResult['feedbackothers_name']; ?>">Delete</button>
              </td>  
            </tr>
            <!-- Modals for each user's View/Edit button -->
            <div class="modal fade" id="feedbackinfo<?php echo $getFBResult['feedbackothers_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Feedback Topic: <?php echo ucwords($getFBResult['feedbackothers_topic']); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <!--Form body -->
                    <form class="userform"  >
                        <!--Input values, with values extracted from databases -->
                        <!--Input value for name -->
                        <div class="input-group">
                          <input type="text" name="id" class="form-control id" placeholder="Id" id="id<?php echo $getFBResult['feedbackothers_id'];?>" value="<?php echo $getFBResult['feedbackothers_id'];?>" hidden>  
                          <input type="text" name="name" class="form-control name " placeholder="Name" id="name<?php echo $getUserResult['users_id'];?>" value="<?php echo ucwords($getFBResult['feedbackothers_name']);?>">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <i class="bi bi-person-fill"></i>
                            </div>
                          </div>
                        </div>
                        <!--Input value for Email -->
                        <div class="input-group mt-3">
                          <input type="email" name="email" class="form-control email" placeholder="Email" id="email<?php echo $getFBResult['feedbackothers_id'];?>" value="<?php echo $getFBResult['feedbackothers_email'];?>">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                <i class="bi bi-envelope-fill"></i>
                              </div>
                          </div>
                        </div>
                        <!--Input value for Message -->
                        <div class="input-group mt-3">
                          <textarea class="form-control address" id="exampleFormControlTextarea1<?php echo $getFBResult['feedbackothers_id'];?>" rows="5" id="msg<?php echo $getFBResult['feedbackothers_id'] ?>"><?php echo $getFBResult['feedbackothers_message'] ?></textarea>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <i class="bi bi-house-door-fill"></i>
                            </div>
                          </div>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <!--Close and Save btns -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary savebtn">Save changes</button> -->
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
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </tfoot>
    </table>





  </div>

 


<!-- bootstrap jquery -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function(){

    $('#myTable').DataTable();

    $("#btn").click(function(){
    $(".sidebar").toggleClass("active");
    })
  });

</script>

  <!-- <script>
   let btn = document.querySelector("#btn");
   let sidebar = document.querySelector(".sidebar");
   let searchBtn = document.querySelector(".bx-search");

   btn.onclick = function() {
     sidebar.classList.toggle("active");
   }
   searchBtn.onclick = function() {
     sidebar.classList.toggle("active");
   }

  </script> -->

</body>
</html>