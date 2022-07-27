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
    <title>แจ้งชำระเงิน</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>แจ้งชำระเงิน
                        <a href="product.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="product_crud.php" method="POST">
                        <h6>***กรุณากรอกรายละเอียดให้ครบถ้วน!!</h6>
                        <div class="col mb-3">
                            <div class="col mb-2">
                                <label>ชื่อ</label>
                                <input type="text" name="ctm_name" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>เบอร์โทรศัพท์</label>
                                <input type="text" name="ctm_phone" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>ธนาคารที่โอน</label>
                                <input type="text" name="ctm_name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_product" class="btn btn-primary">เพิ่มประเภทสินค้า</button>
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