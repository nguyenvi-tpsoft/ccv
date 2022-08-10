<?php

class Api extends database
{
    public function Login($user, $pass)
    {
        $getall = $this->connect->prepare("SELECT msdv,msdn,hoten,loainv FROM hosonhanvien WHERE msdn = '$user' AND matkhau = '$pass'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function push_token($msdv, $msdn, $token, $date_expires)
    {
        $getall = $this->connect->prepare("UPDATE hosonhanvien set token = '$token',date_expires = '$date_expires' where msdv = '$msdv' and msdn = '$msdn'");
        $getall->execute();
    }
    public function Login_Check($msdv, $msdn, $token, $date_expires)
    {
        $getall = $this->connect->prepare("SELECT rowid FROM hosonhanvien WHERE msdv = '$msdv' and msdn = '$msdn' and token = '$token' and CURRENT_DATE <= '$date_expires'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return count($getall->fetchAll());
    }
}
