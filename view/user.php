<style>
    .ui-w-80 {
        width: 80px !important;
        height: auto;
    }
    .btn-default {
        border-color: rgba(24, 28, 33, 0.1);
        background: rgba(0, 0, 0, 0);
        color: #4E5155;
    }
    label.btn {
        margin-bottom: 0;
    }
    .btn-outline-primary {
        border-color: #26B4FF;
        background: transparent;
        color: #26B4FF;
    }
    .btn {
        cursor: pointer;
    }
    .text-light {
        color: #babbbc !important;
    }
    .btn-facebook {
        border-color: rgba(0, 0, 0, 0);
        background: #3B5998;
        color: #fff;
    }
    .btn-instagram {
        border-color: rgba(0, 0, 0, 0);
        background: #000;
        color: #fff;
    }
    .card {
        background-clip: padding-box;
        box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
    }
    .row-bordered {
        overflow: hidden;
    }
    .account-settings-fileinput {
        position: absolute;
        visibility: hidden;
        width: 1px;
        height: 1px;
        opacity: 0;
    }
    .account-settings-links .list-group-item.active {
        font-weight: bold !important;
    }
    html:not(.dark-style) .account-settings-links .list-group-item.active {
        background: transparent !important;
    }
    .account-settings-multiselect~.select2-container {
        width: 100% !important;
    }
    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }
    .light-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }
    .material-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }
    .material-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }
    .dark-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(255, 255, 255, 0.03) !important;
    }
    .dark-style .account-settings-links .list-group-item.active {
        color: #fff !important;
    }
    .light-style .account-settings-links .list-group-item.active {
        color: #4E5155 !important;
    }
    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }
</style>

 <?php
        if (is_array($user)) {
            extract($user);
        }
?>
<div class="container light-style flex-grow-1 container-p-y">
    <form action="index.php?act=updateUser" method="post" class="card overflow-hidden">
    <input type="hidden" name="id_user" value="<?= $_GET['id'] ?>">
        <div  class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>

                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="account-general">
                        <div class="card-body media align-items-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt class="d-block ui-w-80">
                            <div class="media-body ml-4">
                                <label class="btn btn-outline-primary">
                                    Upload new photo
                                    <input type="file" class="account-settings-fileinput">
                                </label> &nbsp;
                                <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                            </div>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input name="username" class="form-control mb-1" type="text" value="<?= $username ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Fullname</label>
                                <input name="fullname" class="form-control mb-1" type="text" value="<?= $fullname ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">E-mail</label>
                                <input class="form-control mb-1" type="text" value="<?= $email ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <input name="address" class="form-control mb-1" type="text" value="<?= $address ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Telephone</label>
                                <input name="telephone" class="form-control" type="text" value="<?= $tel ?>">
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-change-password">
                        <div class="card-body pb-2">
                            <div class="form-group">
                                <label class="form-label">Current password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">New password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Repeat new password</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            
        </div>
        <div class="text-right mt-3">
                <input type="submit" name="update" class="btn btn-primary" value="Save changes">
                <button type="button" class="btn btn-default">Cancel</button>
            </div>
    </form>

</div>