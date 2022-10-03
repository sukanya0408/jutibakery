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
    <title>เพิ่มข้อมูลเบเกอรี่</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>ข้อมูลเบเกอรี่
                        <a href="bakery.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="bakery_crud.php" method="POST">
                        <div class="col mb-3">
                            <div class="col mb-2">
                                <label>ชื่อเบเกอรี่</label>
                                <input type="text" name="bk_name" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>ราคา</label>
                                <input type="text" name="bk_price" class="form-control" />
                            </div>
                            <div>
                            <label>ประเภทสินค้า</label>
							<select name="product_type" class="form-control">
								<option value="1">ขนมปัง</option>
								<option value="2">คุกกี้</option>
								<option value="3">เค้ก</option>
                                <option value="4">พาย</option>
							</select>
                                    </div>
                            <div class="col mb-2">
                                <label>จำนวนเบเกอรี่</label>
                                <input type="text" name="bk_number" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>รูปภาพเบเกอรี่</label>
                                <input type="file" name="bk_image" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>วันที่เพิ่มสินค้า</label>
                                <input type="date" name="update_date" class="form-control" />
                            </div>
                            <div class="col mb-2">
                                <label>วันหมดอายุ</label>
                                <input type="date" name="expire_date" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_bakery" class="btn btn-primary">เพิ่มข้อมูลเบเกอรี่</button>
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