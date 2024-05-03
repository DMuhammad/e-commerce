<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="shortcut icon" href="<?= base_url('assets/static/images/logo/company-logo-1.png') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/static/css/auth.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.css') ?>">
</head>

<body>
    <div class="row g-0 bg-white h-100">
        <div class="col-12 col-md-6">
            <img class="img-fluid object-fit-cover h-100" loading="lazy" src="<?= base_url('assets/static/images/background.png') ?>" alt="Welcome back you've been missed!">
        </div>

        <div class="col-12 col-md-6">
            <div class="d-flex flex-column justify-content-center align-items-center p-3 p-md-4 p-xl-5 h-100">
                <div class="text-center flex-fill">
                    <a href="<?= base_url('/login') ?>" class="custom-link active fw-medium mx-3">Login</a>
                    <a href="<?= base_url('/register') ?>" class="custom-link fw-medium mx-3">Register</a>
                </div>
                <div class="flex-fill">
                    <div class="text-center mb-3">
                        <a href="#">
                            <img src="<?= base_url('assets/static/images/logo/company-logo.png') ?>" alt="Logo" width="325" height="180">
                        </a>
                    </div>
                    <form action="<?php echo base_url('/login'); ?>" method="POST">
                        <div class="row gy-3 overflow-hidden">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-semibold">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid mb-3">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                    <button class="btn btn-custom-submit btn-lg" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script>
        var error = '<?= session()->getFlashdata('error') ?>';
        if (error) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: error,
            })
        }
    </script>
</body>

</html>