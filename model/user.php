<?php 

function dang_ki ($username , $password, $email) {
    $sql = "INSERT INTO `user` (`username`, `password`, `email`, `role`) VALUES ('$username', '$password', '$email',  b'0')";
    pdo_execute($sql);
}

function check_login($username , $password){
    $sql = "SELECT * FROM `user` WHERE username = '$username' and password = '$password'";
    $user =  pdo_query_one($sql);
    return $user;
}
function xoa_user($id_user){
    $sql = "UPDATE `user` SET `xoauser` = b'1' WHERE `user`.`id_user` = $id_user";
    pdo_execute($sql);
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function load_all_user(){
    $sql = "SELECT * FROM `user` WHERE xoauser = 0";
    $listuser = pdo_query($sql);
    return $listuser;
}
function load_one_user($id){
    $sql = "SELECT * FROM `user` WHERE xoauser = 0 AND id_user = $id";
    $user = pdo_query_one($sql);
    return $user;
}

function update_user($id_user,$fullname , $address , $tel){
    $sql = "UPDATE `user` SET `fullname` = '$fullname', `address` = '$address', `tel` = '$tel' WHERE `user`.`id_user` = $id_user" ;
    pdo_execute($sql);
}
function rand_string($length){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789"; 
    $size = strlen($chars); // trả về số chuỗi ; 100
    $str = '';
    for($i = 0;$i < $length;$i++){
        $str .= $chars[rand(0,$size-1)]; 
    }

    return $str;
}

function check_username($username){
    $sql = "SELECT * FROM `user` where 1";
    $users = pdo_query($sql);
    foreach ($users as $u) {
        if($username == $u['username']){
            return false;
        }
        else{
            return true;
        }
    }
}

function password_user($email){
    $sql = "SELECT password FROM `user` WHERE email = '$email'";
    $pass = pdo_query_one($sql);
    return $pass;
}
?>