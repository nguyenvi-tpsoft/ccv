<?php
include('../../includes/config.php');
include('../../includes/database.php');
require('../../modules/khachhangClass.php');
$db = new KhachHang();
$msdv = $_COOKIE['msdv'];
$mskh = $_POST['mskh'];
$danhsach_khachhang = $db->khachhang_chitiet_load($msdv, $mskh);
$stt = 1;
foreach ($danhsach_khachhang as $r) { ?>
    <tr>
        <td><?= $stt ?></td>
        <td style="display: none;" class="ctkh_mskh_td"><?= $r->mskh ?></td>
        <td style="display: none;" class="ctkh_msct_td"><?= $r->msct ?></td>
        <td class="ctkh_tenkh_td"><?= $r->tenkh ?></td>
        <td><?= $db->_getname_tennhanvien($msdv, $r->msdn) ?></td>
        <td><?= date('d/m/y H:i', strtotime($r->lastmodify)) ?></td>
        <td><?= date('d/m/y H:i', strtotime($r->ngay)) ?></td>
        <td class="ctkh_yeucau_td"><?= $r->yeucau ?></td>
        <td class="ctkh_note_td"><?= $r->note ?></td>
        <td class="ctkh_gia_td"><?= str_replace(',', '.', number_format($r->gia)) ?></td>
        <td style="display: none;" class="ctkh_ngay_td"><?= date('d/m/Y', strtotime($r->ngay)) ?></td>
        <td style="display: none;" class="ctkh_trangthai_td"><?= $r->trangthai ?></td>
        <td style="display: none;" class="ctkh_link_td"><?= $r->linktailieu ?></td>
        <td><?= $db->_getname_trangthai_ctkh($msdv, $r->trangthai) ?></td>
        <?php
        if ($r->linktailieu != '') { ?>
            <td onclick="window.open('<?= $r->linktailieu ?>', '_blank')" class="linktailieu_td center"><i class="fas fa-paperclip"></i></td>
        <?php } else { ?>
            <td></td>
        <?php }
        ?>

        <td onclick="open_ctkh_edit(this)" data-toggle="modal" data-target="#form_chitiet_edit"><i class="far fa-edit"></i></td>
        <?php
        if ($_COOKIE['msdn'] == $r->msdn || $_COOKIE['loainv'] == '9') { ?>
            <td onclick="open_ctkh_delete(this)" data-toggle="modal" data-target="#form_chitiet_delete"><i class="far fa-trash-alt"></i></td>
        <?php } else {
            echo '<td></td>';
        }
        ?>

    </tr>
<?php $stt++;
}
