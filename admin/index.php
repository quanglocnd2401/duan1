<?php

include_once("../model/pdo.php");
include_once("../model/danhmuc.php");
include_once("../model/sanpham.php");
include_once("../model/tacgia.php");
include_once("../model/nhaxuatban.php");
include_once("../model/user.php");
include_once("header.php");


if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
    switch ($act) {
        case 'listtheloai':

            $per_page = 3;
            $num = soluong_theloai();
            $max_page = ceil($num / $per_page);
            $page = $_GET['page'];
            $start = ($page - 1) * $per_page;


            $listdm = load_all_danhmuc($start, $per_page);
            require_once('danhmuc/listdanhmuc.php');
            break;

        case 'xoatheloai':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                xoa_danhmuc($id);
            }
          
            header("Location: index.php?act=listtheloai&page=1");
            break;
        case 'addtheloai':
            if (isset($_POST['add']) && $_POST['add']) {
                $name = $_POST['addtheloai'];
                $img = $_FILES['img']['name'];
                $targer_dir = "../img/";
                $target_file = $targer_dir . basename($_FILES['img']['name']);
                move_uploaded_file($_FILES['img']['tmp_name'],$target_file);
                add_danhmuc($name,$img);
                $per_page = 3;
                $listdm = load_all_danhmuc(0, $per_page);
                header("Location: index.php?act=listtheloai&page=1");
            } else {
                require_once('danhmuc/add.php');
                break;
            }
            break;
        case 'suatheloai':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $onedanhmuc = load_one_danhmuc($id);
                require_once('danhmuc/update.php');
            }
            break;
        case 'update':
            if (isset($_POST['update']) && $_POST['update']) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_FILES['imgtheloai']['name'];
                $targer_dir = "../img/";
                $target_file = $targer_dir . basename($_FILES['img']['name']);
                move_uploaded_file($_FILES['img']['tmp_name'],$target_file);
                
                uppdate_danhmuc($id, $name,$img);
            }

            header("Location: index.php?act=listtheloai&page=1");
            break;
        case 'listsearch':
            if (isset($_GET['kyw']) && !empty($_GET['kyw'])) {
                $keyword = $_GET['kyw'];
                $listsearch = search_item("theloai", $keyword);
                require_once('danhmuc/listsearch.php');
                break;
            } else {

                header("Location: index.php?act=listtheloai&page=1");
            }
            break;
            /*---------------------------------------------------------------------------------------------*/
            /* quan tri san pham */

        case 'listsp':

            $per_page = 3;
            $num = soluong_sanpham();
            $max_page = ceil($num / $per_page);
            $page = $_GET['page'];
            $start = ($page - 1) * $per_page;
            
            $listsp = load_all_sanpham();
            require_once('sanpham/listsp.php');
            break;

        case 'xoasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                xoa_sanpham($id);
            }
            header("Location: index.php?act=listsp");
            break;
        case 'addsp':
            if (isset($_POST['addsp']) && $_POST['addsp']) {
                $tensach = $_POST['tensach'];
                
                $tacgia = $_POST['tacgia'];
                $nhaxuatban = $_POST['nhaxuatban'];
                $date = $_POST['ngayxuatban'];
                $price = $_POST['gia'];

                $img = $_FILES['img']['name'];
                $targer_dir = "../img/";
                $target_file = $targer_dir . basename($_FILES['img']['name']);
                if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file)){
                    echo "up thanh cong";
                }else{
                    echo "up khong thanh cong";
                }
                
                $theloai = $_POST['theloai'];

                add_sanpham($tensach,$img, $tacgia, $nhaxuatban, $date, $price, $theloai);

                header("Location: index.php?act=listsp&page=1");
            } else {
                $theloai = load_all_danhmuc("", "");
                $tacgia = select_tacgia();
                $nhaxuatban = select_nhaxuatban();

                require_once('sanpham/addsp.php');
                break;
            }
            break;
        case 'suasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $onedanhmuc = load_one_sanpham($id);
                require_once('danhmuc/update.php');
            }
            break;
        case 'updatesp':
            if (isset($_POST['update']) && $_POST['update']) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                uppdate_sanpham($id, $name);
            }
            $listdm = load_all_sanpham();
            require_once('danhmuc/listdanhmuc.php');
            break;
        case 'searchsp':
            if (isset($_POST['search']) && $_POST['search']) {
                $keyword = $_POST['keyword'];
                $listdm = load_all_sanpham();
                require_once('danhmuc/listdanhmuc.php');
            }
            break;
        case 'listuser':
            $listuser =  load_all_user();
            require_once('user/listuser.php');
            break;


        default:
            include_once('home.php');
            break;
    }
} else {
    include_once('home.php');
}
include_once('footer.php');
ob_end_flush();
