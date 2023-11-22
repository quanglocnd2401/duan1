<?php
function load_all_danhmuc($start,$per_page){
    $sql = "SELECT * FROM `theloai` WHERE xoa = 0 " ;
    if($start!="" && $per_page!="") {
        $sql.= "order by id_theloai limit ".$start.",".$per_page;
    }
    else{
        $sql.= "";
    }

    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function load_one_danhmuc($id){
    $sql = "SELECT * FROM `theloai` WHERE xoa = 0 AND id_theloai=".$id;
    $onedanhmuc = pdo_query_one($sql);
    return $onedanhmuc;
}
function xoa_danhmuc($index){
    $sql = "UPDATE theloai SET xoa = 1 WHERE id_theloai =".$index ;
    pdo_execute($sql);
}

function add_danhmuc($name,$img){
    $sql = "INSERT INTO `theloai` ( `name`,`img`,`xoa`) VALUES ( '$name','$img', b'0')";
    pdo_execute($sql);
}

function uppdate_danhmuc($id,$name,$img){
    $sql = "UPDATE `theloai` SET `name` = '$name',`img` = '$img' WHERE `theloai`.`id_theloai` = $id";
    pdo_execute($sql);
}
function soluong_theloai(){
    $sql = "SELECT * FROM `theloai` WHERE 1";
    $total =   nums_row($sql);
    return $total;   
}
function search_item($name,$kyw){
    $sql = "SELECT * FROM `".$name."` WHERE name like '%".$kyw."%'";
    $listsearch = pdo_query($sql);
    return $listsearch;
}

?>