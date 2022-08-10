<?php
$msdv = $_COOKIE['msdv'];
$filename = 'khachhang';
require('modules/khachhangClass.php');
$db = new KhachHang();
$list = $db->khachhang_load($msdv);
$list_trangthai = $db->list_trangthai($msdv);
$list_trangthai_ctkh = $db->list_trangthai_ctkh($msdv);
$list_lydo = $db->list_lydo($msdv);
$list_user = $db->list_user($msdv);
