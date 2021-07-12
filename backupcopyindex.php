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
    <link rel="icon" href="images/logo.png">
    <!-- scroll reveal here
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script> -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- icons here -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- css here -->
    <link rel="stylesheet" href="css/styles.css">
    
    <title><?php echo SITE_NAME; ?></title>
</head>
<body>
    <!-- scroll to top -->
    <a href="#" class="scrolltop " id="scroll-top">
        <i class='bx bx-chevron-up-circle scrolltop_icon' ></i>
    </a>

    <!-- header -->
    <?php 
    include "header.php";
    ?>


    <main class="l-main">
        <!-- Home -->
        <section class="home" id="home">
            <div class="home_container bd-container bd-grid">
                <div class="home_data">
                    <!-- <h1 class="home_title"></h1> -->
                    <h2 class="home_subtitle">Control your calorie intake with CALORICE</h2>
                    <a href='#menu'class="button">View Menu</a>
                </div>
                <img class="img-home" src="images/bento_home.png" alt="" class="home_img">
            </div>
        </section>
        <!-- Menu -->
        <section class="menu section bd-container" id="menu">
            <span class="section-title">Customise your meal</span>
            <span class="section-subtitle">Choose Your Base</span>
            <div class="menu_container bd-grid">
                <div class="menu_content">
                    <img src="images/bento_menu_rice2.png" alt="" class="menu_img">
                    <h3 class="menu_name">Rice</h3>
                    <span class="menu_price">SGD 1</span>
                    <span class="menu_calorie">130 Cal</span>
                    <a class="button menu_button" data-bs-toggle="modal" data-bs-target="#ricecart"><i class='bx bxs-cart-download' ><span class="addandbase"> Base</span></i></a>
                    <div class="modal fade" id="ricecart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 class="modal-title" id="exampleModalLabel">
                                Ingredients
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-image">
                                <thead>
                                    <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Ingredient</th>
                                    <th scope="col">Cal</th>
                                    <th scope="col">Price(SGD)</th>
                                    <th scope="col">Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    <td class="modal_menu">
                                        <img src="images/brocolli.png" class="img-fluid img-thumbnail" alt="">
                                    </td>
                                    <td>Steamed <br>Brocolli</td>
                                    <td>34</td>
                                    <td>1.00</td>
                                    <td class="qty"><input type="number" class="form-control" id="input1" value="2"></td>
                                    <td>178</td>
                                    <td>
                                        <a href="" class="btn btn-danger btn-sm">
                                        <i class='bx bx-plus'></i> 
                                        
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm">
                                        
                                        <i class='bx bx-minus' ></i>
                                        </a>
                                    </td>
                                    </tr>
                                
                                    <tr>
                                    <td class="modal_menu">
                                        <img src="images/soy_sauce_egg.png" class="img-fluid img-thumbnail" alt="">
                                    </td>
                                    <td>Soy Sauce <br>Egg</td>
                                    <td>66</td>
                                    <td>1.50</td>
                                    <td class="qty"><input type="number" class="form-control" id="input1" value="2"></td>
                                    <td>178</td>
                                    <td>
                                        <a href="" class="btn btn-danger btn-sm">
                                        <i class='bx bx-plus'></i> 
                                        
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm">
                                        
                                        <i class='bx bx-minus' ></i>
                                        </a>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td class="modal_menu">
                                        <img src="images/chicken.jpeg" class="img-fluid img-thumbnail" alt="">
                                    </td>
                                    <td>Teriyaki <br>Chicken</td>
                                    <td>310</td>
                                    <td>2.50</td>
                                    <td class="qty"><input type="number" class="form-control" id="input1" value="2"></td>
                                    <td>178</td>
                                    </tr>
                                
                                </tbody>
                                </table> 
                                <div class="d-flex justify-content-end">
                                <h5>Total Price: <span class="price text-success">89$</span></h5><br>
                                <h5>Total Calories: <span class="price text-success">89$</span></h5>
                                </div>
                                 <div class="d-flex justify-content-end">
                                <h5>Total Price: <span class="price text-success">89$</span></h5><br>
                                <h5>Total Calories: <span class="price text-success">89$</span></h5>
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success">Add to Cart</button>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
                <div class="menu_content">
                    <img src="images/bento_menu_noodles.png" alt="" class="menu_img">
                    <h3 class="menu_name">Noodle</h3>
                    <span class="menu_price">SGD 1</span>
                    <span class="menu_calorie">174 Cal</span>
                    <a class="button menu_button" data-bs-toggle="modal" data-bs-target="#noodlecart"><i class='bx bxs-cart-download' ><span class="addandbase"> Base</span></i></a>
                    <div class="modal fade" id="noodlecart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 class="modal-title" id="exampleModalLabel">
                                Ingredients
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-image">
                                <thead>
                                    <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Ingredient</th>
                                    <th scope="col">Cal</th>
                                    <th scope="col">Price(SGD)</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td class="modal_menu">
                                        <img src="images/brocolli.png" class="img-fluid img-thumbnail" alt="">
                                    </td>
                                    <td>Steamed <br>Brocolli</td>
                                    <td>34</td>
                                    <td>1.00</td>
                                    <td class="qty"><input type="number" class="form-control" id="input1" value="2"></td>
                                    <td>178$</td>
                                    <td>
                                        <a href="" class="btn btn-danger btn-sm">
                                        <i class='bx bx-plus'></i> 
                                        
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm">
                                        
                                        <i class='bx bx-minus' ></i>
                                        </a>
                                    </td>
                                    </tr>
                                
                                    <tr>
                                    <td class="modal_menu">
                                        <img src="images/soy_sauce_egg.png" class="img-fluid img-thumbnail" alt="">
                                    </td>
                                    <td>Soy Sauce <br>Egg</td>
                                    <td>66</td>
                                    <td>1.50</td>
                                    <td class="qty"><input type="number" class="form-control" id="input1" value="2"></td>
                                    <td>178$</td>
                                    <td>
                                        <a href="" class="btn btn-danger btn-sm">
                                        <i class='bx bx-plus'></i> 
                                        
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm">
                                        
                                        <i class='bx bx-minus' ></i>
                                        </a>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td class="modal_menu">
                                        <img src="images/chicken.jpeg" class="img-fluid img-thumbnail" alt="">
                                    </td>
                                    <td>Teriyaki <br>Chicken</td>
                                    <td>310</td>
                                    <td>2.50</td>
                                    <td class="qty"><input type="number" class="form-control" id="input1" value="2"></td>
                                    <td>178</td>
                                    <td>
                                        <a href="" class="btn btn-danger btn-sm">
                                        <i class='bx bx-plus'></i> 
                                        
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm">
                                        
                                        <i class='bx bx-minus' ></i>
                                        </a>
                                    </td>
                                    </tr>
                                </tbody>
                                </table> 
                                <div class="d-flex justify-content-end">
                                <h5>Total: <span class="price text-success">89$</span></h5>
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success">Add to Cart</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="section-subtitle"><br>OR<br></span>
            <span class="section-title"><a href= "<?php echo htmlspecialchars(SITE_URL . "menu.php"); ?>">Let us customise for YOU<a></span>
            
                
                
            </div>
        </section>
        <!-- About us -->
        <section class="about section bd-container" id="about">
            <div class="about_container bd-grid">
                <div class="about_data">
                    <span class="section-title">About Us</span>
                    <h2 class="section-subtitle">We are Food Enthusiasts</h2>
                    <p class="about_description">We hope that every person is able to control how much calorie they consume. We always 
                    talk about exercising<br> to live a healthy lifestyle. But what is actually a healthy lifestyle if we do not
                    plan our diet? With CALORICE, planning<br> your diet has never been easier and convenient.<br> </p>
                    <a href="menu.php" class="button">Explore our Full Menu</a>
                </div>
                <img src="images/bento_aboutus.png" alt="" class="home_img">
            </div>

        </section>


    </main>

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
    


<!-- main js here -->
    <script src="js/main.js"></script>
<!-- bootstrap jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    <?php
    if($_GET['logoutSuccess'] == 1){
        echo 'swal("Logged Out.", "You have logged out successfully.", "success");';
      }
    ?>
    </script>

</body>
</html>