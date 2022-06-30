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
  <title>Home page</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <?php include 'navbar/nav_cus.php' ?>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h5 class="mt-5">ประเภทเบเกอรี่</h5>
        <div class="card mt-6 text-center">
          <div class="card-body">

            <?php
            require 'conn.php';
            $sql = "SELECT * FROM product_type";
            $stmt = $conn->query($sql);
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
            ?>
              <div class="col-sm-6" style="float:left; width: 300px;">
                <img src="image/<?= $row['pd_image']; ?>" width="80%"><br>
                <b><?= $row['product_type_name']; ?></b> 
            </br>
            <a class="btn btn-primary"style="width:60%" disabled href="#" role="button">เลือกสินค้า</a>
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