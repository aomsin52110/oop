<?php
include "head.php";
?>
<br>
<div class="card">
    <div class="row">

        <div class="col-2"></div>
        <form action="manage_member.php" method="POST" enctype="multipart/form-data">
        <div class="col-8">
            <h1>เพิ่มข้อมูลMEMBER</h1>
            <div class="input-group">
                <span class="input-group-text">First and last name</span>
                <input type="text" aria-label="First name" class="form-control" name="fname" value="aomsin">
                <input type="text" aria-label="Last name" class="form-control" name="lname" value="janta">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-text">tel</span>
                <input type="text" aria-label="tel" class="form-control" name="tel" value="0888888888">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-text">line email</span>
                <input type="text" aria-label="line_id" class="form-control" name="line_id" value="sin@line">
                <input type="text" aria-label="email" class="form-control" name="email" value="email@haha">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-text">address</address></span>
                <input type="text" aria-label="address" class="form-control" name=address value="45 000marrr">
            </div>
            <br>
            <div>
                
                <input class="form-control form-control-lg" id="formFileLg" type="file"name="img">
            </div>
            <button type="submit">เพิ่มสมาชิก</button>
            
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