<?php 
session_start();
if (!isset($_SESSION['cart'])) {
    // Nếu không có thì đi khởi tạo
    $_SESSION['cart'] = [];
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // lấy được cái dữ liệu từ ajax
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];

    $index = false;
      if (!empty($_SESSION['cart'])) {
        $index = array_search($productId, array_column($_SESSION['cart'], 'id'));
         }

    if ($index !== false) {
        $_SESSION['cart'][$index]['quantity'] += 1;
    }else{
        
        $product = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => 1
        ];
        $_SESSION['cart'][] = $product;
    }

    echo count($_SESSION['cart']);
} else{
    echo "Yêu cầu không hợp lệ";
}
?>