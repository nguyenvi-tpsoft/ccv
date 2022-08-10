<?php
function _check_matkhau($msdn, $matkhau)
{
    $database = new database();
    $getall = $database->connect->prepare("SELECT msdv,hoten,tendv,loainv from hosonhanvien where  msdn='$msdn' and matkhau=?");
    $getall->setFetchMode(PDO::FETCH_OBJ);
    $getall->execute(array(md5($matkhau)));
    return $getall->fetchAll();
}
