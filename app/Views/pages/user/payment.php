<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="mx-md-0 mx-3">
        <h1 class="text-black fw-medium mb-3">Payment</h1>
        <div class="d-flex gap-3 align-items-center mb-5">
            <a href="/cart" class="fw-medium text-black fs-6 mb-0">Cart</a>
            <hr class="text-black" style="width: 50px;">
            <a href="<?= base_url('/check-cart') ?>" class="fw-medium text-black fs-6 mb-0">Checkout</a>
            <hr class="text-black" style="width: 50px;">
            <a href="/payment" class="fw-medium text-black fs-6 mb-0">Payment</a>
        </div>
    </div>

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
                        <span class="custom-color-primary">Rp. <?= number_format($detail->product->harga, 0, ',', '.') ?></span>
                    </div>
                    <hr>
                <?php } ?>
                <h5 class="text-black fw-medium">Note</h5>
                <p class="text-muted">"<?= $transaction->note ?>"</p>
                <div class="mt-2 mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="text-black mb-1">Total Amount</p>
                        <p class="custom-color-primary mb-1">Rp <?= number_format($transaction->total_bayar, 0, ',', '.') ?></p>
                    </div>
                </div>
                <?php if ($transaction->status == 'pending') : ?>
                    <form action="<?= base_url('/cancel-payment/' . $transaction->id) ?>" method="POST">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <button type="submit" name="submit" class="btn btn-custom-cancel w-100 mb-2">Cancel</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-11">
            <div class="p-4 rounded-3 shadow">
                <div class="text-center mb-4">
                    <?php if ($company->bank == 'BCA') : ?>
                        <img src="<?= base_url('assets/static/images/bca.png') ?>" alt="bca" class="img-fluid">
                    <?php elseif ($company->bank == 'BRI') : ?>
                        <img src="<?= base_url('assets/static/images/bri.png') ?>" alt="bri" class="img-fluid">
                    <?php elseif ($company->bank == 'MANDIRI') : ?>
                        <img src="<?= base_url('assets/static/images/mandiri.png') ?>" alt="mandiri" class="img-fluid">
                    <?php elseif ($company->bank == 'BSI') : ?>
                        <img src="<?= base_url('assets/static/images/bsi.png') ?>" alt="bsi" class="img-fluid">
                    <?php endif; ?>
                </div>
                <?php if ($company->bank == 'BCA') : ?>
                    <h5 class="fw-medium text-black mb-4">Bank Central Asia</h5>
                <?php elseif ($company->bank == 'BRI') : ?>
                    <h5 class="fw-medium text-black mb-4">Bank Rakyat Indonesia</h5>
                <?php elseif ($company->bank == 'MANDIRI') : ?>
                    <h5 class="fw-medium text-black mb-4">Bank Mandiri</h5>
                <?php elseif ($company->bank == 'BSI') : ?>
                    <h5 class="fw-medium text-black mb-4">Bank Syariah Indonesia</h5>
                <?php endif; ?>
                <div>
                    <h5 class="fw-medium text-black">Nomor Rekening</h5>
                    <p class="text-black fw-regular"><?= $company->no_rek ?></p>
                </div>
                <div>
                    <h5 class="fw-medium text-black">Rekening Atas Nama</h5>
                    <p class="text-black fw-regular"><?= $admin->nama_lengkap ?></p>
                </div>
                <?php if ($transaction->status == 'pending') : ?>
                    <a href="<?= base_url('/verify-payment') ?>" class="btn btn-custom-success d-block mt-4">
                        <i class="fa-brands fa-whatsapp mx-2 fs-6"></i> Verify Payment
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>