<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đấu giá Vũ Hoàng Anh</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Css/header.css" rel="stylesheet" type="text/css"/>
    <link href="../Css/shop-cate_id.css" rel="stylesheet" type="text/css"/>
    <link href="../Css/login.css" rel="stylesheet" type="text/css"/>
    <link href="../Css/register.css" rel="stylesheet" type="text/css"/>
    <link href="../Css/product.css" rel="stylesheet" type="text/css"/>
    <link href="../Css/bid.css" rel="stylesheet" type="text/css"/>
    <link href="../Css/update.css" rel="stylesheet" type="text/css"/>
    <link href="../Css/cart.css" rel="stylesheet" type="text/css"/>
    <link href="../Css/admin_header.css" rel="stylesheet" type="text/css"/>
    <link href="../Css/add.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
if(Session::get('customer')){?>
<header>
        <nav class="navbar navbar-expand-lg  ">
            <div class="container-fluid">
                <a class="navbar-brand nav-link" href="#">HavSite
                <?php if (Session::get('customer') != NULL) {?>
                    <span class="ms-2"><i class="fas fa-user"></i> Xin chào, <?= Session::get('customer')['fullname'] ?></span>
                <?php } ?>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link "  href="dashboard">Trang Chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tài sản đấu giá
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="dashboard?cate_id=1">Tài Sản Nhà Nước</a></li>
                                <li><a class="dropdown-item" href="dashboard?cate_id=2">Bất Động Sản</a></li>
                                <li><a class="dropdown-item" href="dashboard?cate_id=3">Phương Tiện - Xe Cộ</a></li>
                                <li><a class="dropdown-item" href="dashboard?cate_id=4">Sưu Tầm - Nghệ Thuật</a></li>
                                <li><a class="dropdown-item" href="dashboard?cate_id=5">Hàng Hiệu Xa Xỉ</a></li>
                                <li><a class="dropdown-item" href="dashboard?cate_id=6">Tang Vật Bị Tịch Thu</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart">
                                <i class="fas fa-shopping-cart"></i> Giỏ Hàng
                            </a>
                        </li>
                        <?php
                        if(Session::get('customer') == NULL){?>
                        <li class="nav-item">
                            <a class="nav-link" href="register">Đăng kí</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Đăng nhập</a>
                        </li>
                        <?php
                        }
                        ?>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="logout">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<?php
return;
}
?>
<?php
if(Session::get('admin')){?>
<header>
        <nav class="navbar navbar-expand-lg  ">
            <div class="container-fluid">
                <a class="navbar-brand nav-link" href="#">HavSite</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link "  href="admin_dashboard">Trang Chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cập nhật thông tin sản phẩm
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="">Thêm sản phẩm</a>
                                <ul class="dropdown-menu submenu">
                                    <li><a class="dropdown-item" href="addnewproducts?cate_id=1">Tài Sản Nhà Nước</a></li>
                                    <li><a class="dropdown-item" href="addnewproducts?cate_id=2">Bất Động Sản</a></li>
                                    <li><a class="dropdown-item" href="addnewproducts?cate_id=3">Phương Tiện - Xe Cộ</a></li>
                                    <li><a class="dropdown-item" href="addnewproducts?cate_id=4">Sưu Tầm - Nghệ Thuật</a></li>
                                    <li><a class="dropdown-item" href="addnewproducts?cate_id=5">Hàng Hiệu Xa Xỉ</a></li>
                                    <li><a class="dropdown-item" href="addnewproducts?cate_id=6">Tang Vật Bị Tịch Thu</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Chỉnh sửa sản phẩm</a>
                                <ul class="dropdown-menu submenu">
                                    <li><a class="dropdown-item" href="updateproducts?cate_id=1">Tài Sản Nhà Nước</a></li>
                                    <li><a class="dropdown-item" href="updateproducts?cate_id=2">Bất Động Sản</a></li>
                                    <li><a class="dropdown-item" href="updateproducts?cate_id=3">Phương Tiện - Xe Cộ</a></li>
                                    <li><a class="dropdown-item" href="updateproducts?cate_id=4">Sưu Tầm - Nghệ Thuật</a></li>
                                    <li><a class="dropdown-item" href="updateproducts?cate_id=5">Hàng Hiệu Xa Xỉ</a></li>
                                    <li><a class="dropdown-item" href="updateproducts?cate_id=6">Tang Vật Bị Tịch Thu</a></li>
                                </ul>
                            </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart">
                                <i class="fas fa-shopping-cart"></i> Giỏ Hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<?php
return;
}
?>
<?php
if(Session::get('customer')==false){?>
<header>
        <nav class="navbar navbar-expand-lg  ">
            <div class="container-fluid">
                <a class="navbar-brand nav-link" href="#">HavSite
                <?php if (Session::get('customer') != NULL) {?>
                    <span class="ms-2"><i class="fas fa-user"></i> Xin chào, <?= Session::get('customer')['fullname'] ?></span>
                <?php } ?>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link "  href="dashboard">Trang Chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tài sản đấu giá
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="dashboard?cate_id=1">Tài Sản Nhà Nước</a></li>
                                <li><a class="dropdown-item" href="dashboard?cate_id=2">Bất Động Sản</a></li>
                                <li><a class="dropdown-item" href="dashboard?cate_id=3">Phương Tiện - Xe Cộ</a></li>
                                <li><a class="dropdown-item" href="dashboard?cate_id=4">Sưu Tầm - Nghệ Thuật</a></li>
                                <li><a class="dropdown-item" href="dashboard?cate_id=5">Hàng Hiệu Xa Xỉ</a></li>
                                <li><a class="dropdown-item" href="dashboard?cate_id=6">Tang Vật Bị Tịch Thu</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart">
                                <i class="fas fa-shopping-cart"></i> Giỏ Hàng
                            </a>
                        </li>
                        <?php
                        if(Session::get('customer') == NULL){?>
                        <li class="nav-item">
                            <a class="nav-link" href="register">Đăng kí</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Đăng nhập</a>
                        </li>
                        <?php
                        }
                        ?>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="logout">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<?php
return;
}
?>