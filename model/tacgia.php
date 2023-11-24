<?php
function load_all_tacgia(){
    $sql = "SELECT * FROM author";
    $tacgia = pdo_query($sql);
    return $tacgia;
}

?>