<?php
if (is_array($onebill)) {
    extract($onebill);
}
?>
<style>
    .container_update {
        display: flex;
        justify-content: space-between;
    }

    .form_update {
        max-width: 400px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table_detail {
        flex: 1;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table_detail table {
        width: 100%;
        border-collapse: collapse;
    }

    .table_detail th,
    .table_detail td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .form_update label {
        display: block;
        margin-top: 10px;
    }

    .form_update input,
    .form_update select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        box-sizing: border-box;
    }

    .form_update input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .form_update input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
<div class="container_update">
    <div class="form_update">
        <form action="index.php?act=capnhatBill" method="POST" enctype="multipart/form-data">
            <label>ID Đơn hàng:</label>
            <span><?= $id_donhang ?></span>
            <input type="hidden" name="id_donhang" value="<?= $id_donhang ?>">
            <label>ID User:</label>
            <span><?= $id_user ?></span>

            <label>Date:</label>
            <span><?= $date ?></span>

            <label>Trạng thái:</label>
            <select name="status">
                <?php
                $trangthai = [
                    "0" => "Chưa xác nhận",
                    "1" => "Đã xác nhận",
                    "2" => "Đang xử lí",
                    "3" => "Đang vận chuyển",
                    "4" => "Hoàn thành"
                ];
                for ($i = 0; $i < 5; $i++) {
                    if ($status <= $i) {
                ?>
                        <option value="<?= $i ?>" <?= ($status == $i) ? 'selected' : '' ?>><?= $trangthai[$i] ?></option>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </select>
            <input type="submit" name="updateBill" value="Cập nhật">
        </form>
    </div>

    <div class="table_detail">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($billpro as $key => $sp) {
                ?>
                    <tr>
                        <td><?= $sp['tieude'] ?></td>
                        <td><?= $sp['soluong'] ?></td>
                        <td><?= $sp['gia_sanpham'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


</div>