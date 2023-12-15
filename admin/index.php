<?php
session_start();
include_once("../model/pdo.php");
include_once("../model/danhmuc.php");
include_once("../model/sanpham.php");
include_once("../model/tacgia.php");
include_once("../model/nhaxuatban.php");
include_once("../model/binhluan.php");
include_once("../model/thongke.php");
include_once("../model/bill.php");
include_once("../model/user.php");
include_once("../model/voucher.php");
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
                move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                add_danhmuc($name, $img);
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
                $target_file = $targer_dir . basename($_FILES['imgtheloai']['name']);
                if (move_uploaded_file($_FILES['imgtheloai']['tmp_name'], $target_file)) {
                    echo "up thanh cong";
                } else {
                    echo "up khong thanh cong";
                }
                echo $id,$name,$img;
                
                update_danhmuc($id, $name, $img);
            }

            header("Location: index.php?act=listtheloai&page=1");
            break;
        case 'listsearch':
            if (isset($_GET['kyw']) && !empty($_GET['kyw'])) {
                $keyword = $_GET['kyw'];
                $listsearch = search_item("theloai", "name", $keyword);
                require_once('danhmuc/listsearch.php');
                break;
            } else {

                header("Location: index.php?act=listtheloai&page=1");
            }
            break;
        case 'listsearchsp':
            if (isset($_GET['kyw']) && !empty($_GET['kyw'])) {
                $keyword = $_GET['kyw'];
                $listsearch = load_sanpham_search($keyword);
                require_once('sanpham/listsearchSp.php');
                break;
            } else {

                header("Location: index.php?act=listtheloai&page=1");
            }
            break;
            /*---------------------------------------------------------------------------------------------*/
            /* quan tri san pham */

        case 'listsp':

            $per_page = 4;
            $num = soluong_sanpham();
            $max_page = ceil($num / $per_page);
            $page = $_GET['page'];
            $start = ($page - 1) * $per_page;

            $listsp = load_all_sanpham($start, $per_page, "");
            require_once('sanpham/listsp.php');
            break;

        case 'xoasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                xoa_sanpham($id);
            }
            header("Location: index.php?act=listsp&page=1");
            break;
        case 'addsp':
            if (isset($_POST['addsp']) && $_POST['addsp']) {
                $tensach = $_POST['tensach'];
                $tacgia = $_POST['tacgia'];
                $nhaxuatban = $_POST['nhaxuatban'];
                $date = $_POST['ngayxuatban'];
                $price = $_POST['gia'];
                $soluong = $_POST['soluong'];
                $img = $_FILES['img']['name'];
                $targer_dir = "../img/";
                $target_file = $targer_dir . basename($_FILES['img']['name']);
                if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                    echo "up thanh cong";
                } else {
                    echo "up khong thanh cong";
                }
                $theloai = $_POST['theloai'];
                add_sanpham($tensach, $img, $tacgia, $nhaxuatban, $date, $price, $theloai);

                $sanphams = load_new_sanpham();
                extract($sanphams);

                add_chitiet_sanpham($id_book, $soluong);


                header("Location: index.php?act=listsp&page=1");
            } else {
                $theloai = load_all_danhmuc("", "");
                $tacgia = load_all_tacgia();
                $nhaxuatban = select_nhaxuatban();

                require_once('sanpham/addsp.php');
                break;
            }
            break;
        case 'suasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $onesanpham = load_one_sanpham($id);
                require_once('sanpham/updatesp.php');
            }
            break;
        case 'updatesp':
            if (isset($_POST['update']) && $_POST['update']) {
                $id_book = $_POST['id'];
                $name = $_POST['name'];
                $tacgia = $_POST['tacgia'];
                $theloai = $_POST['theloai'];
                $ngayxuatban = $_POST['ngayxuatban'];
                $gia = $_POST['price'];
                $soluong = $_POST['soluong'];

                $img = $_FILES['img']['name'];

                $targer_dir = "../img/";
                $target_file = $targer_dir . basename($_FILES['img']['name']);
                if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                    echo "up thanh cong";
                } else {
                    echo "up khong thanh cong";
                }

                uppdate_sanpham($id_book, $img, $name, $tacgia, $theloai, $ngayxuatban, $gia, $soluong);
            }
            $listdm = load_all_sanpham("", "", "");
            header("Location:index.php?act=listsp&page=1");
            break;

        case 'listuser':
            $listuser =  load_all_user();
            require_once('user/listuser.php');
            break;
        case 'xoauser':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id_user = $_GET['id'];
                xoa_user($id_user);
            }
            header("Location:index.php?act=listuser");
            break;
        case 'listbinhluan':
            $listuser =  load_all_binhluan("");

            require_once('binhluan/listbl.php');
            break;
        case 'xoabl':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id_binhluan = $_GET['id'];
                xoa_binhluan($id_binhluan);
            }
            header("Location:index.php?act=listbinhluan");
            break;
        case 'thongke':
            $listthongke = thongke_binhluan();
            require_once "thongke/thongkebinhluan.php";
            break;
        case 'thongkedt':
            if (isset($_POST['submittk'])) {
                $selectTime = $_POST['timeRange'];

                if ($selectTime == "years") {
                    $time = "Năm";
                    $thongke = thongke_doanhthu_nam();
                } elseif ($selectTime == "month") {
                    $time = "Tháng";
                    $thongke = thongke_doanhthu();
                } elseif ($selectTime == "365day") {
                    $currentDate = date("Y-m-d");

                    $previousDate = date("Y-m-d", strtotime($currentDate . " -365 days"));
                    $time = "365 ngày";
                    $thongke = thongke_doanhthu_subday_now($previousDate, $currentDate);
                } elseif ($selectTime == "28day") {
                    $currentDate = date("Y-m-d");

                    $previousDate = date("Y-m-d", strtotime($currentDate . " -28 days"));
                    $time = "28 ngày";
                    $thongke = thongke_doanhthu_subday_now($previousDate, $currentDate);
                } elseif ($selectTime == "7day") {
                    $currentDate = date("Y-m-d");

                    // Tính toán ngày 365 ngày trước
                    $previousDate = date("Y-m-d", strtotime($currentDate . " -7 days"));
                    $time = "7 ngày";
                    $thongke = thongke_doanhthu_subday_now($previousDate, $currentDate);
                }
                $selected = "selected";
                require_once "thongke/thongkedoanhthu.php";
                break;
            }

            $time = "Tháng";
            $thongke = thongke_doanhthu();
            require_once "thongke/thongkedoanhthu.php";
            break;

            //------------------------------------------------------------------

        case 'listbill':

            $listbill = select_all_bill();
            $cancelbill = select_all_bill_cancel();
            require_once "bill/listbill.php";
            break;

        case 'updateBill':

            if (isset($_GET['id'])) {
                $id_donhang =  $_GET['id'];
                $onebill = select_one_bill($id_donhang);

                $billpro = select_all_sp_bill($id_donhang);
            }
            require_once "bill/updatebill.php";
            break;
        case 'capnhatBill':
            if (isset($_POST['updateBill']) && $_POST['updateBill']) {
                $id_donhang =  $_POST['id_donhang'];
                $status = $_POST['status'];
                update_status_bill($id_donhang, $status);
                $billpro = select_all_sp_bill($id_donhang);

                // function update_soluong_sanpham($quantity , $id){
                //     $sql = "UPDATE `chitiet_book` SET `soluong`=`soluong`- $quantity WHERE id_chitiet_book = $id";
                //     pdo_execute($sql);
                // }Slime Living Together

                if ($status >= 3) {
                    foreach ($billpro as $pro) { // chi tiet {soluong , id_book}
                        
                        $chitietbook = select_id_chitiet_sanpham($pro['id_book']);

                        update_soluong_sanpham($pro['soluong'] , $chitietbook['id_chitiet_book']);
                    }
                }
            }
            header('Location:index.php?act=listbill');
            break;
        case 'voucher':
            $listvchh = vouchers_hethan();

            $listvc = select_voucher();
            include_once('voucher/listvoucher.php');
            break;
        case 'xoavoucher':
            $id = $_GET['id'];
            xoa_voucher($id);
            header("Location: index.php?act=voucher");
            break;
        case 'addvoucher':
            if (isset($_POST['addvoucher'])) {
                $mavoucher = $_POST['name_voucher'];
                $ngayhethan = $_POST['ngayhethan'];
                $giamgia = $_POST['giamgia'];
                $soluong = $_POST['quantity_voucher'];
                insert_voucher($mavoucher,  $giamgia, $soluong , $ngayhethan);
                header("Location:index.php?act=voucher");
            }
            include_once('voucher/addvoucher.php');
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
