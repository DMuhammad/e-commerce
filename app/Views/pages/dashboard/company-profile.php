<?= $this->extend('layouts/admin/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Company Profile</h3>
                <p class="text-subtitle text-muted">
                    A company profile is a professional introduction of the business and aims to inform the audience about its products and services.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Company Profile
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 col-10">
                        <h5 class="card-title">Profile Details</h5>
                    </div>
                    <div class="col-md-4 col-2">
                        <div class="d-flex justify-content-end">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit" class="btn btn-primary">
                                + <span class="d-none d-md-inline">Edit Profile</span>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-muted">Logo</div>
                    <div class="col-lg-8 d-flex align-items-center fw-bold">
                        <img src="<?= base_url('assets/static/images/faces/1.jpg') ?>" alt="logo" class="img-thumbnail" style="width: 150px;">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-muted">Company Name</div>
                    <div class="col-lg-8 d-flex align-items-center fw-bold">PT. Abadi Jaya</div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-muted">Description</div>
                    <div class="col-lg-8 d-flex align-items-center fw-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</div>
                </div>
                <hr>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-muted">Address</div>
                    <div class="col-lg-8 d-flex align-items-center fw-bold">Jl. Raya No. 123, Jakarta, Indonesia</div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-muted">Email</div>
                    <div class="col-lg-8 d-flex align-items-center fw-bold">
                        <a href="mailto: royhandf@gmail.com" class="text-decoration-none"> royhandf@gmail.com</a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-muted">Phone</div>
                    <div class="col-lg-8 d-flex align-items-center fw-bold">+62 812-3456-7890</div>
                </div>
                <hr>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-muted">Payment Method</div>
                    <div class="col-lg-8 d-flex align-items-center fw-bold">Mastercard</div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-muted">Account Number</div>
                    <div class="col-lg-8 d-flex align-items-center fw-bold">1234 5678 9012 3456</div>
                </div>
            </div>

            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <div class="form-body">
                                    <div class="col-md-12 form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" class="logo-filepond" name="logo" id="logo" />
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="company-name">Company Name</label>
                                        <input type="text" class="form-control" name="company-name" id="company-name" value="PT. Abadi Jaya" />
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="description">Description</label>
                                        <div class="summernote"></div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" value="Jl. Raya No. 123, Jakarta, Indonesia" />
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="royhandf@gmail.com" />
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="+62 812-3456-7890" />
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="payment">Payment</label>
                                        <div class="input-group mb-3">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Provider</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">BRI</a></li>
                                                <li><a class="dropdown-item" href="#">Mastercard</a></li>
                                                <li><a class="dropdown-item" href="#">BCA</a></li>
                                            </ul>
                                            <input type="text" class="form-control" name="account-number" placeholder="1234 5678 9012 3456">
                                        </div>
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


<?= $this->endSection(); ?>