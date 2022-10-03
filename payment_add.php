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
                        <a href="my_basket.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="bakery_crud.php" method="POST">
                        <div class="col mb-3">
                            <div class="col mb-2">
                                <label>ชื่อ-นามสกุล</label>
                                <input type="text" name="bk_name" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>ธนาคารที่โอน</label>
							<select name="payment" class="form-control">
								<option value="1">กรุงไทย</option>
								<option value="2">ไทยพาณิชย์</option>
								<option value="3">กรุงเทพ</option>
							</select>
                            </div>
                            <div class="col mb-2">
                                <label>จำนวนเงิน</label>
                                <input type="text" name="amount" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>หลักฐานการชำระเงิน</label>
                                <input type="file" name="payment_image" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>วันที่ชำระ </label>
                                <input type="date" name="payment_date" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="confirm_pay" class="btn btn-primary">ยืนยัน</button>
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