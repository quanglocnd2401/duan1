<?php


// SELECT b.id_book,b.tieude,a.name_author,tl.name, SUM(ctb.soluong) AS TotalQuantity,b.ngayxuatban,b.price  FROM books AS b JOIN theloai AS tl ON b.id_theloai = tl.id_theloai JOIN chitiet_book AS ctb ON b.id_book = ctb.id_book JOIN language AS lan ON ctb.id_language = lan.id_language JOIN author AS a ON b.id_author = a.id_author WHERE b.xoasp = 0 GROUP BY b.id_book
function load_all_sanpham($start,$per_page,$idtheloai)
{
    $sql = "SELECT * FROM `books` as b JOIN `theloai` as tl on b.id_theloai = tl.id_theloai Join `chitiet_book` as ctb on b.id_book = ctb.id_book Join `author` as a on b.id_author = a.id_author where xoasp = 0 ";

    if ($idtheloai!="" && $idtheloai>0) {
        $sql .= "AND b.id_theloai = $idtheloai ";
    }
    
    if($start!="" && $per_page!="") {
        $sql.= "order by b.id_book limit ".$start.",".$per_page;
    }
    else{
        $sql.= "";
    }
    $listsp = pdo_query($sql);
    return $listsp;
}

function load_sanpham_theo_gia($start,$per_page,$gia1,$gia2)
{
    $sql = "SELECT * FROM `books` as b JOIN `theloai` as tl on b.id_theloai = tl.id_theloai Join `chitiet_book` as ctb on b.id_book = ctb.id_book Join `author` as a on b.id_author = a.id_author where xoasp = 0 and price between $gia1 and $gia2";

    if($start!="" && $per_page!="") {
        $sql.= " order by b.id_book limit ".$start.",".$per_page;
    }
    else{
        $sql.= "";
    }

    $listsp = pdo_query($sql);
    return $listsp;
}


function load_one_sanpham($id)
{
    $sql = "SELECT * FROM `books` as b JOIN `theloai` as tl on b.id_theloai = tl.id_theloai Join `chitiet_book` as ctb on b.id_book = ctb.id_book Join `author` as a on b.id_author = a.id_author where xoasp = 0 and b.id_book=". $id;
    $onedanhmuc = pdo_query_one($sql);
    return $onedanhmuc;
}
function xoa_sanpham($index)
{
    $sql = "UPDATE `books` SET `xoasp` = b'1' WHERE `books`.`id_book` =".$index;
    pdo_execute($sql);
}

function load_new_sanpham(){
    $sql = "SELECT * FROM `books` order by id_book desc limit 1";
    $newsanpham = pdo_query_one($sql);
    return $newsanpham;
}   

function add_sanpham($tensach, $img, $tacgia, $nhaxuatban, $date, $price, $theloai)
{
    $sql = "INSERT INTO `books`
     ( `tieude`,`img`, `id_author`, `id_nhaxuatban`, `ngayxuatban`, `price`, `id_theloai`) 
     VALUES 
     ( '$tensach', '$img' , '$tacgia', '$nhaxuatban', '$date', '$price', '$theloai')";
    pdo_execute($sql);
}
function add_chitiet_sanpham($id_book,$soluong){
 $sql = "INSERT INTO `chitiet_book` (`id_book`, `soluong`) VALUES ('$id_book', '$soluong')";
 pdo_execute($sql);
}
function soluong_sanpham()
{
    $sql = "SELECT * FROM `books` WHERE 1";
    $total =   nums_row($sql);
    return $total;
}
function uppdate_sanpham($id, $img, $name,$tacgia,$theloai,$ngayxuatban, $gia, $soluong)
{
    $sql = "UPDATE `books` JOIN `chitiet_book` on books.id_book = chitiet_book.id_book 
    SET `tieude` = '$name', `img` = '$img', `id_author` = '$tacgia', `ngayxuatban` = '$ngayxuatban', `price` = '$gia', `id_theloai` = '$theloai',`soluong` = '$soluong' WHERE `books`.`id_book` = $id";
    pdo_execute($sql);  
}

function load_sanpham_lienquan($id_book,$id_theloai){
    $sql = "SELECT * FROM `books` WHERE id_theloai = $id_theloai and id_book<> $id_book order by id_book limit 4";
    $listsp = pdo_query($sql);
    return $listsp;
}

function loadone_sanphamCart($idList){
    $sql = "SELECT * FROM `books` WHERE id_book IN ('".$idList."')";
    $sanpham = pdo_query($sql);
    return $sanpham;
}