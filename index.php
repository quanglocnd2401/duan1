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
        case 'updateUser':
            if (isset($_POST['fullname'])) {
                $id_user = $_POST['id_user'];
                $fullname = $_POST['fullname'];
                $tel = $_POST['telephone'];
                $address = $_POST['address'];

                update_user($id_user, $fullname, $address, $tel);
            }

            header("Location: index.php?act=userManager&id=" . $_SESSION['user']['id_user']);
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
                    setcookie('error', 'Tài khoản hoặc mật khẩu nhập sai', time() + 1, '/');
                }
            }

            include_once("view/login.php");
            break;

        case 'register':

            if (isset($_POST['dangki']) && $_POST['dangki']) {
                //validate user

                if (empty($_POST['username'])) {
                    $nameErr = "* Yêu cầu nhập Username";
                } elseif (strlen(test_input($_POST['username'])) < 6) {
                    $nameErr = "* Nhập ít nhất 6 kí tự";
                } elseif (check_username($_POST['username']) === false) {
                    $nameErr = "* Tên đăng nhập đã được sử dụng";
                } else {
                    $username = test_input($_POST['username']);
                }

                // validate pass
                if (empty($_POST['pass1'])) {
                    $pass1Err = "*Yêu cầu nhập Password";
                } elseif (strlen(test_input($_POST['pass1'])) < 6) {
                    $pass1Err = "* Nhập ít nhất 6 kí tự";
                } else {
                    $pass1 = test_input($_POST['pass1']);
                }


                if (empty($_POST['pass2'])) {
                    $pass2Err = "* Yêu cầu nhập Password";
                } elseif (strlen(test_input($_POST['pass2'])) < 6) {
                    $pass2Err = "* Nhập ít nhất 6 kí tự";
                } else {
                    $pass2 = test_input($_POST['pass2']);
                    if ($pass2 != $pass1) {
                        $pass2Err = "* Mật khẩu phải giống nhau";
                    }
                }


                // validate email
                if (empty($_POST['email'])) {
                    $emailErr = "* Yêu cầu nhập email";
                } elseif (!filter_var(test_input($_POST['email']), FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "* Email không hợp lệ";
                } else {
                    $email = test_input($_POST['email']);
                }

                if (!(isset($nameErr) && isset($pass1Err) && isset($pass2Err) && isset($emailErr))) {
                    dang_ki($username, $pass1, $email);
                }
            }
            include_once("view/register.php");
            break;
        case 'recoverPassword':
            include_once("view/forgot.php");
            break;
        case 'send':
            $email = $_POST['email'];
            $pass = password_user($email);
            extract($pass);
            include_once("view/send.php");
            break;
        case 'shop':

            if (isset($_POST['filter']) && $_POST['filter']) {

                $gia = isset($_POST['price']) ? $_POST['price'] : []; // $_POST['price] Là 1 mảng gồm các khoảng giá
              

                $per_page = 6;
                $num = soluong_sanpham();
                $max_page = ceil($num / $per_page);
                $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
                $start = ($page - 1) * $per_page;

                $sanphams =  load_sanpham_khoang_gia("", "", $gia);
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

            if (isset($_POST['search'])) {
                $sanphams = load_sanpham_search($_POST['search']);
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

            if (isset($_POST['submit_voucher'])) {
                $enteredVoucher = $_POST['name_voucher'];
                // Thực hiện kiểm tra mã giảm giá
                if (checkVoucher($enteredVoucher)) {
                    // Áp dụng giảm giá
                    $discount = calculateDiscount($enteredVoucher, $_SESSION['totalcart']);
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
        case 'huydonhang':
            delete_bill($_GET['id']);
    
            break;
        case 'bill_detail':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id_donhang = $_GET['id'];
                $onebill = select_one_bill($id_donhang);
                $listsp = select_all_sp_bill($id_donhang);
            }
            include_once('view/chitietdonhang.php');
            break;
        case 'listvoucher':
            $listvoucher = select_voucher();
            include_once('view/listvoucher.php');
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
    $listspnew = load_new_4sanpham();
    $listsp = load_all_sanpham($start, $per_page, "");
    include("view/home.php");
}
include_once("view/footer.php");
ob_end_flush();
