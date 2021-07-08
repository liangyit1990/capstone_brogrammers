<?php
include "config/config.php";
include "config/db.php";
include "config/functions.php"; 

//if user is logged in, they may proceed
isLoggedIn();

//unset all cookies
setcookie("users_id", "", time() - 3600);
setcookie("users_permission", "", time() - 3600);
setcookie("users_name", "", time() - 3600);
setcookie("users_email", "", time() - 3600);
setcookie("isLoggedIn", "", time() - 3600);
header("Location: " . SITE_URL . "index.php?logoutSuccess=1");
?>