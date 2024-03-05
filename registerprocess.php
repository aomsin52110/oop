<?php
include "data.php";
$db = new Database();





$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$level = $_POST['level'];


if ($_POST["process"] == "insert") {
    $db->table =  "users";
    $db->field = "username,password,email,level";
    $db->value = "'{$username}','{$password}','{$email}','{$level}'";


    // if (mysqli_num_rows($result) > 0) {
    //     echo "ข้อมูลที่กรอกมีค่าซ้ำกับข้อมูลที่มีอยู่ในระบบ";
    // } else {


        $query = $db->insert();
        $id = mysqli_insert_id($db->condb);
        if ($query) {

            echo "<script>alert('สำเร็จ')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
}
echo "<script>window.location.href = 'index.php';</script>";
