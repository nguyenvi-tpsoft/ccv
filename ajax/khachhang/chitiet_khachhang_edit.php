<?php
include('../../includes/config.php');
include('../../includes/database.php');
require('../../modules/khachhangClass.php');
$db = new KhachHang();
$msdv = $_COOKIE['msdv'];
$msdn = $_COOKIE['msdn'];
$msct = $_POST['msct'];
$ngay = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['ngay'])));
$mskh = $_POST['mskh'];
$note = $_POST['note'];
$yeucau = $_POST['yeucau'];
$trangthai = $_POST['trangthai'];
$gia = $_POST['gia'];
$linktailieu = $_POST['linktailieu'];
$db->khachhang_chitiet_edit($msdv, $msdn, $msct, $ngay, $mskh, $trangthai, $note, $yeucau, $gia, $linktailieu);
