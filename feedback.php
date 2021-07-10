<?php 

include "config/config.php";
include "config/db.php";
include "config/functions.php"; 




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- icons here -->
     <link rel="icon" href="images/logo.png">

     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- css here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/feedback.css">
    <!-- <link rel="stylesheet" href="css/feedback.css"> -->
    <title><?php echo SITE_NAME; ?> - Feedback</title>
</head>
<body>

<!--Nav Bar -->
<?php 
    include "header.php";
?>

<!--Form -->
    <div class="contact-in">
        
        <div class="contact-form">
            <h2>Contact Us or Give us your feedback! </h2>
            <form method="post" enctype="multipart/form-data">                
            
                <input placeholder="Name" type="text" class="contact-form-txt name" required/>
                <input placeholder="Email" type="email" class="contact-form-txt email" required/>
                <input placeholder="Topic" type="text" class="contact-form-txt topic" required/>
                <textarea placeholder="Message" class="contact-form-textarea message" required></textarea>
                

                <span>Upload Document</span><input type="file" id="file" name="file" class="form-control" >

                <button type="button" name="feedback" class="contact-form-btn">Submit</button>
            </form>
        </div>

        <div class="contact-map">
            <div class= "map-responsive">
                <a href="https://www.embedgooglemap.net" class="location"></a><br>
                <iframe  id="gmap_canvas" src="https://maps.google.com/maps?q=paya%20lebar%20square&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:204px;width:566px;}</style>
                <style>.gmap_canvas {overflow:hidden;background:none!important;height:204px;width:566px;}</style>
            </div>
        
        </div>
        <!-- Shop Details like address & opening hours -->            
        <div class = "row">
            <h3 class="mt-3"><u>Pickup Address</u></h3>         
            <p>Paya Lebar Square Mall, L2-130</p>
    
            <h3 class="mt-3"><u>Ordering Hours</u></h3>         
            <p>Monday - Sunday  </p> 
            <p>11am - 9pm  </p> 
        </div>          
    </div>


<!-- footer -->
<footer class="footer section bd-container">
        <div class="footer_container bd-grid">
            <div class="footer_content">
                <a href="" class="footer_logo">CALORICE</a>
                
                <div>
                    <a href="" class="footer_social"><i class='bx bxl-facebook' ></i></a>
                    <a href="" class="footer_social"><i class='bx bxl-instagram' ></i></a>
                    <a href="" class="footer_social"><i class='bx bxl-twitter' ></i></a>
                    

                </div> 
            </div>
        </div>
</footer>

<!-- scroll reveal here -->
<script src="https://unpkg.com/scrollreveal"></script>   
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- main js here -->
<script src="js/main.js"></script>
<script>
$(document).ready(function(){

    $(".contact-form-btn").click(function(){
        
        var fd = new FormData();
        var files = $('#file')[0].files;
        var name = $('.name').val();
        var email = $('.email').val();
        var topic = $('.topic').val();
        var message = $('.message').val();

        console.log(name);
        console.log(email);
        console.log(topic);
        console.log(message);
        console.log(files);
        
        

           fd.append('file',files[0]);
           fd.append('name',name);
           fd.append('email',email);
           fd.append('topic',topic);
           fd.append('message',message);
           

           $.ajax({
              url: 'submitfeedback.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(data){
                 if(data == 1){
                    swal("Thank you for your feedback/query.", "Our team will get back to you shortly", "success");
                    $('.name').val("");
                    $('.email').val("");
                    $('.topic').val("");
                    $('.message').val("");
                    $('#file').val("");
                    
                 }else if (data == 2) {
                    swal("Error!", "Please fill up all the sections correctly", "error");
                 } 
                console.log(data);
              }
           });
        
    


  });



});






</script>
</body>
</html>

