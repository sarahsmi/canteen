<?php
session_start();

include 'connection.php';

$user = trim($_POST['username']);
$pass = trim($_POST['password']);

//Users query to check if the password matches
$login_query = "SELECT Password FROM users WHERE Username ='".$user."'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record['Password'];

//Users query to check user access
$access_query = "SELECT Access FROM users WHERE Username ='".$user."'";
$access_result = mysqli_query($con, $access_query);
$access_record = mysqli_fetch_assoc($access_result);

$access = $access_record['Access'];

//Users query to select user id
$id_query = "SELECT UserID FROM users WHERE Username ='".$user."'";
$id_result = mysqli_query($con, $id_query);
$id_record = mysqli_fetch_assoc($id_result);

$id = $id_record['UserID'];

$verify = password_verify($pass, $hash);
if ($verify && $access == "Student") {
    $_SESSION['user_id'] = $id;

    $_SESSION['logged_in'] = 1;
    header("Location: order.php");
}elseif ($verify && $access == "Admin") {
    $_SESSION['logged_in'] = 2;
    header("Location: admin.php");
}else {
    header("Location: index.php");
}
?>