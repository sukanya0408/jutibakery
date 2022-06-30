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
    <title>การแจ้งชำระเงิน</title>
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
                        <h3>การแจ้งชำระเงิน
                            <a href="transfer_add.php" class="btn btn-primary float-end">เพิ่มข้อมูล</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-borderless table-hover">
                            <thead class="table-warning";>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ</th>
                                    <th>วันที่ชำระเงิน</th>
                                    <th>สถานะ</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                require 'conn.php';
                                $sql = "SELECT * FROM payment";
                                $stmt = $conn->query($sql);
                                while ($row = $stmt->fetch()) {
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['ctm_name']; ?></td>
                                        <td><?= $row['payment_date']; ?></td>
                                        <td><?= $row['status_name']; ?></td>
                                        <td><a href="transfer_edit.php?payment_id =<?= $row['payment_id '] ?>" class="btn btn-primary">แก้ไข</a></td>
                                        <td>
                                            <form action="transfert_crud.php" method="POST">
                                                <button type="submit" name="delete_transfer" value="<?= $row['payment_id'] ?>" class="btn btn-danger">ลบ</button>
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