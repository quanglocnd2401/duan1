<link rel="stylesheet" href="../css/table.css">

    

<h2>Danh sách voucher</h2>
<table>
    <thead>
        <tr>
            <th>Tên</th>
            <th>Loại</th>
            <th>Mã giảm giá</th>
            <th>Số lượng</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($listvc as $vc) {
                extract($vc);
            ?>
            <tr>
            <td><?= $ma_voucher ?></td>
            <td><?= $loai_voucher ?></td>
            <td><?= $giamgia ?></td>
            <td><?= $soluong ?></td>
        </tr>
        <?php 
            }
        ?>
        
        
        <!-- Thêm các dòng khác tương tự nếu cần -->
    </tbody>
  
</table>
<button type="button"><a style="color: white;" href="index.php?act=addvoucher">Thêm Voucher</a> </button>