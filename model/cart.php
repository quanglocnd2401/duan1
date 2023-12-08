<?php 
    function insert_cart($id_user,$date,$total){
        $sql = "INSERT INTO `cart` ( `id_user`, `ngaymua`, `total`) VALUES ( '$id_user', '$date', '$total')";
        pdo_execute($sql);
    }
    function select_cart(){
        $sql = "SELECT * FROM `cart` WHERE 1";
        $carts = pdo_query($sql);
        return $carts;
    }

    function select_cart_user($id_user){
        $sql = "SELECT * FROM `cart` WHERE id_user = $id_user";
        $carts = pdo_query($sql);
        return $carts;
    }

    function insert_cart_detail($id_cart,$id_book,$soluong,$price){
        $sql = "INSERT INTO `chitiet_cart` (`id_cart`, `id_books`, `soluong`, `price`) VALUES ( '$id_cart', '$id_book', '$soluong', '$price')";
        pdo_execute($sql);
    }
    function select_cart_detail(){
        $sql = "SELECT * FROM `cart` JOIN `chitiet_cart` on cart.id_cart = chitiet_cart.id_cart WHERE 1";
    }
?>