<!-- ================ Order Details List ================= -->
<style>
     table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-admin {
            background-color: #4CAF50;
            color: white;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
        }

        .btn-admin:hover {
            background-color: #45a049;
        }

        td:nth-child(3) {
            width: 40%;
        }

        td:nth-child(5) {
            width: 10%;
        }
</style>
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
                    $user = load_one_user($id_user);
                    $books = load_one_sanpham($id_book);
                 
                    $xoabl = "index.php?act=xoabl&id=" . $id_binhluan;
                    echo '
                            <tr>
                            <td>' . $books['tieude'] . '</td>
                            <td>' . $user['username']. '</td>
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