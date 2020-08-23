<?php include 'connection.php';?>

<!doctype html>
<html lang="en">
    <head>
        <title>Home - WGC Canteen</title>
        <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
        <link rel="icon" href="https://wgc.school.nz/wp-content/uploads/2018/09/WGC_Logo_Transparent_RGB.png" type="image/gif">
    </head>
    <body>
        <?php include 'header.php';?>
        <h1>WGC Canteen</h1>
        <h2>Login</h2>
        <!--Login form-->
        <form name="login_form" id="login_form" method="post" action="process_login.php">
            Username: <input type="text" name="username" maxlength="20"><br>
            Password: <input type="password" name="password" maxlength="256"><br>
            <input type="submit" name="submit" value="Login">
        </form>
        <h2>Sign Up</h2>
        <!--Sign Up form-->
        <form name="signup_form" id="signup_form" method="post" action="process_signup.php">
            Username: <input type="text" name="username" maxlength="20"><br>
            Password: <input type="password" name="password" maxlength="256"><br>
            Confirm password: <input type="password" name="confirm" maxlength="256"><br>
            <input type="submit" name="submit" value="Sign Up">
        </form>
    </body>
</html>