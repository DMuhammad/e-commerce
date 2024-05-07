<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row gy-2 my-5">
        <div class="col-md-4 col-12">
            <div style="background-color: #f5f5f5;">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-5">
                        <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="m-2">
                <h1 class="text-black fw-medium custom-title">Hair Shampoo Treatment</h1>
                <h1 class="custom-color-primary custom-title">Rp. 50.000</h1>
                <p>Select Variation:</p>
                <div class="d-flex gap-3 mb-4">
                    <!-- if checked tambahkan background-color: #51994b; -->
                    <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked>
                    <label class="btn btn-outline-success" for="option1">50 ml</label>

                    <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                    <label class="btn btn-outline-success" for="option2">75 ml</label>

                    <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
                    <label class="btn btn-outline-success" for="option3">100 ml</label>
                </div>
                <hr class="mb-4">
                <div class="row mb-4 gy-2">
                    <div class="col-md-3 col-5">
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
                    <div class="col-md-9 col-7">
                        <button class="btn btn-custom-success w-100">Add to Cart</button>
                    </div>
                </div>
                <h5>Description</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div>
    </div>

    <div class="mb-5">
        <h2 class="text-center text-black fw-medium mb-4">Gallery</h2>
        <div class="row">
            <div class="col-4">
                <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product" class="img-fluid">
            </div>
            <div class="col-4">
                <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product" class="img-fluid">
            </div>
            <div class="col-4">
                <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mb-5" style="background-color: #f5f5f5">
    <div class="container p-4">
        <h3 class="text-start text-black mt-3 mb-4 fw-medium">You may also like</h3>
        <div class="splide" id="reference-products">
            <div class="splide__track">
                <div class="splide__list">
                    <?php for ($i = 0; $i < 4; $i++) { ?>
                        <div class="splide__slide">
                            <a href="/detail-product">
                                <div class="card shadow">
                                    <div class="card-content">
                                        <img src="<?= base_url('assets/static/images/product.png') ?>" class="card-img-top" alt="product" />
                                        <div class="card-body">
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-md-9 col-12">
                                                    <h5 class="custom-card-title text-dark fw-semibold">Be Single Minded</h5>
                                                    <p><span class="custom-card-title fw-bold text-success">Rp.50.000</span><small class="fw-light">/pcs</small></p>
                                                </div>
                                                <div class="col-md-3 col-12 text-end">
                                                    <button class="btn btn-custom-success rounded-circle">
                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mb-5">
    <div class="row flex-md-row flex-column-reverse justify-content-md-between align-items-center" style="background-image:url(' <?= base_url('assets/static/images/background2.png') ?> '); background-size: cover; background-position: center;">
        <div class="col-md-5 col-10 m-5">
            <h2 class="fw-semibold text-black mb-2">Discover the Essence of Luxury with Our Unique Cosmetic Packaging</h2>
            <p class="fw-regular text-black fs-5 mb-5">PT Persada Jayaraya Abadi</p>

            <button class="btn btn-custom-success px-4 py-3">Shop Now</button>
        </div>
        <div class="col-md-6 col-10 p-0">
            <img src="<?= base_url('assets/static/images/hair-shampoo.png') ?>" alt="shampoo" class="img-fluid object-fit-cover">
        </div>
    </div>
</div>

<?= $this->endSection() ?>