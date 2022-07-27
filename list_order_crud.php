<?php
session_start();
include('conn.php');

if (isset($_POST['save_list_order'])) {
    
    $bk_name = $_POST['bk_name'];
    $bk_price = $_POST['bk_price'];
    $order_date = $_POST['order_date'];
    $tatal_bk = $_POST['tatal_bk'];
    $query = "INSERT INTO list_order (bk_name,bk_price,order_date,tatal_bk) VALUES(:bk_name,:bk_price,:order_date,:tatal_bk)";
    $query_run = $conn->prepare($query);

    $data = [
        ':bk_name' => $bk_name,
        ':bk_price' => $bk_price,
        ':order_date' => $order_date,
        ':tatal_bk' => $tatal_bk
    ];
    $query_execute = $query_run->execute($data);
    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: list_order.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: list_order.php');
        exit(0);
    }
}

if (isset($_POST['list_order_edit'])) {
    $bk_name = $_POST['bk_name'];
    $bk_price = $_POST['bk_price'];
    $order_date = $_POST['order_date'];
    $tatal_bk = $_POST['tatal_bk'];
    try {
        $query = "UPDATE list_order SET bk_name = :bk_name,bk_price = :bk_price, order_date = :order_date, tatal_bk = :tatal_bk WHERE order_id = :order_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':order_id' => $order_id,
            ':bk_name' => $bk_name,
            ':bk_price' => $bk_price,
            ':order_date' => $order_date,
            ':tatal_bk' => $tatal_bk
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: list_order.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: list_order.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_list_order'])) {
    $bk_id = $_POST['delete_list_order'];
    try {
        $query = "DELETE FROM list_order WHERE order_id = :order_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':order_id' => $order_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: list_order.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: list_order.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}