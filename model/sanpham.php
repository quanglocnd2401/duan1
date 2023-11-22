<?php


/*SELECT * FROM `books` as b JOIN `theloai` as tl on b.id_theloai = tl.id_theloai Join `chitiet_book` as ctb on b.id_book = ctb.id_book where xoasp = 0 and b.id_theloai = 1 */
function load_all_sanpham()
{
    $sql = "SELECT * FROM `books` as b JOIN `theloai` as tl on b.id_theloai = tl.id_theloai
        Join `chitiet_book` as ctb on b.id_book = ctb.id_book where xoasp = 0 ";
    if (isset($_GET['id']) && $_GET['id']>0) {
        $id =  $_GET['id']; 
        $sql .= "AND b.id_theloai = $id";
    }
    
    $listsp = pdo_query($sql);
    return $listsp;
}

function load_danhmuc_sanpham(){

}
function load_one_sanpham($id)
{
    $sql = "SELECT * FROM `books` WHERE xoasp = 0 AND id_book=" . $id;
    $onedanhmuc = pdo_query_one($sql);
    return $onedanhmuc;
}
function xoa_sanpham($index)
{
    $sql = "UPDATE `books` SET `xoasp` = b'1' WHERE `books`.`id_book` =".$index;
    pdo_execute($sql);
}

function add_sanpham($tensach, $img, $tacgia, $nhaxuatban, $date, $price, $theloai)
{
    $sql = "INSERT INTO `books`
     ( `tieude`,`img`, `id_author`, `id_nhaxuatban`, `ngayxuatban`, `price`, `id_theloai`) 
     VALUES 
     ( '$tensach', '$img' , '$tacgia', '$nhaxuatban', '$date', '$price', '$theloai')";
    pdo_execute($sql);
}

function soluong_sanpham()
{
    $sql = "SELECT * FROM `books` WHERE 1";
    $total =   nums_row($sql);
    return $total;
}
function uppdate_sanpham($id, $name)
{
    $sql = "UPDATE `theloai` SET `name` = '$name' WHERE `theloai`.`id_theloai` = $id";
    pdo_execute($sql);
}
