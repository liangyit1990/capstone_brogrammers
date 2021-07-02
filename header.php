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
                <i class='bx bxs-food-menu' ></i>
            </div>
        </nav>
    
</header>