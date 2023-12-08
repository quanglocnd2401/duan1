<!-- ================ Order Details List ================= -->

<?php

 ?>
<div class="details">
    <div class="recentOrders">
        <div class="topbar">
            <div class="search">
                <form action="" method="GET">
                    <label>
                        <input type="hidden" name="act" value="listsearch">
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
                    <td>Sách</td>
                    <td>User</td>
                    <td>Nội dung</td>
                    <td>Date</td>
                    <td>Chức năng</td>
                </tr>
            </thead>
            <tbody>
                <?php

                $id = 1;
                $listbinhluan = load_all_binhluan("");
                foreach ($listbinhluan as $bl) {

                    extract($bl);
                    $xoabl = "index.php?act=xoabl&id=" . $id_binhluan;
                    echo '
                            <tr>
                            <td>' . $id_book . '</td>
                            <td>' . $id_user . '</td>
                            <td>' . $noidung . '</td>
                            <td>' . $ngaydang . '</td>
                            <td><a class="btn-admin" href="' . $xoabl . '">Xóa</a>
                                
                                </td>  
                            </tr>
                           ';
                    $id++;
                } ?>
            </tbody>
        </table>
        
            
        
    </div>

    <!-- ================= New Customers ================ -->

</div>
</div>
</div>