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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>แจ้งชำระเงิน
                        <a href="#" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="bakery_crud.php" method="POST">
                        <div class="col mb-3">
                            <div class="col mb-2">
                                <label>ชื่อ-นามสกุล :</label>
                                <input type="text" name="bk_name" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>ธนาคารที่โอน :</label>
                                <select class="form-select" name="payment" id="payment">
                                            <?php
                                            require 'conn.php';
                                            $stmt = $conn->query("select bankaccount from payment WHERE bankaccount IN ('ธนาคารกรุงไทย','ธนาคารไทยพาณิชย์','ธนาคารกรุงเทพ')");
                                            while ($row = $stmt->fetch()) {
                                            ?>
                                                <option value="<?= $row['payment_id'] ?>"><?= $row['bankaccount'] ?></option>
                                            <?php }  ?>
                                        </select>
                            </div>
                            <div class="col mb-2">
                                <label>จำนวนเงินที่โอน :</label>
                                <input type="text" name="amount" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>หลักฐานการชำระเงิน :</label>
                                <input type="file" name="payment_image" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>วันที่ชำระ :</label>
                                <input type="date" name="payment_date" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_bakery" class="btn btn-primary">ยืนยัน</button>
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