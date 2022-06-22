<?php
session_start();
include('conn.php');

if (isset($_POST['save_bakery'])) {
    $bk_name = $_POST['bk_name'];
    $bk_price = $_POST['bk_price'];
    $product_type_name = $_POST['product_type_id'];
    $query = "INSERT INTO bakery(bk_name,bk_price,product_type_id) VALUES(:bk_name,:bk_price,:product_type_id)";
    $query_run = $conn->prepare($query);

    $data = [
        ':bk_name' => $bk_name,
        ':bk_price' => $bk_price,
        ':product_type_name' => $product_type_name
    ];
    $query_execute = $query_run->execute($data);
    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: bakery.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: bakery.php');
        exit(0);
    }
}

if (isset($_POST['bakery_edit'])) {
    $bk_id = $_POST['bk_id'];
    $bk_name = $_POST['bk_name'];
    $bk_price = $_POST['bk_price'];
    $product_type_id = $_POST['product_type_id'];
    try {
        $query = "UPDATE bakery SET bk_name = :bk_name, bk_price = :bk_price, product_type_ = :product_type_id WHERE bk_id = :bk_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':bk_id' => $bk_id,
            ':bk_name' => $bk_name,
            ':bk_price' => $bk_price,
            ':product_type_id' => $product_type_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: bakery.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: bakery.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_bakery'])) {
    $bk_id = $_POST['delete_bakery'];
    try {
        $query = "DELETE FROM bakery WHERE bk_id = :bk_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':bk_id' => $bk_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: bakery.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: bakery.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}