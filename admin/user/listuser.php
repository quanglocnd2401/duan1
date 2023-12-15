<!-- ================ Order Details List ================= -->
<?php echo $_SESSION['user']['id_user']; ?>
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
                  
                    <td>email</td>
                    <td>fullname</td>
                    <td>address</td>
                    <td>role</td>
                    <td>Chức năng</td>
                </tr>
            </thead>

            <tbody>
                
                <?php
                

                $id = 1;
                foreach ($listuser as $user) {
                    extract($user);
                    
                    if($role == 1){
                        $role = "admin";
                    }else{
                        $role = "user";
                        
                    }
                    
                    if(  $id_user == $_SESSION['user']['id_user']){
                        $xoauser = "";
                    }
                    else{
                        $xoauser = "<button> <a btn-admin  href='index.php?act=xoauser&id=".$id_user."'>Xóa</a> </button>";
                    }
                    echo '
                            <tr>
                            <td>' . $id . '</td>
                            <td>' . $username . '</td>
                          
                            <td>' . $email . '</td>
                            <td>' . $fullname . '</td>
                            <td>' . $address . '</td>
                            <td>' . $role . '</td>
                            <td>'.$xoauser.'</td>
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