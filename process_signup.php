<?php
session_start();

include 'connection.php';

$user = trim($_POST['username']);
$pass = trim($_POST['password']);
$confirm = trim($_POST['confirm']);

//Users query to check if the username already exists
$user_query = "SELECT * FROM users WHERE Username = '$user'";
$user_result = mysqli_query($con, $user_query);

if (mysqli_num_rows($user_result) > 0 || $pass != $confirm || strlen($user) == 0 || strlen($pass) == 0 || strlen($confirm) == 0) {
    header("Location: index.php");
} else {
    //Users query to insert new user
    $insert_query = "INSERT INTO users (Username, Password, Access) VALUES ('$user', '".password_hash($pass, PASSWORD_BCRYPT)."', 'Student')";
    $insert_results = mysqli_query($con, $insert_query);

    //Users query to select user id
    $id_query = "SELECT UserID FROM users WHERE Username ='".$user."'";
    $id_result = mysqli_query($con, $id_query);
    $id_record = mysqli_fetch_assoc($id_result);

    $id = $id_record['UserID'];

    $_SESSION['user_id'] = $id;

    $_SESSION['logged_in'] = 1;
    header("Location: order.php");
}
?>