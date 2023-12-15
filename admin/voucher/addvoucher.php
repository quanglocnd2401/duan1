<style>
    .form_update {
        max-width: 400px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form_update label {
        display: block;
        margin-top: 10px;
    }

    .form_update input,
    .form_update img {
        width: 100%;
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
<link rel="stylesheet" href="../css/table.css">
<form class="form_update" action="index.php?act=addvoucher"  method="post">
    <label for="voucherName">Mã giảm giá:</label>
    <input type="text"  name="name_voucher" required> <br> <br>

    <label for="voucherCode">Mức giảm giá:</label>
    <input type="text" name="giamgia" required> <br> <br>

    <label for="voucherQuantity">Số lượng:</label>

    <input type="number"  name="quantity_voucher" required> <br> <br>
    <label for="voucherQuantity">Ngày hết hạn:</label>
    <input type="date" id="voucherDate" name="ngayhethan" required><br> <br>

    <input type="submit" id="voucherQuantity" name="addvoucher"  value="Thêm">


</form>

