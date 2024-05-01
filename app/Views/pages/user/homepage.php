<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="hero-section d-flex flex-column justify-content-center align-items-center text-center">
    <!-- <img src="<?= base_url('assets/static/images/hero-img.png') ?>" alt="" class="d-block w-100"> -->
    <div class="w-50">
        <p class="text-white">PT Persada Jayaraya Abadi</p>
        <h3 class="text-white">Discover the Essence of Luxury with Our Unique Cosmetic Packaging</h3>
        <button type="button" class="btn btn-success mt-10 p-3">Contact Us</button>
    </div>

</div>

<div class="container">
    <h2 class="my-4">Our Products</h2>

    <div class="row align-items-start gap-3 mb-4">
        <?php
        foreach ($categories as $category) { ?>
            <button type="button" class="btn btn-outline-light text-dark col"><?= $category->nama_kategori ?></button>
        <?php
        }
        ?>
    </div>

    <div class="row mb-3">
        <div class="col-xs-6 col-md-4 col-lg-3">
            <div class="card shadow">
                <div class="card-content">
                    <img src="<?= base_url('./assets/compiled/jpg/motorcycle.jpg') ?>" class="card-img-top img-fluid" alt="singleminded" />
                    <div class="card-body">
                        <h5 class="card-title text-black">Be Single Minded</h5>
                        <div class="row">
                            <div class="col-7">
                                <p><span class="fs-5 fw-bold text-success">Rp.50.000</span><span class="fs-6 fw-light">/pc</span></p>
                                <p class="text-sm fw-light text-black"><i class="bi bi-star-fill text-warning"></i>(4.8 Reviews)</p>
                            </div>
                            <div class="col-5 d-flex justify-content-end align-self-center">
                                <button class="btn btn-success rounded-circle btn-lg">
                                    <i class="bi bi-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4 col-lg-3">
            <div class="card shadow">
                <div class="card-content">
                    <img src="<?= base_url('./assets/compiled/jpg/motorcycle.jpg') ?>" class="card-img-top img-fluid" alt="singleminded" />
                    <div class="card-body">
                        <h5 class="card-title text-black">Be Single Minded</h5>
                        <div class="row">
                            <div class="col-7">
                                <p><span class="fs-5 fw-bold text-success">Rp.50.000</span><span class="fs-6 fw-light">/pc</span></p>
                                <p class="text-sm fw-light text-black">(4.8 Reviews)</p>
                            </div>
                            <div class="col-5 d-flex justify-content-end align-self-center">
                                <button class="btn btn-success rounded-circle btn-lg">
                                    <i class="bi bi-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4 col-lg-3">
            <div class="card shadow">
                <div class="card-content">
                    <img src="<?= base_url('./assets/compiled/jpg/motorcycle.jpg') ?>" class="card-img-top img-fluid" alt="singleminded" />
                    <div class="card-body">
                        <h5 class="card-title text-black">Be Single Minded</h5>
                        <div class="row">
                            <div class="col-7">
                                <p><span class="fs-5 fw-bold text-success">Rp.50.000</span><span class="fs-6 fw-light">/pc</span></p>
                                <p class="text-sm fw-light text-black">(4.8 Reviews)</p>
                            </div>
                            <div class="col-5 d-flex justify-content-end align-self-center">
                                <button class="btn btn-success rounded-circle btn-lg">
                                    <i class="bi bi-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4 col-lg-3">
            <div class="card shadow">
                <div class="card-content">
                    <img src="<?= base_url('./assets/compiled/jpg/motorcycle.jpg') ?>" class="card-img-top img-fluid" alt="singleminded" />
                    <div class="card-body">
                        <h5 class="card-title text-black">Be Single Minded</h5>
                        <div class="row">
                            <div class="col-7">
                                <p><span class="fs-5 fw-bold text-success">Rp.50.000</span><span class="fs-6 fw-light">/pc</span></p>
                                <p class="text-sm fw-light text-black">(4.8 Reviews)</p>
                            </div>
                            <div class="col-5 d-flex justify-content-end align-self-center">
                                <button class="btn btn-success rounded-circle btn-lg">
                                    <i class="bi bi-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4 col-lg-3">
            <div class="card shadow">
                <div class="card-content">
                    <img src="<?= base_url('./assets/compiled/jpg/motorcycle.jpg') ?>" class="card-img-top img-fluid" alt="singleminded" />
                    <div class="card-body">
                        <h5 class="card-title text-black">Be Single Minded</h5>
                        <div class="row">
                            <div class="col-7">
                                <p><span class="fs-5 fw-bold text-success">Rp.50.000</span><span class="fs-6 fw-light">/pc</span></p>
                                <p class="text-sm fw-light text-black">(4.8 Reviews)</p>
                            </div>
                            <div class="col-5 d-flex justify-content-end align-self-center">
                                <button class="btn btn-success rounded-circle btn-lg">
                                    <i class="bi bi-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4 col-lg-3">
            <div class="card shadow">
                <div class="card-content">
                    <img src="<?= base_url('./assets/compiled/jpg/motorcycle.jpg') ?>" class="card-img-top img-fluid" alt="singleminded" />
                    <div class="card-body">
                        <h5 class="card-title text-black">Be Single Minded</h5>
                        <div class="row">
                            <div class="col-7">
                                <p><span class="fs-5 fw-bold text-success">Rp.50.000</span><span class="fs-6 fw-light">/pc</span></p>
                                <p class="text-sm fw-light text-black">(4.8 Reviews)</p>
                            </div>
                            <div class="col-5 d-flex justify-content-end align-self-center">
                                <button class="btn btn-success rounded-circle btn-lg">
                                    <i class="bi bi-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4 col-lg-3">
            <div class="card shadow">
                <div class="card-content">
                    <img src="<?= base_url('./assets/compiled/jpg/motorcycle.jpg') ?>" class="card-img-top img-fluid" alt="singleminded" />
                    <div class="card-body">
                        <h5 class="card-title text-black">Be Single Minded</h5>
                        <div class="row">
                            <div class="col-7">
                                <p><span class="fs-5 fw-bold text-success">Rp.50.000</span><span class="fs-6 fw-light">/pc</span></p>
                                <p class="text-sm fw-light text-black">(4.8 Reviews)</p>
                            </div>
                            <div class="col-5 d-flex justify-content-end align-self-center">
                                <button class="btn btn-success rounded-circle btn-lg">
                                    <i class="bi bi-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4 col-lg-3">
            <div class="card shadow">
                <div class="card-content">
                    <img src="<?= base_url('./assets/compiled/jpg/motorcycle.jpg') ?>" class="card-img-top img-fluid" alt="singleminded" />
                    <div class="card-body">
                        <h5 class="card-title text-black">Be Single Minded</h5>
                        <div class="row">
                            <div class="col-7">
                                <p><span class="fs-5 fw-bold text-success">Rp.50.000</span><span class="fs-6 fw-light">/pc</span></p>
                                <p class="text-sm fw-light text-black">(4.8 Reviews)</p>
                            </div>
                            <div class="col-5 d-flex justify-content-end align-self-center">
                                <button class="btn btn-success rounded-circle btn-lg">
                                    <i class="bi bi-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        Prev
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link active" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        Next
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<?= $this->endSection() ?>