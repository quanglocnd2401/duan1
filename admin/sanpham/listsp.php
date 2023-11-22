<!-- ================ Order Details List ================= -->
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
            <a href="index.php?act=addsp" class="btn">Thêm</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tên Sách</td>
                    <td>Ảnh</td>
                    <td>Thể loại</td>
                    <td>Ngày Xuất Bản</td>
                    <td>Giá</td>
                    <td>Số lượng</td>
                    <td>Chức năng</td>
                </tr>
            </thead>

            <tbody>
      
                <?php foreach ($listsp as $sp) {
                    extract($sp);
                    $anh = '<img width="200px" src="../img/'.$img.'" alt="">';
                    $xoasp = "index.php?act=xoasp&id=" . $id_book;
                    $suasp = "index.php?act=suasp&id=" . $id_book;
                    echo '
                            <tr>
                            <td>' . $id_book . '</td>
                            <td>' . $tieude . '</td>
                            <td>' . $anh . '</td>
                            <td>' . $name . '</td>
                            <td>' . $ngayxuatban . '</td>
                            <td>' . $price . '</td>
                            <td>' . $soluong . '</td>
                            <td><a class="btn-admin" href="' . $xoasp . '">delete</a>
                                <a class="btn-admin" href="' . $suasp . '">edit</a>
                                
                                </td>
                            
                        </tr>
                           ';
                } ?>





            </tbody>
        </table>
        <nav class="phan-trang">
            <ul>
                <li>
                    <?php if ($page > 1) :
                        $next_page = $page - 1; ?>
                        <button class=""><a href="index.php?act=listsp&page=<?= $next_page ?>">
                                << </a></button>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $max_page; $i++) : ?>


                        <button class="<?php echo ($page == $i) ? 'active' : ''; ?>"><a href="index.php?act=listsp&page=<?= $i ?>"> <?= $i ?> </a></button>

                    <?php endfor;   ?>
                    <?php if ($page < $max_page) :
                        $next_page = $page + 1; ?>
                        <button class=""><a href="index.php?act=listsp&page=<?= $next_page ?>"> >> </a></button>
                    <?php endif; ?>

                </li>
            </ul>
        </nav>
    </div>

    <!-- ================= New Customers ================ -->

</div>
</div>
</div>