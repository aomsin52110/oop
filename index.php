<?php
include "head.php";

?>

<!-- <form action="loginprocess.php" method="post">
    <input type="text" name="username" value="admin" placeholder="ชื่อผู้ใช้"><br>
    <input type="password" name="password" value="1234" placeholder="รหัสผ่าน"><br>
    <button type="submit">เข้าสู่ระบบ</button>
</form> -->

<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Login</h2>
                        
                        <form action="loginprocess.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">username</label>
                                <input type="username" class="form-control" value="admin" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" value="1234"  name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="register.php">Go to register</a>
                            <p class="text-end text-lowercase "><a href="forgot_pwd.php">Forgot password?</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
include "foot.php";
?>