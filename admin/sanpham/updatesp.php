<?php
if (is_array($onesanpham)) {
    extract($onesanpham);
}
?>
<style>
    .form_update {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f2f2f2;
        border-radius: 5px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="file"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>


<form class="form_update" action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $id_book; ?>" required> <br>
    <label for="name">Tên Sách</label>
    <input type="text" name="name" value="<?= $tieude; ?>" required> <br>

    <label for="img">Ảnh</label>
    <input type="file" name="img" > <br>

    <label for="name">Tác giả</label>
    <select name="tacgia" id="">
        <?php
        $tacgia = load_all_tacgia();
        foreach ($tacgia as $tg) {
            extract($tg);
        ?>
            <option value="<?= $id_author; ?>"><?= $name_author; ?></option>
        <?php
        }
        ?>
    </select>

    <label for="name">Thể loại</label>
    <select name="theloai" id="">
        <?php
        $theloai = load_all_danhmuc("", "");

        foreach ($theloai as $tl) {
            extract($tl);
        ?>
            <option value="<?= $id_theloai;?>"><?= $name; ?></option>
        <?php
        }
        ?>
    </select>

    <label for="name">Ngày xuất bản</label>
    <input type="text" name="ngayxuatban" value="<?= $ngayxuatban; ?>" required> <br>

    <label for="name">Giá</label>
    <input type="text" name="price" value="<?= $price; ?>" required> <br>

    <label for="name">Số lượng</label>
    <input type="text" name="soluong" value="<?= $soluong; ?>" required> <br>

    <input name="update" type="submit">
</form>