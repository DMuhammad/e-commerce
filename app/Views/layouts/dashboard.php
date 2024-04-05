<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/icoonly.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/extensions/simple-datatables/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/table-datatable.css') ?>">
</head>

<body>
    <div id="app">
        <?= $this->include('components/sidebar'); ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <?= $this->renderSection('content'); ?>

            <?= $this->include('components/footer'); ?>
        </div>
    </div>

    <script src="<?= base_url('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/compiled/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/dashboard.js') ?>"></script>

    <script src="<?= base_url('assets/extensions/simple-datatables/umd/simple-datatables.js') ?>"></script>
    <script src="<?= base_url('assets/static/js/pages/simple-datatables.js') ?>"></script>

</body>

</html>