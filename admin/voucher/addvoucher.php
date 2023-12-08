<link rel="stylesheet" href="../css/table.css">
<form action="index.php?act=addvoucher" id="addVoucherForm" method="post">
    <label for="voucherName">Mã giảm giá:</label>
    <input type="text" id="voucherName" name="name_voucher" required> <br> <br>

    <label for="voucherType">Loại:</label>
    <input type="text" id="voucherType" name="type_voucher" required> <br> <br>

    <label for="voucherCode">Mức giảm giá:</label>
    <input type="text" id="voucherCode" name="giamgia" required> <br> <br>

    <label for="voucherQuantity">Số lượng:</label>
    <input type="number" id="voucherQuantity" name="quantity_voucher" required>

    <input type="submit" id="voucherQuantity" name="addvoucher"  value="Thêm">


</form>

