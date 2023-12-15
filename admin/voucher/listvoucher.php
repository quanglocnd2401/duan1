<link rel="stylesheet" href="../css/table.css">
<style>
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
<div class="tabs">
    <div class="tab" onclick="showContent('content1')">Danh sách voucher</div>
    <div class="tab" onclick="showContent('content2')">Voucher hết hạn</div>
   
</div>
<div id="content1" class="tab-content active">

    <table>
        <thead>
            <tr>
                <th>Mã</th>
                <th>giảm giá</th>
                <th>Số lượng</th>
                <th>Ngày hết hạn</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listvc as $vc) {
                extract($vc);
            ?>
                <tr>
                    <td><?= $ma_voucher ?></td>
                    <td><?= $giamgia ?> %</td>
                    <td><?= $soluong ?></td>
                    <td><?= $date ?></td>
                </tr>
            <?php
            }
            ?>


            <!-- Thêm các dòng khác tương tự nếu cần -->
        </tbody>

    </table>
    <button type="button"><a style="color: white;" href="index.php?act=addvoucher">Thêm Voucher</a> </button>
</div>

<div id="content2" class="tab-content">
<table >
        <thead>
            <tr>
                <th>Mã</th>
                <th>giảm giá</th>
                <th>Số lượng</th>
                <th><span style="color: red;">Ngày hết hạn</span> </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listvchh as $vc) {
                extract($vc);
                $xoavoucher = "index.php?act=xoavoucher&id=".$id_voucher
            ?>
                <tr>
                    <td><?= $ma_voucher ?></td>
                    <td><?= $giamgia ?>%</td>
                    <td><?= $soluong ?></td>
                    <td><span style="color: red;"><?= $date ?></span></td>
                    <td><a href="<?= $xoavoucher ?>">Xóa</a></td>
                </tr>
            <?php
            }
            ?>


            <!-- Thêm các dòng khác tương tự nếu cần -->
        </tbody>

    </table>
    <button type="button"><a style="color: white;" href="index.php?act=addvoucher">Thêm Voucher</a> </button>
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