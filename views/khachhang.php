<!-- Main Content -->
<div id="content">
    <input type="hidden" value="<?= $_COOKIE['token'] ?>" id="token">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h5 mb-2 text-gray-800" style="text-align: center; margin: 10px 0px; padding-bottom: 7px; border-bottom: solid 1px #d1d1d1;">CRM</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-2">
            <div class="row">
                <div class="col-12">
                    <div class="card-header py-3 card_header_khachhang">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách Khách hàng</h6>
                        <button data-toggle="modal" data-target="#form_add" class="btn btn-primary">Thêm khách hàng</button>
                    </div>
                    <div class="khachhang_filter_div" style="display: flex; justify-content: center; align-items: center;">
                        <input onkeyup="khachhang_search()" id="tenkhachhang_search" class="Input_Style" type="text" placeholder="Tên, số điện thoại" autocomplete="FALSE">
                        <div id="datepicker_khachhang" class="input-group date datepicker_khachhang" data-date-format="dd/mm/yyyy">
                            <input onchange="khachhang_filter()" class="form-control khachhang_tungay" value="<?= date('d/m/Y', strtotime('-30 day', strtotime(date('Y-m-d')))); ?>" type="text"> <span class="input-group-addon"></span>

                        </div>
                        <div id="datepicker_khachhang2" class="input-group date datepicker_khachhang" data-date-format="dd/mm/yyyy">
                            <input onchange="khachhang_filter()" class="form-control khachhang_denngay" name="denngay" value="<?= date('d/m/Y'); ?>" type="text"> <span class="input-group-addon"></span>
                        </div>
                        <select onchange="khachhang_filter()" class="form-control" id="trangthai_khachhang_loc">
                            <option value="">Trạng thái</option>
                            <?php
                            foreach ($list_trangthai as $r) { ?>
                                <option value="<?= $r->msloai ?>"><?= $r->giatri ?></option>
                            <?php }
                            ?>
                        </select>
                        <select onchange="khachhang_filter()" class="form-control" id="msdn_khachhang_loc">
                            <option value="">Nhân viên</option>
                            <?php
                            foreach ($list_user as $r) { ?>
                                <option value="<?= $r->msdn ?>"><?= $r->hoten ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="card-body card_body_khachhang">
                        <div id="khachhang_table_header" class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên Khách hàng</th>
                                        <th>Điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Chỉnh</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody class="khachhang_tbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card-header py-3 card_header_khachhang">
                        <h6 class="m-0 font-weight-bold text-primary">Nhật ký Khách hàng</h6>
                        <button id="btn_add_chitiet" data-toggle="modal" data-target="#form_chitiet_add" class="btn btn-info hidden">Thêm nhật ký</button>
                    </div>
                    <div class="card-body card_body_khachhang">
                        <div id="khachhang_table_line" class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên Khách hàng</th>
                                        <th>NV</th>
                                        <th>Ngày Thao tác</th>
                                        <th>Ngày</th>
                                        <th>Yêu cầu</th>
                                        <th>Ghi chú</th>
                                        <th>Báo giá</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="chitiet_khachhang_tbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


</div>
<!-- Form Add -->
<div class="modal fade" id="form_add" data-bs-backdrop="static" data-keyboard="false" aria-labelledby="form_add" aria-hidden="true">
    <div class="modal-dialog modal_dialog_xetnghiem">
        <div class="modal-content">
            <div style="padding:10px" class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Thêm mới Khách hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input type="text" id="tenkh_add" class="field__input" placeholder="Vui lòng nhập tên khách hàng" required>
                            <span class="field__label-wrap">
                                <span class="field__label">Tên Khách hàng</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="dienthoai_add" onkeyup="this.value = this.value.replace(/[^0-9\.\,]/g,'')" class="field__input" placeholder="Vui lòng nhập số điện thoại">
                            <span class="field__label-wrap">
                                <span class="field__label">Điện thoại</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="diachi_add" class="field__input" placeholder="Vui lòng nhập địa chỉ">
                            <span class="field__label-wrap">
                                <span class="field__label">Địa chỉ</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="ngay_add" value="<?= date('d/m/Y') ?>" class="field__input txt_date" data-date-format="dd-mm-yy" type="text" placeholder="Ngày" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask="" im-insert="false">
                            <span class="field__label-wrap">
                                <span class="field__label">Ngày</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <select class="form-control" id="trangthai_khachhang_add">
                            <option value="">Chọn Trạng thái</option>
                            <?php
                            foreach ($list_trangthai as $r) { ?>
                                <option value="<?= $r->msloai ?>"><?= $r->giatri ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <select class="form-control" id="lydo_khachhang_add">
                            <option value="">Chọn Lý do</option>
                            <?php
                            foreach ($list_lydo as $r) { ?>
                                <option value="<?= $r->msloai ?>"><?= $r->giatri ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="control_btn">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button style="margin-left: 5px;" type="button" onclick="khachhang_add()" class="btn btn-success">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form Edit -->
<div class="modal fade" id="form_edit" data-bs-backdrop="static" data-keyboard="false" aria-labelledby="form_add" aria-hidden="true">
    <div class="modal-dialog modal_dialog_xetnghiem">
        <div class="modal-content">
            <div style="padding:10px" class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Chỉnh sửa Khách hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input type="hidden" id="mskh_edit">
                            <input type="text" id="tenkh_edit" class="field__input" placeholder="Vui lòng nhập tên khách hàng" required>
                            <span class="field__label-wrap">
                                <span class="field__label">Tên Khách hàng</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="dienthoai_edit" onkeyup="this.value = this.value.replace(/[^0-9\.\,]/g,'')" class="field__input" placeholder="Vui lòng nhập số điện thoại">
                            <span class="field__label-wrap">
                                <span class="field__label">Điện thoại</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="diachi_edit" class="field__input" placeholder="Vui lòng nhập địa chỉ">
                            <span class="field__label-wrap">
                                <span class="field__label">Địa chỉ</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="ngay_edit" value="<?= date('d/m/Y') ?>" class="field__input txt_date" data-date-format="dd-mm-yy" type="text" placeholder="Ngày" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask="" im-insert="false">
                            <span class="field__label-wrap">
                                <span class="field__label">Ngày</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <select class="form-control" id="trangthai_khachhang_edit">
                            <option value="">Chọn Trạng thái</option>
                            <?php
                            foreach ($list_trangthai as $r) { ?>
                                <option value="<?= $r->msloai ?>"><?= $r->giatri ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <select class="form-control" id="lydo_khachhang_edit">
                            <option value="">Chọn Lý do</option>
                            <?php
                            foreach ($list_lydo as $r) { ?>
                                <option value="<?= $r->msloai ?>"><?= $r->giatri ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="control_btn">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button style="margin-left: 5px;" type="button" onclick="khachhang_edit()" class="btn btn-success">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete -->
<div class="modal fade" id="form_delete" data-bs-backdrop="static" data-keyboard="false" aria-labelledby="form_add" aria-hidden="true">
    <div class="modal-dialog modal_dialog_xetnghiem">
        <div class="modal-content">
            <div style="padding:10px" class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Đồng ý xóa?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="margin: 0;margin-left: 10px;" id="khachhang_delete"></p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="mskh_delete">
                <button data-dismiss="modal" class="btn btn-secondary">Hủy</button>
                <button onclick="khachhang_delete()" class="btn btn-danger">Đồng ý</button>
            </div>
        </div>

    </div>
</div>
<!-- Form Add chi tiết -->
<div class="modal fade" id="form_chitiet_add" data-bs-backdrop="static" data-keyboard="false" aria-labelledby="form_add" aria-hidden="true">
    <div class="modal-dialog modal_dialog_xetnghiem">
        <div class="modal-content">
            <div style="padding:10px" class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Thêm mới chi tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input type="hidden" id="ctkh_mskh">
                            <input type="hidden" id="ctkh_tenkh">
                            <input id="ctkh_ngay_add" value="<?= date('d/m/Y') ?>" class="field__input txt_date" data-date-format="dd-mm-yy" type="text" placeholder="Ngày" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask="" im-insert="false">
                            <span class="field__label-wrap">
                                <span class="field__label">Ngày</span>
                            </span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="ctkh_yeucau_add" class="field__input" placeholder="Vui lòng nhập Yêu cầu">
                            <span class="field__label-wrap">
                                <span class="field__label">Yêu cầu</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="ctkh_gia_add" class="field__input" onkeyup="this.value = this.value.replace(/[^0-9\.\,-]/g,'');_ChangeFormat(this)" type="text" placeholder="Vui lòng nhập Giá">
                            <span class="field__label-wrap">
                                <span class="field__label">Giá</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="ctkh_note_add" class="field__input" placeholder="Vui lòng nhập Ghi chú">
                            <span class="field__label-wrap">
                                <span class="field__label">Ghi chú</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="ctkh_link_add" class="field__input" placeholder="Vui lòng nhập Link tài liệu">
                            <span class="field__label-wrap">
                                <span class="field__label">Link tài liệu</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <select class="form-control" id="trangthai_ctkh_add">
                            <option value="">Chọn Trạng thái</option>
                            <?php
                            foreach ($list_trangthai_ctkh as $r) { ?>
                                <option value="<?= $r->msloai ?>"><?= $r->giatri ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="control_btn">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button style="margin-left: 5px;" type="button" onclick="khachhang_chitiet_add()" class="btn btn-success">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form edit chi tiết -->
<div class="modal fade" id="form_chitiet_edit" data-bs-backdrop="static" data-keyboard="false" aria-labelledby="form_add" aria-hidden="true">
    <div class="modal-dialog modal_dialog_xetnghiem">
        <div class="modal-content">
            <div style="padding:10px" class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Chỉnh sửa chi tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input type="hidden" id="ctkh_mskh_edit">
                            <input type="hidden" id="ctkh_msct_edit">
                            <input id="ctkh_ngay_edit" value="<?= date('d/m/Y') ?>" class="field__input txt_date" data-date-format="dd-mm-yy" type="text" placeholder="Ngày" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask="" im-insert="false">
                            <span class="field__label-wrap">
                                <span class="field__label">Ngày</span>
                            </span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="ctkh_yeucau_edit" class="field__input" placeholder="Vui lòng nhập Yêu cầu">
                            <span class="field__label-wrap">
                                <span class="field__label">Yêu cầu</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="ctkh_gia_edit" class="field__input" onkeyup="this.value = this.value.replace(/[^0-9\.\,-]/g,'');_ChangeFormat(this)" type="text" placeholder="Vui lòng nhập Giá">
                            <span class="field__label-wrap">
                                <span class="field__label">Giá</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="ctkh_note_edit" class="field__input" placeholder="Vui lòng nhập Ghi chú">
                            <span class="field__label-wrap">
                                <span class="field__label">Ghi chú</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <label class="field field_v2 width_100">
                            <input id="ctkh_link_edit" class="field__input" placeholder="Vui lòng nhập Link tài liệu">
                            <span class="field__label-wrap">
                                <span class="field__label">Link tài liệu</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">
                        <select class="form-control" id="trangthai_ctkh_edit">
                            <option value="">Chọn Trạng thái</option>
                            <?php
                            foreach ($list_trangthai_ctkh as $r) { ?>
                                <option value="<?= $r->msloai ?>"><?= $r->giatri ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="control_btn">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button style="margin-left: 5px;" type="button" onclick="khachhang_chitiet_edit()" class="btn btn-success">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form delete chi tiết -->
<div class="modal fade" id="form_chitiet_delete" data-bs-backdrop="static" data-keyboard="false" aria-labelledby="form_add" aria-hidden="true">
    <div class="modal-dialog modal_dialog_xetnghiem">
        <div class="modal-content">
            <div style="padding:10px" class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Đồng ý xóa?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="margin: 0;margin-left: 10px;" id="ctkh_yeucau_delete"></p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="ctkh_mskh_delete">
                <input type="hidden" id="ctkh_msct_delete">
                <button data-dismiss="modal" class="btn btn-secondary">Hủy</button>
                <button onclick="ctkh_delete()" class="btn btn-danger">Đồng ý</button>
            </div>
        </div>

    </div>
</div>
<script src="vendor/js/khachhang.js?v=<?= md5_file('vendor/js/khachhang.js') ?>"></script>