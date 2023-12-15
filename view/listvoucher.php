<div class="container">
    <h2 class="my-4">Danh sách Voucher</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên Voucher</th>
                <th scope="col">Mô tả</th>
             
                <th scope="col">Ngày hết hạn</th>

                <th scope="col">Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($listvoucher as $voucher) {
                    extract($voucher);
            ?>
                <tr>
                <td><img  src="img/voucher.png" alt="Voucher Image" style="max-width: 100px;"></td>
                <td><?= $ma_voucher  ?></td>
                <td>Giảm <?= $giamgia ?> %</td>
   
                <td><?= $date ?></td>
                <td><a href="#" class="btn btn-primary">Dùng sau</a></td>
            </tr>
            <?php        
                }
            ?>
            
           
            <!-- Thêm dòng cho mỗi voucher khác -->
        </tbody>
    </table>
</div>