<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row align-items-start justify-content-md-between justify-content-center gy-4">
        <div class="col-md-3 col-5 border border-1">
            <div class="nav flex-column nav-pills me-3 p-3" id="v-pills-tab" role="tablist">
                <div class="d-flex d-md-block">
                    <button class="nav-link active mb-2 w-100" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                        <i class="fa-regular fa-user me-2"></i> <span class="d-md-inline d-none">My Account</span>
                    </button>

                    <button class="nav-link mb-2 w-100" id="v-pills-transaction-tab" data-bs-toggle="pill" data-bs-target="#v-pills-transaction" type="button" role="tab" aria-controls="v-pills-transaction" aria-selected="false">
                        <i class="fa-regular fa-credit-card me-2"></i> <span class="d-md-inline d-none">Transaction</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-11">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                    <div class="mb-5">
                        <h4 class="text-black fw-semibold mb-3">My Profile</h4>
                        <p class="text-black mb-0">Manage your profile information to control, protect and secure your account</p>
                        <hr>
                        <form action="" method="">
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <label for="fullname" class="col-form-label text-black">Name</label>
                                </div>
                                <div class="col-7">
                                    <input type="text" name="fullname" id="fullname" class="form-control" value="Royhan Daffa">
                                </div>
                            </div>
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <label for="email" class="col-form-label text-black">Email</label>
                                </div>
                                <div class="col-7">
                                    <input type="email" name="email" id="email" class="form-control" value="user@gmail.com">
                                </div>
                            </div>
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <label for="phone" class="col-form-label text-black">Phone Number</label>
                                </div>
                                <div class="col-7">
                                    <input type="tel" name="phone" id="phone" class="form-control" value="089 323 921 923 212">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="mb-5">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="text-black fw-semibold mb-2">My Address</h4>
                                <p class="text-black mb-0">Manage your address</p>
                            </div>
                            <div class="align-self-center">
                                <!-- KETIKA BLM ADA ALAMAN USER MAKA INI MUNCUL -->
                                <button type="button" class="btn btn-custom-success">+ <span class="d-md-inline d-none">Add new address</span></button>
                            </div>
                        </div>
                        <hr>

                        <p class="text-black">Address</p>
                        <div class="row justify-content-between">
                            <div class="col-8">
                                <h5 class="text-black fw-medium mb-1">Royhan Daffa</h5>
                                <p class="text-black mb-1">Jl. Kahuripan Avenue no 23 Sidoarjo, Jawa Timur, Indonesia</p>
                                <p class="text-black mb-1">+62 812-8363-5368</p>
                            </div>
                            <div class="col-4 text-end">
                                <button type="button" class="btn btn-outline-success"><i class="fa-regular fa-pen-to-square"></i></button>
                                <button type="button" class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="text-black fw-semibold mb-3">Change My Password</h4>
                        <p class="text-black mb-0">Manage your password information to control, protect and secure your account</p>
                        <hr>

                        <form action="" method="">
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <label for="old-password" class="col-form-label text-black">Old Password</label>
                                </div>
                                <div class="col-7">
                                    <input type="password" name="old-password" id="old-password" class="form-control" value="Royhan Daffa">
                                </div>
                            </div>
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <label for="new-password" class="col-form-label text-black">New Password</label>
                                </div>
                                <div class="col-7">
                                    <input type="password" name="new-password" id="new-password" class="form-control" placeholder="********">
                                </div>
                            </div>
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <label for="confirm-password" class="col-form-label text-black">Confirm Password</label>
                                </div>
                                <div class="col-7">
                                    <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="********">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-transaction" role="tabpanel" aria-labelledby="v-pills-transaction-tab" tabindex="1">
                    <h4 class="text-black fw-semibold mb-3">My Transaction</h4>

                    <form class="me-2" role="search" action="">
                        <div class="form-group has-search mb-0">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control bg-transparent" placeholder="Search">
                        </div>
                    </form>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col-9 flex-column">
                            <a href="/detail-transactions" class="btn btn-custom-success px-5 py-2 mb-3 rounded-3">Details</a>

                            <?php for ($i = 0; $i < 2; $i++) {    ?>
                                <div class="row justify-content-start gap-md-4 mb-3">
                                    <div class="col-xl-1 col-md-2 col-sm-3 col-4">
                                        <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product" class="border border-2 rounded-3 " height="90">
                                    </div>
                                    <div class="col-7">
                                        <p class="text-black mb-1">Hair Shampoo Treatment</p>
                                        <span style="font-size: 14px;">50 ml</span>
                                        <p class="custom-color-primary mb-0">Rp. 50.000 <small class="text-black align-top">x3</small></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-2 col-3 text-center">
                            <span class="text-success"><i class="fa-solid fa-circle-check"></i> Success</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col-9 flex-column">
                            <a href="/detail-transactions" class="btn btn-custom-success px-5 py-2 mb-3 rounded-3">Details</a>

                            <?php for ($i = 0; $i < 2; $i++) {    ?>
                                <div class="row justify-content-start gap-md-4 gap-sm-2 gap-0 mb-3">
                                    <div class="col-xl-1 col-md-2 col-sm-3 col-4">
                                        <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product" class="border border-2 rounded-3 " height="90">
                                    </div>
                                    <div class="col-7">
                                        <p class="text-black mb-1">Hair Shampoo Treatment</p>
                                        <span style="font-size: 14px;">50 ml</span>
                                        <p class="custom-color-primary mb-0">Rp. 50.000 <small class="text-black align-top">x3</small></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-2 col-3 text-center">
                            <span class="text-warning"><i class="fa-solid fa-circle-exclamation"></i> Pending</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col-9 flex-column">
                            <a href="/detail-transactions" class="btn btn-custom-success px-5 py-2 mb-3 rounded-3">Details</a>

                            <?php for ($i = 0; $i < 1; $i++) {    ?>
                                <div class="row justify-content-start gap-md-4 mb-3">
                                    <div class="col-xl-1 col-md-2 col-sm-3 col-4">
                                        <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product" class="border border-2 rounded-3 " height="90">
                                    </div>
                                    <div class="col-7">
                                        <p class="text-black mb-1">Hair Shampoo Treatment</p>
                                        <span style="font-size: 14px;">50 ml</span>
                                        <p class="custom-color-primary mb-0">Rp. 50.000 <small class="text-black align-top">x3</small></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-2 col-3 text-center">
                            <span class="text-danger"><i class="fa-solid fa-circle-xmark"></i> Cancel</span>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>