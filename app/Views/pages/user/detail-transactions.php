<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <h3 class="text-black fw-medium mb-3">Detail Transaction</h3>
    <div class="row justify-content-md-between justify-content-center gy-3">
        <div class="col-md-8 col-11">
        <?php if ($transaction->status == 'success') : ?>
                <div class="alert alert-success d-flex align-items-center text-white" role="alert">
                    <i class="fa-solid fa-circle-check fs-3"></i>
                    <div class="d-flex flex-column ms-3">
                        <span class="fw-medium">Your payment has been successful !</span>
                        <small>Thank you for your order</small>
                    </div>
                </div>
            <?php elseif ($transaction->status == 'pending') : ?>
                <div class="alert alert-warning d-flex align-items-center text-white" role="alert">
                    <i class="fa-solid fa-circle-exclamation fs-3"></i>
                    <div class="d-flex flex-column ms-3">
                        <span class="fw-medium">Please make payment immediately !</span>
                        <small>Please verify your order via WhatsApp</small>
                    </div>
                </div>
            <?php elseif ($transaction->status == 'canceled') : ?>
                <div class="alert alert-danger d-flex align-items-center text-white" role="alert" style="background-color: #FC5A37;">
                    <i class="fa-solid fa-circle-xmark fs-3"></i>
                    <div class="d-flex flex-column ms-3">
                        <span class="fw-medium">Payment has been Cancelled !</span>
                        <small>Please make another order</small>
                    </div>
                </div>
            <?php endif; ?>

            <div class="d-flex flex-column">
                <div class="row align-items-start gy-4">
                    <div class="col-md-6">
                        <h5 class="fw-medium text-muted mb-2">BILLING FROM</h5>
                        <h5 class="text-black fw-medium"><?= $admin->nama_lengkap ?></h5>
                        <p class="text-black mb-2"><?= $admin->alamat ?></p>
                        <p class="text-black mb-2"><?= $admin->no_telp ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-medium text-muted mb-2">BILLING TO</h5>
                        <h5 class="text-black fw-medium"><?= $user->nama_lengkap ?></h5>
                        <p class="text-black mb-2"><?= $user->alamat ?></p>
                        <p class="text-black mb-2"><?= $user->no_telp ?></p>
                        <!-- <p class="fw-semibold text-black mt-3 mb-1">Payment Date</p>
                        <input type="text" name="payment-date" id="payment-date"> -->
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <h5 class="text-black fw-medium">Invoice <?= $transaction->kode_transaksi ?></h5>
                <p class="text-muted fw-medium">Item</p>
                <?php foreach ($details as $detail) { ?>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0 text-black "><?= $detail->product->nama_produk ?></p>
                            <small class="text-muted"><?= $detail->product->variant ?> x <?= $detail->qty ?></small>
                        </div>
                        <span class="custom-color-primary">Rp. <?= $detail->product->harga ?></span>
                    </div>
                    <hr>
                <?php } ?>
                <h5 class="text-black fw-medium">Note</h5>
                <p class="text-muted">"<?= $transaction->note ?>"</p>
                <div class="mt-2 mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="text-black mb-1">Tax</p>
                        <p class="custom-color-primary mb-1">Rp <?= $tax ?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-black mb-1">Total Amount</p>
                        <p class="custom-color-primary mb-1">Rp <?= $transaction->total_bayar ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-11">
            <h5 class="fw-medium text-black mb-3">Order Summary</h5>
            <?php foreach ($details as $detail) { ?>
                    <div class="row justify-content-start gap-2 mb-3">
                        <div class="col-xl-1 col-md-2 col-3">
                            <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product"
                                class="border border-2 rounded-3 " height="90">
                        </div>
                        <div class="col-7">
                            <p class="text-black mb-1"><?= $detail->product->nama_produk ?></p>
                            <span style="font-size: 14px;"><?= $detail->product->variant ?></span>
                            <p class="custom-color-primary mb-0">Rp. <?= $detail->product->harga ?><small
                                    class="text-black align-top"> x<?= $detail->qty ?></small></p>
                        </div>
                    </div>
                    <?php }?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>