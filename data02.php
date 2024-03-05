<?php
include "head.php";
?>

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a  class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        
        <span class="fs-4">จัดการข้อมูล</span>
      </a>
    </header>
  </div>
    
    <div class="grid text-center">
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">fname</th>
      <th scope="col">lname</th>
      <th scope="col">tel</th>
      <th scope="col">line_id</th>
      <th scope="col">email</th>
      <th scope="col">address</th>
      <th scope="col">config</th>
      <th scope="col"><button type="" class="btn btn-primary"><a href=incul.php class="btn btn-primary">เพิ่ม</a></button></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $db->table ="members";
    $query =$db->select();
    while ($row=mysqli_fetch_assoc($query)){
    ?>
    <tr>
      <td>
        <?php
         echo $row['id'];
      ?>
      </td>
      <td><?php
         echo $row['fname'];
      ?>
      </td>
      <td>
      <?php
         echo $row['lname'];
      ?>
      </td>
      <td>
      <?php
         echo $row['tel'];
      ?>
      </td>
      <td>
      <?php
         echo $row['line_id'];
      ?>
      </td>
      <td>
      <?php
         echo $row['email'];
      ?>
      </td>
      <td>
      <?php
         echo $row['address'];
      ?>
      </td>
      <td>
      <a class="btn btn-primary" href="view.php?id=<?php echo $row['id']; ?>">VIEW</a>
      <a onclick="confirm('กรุณายืนยันการแก้ไข ?')"class="btn btn-warning" href="pro.php?id=<?php echo $row['id']; ?>">DEL</a>
      </td>
      
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>