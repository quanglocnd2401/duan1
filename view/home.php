<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Sách Chất Lượng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14 Ngày Trả Lại</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Hỗ Trợ</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <!-- Repeat the following block for each category -->
        <?php
        $theloai6 = load_6_danhmuc();
        foreach ($theloai6 as $tl) {
            extract($tl);
            echo '
            <div class="col-lg-2 col-md-4 pb-1">
            <div class="cat-item d-flex flex-column border mb-4 p-3">
                <p class="text-right">15 Products</p>
                <a href="#" class="cat-img position-relative overflow-hidden mb-3">
                    <img width=120px class="img-fluid" src="img/' . $imgtheloai . '" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">' . $name . '</h5>
            </div>
        </div>
            ';
        }

        ?>

    </div>
</div>
<!-- Offer Start -->
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                <img src="" alt="">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>
                    <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                <img src="img/offer-2.png" alt="">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
                    <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->

<style>
    .card-header img {
    object-fit: cover; /* hoặc 'contain' tùy thuộc vào ý muốn */
    width: 100%;
    height: 100%;
}
.card-header {
    max-height: 300px; /* hoặc bất kỳ giá trị nào khác phù hợp */
    overflow: hidden;
}

.card-header img {
    width: 100%;
    height: auto;
}
</style>
<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Xu hướng</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php

        foreach ($listsp as $sp) {
            extract($sp); // $img , $tieude , $id_book   , $price
        ?>
            <div class="col-lg-3 col-md-5 col-sm-12 pb-1">   
                <div class="card product-item border-0 mb-4">

                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100"  src="img/<?= $img ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-1 pb-1">
                        <h6 class="text-truncate mb-2"><?php echo $tieude; ?> </h6>
                        <div class="d-flex justify-content-center">
                            <h6 class="text-danger"><?= number_format($price) ; ?> đ </h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="index.php?act=sanphamct&id=<?= $id_book ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>

                        <button data-id="<?= $id_book ?>" onclick="addToCart( <?= $id_book ?>,'<?= $img ?>','<?= $tieude ?>','<?= $price ?>' )" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vảo giỏ </button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mb-3">
            <?php if ($page > 1) {
                $next_page = $page - 1;
            ?>
                <li class="page-item ">
                    <a class="page-link" href="index.php?page=<?= $next_page; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php
            }
            ?>


            <?php
            for ($i = 1; $i <= $max_page; $i++) {
            ?>
                <li class="page-item <?= ($i == $page) ? "active" : ""; ?>"><a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
            <?php
            }
            ?>
            <?php if ($page < $max_page) {
                $next_page = $page + 1;
            ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=<?= $next_page; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </nav>
</div>
<!-- Products End -->


<!-- Subscribe Start -->

<!-- Subscribe End -->


<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sách mới</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">

        <?php

        foreach ($listspnew as $sp) {
            extract($sp); // $img , $tieude , $id_book   , $price
        ?>
            <div class="col-lg-3 col-md-5 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">

                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/<?= $img ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $tieude; ?> </h6>
                        <div class="d-flex justify-content-center">
                            <h6> <?= number_format($price) ; ?> đ </h6>
                            
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="index.php?act=sanphamct&id=<?= $id_book ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                        <button data-id="<?= $id_book ?>" onclick="addToCart( <?= $id_book ?>,'<?= $img ?>','<?= $tieude ?>','<?= $price ?>' )" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            let totalProduct = document.getElementById('totalProduct');

            function addToCart(productId, productImg, productName, productPrice) {
                // console.log(productId , productImg, productName  , productPrice);
                $.ajax({
                    type: 'POST',
                    url: "view/addToCart.php",
                    data: {
                        id: productId,
                        name: productName,
                        price: productPrice
                    },
                    success: function(response) {
                        totalProduct.innerText = response;
                        alert('Thêm giỏ hàng thành công');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        </script>
        

   
    </div>
    
</div>
<!-- Products End -->


<!-- Vendor Start -->
<div class="container-fluid py-5">

</div>
</div>
<!-- Vendor End -->