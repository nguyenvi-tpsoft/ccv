
//! Hàm change number
function _ChangeFormat(e) {
    var soluong = $(e).val().replace(/[.]/g, '');
    soluong = $(e).val().replace(/[.]/g, '').toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $(e).val(soluong);
}
khachhang_search = () => {
    var input, filter, table, tr, td, i, j;
    input = document.getElementById("tenkhachhang_search");
    filter = input.value.toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[đĐ]/g, m => m === 'đ' ? 'd' : 'D');;
    table = document.getElementById("khachhang_table_header");
    tr = table.getElementsByClassName("khachhang_tr");
    for (i = 0; i < tr.length; i++) {
        tr[i].style.display = "none";
        td = tr[i].getElementsByClassName("search_key");
        for (var j = 0; j < td.length; j++) {
            cell = tr[i].getElementsByClassName("search_key")[j];
            cell_html = cell.innerHTML.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/[đĐ]/g, m => m === 'đ' ? 'd' : 'D');
            if (cell_html) {
                if (cell_html.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                }
            }
        }
    }
}
khachhang_filter = () => {
    $('.chitiet_khachhang_tbody').html('')
    var tungay = $('.khachhang_tungay').val(),
        denngay = $('.khachhang_denngay').val(),
        trangthai = $('#trangthai_khachhang_loc option:selected').val(),
        msdn = $('#msdn_khachhang_loc option:selected').val();
    $.post("ajax/khachhang/khachhang_filter.php", {
        tungay: tungay,
        denngay: denngay,
        trangthai: trangthai,
        msdn: msdn
    }, function (data, textStatus, jqXHR) {
        $('.khachhang_tbody').html(data)
    });

}

khachhang_add = () => {
    var tenkh = $('#tenkh_add').val(),
        dienthoai = $('#dienthoai_add').val(),
        diachi = $('#diachi_add').val(),
        ngay = $('#ngay_add').val(),
        trangthai = $('#trangthai_khachhang_add option:selected').val(),
        lydo = $('#lydo_khachhang_add option:selected').val();
    $.post("ajax/khachhang/khachhang_add.php", {
        tenkh: tenkh,
        dienthoai: dienthoai,
        diachi: diachi,
        ngay: ngay,
        trangthai: trangthai,
        lydo: lydo
    }, function (data, textStatus, jqXHR) {
        $('#tenkh_add, #dienthoai_add, #diachi_add').val('');
        $('#trangthai_khachhang_add').prop('selectedIndex', 0)
        $('#lydo_khachhang_add').prop('selectedIndex', 0);
        khachhang_filter();
        $('#form_add').modal('hide')
    });
}
open_khachhang_edit = (e) => {
    $('#mskh_edit').val($(e).parent().find('.mskh_td').text());
    $('#tenkh_edit').val($(e).parent().find('.tenkh_td').text());
    $('#dienthoai_edit').val($(e).parent().find('.dienthoai_td').text());
    $('#diachi_edit').val($(e).parent().find('.diachi_td').text());
    $('#ngay_edit').val($(e).parent().find('.ngay_td').text());
    $('#trangthai_khachhang_edit').val($(e).parent().find('.trangthai_td').text());
    $('#lydo_khachhang_edit').val($(e).parent().find('.lydo_td').text());
}
khachhang_edit = () => {
    var mskh = $('#mskh_edit').val(),
        tenkh = $('#tenkh_edit').val(),
        dienthoai = $('#dienthoai_edit').val(),
        diachi = $('#diachi_edit').val(),
        ngay = $('#ngay_edit').val(),
        trangthai = $('#trangthai_khachhang_edit option:selected').val(),
        lydo = $('#lydo_khachhang_edit option:selected').val();
    $.post("ajax/khachhang/khachhang_edit.php", {
        mskh: mskh,
        tenkh: tenkh,
        dienthoai: dienthoai,
        diachi: diachi,
        ngay: ngay,
        trangthai: trangthai,
        lydo: lydo
    }, function (data, textStatus, jqXHR) {
        khachhang_filter();
        $('#form_edit').modal('hide');
    });
}
open_khachhang_delete = (e) => {
    $('#mskh_delete').val($(e).parent().find('.mskh_td').text());
    document.getElementById('khachhang_delete').innerHTML = $(e).parent().find('.tenkh_td').text();
}
khachhang_delete = () => {
    var mskh = $('#mskh_delete').val();
    $.post("ajax/khachhang/khachhang_delete.php", {
        mskh: mskh
    }, function (data, textStatus, jqXHR) {
        khachhang_filter();
        $('#form_delete').modal('hide');
    });
}

