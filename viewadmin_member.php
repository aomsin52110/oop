<?php
include "head.php";
?>
<br>
<div class="card">
    <div class="row">

        <div class="col-2"></div>
        <div class="col-8">
        <form action="manage_member.php" method="POST" enctype="multipart/form-data">
            <h1>ข้อมูล แก้ไข</h1>
            <?php
            $id = $_GET['user_id'];
            $db->table = "users";
            $db->condition = "WHERE user_id=$id";
            $query = $db->select();
            $row = mysqli_fetch_assoc($query);
            ?>
            <div class="input-group">

                <span class="input-group-text">First and last name</span>

                <input type="text" aria-label="First name" class="form-control" name="fname" value="<?php echo $row['fname'] ?>">

                <input type="text" aria-label="Last name" class="form-control" name="lname" value="<?php echo $row['lname'] ?>">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-text">tel</span>
                <input type="text" aria-label="tel" class="form-control" name="tel" value="<?php echo $row['tel'] ?>">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-text">line email</span>
                <input type="text" aria-label="line_id" class="form-control" name="line_id" value="<?php echo $row['line_id'] ?>">
                <input type="text" aria-label="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-text">address</address></span>
                <input type="text" aria-label="address" class="form-control" name="address" value="<?php echo $row['address'] ?>">
            </div>
            <br>
            <div>


                <input class="form-control form-control-lg" id="formFileLg" name="img" type="file">
            </div>
            <br>
            <input type="hidden" name="id"  value="<?php echo $row['user_id'] ?>">
            <input type="hidden" name="process" value="update">
            <button class="btn btn-success" type="submit">ยืนยันแก้ไข</button>
</form>

    </div>
</div>
</div>

<div class="col-2"></div>
</div>


<?php
include "foot.php";
?>