<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.css') ?>">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('/login'); ?>" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sweetalert / Swalfire -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>