<div class="details">
    <div class="recentOrders">
        <div class="topbar">
            <div class="search">
                <form action="" method="GET">
                    <label>
                        <input type="hidden" name="act" value="listsearchsp">
                        <input name="kyw" type="text" placeholder="Search">
                        <input type="submit" name="search" value="Tìm">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </form>

            </div>
        </div>
        <div class="cardHeader">
            <h2>Recent Orders</h2>
            <a href="index.php?act=addtheloai" class="btn">Thêm</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tên Sách</td>
                    <td>Ảnh</td>
                    <td>Tác Giả</td>

                    <td>Thể loại</td>
                    <td>Ngày Xuất Bản</td>
                    <td>Giá</td>
                    <td>Số lượng</td>
                    <td>Chức năng</td>
                </tr>
            </thead>

            <tbody>

                <?php
                $id = 1;
                foreach ($listsearch as $list) {

                    extract($list);
                    $anh = '<img width="100px" src="../img/' . $img . '" alt="">';
                    $xoasp = "index.php?act=xoasp&id=" . $id_book;
                    $suasp = "index.php?act=suasp&id=" . $id_book;
                    echo '
                            <tr>
                            <td>' . $id_book . '</td>
                            <td>' . $tieude . '</td>
                            <td>' . $anh . '</td>
                            <td>' . $name_author . '</td>
                            
                            <td>' . $name . '</td>
                            <td>' . $ngayxuatban . '</td>
                            <td>' . $price . '</td>
                            <td>' . $soluong . '</td>
                            <td><a class="btn-admin" href="' . $xoasp . '">Xóa</a><a class="btn-admin" href="' . $suasp . '">Sửa</a>
                                
                                
                                </td>
                            
                        </tr>
                           ';
                } ?>
            </tbody>
        </table>

    </div>

    <!-- ================= New Customers ================ -->

</div>
</div>
</div>