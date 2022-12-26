<?php
session_start();
$taikhoan = $_POST['data_username'];
$matkhau = $_POST['data_password'];

// Sau khi dang nhap
require("../BackEnd/ConnectionDB/DB_driver.php");

$db = new DB_driver();
$db->connect();

$taikhoan = mysqli_escape_string($db->__conn, $taikhoan);
$matkhau = mysqli_escape_string($db->__conn, $matkhau);

// mysqli_set_charset($connSanPham,"utf8");
$sql = "SELECT * FROM nguoidung WHERE TaiKhoan = '$taikhoan' AND MatKhau='$matkhau' AND MaQuyen!='1' AND TrangThai='2'";

$dsad = $db->get_list($sql);

if (sizeof($dsad) > 0) {
    $_SESSION['currentUser'] = $dsad[0];
} else  echo "no";

$db->dis_connect();
