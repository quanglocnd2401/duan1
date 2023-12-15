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
      height: 30px;
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
<div class="details">
    
        <form class="form_update" action="index.php?act=addtheloai" method="POST" enctype="multipart/form-data">
            <label for="addtheloai">Tên Thể loại</label>
            <input type="text" name="addtheloai" required>
            <label for="addtheloai">Ảnh</label>
            <input type="file" name="img" required>
            <input value="Thêm" name="add" type="submit">
        </form>
   

</div>