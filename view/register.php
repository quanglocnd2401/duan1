<div class="container">
        <h2>Đăng Ký</h2>
        <form action="index.php?act=register" method="post">
            <label for="newUsername">Username:</label>
            <input type="text" id="newUsername" name="username" required> <br>

            <label for="newPassword">Nhập mật khẩu</label>
            <input type="password" id="newPassword" name="pass1" required> <br>
            <label for="newPassword">Nhập lại mật khẩu</label>
            <input type="password" id="newPassword" name="pass2" required> <br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required> <br>

            <input name="dangki" type="submit" value="Đăng Ký">
        </form>
    </div>
