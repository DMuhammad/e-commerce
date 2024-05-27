<?php helper('text') ?>

<?= $this->extend('layouts/admin/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="fw-semibold text-dark">Products</h3>
                <p class="text-subtitle text-muted">
                    Revolutionizing product presentation with exquisite beauty packaging solutions.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Products
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-8 col-10">
                        <h5 class="card-title fw-medium text-dark">Products Table</h5>
                    </div>
                    <div class="col-md-4 col-2">
                        <div class="d-flex justify-content-end">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-success">
                                + <span class="d-none d-md-inline">Add Product</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Detail</th>
                                <th>MOQ</th>
                                <th>Variant</th>
                                <th>Price</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($products as $product) { ?>
                                <tr>
                                    <td> <?= $no++ ?> </td>
                                    <td> <?= $product->nama_produk ?> </td>
                                    <td> <?= $product->nama_kategori ?> </td>
                                    <td><?= word_limiter($product->detail, 5) ?></td>
                                    <td> <?= $product->stok ?> </td>
                                    <td> <?= $product->variant ?> </td>
                                    <td>Rp. <?= number_format($product->harga, 0, ',', '.') ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#imagesModal<?= $product->id ?>">
                                            <i class="fa-regular fa-image"></i>
                                        </a>
                                        <div class="modal fade text-center" id="imagesModal<?= $product->id ?>" tabindex="-1" aria-labelledby="imagesLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            <?= $product->nama_produk ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="carouselProductImages<?= $product->id ?>" class="carousel slide" data-bs-ride="carousel">
                                                            <div class="carousel-indicators">
                                                                <?php foreach ($product->images as $index => $image) { ?>
                                                                    <button type="button" data-bs-target="#carouselProductImages<?= $product->id ?>" data-bs-slide-to="<?= $index ?>" class="<?= $index == 0 ? 'active' : '' ?>" aria-label="Slide <?= $index + 1 ?>"></button>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="carousel-inner">
                                                                <?php foreach ($product->images as $index => $image) { ?>
                                                                    <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                                                                        <img src="<?= base_url('assets/uploads/img-product/' . $image->image) ?>" class="w-100" alt="...">
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductImages<?= $product->id ?>" data-bs-slide="prev">
                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                <span class="visually-hidden">Previous</span>
                                                            </button>
                                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselProductImages<?= $product->id ?>" data-bs-slide="next">
                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                <span class="visually-hidden">Next</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit<?= $product->id ?>" class="btn btn-warning btn-sm edit-button" data-detail="<?= htmlspecialchars($product->detail) ?>">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>

                                            <form action="<?= base_url('dashboard/products/delete/') . $product->id ?>" method="post" class="form-delete d-inline-block">
                                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                <button type="submit" class="btn btn-danger btn-sm delete-item">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>

                                        <div class="modal fade" id="edit<?= $product->id ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Product
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form form-horizontal" id="form-product" method="post" enctype="multipart/form-data" action="<?= base_url('dashboard/products/update/') . $product->id ?>">
                                                            <div class="form-body">
                                                                <div class="col-md-12 form-group">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" id="name" class="form-control" name="name" required value="<?= $product->nama_produk ?>">
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="category">Category</label>
                                                                    <select class="form-control" name="category" id="category" required>
                                                                        <?php foreach ($categories as $category) { ?>
                                                                            <option value="<?= $category->id ?>" <?= $category->id == $product->category_id ? 'selected="selected"' : '' ?>>
                                                                                <?= $category->nama_kategori ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="detail">Detail Product</label>
                                                                    <textarea name="detail" id="summernote-product-<?= $product->id ?>" class="summernote-product custom-summernote"><?= htmlspecialchars(($product->detail)) ?></textarea>
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="stock">MOQ</label>
                                                                    <input type="int" id="stock" class="form-control" name="stock" required value="<?= $product->stok ?>">
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="variant">Variant</label>
                                                                    <input type="text" id="variant" class="form-control" name="variant" required value="<?= $product->variant ?>">
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="price">Price</label>
                                                                    <input type="text" id="price" class="form-control price-product" name="price" placeholder="Rp 100.000" required value="<?= $product->harga ?>">
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label for="images">Images</label>
                                                                    <input type="file" class="multiple-files-filepond" name="images[]" multiple />
                                                                </div>
                                                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                                <div class="col-sm-12 d-flex justify-content-end">
                                                                    <button type="submit" name="submit" class="btn btn-success me-1 mb-1">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Add Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form form-horizontal" id="form-product" method="post" enctype="multipart/form-data" action="<?= base_url('dashboard/products/create') ?>">
                                <div class="form-body">
                                    <div class="col-md-12 form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" name="category" id="category" required>
                                            <option value="" disabled selected>--Select Category--</option>
                                            <?php
                                            foreach ($categories as $category) { ?>
                                                <option value="<?= $category->id ?>"><?= $category->nama_kategori ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="detail">Detail Product</label>
                                        <textarea name="detail" class="summernote-product custom-summernote"></textarea>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="stock">MOQ</label>
                                        <input type="int" id="stock" class="form-control" name="stock" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="variant">Variant</label>
                                        <input type="text" id="variant" class="form-control" name="variant" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="price">Price</label>
                                        <input type="text" id="price" class="form-control price-product" name="price" placeholder="Rp 100.000" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="images">Images</label>
                                        <input type="file" class="multiple-files-filepond" name="images[]" multiple />
                                    </div>
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" name="submit" class="btn btn-success me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>