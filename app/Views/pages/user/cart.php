<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="text-black fw-medium mb-3 mx-md-0 mx-3">Cart</h1>
    <div class="row justify-content-md-between justify-content-center">
        <div class="col-md-8 col-11">
            <div class="d-flex gap-1 align-items-center mb-5">
                <a href="/cart" class="fw-medium text-black fs-6 mb-0">Cart</a>
                <hr class="text-black" style="width: 50px;">
                <a href="/checkout" class="fw-medium text-muted fs-6 mb-0">Checkout</a>
                <hr class="text-black" style="width: 50px;">
                <a href="/payment" class="fw-medium text-muted fs-6 mb-0">Payment</a>
            </div>
            <div class="d-flex flex-column mb-4">
                <div class="row justify-content-between">
                    <div class="col-md-2 col-3">
                        <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product" height="200">
                    </div>
                    <div class="col-md-9 col-7">
                        <h5 class="text-black">Hair Shampoo Treatment</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        <p class="text-black"><span class="text-muted">Variation: </span> 50 ml</p>
                        <h2 class="custom-color-primary">Rp. 50.000</h2>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-md-4 col-5">
                        <div class="input-group number-spinner rounded-3" style="background-color: #f5f5f5;">
                            <span class="input-group-btn">
                                <button class="btn" data-dir="dwn"><i class="fa-solid fa-minus"></i></button>
                            </span>
                            <input type="text" class="form-control text-center" value="1" disabled style="background-color: #f5f5f5;">
                            <span class="input-group-btn">
                                <button class="btn" data-dir="up">+</button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 col-4 text-end">
                        <input type="checkbox" class="btn-check" id="btn-check-item" checked autocomplete="off">
                        <label class="btn btn-outline-success" for="btn-check-item">
                            <i class="fa-solid fa-check"></i>
                        </label>
                        <button type="button" class="btn btn-outline-danger mx-1">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-11">
            <div class="p-4 rounded-3" style="background-color: #f5f5f5;">
                <h5 class="fw-medium mb-3">Order Summary</h5>
                <div class="d-flex justify-content-between">
                    <p>Sub Total</p>
                    <span class="custom-color-primary">Rp. 50.000</span>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Tax</p>
                    <span class="custom-color-primary">Rp. 4.000</span>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Total</p>
                    <span class="custom-color-primary">Rp. 46.000</span>
                </div>

                <a href="/checkout" class="btn btn-custom-success d-block mt-5">Checkout</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>