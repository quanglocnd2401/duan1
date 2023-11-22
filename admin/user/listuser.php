<!-- ================ Order Details List ================= -->

<div class="details">
    <div class="recentOrders">
        <div class="topbar">
            <div class="search">
                <form action="" method="GET">
                    <label>
                        <input type="hidden" name="act" value="listsearch">
                        <input name="kyw" type="text" placeholder="Search">
                        <input type="submit" name="search" value="Tìm">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </form>

            </div>


        </div>
        <div class="cardHeader">
            <h2>Recent Orders</h2>
            <a href="index.php?act=addtheloai" class="btn">Thêm</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>username</td>
                    <td>password</td>
                    <td>email</td>
                    <td>fullname</td>
                    <td>address</td>
                    <td>role</td>
                </tr>
            </thead>

            <tbody>
                
                <?php
                

                $id = 1;
                foreach ($listuser as $user) {
                    extract($user);

                    echo '
                            <tr>
                            <td>' . $id . '</td>
                            <td>' . $username . '</td>
                            <td>' . $password . '</td>
                            <td>' . $email . '</td>
                            <td>' . $fullname . '</td>
                            <td>' . $address . '</td>
                            <td>' . $role . '</td>
                            </tr>
                           ';
                    $id++;
                } ?>
            </tbody>
        </table>
        
            
        
    </div>

    <!-- ================= New Customers ================ -->

</div>
</div>
</div>