<?php
session_start();
include('conn.php');

if (!isset($_SESSION['is_login'])) {
  header("Location: login.php");
  exit;
} else {
  $select_stmt = $conn->prepare("SELECT * FROM customer WHERE ctm_user = :ctm_user");
  $select_stmt->bindParam(':ctm_user', $_SESSION['ctm_user']);
  $select_stmt->execute();
  $row = $select_stmt->fetch((PDO::FETCH_ASSOC));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>ข้อมูลส่วนตัว</title>
</head>

<body>
  <div class="container">
    <div class="text-center mt-4">
      <h3>ข้อมูลส่วนตัว : <?php echo $_SESSION['ctm_user']; ?></h3>
      <p class="text-muted">รายละเอียดของลูกค้า
        <hr>
      </p>
    </div>
    <div class="row">
      <div class="col mt-4">
        <div class="card border-0">
          <div class="card-body">
            <form action="#" method="POST" class="row g-3">
              <input type="hidden" name="customer_id" value="<?= $row['customer_id'] ?>">
              <div class="col-md-5">
                <label class="form-label">ชื่อ :</label>
                <input type="text" name="ctm_name" class="form-control" value="<?= $row['ctm_name'] ?>" readonly />
              </div>
              <div class="col-md-5">
                <label class="form-label">นามสกุล :</label>
                <input type="text" name="ctm_sname" class="form-control" value="<?= $row['ctm_sname'] ?>" readonly />
              </div>
              <div class="col-md-6">
                <label class="form-label">ชื่อผู้ใช้ :</label>
                <input type="text" name="ctm_user" class="form-control" value="<?= $row['ctm_user'] ?>" readonly />
              </div>
              <div class="col-md-6">
                <label class="form-label">รหัสผ่าน :</label>
                <input type="password" name="ctm_password" class="form-control" value="<?= $row['ctm_password'] ?>" readonly />
              </div>
              <div class="col-md-4">
                <label class="form-label">เบอร์โทรศัพท์:</label>
                <input type="text" name="ctm_phone" class="form-control" value="<?= $row['ctm_phone'] ?>" readonly />
              </div>
              <div class="col-md-8">
                <label class="form-label">อีเมล:</label>
                <input type="text" name="ctm_email" class="form-control" value="<?= $row['ctm_email'] ?>" readonly />
              </div>
              <div class="col-12">
                <label class="form-label">ที่อยู่:</label>
                <input type="text" name="ctm_address" class="form-control" value="<?= $row['ctm_address'] ?>" readonly />
              </div>
              <div class="mb-3">
                <button type="submit" name="#" class="btn btn-warning">แก้ไขข้อมูล</button>
                <a href="index_ctm.php" class="btn btn-danger">ยกเลิก</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <h1>โปรไฟล์</h1>
                <div class="card mt-5">
                    <div class="card-body">
                        <h4>รายละเอียด</h4>
                        <span class="mt-5">Username</span> : <span><?php echo $row['ctm_user']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>