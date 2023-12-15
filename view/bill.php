<?php 

$id_donhang = $id_bill[0]['id_donhang'];
if(!empty($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
    
    $productId = array_column($cart, 'id');

// Chuyển đổi chuỗi id thành 1 chuỗi  để thực hiện truy vấn
    $idList = implode('\',\'',$productId);
    $dataDb = loadone_sanphamCart($idList);
    // var_dump($dataDb);
    foreach ($dataDb as $key => $product) {
        $quantityCart = 0;
        foreach ($cart as $item) {
            if (is_array($item) && isset($item['id'])) {
                if ($item['id'] == $product['id_book']) {
                    $quantityCart = $item['quantity'];
                }
            }
        }
        insert_bill_detail($id_donhang, $product['id_book'], (int)$quantityCart , $product['price']);   
    }
}

?>


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body text-center">
          <h2 class="card-title">Đặt hàng thành công!</h2>
          <p class="card-text">Cảm ơn bạn đã mua sắm của chúng tôi. Đơn hàng của bạn đã được xác nhận.</p>

          <!-- Hiển thị thông tin đơn hàng -->
          <a href="index.php" class="btn btn-primary mt-3">Quay lại trang chủ</a>
        </div>
      </div>
    </div>
  </div>
</div>