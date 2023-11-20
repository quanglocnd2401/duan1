<?php
function load_all_sanpham(){
    $sql = "SELECT * FROM `books` as b JOIN `theloai` as tl on b.id_theloai = tl.id_theloai
     Join `chitiet_book` as ctb on b.id_book = ctb.id_book";
    if(isset($_POST["search"]) && $_POST["search"]){
        
        $sql .= "";
    }
    $listsp = pdo_query($sql);
    return $listsp;
}
function load_one_sanpham($id){
    $sql = "SELECT * FROM `books` WHERE xoa = 0 AND id_theloai=".$id;
    $onedanhmuc = pdo_query_one($sql);
    return $onedanhmuc;
}
function xoa_sanpham($index){
    $sql = "DELETE FROM `books` WHERE `books`.`id_book` = $index";
    pdo_execute($sql);
}

function add_sanpham($tensach,$tacgia, $nhaxuatban , $date, $price , $soluong, $theloai){
    $sql = "INSERT INTO `books`
     ( `tieude`, `id_author`, `id_nhaxuatban`, `ngayxuatban`, `price`, `soluong`, `id_theloai`) 
     VALUES 
     ( '$tensach', '$tacgia', '$nhaxuatban', '$date', '$price', '$soluong', '$theloai')";
    pdo_execute($sql);
}

function soluong_sanpham(){
    $sql = "SELECT * FROM `books` WHERE 1";
    $total =   nums_row($sql);
    return $total;   
}
function uppdate_sanpham($id,$name){
    $sql = "UPDATE `theloai` SET `name` = '$name' WHERE `theloai`.`id_theloai` = $id";
    pdo_execute($sql);
}
?>