//! Chi tiết khách hàng
chitiet_khachhang_load = (mskh, tenkh, e) => {
    $('.khachhang_tr').removeClass('active');
    try {
        e.classList.add('active');

    } catch (error) {

    }
    $('#ctkh_mskh').val(mskh);
    $('#ctkh_tenkh').val(tenkh);
    $.post("ajax/khachhang/chitiet_khachhang_load.php", {
        mskh: mskh
    }, function (data, textStatus, jqXHR) {
        $('.chitiet_khachhang_tbody').html(data);
        $('#btn_add_chitiet').removeClass('hidden');
    });
}
khachhang_chitiet_add = () => {
    var ngay = $('#ctkh_ngay_add').val(),
        mskh = $('#ctkh_mskh').val(),
        tenkh = $('#ctkh_tenkh').val(),
        ghichu = $('#ctkh_note_add').val(),
        linktailieu = $('#ctkh_link_add').val(),
        yeucau = $('#ctkh_yeucau_add').val(),
        gia = $('#ctkh_gia_add').val().replace(/[.]/g, ''),
        trangthai = $('#trangthai_ctkh_add option:selected').val();
    $.post("ajax/khachhang/chitiet_khachhang_add.php", {
        ngay: ngay,
        mskh: mskh,
        tenkh: tenkh,
        ghichu: ghichu,
        linktailieu: linktailieu,
        yeucau: yeucau,
        gia: gia,
        trangthai: trangthai
    }, function (data, textStatus, jqXHR) {
        $('#ctkh_note_add, #ctkh_yeucau_add').val('');
        $('#trangthai_ctkh_add').prop('selectedIndex', 0);
        chitiet_khachhang_load(mskh, tenkh);
        $('#form_chitiet_add').modal('hide');
    });
}
open_ctkh_edit = (e) => {
    $('#ctkh_mskh_edit').val($(e).parent().find('.ctkh_mskh_td').text());
    $('#ctkh_msct_edit').val($(e).parent().find('.ctkh_msct_td').text());
    $('#ctkh_ngay_edit').val($(e).parent().find('.ctkh_ngay_td').text());
    $('#ctkh_note_edit').val($(e).parent().find('.ctkh_note_td').text());
    $('#ctkh_yeucau_edit').val($(e).parent().find('.ctkh_yeucau_td').text());
    $('#trangthai_ctkh_edit').val($(e).parent().find('.ctkh_trangthai_td').text());
    $('#ctkh_gia_edit').val($(e).parent().find('.ctkh_gia_td').text());
    $('#ctkh_link_edit').val($(e).parent().find('.ctkh_link_td').text());
}
khachhang_chitiet_edit = () => {
    var mskh = $('#ctkh_mskh_edit').val(),
        msct = $('#ctkh_msct_edit').val(),
        ngay = $('#ctkh_ngay_edit').val(),
        note = $('#ctkh_note_edit').val(),
        linktailieu = $('#ctkh_link_edit').val(),
        yeucau = $('#ctkh_yeucau_edit').val(),
        gia = $('#ctkh_gia_edit').val().replace(/[.]/g, ''),
        trangthai = $('#trangthai_ctkh_edit option:selected').val();
    $.post("ajax/khachhang/chitiet_khachhang_edit.php", {
        mskh: mskh,
        msct: msct,
        ngay: ngay,
        note: note,
        yeucau: yeucau,
        linktailieu: linktailieu,
        gia: gia,
        trangthai: trangthai
    }, function (data, textStatus, jqXHR) {
        chitiet_khachhang_load(mskh);
        $('#form_chitiet_edit').modal('hide')
    });
}
open_ctkh_delete = (e) => {
    $('#ctkh_mskh_delete').val($(e).parent().find('.ctkh_mskh_td').text())
    $('#ctkh_msct_delete').val($(e).parent().find('.ctkh_msct_td').text())
    document.getElementById('ctkh_yeucau_delete').innerHTML = $(e).parent().find('.ctkh_yeucau_td').text();
}
ctkh_delete = () => {
    var mskh = $('#ctkh_mskh_delete').val(),
        msct = $('#ctkh_msct_delete').val();
    $.post("ajax/khachhang/chitiet_khachhang_delete.php", {
        mskh: mskh,
        msct: msct
    }, function (data, textStatus, jqXHR) {
        chitiet_khachhang_load(mskh);
        $('#form_chitiet_delete').modal('hide');
    });
}

