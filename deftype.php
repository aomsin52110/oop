<?php
    include "data.php";
    $db =new Database();
    
    
    

    if(isset($_GET['type_id'])){
            $id=$_GET['type_id'];
            $db->table="type";
            $db->condition= "WHERE type_id=".$id;
            $query = $db->delete();
            
        }
        echo "<script>window.location.href = 'admin_type.php';</script>";
    ?>