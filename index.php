<?php
ob_start();
session_start();
include_once("model/pdo.php");
include_once("view/header.php");
require_once 'model/binhluan.php';
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
            }
            else if(isset($_GET['idtheloai']) && $_GET['idtheloai'] > 0){

                $id_theloai = $_GET['idtheloai'];
                $sanphams = load_all_sanpham("", "",$id_theloai);
                
            }
            
            else {
                $per_page = 6;
                $num = soluong_sanpham();
                $max_page = ceil($num / $per_page);
                $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
                $start = ($page - 1) * $per_page;

                $sanphams = load_all_sanpham($start, $per_page,"");
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


        // case 'danhmuc':
        //     if (isset($_GET['id']) && $_GET['id'] > 0) {

        //         $danhmucsp = load_all_sanpham("", "");
        //         require 'view/danhmuc.php';
        //     }
        //     require_once('view/danhmuc.php');
        //     break;

        case 'dangxuat':
            session_unset();
            header('Location: index.php');
            break;

        default:
            $per_page = 8;
            $num = soluong_sanpham();
            $max_page = ceil($num / $per_page);
            $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
            $start = ($page - 1) * $per_page;

            $listsp = load_all_sanpham($start, $per_page,"");
            include("view/home.php");


            break;
    }
} else {
    $per_page = 8;
    $num = soluong_sanpham();
    $max_page = ceil($num / $per_page);
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $start = ($page - 1) * $per_page;
    $listsp = load_all_sanpham($start, $per_page,"");
    include("view/home.php");
}

include_once("view/footer.php");
ob_end_flush();
