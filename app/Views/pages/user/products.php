<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card border p-3">
                <div class="dropdown mb-3">
                    <button class="btn btn-outline-light btn-block dropdown-toggle text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        foreach ($categories as $category) { ?>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?= $category->id ?>" id="<?= $category->id ?>">
                                    <label class="form-check-label" for="<?= $category->id ?>">
                                        <?= $category->nama_kategori ?>
                                    </label>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="dropdown mb-3">
                    <button class="btn btn-outline-light btn-block dropdown-toggle text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Price
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        foreach ($categories as $category) { ?>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?= $category->id ?>" id="<?= $category->id ?>">
                                    <label class="form-check-label" for="<?= $category->id ?>">
                                        <?= $category->nama_kategori ?>
                                    </label>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-light btn-block dropdown-toggle text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Variation
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        foreach ($categories as $category) { ?>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?= $category->id ?>" id="<?= $category->id ?>">
                                    <label class="form-check-label" for="<?= $category->id ?>">
                                        <?= $category->nama_kategori ?>
                                    </label>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <h3 class="text-black">All Products</h3>
            <div class="d-flex align-content-start bg-body-tertiary my-4">
                <p class="text-black">Applied Filter:</p>
                <div class="d-flex justify-content-start mx-3 gap-2">
                    <button type="button" class="btn btn-outline-light text-dark">Sunscreen <i class="fa-solid fa-xmark"></i></button>
                    <button type="button" class="btn btn-outline-light text-dark">Rp. 45.000 - Rp. 60.000 <i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-xs-6 col-md-4">
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
                <div class="col-xs-6 col-md-4">
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
                <div class="col-xs-6 col-md-4">
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
                <div class="col-xs-6 col-md-4">
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
                <div class="col-xs-6 col-md-4">
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
                <div class="col-xs-6 col-md-4">
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
    </div>
</div>

<?= $this->endSection() ?>