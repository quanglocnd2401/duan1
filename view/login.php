
<style>
    .form-group input {
        border: 1px solid black;
    }
    .custom-container {
            max-width: 400px; /* Adjust the max-width as needed */
            border: 0.5px solid grey;
            padding: 20px;
            border-radius: 5px;
    }
</style>
   <div class="container custom-container">
    <?php
    // Check for error message in cookies and sanitize it
    $error = isset($_COOKIE['error']) ? htmlspecialchars($_COOKIE['error'], ENT_QUOTES, 'UTF-8') : '';
    
    // Display error message
    if (!empty($error)) {
        echo '<div class="alert alert-danger">' . $error . '</div>';
    }
    ?>

    <h2>Đăng Nhập</h2>
    <form action="index.php?act=login" method="post">

        <div class="form-group">
            <label for="username">Tên người dùng:</label>
            <input type="text" class="form-control" id="username" name="username_login" required>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" class="form-control" id="password" name="password_login" required>
        </div>

        <input type="submit" class="btn btn-primary" value="Đăng nhập" name="dangnhap">
    </form>
</div>
    
