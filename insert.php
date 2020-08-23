<?php
include 'connection.php';

$product = trim($_POST['product']);
$type = trim($_POST['type']);
$availability = trim($_POST['availability']);
$cost = trim($_POST['cost']);

//Products query to check if the product already exists
$name_query = "SELECT * FROM products WHERE Product = '$product'";
$name_result = mysqli_query($con, $name_query);

if (mysqli_num_rows($name_result) > 0 || strlen($product) == 0 || strlen($type) == 0 || strlen($availability) == 0 || strlen($cost) == 0) {
    echo 'Not inserted';
} else {
    if ($availability == "Out of Stock"){
        $cost = "0.00";
    }
    //Products query to insert new product
    $new_query = "INSERT INTO products (Product, Type, Availability, Cost) VALUES ('$product', '$type', '$availability', '$cost')";
    $new_results = mysqli_query($con, $new_query);
    echo 'Inserted';
}

header("refresh:2; url = admin.php");
?>