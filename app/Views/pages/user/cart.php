<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="mx-md-0 mx-3">
        <h1 class="text-black fw-medium mb-3">Cart</h1>
        <div class="d-flex gap-1 align-items-center mb-5">
            <a href="/cart" class="fw-medium text-black fs-6 mb-0">Cart</a>
            <hr class="text-black" style="width: 50px;">
            <a href="<?= base_url('/check-cart') ?>" class="fw-medium text-muted fs-6 mb-0">Checkout</a>
            <hr class="text-black" style="width: 50px;">
            <a href="/payment" class="fw-medium text-muted fs-6 mb-0">Payment</a>
        </div>
    </div>
    <div class="row justify-content-md-between justify-content-center">
        <div class="col-md-8 col-11">
            <?php if (!$carts) : ?>
                <div class="text-center">
                    <h1 class="text-black
                    ">Cart is empty</h1>
                    <a href="<?= base_url('/products') ?>" class="btn btn-custom-success">Shop Now</a>
                </div>
            <?php endif; ?>
            <?php foreach ($carts as $cart) { ?>
                <form action="<?= base_url('/cart/update/') . $cart->id ?>" method="POST">
                    <div class="d-flex flex-column mb-5">
                        <div class="row justify-content-between">
                            <div class="col-md-2 col-3">
                                <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product" height="200">
                            </div>
                            <div class="col-md-9 col-7">
                                <h5 class="text-black"><?= $cart->product->nama_produk ?></h5>
                                <p><?=  $cart->product->detail ?></p>
                                <p class="text-black"><span class="text-muted">Variation: </span> <?=  $cart->product->variant ?></p>
                                <h2 class="custom-color-primary">Rp. <?=  $cart->product->harga ?></h2>
                            </div>
                        </div>

                        <hr>
                        <div class="row justify-content-between">
                            <div class="col-xl-3 col-md-4 col-5">
                                <div class="input-group number-spinner rounded-3" style="background-color: #f5f5f5;">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn" data-dir="dwn"><i class="fa-solid fa-minus"></i></button>
                                    </span>
                                    <input type="text" class="form-control text-center" name="qty" value="<?= $cart->qty ?>" style="background-color: #f5f5f5;">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn" data-dir="up">+</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3 col-4">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                <button type="submit" name="submit" class="btn btn-custom-success">Save</button>
                            </div>
                </form>
                <form action="<?= base_url('/cart/delete/') . $cart->id ?>" method="POST">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <div class="col-md-3 col-4">
                            <button type="submit" name="submit" class="btn btn-outline-danger mx-1">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </div>
                </form>
                    </div>
                </div>
            <?php }?>
        </div>

        <div class="col-xl-3 col-md-4 col-11">
            <div class="p-4 rounded-3" style="background-color: #f5f5f5;">
                <h5 class="fw-medium mb-3">Order Summary</h5>
                <div class="d-flex justify-content-between">
                    <p>Sub Total</p>
                    <span class="custom-color-primary">Rp. <?= $subTotal ?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Tax</p>
                    <span class="custom-color-primary">Rp. <?= $tax ?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Total</p>
                    <span class="custom-color-primary">Rp. <?= $total ?></span>
                </div>
                <?php if ($carts) : ?>
                    <a href="<?= base_url('/check-cart') ?>" class="btn btn-custom-success d-block mt-5">Checkout</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>