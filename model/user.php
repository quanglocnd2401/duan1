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

function load_all_user(){
    $sql = "SELECT * FROM `user` WHERE 1";
    $listuser = pdo_query($sql);
    return $listuser;
}


?>