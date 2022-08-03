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
    <title>เพิ่มรายการสั่งซื้อ</title>
</head>

<body>
<div class="container">
        <div class="text-center mt-4">
            <h3>เพิ่มรายการสั่งซื้อ</h3>
            <p class="text-muted">กรอกเพื่อทำรายการสั่งซื้อ
                <hr>
            </p>
        </div>
        <div class="row">
            <div class="col mt-4">
                <div class="card border-0">
                    <div class="card-body">
                        <form action="list_order_crud.php" method="POST" class="row g-3">
                            <div>
                                        <select class="form-select" name="bakery" id="bakery">
                                            <?php
                                            require 'conn.php';
                                            $stmt = $conn->query("select bk_name, bk_price from bakery WHERE bk_name IN ('เค้กส้ม','ขนมปังสังขยา')");
                                            while ($row = $stmt->fetch()) {
                                            ?>
                                                <option value="<?= $row['bk_id'] ?>"><?= $row['bk_name'] ?></option>
                                            <?php }  ?>
                                        </select>
                                    </div>
                            <div class="col-md-6">
                                <label class="form-label">ราคา :</label>
                                <input type="text" name="bk_price" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">วันที่สั่งซื้อ :</label>
                                <input type="date" name="order_date" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">จำนวนที่สั่งซื้อ :</label>
                                <input type="text" name="tatal_bk" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_list_order" class="btn btn-primary">ทำรายการสั่งซื้อ</button>
                                <a href="index_ctm.php" class="btn btn-danger">ย้อนกลับ</a>
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