<?php
session_start();
include('conn.php');
if (isset($_POST['regis'])) {
  $ctm_name = $_POST['ctm_name'];
  $ctm_sname = $_POST['ctm_sname'];
  $ctm_user = $_POST['ctm_user'];
  $ctm_password = $_POST['ctm_password'];
  $ctm_email = $_POST['ctm_email'];
  $ctm_phone = $_POST['ctm_phone'];
  $ctm_address = $_POST['ctm_address'];

  if (empty($ctm_name) || empty($ctm_sname) || empty($ctm_user) || empty($ctm_password) || empty($ctm_email) || empty($ctm_phone) || empty($ctm_address)) {
    $_SESSION['error_fill'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
    header("Location: register.php");
    exit;
  } else {
    $select_stmt = $conn->prepare("SELECT COUNT(ctm_user) AS count_user FROM customer WHERE ctm_user = :ctm_user");
    $select_stmt->bindParam(':ctm_user', $ctm_user);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

    if ($row['count_user'] != 0) {
      $_SESSION['exist_fill'] = "ชื่อผู้ใช้นี้มีผู้ใช้แล้ว";
      header("Location: register.php");
      exit;
    } else {
      $ctm_password = password_hash($ctm_password, PASSWORD_DEFAULT);
      $insert_stmt = $conn->prepare("INSERT INTO customer (ctm_name, ctm_sname, ctm_user, ctm_password, ctm_email, ctm_phone, ctm_address) VALUES (:ctm_name, :ctm_sname, :ctm_user, :ctm_password, :ctm_email, :ctm_phone, :ctm_address)");
      $insert_stmt->bindParam(':ctm_name', $ctm_name);
      $insert_stmt->bindParam(':ctm_sname', $ctm_sname);
      $insert_stmt->bindParam(':ctm_user', $ctm_user);
      $insert_stmt->bindParam(':ctm_password', $ctm_password);
      $insert_stmt->bindParam(':ctm_email', $ctm_email);
      $insert_stmt->bindParam(':ctm_phone', $ctm_phone);
      $insert_stmt->bindParam(':ctm_address', $ctm_address);
      $insert_stmt->execute();

      if ($insert_stmt) {
        $_SESSION['ctm_user'] = $ctm_userss;
        $_SESSION['is_login'] = true;
        header("Location: index_ctm.php");
      } else {
        $_SESSION['error_insert'] = "ไม่สามารถนำเข้าข้อมูลได้";
        header("Location: register.php");
        exit;
      }
    }
  }
}