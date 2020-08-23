<?php
include 'connection.php';

if (strlen($_POST["type"]) == 0 && strlen($_POST["availability"]) == 0) {
    //Products query to update product, cost
    $update_product = "UPDATE products SET Product = '$_POST[product]', Cost = '$_POST[cost]' WHERE ProductID = '$_POST[ProductID]'";
} else if (strlen($_POST["type"]) == 0) {
    //Products query to update product, availability, cost
    $update_product = "UPDATE products SET Product = '$_POST[product]', Availability = '$_POST[availability]', Cost = '$_POST[cost]' WHERE ProductID = '$_POST[ProductID]'";
} else if (strlen($_POST["availability"]) == 0) {
    //Products query to update product, type, cost
    $update_product = "UPDATE products SET Product = '$_POST[product]', Type = '$_POST[type]', Cost = '$_POST[cost]' WHERE ProductID = '$_POST[ProductID]'";
} else {
    //Products query to update product, type, availability, cost
    $update_product = "UPDATE products SET Product = '$_POST[product]', Type = '$_POST[type]', Availability = '$_POST[availability]', Cost = '$_POST[cost]' WHERE ProductID = '$_POST[ProductID]'";
}

if(!mysqli_query($con, $update_product)) {
    echo 'Not Updated';
} else {
    echo 'Updated';
}

header("refresh:2; url = admin.php");
?>