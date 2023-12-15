<?php 
    if(is_array($onedanhmuc)){
        extract($onedanhmuc);
        
    }
?>
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
        width: 200px;
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
<form class="form_update" action="index.php?act=update" method="POST" enctype="multipart/form-data">
        <label for="product_name">id</label>
        <input type="text" name="id"  value="<?= $id_theloai; ?>" required> <br>

        <label for="name">Tên</label>
        <input type="text"  name="name"  value="<?= $name; ?>" required> <br>

        <label for="name">Ảnh</label> <br>
        <?php echo $imgtheloai ?>
        <img width="100px" src="../img/<?= $imgtheloai; ?>" alt="">

        <input type="file"  name="imgtheloai"> <br>
        
        <input name="update" type="submit">
</form>