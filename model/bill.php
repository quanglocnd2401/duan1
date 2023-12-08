<?php 
    function insert_bill($id_user,$date,$status,$total){
        $sql = "INSERT INTO `donhang` ( `id_user`, `date`, `status`, `total_donhang`) VALUES ( '$id_user', '$date', '$status', '$total')";
        pdo_execute($sql);
    }

    function get_idbill(){
        $sql = "SELECT id_donhang FROM `donhang` order by id_donhang desc limit 1 ";
        $id_bill = pdo_query($sql);
        return $id_bill;
    }
    function insert_bill_detail($id_donhang,$id_book,$id_soluong , $price){
        $sql = "INSERT INTO `chitietdonhang` ( `id_donhang`, `id_book`, `soluong`, `gia_sanpham`) VALUES ( '$id_donhang', '$id_book', '$id_soluong', '$price')";
        pdo_execute($sql);
    }

    function select_all_sp_bill($id){
        $sql = 'SELECT * FROM `chitietdonhang` JOIN `books` on chitietdonhang.id_book = books.id_book WHERE id_donhang ='.$id;
        $list = pdo_query($sql);
        return $list;
    }
    function select_all_bill(){
        $sql = "SELECT * FROM `donhang` WHERE 1";
        $listbill = pdo_query($sql);
        return $listbill;
    }
    function select_all_bill_user($id){
        $sql = "SELECT * FROM `donhang` WHERE id_user=$id";
        $listbill = pdo_query($sql);
        return $listbill;
    }
    
    function select_all_doanhthu(){
        $sql = "SELECT total_donhang , date FROM `donhang` WHERE 1";
        $list = pdo_query($sql);
        return $list;
    }

    function select_one_bill($id){
        $sql = "SELECT * FROM `donhang` WHERE id_donhang = $id";
        $onebill = pdo_query_one($sql);
        return $onebill;
    }

    function update_status_bill($id_donhang,$status){
        $sql = "UPDATE `donhang` SET `status` = '$status' WHERE `donhang`.`id_donhang` = $id_donhang";
        pdo_execute($sql);
    }

    function nums_bill(){
        $sql = "SELECT * FROM `donhang` WHERE 1";
        $numbill = nums_row($sql);
        return $numbill;
    }
?>