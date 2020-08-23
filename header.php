<?php
session_start();

if (isset($_SESSION['logged_in'])) {
    echo '<header>
                <nav>
                    <a href="#"><img src="https://wgc.school.nz/wp-content/uploads/2018/09/WGC_Logo_Transparent_RGB.png" alt="WGC Logo"></a>
                    <a href="process_logout.php" class="link">Logout</a>
                </nav>
          </header>';
} else {
    echo '<header>
                <nav>
                    <a href="index.php"><img src="https://wgc.school.nz/wp-content/uploads/2018/09/WGC_Logo_Transparent_RGB.png" alt="WGC Logo"></a>
                    <a href="index.php" class="link">Home</a>
                    <a href="menu.php" class="link">Menu</a>
                </nav>
          </header>';
}
?>