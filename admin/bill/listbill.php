<!-- ================ Order Details List ================= -->
<style>
    .status-chua-xac-nhan {
        background-color: #6c757d; /* Màu xám cho trạng thái "Chưa xác nhận" */
        color: #fff; /* Màu chữ trắng */
    }

    .status-da-xac-nhan {
        background-color: #28a745; /* Màu xanh lá cây cho trạng thái "Đã xác nhận" */
        color: #fff; /* Màu chữ trắng */
    }

    .status-dang-xu-li {
        background-color: #ffc107; /* Màu vàng cho trạng thái "Đang xử lí" */
        color: #000; /* Màu chữ đen */
    }

    .status-dang-van-chuyen {
        background-color: #17a2b8; /* Màu xanh dương cho trạng thái "Đang vận chuyển" */
        color: #fff; /* Màu chữ trắng */
    }

    .status-hoan-thanh {
        background-color: #007bff; /* Màu xanh cho trạng thái "Hoàn thành" */
        color: #fff; /* Màu chữ trắng */
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
            <a href="index.php?act=addtheloai" class="btn">Thêm</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>ID_USER</td>
                    <td>DATE</td>
                    <td>status</td>
                    <td>total</td>
                    <td>xử lí</td>

                </tr>
            </thead>

            <tbody>

                <?php
                $id = 1;
                foreach ($listbill as $key => $bill) {
                    extract($bill);
                    $xoabill = "index.php?act=xoabill&id=" . $id_donhang;
                    $updatebill = "index.php?act=updateBill&id=" . $id_donhang;
                    $trangthai = [
                        "0" => "Chưa xác nhận",
                        "1" => "Đã xác nhận",
                        "2" => "Đang xử lí",
                        "3" => "Đang vận chuyển",
                        "4" => "Hoàn thành"
                    ];

                    $statusClass = "status-chua-xac-nhan"; // Mặc định class cho trạng thái "Chưa xác nhận"
                    switch ($status) {
                        case "1":
                            $statusClass = "status-da-xac-nhan";
                            break;
                        case "2":
                            $statusClass = "status-dang-xu-li";
                            break;
                        case "3":
                            $statusClass = "status-dang-van-chuyen";
                            break;
                        case "4":
                            $statusClass = "status-hoan-thanh";
                            break;
                    }
                    echo '
        <tr>
            <td>' . $key + 1 . '</td>
            <td>' . $id_user . '</td>
            <td>' . $date . '</td>
            <td><span class="' . $statusClass . '">' . $trangthai[$status] . '</span></td>
            <td>' . $total_donhang . '</td>
            <td><a class="btn-admin" href="' . $updatebill . '">Cập nhật</a> <a class="btn-admin" href="' . $xoabill . '">Xóa</a></td>
        </tr>
    ';
                    $id++;
                }
                ?>
            </tbody>
        </table>



    </div>

    <!-- ================= New Customers ================ -->

</div>
</div>
</div>