<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="mx-md-0 mx-3">
        <h1 class="text-black fw-medium mb-3">Cart</h1>
        <div class="d-flex gap-3 align-items-center mb-5">
            <a href="/cart" class="fw-medium text-black fs-6 mb-0">Payment</a>
            <hr class="text-black" style="width: 50px;">
            <a href="/checkout" class="fw-medium text-black fs-6 mb-0">Checkout</a>
            <hr class="text-black" style="width: 50px;">
            <a href="/payment" class="fw-medium text-black fs-6 mb-0">Payment</a>
        </div>
    </div>
    <div class="row justify-content-md-between justify-content-center gy-3">
        <div class="col-md-8 col-11">
            <div class="d-flex flex-column">
                <div class="row align-items-start gy-4">
                    <div class="col-md-6">
                        <h5 class="fw-medium text-muted mb-2">BILLING FROM</h5>
                        <h5 class="text-black fw-medium">Royhan Daffa</h5>
                        <p class="text-black mb-2">Kahuripan Avenue no 23 Sidoarjo, Jawa Timur, Indonesia</p>
                        <p class="text-black mb-2">+62 812-8363-5368</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-medium text-muted mb-2">BILLING TO</h5>
                        <h5 class="text-black fw-medium">Fahrul Sugeng</h5>
                        <p class="text-black mb-2">Kahuripan Avenue no 23 Sidoarjo, Jawa Timur, Indonesia</p>
                        <p class="text-black mb-2">+62 812-8363-5368</p>
                        <p class="fw-semibold text-black mt-3 mb-1">Payment Date</p>
                        <input type="text" name="payment-date" id="payment-date">
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <h5 class="text-black fw-medium">Invoice</h5>
                <p class="text-muted fw-medium">Item</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0 text-black ">Hair Shampoo Treatment</p>
                        <small class="text-muted">50 ml x 1</small>
                    </div>
                    <span class="custom-color-primary">Rp. 50.000</span>
                </div>
                <hr>

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0 text-black ">Hair Shampoo Treatment</p>
                        <small class="text-muted">50 ml x 3</small>
                    </div>
                    <span class="custom-color-primary">Rp. 150.000</span>
                </div>
                <hr>
                <h5 class="text-black fw-medium">Note</h5>
                <p class="text-muted">"tolong diisi note untuk pengiriman mau apa"</p>
                <div class="mt-2 mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="text-black mb-1">Tax</p>
                        <p class="custom-color-primary mb-1">Rp 19.000</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-black mb-1">Shipping</p>
                        <p class="custom-color-primary mb-1">Rp 19.000</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-black mb-1">Total Amount</p>
                        <p class="custom-color-primary mb-1">Rp 209.000</p>
                    </div>
                </div>
                <button type="button" class="btn btn-custom-cancel w-100">Cancel</button>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-11">
            <div class="p-4 rounded-3 shadow">
                <div class="text-center mb-4">
                    <img src="<?= base_url('assets/static/images/bsi.png') ?>" alt="bsi" class="">

                </div>
                <h5 class="fw-medium text-black mb-4">Bank Syariah Indonesia</h5>
                <div>
                    <h5 class="fw-medium text-black">Rekening Bank</h5>
                    <p class="text-black fw-regular">6012 1234 5678 9012</p>
                </div>
                <div>
                    <h5 class="fw-medium text-black">Rekening Atas Nama</h5>
                    <p class="text-black fw-regular">Agus Subaya</p>
                </div>
                <a href="wa.me" class="btn btn-custom-success d-block mt-4">
                    <i class="fa-brands fa-whatsapp mx-2 fs-6"></i> Verify Payment
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>