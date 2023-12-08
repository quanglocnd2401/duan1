<?php
ob_start();
session_start();
include_once("model/pdo.php");
include_once("view/header.php");
require_once 'model/binhluan.php';
include_once("model/user.php");
include_once("model/danhmuc.php");
include_once("model/cart.php");
include_once("model/bill.php");
include_once("model/sanpham.php");
include_once("model/voucher.php");

include_once("view/nav.php");
if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
    switch ($act) {
        case 'userManager':
            $id = $_GET['id'];
            $user = load_one_user($id);
            include_once("view/user.php");
            break;
        case 'login':
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $username = $_POST['username_login'];
                $password = $_POST['password_login'];
                $user = check_login($username, $password);
                if (is_array($user)) {
                    $_SESSION['loged'] = true;
                    $_SESSION['user'] = $user;


                    header('Location: index.php');
                    setcookie('loged', 'Đăng nhập thành công', time() + 1, '/');
                } else {
                    header('Location: index.php?act=login');
                    setcookie('error', 'Đăng nhập không thành công', time() + 1, '/');
                }
            }

            include_once("view/login.php");
            break;

        case 'register':
            if (isset($_POST['dangki']) && $_POST['dangki']) {
                if(empty($_POST['username'])){
                    $nameErr = "* Yêu cầu nhập Username";
                }else{
                    $username = test_input($_POST['username']);
                }

                if(empty($_POST['pass1'])){
                    $pass1Err = "*Yêu cầu nhập Password";
                }else{
                    $pass1 = test_input($_POST['pass1']) ;
                }

                if(empty($_POST['pass2'])){
                    $pass2Err = "* Yêu cầu nhập Password";
                }else{
                    $pass2 = test_input($_POST['pass2']) ;
                }

            
                if(empty($_POST['email'])){
                    $emailErr = "* Yêu cầu nhập email";
                }else{
                    $email = test_input($_POST['email']) ;
                }
            
                if(isset($nameErr)){
                    setcookie('inputErr', 'Vui lòng nhập đủ trường', time() + 10, '/');
                }
                else if ($pass1 != $pass2) { 
                    setcookie('error', 'Mật khẩu không được trùng', time() + 10, '/');
                }
                else{
                    dang_ki($username, $pass1, $email);
                    setcookie('registed', 'Đăng kí thành công', time() + 10, '/');
                }
                header("Location: index.php?act=register");
            }
            include_once("view/register.php");
            break;

        case 'shop':
            if (isset($_POST['filter']) && $_POST['filter']) {

                $gia1 = $_POST['gia1'];
                $gia2 = $_POST['gia2'];
                $per_page = 6;
                $num = soluong_sanpham();
                $max_page = ceil($num / $per_page);
                $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
                $start = ($page - 1) * $per_page;
                $sanphams =  load_sanpham_theo_gia($start, $per_page, $gia1, $gia2);
            } else if (isset($_GET['idtheloai']) && $_GET['idtheloai'] > 0) {

                $id_theloai = $_GET['idtheloai'];
                $sanphams = load_all_sanpham("", "", $id_theloai);
            } else {
                $per_page = 6;
                $num = soluong_sanpham();
                $max_page = ceil($num / $per_page);
                $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
                $start = ($page - 1) * $per_page;

                $sanphams = load_all_sanpham($start, $per_page, "");
            }
            include_once("view/shop.php");
            break;

        case 'sanphamct':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $sanpham = load_one_sanpham($id);
                extract($sanpham);

                $sanphamlienquan = load_sanpham_lienquan($id_book, $id_theloai);
                require_once 'view/detail.php';
            } else {
                require 'view/home.php';
            }
            break;

        case 'dangxuat':
            session_unset();
            header('Location: index.php');
            break;

        case 'listCart':
            if (!empty($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];

                $productId = array_column($cart, 'id');

                // Chuyển đổi chuỗi id thành 1 chuỗi  để thực hiện truy vấn
                $idList = implode('\',\'', $productId);
                $dataDb = loadone_sanphamCart($idList);
            }
            include_once('view/cart.php');
            break;
        
        case 'submitCart':
            if (isset($_POST['submitCart'])) {
                $id_user = $_POST['id_user'];
                $total = $_POST['total'];
                $date = date('d/m/Y');
                insert_cart($id_user, $date, $total);
            }

            if (!empty($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                $productId = array_column($cart, 'id');
                // Chuyển đổi chuỗi id thành 1 chuỗi  để thực hiện truy vấn
                $idList = implode('\',\'', $productId);
                $dataDb = loadone_sanphamCart($idList);
            }

            if(isset($_POST['submit_voucher'])) {
                $enteredVoucher = $_POST['name_voucher'];
                // Thực hiện kiểm tra mã giảm giá
                if(checkVoucher($enteredVoucher)) {
                    // Áp dụng giảm giá
                    $discount = calculateDiscount($enteredVoucher,$_SESSION['totalcart']);
                    $_SESSION['totalcart'] -= $discount;

                } else {
                    $thongbao = "không hợp lệ";
                }
            }

            include_once("view/checkout.php");
            break;
        case 'submitBill':
            if (isset($_POST['submitBill'])) {
                $id_user = $_POST['id_user'];
                $total = $_POST['totalBill'];
                $date = date('Y/m/d');
                $status = (int)$_POST['status'];
                insert_bill($id_user, $date, $status, $total);
                $id_bill = get_idbill();
            }
            include_once("view/bill.php");
           unset($_SESSION['cart']);
            break;
        case 'listdonhang':
            $id = $_SESSION['user']['id_user'];
            $listdonhang = select_all_bill_user($id);

            include_once('view/listdonhang.php');
            break;
        case 'bill_detail':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id_donhang = $_GET['id'];  
                $onebill = select_one_bill($id_donhang);
                $listsp = select_all_sp_bill($id_donhang);
            }
            include_once('view/chitietdonhang.php');
            break;
        default:
            $per_page = 8;
            $num = soluong_sanpham();
            $max_page = ceil($num / $per_page);
            $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
            $start = ($page - 1) * $per_page;

            $listsp = load_all_sanpham($start, $per_page, "");
            include("view/home.php");
            break;
    }
} else {
    $per_page = 8;
    $num = soluong_sanpham();
    $max_page = ceil($num / $per_page);
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $start = ($page - 1) * $per_page;
    $listsp = load_all_sanpham($start, $per_page, "");
    include("view/home.php");
}
include_once("view/footer.php");
ob_end_flush();
