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
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- css here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/feedback.css">
    <title><?php echo SITE_NAME; ?>- Feedbacks</title>
</head>
<body>

<!--Nav Bar -->
<?php 
include "header.php";
?>

<!--Form -->
<div class="l-main ">
    <section>
        <div class="container">
            <div class="row contact-back">
                
                <!--Col for Forms -->
                <div class="col-lg-6 back-two">
                    <h3>Submit your feedback!</h3>
                    
                    <form class="mt-3">
                        <input placeholder="Name" type="text" />
                        <input placeholder="Topic" type="email" />
                        <textarea placeholder="Type your message here" rows="4"></textarea>
                        <span>Upload Document</span><input type="file" name="fileToUpload" class="form-control img" >
                        
                    </form>
                </div>
                <!--End of Col for forms -->
                <div class="col-lg-6 justify-content-center ">
                    <h3><u>Locate Us</u></h3>
                    <!--Interactive Google map -->
                    <div class="row mapouter">
                        <div class="col gmap_canvas">
                            <!-- Div to make gogle map response -->
                            <div class= "map-responsive">
                                <iframe width="566" height="204" id="gmap_canvas" src="https://maps.google.com/maps?q=paya%20lebar%20square&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                <a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:204px;width:566px;}</style><a href="https://www.embedgooglemap.net">google map location for website</a>
                                <style>.gmap_canvas {overflow:hidden;background:none!important;height:204px;width:566px;}</style>
                            </div>
                        </div>
                    </div>
                    <!-- End of Google map -->

                    <!-- Shop Details like address & opening hours -->            
                    <div class = "row">
                     <h3 class="mt-3"><u>Address</u></h3>         
                     <p>Address Address Address Address Address Address Address Address Address Address Address  </p> 
                    </div>
                    <div class = "row">
                     <h3 class="mt-3"><u>Opening Hours</u></h3>         
                     <p>Monday - Sunday  </p> 
                     <p>11am - 9pm  </p> 
                    </div>
                
                </div>
            </div>
        </div>
    </section>
</div>


<!-- scroll reveal here -->
<script src="https://unpkg.com/scrollreveal"></script>   

<!-- main js here -->
    <script src="js/main.js"></script>
</body>
</html>