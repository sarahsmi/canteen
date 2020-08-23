<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
    echo '<header>
                <nav>
                    <img src="https://wgc.school.nz/wp-content/uploads/2018/09/WGC_Logo_Transparent_RGB.png" alt="WGC Logo">
                    <a href="menu.php">Menu</a>
                    <a href="order.php">Order</a>
                    <a href="process_logout.php">Logout</a>
                </nav>
          </header>';
} elseif (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 2){
    echo '<header>
                <nav>
                    <img src="https://wgc.school.nz/wp-content/uploads/2018/09/WGC_Logo_Transparent_RGB.png" alt="WGC Logo">
                    <a href="process_logout.php">Logout</a>
                </nav>
          </header>';
} else {
    echo '<header>
                <nav>
                    <a href="index.php"><img src="https://wgc.school.nz/wp-content/uploads/2018/09/WGC_Logo_Transparent_RGB.png" alt="WGC Logo"></a>
                    <a href="index.php" id="active">Home</a>
                    <a href="menu.php">Menu</a>
                </nav>
          </header>';
}
?>