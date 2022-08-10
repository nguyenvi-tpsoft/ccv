<?php
include('../../includes/config.php');
include('../../includes/database.php');
require('../../modules/khachhangClass.php');
$db_khachhang = new KhachHang();
$msdv = $_COOKIE['msdv'];

$list = $db_khachhang->khachhang_load($msdv);
$stt = 1;
foreach ($list as $r) {
    $dienthoai_before = str_replace('.', '', $r->dienthoai);
    $dienthoai_format =  substr($dienthoai_before, 0, 4) . '.' . substr($dienthoai_before, 4, 3) . '.' . substr($dienthoai_before, 7, 6); ?>
    <tr onclick="chitiet_khachhang_load('<?= $r->mskh ?>','<?= $r->tenkh ?>')">
        <td><?= $stt ?></td>
        <td style="display: none;" class="mskh_td"><?= $r->mskh ?></td>
        <td style="display: none;" class="trangthai_td"><?= $r->trangthai ?></td>
        <td style="display: none;" class="diachi_td"><?= $r->diachi ?></td>
        <td style="display: none;" class="lydo_td"><?= $r->lydo ?></td>
        <td style="display: none;" class="ngay_td"><?= date('Y-m-d', strtotime($r->ngay)) ?></td>
        <td style="display: none;" class="dienthoai_td"><?= $r->dienthoai ?></td>
        <td style="display: none;" class="tenkh_td"><?= $r->tenkh ?></td>
        <td class="left"><?= $r->tenkh . '-' . $r->diachi ?></td>
        <td class="center"><?= $dienthoai_format ?></td>
        <td><?= $r->tentrangthai ?></td>
        <td onclick="open_khachhang_edit(this)" data-target="#form_edit" data-toggle="modal"><i class="far fa-edit"></i></td>
        <?php
        if ($_COOKIE['loainv'] == '9') { ?>
            <td onclick="open_khachhang_delete(this)" data-target="#form_delete" data-toggle="modal"><i class="far fa-trash-alt"></i></td>
        <?php } else {
            echo '<td></td>';
        } ?>

    </tr>
<?php $stt++;
}
?>