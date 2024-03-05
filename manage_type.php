<?php
    include "data.php";
    $db =new Database();
            
            $type_name = $_POST['type_name'];
            
            
            
            if($_POST["process"] == "update"){
            $id = $_POST['type_id'];
            $db->table="type";
            $db->value="type_name='{$type_name}'";
            $db->condition="WHERE type_id=$id";
            
            $query = $db->update();
            if($query){
                echo "<script>alert('แก้ไขสำเร็จ')</script>";
            }
            }

            if($_POST["process"] == "insert"){
            $db->table =  "type";
            $db->field = "type_name";
            $db->value = "'{$type_name}'";
                
                
            $query = $db->insert();
            $id =mysqli_insert_id($db->condb);
            if($query){
                echo "<script>alert('เพิ่มสำเร็จ')</script>";
               
            }
            
            }

            if( !empty($id) && !empty($_FILES['img']['name']))
            {
                $img=$_FILES['img']["name"];
                $type = strrchr($img,".");
                $imageCheck = [".jpg",".png",".jpeg"];
                if( in_array($type, $imageCheck)){
                    
                    $db->table = "members";
                    $db->condition = "WHERE id=$id";
                    $query = $db->select();
                    $row = mysqli_fetch_assoc($query);
                    
                    if( !empty($row["img"]) ){
                        echo("");
                    }

                    if( !empty($row["img"]) ){
                        unlink("imgall/".$row["img"]);
                    }

                    $newImage = "member_{$id}_".date("Y-m-d").$type;
                    $upload = move_uploaded_file($_FILES["img"]
                    ["tmp_name"],"imgall/".$newImage);
                    if( $upload){
                        $db->table = "members";
                        $db->value = "img='{$newImage}'";
                        $db->condition = "WHERE id={$id}";
                        $db->update();
                    }
                }
            }
            
            echo "<script>window.location.href = 'admin_type.php';</script>";
            


    ?>
    