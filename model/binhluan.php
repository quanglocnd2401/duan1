<?php

function insert_binhluan($id_book , $id_user , $noidung , $date){
        $sql = "INSERT INTO `binhluan` (`id_book`, `id_user`, `noidung`, `ngaydang`)
                                VALUES ( '$id_book', '$id_user', '$noidung','$date')";
        pdo_execute($sql);
}

function load_all_binhluan($id_book){
        $sql = "SELECT * FROM `binhluan` JOIN `user` ON binhluan.id_user = user.id_user WHERE 1 ";
        if($id_book!=""){
                $sql .= "AND id_book = $id_book";
        }
        $binhluan = pdo_query($sql);
        return $binhluan;
}

function soluong_binhluan(){
        $sql = "SELECT * FROM `binhluan`";
        $num = nums_row($sql);
        return $num;
}
function xoa_binhluan($id_binhluan){
        $sql = "DELETE FROM binhluan WHERE `binhluan`.`id_binhluan` = $id_binhluan";
        pdo_execute($sql);
}

?>