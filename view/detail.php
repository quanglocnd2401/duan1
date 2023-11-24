<?php
if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
    $noidung = $_POST['noidung'];

    $id_user = $_SESSION['user']['id_user'];

    $date = date('m/d/Y');
    insert_binhluan($id_book, $id_user, $noidung, $date);
}
?>

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop Detail</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class=" border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="img/<?= $img ?>" alt="Image">
                    </div>

                </div>

            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold"><?php echo $tieude; ?></h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4"><?php echo number_format($price); ?></h3>
            <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.</p>
            <div class="d-flex mb-3">
                <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                <form>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-1" name="size">
                        <label class="custom-control-label" for="size-1">XS</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-2" name="size">
                        <label class="custom-control-label" for="size-2">S</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-3" name="size">
                        <label class="custom-control-label" for="size-3">M</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-4" name="size">
                        <label class="custom-control-label" for="size-4">L</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-5" name="size">
                        <label class="custom-control-label" for="size-5">XL</label>
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus" onclick="decreaseQuantity()">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control bg-secondary text-center" value="1" id="quantityInput">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus" onclick="increaseQuantity()">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
            </div>
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Quantity:</p>
                <p class="mb-4"><?= $soluong; ?></p>

            </div>
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link " data-toggle="tab" href="#tab-pane-1">Description</a>
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="tab-pane-1">
                    <h4 class="mb-3">Product Description</h4>
                    <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod..</p>
                </div>

                <div class="tab-pane fade  show active" id="tab-pane-3">
                    <div class="row" id="binhluan">
                        <div class="col-md-6">
                            <h4 class="mb-4">Comments</h4>

                            <?php

                            $comment = load_all_binhluan($id_book);
                            foreach ($comment as $cm) {
                                extract($cm);
                                echo '<div class="media mb-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6>' . $username . '<small> - <i>' . $ngaydang . '</i></small></h6>
                                    <p>' . $noidung . '</p>
                                </div>
                            </div>';
                            }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Your email address will not be published. Required fields are marked *</small>

                            <form action="index.php?act=sanphamct&id=<?= $id_book ?>" method="POST">
                                <div class="form-group">

                                    <label for="message">Your Review *</label>
                                    <input type="text" name="noidung">
                                </div>
                                <div class="form-group mb-0">
                                    <input name="guibinhluan" type="submit" value="Leave Your Review" class="btn btn-primary px-3" >
                                </div>
                            </form>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->
<script>
    function increaseQuantity() {
        var quantityInput = document.getElementById('quantityInput');
        var currentValue = parseInt(quantityInput.value);

        // Kiểm tra nếu giá trị hiện tại là số và không phải NaN
        if (!isNaN(currentValue)) {
            quantityInput.value = currentValue + 1;
        } else {
            
        }
    }
    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantityInput');
        var currentValue = parseInt(quantityInput.value);

        // Kiểm tra nếu giá trị hiện tại là số và không phải NaN
        if (!isNaN(currentValue) && currentValue > 1) {
            quantityInput.value = currentValue - 1;
        } else {
           
        }
    }
</script>

<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php
      
        foreach ($sanphamlienquan as $sp) {
            extract($sp);
        ?>
            <div class="col-lg-3 col-md-5 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">

                    <div  class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/<?= $img?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $tieude; ?> </h6>
                        <div class="d-flex justify-content-center">
                            <h6>$123.00</h6>
                            <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="index.php?act=sanphamct&id=<?= $id_book?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
        
       
    </div>
</div>