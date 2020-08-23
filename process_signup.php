<?php
include 'connection.php';

$user = trim($_POST['username']);
$pass = trim($_POST['password']);
$confirm = trim($_POST['confirm']);

$user_query = "SELECT * FROM users WHERE Username = '$user'";
$user_result = mysqli_query($con, $user_query);

if (mysqli_num_rows($user_result) > 0 || $pass != $confirm) {
    header("Location: index.php");
} else {
    $insert_query = "INSERT INTO users (Username, Password, Access) VALUES ('$user', '".password_hash($pass, PASSWORD_BCRYPT)."', 'Student')";
    $insert_results = mysqli_query($con, $insert_query);

}
?>