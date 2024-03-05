<?php
include "head.php";
?>
<br>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="registerprocess.php" method="POST" enctype="multipart/form-data">
                        <h5 class="card-title text-center mb-4">Register</h5>
                        <form>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="" placeholder="Enter your username">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter your password">
                            </div>
                            <div class="mb-3">
                            
                                <input type="hidden" class="form-control" id="level" name="level" value="user">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Register</button>
                </div>
                <input type="hidden" name="process" value="insert">
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php
include "foot.php";
?>