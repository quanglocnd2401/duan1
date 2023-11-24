<?php
    function thongke_binhluan(){
        $sql = "SELECT books.id_book as masach,books.tieude as tensach, COUNT(binhluan.id_binhluan) as countbl FROM binhluan left join books on binhluan.id_book = books.id_book GROUP BY books.id_book,books.tieude";
        $listthongke = pdo_query($sql);
        return $listthongke;
    }

?>