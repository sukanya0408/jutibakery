<?php
session_start();
include('conn.php');

if (isset($_POST['login'])) {
  $ctm_user = $_POST['ctm_user'];
  $ctm_password = $_POST['ctm_password'];
}
if (empty($ctm_user) || empty($ctm_password)) {
  $_SESSION['error_fill'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
  header("Location: login.php");
  exit;
} else {
  $select_stmt = $conn->prepare("SELECT COUNT(ctm_user) AS count_user, ctm_password FROM customer WHERE ctm_user = :ctm_user");
  $select_stmt->bindParam(':ctm_user', $ctm_user);
  $select_stmt->execute();
  $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

  if ($row['count_user'] == 0) {
    $_SESSION['error_user'] = "ชื่อผู้ใช้นี้ไม่มีผู้ใช้ในระบบ";
    header("Location: login.php");
    exit;
  } else {
    if (password_verify($ctm_password, $row['ctm_password'])) {
      $_SESSION['ctm_user'] = $ctm_user;
      $_SESSION['is_login'] = true;
      header("Location: index_ctm.php");
    } else {
      $_SESSION['error_pass'] = "รหัสผ่านไม่ถูกต้อง";
      header("Location: login.php");
      exit;
    }
  }
}