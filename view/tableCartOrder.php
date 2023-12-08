<?php
session_start();
include "../model/pdo.php";
include "../model/sanpham.php";
include "../model/user.php";
include "../model/danhmuc.php";

if (!empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];


    $productId = array_column($cart, 'id');


    // Chuyển đổi chuỗi id thành 1 chuỗi  để thực hiện truy vấn
    $idList = implode('\',\'', $productId);

    $dataDb = loadone_sanphamCart($idList);
?>
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">

                    <?php
                    $total = 0;
                    foreach ($dataDb as $key => $product) :
                        $quantityCart = 0;
                        foreach ($cart as $item) {
                            if (is_array($item) && isset($item['id'])) {
                                if ($item['id'] == $product['id_book']) {
                                    $quantityCart = $item['quantity'];
                                }
                            }
                        }
                    ?>
                        <tr>
                            <td class="align-middle"><img src="img/<?= $product['img'] ?>" alt="" style="width: 50px;"> <?=
                                                                                                                        $product['tieude'] ?></td>
                            <td class="align-middle"><?= number_format($product['price']) ?> <u>đ</u></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">

                                    <input id="quantity_<?= $product['id_book'];  ?>" oninput="updateQuantity(<?= $product['id_book'] ?>,<?= $key ?>)" type="number" class="form-control form-control-sm bg-secondary text-center" value="<?= $quantityCart; ?>" min="1">
                                </div>
                            </td>
                            <td class="align-middle"><?= number_format($product['price'] * $quantityCart);  ?> <u>đ</u> </td>
                            <td class="align-middle"><button onclick="removeFormCart(<?= $product['id_book'] ?>)" class="btn btn-sm btn-primary"> <i class="fa fa-times"></i></button></td>
                        </tr>
                        <?php
                        $total += $product['price'] * $quantityCart;
                        ?>

                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <form action="index.php?act=submitCart" method="post" class="card border-secondary mb-5">
                <input type="hidden" name="total" value="<?= $total ?>">
                <input type="hidden" name="id_user" value="<?= $_SESSION['user']['id_user'] ?>">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold"><?= $total ?></h5>
                    </div>
                    <input type="submit" name="submitCart" class="btn btn-block btn-primary my-3 py-3" value="Proceed To Checkout">
                </div>
            </form>
        </div>
    </div>
<?php
}


?>