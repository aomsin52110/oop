<?php
include "headadmin.php";
?>

<div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">

      <span class="fs-4">PRODUCT</span>
    </a>
  </header>
</div>
<div class="row">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="clearfix">
      <div class="float-end"><button type="" class="btn btn-primary"><a href=insert_product.php class="btn btn-primary">เพิ่มสินค้า</a></button></div>
    </div>
    <div class="grid text-center">
    <div class="container mt-5">
      <h2 class="text-center mb-4">Table Prodcut <form>
      <form action="?" method="get" class="ms-auto">
        <div>
                    <label for="search">ค้นหา</label>
                    <input type="text" name="search" id="search" class="mx-2 px-1">
                    <button type="submit" class="btn btn-success">ค้นหา</button>
                </div>
        </form>
      </h2>
      </h2>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            
            <th scope="col">img</th>
            <th scope="col">name</th>
            <th scope="col">stat</th>
            <th scope="col">price</th>
            <th scope="col">config</th>



          </tr>
          <br>
        </thead>
        <tbody>
          <!-- แสดงปุ่มกดด้านล่าง -->
          <?php
          $limit = 10;
          $cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
          $start = ($cur_page - 1) * $limit;

          $search = "";
          $db->table = "product";
          $db->condition = " LIMIT {$start}, {$limit}";
          if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $db->condition = "WHERE name LIKE '%{$search}%'";
          }
          $n = 0;
          $query = $db->select();

          $db_1->field = "count(product_id) AS product_id";
          $db_1->table = "product";
          $q = $db_1->select();
          $r = mysqli_fetch_assoc($q);
          $total = $r['product_id'];
          $page = ceil($total / $limit);

          while ($i = mysqli_fetch_assoc($query)) {
            $n += 1;
          }
          ?>

          <?php
          $condition = "";
          if (!empty($_GET["q"])) {
            $condition = "WHERE name LIKE '%{$_GET["q"]}%'
                          OR stat LIKE '%{$_GET["q"]}%'
                          OR price LIKE '%{$_GET["q"]}%'
                          }%'";
          }
          $db->table = "product";
          $query = $db->select();
          while ($row = mysqli_fetch_assoc($query)) {
          ?>
            <tr>
              
              <td>
                <?php
                if (!empty($row["pro_img"])) {

                ?>
                  <img src="imgall/<?php echo $row['pro_img']; ?>" class="img-thumbnail" style="width: 50px">
                <?php
                } else {
                  echo "-";
                }
                ?>
              </td>

              <td><?php
                  echo $row['name'];
                  ?>
              </td>
              <td>
                <?php
                echo $row['Status'];
                ?>
              </td>
              <td>
                <?php
                echo $row['price'];
                ?>
              </td>

              <td>
                <a class="btn btn-primary" href="view_product.php?product_id=<?php echo $row['product_id']; ?>">VIEW</a>
                <a onclick="confirm('กรุณายืนยันการแก้ไข ?')" class="btn btn-warning" href="defproduct.php?product_id=<?php echo $row['product_id']; ?>">DEL</a>
              </td>

            </tr>
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
  </div>

  <?php
  include "foot.php";
  ?>