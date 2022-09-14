<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>ข้อมูลเบเกอรี่</title>
    <?php include 'navbar/head.php' ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <?php if (isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php
                    unset($_SESSION['message']);
                endif;
                ?>
                <div class="card">
                    <div class="card-body">
                        <h3>ข้อมูลเบเกอรี่
                            <a href="bakery_add.php" class="btn btn-primary float-end">เพิ่มข้อมูล</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-borderless table-hover">
                            <thead class="table-warning";>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รูปภาพเบเกอรี่</th>
                                    <th>ชื่อเบเกอรี่</th>
                                    <th>ราคา</th>
                                    <th>จำนวนเบเกอรี่</th>
                                    <th>วันที่เพิ่มสินค้า</th>
                                    <th>วันหมดอายุ</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                require 'conn.php';
                                $sql = "SELECT * FROM bakery";
                                $stmt = $conn->query($sql);
                                while ($row = $stmt->fetch()) {
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td></td>
                                        <td><?= $row['bk_name']; ?></td>
                                        <td><?= $row['bk_price']; ?></td>
                                        <td><?= $row['product_type_id']; ?></td>
                                        <td><?= $row['bk_number']; ?></td>
                                        <td><?= $row['update_date']; ?></td>
                                        <td><?= $row['expire_date']; ?></td>
                                        <td><a href="bakery_edit.php?bk_id=<?= $row['bk_id'] ?>" class="btn btn-primary">แก้ไข</a></td>
                                        <td>
                                            <form action="bakery_crud.php" method="POST">
                                                <button type="submit" name="delete_bakery" value="<?= $row['bk_id'] ?>" class="btn btn-danger">ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>