<?php
session_start();

include 'connection.php';

$user = trim($_POST['username']);
$pass = trim($_POST['password']);

$login_query = "SELECT Password FROM users WHERE Username ='".$user."'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record['Password'];

$access_query = "SELECT Access FROM users WHERE Username ='".$user."'";
$access_result = mysqli_query($con, $access_query);
$access_record = mysqli_fetch_assoc($access_result);

$access = $access_record['Access'];

$verify = password_verify($pass, $hash);
if ($verify && $access == "Student") {
    $_SESSION['logged_in'] = 1;
    header("Location: menu.php");
}elseif ($verify && $access == "Admin") {
    $_SESSION['logged_in'] = 2;
    header("Location: admin.php");
}else {
    header("Location: index.php");
}
?>