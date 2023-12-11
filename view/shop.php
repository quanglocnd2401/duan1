
<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Price Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>

                <!-- <form action="index.php?act=shop" method="POST">
                    Giá từ:
                    <input type="number" name="gia1" value="0"><br> <br>
                    Đến:
                    <input type="number" name="gia2" value="1000"><br> <br>
                    <input type="submit" name="filter" value="Tìm">
                </form> -->

                <form  action="index.php?act=shop" method="POST"> 
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input name="price[]" value="0-100" type="checkbox" class="custom-control-input" id="price-1">
                            <label  class="custom-control-label" for="price-1">$0 - $100</label>
                            
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input name="price[]" value="100-200" type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input name="price[]" value="200-300" type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input name="price[]" value="300-400" type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                        </div>
                        <div  class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input name="price[]" value="400-500" type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                        </div>

                        <input type="submit" name="filter" value="Tìm">
                    </form>
            </div>

        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <?php

                foreach ($sanphams as $sp) {
                    extract($sp);
                ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="img/<?= $img ?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?= $tieude ?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6><?= number_format($price) ?></h6>
                                    <h6 class="text-muted ml-2"><del>123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="index.php?act=sanphamct&id=<?= $id_book ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>


                <?php if(!isset($_GET['idtheloai'])){ ?>
                <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mb-3">
                            <?php if ($page > 1) {
                                $next_page = $page - 1;
                            ?>
                                <li class="page-item ">
                                    <a class="page-link" href="index.php?act=shop&page=<?= $next_page; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>


                            <?php
                            for ($i = 1; $i < $max_page ; $i++) {
                            ?>
                                <li class="page-item <?= ($i == $page) ? "active" : ""; ?>"><a class="page-link" href="index.php?act=shop&page=<?= $i ?>"><?= $i ?></a></li>
                            <?php
                            }
                            ?>
                            <?php if ($page < $max_page) {
                                $next_page = $page + 1;
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?act=shop&page=<?= $next_page; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
                <?php }?>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>