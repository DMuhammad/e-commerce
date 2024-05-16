<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row gy-2 my-5">
        <div class="col-md-4 col-12">
            <div style="background-color: #f5f5f5;">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-5">
                        <?php if (!empty($product->images) && $product->images[0]) : ?>
                            <img src="<?= base_url('assets/uploads/img-product/' . $product->images[0]->image) ?>" alt="product" class="img-fluid">
                        <?php else : ?>
                            <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product" class="img-fluid">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="m-2">
                <form action="<?= base_url('/add-to-cart') ?>" method="POST">
                    <h1 class="text-black fw-medium custom-title"><?= $product->nama_produk ?></h1>
                    <h1 class="custom-color-primary custom-title">Rp. <?= $product->harga ?></h1>
                    <p>Select Variation:</p>
                    <div class="variants-container d-flex gap-3 mb-4">
                        <?php foreach ($variants as $variant) : ?>
                            <label class="btn btn-outline-success variant-label <?= $variant->id == $product->id ? 'active' : '' ?>" for="variant<?= $variant->id ?>"><?= $variant->variant ?></label>
                            <input type="radio" class="btn-check variant-radio" name="variant" id="variant<?= $variant->id ?>" value="<?= $variant->id ?>" <?= $variant->id == $product->id ? 'checked' : '' ?> autocomplete="off">
                        <?php endforeach; ?>
                    </div>
                    <p>Stok: <?= $product->stok ?> </span></p>
                    <hr class="mb-4">
                    <div class="row mb-4 gy-2">
                        <div class="col-md-3 col-5">
                            <div class="input-group number-spinner rounded-3" style="background-color: #f5f5f5;">
                                <span class="input-group-btn">
                                    <button type="button" class="btn" data-dir="dwn"><i class="fa-solid fa-minus"></i></button>
                                </span>
                                <input type="text" class="form-control text-center" name="qty" value="1" style="background-color: #f5f5f5;">
                                <span class="input-group-btn">
                                    <button type="button" class="btn" data-dir="up">+</button>
                                </span>
                            </div>
                        </div>
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <div class="col-md-9 col-7">
                            <button type="submit" name="submit" class="btn btn-custom-success w-100">Add to Cart</button>
                        </div>
                    </div>
                </form>
                <h5>Description</h5>
                <p><?= $product->detail ?>
                </p>
            </div>
        </div>
    </div>
    <div class="mb-5">
        <h2 class="text-center text-black fw-medium mb-4">Gallery</h2>
        <div class="row justify-content-start">
            <?php if (!empty($product->images)) : ?>
                <div class="splide products text-center" id="bom">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php foreach ($product->images as $image) : ?>
                                <li class="splide__slide">
                                    <a href="<?= base_url('assets/uploads/img-product/' . $image->image) ?>" data-toggle="lightbox">
                                        <img src="<?= base_url('assets/uploads/img-product/' . $image->image) ?>" alt="product" class="img-fluid">
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php else : ?>
                <div class="col-4">
                    <a href="<?= base_url('assets/static/images/product.png') ?>" data-toggle="lightbox">
                        <img src="<?= base_url('assets/static/images/product.png') ?>" alt="product" class="img-fluid">
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container-fluid mb-5" style="background-color: #f5f5f5">
    <div class="container p-4">
        <h3 class="text-start text-black mt-3 mb-4 fw-medium">You may also like</h3>
        <div class="splide products">
            <div class="splide__track">
                <div class="splide__list">
                    <?php foreach ($relatedProducts as $related) { ?>
                        <div class="splide__slide">
                            <a href="/detail-product/<?= $related->id ?>">
                                <div class="card shadow">
                                    <div class="card-content">
                                        <img src="<?= $related->image != null ? base_url('assets/uploads/img-product/' . $related->image->image) : base_url('assets/static/images/product.png') ?>" class="card-img-top" alt="product" />
                                        <div class="card-body">
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-md-9 col-12">
                                                    <h5 class="custom-card-title text-dark fw-semibold text-truncate"><?= $related->nama_produk ?> <?= $related->variant ?></h5>
                                                    <p><span class="custom-card-title fw-bold text-success">Rp.<?= $related->harga ?></span><small class="fw-light">/pcs</small></p>
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