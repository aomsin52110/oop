<?php
include "headadmin.php";
?>

<div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">

      <span class="fs-4">จัดการข้อมูล</span>
    </a>
  </header>
</div>
<div class="row">
  <div class="col-1"></div>
  <div class="col-10">
  <div class="clearfix"><div class="float-end"><button type="" class="btn btn-primary"><a href=insert_type.php class="btn btn-primary">เพิ่มประเภท</a></button></div></div>
    <div class="grid text-center">
    <h2 class="text-center mb-4">Table type <form>
    <form action="?" method="get" class="ms-auto">
        <div>
                    <label for="search">ค้นหา</label>
                    <input type="text" name="search" id="search" class="mx-2 px-1">
                    <button type="submit" class="btn btn-success">ค้นหา</button>
                </div>
        </form>
      </form></h2></h2>
    <table class="table table-bordered table-striped">
        <thead>
          <tr>
            
            <th scope="col">typename</th>
            <th scope="col">config</th>
          </tr>
          <br>
        </thead>
        <tbody>

         <!-- แสดงปุ่มกดด้านล่าง -->
         <?php
          $limit = 6;
          $cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
          $start = ($cur_page - 1) * $limit;

          $search = "";
          $db->table = "type";
          $db->condition = " LIMIT {$start}, {$limit}";
          if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $db->condition = "WHERE type_name LIKE '%{$search}%'";
          }
          $n = 0;
          $query = $db->select();

          $db_1->field = "count(type_id) AS type_id";
          $db_1->table = "product";
          $q = $db_1->select();
          $r = mysqli_fetch_assoc($q);
          $total = $r['type_id'];
          $page = ceil($total / $limit);

          while ($i = mysqli_fetch_assoc($query)) {
            $n += 1;
          }
          ?>

          <?php
          $condition = "";
          if( !empty($_GET["q"]) ){
              $condition = "WHERE type_name LIKE '%{$_GET["q"]}%'
                            }%'";
          }
          $db->table = "type";
          $query = $db->select();
          while ($row = mysqli_fetch_assoc($query)) {
          ?>
            <tr>
              
              <td><?php
                  echo $row['type_name'];
                  ?>
              </td>
              
              
              <td>
                <a class="btn btn-primary" href="viewadmin_type.php?type_id=<?php echo $row['type_id']; ?>">VIEW</a>
                <a onclick="confirm('กรุณายืนยันการลบ ?')" class="btn btn-warning" href="deftype.php?type_id=<?php echo $row['type_id']; ?>">DEL</a>
              </td>
            </tr>
    </div>
  </div>

<?php
          }
?>
</tbody>
</table>
<nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <?php if($cur_page > 1) { ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $cur_page-1;?>">Previous</a>
                    </li>
                <?php } ?>
                <?php for($i=1; $i<= $page; $i++){ ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <?php if($page != $cur_page){ ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $cur_page+1; ?>">Next</a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>