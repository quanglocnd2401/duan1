<?php
function select_tacgia(){
    $sql = "SELECT * FROM author";
    $tacgia = pdo_query($sql);
    return $tacgia;
}

?>