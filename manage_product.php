<?php
    include "data.php";
    $db =new Database();
            
            $name = $_POST['name'];
            $Status = $_POST['Status'];
            $price = $_POST['price'];
            
            
            
            if($_POST["process"] == "update"){
            $id = $_POST['product_id'];
            $db->table="product";
            $db->value="name='{$name}', Status='{$Status}', price='{$price}'";
            $db->condition="WHERE product_id=$id";
            
            $query = $db->update();
            if($query){
                echo "<script>alert('แก้ไขสำเร็จ')</script>";
            }
            }

            if($_POST["process"] == "insert"){
            $db->table =  "product";
            $db->field = "name,Status,price";
            $db->value = "'{$name}','{$Status}','{$price}'";
                
                
            $query = $db->insert();
            $id =mysqli_insert_id($db->condb);
            if($query){
                echo "<script>alert('เพิ่มสำเร็จ')</script>";
               
            }
            
            }

            if( !empty($id) && !empty($_FILES['pro_img']['name']))
            {
                $pro_img=$_FILES['pro_img']["name"];
                $type = strrchr($pro_img,".");
                $imageCheck = [".jpg",".png",".jpeg"];
                if( in_array($type, $imageCheck)){
                    
                    $db->table = "product";
                    $db->condition = "WHERE product_id=$id";
                    $query = $db->select();
                    $row = mysqli_fetch_assoc($query);

                    if( !empty($row["pro_img"]) ){
                        unlink("imgall/".$row["pro_img"]);
                    }

                    $newImage = "product_{$id}_".date("Y-m-d").$type;
                    $upload = move_uploaded_file($_FILES["pro_img"]
                    ["tmp_name"],"imgall/".$newImage);
                    if( $upload){
                        $db->table = "product";
                        $db->value = "pro_img='{$newImage}'";
                        $db->condition = "WHERE product_id={$id}";
                        $db->update();
                    }
                }
            }
            
            echo "<script>window.location.href = 'admin_product.php';</script>";
            


    ?>
    