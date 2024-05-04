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
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselIklan" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselIklan" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container mb-5">
    <h2 class="text-dark fw-medium mb-5">Our Products</h2>

    <div class="d-flex align-items-start gap-3 mb-4">
        <?php
        foreach ($categories as $category) { ?>
            <button type="button" class="btn btn-outline-light text-dark col"><?= $category->nama_kategori ?></button>
        <?php
        }
        ?>
    </div>

    <div class="row mb-3 justify-content-center">
        <?php for ($i = 0; $i < 8; $i++) { ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card shadow">
                    <div class="card-content">
                        <img src="<?= base_url('assets/static/images/product.png') ?>" class="card-img-top img-fluid" alt="product" />
                        <div class="card-body">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-9 col-12">
                                    <h5 class="custom-card-title text-dark fw-semibold">Be Single Minded</h5>
                                    <p><span class="custom-card-title fw-bold text-success">Rp.50.000</span><small class="fw-light">/pcs</small></p>
                                </div>
                                <div class="col-md-3 col-12 text-end">
                                    <button class="btn btn-custom-success rounded-circle">
                                        <i class="bi bi-cart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?= $this->endSection() ?>