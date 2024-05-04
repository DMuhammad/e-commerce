<?= $this->extend('layouts/user/user_layout') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3">
            <div class="card border p-3">
                <div class="mb-3">
                    <button class="btn btn-outline-light btn-block text-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                        Category
                    </button>
                    <ul id="collapseCategories" class="collapse list-unstyled mt-2">
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
                <div class="mb-3">
                    <button class="btn btn-outline-light btn-block text-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePrice" aria-expanded="false" aria-controls="collapsePrice">
                        Price
                    </button>
                    <ul id="collapsePrice" class="collapse list-unstyled mt-2">
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
                    <button class="btn btn-outline-light btn-block text-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVariation" aria-expanded="false" aria-controls="collapseVariation">
                        Variation
                    </button>
                    <ul id="collapseVariation" class="collapse list-unstyled mt-2">
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
            <h3 class="text-black mb-4">All Products</h3>
            <!-- <div class="d-flex align-items-center bg-body-tertiary mb-4">
                <p class="text-black mb-0">Applied Filter:</p>
                <div class="d-flex justify-content-start mx-3 gap-2">
                    <button type="button" class="btn btn-outline-light text-dark">Sunscreen <i class="fa-solid fa-xmark"></i></button>
                    <button type="button" class="btn btn-outline-light text-dark">Rp. 45.000 - Rp. 60.000 <i class="fa-solid fa-xmark"></i></button>
                </div>
            </div> -->
            <div class="row mb-3">
                <?php for ($i = 0; $i < 6; $i++) { ?>
                    <div class="col-6 col-md-4">
                        <div class="card shadow">
                            <div class="card-content">
                                <img src="<?= base_url('assets/static/images/product.png') ?>" class="card-img-top img-fluid" alt="product" />
                                <div class="card-body">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-9 col-12">
                                            <h5 class="custom-card-title text-dark fw-semibold">Hair Shampoo Treatment</h5>
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

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link text-muted" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                Prev
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link active bg-success" href="#">2</a></li>
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