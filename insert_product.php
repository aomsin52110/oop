<?php
include "head.php";
?>
<br>
<div class="card">
    <div class="row">

        <div class="col-2"></div>
        <form action="manage_product.php" method="POST" enctype="multipart/form-data">
            <div class="col-8">
                <h1>เพิ่มข้อมูลPRODUCT</h1>
                <div class="input-group">

                    <span class="input-group-text">ชื่อ</span>

                    <input type="text" aria-label="First name" class="form-control" name="name" value="มาม่า">
                    <span class="input-group-text">สินค้าคงเหลือ</span>
                    <input type="text" aria-label="Last name" class="form-control" name="Status" value="5">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-text">ราคา</span>
                    <input type="text" aria-label="tel" class="form-control" name="price" value="65">
                </div>
                <br>

                <input class="form-control form-control-lg" id="formFileLg" type="file" name="pro_img">
            <br>
            <button type="submit">เพิ่มสินค้า</button>
</div>
    </div>
    <input type="hidden" name="process" value="insert">
    </form>
</div>
</div>

<div class="col-2"></div>
</div>


<?php
include "foot.php";
?>