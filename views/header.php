<!DOCTYPE html>
<html lang="en">

<head>
    <base href="https://localhost/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CCV</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" type="text/css" href="vendor/css/sb-admin-2.css?v=<?= md5_file('vendor/css/sb-admin-2.css') ?>">
    <link rel="stylesheet" type="text/css" href="vendor/css/style.css?v=<?= md5_file('vendor/css/style.css') ?>">
    <link href="vendor/css/input_style.css" rel="stylesheet">
    <link href="vendor/css/datepicker.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="vendor/img/logo.ico">

</head>
<?php
if (isset($_COOKIE['msdv']) && $_COOKIE['msdv'] != "") { ?>

    <body id="page-top">

        <div id="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                    <div class="sidebar-brand-text mx-3" style="font-family: 'Nunito'"><?= $_COOKIE['msdv'] ?> <?= date('Y') ?> <sup>CRM</sup></div>
                </a>

                <hr class="sidebar-divider my-0">

                <li class="nav-item active">
                    <a class="nav-link" href="index.html">
                        <i class="fas fa-home"></i>
                        <span>Trang chủ</span></a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Quản lý
                </div>
                <li class="nav-item">
                    <a href="khachhang" class="nav-link" href="charts.html">
                        <i class="fas fa-fw fa-user"></i>
                        <span>KHÁCH HÀNG</span></a>
                </li>



                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    BÁO CÁO
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span>DOANH THU</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Login Screens:</h6>
                            <a class="collapse-item" href="login.html">Login</a>
                            <a class="collapse-item" href="register.html">Register</a>
                            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Other Pages:</h6>
                            <a class="collapse-item" href="404.html">404 Page</a>
                            <a class="collapse-item" href="blank.html">Blank Page</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="charts.html">
                        <i class="fas fa-chart-pie"></i>
                        <span>BIỂU ĐỒ</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="DangNhap/Logout" class="nav-link" href="charts.html">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>ĐĂNG XUẤT</span>
                    </a>
                </li>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>


            </ul>
            <div id="content-wrapper" class="d-flex flex-column">

            <?php } else { ?>

                <body class="bg-gradient-primary">
                    <div class="container">

                        <!-- Outer Row -->
                        <div style="margin-top: 100px;" class="row justify-content-center">

                            <div class="col-md-6">

                                <div class="card o-hidden border-0 shadow-lg my-5">
                                    <div class="card-body p-0">
                                        <!-- Nested Row within Card Body -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="p-4">
                                                    <div class="text-center">
                                                        <?php
                                                        if ($_SERVER['HTTP_HOST'] == 'crm.cilaf.vn') {
                                                            echo '<img src="vendor/img/logo_cilaf.jpg" alt="" style="width:14em; margin-bottom:0px">';
                                                        } else {
                                                            echo '<img src="vendor/img/chu_tpsoft_115.png" alt="" style="width:14em; margin-bottom:20px">';
                                                        }
                                                        ?>
                                                    </div>
                                                    <form class="user" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <input type="text" name="msdn" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Số điện thoại">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" name="matkhau" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu">
                                                        </div>

                                                        <button type="submit" name="submit_login" class="btn btn-primary btn-user btn-block">
                                                            Đăng nhập
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    <script src="js/sb-admin-2.min.js"></script>
                </body>

            <?php }
            ?>