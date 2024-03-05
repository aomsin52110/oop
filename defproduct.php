<?php
    include "data.php";
    $db =new Database();
    
    
    

    if(isset($_GET['product_id'])){
            $id=$_GET['product_id'];
            $db->table="product";
            $db->condition= "WHERE product_id=".$id;
            $query = $db->delete();
            
        }
        echo "<script>window.location.href = 'admin_product.php';</script>";
        
    ?>