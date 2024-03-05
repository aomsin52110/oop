<?php
include "data.php";
$db = new Database();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$tel = $_POST['tel'];
$line_id = $_POST['line_id'];
$email = $_POST['email'];
$address = $_POST['address'];


if ($_POST["process"] == "update") {
    $id = $_POST['id'];
    $db->table = "users";
    $db->value = "fname='{$fname}', lname='{$lname}', tel='{$tel}', line_id='{$line_id}', email='{$email}', address='{$address}'";
    $db->condition = "WHERE user_id=$id";

    $query = $db->update();
    if ($query) {
        echo "<script>alert('แก้ไขสำเร็จ')</script>";
    }
}

if ($_POST["process"] == "insert") {
    $db_check->table = "users";
    $db_check->condition = "WHERE username='{$username}'";
    $q = $db_check->select();
    $r = mysqli_fetch_assoc($q);
    if (!is_null($r)) {
        array_push($arr_err, "ชื่อนี้มีแล้วเอาชื่ออื่น!!");
    }
    // เช็คจำนวน error
    if(count($arr_err) == 0) {
        // upload image
         if($fileupload <> ''){
            $path = "uploads/" . uniqid() . "_{$type_product}_" . ".jpg";
            move_uploaded_file($_FILES['img']['tmp_name'], $path);
         }
        $db->table = "product";
        $db->field = "pro_name, pro_detail, pro_price, pro_unit, pro_img, type_id ";
        $db->value = "'{$pro_name}','{$pro_detail}', '{$pro_price}', '{$pro_unit}', '{$path}' ,'{$type_product}'";
        $query = $db->insert();

        if($query) {
            header("location: manage_product.php");
        }
    }else {
        $_SESSION['error'] = array_unique($arr_err);
        header("location:add_product.php");
    }

    $db->table =  "users";
    $db->field = "fname,lname,tel,line_id,email,address";
    $db->value = "'{$fname}','{$lname}','{$tel}','{$line_id}','{$email}','{$address}'";


    $query = $db->insert();
    $id = mysqli_insert_id($db->condb);
    if ($query) {
        echo "<script>alert('เพิ่มสำเร็จ')</script>";
    }
}

if (!empty($id) && !empty($_FILES['img']['name'])) {
    $img = $_FILES['img']["name"];
    $type = strrchr($img, ".");
    $imageCheck = [".jpg", ".png", ".jpeg"];
    if (in_array($type, $imageCheck)) {

        $db->table = "users";
        $db->condition = "WHERE user_id={$_POST["id"]}";
        $query = $db->select();
        $row = mysqli_fetch_assoc($query);


        if (!empty($row["img"])) {
            unlink("imgall/{$row["img"]}");
        }

        $newImage = "member_{$id}_" . date("Y-m-d") . $type;
        $upload = move_uploaded_file($_FILES["img"]["tmp_name"], "imgall/" . $newImage);
        if ($upload) {
            $db->table = "users";
            $db->value = "img='{$newImage}'";
            $db->condition = "WHERE user_id={$id}";
            $db->update();
        }
    }
}

echo "<script>window.location.href = 'admin_member.php';</script>";
