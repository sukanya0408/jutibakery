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
    <title>สั่งซื้อสินค้า</title>
    <?php require_once 'navbar/head.php' ?>
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
                        <h3>ทำรายการสั่งซื้อ
                            <a href="list_order_add.php" class="btn btn-primary float-end">เพิ่มรายการสั่งซื้อ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-borderless table-hover">
                            <thead class="table-warning";>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อเบเกอรี่</th>
                                    <th>วันที่สั่งซื้อ</th>
                                    <th>จำนวนที่สั่งซื้อ</th>
                                    <th>ราคาสินค้าทั้งหมด</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                require 'conn.php';
                                $sql = "SELECT * FROM list_order";
                                $stmt = $conn->query($sql);
                                while ($row = $stmt->fetch()) {
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['bk_name']; ?></td>
                                        <td><?= $row['order_date']; ?></td>
                                        <td><?= $row['tatal_bk']; ?></td>
                                        <td><?= $row['tatal_price']; ?></td>
                                        <td><a href="list_order_edit.php?order_id=<?= $row['order_id'] ?>" class="btn btn-primary">แก้ไข</a></td>
                                        <td>
                                            <form action="list_order_crud.php" method="POST">
                                                <button type="submit" name="delete_list_order" value="<?= $row['order_id'] ?>" class="btn btn-danger">ลบ</button>
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