
   
    <div class="container">
        <p><?php  if(isset($_COOKIE['error'])) echo $_COOKIE['error']; ?></p>
        
        <h2>Đăng Nhập</h2>
        <form action="index.php?act=login" method="post">
            <label for="username">Tên người dùng:</label>
            <input type="text" id="username" name="username_login" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password_login" required>

            <input type="submit" name="dangnhap" value="Đăng Nhập">
        </form>
    </div>
    
