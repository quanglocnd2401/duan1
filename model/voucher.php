<?php 

function insert_voucher($mavoucher , $giamgia , $soluong ,$date){
    $sql = "INSERT INTO `voucher` ( `ma_voucher`,  `giamgia`, `soluong`,`date`) 
    VALUES ( '$mavoucher',  '$giamgia', '$soluong','$date')";
    pdo_execute($sql);
}

function select_voucher(){
    $currentDate = date('Y-m-d');
    $sql = "SELECT * FROM `voucher` WHERE date > '$currentDate'";
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

function vouchers_hethan() {
    $currentDate = date('Y-m-d');
    $sql = "SELECT * FROM voucher WHERE date < '$currentDate' and huy = 0";
    
    $list = pdo_query($sql);
    return $list;
    // Thực hiện truy vấn SQL và trả về danh sách voucher đã hết hạn
}

function xoa_voucher($id_voucher) {
    // Ví dụ: cập nhật trạng thái của voucher thành hủy
    $sql = "UPDATE voucher SET huy = 1 WHERE id_voucher = $id_voucher";
    pdo_execute($sql);
    // Thực hiện truy vấn SQL để cập nhật trạng thái voucher
}



?>