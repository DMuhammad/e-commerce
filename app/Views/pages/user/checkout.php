<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="mx-md-0 mx-3">
        <h1 class="text-black fw-medium mb-3">Cart</h1>
        <div class="d-flex gap-3 align-items-center mb-5">
            <a href="/cart" class="fw-medium text-black fs-6 mb-0">Cart</a>
            <hr class="text-black" style="width: 50px;">
            <a href="/checkout" class="fw-medium text-black fs-6 mb-0">Checkout</a>
            <hr class="text-black" style="width: 50px;">
            <a href="/payment" class="fw-medium text-muted fs-6 mb-0">Payment</a>
        </div>
    </div>
    <div class="row justify-content-md-between justify-content-center">
        <div class="col-md-8 col-11">
            <div class="d-flex flex-column mb-4">
                <h5 class="fw-medium text-muted mb-2">ADDRESS</h5>
                <div class="row align-items-center mb-5">
                    <div class="col-md-6">
                        <h5 class="text-black fw-medium">Royhan Daffa</h5>
                        <p class="text-black">Kahuripan Avenue no 23 Sidoarjo, Jawa Timur, Indonesia</p>
                        <p class="text-black">+62 812-8363-5368</p>
                    </div>
                    <div class="col-md-6">
                        <p class="fw-semibold text-black">Note</p>
                        <input type="text" name="note" id="note" class="w-100 rounded-3 form-control border-secondary" placeholder="Tulis pesan...">
                    </div>
                </div>

                <h5 class="fw-medium text-black mb-3">Order Summary</h5>
                <?php for ($i = 0; $i < 2; $i++) {    ?>
                    <div class="row justify-content-start gap-2 mb-3">
                        <div class="col-xl-1 col-md-2 col-3">
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
        </div>

        <div class="col-xl-3 col-md-4 col-11">
            <div class="p-4 rounded-3" style="background-color: #f5f5f5;">
                <div class="my-2 py-3 bg-white rounded-3">
                    <div class="text-center">
                        <img src="<?= base_url('assets/static/images/ekspedisi.png') ?>" alt="ekspedisi" class="mb-3">
                    </div>
                    <p class="text-muted mb-2">Ekspedisi</p>
                    <p class="text-black fw-medium mb-2">VAR Express</p>
                    <div class="mb-2">
                        <p class="text-black fw-medium mb-0">Tipe Pengiriman</p>
                        <small class="text-black mb-0">Laut</small>
                    </div>
                    <div class="mb-1">
                        <h6 class="text-black fw-medium mb-0">Berat</h6>
                        <small class="text-black mb-0">1 Kg</small>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Sub Total</p>
                    <span class="custom-color-primary">Rp. 200.000</span>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Tax</p>
                    <span class="custom-color-primary">Rp. 19.000</span>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Shipping</p>
                    <span class="custom-color-primary">Rp. 19.000</span>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Total</p>
                    <span class="custom-color-primary">Rp 209.000</span>
                </div>

                <a href="/checkout" class="btn btn-custom-success d-block mt-5">Payment</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>