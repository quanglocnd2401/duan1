<div class="container mt-5">
        <h2>Đơn Hàng</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Đơn Hàng</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
    $i = 0;
    foreach ($listdonhang as $dh) {
        extract($dh);
        $bill_detail = "index.php?act=bill_detail&id=".$id_donhang;
        $i++;
        $trangthai = [
            "0" => "Chưa xác nhận",
            "1" => "Đã xác nhận",
            "2" => "Đang xử lí",
            "3" => "Đang vận chuyển",
            "4" => "Hoàn thành"
        ];
        
        $badgeClass = ""; // Mặc định không có class màu
        switch ($status) {
            case "0":
                $badgeClass = "badge badge-secondary"; // Màu xám cho trạng thái "Chưa xác nhận"
                break;
            case "1":
                $badgeClass = "badge badge-success"; // Màu xanh lá cây cho trạng thái "Đã xác nhận"
                break;
            case "2":
                $badgeClass = "badge badge-warning"; // Màu vàng cho trạng thái "Đang xử lí"
                break;
            case "3":
                $badgeClass = "badge badge-info"; // Màu xanh dương cho trạng thái "Đang vận chuyển"
                break;
            case "4":
                $badgeClass = "badge badge-primary"; // Màu xanh cho trạng thái "Hoàn thành"
                break;
            default:
                $badgeClass = "badge badge-secondary"; // Mặc định nếu không phù hợp với các trạng thái trên
        }
?>
        <tr>
            <td><?= $i ?> </td>
            <td><?= $date ?></td>
            <td><?= $total_donhang ?></td>
            <td><span class="<?= $badgeClass ?>"><?= $trangthai[$status] ?></span></td>
            <td><a href="<?= $bill_detail ?>">Chi tiết</a></td>
        </tr>
<?php
    }
?>
                <!-- Dữ liệu đơn hàng sẽ được thay thế bằng dữ liệu thực tế từ cơ sở dữ liệu -->
                
            </tbody>
        </table>
    </div>