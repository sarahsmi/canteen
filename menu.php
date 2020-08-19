<?php include 'connection.php';?>

<!doctype html>
<html lang="en">
    <head>
        <title>Menu - WGC Canteen</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" href="https://wgc.school.nz/wp-content/uploads/2018/09/WGC_Logo_Transparent_RGB.png" type="image/gif">
    </head>
    <body>
        <header>
            <nav>
                <a href="index.php"><img src="https://wgc.school.nz/wp-content/uploads/2018/09/WGC_Logo_Transparent_RGB.png" alt="WGC Logo"></a>
                <a href="index.php">Home</a>
                <a href="menu.php" id="active">Menu</a>
                <a href="order.php">Order</a>
                <a href="admin.php">Admin</a>
            </nav>
        </header>
        <h1>Canteen Kai</h1>
        <form>
            <select name="category" onchange="this.form.submit()">
                <option value="" <?php if (!isset($_GET["category"])){ echo"selected";}?> disabled hidden>Select category</option>
                <option value="1" <?php if (isset($_GET["category"])){ if ($_GET["category"] == "1"){ echo"selected";}}?>>All</option>
                <option value="2" <?php if (isset($_GET["category"])){ if ($_GET["category"] == "2"){ echo"selected";}}?>>Bun</option>
                <option value="3" <?php if (isset($_GET["category"])){ if ($_GET["category"] == "3"){ echo"selected";}}?>>Daily Specials</option>
                <option value="4" <?php if (isset($_GET["category"])){ if ($_GET["category"] == "4"){ echo"selected";}}?>>Drinks</option>
                <option value="5" <?php if (isset($_GET["category"])){ if ($_GET["category"] == "5"){ echo"selected";}}?>>Sandwiches & Wraps</option>
                <option value="6" <?php if (isset($_GET["category"])){ if ($_GET["category"] == "6"){ echo"selected";}}?>>Savoury</option>
                <option value="7" <?php if (isset($_GET["category"])){ if ($_GET["category"] == "7"){ echo"selected";}}?>>Sweet</option>
            </select>
            <select name="sort" onchange="this.form.submit()">
                <option value="" <?php if (!isset($_GET["sort"])){ echo"selected";}?> disabled hidden>Sort by</option>
                <option value="1" <?php if (isset($_GET["sort"])){ if ($_GET["sort"] == "1"){ echo"selected";}}?>>A-Z</option>
                <option value="2" <?php if (isset($_GET["sort"])){ if ($_GET["sort"] == "2"){ echo"selected";}}?>>Z-A</option>
                <option value="3" <?php if (isset($_GET["sort"])){ if ($_GET["sort"] == "3"){ echo"selected";}}?>>Price low to high</option>
                <option value="4" <?php if (isset($_GET["sort"])){ if ($_GET["sort"] == "4"){ echo"selected";}}?>>Price high to low</option>
            </select>
        </form>
        <?php
        if (isset($_GET["category"])) {
            if ($_GET["category"] == "2") {
                //Products query to select bun category
                $category = "SELECT * FROM products WHERE type LIKE 'Bun'";
            } elseif ($_GET["category"] == "3") {
                //Products query to select daily specials category
                $category = "SELECT * FROM products WHERE type LIKE 'Daily Specials'";
            } elseif ($_GET["category"] == "4") {
                //Products query to select drinks category
                $category = "SELECT * FROM products WHERE type LIKE 'Drinks'";
            } elseif ($_GET["category"] == "5") {
                //Products query to select sandwiches & wraps category
                $category = "SELECT * FROM products WHERE type LIKE 'Sandwiches & Wraps'";
            } elseif ($_GET["category"] == "6") {
                //Products query to select savoury category
                $category = "SELECT * FROM products WHERE type LIKE 'Savoury'";
            } elseif ($_GET["category"] == "7") {
                //Products query to select sweet category
                $category = "SELECT * FROM products WHERE type LIKE 'Sweet'";
            } else {
                //Products query to select all categories
                $category = "SELECT * FROM products";
            }
        } else {
            //Products query to select all categories
            $category = "SELECT * FROM products";
        }
        if (isset($_GET["sort"])) {
            if ($_GET["sort"] == "1") {
                //Products query to sort by a-z
                $sort = "ORDER BY product ASC";
            } elseif ($_GET["sort"] == "2") {
                //Products query to sort by z-a
                $sort = "ORDER BY product DESC";
            } elseif ($_GET["sort"] == "3") {
                //Products query to sort by price low to high
                $sort = "ORDER BY cost ASC";
            } elseif ($_GET["sort"] == "4") {
                //Products query to sort by price high to low
                $sort = "ORDER BY cost DESC";
            } else {
                //Products query to sort by default
                $sort ="";
            }
        } else {
            //Products query to sort by default
            $sort ="";
        }
        //Products query to select and sort category
        $products = $category." ".$sort;
        $products_result = mysqli_query($con, $products);
        ?>
        <table>
            <tr>
                <th>Product</th>
                <th>Type</th>
                <th>Availability</th>
                <th>Cost</th>
            </tr>
            <?php
            while($row = mysqli_fetch_array($products_result))
            {
                echo "<tr><td>".$row['Product']."</td>";
                echo "<td>".$row['Type']."</td>";
                echo "<td>".$row['Availability']."</td>";
                echo "<td>".$row['Cost']."</td></tr>";
            }
            ?>
        </table>
    </body>
</html>