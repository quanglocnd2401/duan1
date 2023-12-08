
<?php 
session_start();
if (!isset($_SESSION['cart'])) {
    // Nếu không có thì đi khởi tạo
    $_SESSION['cart'] = [];
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // lấy được cái dữ liệu từ ajax
    $productId = $_POST['id'];
    $newQuantity = $_POST['quantity'];
   
    if(!empty($_SESSION['cart'])){
        $index = array_search($productId, array_column($_SESSION['cart'], 'id'));

        if($index !== false){
            $_SESSION['cart'][$index]['quantity'] = $newQuantity;
        }else{
            echo 'Sản phẩm không tồn tại trong giỏ hàng';
        }
    }
} else{
    echo "Yêu cầu không hợp lệ";
}
?>
