<?php
session_start();
include('conn.php');

if (isset($_POST['save_cus'])) {
    $ctm_name = $_POST['ctm_name'];
    $ctm_sname = $_POST['ctm_sname'];
    $ctm_address = $_POST['ctm_address'];
    $ctm_phone = $_POST['ctm_phone'];
    $ctm_email = $_POST['ctm_email'];

    $query = "INSERT INTO customer(ctm_name,ctm_sname,ctm_address,ctm_phone,ctm_email) VALUES(:ctm_name,:ctm_sname,:ctm_address,:ctm_phone,:ctm_email)";
    $query_run = $conn->prepare($query);

    $data = [
        ':ctm_name' => $ctm_name,
        ':ctm_sname' => $ctm_sname,
        ':ctm_address' => $ctm_address,
        ':ctm_phone' => $ctm_phone,
        ':ctm_email' => $ctm_email
    ];
    $query_execute = $query_run->execute($data);
    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: index.php');
        exit(0);
    }
}

if (isset($_POST['edit'])) {
    $customer_id = $_POST['customer_id'];
    $ctm_name = $_POST['ctm_name'];
    $ctm_sname = $_POST['ctm_sname'];
    $ctm_address = $_POST['ctm_address'];
    $ctm_email = $_POST['ctm_email'];
    $ctm_phone = $_POST['ctm_phone'];
    try {
        $query = "UPDATE customer SET ctm_name = :ctm_name, ctm_sname = :ctm_sname, ctm_address = :ctm_address, ctm_email = :ctm_email , ctm_phone = :ctm_phone WHERE customer_id = :customer_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':ctm_name' => $ctm_name,
            ':ctm_sname' => $ctm_sname,
            ':ctm_address' => $ctm_address,
            ':ctm_email' => $ctm_email,
            ':ctm_phone' => $ctm_phone,
            ':customer_id' => $customer_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: index.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: index.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_cus'])) {
    $customer_id = $_POST['delete_cus'];
    try {
        $query = "DELETE FROM customer WHERE customer_id = :customer_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':customer_id' => $customer_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: index.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: index.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}