<!--Nav bar for main pages -->
<header class="l-header " id="header">
        <nav class="nav bd-container">
            <a href="index.php" class="logo"><img class="img-logo" src="images/logo.png" alt=""></a>
            <a href="<?php echo htmlspecialchars(SITE_URL); ?>" class="nav_logo"><h2><strong>C A L O R I C E</strong></h2></a>

            <div class="nav_menu" id="nav-menu">
                <ul class="nav_list">
                    <li class="nav-item"><a href="<?php echo htmlspecialchars(SITE_URL); ?>#home" class="nav_link active-link">Home</a></li>
                    <li class="nav-item"><a href="<?php echo htmlspecialchars(SITE_URL. "menu.php"); ?>" class="nav_link">Menu</a></li>
                    <li class="nav-item"><a href="<?php echo htmlspecialchars(SITE_URL); ?>#about" class="nav_link">About</a></li>
                    <li class="nav-item"><a href="<?php echo htmlspecialchars(SITE_URL . "feedback.php"); ?>" class="nav_link">Contact Us</a></li>
                    
                    
                    <!-- <li class="nav-item"><a class="nav_link" data-bs-toggle="modal" data-bs-target="#register">Login/Register</a></li> -->
                    <?php
                    loginAccountLogout();
                    ?>
                    <li><i class='bx bx-moon bx-sm change-theme' id="theme-button"></i></li>
                </ul>
            </div>
            <div class="nav_cart cart" id="nav-cart">
                <div><i class='bx bx-cart bx-md'></i><span class="count">0</span></div>
                <!-- <div class="item-count">0</div> -->
            </div>
            
            <div class="nav_toggle" id="nav-toggle">
                
                <i class='bx bxs-food-menu bx-md' ></i>
                
            </div>
        </nav>
    </header>