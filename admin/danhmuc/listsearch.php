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
                    <td>ID</td>
                    <td>Name</td>
                    <td>Chức năng</td>
                </tr>
            </thead>

            <tbody>
                
                <?php
                

                $id = 1;
                foreach ($listsearch as $list) {

                    extract($list);
                    $xoatheloai = "index.php?act=xoatheloai&id=" . $id_theloai;
                    $suatheloai = "index.php?act=suatheloai&id=" . $id_theloai;
                    echo '
                            <tr>
                            <td>' . $id . '</td>
                            <td>' . $name . '</td>
                            <td><a class="btn-admin" href="' . $xoatheloai . '">delete</a>
                                <a class="btn-admin" href="' . $suatheloai . '">edit</a>
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