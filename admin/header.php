<!DOCTYPE html>
<html lang="en">
<?php
ob_start();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    
    <link rel="stylesheet" href="../css/admin1.css">
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">ADMIN</span>
                    </a>
                </li>

                <li>
                    <a href="index.php?act=listtheloai&page=1">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Danh mục</span>
                    </a>
                </li>

                <li>
                    <a href="index.php?act=listsp&page=1">
                        <span class="icon">
                        <ion-icon name="cube-outline"></ion-icon>
                        </span>
                        <span class="title">Sản phẩm</span>
                    </a>
                </li>

                <li>
                    <a href="index.php?act=listbinhluan">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Bình luận</span>
                    </a>
                </li>

                <li>
                    <a href="index.php?act=listbill">
                        <span class="icon">
                        <ion-icon name="clipboard-outline"></ion-icon>
                        </span>
                        <span class="title">Đơn hàng</span>
                    </a>
                </li>

                

                <li>
                    <a href="index.php?act=listuser">
                        <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">User</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?act=voucher">
                        <span class="icon">
                        <ion-icon name="pricetags-outline"></ion-icon>
                        </span>
                        <span class="title">Voucher</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    
        <!-- ========================= Main ==================== -->
<div class="main">
            

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <?php $num = soluong_sanpham();?>
                        <div class="numbers"><?= $num ?></div>
                        <div class="cardName">Số sản phẩm</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cube-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <?php $numbill = nums_bill() ?>
                        <div class="numbers"><?= $numbill ?></div>
                        <div class="cardName">Số đơn hàng</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php $numbl = soluong_binhluan();?>
                        <div class="numbers"><?= $numbl ?></div>
                        <div class="cardName"> <a href="index.php?act=thongke"> Bình luận </a> </div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <?php
                        $total = 0;
                        $listbill = select_all_bill();
                        foreach ($listbill as $bill) {
                            $oneProduct = $bill['total_donhang'];
                            $total+= $oneProduct;
                        }

                        ?>
                        <div class="numbers"><?= number_format( $total); ?></div>
                        <div class="cardName"><a href="index.php?act=thongkedt">Tổng Doanh Thu</a> </div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
       
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    