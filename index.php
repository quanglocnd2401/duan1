<?php
ob_start();
session_start();
include_once("model/pdo.php");
include_once("view/header.php");
include_once("model/user.php");
include_once("model/danhmuc.php");
include_once("model/sanpham.php");
include_once("view/nav.php");
if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
    switch ($act) {
        case 'login':
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $username = $_POST['username_login'];
                $password = $_POST['password_login'];
                $user = check_login($username, $password);

                if (is_array($user)) {
                    $_SESSION['loged'] = true;
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
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
                $username = $_POST['username'];
                $pass1 = $_POST['pass1'];
                $pass2 = $_POST['pass2'];
                $email = $_POST['email'];
                if ($pass1 != $pass2) {
                    header('Location: index.php?act=register');
                    setcookie('error', 'Đăng kí không thành công', time() + 10, '/');
                } else {
                    dang_ki($username, $password, $email);
                    header('Location: index.php?act=register');
                    setcookie('registed', 'Đăng kí thành công', time() + 10, '/');
                }

                header("Location: index.php?act=login");
            }
            include_once("view/register.php");
            break;

        case 'shop':
            include_once("view/shop.php");
            break;

        case 'sanphamct':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $sanpham = load_one_sanpham($id);
                extract($sanpham);
                require 'view/detail.php';
            } else {
                require 'view/home.php';
            }
            break;



        case 'danhmuc':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $sanpham = load_theloai_sanpham($id);
                extract($sanpham);
                require 'view/detail.php';
            }
            require_once('view/danhmuc.php');
            break;

        case 'dangxuat':
            session_unset();
            header('Location: index.php');
            break;

        default:
            include_once("view/home.php");
            break;
    }
} else {
    include_once("view/home.php");
}

include_once("view/footer.php");
ob_end_flush();
