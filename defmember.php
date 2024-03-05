<?php
include "data.php";
$db = new Database();




if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $db->table = "users";
    $db->condition = "WHERE user_id=" . $id;
    $query = $db->delete();

    
}
$alert = "ลบข้อมูลเรียบร้อยแล้ว";
$location = "index.php";
echo "<script>window.location.href = 'admin_member.php';</script>";
