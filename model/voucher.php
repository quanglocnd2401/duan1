<?php 

function insert_voucher($mavoucher , $loai , $giamgia , $soluong){
    $sql = "INSERT INTO `voucher` ( `ma_voucher`, `loai_voucher`, `giamgia`, `soluong`) VALUES ( '$mavoucher', '$loai', '$giamgia', '$soluong')";
    pdo_execute($sql);
}

function select_voucher(){
    $sql = "SELECT * FROM `voucher` WHERE 1";
    $list = pdo_query($sql);
    return $list;
}

function checkVoucher($code){
    $sql = "SELECT * FROM `voucher` WHERE ma_voucher = '$code'";
    $num = nums_row($sql);
    if($num == 1){
        return true;
    }else{
        return false;
    }
}

function calculateDiscount($code,$total) {
    $sql = "SELECT * FROM `voucher` WHERE ma_voucher = '$code'";
    $voucher = pdo_query_one($sql);
    $giam = ($voucher['giamgia']/100)*$total;
    return $giam;
}



?>