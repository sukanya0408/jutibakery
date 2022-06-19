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
    <title>เพิ่มข้อมูล</title>
</head>

<body>
<div class="container">
        <div class="text-center mt-4">
            <h3>เพิ่มข้อมูลลูกค้า</h3>
            <p class="text-muted">กรอกแบบฟอร์มเพื่อเพิ่มผู้ใช้ใหม่
                <hr>
            </p>
        </div>
        <div class="row">
            <div class="col mt-4">
                <div class="card border-0">
                    <div class="card-body">
                        <form action="crud.php" method="POST" class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">ชื่อ :</label>
                                <input type="text" name="ctm_name" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">นามสกุล :</label>
                                <input type="text" name="ctm_sname" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ชื่อผู้ใช้ :</label>
                                <input type="text" name="ctm_user" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">รหัสผ่าน :</label>
                                <input type="password" name="ctm_password" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">เบอร์โทรศัพท์:</label>
                                <input type="text" name="ctm_phone" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">อีเมล:</label>
                                <input type="text" name="ctm_email" class="form-control" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">ที่อยู่:</label>
                                <input type="text" name="ctm_address" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_cus" class="btn btn-primary">เพิ่มข้อมูล</button>
                                <a href="customer.php" class="btn btn-danger">ย้อนกลับ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="container">
        <div class="row">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>เพิ่มข้อมูลลูกค้า
                        <a href="customer.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="crud.php" method="POST">
                            <div class="col md-6">
                                <label>ชื่อ:</label>
                                <input type="text" name="ctm_name" class="form-control" />
                            </div>
                            <div class="col md-6">
                                <label>นามสกุล:</label>
                                <input type="text" name="ctm_sname" class="form-control" />
                            </div>
                            <div class="col -12">
                                <label>เบอร์โทร:</label>
                                <input type="text" name="ctm_phone" class="form-control" />
                            </div>
                            <div class="col md-6">
                                <label>ชื่อผู้ใช้:</label>
                                <input type="text" name="ctm_user" class="form-control" />
                            </div>
                            <div class="col md-6">
                                <label>รหัสผ่าน:</label>
                                <input type="text" name="ctm_password" class="form-control" />
                            </div>
                            <div class="col -12">
                                <label>อีเมล:</label>
                                <input type="text" name="ctm_email" class="form-control" />
                            </div>
                            <div class="col -12">
                                <label>ที่อยู่:</label>
                                <input type="text" name="ctm_address" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_cus" class="btn btn-primary">เพิ่มข้อมูล</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>