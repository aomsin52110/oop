<?php

session_start();
include('data.php');
$db = new Database();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST['username'];
$password = $_POST['password'];

$db->table = "users";
    $db->condition = "WHERE username = '$username' AND password = '$password'";
    $result = $db->select();



    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        $_SESSION['userid'] = $row['user_id'];
        $_SESSION['user'] = $row['fname'] . " " . $row['lname'];
        $_SESSION['level'] = $row['level'];

        if ($_SESSION['level'] == 'admin') {
            header("Location: admin_type.php");
        }

        if ($_SESSION['level'] == 'user') {
            header("Location: user.php");
        }
    } else {
        echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
} else {
    echo "<script>window.location.href = 'index.php';</script>";
}

?>
