<?php
function select_nhaxuatban(){
    $sql = "SELECT * FROM nhaxuatban";
    $nhaxuatban = pdo_query($sql);
    return $nhaxuatban;
}

?>