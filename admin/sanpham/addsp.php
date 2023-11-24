<style>
.add {
  display: flex; /* Hiển thị các phần tử con theo chiều ngang */
  flex-direction: column; /* Xếp các phần tử con theo chiều dọc */
  max-width: 300px; /* Đặt chiều rộng tối đa cho form */
}

/* Áp dụng cho label trong form */
.add label {
  margin-bottom: 5px; /* Khoảng cách giữa label và input */
}

/* Áp dụng cho input trong form */
.add input {
  margin-bottom: 10px; /* Khoảng cách giữa các input */
  padding: 5px; /* Khoảng cách nội dung từ viền ngoài */
}

/* Áp dụng cho input submit trong form */
.add input[type="submit"] {
  background-color: #4CAF50; /* Màu nền cho nút submit */
  color: white; /* Màu chữ trắng */
  cursor: pointer; /* Con trỏ chuột khi di chuyển qua nút submit */
}
</style>
<?php ?>
<div class="details">
    <div class="recentOrders">
        <form class="add" action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
            
            <label for="addtheloai">Tên Sách</label>
            <input type="text" name="tensach" required>
            <label for="addtheloai">Tác giả</label>
            <select name="tacgia" >
              <?php foreach ($tacgia as $tg):
                extract($tg);
               ?>
              <option value="<?= $id_author ?>"><?= $name_author; ?></option>

              <?php endforeach; ?>
            </select>

            <br>
            <label for="addtheloai">Nhà Xuất Bản</label>
            <select name="nhaxuatban" >
              <?php foreach ($nhaxuatban as $nxb):
                extract($nxb);
               ?>
              <option value="<?= $id_nhaxuatban ?>"><?= $name_nhaxuatban; ?></option>

              <?php endforeach; ?>
            </select>

            <br>
          
            <label for="addtheloai">Ngày xuất bản</label>
            <input type="text" name="ngayxuatban" required>
            <label for="addtheloai">Ảnh</label>
            <input type="file" name="img" required>
            <label for="addtheloai">Giá</label>
            <input type="text" name="gia" required>
            <label for="addtheloai">Số lượng</label>
            <input type="text" name="soluong" required>

            <label for="addtheloai">Thể loại</label>
            
            <select name="theloai" >
              <?php foreach ($theloai as $tl):
                extract($tl);
               ?>
              <option value="<?= $id_theloai ?>"><?= $name; ?></option>

              <?php endforeach; ?>
            </select>

            <br>
            <input value="Thêm" name="addsp" type="submit">
        </form>
    </div>

</div>