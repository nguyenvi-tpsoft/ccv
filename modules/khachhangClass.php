<?php

class KhachHang extends database
{
    //todo lấy danh sách khách hàng
    public function khachhang_load($msdv)
    {
        $getall = $this->connect->prepare("SELECT a.tenkh,a.lydo,b.giatri as tentrangthai,a.mskh,a.trangthai,a.diachi,a.dienthoai,a.ngay from khachhang a left join dmphanloai b on a.msdv = b.msdv and a.trangthai = b.msloai where a.msdv = '$msdv' and b.msdv = '$msdv' and b.phanloai = 'trangthaikhachhang' order by a.rowid DESC");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //todo filter danh sách khách hàng
    public function khachhang_filter($msdv, $tungay, $denngay, $trangthai, $msdn)
    {
        $getall = $this->connect->prepare("SELECT a.tenkh,a.lydo,b.giatri as tentrangthai,a.mskh,a.trangthai,a.diachi,a.dienthoai,a.ngay from khachhang a left join dmphanloai b on a.msdv = b.msdv and a.trangthai = b.msloai where a.msdv = '$msdv' and b.msdv = '$msdv' and b.phanloai = 'trangthaikhachhang' and a.ngay between '$tungay' and '$denngay'" . $trangthai . $msdn . " order by a.rowid DESC");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //todo lấy danh sách khách hàng
    public function khachhang_chitiet_load($msdv, $mskh)
    {
        $getall = $this->connect->prepare("SELECT a.linktailieu,a.msct,a.mskh,a.yeucau,a.trangthai,a.note,a.msdn,a.tenkh,a.msdn,a.lastmodify,a.gia,a.ngay,a.linktailieu from khachhang_chitiet a where a.msdv = '$msdv' and a.mskh='$mskh' order by a.rowid DESC");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //todo lấy danh sách trạng thái
    public function list_trangthai($msdv)
    {
        $getall = $this->connect->prepare("SELECT msloai,giatri from dmphanloai where msdv='$msdv' and phanloai='trangthaikhachhang' order by msloai");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //todo lấy danh sách trạng thái chi tiết khách hàng
    public function list_trangthai_ctkh($msdv)
    {
        $getall = $this->connect->prepare("SELECT msloai,giatri from dmphanloai where msdv='$msdv' and phanloai='trangthai_ctkh'  order by msloai");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //todo lấy danh sách lý do
    public function list_lydo($msdv)
    {
        $getall = $this->connect->prepare("SELECT msloai,giatri from dmphanloai where msdv='$msdv' and phanloai='lydokhachhang'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    public function list_user($msdv)
    {
        $getall = $this->connect->prepare("SELECT msdn, hoten FROM hosonhanvien where msdv='$msdv' ");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        return $getall->fetchAll();
    }
    //todo thêm khách hàng 
    public function khachhang_add($msdv, $tendv, $msdn, $msctv, $ngay, $mskh, $tenkh, $dienthoai, $diachi, $trangthai, $lydo)
    {
        $getall = $this->connect->prepare("INSERT INTO khachhang(lastmodify,msdv,tendv,msdn,msctv,ngay,mskh,tenkh,dienthoai,diachi,trangthai,lydo)
        VALUES (NOW(),'$msdv','$tendv','$msdn','$msctv','$ngay','$mskh','$tenkh','$dienthoai','$diachi','$trangthai','$lydo')");
        $getall->execute();
    }
    //todo chỉnh sửa khách hàng 
    public function khachhang_edit($msdv, $tendv, $msdn, $ngay, $mskh, $tenkh, $dienthoai, $diachi, $trangthai, $lydo)
    {
        $getall = $this->connect->prepare("UPDATE khachhang set lastmodify = NOW(),tendv='$tendv',ngay='$ngay',tenkh='$tenkh',dienthoai='$dienthoai',diachi='$diachi',trangthai='$trangthai',lydo='$lydo' where msdv = '$msdv' and mskh = '$mskh'");
        $getall->execute();
    }
    //todo xóa khách hàng 
    public function khachhang_delete($msdv, $mskh)
    {
        $getall = $this->connect->prepare("DELETE FROM khachhang where msdv='$msdv' and mskh='$mskh';
        DELETE from khachhang_chitiet where msdv= '$msdv' and mskh='$mskh';");
        $getall->execute();
    }
    //todo thêm chi tiết khách hàng 
    public function khachhang_chitiet_add($msdv, $msdn, $msct, $ngay, $mskh, $tenkh, $note, $yeucau, $gia, $trangthai, $linktailieu)
    {
        $getall = $this->connect->prepare("INSERT INTO khachhang_chitiet(lastmodify,msct,msdv,msdn,ngay,mskh,tenkh,note,yeucau,gia,trangthai,linktailieu)
         VALUES (NOW(),'$msct','$msdv','$msdn','$ngay','$mskh','$tenkh','$note','$yeucau','$gia','$trangthai','$linktailieu')");
        $getall->execute();
    }
    //todo chỉnh sửa khách hàng 
    public function khachhang_chitiet_edit($msdv, $msdn, $msct,  $ngay, $mskh,  $trangthai, $note, $yeucau, $gia, $linktailieu)
    {
        $getall = $this->connect->prepare("UPDATE khachhang_chitiet set lastmodify = NOW(),msdn='$msdn',ngay='$ngay',trangthai='$trangthai',note='$note',yeucau='$yeucau',gia='$gia',linktailieu='$linktailieu' where msdv = '$msdv' and mskh = '$mskh' and msct = '$msct'");
        $getall->execute();
    }
    //todo xóa khách hàng 
    public function khachhang_chitiet_delete($msdv, $mskh, $msct)
    {
        $getall = $this->connect->prepare("DELETE FROM khachhang_chitiet where msdv='$msdv' and mskh='$mskh' and msct='$msct';");
        $getall->execute();
    }
    public function _getname_trangthai_ctkh($msdv, $msloai)
    {
        $getall = $this->connect->prepare("SELECT giatri FROM dmphanloai WHERE msdv ='$msdv' and msloai = '$msloai' and phanloai = 'trangthai_ctkh'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        $result = '';
        foreach ($getall as $value) {
            $result = $value->giatri;
        }
        return $result;
    }
    //todo lấy tên nhân viên
    public function _getname_tennhanvien($msdv, $msdn)
    {
        $getall = $this->connect->prepare("SELECT hoten FROM hosonhanvien WHERE msdv = '$msdv' and msdn = '$msdn'");
        $getall->setFetchMode(PDO::FETCH_OBJ);
        $getall->execute();
        $result = '';
        foreach ($getall as $value) {
            $result = $value->hoten;
        }
        return $result;
    }
}
