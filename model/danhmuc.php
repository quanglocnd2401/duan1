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
function load_6_danhmuc(){
    $sql = "SELECT * FROM `theloai` WHERE 1 order by id_theloai limit 0,6" ;


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
    $sql = "INSERT INTO `theloai` ( `name`,`imgtheloai`,`xoa`) VALUES ( '$name','$img', b'0')";
    pdo_execute($sql);
}

function update_danhmuc($id,$name,$img){

    $sql = "UPDATE `theloai` SET `name` = '$name',`imgtheloai` = '$img' WHERE `theloai`.`id_theloai` = $id";
    pdo_execute($sql);
}


function soluong_theloai(){
    $sql = "SELECT * FROM `theloai` WHERE 1";
    $total =   nums_row($sql);
    return $total;   
}
function search_item($table,$name,$kyw){
    $sql = "SELECT * FROM `".$table."` WHERE ".$name." like '%".$kyw."%'";
    $listsearch = pdo_query($sql);
    return $listsearch;
}
?>