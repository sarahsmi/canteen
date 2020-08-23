<?php
include 'connection.php';

//Products query to select available products
$menu_query = "SELECT * FROM products WHERE Availability = 'Available'";
$menu_result = mysqli_query($con, $menu_query);
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Order - WGC Canteen</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" href="https://wgc.school.nz/wp-content/uploads/2018/09/WGC_Logo_Transparent_RGB.png" type="image/gif">
    </head>
    <body>
        <?php include 'header.php';?>
        <h2>Add Order</h2>

        <table>
            <tr>
                <th>Product</th>
                <th>Cost</th>
                <th>Quantity</th>
                <th>Order</th>
            </tr>
            <?php
            while($row = mysqli_fetch_array($menu_result))
            {
                echo "<tr><form action = process_order.php method = post>";
                echo "<td>".$row['Product']."</td>";
                echo "<td>".$row['Cost']."</td>";
                echo "<td><input type = 'number' name = 'Quantity' maxlength='1'></td>";
                echo "<input type = 'hidden' name = 'ProductID' value='".$row['ProductID']."'>";
                echo "<td><input type = 'submit' name = 'submit' value = 'Order'></td>";
                echo "</form></tr>";
            }
            ?>
        </table>
    </body>
</html>