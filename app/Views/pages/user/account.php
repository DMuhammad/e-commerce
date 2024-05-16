<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row align-items-start justify-content-md-between justify-content-center gy-4">
        <div class="col-md-3 col-5 border border-1">
            <div class="nav flex-column nav-pills me-3 p-3" id="v-pills-tab" role="tablist">
                <div class="d-flex d-md-block">
                    <button class="nav-link active mb-2 w-100" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="true">
                        <i class="fa-regular fa-user me-2"></i> <span class="d-md-inline d-none">My Account</span>
                    </button>

                    <button class="nav-link mb-2 w-100" id="v-pills-transaction-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-transaction" type="button" role="tab"
                        aria-controls="v-pills-transaction" aria-selected="false">
                        <i class="fa-regular fa-credit-card me-2"></i> <span
                            class="d-md-inline d-none">Transaction</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-11">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                    aria-labelledby="v-pills-profile-tab" tabindex="0">
                    <div class="mb-5">
                        <h4 class="text-black fw-semibold mb-3">My Profile</h4>
                        <p class="text-black mb-0">Manage your profile information to control, protect and secure your
                            account</p>
                        <hr>
                        <form action="<?= base_url('/account/update') ?>" method="POST">
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <label for="fullname" class="col-form-label text-black">Name</label>
                                </div>
                                <div class="col-7">
                                    <input type="text" name="nama_lengkap" id="fullname" class="form-control"
                                        value="<?= $user->nama_lengkap ?>">
                                </div>
                            </div>
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <label for="email" class="col-form-label text-black">Email</label>
                                </div>
                                <div class="col-7">
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="<?= $user->email ?>">
                                </div>
                            </div>
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <label for="phone" class="col-form-label text-black">Phone Number</label>
                                </div>
                                <div class="col-7">
                                    <?php if ($user->no_telp == null) { ?>
                                    <input type="tel" name="no_telp" id="phone" class="form-control"
                                        placeholder="Phone number">
                                    <?php } else  { ?>
                                    <input type="tel" name="no_telp" id="phone" class="form-control"
                                        value="<?= $user->no_telp ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <button type="submit" name="submit" class="btn btn-custom-success">Save</button>
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
                                <button type="button" class="btn btn-custom-success" data-bs-toggle="modal"
                                    data-bs-target="#editAddressModal">+ <span class="d-md-inline d-none">Edit
                                        Address</span></button>
                            </div>

                            <!-- Modal -->
                            <form action="<?= base_url('/account/update-address') ?>" method="POST">
                                <div class="modal fade" id="editAddressModal" tabindex="-1"
                                    aria-labelledby="editAddressModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editAddressModalLabel">Edit Address</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row align-items-center mb-4">
                                                    <label for="address" class="col-form-label text-black">Full
                                                        Address</label>
                                                    <div class="col-15">
                                                        <input type="text" name="alamat" id="address"
                                                            class="form-control" value="<?= $user->alamat ?>">
                                                    </div>
                                                </div>
                                                <!-- create text muted -->
                                                <small class="text-muted">Contoh: Jl. Mawar 1, Kelurahan Gubeng,
                                                    Kecamatan Gubeng, Kota Surabaya, Jawa Timur, 6111 </small>
                                                <input type="hidden" name="<?= csrf_token() ?>"
                                                    value="<?= csrf_hash() ?>" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="submit"
                                                    class="btn btn-custom-success">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <p class="text-black">Address</p>
                        <div class="row justify-content-between">
                            <div class="col-8">
                                <h5 class="text-black fw-medium mb-1"><?= $user->nama_lengkap ?></h5>
                                <?php if ($user->alamat == null) { ?>
                                <p class="text-black mb-1">Address not set</p>
                                <?php } else { ?>
                                <p class="text-black mb-1"><?= $user->alamat ?></p>
                                <?php } ?>
                                <?php if ($user->no_telp == null) { ?>
                                <p class="text-black mb-1">Phone number not set</p>
                                <?php } else { ?>
                                <p class="text-black mb-1"><?= $user->no_telp ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="text-black fw-semibold mb-3">Change My Password</h4>
                        <p class="text-black mb-0">Manage your password information to control, protect and secure your
                            account</p>
                        <hr>

                        <form action="<?= base_url('/account/update-password') ?>" method="POST">
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <label for="old-password" class="col-form-label text-black">Old Password</label>
                                </div>
                                <div class="col-7">
                                    <input type="password" name="old_password" id="old-password" class="form-control"
                                        placeholder="********">
                                </div>
                            </div>
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <label for="new-password" class="col-form-label text-black">New Password</label>
                                </div>
                                <div class="col-7">
                                    <input type="password" name="new_password" id="new-password" class="form-control"
                                        placeholder="********">
                                </div>
                            </div>
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2 col-3">
                                    <button type="submit" name="submit" class="btn btn-custom-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-transaction" role="tabpanel"
                    aria-labelledby="v-pills-transaction-tab" tabindex="1">
                    <h4 class="text-black fw-semibold mb-3">My Transaction</h4>

                    <form class="me-2" role="search" action="">
                        <div class="form-group has-search mb-0">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control bg-transparent" placeholder="Search">
                        </div>
                    </form>
                    <hr>
                    <?php foreach ($transactions as $transaction) { ?>
                        <div class="row justify-content-between">
                            <div class="col-9 flex-column">
                                <p>Invoice <?= $transaction->kode_transaksi ?></p>
                                <a href="<?= base_url('/detail-transaction/'. $transaction->id) ?>"
                                    class="btn btn-custom-success px-5 py-2 mb-3 rounded-3">Details</a>
                            </div>
                            <div class="col-md-2 col-3 text-center">
                                <?php if ($transaction->status == 'success') { ?>
                                <span class="text-success"><i class="fa-solid fa-circle-check"></i> Success</span>
                                <?php } elseif ($transaction->status == 'pending') { ?>
                                <span class="text-warning"><i class="fa-solid fa-circle-exclamation"></i> Pending</span>
                                <?php } else { ?>
                                <span class="text-danger"><i class="fa-solid fa-circle-xmark"></i> Canceled</span>
                                <?php } ?>
                            </div>
                        </div>
                        <hr>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>