<?php
include "head.php";
?>
<br>
<div class="card">
    <div class="row">

        <div class="col-2"></div>
        <div class="col-8">
        <form action="manage_product.php" method="POST" enctype="multipart/form-data">
            <h1>ข้อมูล แก้ไขสินค้า</h1>
            <?php
            $id = $_GET['product_id'];
            $db->table = "product";
            $db->condition = "WHERE product_id=$id";
            $query = $db->select();
            $row = mysqli_fetch_assoc($query);
            ?>
            <div class="input-group">

                <span class="input-group-text">ชื่อ</span>

                <input type="text" aria-label="name" class="form-control" name="name" value="<?php echo $row['name'] ?>">

                <input type="text" aria-label="Status" class="form-control" name="Status" value="<?php echo $row['Status'] ?>">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-text">ราคา</span>
                <input type="text" aria-label="price" class="form-control" name="price" value="<?php echo $row['price'] ?>">
            </div>
            <br>
                <input class="form-control form-control-lg" id="formFileLg"name="pro_img" type="file">
            </div>
            <br>
            <input type="hidden" name="product_id"  value="<?php echo $row['product_id'] ?>">
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