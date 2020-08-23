<?php
include 'connection.php';

if(isset($_GET['ProductID'])) {
    //Products query to delete selected product
    $delete_product = "DELETE FROM products WHERE ProductID='$_GET[ProductID]'";

    if (!mysqli_query($con, $delete_product)) {
        echo 'Not Deleted';
    } else {
        echo 'Deleted';
    }
} else {
    //Orders query to delete selected order
    $delete_order = "DELETE FROM orders WHERE OrderID='$_GET[OrderID]'";

    if (!mysqli_query($con, $delete_order)) {
        echo 'Not Deleted';
    } else {
        echo 'Deleted';
    }
}

header("refresh:2; url = admin.php");
?>