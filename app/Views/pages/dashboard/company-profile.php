<?= $this->extend('layouts/admin/dashboard'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="fw-semibold text-dark">Company Profile</h3>
                <p class="text-subtitle text-muted">
                    A company profile is a professional introduction of the business and aims to inform the audience about its products and services.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
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
                        <h5 class="card-title text-dark fw-medium text-dark">Profile Details</h5>
                    </div>
                    <div class="col-md-4 col-2">
                        <div class="d-flex justify-content-end">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit" class="btn btn-success">
                                + <span class="d-none d-md-inline">Edit Profile</span>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Company Name</div>
                    <div class="col-lg-8 fw-medium">PT. Abadi Jaya</div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Description</div>
                    <div class="col-lg-8 fw-medium">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Visi</div>
                    <div class="col-lg-8 fw-medium">Menjadi perusahaan terbaik di Indonesia</div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Misi</div>
                    <div class="col-lg-8 fw-medium">
                        <ol>
                            <li>Menyediakan produk berkualitas</li>
                            <li>Memberikan pelayanan terbaik</li>
                            <li>Menjaga kepercayaan pelanggan</li>
                            <li>Menjadi perusahaan yang berkelanjutan</li>
                        </ol>
                    </div>
                </div>

                <hr>

                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Address</div>
                    <div class="col-lg-8 fw-medium">Jl. Raya No. 123, Jakarta, Indonesia</div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Email</div>
                    <div class="col-lg-8 fw-medium">royhandf@gmail.com </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Phone</div>
                    <div class="col-lg-8 fw-medium">+62 812-3456-7890</div>
                </div>

                <hr>

                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Logo</div>
                    <div class="col-lg-8 fw-medium">
                        <!-- cek kondisi payment -->
                        <!-- if 1 = /bri.png : 2 = /bri.png : 3 = mandiri.png : 4 = bsi.png  -->
                        <img src="<?= base_url('assets/static/images/bri.png') ?>" alt="logo" class="img-thumbnail" width="100">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Payment Method</div>
                    <div class="col-lg-8 fw-medium">BCA</div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Account Number</div>
                    <div class="col-lg-8 fw-medium">1234 5678 9012 3456</div>
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
                                        <label for="company-name">Company Name</label>
                                        <input type="text" class="form-control" name="company-name" id="company-name" value="PT. Abadi Jaya" required />
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="description">Description</label>
                                        <div class="summernote"></div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="visi">Visi</label>
                                        <input type="text" class="form-control" name="visi" id="visi" required />
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="misi">Misi</label>
                                        <small id="misi" class="form-text text-danger align-text-top">
                                            * Apabila ada lebih dari satu misi, pisahkan dengan tanda titik koma (;)
                                        </small>
                                        <div class="summernote" aria-describedby="misi"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" value="Jl. Raya No. 123, Jakarta, Indonesia" required />
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="royhandf@gmail.com" required />
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="+62 812-3456-7890" required />
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="payment-method">Payment Method</label>
                                    <select class="form-select" name="payment-method" id="payment-method" required>
                                        <option selected disabled>Select Payment Method</option>
                                        <option value="1">BCA</option>
                                        <option value="2">BRI</option>
                                        <option value="3">MANDIRI</option>
                                        <option value="4">BSI</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="account-number">Account Number</label>
                                    <input type="text" class="form-control" name="account-number" id="account-number" value="1234-5678-9012-3456" required />
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-custom-success me-1 mb-1">Submit</button>
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