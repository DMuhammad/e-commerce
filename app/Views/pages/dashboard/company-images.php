<?php helper('text') ?>

<?= $this->extend('layouts/admin/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Company Images</h3>
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
                            Company Images
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
                        <h5 class="card-title">Company Images Table</h5>
                    </div>
                    <div class="col-md-4 col-2">
                        <div class="d-flex justify-content-end">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary">
                                + <span class="d-none d-md-inline">Add Images</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="table2" class="display table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th data-priority="1">Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($companyimages as $companyimage) { ?>
                                <tr>
                                    <td> <?= $no++ ?> </td>
                                    <td>
                                        <a href="<?= base_url('uploads/img-company/' . $companyimage->image) ?>" data-toggle="lightbox">
                                            <img width="50" src="<?= base_url('uploads/img-company/' . $companyimage->image) ?>" alt="...">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#edit<?= $companyimage->id ?>" class="btn btn-warning btn-sm edit-button">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <div class="modal fade" id="edit<?= $companyimage->id ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Images
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form class="form form-horizontal" id="form-product" method="post" enctype="multipart/form-data" action="<?= base_url('dashboard/company-images/update/') . $companyimage->id ?>">
                                                        <div class="form-body">
                                                            <!-- Image Edit Section -->
                                                            <div class="col-md-12 form-group">
                                                                <label for="first-name-column">Edit Image</label>
                                                                <!-- Hidden field to store the old image -->
                                                                <input type="hidden" name="oldImage" value="<?= $companyimage->image ?>">
                                                                <?php 
                                                                // If there is an existing image, display it
                                                                if ($companyimage->image) { ?>
                                                                    <img src="<?= base_url('uploads/img-company/' . $companyimage->image) ?>" class="img-preview mb-3 img-fluid col-sm-5 d-block">
                                                                <?php } else { 
                                                                // If there is no existing image, display a placeholder
                                                                ?>
                                                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                                                <?php } ?>
                                                                <!-- File input to upload a new image -->
                                                                <input class="form-control" type="file" id="image" name="image" onchange="previewImages()">
                                                            </div>
                                                            <!-- CSRF Token -->
                                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                            <!-- Submit Button -->
                                                            <div class="col-sm-12 d-flex justify-content-end">
                                                                <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="<?= base_url('dashboard/company-images/delete/') . $companyimage->id ?>" method="post" class="form-delete d-inline-block">
                                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <button type="submit" class="btn btn-danger btn-sm delete-item">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Add Company Images</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form form-horizontal" id="form-product" method="post" enctype="multipart/form-data" action="<?= base_url('dashboard/company-images/create') ?>">
                                <div class="form-body">
                                    <div class="col-md-12 form-group">
                                        <label for="images">Images</label>
                                        <input type="file" class="multiple-files-filepond" name="images[]" multiple />
                                    </div>
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
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

<?= $this->endSection(); ?>