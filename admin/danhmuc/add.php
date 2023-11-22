<style>
.addtheloai {
  display: flex; /* Hiển thị các phần tử con theo chiều ngang */
  flex-direction: column; /* Xếp các phần tử con theo chiều dọc */
  max-width: 300px; /* Đặt chiều rộng tối đa cho form */
}

/* Áp dụng cho label trong form */
.addtheloai label {
  margin-bottom: 5px; /* Khoảng cách giữa label và input */
}

/* Áp dụng cho input trong form */
.addtheloai input {
  margin-bottom: 10px; /* Khoảng cách giữa các input */
  padding: 5px; /* Khoảng cách nội dung từ viền ngoài */
}

/* Áp dụng cho input submit trong form */
.addtheloai input[type="submit"] {
  background-color: #4CAF50; /* Màu nền cho nút submit */
  color: white; /* Màu chữ trắng */
  cursor: pointer; /* Con trỏ chuột khi di chuyển qua nút submit */
}
</style>
<div class="details">
    <div class="recentOrders">
        <form class="addtheloai" action="index.php?act=addtheloai" method="POST" enctype="multipart/form-data">
            <label for="addtheloai">Tên Thể loại</label>
            <input type="text" name="addtheloai" required>
            <label for="addtheloai">Ảnh</label>
            <input type="file" name="img" required>
            <input value="Thêm" name="add" type="submit">
        </form>
    </div>

</div>