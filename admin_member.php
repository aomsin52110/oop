<?php
include "headadmin.php";

?>

<div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">


    </a>
  </header>
</div>
<div class="row">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="clearfix">

      <div class="float-end"><button type="" class="btn btn-primary"><a href=insert_member.php class="btn btn-primary ">add member</a></button></div>
    </div>
    <div class="grid text-center">
      <div class="container mt-5">
        <h2 class="text-center mb-4">Table Members
        </h2>
        <form action="?" method="get" class="ms-auto">
          <div>
            <label for="search">ค้นหา</label>
            <input type="text" name="search" id="search" class="mx-2 px-1">
            <button type="submit" class="btn btn-success">ค้นหา</button>
          </div>

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <!-- <th scope="col">id</th> -->
                <th scope="col">img</th>
                <th scope="col">username</th>
                <th scope="col">fname</th>
                <th scope="col">lname</th>
                <th scope="col">tel</th>
                <th scope="col">line_id</th>
                <th scope="col">email</th>
                <th scope="col">address</th>
                <th scope="col">config</th>


              </tr>
              <br>
            </thead>
            <tbody>
              <?php
              $limit = 6;
              $cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
              $start = ($cur_page - 1) * $limit;

              $search = "";
              $db->table = "users";
              $db->condition = " LIMIT {$start}, {$limit}";
              if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $db->condition = "WHERE username LIKE '%{$search}%'";
              }
              $n = 0;
              $query = $db->select();

              $db_1->field = "count(user_id) AS user_id";
              $db_1->table = "users";
              $q = $db_1->select();
              $r = mysqli_fetch_assoc($q);
              $total = $r['user_id'];
              $page = ceil($total / $limit);

              while ($i = mysqli_fetch_assoc($query)) {
                $n += 1;
              }
              ?>
              <?php
              $condition = "";
              if (!empty($_GET["q"])) {
                $condition = "WHERE fname LIKE '%{$_GET["q"]}%'
                            OR lname LIKE '%{$_GET["q"]}%'
                            OR tel LIKE '%{$_GET["q"]}%'
                            OR line_id LIKE '%{$_GET["q"]}%'
                            OR email LIKE '%{$_GET["q"]}%'";
              }
              $db->table = "users";
              $query = $db->select();
              $db->condition = $condition;
              while ($row = mysqli_fetch_assoc($query)) {
              ?>
                <tr>
                  <!-- <td>
                  <?php
                  echo $row['user_id'];
                  ?>
                </td> -->
                  <td>
                    <?php
                    if (!empty($row["img"])) {

                    ?>
                      <img src="imgall/<?php echo $row['img']; ?>" class="img-thumbnail" style="width: 50px">
                    <?php
                    } else {
                      echo "-";
                    }
                    ?>
                  </td>
                  <td><?php
                      echo $row['username'];
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
                    <a class="btn btn-primary" href="viewadmin_member.php?user_id=<?php echo $row['user_id']; ?>">VIEW</a>
                    <a onclick="confirm('ลบไหม')" class="btn btn-warning" href="defmember.php?user_id=<?php echo $row['user_id']; ?>">DEL</a>
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
      <?php if ($cur_page > 1) { ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $cur_page - 1; ?>">Previous</a>
        </li>
      <?php } ?>
      <?php for ($i = 1; $i <= $page; $i++) { ?>
        <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php } ?>
      <?php if ($page != $cur_page) { ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $cur_page + 1; ?>">Next</a>
        </li>
      <?php } ?>
    </ul>
  </nav>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>

  </html>