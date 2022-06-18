<?php
session_start();
include('conn.php');

if (isset($_POST['save_product'])) {
    $product_type_name = $_POST['product_type_name'];

    $query = "INSERT INTO product_type(product_type_name) VALUES(:product_type_name)";
    $query_run = $conn->prepare($query);

    $data = [
        ':product_type_name' => $product_type_name
    ];
    $query_execute = $query_run->execute($data);
    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: product.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: product.php');
        exit(0);
    }
}

if (isset($_POST['product_edit'])) {
    $product_type_id = $_POST['product_type_id'];
    $product_type_name = $_POST['product_type_name'];
    try {
        $query = "UPDATE product_type SET product_type_name = :product_type_name WHERE product_type_id = :product_type_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':product_type_id' => $product_type_id,
            ':product_type_name' => $product_type_name
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: product.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: product.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_product'])) {
    $product_type_id = $_POST['delete_product'];
    try {
        $query = "DELETE FROM product_type WHERE product_type_id = :product_type_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':product_type_id' => $product_type_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: product.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: product.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}