<?php
include('../../includes/config.php');
include('../../includes/database.php');
require('../../modules/khachhangClass.php');
$db = new KhachHang();
$msct = 'ID' . date("dmyHis", time()) . rand(1000, 9999);
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$ngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngay'])));
$mskh = $_POST['mskh'];
$tenkh = $_POST['tenkh'];
$note = $_POST['ghichu'];
$yeucau = $_POST['yeucau'];
$gia = $_POST['gia'];
$trangthai = $_POST['trangthai'];
$linktailieu = $_POST['linktailieu'];
$db->khachhang_chitiet_add($msdv, $msdn, $msct, $ngay, $mskh, $tenkh, $note, $yeucau, $gia, $trangthai, $linktailieu);
