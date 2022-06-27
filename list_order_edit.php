<?php
session_start();
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>แก้ไขรายการสั่งซื้อ</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>แก้ไขรายการสั่งซื้อ
                            <a href="lit_order.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['order_id'])) {
                            $order_id = $_GET['order_id'];
                            $query = "SELECT * FROM list_order WHERE order_id =:order_id";
                            $stmt = $conn->prepare($query);
                            $data = [':order_id' => $order_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="list_order_crud.php" method="POST">
                            <input type="hidden" name="order_id" value="<?= $result['order_id'] ?>">
                            <div class="mb-3">
                                <label>ชื่อเบเกอรี่:</label>
                                <input type="text" name="bk_name" class="form-control" value="<?= $result['bk_name'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>วันที่สั่งซื้อ:</label>
                                <input type="text" name="order_date" class="form-control" value="<?= $result['order_date'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>จำนวนที่สั่งซื้อ:</label>
                                <input type="text" name="tatal_bk" class="form-control" value="<?= $result['tatal_bk'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>ราคาสินค้าทั้งหมด:</label>
                                <input type="text" name="total_price" class="form-control" value="<?= $result['total_price'] ?>" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="list_order_edit" class="btn btn-primary">เพิ่มข้อมูล</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>