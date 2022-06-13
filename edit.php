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
    <title>แก้ไขข้อมูล</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>แก้ไขข้อมูลลูกค้า
                            <a href="index.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['customer_id'])) {
                            $customer_id = $_GET['customer_id'];
                            $query = "SELECT * FROM customer WHERE customer_id =:customer_id";
                            $stmt = $conn->prepare($query);
                            $data = [':customer_id' => $customer_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="crud.php" method="POST">
                            <input type="hidden" name="customer_id" value="<?= $result['customer_id'] ?>">
                            <div class="mb-3">
                                <label>ชื่อ:</label>
                                <input type="text" name="ctm_name" class="form-control" value="<?= $result['ctm_name'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>นามสกุล:</label>
                                <input type="text" name="ctm_sname" class="form-control" value="<?= $result['ctm_name'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>นามสกุล:</label>
                                <input type="text" name="ctm_sname" class="form-control" value="<?= $result['ctm_name'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>เบอร์โทร:</label>
                                <input type="text" name="ctm_phone" class="form-control" value="<?= $result['ctm_phone'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>ชื่อผู้ใช้:</label>
                                <input type="text" name="ctm_user" class="form-control" value="<?= $result['ctm_user'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>รหัสผ่าน:</label>
                                <input type="text" name="ctm_password" class="form-control" value="<?= $result['ctm_password'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>อีเมล:</label>
                                <input type="text" name="ctm_email" class="form-control" value="<?= $result['ctm_email'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label>ที่อยู่:</label>
                                <input type="text" name="ctm_address" class="form-control" value="<?= $result['ctm_address'] ?>" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit" class="btn btn-primary">แก้ไขข้อมูล</button>
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