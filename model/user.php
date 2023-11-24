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


?>