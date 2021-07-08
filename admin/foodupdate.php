
<?php
include '../config/config.php';
include "../config/db.php";
include "../config/functions.php";



if(isset($_POST['name'])){
    $name = $_POST["name"];
    echo $name;
    $price = $_POST["price"];
    echo $price;
}
?>
