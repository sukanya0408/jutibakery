<?php
session_start();
include('conn.php');

if (isset($_POST['login_ad'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
}
if (empty($admin_username) || empty($admin_password)) {
    $_SESSION['error_fill'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
    header("Location: login_ad.php");
    exit;
} else {
    $select_stmt = $conn->prepare("SELECT COUNT(admin_username) AS count_user, admin_password FROM admin WHERE admin_username = :admin_username");
    $select_stmt->bindParam(':admin_username', $admin_username);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

    if ($row['count_user'] == 0) {
        $_SESSION['error_user'] = "ชื่อผู้ใช้นี้ไม่มีผู้ใช้ในระบบ";
        header("Location: login_ad.php");
        exit;
    } else {
        if (password_verify($admin_password, $row['admin_password'])) {
            $_SESSION['admin_username'] = $admin_username;
            $_SESSION['is_login'] = true;
            header("Location: home_ad.php");
        } else {
            $_SESSION['error_pass'] = "รหัสผ่านไม่ถูกต้อง";
            header("Location: login_ad.php");
            exit;
        }
    }
}