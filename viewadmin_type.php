<?php
include "head.php";
?>
<br>
<div class="card">
    <div class="row">

        <div class="col-2"></div>
        <div class="col-8">
        <form action="manage_type.php" method="POST" enctype="multipart/form-data">
            <h1>ข้อมูล แก้ไข</h1>
            <?php
            $id = $_GET['type_id'];
            $db->table = "type";
            $db->condition = "WHERE type_id=$id";
            $query = $db->select();
            $row = mysqli_fetch_assoc($query);
            ?>
            <div class="input-group">

            <span class="input-group-text">typeName</span>

                <input type="text" aria-label="name" class="form-control" name="type_name" value="<?php echo $row['type_name'] ?>">

            </div>
            <br>
            <input type="hidden" name="type_id"  value="<?php echo $row['type_id'] ?>">
            <input type="hidden" name="process" value="update">
            <button type="submit">ยืนยันแก้ไข</button>
</form>

    </div>
</div>
</div>

<div class="col-2"></div>
</div>


<?php
include "foot.php";
?>