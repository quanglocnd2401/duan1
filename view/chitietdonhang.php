<div class="container mt-4">
    <link rel="stylesheet" href="css/order.css">
    <article class="card">
        <?php
        $trangthai = [
            ['icon' => 'fa fa-check', 'text' => 'Chưa xác nhận'],
            ['icon' => 'fa fa-user', 'text' => 'Đã xác nhận'],
            ['icon' => 'fa fa-truck', 'text' => 'Đang xử lí'],
            ['icon' => 'fa fa-box', 'text' => 'Đang vận chuyển'],
            ['icon' => 'fa fa-check', 'text' => 'Hoàn thành'],
        ];
        ?>
        <div class="card-body">
            <div class="track">
                <?php foreach ($trangthai as $key =>$step) :
                    if($onebill['status'] >= $key){
                        $active = "active";
                    }else{
                        $active = "";
                    }
                     ?>
                    
                    <div class="step <?= $active ?>">
                        <span class="icon"><i class="<?php echo $step['icon']; ?>"></i></span>
                        <span class="text"><?php echo $step['text']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </article>
    <div class="row">
        <!-- Section 1: Chi tiết đơn hàng (Order details) -->
        <div class="col-md-6">


            <div class="card mt-4">
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
                        foreach ($listsp as $key => $sp) {
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

        <!-- Section 2: Thông tin khách hàng (Customer information) -->
        <div class="col-md-6">
            <div class="mt-4">
                <h3>Thông tin khách hàng</h3>
                <p>Họ và tên: quanglocnd123</p>
                <p>Email: loc@gmail.com</p>
                <p>Số điện thoại: 123-456-7890</p>
            </div>
        </div>
    </div>
    <a href="index.php?act=listdonhang" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
</div>