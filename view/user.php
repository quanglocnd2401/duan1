<?php
    if(is_array($user)){
        extract($user);
    }
?>
<div class="container" style=" padding: 20px;">
<div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin người dùng</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ và Tên</label>
                            <input class="form-control" type="text" placeholder="fullname" value="<?= $fullname ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com" value="<?= $email ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Điện thoại</label>
                            <input class="form-control" type="text" placeholder="+123 456 789" value="<?= $tel ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" placeholder="123 Street" value="<?= $address ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Thành phố</label>
                            <select class="custom-select">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                      
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
</div>
