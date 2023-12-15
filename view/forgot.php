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
    <h2>Khôi phục mật khẩu</h2>
    <form  action="index.php?act=send" method="post">

        <div class="form-group">
            <label for="username">Email</label>
            <input type="text" class="form-control"  name="email" >
        </div>
        <input type="submit" class="btn btn-primary" value="Gửi" name="send"> <br>
    </form>
</div>