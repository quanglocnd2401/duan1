<?php

    // SELECT b.id_book,b.tieude,a.name_author,tl.name, SUM(ctb.soluong) AS TotalQuantity FROM books AS b JOIN theloai AS tl ON b.id_theloai = tl.id_theloai JOIN chitiet_book AS ctb ON b.id_book = ctb.id_book JOIN language AS lan ON ctb.id_language = lan.id_language JOIN author AS a ON b.id_author = a.id_author WHERE b.xoasp = 0 GROUP BY b.id_book
    function thongke_binhluan(){
        $sql = "SELECT theloai.name AS ten_theloai, COUNT(binhluan.id_binhluan) AS countbl FROM theloai LEFT JOIN books ON theloai.id_theloai = books.id_theloai LEFT JOIN binhluan ON binhluan.id_book = books.id_book GROUP BY theloai.name";
        $listthongke = pdo_query($sql);
        return $listthongke;
    }

    function thongke_doanhthu_subday_now($subday , $now){
        $sql = "SELECT DATE_FORMAT(date, '%d/%m/%Y') AS month_year, SUM(total_donhang) AS total_amount FROM donhang WHERE date BETWEEN '$subday' AND '$now' GROUP BY month_year order by month_year ";
        $listthongke = pdo_query($sql);
        return $listthongke;
    }
    

    
    function thongke_doanhthu(){
        $sql = "SELECT DATE_FORMAT(date, '%m/%Y') AS month_year, SUM(total_donhang) AS total_amount
        FROM donhang
        GROUP BY month_year order by month_year ";
        $listtk = pdo_query($sql);
        return $listtk;
    }
    function thongke_doanhthu_nam(){
        $sql = "SELECT DATE_FORMAT(date, '%Y') AS month_year, SUM(total_donhang) AS total_amount
        FROM donhang
        GROUP BY month_year order by month_year ";
        $listtk = pdo_query($sql);
        return $listtk;
    }

    



?>