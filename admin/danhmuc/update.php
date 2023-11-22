<?php 
    if(is_array($onedanhmuc)){
        extract($onedanhmuc);
        
    }
?>
<style>
    
</style>
<form class="form_update" action="index.php?act=update" method="POST" enctype="multipart/form-data">
        <label for="product_name">id</label>
        <input type="text" name="id"  value="<?= $id_theloai; ?>" required> <br>

        <label for="name">Ten</label>
        <input type="text"  name="name"  value="<?= $name; ?>" required> <br>

        <label for="name">Ảnh</label> <br>
        <img width="100px" src="../img/<?= $img; ?>" alt="">
        <input type="file"  name="imgtheloai"> <br>
        
        

        <input name="update" type="submit">
</form>