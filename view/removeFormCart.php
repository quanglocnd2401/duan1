
<?php 
session_start();
if (!isset($_SESSION['cart'])) {
    // Nếu không có thì đi khởi tạo
    $_SESSION['cart'] = [];
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // lấy được cái dữ liệu từ ajax
    $productId = $_POST['id'];
   
   
    if(!empty($_SESSION['cart'])){
        $index = array_search($productId, array_column($_SESSION['cart'], 'id'));

        if($index !== false){
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart']  = array_values($_SESSION['cart']);
           
        }else{
            echo 'Sản phẩm không tồn tại trong giỏ hàng';
        }
    }
} else{
    echo "Yêu cầu không hợp lệ";
}
?>
