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
                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit<?= $company->id ?>" class="btn btn-success">
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
                    <div class="col-lg-8 fw-medium"><?= $company->nama ?></div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Description</div>
                    <div class="col-lg-8 fw-medium"><?= $company->deskripsi ?></div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Visi</div>
                    <div class="col-lg-8 fw-medium"><?= $company->visi ?></div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Misi</div>
                    <div class="col-lg-8 fw-medium">
                        <?= $company->misi ?>
                    </div>
                </div>

                <hr>

                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Address</div>
                    <div class="col-lg-8 fw-medium"><?= $company->alamat ?></div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Email</div>
                    <div class="col-lg-8 fw-medium"><?= $company->email ?></div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Phone</div>
                    <div class="col-lg-8 fw-medium"><?= $company->kontak ?></div>
                </div>

                <hr>

                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Logo Bank</div>
                    <div class="col-lg-8 fw-medium">
                        <?php
                        $bank = ($company->bank == 'BCA') ? 'bca.png' : (($company->bank == 'MANDIRI') ? 'mandiri.png' : (($company->bank == 'BRI') ? 'bri.png' : (($company->bank == 'BSI') ? 'bsi.png' : '')));
                        ?>
                        <img src="<?= base_url('assets/static/images/' . $bank) ?>" alt="<?= $bank ?>" class="img-thumbnail" width="100">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Payment Method</div>
                    <div class="col-lg-8 fw-medium"><?= $company->bank ?></div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4 fw-semibold text-dark fw-regular">Account Number</div>
                    <div class="col-lg-8 fw-medium"><?= $company->no_rek ?></div>
                </div>
            </div>

            <div class="modal fade" id="edit<?= $company->id ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('dashboard/company-profile/update/') . $company->id ?>">
                                <div class="form-body">
                                    <div class="col-md-12 form-group">
                                        <label for="name">Company Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $company->nama ?>" required />
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="custom-summernote" id="summernote-description-<?= $company->id ?>" required><?= htmlspecialchars(($company->deskripsi)) ?></textarea>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="vision">Vision</label>
                                        <input type="text" class="form-control" name="vision" id="vision" value="<?= $company->visi ?>" required />
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="mission">Mission</label>
                                        <textarea name="mission" class="custom-summernote" id="summernote-mission-<?= $company->id ?>" required><?= htmlspecialchars(($company->misi)) ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" value="<?= $company->alamat ?>" required />
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?= $company->email ?>" required />
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="contact">contact</label>
                                    <input type="tel" class="form-control" name="contact" id="contact" value="<?= $company->kontak ?>" required />
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="bank">Payment Method</label>
                                    <select class="form-select" name="bank" id="bank" required>
                                        <option value="BCA" <?= $company->bank == 'BCA' ? 'selected' : '' ?>>BCA</option>
                                        <option value="MANDIRI" <?= $company->bank == 'MANDIRI' ? 'selected' : '' ?>>MANDIRI</option>
                                        <option value="BRI" <?= $company->bank == 'BRI' ? 'selected' : '' ?>>BRI</option>
                                        <option value="BSI" <?= $company->bank == 'BSI' ? 'selected' : '' ?>>BSI</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="account_number">Account Number</label>
                                    <input type="text" class="form-control" name="account_number" id="account_number" value="<?= $company->no_rek ?>" required />
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                    <button type="submit" name="submit" class="btn btn-custom-success me-1 mb-1">Edit</button>
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