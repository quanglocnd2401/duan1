<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style1.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Trợ giúp</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Hỗ trợ</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">B</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                

                <!-- Đoạn mã HTML của bạn -->
                <form id="searchForm" action="index.php?act=shop" method="POST">
                    <div class="input-group">
                        <input id="searchInput" type="text" class="form-control" name="search" placeholder="Tìm kiếm sản phẩm">
                        <div class="input-group-append">
                            <span id="searchIcon" class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>

                <!-- Đoạn mã JavaScript để xử lý sự kiện khi click vào icon -->
                <script>
                    $(document).ready(function() {
                        $("#searchIcon").click(function() {

                            var searchTerm = $("#searchInput").val();
                            $("#searchForm").submit();
                        });
                    });
                </script>
            </div>

            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>

                <a href="index.php?act=listCart" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span id="totalProduct"><?= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>
                </a>
                <div class="btn-group">
                    <button type="button" class="btn border dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user text-primary"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php?act=userManager&id=<?=
                                                                                    (isset($_SESSION['user'])) ? $_SESSION['user']['id_user'] : "" ?>">User</a>
                        <a class="dropdown-item" href="index.php?act=listdonhang">Đơn hàng</a>
                        <a class="dropdown-item" href="index.php?act=listvoucher">Voucher</a>
                        <?php if (isset($_SESSION['loged'])) : ?>
                            <a class="dropdown-item" href="index.php?act=dangxuat">Đăng xuất</a>

                        <?php endif; ?>
                    </div>
                </div>


            </div>
        </div>
    </div>