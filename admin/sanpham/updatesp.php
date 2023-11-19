<?php 
    if(is_array($onesanpham)){
        extract($onesanpham);
        
    }
?>
<style>
    .form_update{
        margin: 50px auto;
        width: 300px;
    }
</style>

<form class="form_update" action="index.php?act=updatesp" method="POST">
        <label for="product_name">id</label>
        <input type="text" name="id"  value="<?= $id_theloai; ?>" required> <br>

        <label for="name">Thể loại</label>
        <input type="text"  name=""  value="<?= $name; ?>" required> <br>
        <label for="name">T</label>
        <input type="text"  name=""  value="<?= $name; ?>" required> <br>
        <label for="name">Ten</label>
        <input type="text"  name=""  value="<?= $name; ?>" required> <br>
        <label for="name">Ten</label>
        <input type="text"  name=""  value="<?= $name; ?>" required> <br>
        <label for="name">Ten</label>
        <input type="text"  name=""  value="<?= $name; ?>" required> <br>

        <input name="update" type="submit">
</form>