<?php
include 'connection.php';

//Products query to select all products
$update_products = "SELECT * FROM products";
$update_products_record = mysqli_query($con, $update_products);

//Orders query to select order id, username, product
$order_query = "SELECT orders.OrderID, users.Username, products.Product, orders.Quantity FROM users, products, orders WHERE users.UserID = orders.UserID AND orders.ProductID = products.ProductID";
$order_result = mysqli_query($con, $order_query);
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Admin - WGC Canteen</title>
        <link rel = "stylesheet" type = "text/css" href = "style.css?v=<?php echo time(); ?>">
        <link rel = "icon" href = "https://wgc.school.nz/wp-content/uploads/2018/09/WGC_Logo_Transparent_RGB.png" type = "image/gif">
    </head>
    <body>
        <?php include 'header.php';?>

        <h2>Add Product</h2>
        <!--Add Product form-->
        <form name = "insert_form" id = "insert_form" method = "post" action = "insert.php">
            Product: <input type = "text" name = "product" maxlength = "30"><br>
            Type:
            <select name = "type">
                <option value = "" selected hidden>Select type</option>
                <option value = "Bun">Bun</option>
                <option value = "Daily Specials">Daily Specials</option>
                <option value = "Drinks">Drinks</option>
                <option value = "Sandwiches & Wraps">Sandwiches & Wraps</option>
                <option value = "Savoury">Savoury</option>
                <option value = "Sweet">Sweet</option>
            </select><br>
            Availability:
            <select name = "availability">
                <option value = "" selected hidden>Select availability</option>
                <option value = "Available">Available</option>
                <option value = "Out of Stock">Out of Stock</option>
            </select><br>
            Cost: <input type = "number" name = "cost"><br>
            <input type = "submit" name = "submit" value = "Insert">
        </form>

        <h2>Update Product</h2>

        <table>
            <tr>
                <th>Product</th>
                <th>Type</th>
                <th>Availability</th>
                <th>Cost</th>
                <th>Submit</th>
                <th>Delete</th>
            </tr>
            <?php
            while($row = mysqli_fetch_array($update_products_record))
            {
                echo "<tr><form action = update.php method = post>";
                echo "<td><input type = 'text' name = 'product' value='".$row['Product']."' maxlength='30'></td>";
                echo "<td><select name = 'type'><option value = '' selected hidden>".$row['Type']."</option><option value = 'Bun'>Bun</option><option value = 'Daily Specials'>Daily Specials</option><option value = 'Drinks'>Drinks</option><option value = 'Sandwiches & Wraps'>Sandwiches & Wraps</option><option value = 'Savoury'>Savoury</option><option value = 'Sweet'>Sweet</option></select></td>";
                echo "<td><select name = 'availability'><option value = '' selected hidden>".$row['Availability']."</option><option value = 'Available'>Available</option><option value = 'Out of Stock'>Out of Stock</option></select></td>";
                echo "<td><input type = 'number' name = 'cost' value='".$row['Cost']."' maxlength='4'></td>";
                echo "<input type = 'hidden' name = 'ProductID' value='".$row['ProductID']."'>";
                echo "<td><input type = 'submit'></td>";
                echo "<td><a href=delete.php?ProductID=".$row['ProductID'].">Delete</a></td>";
                echo "</form></tr>";
            }
            ?>
        </table>

        <h2>Delete Order</h2>

        <table>
            <tr>
                <th>Username</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Delete</th>
            </tr>
            <?php
            while($row = mysqli_fetch_array($order_result))
            {
                echo "<tr><td>".$row['Username']."</td>";
                echo "<td>".$row['Product']."</td>";
                echo "<td>".$row['Quantity']."</td>";
                echo "<input type = 'hidden' name = 'OrderID' value='".$row['OrderID']."'>";
                echo "<td><a href=delete.php?OrderID=".$row['OrderID'].">Delete</a></td></tr>";
            }
            ?>
        </table>
    </body>
</html>