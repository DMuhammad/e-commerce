<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <h3 class="text-black fw-medium mb-3">Detail Transaction</h3>
    <div class="row justify-content-md-between justify-content-center gy-3">
        <div class="col-md-8 col-11">
            <!-- ALERT SUKSES -->
            <div class="alert alert-success d-flex align-items-center text-white" role="alert">
                <i class="fa-solid fa-circle-check fs-3"></i>
                <div class="d-flex flex-column ms-3">
                    <span class="fw-medium">Your payment has been successful !</span>
                    <small>Please verify via WhatsApp on the side</small>
                </div>
            </div>

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
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-11">
            <h5 class="fw-medium text-black mb-3">Order Summary</h5>
            <?php for ($i = 0; $i < 2; $i++) {    ?>
                <div class="row justify-content-start mb-3">
                    <div class="col-3">
                        <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product" class="border border-2 rounded-3 " height="90">
                    </div>
                    <div class="col-xl-9 col-8">
                        <p class="text-black mb-1">Hair Shampoo Treatment</p>
                        <span style="font-size: 14px;">50 ml</span>
                        <p class="custom-color-primary mb-0">Rp. 50.000 <small class="text-black align-top">x3</small></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>