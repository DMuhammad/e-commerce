<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="mb-5">
    <div id="carouselIklan" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselIklan" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselIklan" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselIklan" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-0">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/static/images/Capsule-Refill-Packaging-.5.jpg') ?>" class="d-block w-100" alt="product">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/static/images/Capsule-Refill-Packaging-.4.jpg') ?>" class="d-block w-100" alt="product">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/static/images/Capsule-Refill-Packaging-.3.jpg') ?>" class="d-block w-100" alt="product">
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    <h2 class="text-dark fw-medium mb-5">Our Products</h2>

    <div class="row mb-3 justify-content-start">
        <?php foreach ($products as $product) { ?>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="<?= base_url('/detail-product/') . $product->id ?>">
                    <div class="card shadow">
                        <div class="card-content">
                            <img src="<?= $product->images != null ? base_url('assets/uploads/img-product/' . $product->images[0]->image) : base_url('assets/static/images/product.png') ?>" class="card-img-top img-fluid" alt="product" />
                            <div class="card-body">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-9 col-12">
                                        <h5 class="custom-card-title text-dark fw-semibold text-truncate"><?= $product->nama_produk ?></h5>
                                        <p><span class="custom-card-title fw-bold text-success">Rp. <?= number_format($product->harga, 0, ',', '.') ?></span><small class="fw-light">/pcs</small></p>
                                    </div>
                                    <div class="col-md-3 col-12 text-end">
                                        <button type="button" class="btn btn-custom-success rounded-circle">
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

<?= $this->endSection() ?>