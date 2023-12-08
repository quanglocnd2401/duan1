<style>
    .form-group input {
        border: 1px solid black;
    }
    .custom-container {
            max-width: 400px; /* Adjust the max-width as needed */
            border: 0.5px solid grey;
            border-radius: 5px;
            padding: 20px;
    }
    
</style>

<?php 

?>
<div class="container custom-container">
    <h2>Đăng Ký</h2>
    <p style="color: red;" ><?php  if(isset($_COOKIE['error'])) echo $_COOKIE['error']; ?></p>
    <p style="color: red;" ><?php  if(isset($_COOKIE['inputErr'])) echo $_COOKIE['inputErr']; ?></p>
    <p style="color: red;" ><?php  if(isset($_COOKIE['registed'])) echo $_COOKIE['registed']; ?></p>
    <form action="index.php?act=register" method="post">
        <div class="form-group">
            <label for="newUsername">Username:</label>
            <input type="text" class="form-control" id="newUsername" name="username"  >
        </div>

        <div class="form-group">
            <label for="newPassword">Nhập mật khẩu</label>
            <input type="password" class="form-control" id="newPassword" name="pass1" >
        </div>

        <div class="form-group">
            <label for="newPassword">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" id="newPassword" name="pass2" >
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" >
        </div>

        <input type="submit" name="dangki" value="Đăng kí">

    </form>
</div>