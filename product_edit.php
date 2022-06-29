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
    <title>แก้ไขประเภทสินค้า</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>แก้ไขประเภทสินค้า
                            <a href="product.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['product_type_id'])) {
                            $product_type_id = $_GET['product_type_id'];
                            $query = "SELECT * FROM product_type WHERE product_type_id =:product_type_id";
                            $stmt = $conn->prepare($query);
                            $data = [':product_type_id' => $product_type_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="product_crud.php" method="POST">
                            <input type="hidden" name="product_type_id" value="<?= $result['product_type_id'] ?>">
                            <div class="mb-3">
                                <label>ประเภทเบเกอรี่:</label>
                                <input type="text" name="product_type_name" class="form-control" value="<?= $result['product_type_name'] ?>" />
                            </div>    
                            <div class="mb-3">
                                <label>รูปภาพประเภทเบเกอรี่:</label>
                                <input type="file" name="pd_image" class="form-control" value="<?= $result['pd_image'] ?>" />
                            </div>                     
                            <div class="mb-3">
                                <button type="submit" name="product_edit" class="btn btn-primary">แก้ไขประเภทสินค้า</button>
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