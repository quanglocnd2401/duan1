<!-- ================ Order Details List ================= -->
<style>
</style>
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
                    <td>Ảnh</td>
                    <td>Name</td>
                    <td>Chức năng</td>
                </tr>
            </thead>

            <tbody>
                
                <?php
                

                $id = 1;
                foreach ($listdm as $dm) {
                    
                    
                    extract($dm);
                    $anh = '<img width="100px" src="../img/'.$imgtheloai.'" alt="">';
                    $xoatheloai = "index.php?act=xoatheloai&id=" . $id_theloai;
                    $suatheloai = "index.php?act=suatheloai&id=" . $id_theloai;
                    echo '
                            <tr>
                            <td>' . $id . '</td>
                            <td>' . $anh . '</td>
                            <td>' . $name . '</td>
                            <td> <a class="btn-admin" href="' . $xoatheloai . '">Xóa</a> 
                                 <a class="btn-admin" href="' . $suatheloai . '">Sửa</a>  
                                </td>  
                            </tr>
                           ';
                    $id++;
                } ?>
            </tbody>
        </table>
        
            <nav class="phan-trang">
            <ul>
                <li>
                    <?php if ($page > 1) :
                        $next_page = $page - 1; ?>
                        <button class=""><a href="index.php?act=listtheloai&page=<?= $next_page ?>">
                                << </a></button>
                    <?php endif; ?>

                    <?php for ($i = 1; $i < $max_page; $i++) : ?>


                        <button class="<?php echo ($page == $i) ? 'active' : ''; ?>"><a href="index.php?act=listtheloai&page=<?= $i ?>"> <?= $i ?> </a></button>

                    <?php endfor;   ?>
                    <?php if ($page < $max_page) :
                        $next_page = $page + 1; ?>
                        <button class=""><a href="index.php?act=listtheloai&page=<?= $next_page ?>"> >> </a></button>
                    <?php endif; ?>

                </li>
            </ul>
        </nav>

        
    </div>

    <!-- ================= New Customers ================ -->

</div>
</div>
</div>