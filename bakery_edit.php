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
    <title>แก้ไขข้อมูลเบเกอรี่</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>แก้ไขข้อมูลเบเกอรี่
                            <a href="bakery.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['bk_id'])) {
                            $bk_id = $_GET['bk_id'];
                            $query = "SELECT * FROM bakery WHERE bk_id =:bk_id";
                            $stmt = $conn->prepare($query);
                            $data = [':bk_id' => $bk_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="bakery_crud.php" method="POST">
                            <input type="hidden" name="bk_id" value="<?= $result['bk_id'] ?>">
                            <div class="mb-3">
                                <label>ชื่อเบเกอรี่:</label>
                                <input type="text" name="bk_name" class="form-control" value="<?= $result['bk_name'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>ราคา:</label>
                                <input type="text" name="bk_price" class="form-control" value="<?= $result['bk_price'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>รหัสประเภทสินค้า:</label>
                                <input type="text" name="product_type_id" class="form-control" value="<?= $result['product_type_id'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>รูปภาพเบเกอรี่:</label>
                                <input type="text" name="bk_image" class="form-control" value="<?= $result['bk_image'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>วันที่เพิ่มสินค้า:</label>
                                <input type="date" name="update_date" class="form-control" value="<?= $result['update_date'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>วันหมดอายุ:</label>
                                <input type="date" name="expire_date" class="form-control" value="<?= $result['expire_date'] ?>" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="bakery_edit" class="btn btn-primary">แก้ไขข้อมูลเบเกอรี่</button>
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