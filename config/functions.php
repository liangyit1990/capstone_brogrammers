<?php

//Validate form input before using it
function validateData($value){
    $value = trim($value); #Removes unnecessary characters (spaces, tab, newline)
    $value = stripslashes($value); #Removes backslahses (\) from the user input data
    $value = htmlspecialchars($value); #replace HTML characters like < and > with &lt; and &gt;
    return $value;
}


function displayDate($date){
    return date('d M Y', strtotime($date));
}

function isLoggedIn(){
    if(!isset($_COOKIE['users_id']) || !isset($_COOKIE['isLoggedIn'])){
        header("Location: " . SITE_URL . "login.php");
    }
}


function loginAccountLogout(){
    // if($_COOKIE['users_permission'] == 1){
    //     echo '
    //     <li><a class="nav-link adminpaneltopright active" href="admin.php">Admin Panel</a></li>
    //     <li><a class="nav-link logouttopright" href="logout.php">Logout</a></li>';
    // } else 
    if((isset($_COOKIE['users_id']) && isset($_COOKIE['isLoggedIn']) && $_COOKIE['users_permission'] == 0)){
        echo '
        <li class="nav-item"><a href="account.php#account" class="nav_link">Account</a></li>
        <li class="nav-item"><a href="logout.php" class="nav_link">Logout</a></li>
        ';
    } elseif((isset($_COOKIE['users_id']) && isset($_COOKIE['isLoggedIn']) && $_COOKIE['users_permission'] == 1)) {
        echo '
        <li class="nav-item"><a href="admin/adminmanagement.php" class="nav_link">Admin Panel</a></li>
        <li class="nav-item"><a href="admin/adminlogout.php" class="nav_link">Logout</a></li>
        ';
    } else {
        echo '
        <li class="nav-item"><a href="login.php" class="nav_link">Login</a></li>
        ';
    } 
}

// function cartCounter() {
//     if(isset($_COOKIE['users_id']) && isset($_COOKIE['isLoggedIn'])){
//         $userCartCount = 0;
//         $userCartQuery = DB::query("SELECT cartbatch_no FROM cartbatch where users_id=%i AND cartbatch_status=%i" , $_COOKIE['users_id'],0);
//         foreach($userCartQuery as $userCartResult){
//             if($userCartCount < $userResult['cartbatch_no']){
//                 $userCartCount = $userResult['cartbatch_no'];
//             } 
//         }
        
//     }
// }



// function connectName(){
//     if(isset($_COOKIE['users_name'])){
//         echo $_COOKIE['users_name'];
//     }
// }

// function connectEmail(){
//     if(isset($_COOKIE['users_email'])){
//         echo $_COOKIE['users_email'];
//     }
// }


?>