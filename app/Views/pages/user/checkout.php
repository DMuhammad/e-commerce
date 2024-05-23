<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="mx-md-0 mx-3">
        <h1 class="text-black fw-medium mb-3">Checkout</h1>
        <div class="d-flex gap-3 align-items-center mb-5">
            <a href="/cart" class="fw-medium text-black fs-6 mb-0">Cart</a>
            <hr class="text-black" style="width: 50px;">
            <a href="<?= base_url('/check-cart') ?>" class="fw-medium text-black fs-6 mb-0">Checkout</a>
            <hr class="text-black" style="width: 50px;">
            <a href="/payment" class="fw-medium text-muted fs-6 mb-0">Payment</a>
        </div>
    </div>
    <form action="<?= base_url('/checkout') ?>" method="POST">
        <div class="row justify-content-md-between justify-content-center">
            <div class="col-md-8 col-11">
                <div class="d-flex flex-column mb-4">
                    <h5 class="fw-medium text-muted mb-2">ADDRESS</h5>
                    <div class="row align-items-center mb-5">
                        <div class="col-md-6">
                            <h5 class="text-black fw-medium"><?= $user->nama_lengkap ?></h5>
                            <?php if ($user->alamat) : ?>
                            <p class="text-black"><?= $user->alamat ?></p>
                            <?php else : ?>
                            <p class="text-black">Address not set</p>
                            <?php endif; ?>
                            <?php if ($user->no_telp) : ?>
                            <p class="text-black"><?= $user->no_telp ?></p>
                            <?php else : ?>
                            <p class="text-black">Phone number not set</p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-semibold text-black">Note</p>
                            <input type="text" name="note" id="note"
                                class="w-100 rounded-3 form-control border-secondary" placeholder="Tulis pesan...">
                        </div>
                    </div>

                    <h5 class="fw-medium text-black mb-3">Order Summary</h5>
                    <?php foreach ($carts as $cart) { ?>
                    <div class="row justify-content-start mb-3">
                        <div class="col-xl-2 col-3">
                            <img src="<?= $cart->image != null ? base_url('assets/uploads/img-product/' . $cart->image->image) : base_url('assets/static/images/product.png') ?>"
                                alt="product" class="border rounded-3 " height="90">
                        </div>
                        <div class="col-7">
                            <p class="text-black mb-1"><?= $cart->product->nama_produk ?></p>
                            <span style="font-size: 14px;"><?= $cart->product->variant ?></span>
                            <p class="custom-color-primary mb-0">Rp. <?= $cart->product->harga ?><small
                                    class="text-black align-top"> x<?= $cart->qty ?></small></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-xl-3 col-md-4 col-11">
                <div class="p-4 rounded-3" style="background-color: #f5f5f5;">
                    <!-- <div class="my-2 py-3 bg-white rounded-3">
                        <div class="text-center">
                            <img src="" alt="ekspedisi"
                                class="mb-3">
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
                    </div> -->
                    <!-- <div class="d-flex justify-content-between">
                    <p>Shipping</p>
                    <span class="custom-color-primary">Rp. 19.000</span>
                </div> -->
                    <div class="d-flex justify-content-between">
                        <p>Total</p>
                        <span class="custom-color-primary">Rp <?= $total ?></span>
                    </div>
                    <p class="text-gray fw-medium mb-0">*Belum termasuk ongkir</p>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <button type="submit" name="submit" class="btn btn-custom-success d-block mt-5">Payment</button>
                </div>
    </form>
</div>
</div>
</div>

<?= $this->endSection(); ?>