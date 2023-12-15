<!-- ================ Order Details List ================= -->
<style>
    .status-chua-xac-nhan {
        background-color: #6c757d;
        /* Màu xám cho trạng thái "Chưa xác nhận" */
        color: #fff;
        /* Màu chữ trắng */
    }

    .status-da-xac-nhan {
        background-color: #28a745;
        /* Màu xanh lá cây cho trạng thái "Đã xác nhận" */
        color: #fff;
        /* Màu chữ trắng */
    }

    .status-dang-xu-li {
        background-color: #ffc107;
        /* Màu vàng cho trạng thái "Đang xử lí" */
        color: #000;
        /* Màu chữ đen */
    }

    .status-dang-van-chuyen {
        background-color: #17a2b8;
        /* Màu xanh dương cho trạng thái "Đang vận chuyển" */
        color: #fff;
        /* Màu chữ trắng */
    }

    .status-hoan-thanh {
        background-color: #007bff;
        /* Màu xanh cho trạng thái "Hoàn thành" */
        color: #fff;
        /* Màu chữ trắng */
    }

    .tabs {
        display: flex;
    }

    .tab {
        margin-right: 10px;
        cursor: pointer;
        padding: 10px;
        background-color: #ddd;
    }

    /* Style for tab content */
    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }
</style>

<div class="details">
    <div class="recentOrders">
        <div class="tabs">
            <div class="tab" onclick="showContent('content1')">Đơn hàng</div>
            <div class="tab" onclick="showContent('content2')">Đơn hàng bị hủy</div>
        </div>

        <div id="content1" class="tab-content active">

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
            <td>' . number_format($total_donhang)  . '</td>
            <td><a class="btn-admin" href="' . $updatebill . '">Cập nhật</a> 
        </tr>
    ';
                        $id++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="content2" class="tab-content">
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
                    foreach ($cancelbill as $key => $bill) {
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
            <td>' . number_format($total_donhang)  . '</td>
            <td> <a class="btn-admin" href="' . $xoabill . '">Xóa</a></td>
        </tr>
    ';
                        $id++;
                    }
                    ?>
                </tbody>
            </table>
        </div>







    </div>

    <!-- ================= New Customers ================ -->

</div>
</div>
</div>
<script>
    function showContent(contentId) {
        // Hide all tab contents
        var contents = document.getElementsByClassName('tab-content');
        for (var i = 0; i < contents.length; i++) {
            contents[i].classList.remove('active');
        }

        // Show the selected tab content
        document.getElementById(contentId).classList.add('active');
    }
</script>