<?php
function loginAccountLogout(){
    // if($_COOKIE['users_permission'] == 1){
    //     echo '
    //     <li><a class="nav-link adminpaneltopright active" href="admin.php">Admin Panel</a></li>
    //     <li><a class="nav-link logouttopright" href="logout.php">Logout</a></li>';
    // } else 
    if((isset($_COOKIE['users_id']) || isset($_COOKIE['isLoggedIn']) && $_COOKIE['users_permission'] == 0)){
        echo '
        <li class="nav-item"><a href="account.php" class="nav_link">Account</a></li>
        <li class="nav-item"><a href="logout.php" class="nav_link">Logout</a></li>
        ';
    } else {
        echo '
        <li class="nav-item"><a href="login.php" class="nav_link">Login</a></li>
        ';}
}                    ?>


<!-- Header for main pages -->
<header class="l-header " id="header">
        <nav class="nav bd-container">
            <a href="index.php" class="logo"><img src="images/logo.png" alt=""></a>
            <a href="<?php echo htmlspecialchars(SITE_URL); ?>" class="nav_logo"><h2><strong>CALORICE</strong></h2></a>

            <div class="nav_menu" id="nav-menu">
                <ul class="nav_list">
                    <li class="nav-item"><a href="#home" class="nav_link active-link">Home</a></li>
                    <li class="nav-item"><a href="#menu" class="nav_link">Menu</a></li>
                    <li class="nav-item"><a href="#about" class="nav_link">About</a></li>
                    <li class="nav-item"><a href="<?php echo htmlspecialchars(SITE_URL . "feedback.php"); ?>" class="nav_link">Contact Us</a></li>
                    <!-- <li class="nav-item"><a class="nav_link" data-bs-toggle="modal" data-bs-target="#register">Login/Register</a></li> -->
                    <li class="nav-item"><a href="login.php" class="nav_link">Login</a></li>

                </ul>
            </div>
            

            <div class="nav_toggle" id="nav-toggle">
                <i class='bx bx-cart'></i>
                <i class='bx bxs-food-menu' ></i>
                
            </div>
        </nav>
</header>