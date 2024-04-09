<?php helper('text') ?>

<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Products</h3>
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
                        <h5 class="card-title">Products Table</h5>
                    </div>
                    <div class="col-md-4 col-2">
                        <div class="d-flex justify-content-end">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary">
                                <i class="bi bi-plus"></i>
                                <span class="d-none d-md-inline">Add Product</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="display nowrap table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th data-priority="1">Name</th>
                                <th data-priority="2">Category</th>
                                <th>Detail</th>
                                <th>Variant</th>
                                <th>Price</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Product 1</td>
                                <td>Category 1</td>
                                <td><?= word_limiter('Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate.', 5) ?></td>
                                <td>Variant 1, Variant 2, Variant 3</td>
                                <td>Rp. 100.000</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#images">
                                        <i class="bi bi-images"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm delete-item">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <div class="modal fade text-center" id="images" tabindex="-1" aria-labelledby="imagesLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Nama Produk</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="carouselProductImages" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="<?= base_url('assets/compiled/jpg/1.jpg') ?>" class=" w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url('assets/compiled/jpg/2.jpg') ?>" class=" w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="<?= base_url('assets/compiled/jpg/3.jpg') ?>" class=" w-100" alt="...">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductImages" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselProductImages" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form Edit Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form form-horizontal" id="form-product" method="post" enctype="multipart/form-data">
                                                <div class="form-body">
                                                    <div class="col-md-12 form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" id="name" class="form-control" name="name" required>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="category">Category</label>
                                                        <select class="form-control" name="category" id="category" required>
                                                            <option value="" disabled selected>--Select Category--</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="detail">Detail Product</label>
                                                        <div class="summernote"></div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="stock">Stock</label>
                                                        <input type="int" id="stock" class="form-control" name="stock" required>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="variant">Variant</label>
                                                        <input type="text" id="variant" class="form-control" name="variant" required>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="price">Price</label>
                                                        <input type="int" id="price" class="form-control" name="price" placeholder="Rp 100.000" required>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="images">Images</label>
                                                        <input type="file" class="multiple-files-filepond" name="images" multiple />
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <form class="form form-horizontal" id="form-product" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="col-md-12 form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" name="category" id="category" required>
                                            <option value="" disabled selected>--Select Category--</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="detail">Detail Product</label>
                                        <div class="summernote"></div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="variant">Variant</label>
                                        <input type="text" id="variant" class="form-control" name="variant" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="price">Price</label>
                                        <input type="int" id="price" class="form-control" name="price" placeholder="Rp 100.000" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="images">Images</label>
                                        <input type="file" class="multiple-files-filepond" name="images" multiple />
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-item');
        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        });

        const variant = document.querySelector('#variant');
        const choices = new Choices(variant, {
            removeItemButton: true,
            duplicateItemsAllowed: false,
            editItems: true,
            allowHTML: true,
        })

        const rupiahToNumeric = (rupiah) => {
            const numericString = rupiah.replace(/[^\d]/g, '');
            const numericValue = parseFloat(numericString);

            return numericValue;
        }

        document.getElementById('price').addEventListener('input', function() {
            let input = this.value;
            var numericValue = rupiahToNumeric(input);
            this.value = "Rp. " + numericValue.toLocaleString('id-ID')

            if (isNaN(numericValue)) {
                this.value = "Rp. 0";
            }
        });
    });
</script>




<?= $this->endSection(); ?>