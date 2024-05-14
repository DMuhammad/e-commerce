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
                                    <input class="form-check-input" type="radio" name="category" value="<?= $category->id ?>" id="<?= $category->id ?>">
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
                    <div id="collapsePrice" class="collapse mt-2">
                        <div class="input-group input-group-sm flex-nowrap mb-2">
                            <span class="input-group-text" id="price-minimum">Rp</span>
                            <input type="text" class="form-control" name="price-minimum" placeholder="Harga Minimum">
                        </div>
                        <div class="input-group input-group-sm flex-nowrap mb-2">
                            <span class="input-group-text" id="price-maximum">Rp</span>
                            <input type="text" class="form-control" name="price-maximum" placeholder="Harga Maksimum">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-outline-success btn-block text-start" type="button" id="apply">
                        Apply Filter
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <h3 class="text-black mb-4">All Products</h3>

            <div class="row mb-3" id="product-body">
                <?php
                foreach ($products as $product) { ?>
                    <div class="col-6 col-md-4 list-products">
                        <a href="/detail-product/<?= $product->id ?>">
                            <div class="card shadow">
                                <div class="card-content">
                                    <img src="<?= $product->images != null ? base_url('assets/uploads/img-product/' . $product->images->image) : base_url('assets/static/images/product.png') ?>" class="card-img-top img-fluid" alt="product" />
                                    <div class="card-body">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-md-9 col-12">
                                                <h5 class="custom-card-title text-dark fw-semibold text-truncate"><?= $product->nama_produk ?></h5>
                                                <p><span class="custom-card-title fw-bold text-success">Rp.<?= $product->harga ?> </span><small class="fw-light">/pcs</small></p>
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
                <?php
                }
                ?>

                <nav>
                    <ul class="pagination justify-content-end">
                        <li class="page-item <?= $pager->getPreviousPageURI('products', 'default') == null ? 'disabled' : '' ?>">
                            <a class="page-link text-muted" href="<?= $pager->getPreviousPageURI('products', 'default') ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                Prev
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $pager->getPageCount('products'); $i++) { ?>
                            <?php if ($i == $pager->getCurrentPage('products')) { ?>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#"><?= $i ?></a>
                                </li>
                            <?php } else { ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= $pager->getPageURI($i, 'products') ?>"><?= $i ?></a>
                                </li>
                            <?php }; ?>
                        <?php } ?>
                        <li class="page-item <?= $pager->getNextPageURI('products', 'default') == null ? 'disabled' : '' ?>">
                            <a class="page-link" href="<?= $pager->getNextPageURI('products', 'default') ?>" aria-label="Next">
                                Next
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- <?= $pager->getNextPageURI('products', 'default') ?> -->

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>