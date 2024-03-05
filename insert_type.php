<?php
include "head.php";
?>
<br>
<div class="card">
    <div class="row">

        <div class="col-2"></div>
        <form action="manage_type.php" method="POST" enctype="multipart/form-data">
        <div class="col-8">
            <h1>เพิ่มข้อมูลประเภท</h1>
            
            <div class="input-group">
                <span class="input-group-text">ประเภท</span>
                <input type="text" aria-label="tel" class="form-control" name="type_name" value="ของใช้">
            </div>
            </div>
            <button type="submit">เพิ่มประเภท</button>
            
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