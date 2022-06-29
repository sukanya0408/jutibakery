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
    <title>เพิ่มประเภทสินค้า</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>ประเภทสินค้า
                        <a href="product.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="product_crud.php" method="POST">
                        <div class="col mb-3">
                            <div class="col mb-2">
                                <label>ประเภทเบเกอรี่:</label>
                                <input type="text" name="product_type_name" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>รูปภาพประเภทเบเกอรี่:</label>
                                <input type="file" name="pd_image" class="form-control" />
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