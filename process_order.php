<?php
session_start();

include 'connection.php';

$product = trim($_POST['ProductID']);
$quantity = trim($_POST['Quantity']);

if (strlen($quantity) != 0) {
    //Orders query to insert new order
    $process_query = "INSERT INTO orders (UserID, ProductID, Quantity) VALUES ('$_SESSION[user_id]', '$product', '$quantity')";
    $process_result = mysqli_query($con, $process_query);
}

header("Location: order.php");
?>