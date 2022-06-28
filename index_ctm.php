<?php
session_start();
if (!isset($_SESSION['is_login'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>หน้าแรกลูกค้า</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <?php include 'navbar/nav_cus.php' ?>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="mt-5">Home Page</h1>
        <div class="card mt-5 text-center">
          <div class="card-body">

            <?php
            require 'conn.php';
            $sql = "SELECT * FROM bakery";
            $stmt = $conn->query($sql);
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
            ?>
              <div class="col-sm-3" style="margin-bottom:50px;">
                <img src="image/<?= $row['bk_image']; ?>" width="100%"><br>
                <b><?= $row['bk_name']; ?></b>
                <b>ประเภท <?= $row['product_type_id']; ?> </b><br>
                ราคา <?= $row['bk_price']; ?>
                วันที่เพิ่มสินค้า <?= $row['update_date']; ?>
                วันหมดอายุ <?= $row['expire_date']; ?> <br>
                <?php if ($row['bk_name'] > 0) {
                  echo '<a href="#" style="width:100%" class="btn btn-success btn-sm">จอง</a>';
                } else 
                ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.min.js"></script>
</body>

</html>